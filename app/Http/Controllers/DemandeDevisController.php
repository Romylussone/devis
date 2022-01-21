<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Articles as Article;
use App\Contacts as Contact;
use App\Entreprises as Entreprise;
use App\DetailDemandeDevis as DetDemDev;
use App\DemandeDevis as DemDev;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Connection;

use App\GrammageArticles;
use App\TailleArticles;
use App\TypeImpressionArticles;
use App\Devis;
use App\DetailDevis;

use App\Mail\SysDevisMaker as sendDevis;

class DemandeDevisController extends Controller
{    
    /**
     * index
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request)
    {
        //
    }
    
    /**
     * demandeDevis
     *
     * @param  mixed $request
     * @return void
     */
    public function demandeDevis(Request $request)
    {
        $entreprise_id ;
        $curent_contact_id;
        $current_demande_devis_id;

        //On récupère les donnée en provenance du demandeur
        $contact_demandeur = json_decode($request->input('contacts'));
        $articles_demander = json_decode( $request->input('articles'));
        // dump($contact_demandeur);
        //Après la reception des données du demandeur de devis : on enregistres les données et on créé le devis
        
        #Etape 01 : 
        //Enregistrement info Entreprise : 
        //Si l'entreprise existe
        $ets = new Entreprise;
        $nom_entreprise = $contact_demandeur[0]->nomEntreprise;
        $find_ets = $ets->where('nom', $nom_entreprise)->first();
        

        if(!isset($find_ets))
        {   
            //On enregistre les infos de la nouvelle entreprise
            // 'nom', 'ville', 'pays','adresse1', 'adresse_livraison', 'adresse2', 'code_postale', 'secteur_activite'
            $ets->nom =  $contact_demandeur[0]->nomEntreprise;
            $ets->ville =  $contact_demandeur[0]->villeContact;
            $ets->pays =  $contact_demandeur[0]->paysContact;
            $ets->adresse1 =  $contact_demandeur[0]->adrContact;
            $ets->adresse_livraison =  $contact_demandeur[0]->adrLivContact;
            $ets->code_postale =  $contact_demandeur[0]->codePostaclContac;
            $ets->secteur_activite =  $contact_demandeur[0]->sectactiviteEntreprise;
                       

            //On ajoute la nouvelle entreprise
            $ets->save();

            //On recupère l'id de l'entreprise qui vient d'etre insérée
            $entreprise_id = $ets->id;
        }
        else{
            $entreprise_id = $find_ets->id;
        }

        #Etape 02 :
        #On enregistre les infos du contacts
        $contact = new Contact;
        $email_contact = $contact_demandeur[0]->emailContact;
        $find_contact = $contact->where('email', $nom_entreprise)->first();

        if(!isset($find_contact))
        {
            //Si le contact n'existe pas on le crée
            // 'nom', 'prenoms', 'numero_tel','email', 'fonction', 'ip', 

            $contact->nom =  $contact_demandeur[0]->nomContact;
            $contact->prenoms =  $contact_demandeur[0]->prenomsContact;
            $contact->numero_tel =  $contact_demandeur[0]->numeroContact;
            $contact->email =  $contact_demandeur[0]->emailContact;
            $contact->entreprie_id =  $entreprise_id;
            $contact->fonction =  isset($contact_demandeur[0]->fonction) ? $contact_demandeur[0]->fonction : "";
            $contact->ip =  $request->ip();

            //On ajoute le nouveau contact
            $contact->save();

            $curent_contact_id = $contact->id;
        }
        else {
            $curent_contact_id = $find_contact->id;
        }

        #Etape 03 :
        #On enregistre la demande devis
        $demDevis = new DemDev;

        // 'entreprise_id', 'date_demande',
        $demDevis->entreprise_id = $entreprise_id;
        $demDevis->date_demande = now();

        //On crée la demande devis 
        $demDevis->save();

        //On récupère l'id de la demande devis venant d'être créée dans la db
        $current_demande_devis_id = $demDevis->id;

        #Etape 04 :
        #On enregistre les details de la demande de devis : Les différentes articles demandés
        $articles_devis = new Article;
        $gra = new GrammageArticles;
        $taillea = new TailleArticles;
        $typeimp = new TypeImpressionArticles;
        
        // 'code', 'type_article_id', 'taille_article_id', 'grammage_article_id', 'type_impresion_article_id',
        $dataInsert = array();
        $qte_art = array();
        $nbligne = Article::count();
        foreach($articles_demander as $k => $v)
        {
            $taile_hls = explode('X', strtoupper($v[0]->tailleSac));

            $tid = $taillea->where(['hauteur' => $taile_hls[0], 'largeur'=> $taile_hls[1], 'souflet'=> $taile_hls[2]])->get('id')->first();
            $gra_id = $gra->where('grammage', $v[0]->grammageSac)->get('id')->first();
            $nbcolti_id = $typeimp->where('nb_couleur', $v[0]->nbCouleurImpression)->get('id')->first();

            $nbligne = $nbligne + 1;
            $dataInsert[$k]["code"] = substr(strtoupper($v[0]->typeSac), 0, 3)."".sprintf("%'.010d", $nbligne);
            $dataInsert[$k]["type_article_id"] = $v[0]->typeSacID;
            $dataInsert[$k]["taille_article_id"] = $tid->id;
            $dataInsert[$k]["grammage_article_id"] = $gra_id->id;
            $dataInsert[$k]["type_impresion_article_id"] = $nbcolti_id->id;
            $dataInsert[$k]["lienCouleur"] = $v[0]->lienTypeSac;
            // $dataInsert[$k]["created_at"] = "'".now()."'";
            // $dataInsert[$k]["updated_at"] = "'".now()."'";

            $qte_art[$k] = $v[0]->qteSac;
        }
        // dd($dataInsert);

        //
        Article::insert($dataInsert);
        // DB::table('articles')->insert($dataInsert);

        #Etape 03 :
        #On enregistre les details de la demande de devis : La table detail devis pour chaque article
        // 'demande_devis_id', 'code_article', 'qte_article',
        
        $dataInDetailDem = array();
        foreach($dataInsert as $k => $v)
        {
            $dataInDetailDem[$k]["demande_devis_id"] = $current_demande_devis_id;
            $dataInDetailDem[$k]["code_article"] = $v["code"];
            $dataInDetailDem[$k]["qte_article"] = $qte_art[$k];
        }
        //On enregistre les détails
        DetDemDev::insert($dataInDetailDem);
        
        #On appel la procédure stoquée pour générer le devis, on lui donne l'id de la demande
        $r = DB::select(' select sp_make_devis(?) as devis_id', array($current_demande_devis_id));
        $new_created_devis_id = $r[0]->devis_id;

        #On envoie le devis au demandeur
        $this->sendDevisByMail($new_created_devis_id);
    }
    
    /**
     * sendDevisByMail
     *
     * @param  mixed $devis_id
     * @return void
     */
    private function sendDevisByMail($numero_devis)
    {
        
        #1 : On récupère tout le details du devis 
        $devis = DetailDevis::where('numero_devis', $numero_devis)->get()->toArray();

        #2 : On récupère l'adresse email du demandeur
        $tabemail = DB::select("
            select c.email, concat(c.prenoms, ' ',c.nom) as nomcontact, e.nom
            from devis d
            inner join demande_devis dd on dd.id=d.demande_devis_id
            inner join contacts c on c.entreprie_id=dd.entreprise_id
            inner join entreprises e on e.id=dd.entreprise_id
            where d.numero=? limit 1
        ", array($numero_devis));

        #3 :On envoie le mail
        $devis_mail_content = new sendDevis($devis, $numero_devis, $tabemail[0]->nom, $tabemail[0]->nomcontact);

        //Envoie du mail avec le visiteur en copie caché
        \Illuminate\Support\Facades\Mail::to($tabemail[0]->email)
            ->cc('support@gssoftai.com')
            ->send($devis_mail_content);

        #4 on retourne le message
        return json_encode(array('type' =>'ok', 'message' =>'Devis envoyé avec succès'));
    }

        
    /**
     * testenvoieEmail
     *
     * @return void
     */
    public function testenvoieEmail()
    {
         #1 : On récupère tout le details du devis 
         $devis = DetailDevis::where('numero_devis', 22)->get()->toArray();

        
         #2 : On récupère l'adresse email du demandeur
         $tabemail = DB::select("
                select c.email, concat(c.prenoms, ' ',c.nom) as nomcontact, e.nom
                from devis d
                inner join demande_devis dd on dd.id=d.demande_devis_id
                inner join contacts c on c.entreprie_id=dd.entreprise_id
                inner join entreprises e on e.id=dd.entreprise_id
                where d.numero=? limit 1
         ", array(22));

        
         #3 :On envoie le mail
        $devis_mail_content = new sendDevis($devis, 22, $tabemail[0]->nom, $tabemail[0]->nomcontact );
        $namepdfdevis = sprintf("%'.08d", 17);
        
        // return view('email.devis2')
        // ->with('devis', $devis)
        // ->with('numero', 22)
        // ->with('sommeTotal', 0)
        // ->with('nomcontact',  $tabemail[0]->nomcontact)
        // ->with('entreprise', $tabemail[0]->nom);
        // die();

        // dd($devis_mail_content);
         //Envoie du mail avec le visiteur en copie caché
         \Illuminate\Support\Facades\Mail::to($tabemail[0]->email)
         ->cc('support@gssoftai.com')
         ->send($devis_mail_content);
        //  ->attach($devis_pdf->output(), "devis.pdf");


        
        #Brouillon ...
        // $html_devis = view('email.devis')->with('devis', $devis)
        // ->with('numero', 17)
        // ->with('entreprise', $tabemail[0]->nom)->render();
        
        // $devis_pdf = \PDF::loadHTML($html_devis)->setPaper('a4', 'landscape')->setWarnings(false)->save(public_path('storage/test.pdf'));
        // set_time_limit(300);
        // $devis_pdf = \PDF::loadView('email.devis', array('numero' => 17, 'entreprise' =>$tabemail[0]->nom, 'devis'=>$devis))->setPaper('a4', 'landscape')->setWarnings(false)->save(public_path('storage/test.pdf'));        
        // dd($devis_pdf);
        // dd($devis_pdf->output());
    }

}

