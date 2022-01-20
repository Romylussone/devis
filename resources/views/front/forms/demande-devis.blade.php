
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Verification Email</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<!--=============================Fichier css formulaire  ===============================================================-->
<link rel="stylesheet" href="{{url('fonts/material-design-iconic-font/css/material-design-iconic-font.css')}}">
<link rel="stylesheet" href="{{url('fonts/linearicons/style.css')}}">
<link rel="stylesheet" href="{{url('vendor/date-picker/css/datepicker.min.css')}}">
<link rel="stylesheet" href="{{url('/css/front/form/style.css')}}">
<!--=============================Fin Fichiers css formulaire  ===============================================================-->

</head>
<body>
    <div class="wrapper">
        <div class="inner">
            <div class="image-holder">
                <img src="{{url('img/forms/form-wizard-01.jpg')}}" alt="">
                <h3>Votre devis sur mésure </h3>
            </div>
            <div id="wizard" post_url="{{route('demande.devis')}}">
                <h4>Votre type de Sac</h4>
                <section>
                <div class="form-row">
                    <!-- <div class="form-holder">
                        <input type="text" class="form-control datepicker-here pl-85" data-language='en' data-date-format="dd - m - yyyy" id="dp1">
                        <span class="lnr lnr-chevron-down"></span>
                        <span class="placeholder">Check in :</span>
                    </div>
                    <div class="form-holder">
                        <input type="text" class="form-control datepicker-here pl-96" data-language='en' data-date-format="dd - m - yyyy" id="dp2">
                        <span class="lnr lnr-chevron-down"></span>
                        <span class="placeholder">Check out :</span>
                    </div> -->
                    <div class="checkbox-circle ckbx-type-sac-selection">
                        <label>
                            <input type="radio" name="typesac" value="bretelle" type_article_id="1" checked="">Bretelle
                            <span class="checkmark"></span>
                        </label>
                        <label>
                            <input type="radio" name="typesac" value="anse" type_article_id="3" >Anses
                            <span class="checkmark"></span>
                        </label>
                        <label>
                            <input type="radio" name="typesac" value="poignee" type_article_id="2">Poignées
                            <span class="checkmark"></span>
                        </label>
                        <label>
                            <input type="radio" name="typesac" value="anse-lg" type_article_id="4" >Anses Longues
                            <span class="checkmark"></span>
                        </label>
                        <label>
                            <input type="radio" name="typesac" value="box" type_article_id="5">Box
                            <span class="checkmark"></span>
                        </label>
                        <label>
                            <input type="radio" name="typesac" value="lamine" type_article_id="6">Laminé
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
                <button class="forward btn-next">Suivant
                    <i class="zmdi zmdi-long-arrow-right"></i>
                </button>

                </section>
                <h4>Caractéristiques Sacs</h4>
                <section>
                <div class="form-row-custom">
                    <label style="margin-right: 5px">
                        Choisissez la couleur de vos sacs :
                    </label>
                </div>
                <div class="form-row">
                    <!-- <div class="form-holder w-100">
                        <input type="text" class="form-control" placeholder="Address :">
                    </div> -->
                    <div class="row btn-color-picker">
                        <button id="blanc" class="btn-colors-picker btn-color-blanc color-chosen">
                            <i class=""></i>
                        </button>
                        <button id="noir" class="btn-colors-picker btn-color-noir">
                            <i class=""></i>
                        </button>
                        <button id="rouge" class="btn-colors-picker btn-color-rouge">
                            <i class=""></i>
                        </button>
                        <button id="orange" class="btn-colors-picker btn-color-orange">
                            <i class=""></i>
                        </button>
                        <button id="jaune" class="btn-colors-picker btn-color-jaune">
                            <i class=""></i>
                        </button>
                        <button id="vert-foncer" class="btn-colors-picker btn-color-vert-fonce">
                            <i class=""></i>
                        </button>
                        <button id="vert-clair" class="btn-colors-picker btn-color-vert-clair">
                            <i class=""></i>
                        </button>
                        <button id="bleu-foncer" class="btn-colors-picker btn-color-bleu-fonce">
                            <i class=""></i>
                        </button>
                        <button id="bleu-ciel" class="btn-colors-picker btn-color-bleu-ciel">
                            <i class=""></i>
                        </button>
                        <button id="beige" class="btn-colors-picker btn-color-beige">
                            <i class=""></i>
                        </button>
                        <button id="violet" class="btn-colors-picker btn-color-violet">
                            <i class=""></i>
                        </button>
                        <button id="marron" class="btn-colors-picker btn-color-marron">
                            <i class=""></i>
                        </button>
                    </div>
                </div>
                <!-- <div class="form-row">
                    <div class="form-holder">
                        <input type="text" class="form-control" placeholder=" :">
                    </div>
                    <div class="form-holder">
                        <input type="text" class="form-control" placeholder="Last Name :">
                    </div>
                </div> -->
                <div class="form-row">
                    <div class="select">
                        <div class="form-holder">
                           <div class="select-control" id="taile-sac">* Taile du sac :</div>
                           <span class="lnr lnr-chevron-down"></span>
                        </div>
                        <ul class="dropdown">
                           <li rel="45x26x12" id="1">45 x 26 x 12 (Hauteur x Largeur x Soufflet en cm)</li>
                           <li rel="50x30x14" id="2">50 x 30 x 14 (Hauteur x Largeur x Soufflet en cm)</li>
                           <li rel="60x33x16 " id="3">60 x 33 x 16 (Hauteur x Largeur x Soufflet en cm)</li>
                           <li rel="64x44x18 " id="4">64 x 44 x 18 (Hauteur x Largeur x Soufflet en cm)</li>
                        </ul>
                     </div>
                    <div class="select input-taille-anse" style="display: none;">
                        <div class="form-holder">
                           <div class="select-control" id="taille-anse">* Taille des anses :</div>
                           <span class="lnr lnr-chevron-down"></span>
                        </div>
                        <ul class="dropdown">
                           <li rel="15">15 cm (standard)</li>
                           <li rel="50">50 cm</li>
                           <li rel="70">70 cm</li>
                        </ul>
                    </div>
                </div>
                <div class="form-row">
                    <div class="select">
                        <div class="form-holder">
                           <div class="select-control" id="qtesac">* Qte désirée :</div>
                           <span class="lnr lnr-chevron-down"></span>
                        </div>
                        <ul class="dropdown">
                           <li rel="10000">10 000 sacs</li>
                           <li rel="20000">20 000 sacs</li>
                           <li rel="30000">30 000 sacs</li>
                           <li rel="40000">40 000 sacs</li>
                           <li rel="50000">50 000 sacs</li>
                           <li rel="100000">100 000 sacs</li>
                        </ul>
                    </div>
                    <div class="select">
                        <div class="form-holder">
                           <div class="select-control" id="grammage-sac">* Sélectionnez le grammage de vos sacs :</div>
                           <span class="lnr lnr-chevron-down"></span>
                        </div>
                        <ul class="dropdown">
                           <li rel="30">Ultra éco 30 gr/m2</li>
                           <li rel="40">Ultra éco 40 gr/m2</li>
                           <li rel="50">Ultra éco 50 gr/m2</li>
                           <li rel="65">Ultra éco 65 gr/m2</li>
                           <li rel="80">Ultra éco 80 gr/m2</li>
                        </ul>
                    </div>
                </div>
                <div class="form-row">
                    <span>                        
                        Le grammage du tissu non tissé est un levier d’action sur le prix du sac et son rendu qualitatif, il s’exprime en grammes par mètre carré, soit gr/m². Nous n’allons donc pas mesurer l’épaisseur du sac mais son poids en gramme, sur une surface d’un mètre carré. Comment interprété le résultat ? Plus le gr/m² est élevé, plus le sac est relativement lourd : sa tenue / sa main sera alors meilleure, la rigidité sera plus importante et il sera plus épais.
                        Plus le grammage sera élevé, plus le rendu de votre sac tnt personnalisé sera qualitatif.
                    </span>
                </div>
                <button class="forward btn-next">Suivant
                    <i class="zmdi zmdi-long-arrow-right"></i>
                </button>
                </section>
                <h4>Type d'impresion</h4>
                <section class="">
                <!-- <div class="board-wrapper">
                    <div class="board-inner">
                        <div class="board-item">
                            Type de sac :
                            <span>Bretelle</span>
                        </div>
                        <div class="board-item">
                            Couleur :
                            <span>Rouge</span>
                        </div>
                    </div>
                </div> -->
                <div class="form-row">
                    <div class="recap-board">
                        <div class="board-item board-type-sac">
                            Type de sac :
                            <span>Bretelle</span>
                        </div>
                        <div class="board-item board-color-sac">
                            Couleur :
                            <span>Rouge</span>
                        </div>
                    </div>
                    <div class="form-group type-impression-c">
                        <label>
                            <input type="radio" name="typeimpression" value="imp-neutre" checked="true">Neutre
                            <span class="checkmark"></span>
                        </label>
                        <label>
                            <input type="radio" name="typeimpression" value="imp-perso">Personnaliser
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
                <div class="form-row img-type-sac" imgsacBase="{{asset('storage/img/sacs/')}}" >
                    <div class="img-container-1 img-c">
                        <img src="" alt="">
                    </div>
                    <div class="img-container-2 img-c">
                        <img src="" alt="">
                    </div>
                    <button id="ajoutersac" class="btn-sac-plus" title="Ajouter un autre type de sac">
                        <i class="zmdi zmdi-collection-plus zmdi-hc-lg" style="margin-left:0px;"></i>
                    </button>
                </div>
                <div class="form-show-for-personaliser">
                    <div class="form-row">
                        <div class="select">
                            <div class="form-holder">
                            <div id="" class="select-control select-nb-couleur-perso">* Nombre de couleurs :</div>
                                <span class="lnr lnr-chevron-down"></span>
                            </div>
                            <ul class="dropdown">
                                <li rel="1-couleur-recto">1 couleur recto</li>
                                <li rel="1-couleur-recto-verso">1 couleur recto-verso </li>
                                <li rel="2-couleurs-recto">2 couleurs recto</li>
                                <li rel="2-couleurs-recto-verso">2 couleurs recto-verso </li>
                                <li rel="3-couleurs-recto">3 couleurs recto</li>
                                <li rel="3-couleurs-recto-verso">3 couleurs recto-verso </li>
                                <li rel="4-couleurs-recto">4 couleurs recto</li>
                                <li rel="4-couleurs-recto-verso">4 couleurs recto-verso </li>
                            </ul>
                        </div>
                        <div class="form-holder">
                            <label for="logo" class="form-control btn-import-logo" >Importer votre logo ici</label>
                            <input type="file" id="logo" name="logo" class="form-control" hidden="true">
                            <!-- <input type="file" name="logofile" class="logo-file" > -->
                        </div>

                    </div>
                </div>
                <div class="row">
                    <span class="logo-error-msg" style="color:red; display:none;">
                        Le logo doit être de type jpeg, png, jpg et de taille inférieur à 2.5Mo.
                    </span>
                </div>
                <button class="forward" style="width: 195px; margin-top: 44px;">Suivant
                    <i class="zmdi zmdi-long-arrow-right"></i>
                </button>
                </section>
                <h4>Contatcs</h4>
                <section class="form-contact">
                <!-- <div class="board-wrapper">
                    <div class="board-inner">
                        <div class="board-item">
                            Check In :
                            <span>2-5-2018</span>
                        </div>
                        <div class="board-item">
                            Check Out :
                            <span>8-5-2018</span>
                        </div>
                    </div>
                </div> -->
                    <div class="form-row">
                        <div class="form-holder">
                            <input type="text" name="nomEntreprise" class="form-control" placeholder="* Nom de l'Entreprise :" required>
                        </div>
                        <div class="select">
                            <div class="form-holder">
                                <div class="select-control secteur-activite">* Secteur d'activité :</div>
                                <span class="lnr lnr-chevron-down"></span>
                            </div>
                            <ul class="dropdown">
                                <li rel="com-de-prox">Commerce de proximité</li>
                                <li rel="mode-magazin-vetement">Mode/Magasin de vetements</li>
                                <li rel="hotel-restauration-snack">Hotellerie/Restauration/Snacking</li>
                                <li rel="sante-pharmacie">Santé/Pharmacie</li>
                                <li rel="parfum-cosmetique">Parfumerie/Cosmétique</li>
                                <li rel="tel-informatique">Téléphonie/Informatique</li>
                                <li rel="assoc-a-but-non-lucratif">Association à but non lucratif</li>
                                <li rel="marketing-communication-salon">Marketing /Communication/Salon</li>
                                <li rel="commerce-gros-distribut-revendeur">Commerce de gros/Distributeur/Revendeur</li>
                                <li rel="grande-distribution-chaine-magazin">Grande distribution/chaine de magasins</li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-holder">
                            <input type="text" name="nomContact" class="form-control" placeholder="* Votre Nom :" required>
                        </div>
                        <div class="form-holder">
                            <input type="text" name="prenomsContact" class="form-control" placeholder="* Prénoms :" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-holder">
                            <input type="email" name="emailContact"" class="form-control" placeholder="* Email :" required>
                        </div>
                        <div class="form-holder">
                            <input type="text" name="numeroContact" class="form-control" placeholder="* Tel : +0033987656443" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-holder">
                            <input type="text" name="paysContact" class="form-control" placeholder="* Pays :" required>
                        </div>
                        <div class="form-holder">
                            <input type="text" name="villeContact" class="form-control" placeholder="* Ville :" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-holder w-100">
                            <input type="text" name="adresseContact" class="form-control" placeholder="* Adresse :" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-holder">
                            <input type="text" name="codepostalContact" class="form-control" placeholder="Code postal :">
                        </div>
                        <div class="form-holder">
                            <input type="text" name="adrlivraisonContact" class="form-control" placeholder="* Adresse de livraison:" required>
                        </div>
                    </div>
                    <!-- <div class="form-row">
                        <div class="form-holder w-100">
                            <input type="text" class="form-control" placeholder="Email :">
                        </div>
                    </div> -->
                    <!-- <div class="form-row mb-21">
                            <div class="form-holder w-100">
                                <textarea name="" id="" class="form-control" style="height: 79px;" placeholder="Special Requirements :"></textarea>
                            </div>
                    </div> -->
                    <div class="row">
                        <span class="conditions-utilisation">
                            Les informations recueillies sur ce formulaire sont enregistrées dans un fichier informatisé par sspackaging dans le but de vous fournir une offre pour les produits demandés . Conformément aux lois « Informatique & Liberté » et « RGPD », vous pouvez exercer vos droits d'accès aux données, de rectification ou d'opposition en contactant sspackaging
                        </span>
                        <hr />
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name=""> J'ai lue et j'accepte <a href="#">les termes et conditions</a>
                            <span class="checkmark cond-utiles"></span>
                        </label>
                    </div>
                    <button class="forward" style="width: 195px; margin-top: 44px;">Valider
                        <i class="zmdi zmdi-check-all zmdi-hc-lg"></i>
                    </button>
                </section>
                <h4>Recapitulatif demande</h4>
                <section class="">
                    <div class="pay-wrapper">
                        <div class="bill recap-container finishing">
                            <div id="first-cell-modal" class="bill-cell first-cell-modal" num="0" style="display: none;">
                                <div class="bill-item">
                                    <div class="bill-unit">
                                        Type de sac : <span class="val-typesac"></span>
                                    </div>
                                    <div class="bill-unit">
                                        Couleur : <span class="val-colorsac"></span>
                                    </div>
                                </div>
                                <div class="bill-item">
                                    <div class="bill-unit">
                                        Taille : <span class="val-taille"></span>
                                    </div>
                                    <div class="bill-unit">
                                        Qte : <span class="val-qte"></span>
                                    </div>
                                    <div class="bill-unit">
                                        Grammage : <span class="val-gram"></span>
                                    </div>
                                    <div class="bill-unit bill-unit-taille-anse" style="display: none;">
                                        Taille anse : <span class="val-tailleanse"></span>
                                    </div>
                                    <button class="btn-sac-moins" title="Retirer ce sac">
                                        <i class="zmdi zmdi-delete" style="margin-left:0px;"></i>
                                    </button>
                                    <!-- <span class="price"><i class="zmdi zmdi-delete"></i></span> -->
                                </div>
                            </div>
                        </div>
                    <button class="forward btn-finish finishing" style="width: 195px; margin-top: 44px;">Envoyer
                        <i class="zmdi zmdi-check-all zmdi-hc-lg"></i>
                    </button>
                    <div class="row notice-ok demande-ok" style="display:none">
                        <i class="zmdi zmdi-check-all zmdi-hc-5x"></i>
                    </div>
                    <div class="msg-ok demande-ok" style="display:none">
                        <span>
                            Un mail vous sera envoyé avec le devis demandé. Merci de nous avoir contacté
                        </span>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
<!-- Fin Formulaire ici -->
</body>

<!--===============================================================================================-->
<!-- Denut injection script form -->
<script src="{{url('js/forms/jquery-3.3.1.min.js')}}"></script>
<script src="{{url('js/forms/jquery.steps.js')}}"></script>

<script src="{{url('vendor/date-picker/js/datepicker.js')}}"></script>
<script src="{{url('vendor/date-picker/js/datepicker.en.js')}}"></script>
<script src="{{url('js/forms/main.js')}}"></script>
<script src="{{url('js/forms/forms-demande-devis.js')}}"></script>
<script src="{{url('js/forms/forms-control-data.js')}}"></script>
<!--===============================================================================================-->
