<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFunctionSpMakeDevisToDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            DROP FUNCTION IF EXISTS sp_make_devis;

            DELIMITER $$
            CREATE FUNCTION sp_make_devis(sp_demande_devis_id int) RETURNS INT
            BEGIN
                DECLARE sp_code_article varchar(225);
                DECLARE sp_qte_article int ;
                DECLARE fin_resultat int default 0;
                #Le prix exw c'est le prix unitaire usine
                DECLARE prix_exw decimal(8,5);

                #mcube par sac
                DECLARE sp_mcube_par_sac decimal(8,5);
                #Qte article min du plus grand taux de reduction 
                DECLARE qte_min_max_pct_reduction int;
                #volume du type de contidionnement
                DECLARE sp_vol_conditionnement decimal(12,10);
                # Prix par sac hors transit
                DECLARE sp_prix_par_sac_hors_transit decimal(8, 5);
                #Prix transport par sac france
                DECLARE sp_prix_transport_par_sac_france decimal(9, 4);

                #Nombre de sac par cartons
                DECLARE nb_sac_par_cart int;

                #Nombre de sac par pallette /conteneurs
                DECLARE sp_nb_sac_par_pallet_contenaire_20pieds int;
                DECLARE sp_nb_sac_par_pallet_contenaire_40pieds int;
                #DECLARE sp_nb_sac_par_pallet_contenaire_20piedsHQ int; 
                DECLARE sp_nb_sac_par_pallet_contenaire_40piedsHQ int;

                #Nombre de carton 
                DECLARE nb_cart int;
                #Designation articles 
                DECLARE designation_art varchar(255);
                #l'id numero de la table devis après l'insertion d'une ligne dans la table
                DECLARE numero_devis_courant int;
                #Type article id 
                DECLARE sp_type_article_id int;
                #Nb couleur article
                DECLARE nb_color_article int;
                #Taille et grammage du sac
                DECLARE taille_id int;
                DECLARE grammage_id int;
                #HxLxS
                DECLARE article_taille_concat varchar(10);
                #icon 
                DECLARE article_img_icon varchar(255);

                # Prix par sac dap et transit
                DECLARE sp_ptr_prix_sac_dap_paris_et_transit decimal(15, 5);
                #Pourcentage de reduction 
                DECLARE sp_pct_reduction int ; 
                #frais_transit_certif_euro1 
                DECLARE sp_frais_transit_certif_euro1 int;
                #coef_frais_pallete_contenaire_20pieds
                DECLARE sp_coef_frais_pallete_contenaire_20pieds int;
                DECLARE sp_coef_frais_pallete_contenaire_40pieds int;
                DECLARE sp_coef_frais_pallete_contenaire_40piedsHQ int;
                #sp_ptr_prix_par_sac_dap
                DECLARE sp_ptr_prix_par_sac_dap decimal(10, 7);
                # ptr_mcube_par_qte_sac
                DECLARE sp_ptr_mcube_par_qte_sac decimal(10, 5);
                #sp_ptr_poids_kg_par_qte_sac
                DECLARE sp_ptr_poids_kg_par_qte_sac decimal(10, 2);
                
                #
                DECLARE sp_ptm_apc20pieds_nb_cartons int;
                DECLARE sp_ptm_apc20pieds_poids_tot_kg int;                
                DECLARE sp_ptm_apc20pieds_prix_cfr decimal(12, 2);
                DECLARE sp_ptm_apc20pieds_prix_par_sac_pall_cont_20pieds decimal(8, 5);
                DECLARE sp_ptm_apc20pieds_prix_par_cart_pall_cont_20pieds decimal(8, 5);
                DECLARE sp_ptm_apc20pieds_prix_par_kg decimal(8, 5);
                #
                DECLARE sp_ptm_apc40pieds_poids_tot_kg int;
                DECLARE sp_ptm_apc40pieds_nb_cartons int;
                DECLARE sp_ptm_apc40pieds_prix_cfr decimal(12, 2);
                DECLARE sp_ptm_apc40pieds_prix_par_sac_pall_cont_40pieds decimal(8, 5);
                DECLARE sp_ptm_apc40pieds_prix_par_cart_pall_cont_40pieds decimal(8, 5);
                DECLARE sp_ptm_apc40pieds_prix_par_kg decimal(8, 5);
                #
                DECLARE sp_ptm_apc40piedsHQ_nb_cartons int ;
                DECLARE sp_ptm_apc40piedsHQ_poids_tot_kg int ;
                DECLARE sp_ptm_apc40piedsHQ_prix_cfr decimal(12, 2);
                DECLARE sp_ptm_apc40piedsHQ_prix_par_sac_pall_cont_40piedsHQ decimal(8, 5);
                DECLARE sp_ptm_apc40piedsHQ_prix_par_cart_pall_cont_40piedsHQ decimal(8, 5);
                DECLARE sp_ptm_apc40piedsHQ_prix_par_kg decimal(8, 5);
                
                #
                DECLARE  cr cursor for SELECT code_article, qte_article from detail_demande_devis where demande_devis_id=sp_demande_devis_id ;
                DECLARE continue handler for not found set fin_resultat=1;
                
                #Ouverture du cursor pour parcourir toute les lignes de la demande devis en cours de traitement
                open cr;
                #Boucle
                readResult:  LOOP
                    #On recupère les valeurs du cursor et on les asigne à des variables locales
                    fetch cr into sp_code_article, sp_qte_article;
                    #select sp_code_article, sp_qte_article;

                    #On verifie la fin du cursor pour sortir au cas ou nous somme à la fin

                    IF fin_resultat=1  THEN 
                        LEAVE  readResult;
                    END  IF;
                    
                    #On fait l'appel au differentes sp pour le calcule du pu et le nb article par cartons
                    #1. Calcule du prix unitaire : 
                    set sp_type_article_id = (select type_article_id from articles where code=sp_code_article limit 1);
                    set nb_color_article = (select nb_couleur from type_impression_articles where id=(select type_impresion_article_id from articles where code=sp_code_article limit 1));
                    #
                    set taille_id = (select taille_article_id from articles where code=sp_code_article limit 1);
                    set article_img_icon = (select lienCouleur from articles where code=sp_code_article limit 1);
                    set grammage_id = (select grammage_article_id from articles where code=sp_code_article limit 1);                    
                    #
                    set prix_exw = (select sp_fmu_prix_par_gramme(nb_color_article, sp_type_article_id) * sp_fmu_poids_sac_en_gramme(taille_id, grammage_id));
                    #end calcule prix unitaire
                    #--
                    #2. Calcule du nombre de sac par carton pour l'article en cours et le nombre de carton
                    #--
                    #2.1 Nombre de sac par carton
                    set article_taille_concat = (select concat(hauteur,'X', largeur,'X', souflet) from taille_articles where id=taille_id limit 1);
                    set nb_sac_par_cart = (select qte_article from dd_conditionnements where id_type_cond=(select id from dd_type_conditionnements where libelle='carton' limit 1) and (article_taille_max=article_taille_concat or article_taille_min=article_taille_concat) limit 1);
                    #2.2 Nombre total de sac 
                    set nb_cart = (select sp_qte_article DIV nb_sac_par_cart);
                    #end calcule nb carton
                    
                    #3. Calcul du mcube par sac
                    #mcube_par_sac = mcube_par_carton(volume)/nb_atticle_par_carton
                    SET sp_vol_conditionnement = (select volume from dd_conditionnements where id_type_cond=(select id from dd_type_conditionnements where libelle='carton' limit 1) and (article_taille_max=article_taille_concat or article_taille_min=article_taille_concat) limit 1);
                    SET sp_mcube_par_sac = sp_vol_conditionnement/nb_sac_par_cart;
                    #end 3
                    
                    # 4. Calcule du prix par sac hors transit
                    #prix_par_sac_hors_transit = prix_exw_sac + prix_transport_par_sac_france
                    SET sp_prix_transport_par_sac_france = (select dd.prix from dd_prix_transport_par_article_france dd, taille_articles t
                    where t.largeur <= dd.largeurmax and t.largeur >= dd.largeurmin and t.hauteur <= dd.hmax
                    and t.hauteur >= dd.hmin and t.souflet >= dd.soufletmin and t.souflet<= dd.soufletmax
                    and t.id=taille_id and dd.type_article_id=sp_type_article_id limit 1);
                    #
                    SET sp_prix_par_sac_hors_transit = prix_exw + sp_prix_transport_par_sac_france;
                    

                    #5. Calcul du prix par sac ptr_prix_sac_dap_paris_et_transit
                    SET sp_frais_transit_certif_euro1 = (select coef_frais_transit_certif_euro1 from dd_coef_fixes where is_current_version=1 and type_article_id=sp_type_article_id limit 1);
                    # prix_sac_dap_paris_et_transit = [(prix_exw_sac -(prix_exw_sacs
                    #     * poucentage_reduction/100))+prix_transport_par_sac_france] * qte_sac_demande+frais_transit_certif_euro1
                    #
                    SET qte_min_max_pct_reduction = (select qte_min from dd_pct_reduction_prix where qte_max=8 and type_interval_id=3 limit 1);
                    IF(sp_qte_article >= qte_min_max_pct_reduction) THEN
                        SET sp_pct_reduction = (select pct_reduction from dd_pct_reduction_prix where qte_min=qte_min_max_pct_reduction limit 1);
                    ELSE
                        SET sp_pct_reduction = (SELECT pct_reduction FROM dd_pct_reduction_prix where qte_min <=sp_qte_article  and qte_max>=sp_qte_article limit 1);
                    END IF;
                    #
                    SET sp_ptr_prix_sac_dap_paris_et_transit = ((prix_exw - (prix_exw * sp_pct_reduction/100)) + sp_prix_transport_par_sac_france) * sp_qte_article + sp_frais_transit_certif_euro1;
                    
                    #6. Calcul prix par sac dap (ptr_prix_par_sac_dap)
                    # prix_par_sac_dap = prix_sac_dap_paris_et_transit / qte_sac_demande
                    SET sp_ptr_prix_par_sac_dap = sp_ptr_prix_sac_dap_paris_et_transit/sp_qte_article;

                    #7. Calcul ptr_mcube_par_qte_sac
                    # mcube_par_qte_sac = mcube_par_sac * qte_sac_demande
                    SET sp_ptr_mcube_par_qte_sac = sp_mcube_par_sac * sp_qte_article;

                    #8. Calcul ptr_poids_kg_par_qte_sac
                    # poids_kg_par_qte_sac = poids_sac_en_gram/1000 * qte_sac_demande
                    SET sp_ptr_poids_kg_par_qte_sac = (sp_fmu_poids_sac_en_gramme(taille_id, grammage_id) /1000) * sp_qte_article ;

                    # Affectation des valeurs par type de conditionnement
                    set sp_nb_sac_par_pallet_contenaire_20pieds = (select qte_article from dd_conditionnements where id_type_cond=(select id from dd_type_conditionnements where libelle='pall_cont_20' limit 1) and (article_taille_max=article_taille_concat or article_taille_min=article_taille_concat) limit 1);
                    set sp_nb_sac_par_pallet_contenaire_40pieds = (select qte_article from dd_conditionnements where id_type_cond=(select id from dd_type_conditionnements where libelle='pall_cont_40' limit 1) and (article_taille_max=article_taille_concat or article_taille_min=article_taille_concat) limit 1);
                    #set sp_nb_sac_par_pallet_contenaire_20piedsHQ = (select qte_article from dd_conditionnements where id_type_cond=(select id from dd_type_conditionnements where libelle='pall_cont_20HQ' limit 1) and (article_taille_max=article_taille_concat or article_taille_min=article_taille_concat) limit 1);
                    set sp_nb_sac_par_pallet_contenaire_40piedsHQ = (select qte_article from dd_conditionnements where id_type_cond=(select id from dd_type_conditionnements where libelle='pall_cont_40HQ' limit 1) and (article_taille_max=article_taille_concat or article_taille_min=article_taille_concat) limit 1);
                    
                    #9. Calcul ptm_apc20pieds_nb_cartons
                    # nb_cartons = nb_sac_par_pallet_contenaire_20pieds / nb_atticle_par_carton
                    SET sp_ptm_apc20pieds_nb_cartons = sp_nb_sac_par_pallet_contenaire_20pieds/ nb_sac_par_cart;
                    
                    #10.  Calcul ptm_apc20pieds_poids_tot_kg
                    # poids_tot_kg = nb_sac_par_pallet_contenaire_20pieds * (poids_sac_en_gram/1000)
                    SET sp_ptm_apc20pieds_poids_tot_kg = sp_nb_sac_par_pallet_contenaire_20pieds * (sp_fmu_poids_sac_en_gramme(taille_id, grammage_id) /1000);

                    #11. Calcul ptm_apc20pieds_prix_cfr
                    ## prix_cfr = [(prix_exw_sac -(prix_exw_sac * poucentage_reduction/100)) * nb_sac_par_pallet_contenaire_20pieds + 	coef_frais_pallete_contenaire_20pieds
                    #
                    SET sp_coef_frais_pallete_contenaire_20pieds = (select coef_frais_pallete_contenaire_20pieds from dd_coef_fixes where is_current_version=1 and type_article_id=sp_type_article_id limit 1);
                    SET sp_ptm_apc20pieds_prix_cfr = (prix_exw - (prix_exw *  sp_pct_reduction/100)) * sp_nb_sac_par_pallet_contenaire_20pieds + sp_coef_frais_pallete_contenaire_20pieds ;
                    
                    #12. Calcul ptm_apc20pieds_prix_par_sac_pall_cont_20pieds
                    #prix_par_sac_pall_contenaire_20pieds = prix_cfr/ nb_sac_par_pallet_contenaire_20pieds
                    #
                    SET sp_ptm_apc20pieds_prix_par_sac_pall_cont_20pieds = sp_ptm_apc20pieds_prix_cfr/sp_nb_sac_par_pallet_contenaire_20pieds;

                    #13. Calcul ptm_apc20pieds_prix_par_cart_pall_cont_20pieds
                    # prix_par_cartons_pall_contenaire_20pieds = prix_cfr/nb_cartons
                    SET sp_ptm_apc20pieds_prix_par_cart_pall_cont_20pieds = sp_ptm_apc20pieds_prix_cfr / sp_ptm_apc20pieds_nb_cartons;

                    #14. Calcul sp_ptm_apc20pieds_prix_par_kg
                    # prix_par_kg = prix_cfr/poids_tot_kg
                    SET sp_ptm_apc20pieds_prix_par_kg = sp_ptm_apc20pieds_prix_cfr/sp_ptm_apc20pieds_poids_tot_kg;

                    #15.
                    # nb_cartons = nb_sac_par_pallet_contenaire_40pieds / nb_atticle_par_carton
                    SET sp_ptm_apc40pieds_nb_cartons = sp_nb_sac_par_pallet_contenaire_40pieds/ nb_sac_par_cart;

                    #16.  
                    # poids_tot_kg = nb_sac_par_pallet_contenaire_40pieds * (poids_sac_en_gram/1000)
                    SET sp_ptm_apc40pieds_poids_tot_kg = sp_nb_sac_par_pallet_contenaire_40pieds * (sp_fmu_poids_sac_en_gramme(taille_id, grammage_id) /1000);
                    
                    #17. 
                    SET sp_coef_frais_pallete_contenaire_40pieds = (select coef_frais_pallete_contenaire_40pieds from dd_coef_fixes where is_current_version=1 and type_article_id=sp_type_article_id limit 1);
                    SET sp_ptm_apc40pieds_prix_cfr = (prix_exw - (prix_exw *  sp_pct_reduction/100)) * sp_nb_sac_par_pallet_contenaire_40pieds + sp_coef_frais_pallete_contenaire_40pieds ;
                    
                    #18. 
                    SET sp_ptm_apc40pieds_prix_par_sac_pall_cont_40pieds = sp_ptm_apc40pieds_prix_cfr/sp_nb_sac_par_pallet_contenaire_40pieds;

                    #19
                    SET sp_ptm_apc40pieds_prix_par_cart_pall_cont_40pieds = sp_ptm_apc40pieds_prix_cfr / sp_ptm_apc40pieds_nb_cartons;

                    #20
                    SET sp_ptm_apc40pieds_prix_par_kg = sp_ptm_apc40pieds_prix_cfr/sp_ptm_apc40pieds_poids_tot_kg;

                    #21.
                    # nb_cartons = nb_sac_par_pallet_contenaire_40pieds / nb_atticle_par_carton
                    SET sp_ptm_apc40piedsHQ_nb_cartons = sp_nb_sac_par_pallet_contenaire_40piedsHQ/ nb_sac_par_cart;

                    #22.
                    SET sp_ptm_apc40piedsHQ_poids_tot_kg = sp_nb_sac_par_pallet_contenaire_40piedsHQ * (sp_fmu_poids_sac_en_gramme(taille_id, grammage_id) /1000);

                    #23 
                    SET sp_coef_frais_pallete_contenaire_40piedsHQ = (select coef_frais_pallete_contenaire_40piedsHQ from dd_coef_fixes where is_current_version=1 and type_article_id=sp_type_article_id limit 1);
                    SET sp_ptm_apc40piedsHQ_prix_cfr = (prix_exw - (prix_exw *  sp_pct_reduction/100)) * sp_nb_sac_par_pallet_contenaire_40piedsHQ + sp_coef_frais_pallete_contenaire_40piedsHQ ;
                    
                    #24
                    SET sp_ptm_apc40piedsHQ_prix_par_sac_pall_cont_40piedsHQ = sp_ptm_apc40piedsHQ_prix_cfr/sp_nb_sac_par_pallet_contenaire_40piedsHQ;

                    #25
                    SET sp_ptm_apc40piedsHQ_prix_par_cart_pall_cont_40piedsHQ = sp_ptm_apc40piedsHQ_prix_cfr / sp_ptm_apc40piedsHQ_nb_cartons;

                    #26
                    SET sp_ptm_apc40piedsHQ_prix_par_kg = sp_ptm_apc40piedsHQ_prix_cfr/sp_ptm_apc40piedsHQ_poids_tot_kg;


                    #3. Formatage de la designation 
                    set designation_art = (select concat(ta.libelle, ' ', tla.libelle, ' ', ga.libelle) as designation_article 
                        from articles a
                        inner join type_articles ta on ta.id=a.type_article_id
                        inner join taille_articles tla on tla.id=a.taille_article_id
                        inner join grammage_articles ga on ga.id=a.grammage_article_id
                        where a.code=sp_code_article limit 1);
                    #end 3 formatage

                    #Création du devis : on créé une ligne dans la table devis et on ajoute 
                    IF (select count(numero) from devis where demande_devis_id=sp_demande_devis_id) = 0 THEN
                        #On créé la ligne le devis qui n'existe pas encore
                        INSERT INTO devis (demande_devis_id) VALUES (sp_demande_devis_id);
                        set numero_devis_courant = (select LAST_INSERT_ID());
                    ELSE 
                        set numero_devis_courant = (select numero from devis where demande_devis_id=sp_demande_devis_id limit 1);
                    END IF;

                    #Insertion des lignes du detail devis
                    INSERT INTO detail_devis (
                        numero_devis, designation, icon, nb_sac_par_carton, nb_tot_carton, nb_tot_sac,
                        pu_sac_prix_exw,
                        mcube_par_sac,
                        prix_par_sac_hors_transit,
                        ptr_prix_sac_dap_paris_et_transit,
                        ptr_prix_par_sac_dap,
                        ptr_mcube_par_qte_sac,
                        ptr_poids_kg_par_qte_sac,
                        ptm_apc20pieds_nb_cartons,
                        ptm_apc20pieds_poids_tot_kg,
                        ptm_apc20pieds_prix_cfr,
                        ptm_apc20pieds_prix_par_sac_pall_cont_20pieds,
                        ptm_apc20pieds_prix_par_cart_pall_cont_20pieds,
                        ptm_apc20pieds_prix_par_kg,
                        ptm_apc40pieds_nb_cartons,
                        ptm_apc40pieds_poids_tot_kg,
                        ptm_apc40pieds_prix_cfr,
                        ptm_apc40pieds_prix_par_sac_pall_cont_40pieds,
                        ptm_apc40pieds_prix_par_cart_pall_cont_40pieds,
                        ptm_apc40pieds_prix_par_kg,
                        ptm_apc40piedsHQ_nb_cartons,
                        ptm_apc40piedsHQ_poids_tot_kg,
                        ptm_apc40piedsHQ_prix_cfr,
                        ptm_apc40piedsHQ_prix_par_sac_pall_cont_40piedsHQ,
                        ptm_apc40piedsHQ_prix_par_cart_pall_cont_40piedsHQ,
                        ptm_apc40piedsHQ_prix_par_kg
                    )
                    VALUES (
                        numero_devis_courant, designation_art, article_img_icon, nb_sac_par_cart, nb_cart, sp_qte_article,
                        prix_exw,
                        sp_mcube_par_sac,
                        sp_prix_par_sac_hors_transit,
                        sp_ptr_prix_sac_dap_paris_et_transit,
                        sp_ptr_prix_par_sac_dap,
                        sp_ptr_mcube_par_qte_sac,
                        sp_ptr_poids_kg_par_qte_sac,
                        sp_ptm_apc20pieds_nb_cartons,
                        sp_ptm_apc20pieds_poids_tot_kg,
                        sp_ptm_apc20pieds_prix_cfr,
                        sp_ptm_apc20pieds_prix_par_sac_pall_cont_20pieds,
                        sp_ptm_apc20pieds_prix_par_cart_pall_cont_20pieds,
                        sp_ptm_apc20pieds_prix_par_kg,
                        sp_ptm_apc40pieds_nb_cartons,
                        sp_ptm_apc40pieds_poids_tot_kg,
                        sp_ptm_apc40pieds_prix_cfr,
                        sp_ptm_apc40pieds_prix_par_sac_pall_cont_40pieds,
                        sp_ptm_apc40pieds_prix_par_cart_pall_cont_40pieds,
                        sp_ptm_apc40pieds_prix_par_kg,
                        sp_ptm_apc40piedsHQ_nb_cartons,
                        sp_ptm_apc40piedsHQ_poids_tot_kg,
                        sp_ptm_apc40piedsHQ_prix_cfr,
                        sp_ptm_apc40piedsHQ_prix_par_sac_pall_cont_40piedsHQ,
                        sp_ptm_apc40piedsHQ_prix_par_cart_pall_cont_40piedsHQ,
                        sp_ptm_apc40piedsHQ_prix_par_kg
                    );
                    
                    #INSERT INTO detail_devis (numero_devis, icon, designation, nb_sac_par_carton, nb_tot_carton, nb_tot_sac, pu_sac_prix_exw, Total)
                    #VALUES (numero_devis_courant, article_img_icon, designation_art, nb_sac_par_cart, nb_cart, sp_qte_article, prix_exw, prix_exw * sp_qte_article);

                END LOOP readResult;
                close cr ;
                #On retourne le numero du devis nouvellement crée
                RETURN numero_devis_courant;
            END$$ 

            DELIMITER ;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('function_sp_make_devis_to_database');
    }
}
