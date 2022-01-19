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
            DROP PROCEDURE IF EXISTS sp_make_devis;

            DELIMITER $$
            CREATE PROCEDURE sp_make_devis(demande_devis_id int)
            BEGIN
                DECLARE sp_code_article varchar(225);
                DECLARE sp_qte_article int ;
                DECLARE fin_resultat int default 0;
                #Le prix exw c'est le prix unitaire
                DECLARE prix_exw decimal(8,5);
                #Nombre de sac par cartons
                DECLARE nb_sac_par_cart int;
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
                #
                DECLARE  cr cursor for SELECT code_article, qte_article from detail_demande_devis where id=demande_devis_id ;
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
                    set grammage_id = (select grammage_article_id from articles where code=sp_code_article limit 1);                    
                    #
                    set prix_exw = (select sp_fmu_prix_par_gramme(nb_color_article, sp_type_article_id) * sp_fmu_poids_sac_en_gramme(taille_id, grammage_id));
                    #end calcule prix unitaire
                    #2. Calcule du nombre de sac par carton pour l'article en cours et le nombre de carton
                    
                    #2.1 Nombre de sac par carton
                    set article_taille_concat = (select concat(hauteur,'X', largeur,'X', souflet) from taille_articles where id=taille_id limit 1);
                    set nb_sac_par_cart = (select qte_article from dd_conditionnements where id_type_cond=(select id from dd_type_conditionnements where libelle='carton' limit 1) and (article_taille_max=article_taille_concat or article_taille_min=article_taille_concat) limit 1);
                    #2.2 Nombre total de sac 
                    set nb_cart = (select sp_qte_article DIV nb_sac_par_cart);
                    #end calcule nb carton
                    
                    #3. Formatage de la designation 
                    set designation_art = (select concat(ta.libelle, ' ', tla.libelle, ' ', ga.libelle) as designation_article 
                        from articles a
                        inner join type_articles ta on ta.id=a.type_article_id
                        inner join taille_articles tla on tla.id=a.taille_article_id
                        inner join grammage_articles ga on ga.id=a.grammage_article_id
                        where a.code=sp_code_article limit 1);
                    #end 3 formatage

                    #Création du devis : on créé une ligne dans la table devis et on ajoute 
                    IF (select count(numero) from devis where demande_devis_id=demande_devis_id) = 0 THEN
                        #On créé la ligne le devis qui n'existe pas encore
                        INSERT INTO devis (demande_devis_id) VALUES (demande_devis_id);
                        set numero_devis_courant = (select LAST_INSERT_ID());
                    ELSE 
                        set numero_devis_courant = (select numero from devis where demande_devis_id=demande_devis_id limit 1);
                    END IF;                    
                    #Insertion des lignes du detail devis
                    INSERT INTO detail_devis (numero_devis, designation, nb_sac_par_carton, nb_tot_carton, nb_tot_sac, pu_sac_prix_exw, Total)
                    VALUES (numero_devis_courant, designation_art, nb_sac_par_cart, nb_cart, sp_qte_article, prix_exw, prix_exw * sp_qte_article);

                END LOOP readResult;
                close cr ;
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
