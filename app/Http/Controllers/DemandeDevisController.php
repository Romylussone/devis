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
use Illuminate\Support\Facades\URL;

use App\GrammageArticles;
use App\TailleArticles;
use App\TypeArticles;
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
        // request()->validate([
        //     'file'  => 'required|mimes:jpeg,jpg,png|max:20000',
        // ]);

        $entreprise_id ;
        $curent_contact_id;
        $current_demande_devis_id;
        
        
        //On récupère les donnée en provenance du demandeur
        $contact_demandeur = json_decode($request->input('contacts'));
        $articles_demander = json_decode( $request->input('articles'));
        // dump($contact_demandeur);
        //Après la reception des données du demandeur de devis : on enregistres les données et on créé le devis
        // $articles_demander->typeImpresionID;
        
        // $response = [
        //     "typeImpression1" => $articles_demander[0]->typeImpressionID,
        //     "typeImpression2" => $articles_demander[1]->typeImpressionID
        // ];
        // return response($response, 422);
        #Etape 01 : 
        //Enregistrement info Entreprise : 
        //Si l'entreprise existe
        $ets = new Entreprise;
        $nom_entreprise = $contact_demandeur->nomEntreprise;
        $find_ets = $ets->where('nom', $nom_entreprise)->first();
        //**

        if(!isset($find_ets))
        {   
            //On enregistre les infos de la nouvelle entreprise
            // 'nom', 'ville', 'pays','adresse1', 'adresse_livraison', 'adresse2', 'code_postale', 'secteur_activite'
            $ets->nom =  $contact_demandeur->nomEntreprise;
            $ets->ville =  $contact_demandeur->villeContact;
            $ets->pays =  $contact_demandeur->paysContact;
            $ets->adresse1 =  $contact_demandeur->adrContact;
            $ets->adresse_livraison =  $contact_demandeur->adrLivContact;
            $ets->code_postale =  $contact_demandeur->codePostaclContact;
            $ets->secteur_activite =  $contact_demandeur->sectactiviteEntreprise;
                       

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
        $email_contact = $contact_demandeur->emailContact;
        $find_contact = $contact->where('email', $nom_entreprise)->first();

        if(!isset($find_contact))
        {
            //Si le contact n'existe pas on le crée
            // 'nom', 'prenoms', 'numero_tel','email', 'fonction', 'ip', 

            $contact->nom =  $contact_demandeur->nomContact;
            $contact->prenoms =  $contact_demandeur->prenomsContact;
            $contact->numero_tel =  $contact_demandeur->numeroContact;
            $contact->email =  $contact_demandeur->emailContact;
            $contact->entreprie_id =  $entreprise_id;
            $contact->fonction =  isset($contact_demandeur->fonction) ? $contact_demandeur->fonction : "";
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
        // $articles_devis = new Article;
        // $gra = new GrammageArticles;
        // $taillea = new TailleArticles;
        $timp = new TypeImpressionArticles;
        // typeSac: null,
        // typeSacID: null,
        // couleursac: null,
        // qtesac: null,
        // taillesac: null,
        // tailleanse: null,
        // grammagesac: null,
        // typeImpression: 'neutre',
        // typeImpressionID: null,
        // withLogo: null
        
        // 'code', 'type_article_id', 'taille_article_id', 'grammage_article_id', 'type_impresion_article_id',
        $dataInsert = array();
        $qte_art = array();
        $nbligne = Article::count();
        foreach($articles_demander as $k => $v)
        {        

            $nbligne = $nbligne + 1;
            $dataInsert[$k]["code"] = substr(strtoupper($v->typeSac), 0, 3)."".sprintf("%'.010d", $nbligne);
            $dataInsert[$k]["type_article_id"] = $v->typeSacID;
            $dataInsert[$k]["taille_article_id"] = $v->taillesac;
            $dataInsert[$k]["grammage_article_id"] = $v->grammagesac;
            $dataInsert[$k]["type_impresion_article_id"] = is_null($v->typeImpressionID) ? $timp->where('libelle', 'neutre')->get('id')->first()->id : $v->typeImpressionID;
            $dataInsert[$k]["couleur_article_id"] = $v->couleursac;
            if(!is_null($v->tailleanse) && $v->tailleanse !="")
            {
                $dataInsert[$k]["taille_anse_id"] = $v->tailleanse;
            }
            else{
                $dataInsert[$k]["taille_anse_id"] = null;
            }
            
            // $dataInsert[$k]["lienCouleur"] = $v->lienTypeSac;
            // $dataInsert[$k]["created_at"] = "'".now()."'";
            // $dataInsert[$k]["updated_at"] = "'".now()."'";

            $qte_art[$k] = $v->qtesac;
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

        #on enregistre le logo du client
        // $path = $request->file('logo1')->store(
        //     'avatars/'.$current_demande_devis_id, 'public'
        // );

        #On envoie le devis au demandeur
        $this->sendDevisByMail($new_created_devis_id);

        #4 on retourne le message
        $response = ["type" => "demondeok", "message" => "Votre demande de devis a bien été traitée, un mail vous sera envoyé avec le devis"];
        return response($response, 200);
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
        
        
        #Création des urls signés pour Télécharger le devis et Passer la commande
        $telechargerUrl =  URL::signedRoute('telecharger.devis', ['numero_devis' => $numero_devis]);
        $passerCommandeUrl =  URL::signedRoute('passer.cmd.devis', ['numero_devis' => $numero_devis]);
        $email_url = ['telechargerUrl'=>$telechargerUrl, 'passerCommandeUrl' =>$passerCommandeUrl];

        #3 :On envoie le mail
        $devis_mail_content = new sendDevis($devis, $numero_devis, $tabemail[0]->nom, $tabemail[0]->nomcontact, $email_url);

        //Envoie du mail avec le visiteur en copie caché
        \Illuminate\Support\Facades\Mail::to($tabemail[0]->email)
            ->cc('support@gssoftai.com')
            ->send($devis_mail_content);
    }
    
    /**
     * telechargerDevis
     *
     * @param  mixed $secret_id
     * @return void
     */
    function telechargerDevis(Request $request, $numero_devis)
    {
        if (! $request->hasValidSignature()) {
            abort(401);
        }
        else{
            #1 : On récupère tout le details du devis 
            $devis = DetailDevis::where('numero_devis', $numero_devis)->get()->toArray();

            #2 : On récupère l'adresse email du demandeur
            $tabemail = DB::select("
                select c.email, concat(c.prenoms, ' ',c.nom) as nomcontact, concat(e.adresse1, ' ',e.adresse1) adresse, e.nom
                from devis d
                inner join demande_devis dd on dd.id=d.demande_devis_id
                inner join contacts c on c.entreprie_id=dd.entreprise_id
                inner join entreprises e on e.id=dd.entreprise_id
                where d.numero=? limit 1
            ", array($numero_devis));


            #On retourne la vue
            return view('devis.template1')
            ->with('devis', $devis)
            ->with('numero', 25)
            ->with('numeroDevisFormater', sprintf("%'.04d", 25))
            ->with('sommeTotal', 0)
            ->with('nomcontact',  $tabemail[0]->nomcontact)
            ->with('nomEntreprise',  $tabemail[0]->nom)
            ->with('adresse', $tabemail[0]->adresse);
        }
    }

        
    /**
     * testenvoieEmail
     *
     * @return void
     */
    public function testenvoieEmail()
    {
         #1 : On récupère tout le details du devis 
         $devis = DetailDevis::where('numero_devis', 25)->get()->toArray();

        
         #2 : On récupère l'adresse email du demandeur
         $tabemail = DB::select("
                select c.email, concat(c.prenoms, ' ',c.nom) as nomcontact, e.nom
                from devis d
                inner join demande_devis dd on dd.id=d.demande_devis_id
                inner join contacts c on c.entreprie_id=dd.entreprise_id
                inner join entreprises e on e.id=dd.entreprise_id
                where d.numero=? limit 1
         ", array(25));

        //  dd($tabemail);
        
        #Création des urls signés pour Télécharger le devis et Passer la commande
        $telechargerUrl =  URL::signedRoute('telecharger.devis', ['numero_devis' => 25]);
        $passerCommandeUrl =  URL::signedRoute('passer.cmd.devis', ['numero_devis' => 25]);
        $email_url = ['telechargerUrl'=>$telechargerUrl, 'passerCommandeUrl' =>$passerCommandeUrl];

         #3 :On envoie le mail
        $devis_mail_content = new sendDevis($devis, 25, $tabemail[0]->nom, $tabemail[0]->nomcontact, $email_url);
        $namepdfdevis = sprintf("%'.08d", 25);
        
        return view('email.devis2')
        ->with('devis', $devis)
        ->with('numero', 25)
        ->with('sommeTotal', 0)
        ->with('nomcontact',  $tabemail[0]->nomcontact)
        ->with('entreprise', $tabemail[0]->nom)
        ->with('urls', $email_url);
        die();

        // return view('email.devis-template1')->with('devis', $devis)
        // ->with('numero', 17)
        // ->with('entreprise', $tabemail[0]->nom)->render();
        // die();

        // dd($devis_mail_content);
        //  Envoie du mail avec le visiteur en copie caché
         \Illuminate\Support\Facades\Mail::to($tabemail[0]->email)
         ->cc('support@gssoftai.com')
         ->send($devis_mail_content);


        
        #Brouillon ...
        #devis 2 test
        // $html_devis2 = view('email.devis2')
        // ->with('devis', $devis)
        // ->with('numero', 24)
        // ->with('sommeTotal', 0)
        // ->with('nomcontact',  $tabemail[0]->nomcontact)
        // ->with('entreprise', $tabemail[0]->nom);

        #devis 1 test
        // $html_devis = view('email.devis')->with('devis', $devis)
        // ->with('numero', 17)
        // ->with('entreprise', $tabemail[0]->nom)->render();
        
        // set_time_limit(700);
        // $devis_pdf = \PDF::loadHTML($html_devis)->setPaper('a4', 'landscape')->setWarnings(false)->save(public_path('storage/test.pdf'));
        
        // $devis_pdf = \PDF::loadView('email.devis', array('numero' => 17, 'entreprise' =>$tabemail[0]->nom, 'devis'=>$devis))->setPaper('a4', 'landscape')->setWarnings(false)->save(public_path('storage/test.pdf'));        
        // dd($devis_pdf);
        // dd($devis_pdf->output());
    }

}

