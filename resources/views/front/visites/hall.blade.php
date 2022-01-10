<!DOCTYPE html>
<html>
<head>
<title>virtualex</title>
<meta charset="utf-8">
<meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui" />
<style> 
  @-ms-viewport { width: device-width };
</style>
<link rel="stylesheet" href="./css/marzipano/common/reset.min.css">
<link rel="stylesheet" href="./css/marzipano/models/generated/style.css">
<link href="./css/front/styles.css" rel="stylesheet" />        
<link href="./css/front/home-style.css" rel="stylesheet" />        
<!-- Font Awesome icons (free version)-->
<script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
<!-- Google fonts-->
<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

<link rel="stylesheet" href=".\vendor\bootstrap-datetimepicker-master\css\bootstrap-datetimepicker.css"/>
<link rel="stylesheet" href=".\css\front\visite\hall.visite.css"/>

</head>
<body class="multiple-scenes view-control-buttons">
<!-- facebook -->
<!-- Messenger Plug-in Discussion Code -->
<div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v10.0'
        });
      };
      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/fr_FR/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>

<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
<script src="https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js"></script>
<!-- Fin bloc facebook Messenger Plug-in Discussion Code -->


<div id="pano"></div>

{{-- contenu display option Conseiller  --}}
<div id="block-contenu-conseille" class="mb-3 card"> 
    
  </div>
</div>
{{-- End contenu display option Conseiller  --}}


{{-- Buttons option conseiller  --}}
{{-- <div class="mb-3 card" > 
  <div style="padding: 10px" class="text-center bg-primary text-white"> Option Conseiller</div>
</div> --}}
{{-- End Buttons option conseiller   --}}

{{-- panel assistante et conseiller --}}
<div id="panel-assist-cons">
  <div class="row"> 
    <button type="button" class="btn btn-primary  ml-2"
            id="call-assistant">
          Ziara <i class="fas fa-question-circle"></i>
    </button> 
    {{-- <button type="button" class="btn btn-primary  ml-2"
            id="call-assistant">
          Quitter <i class="fas fa-door-closed text-white"></i>
    </button>  --}}
  </div>
</div>
{{-- End panel assistante et conseiller --}}


{{-- Block Assistante  --}}
<div  id="assistant-panel" class="card">
    
    {{-- Btn Fermer  --}}
    <button id="assistant-close"
            type="button" 
            class="btn btn-primary">
            <i class="fas fa-window-close"></i>
    </button>

    {{-- btn option de visite --}}
    <button id="assistante-option-visite" class="btn"
            state="hide" style="display: none;">
      <i class="fas fa-bars text-white"></i>        
    </button>


  <div class="row ml-3">
    {{-- Affichage avatar  --}}
    <div  class="col-md-3 text-center">  
       <div id="avatar-block">
        <img src="./img/marzipano/avatar/avatar.png" 
             alt="avatar" 
             class="img-responsive"> 
       </div>       
       <div id="block-conseille">
        <a  id="btnYoutube" type="button" target="_blank" class="btn btn-white text-danger" 
            title="Vidéo de présentation" tooltip="false">
            <i class="fab fa-youtube"></i>
        </a>
        <a  id="btnConseilHome" type="button" target="_blank" class="btn btn-primary" 
            title="Voir le site" tooltip="false">
                 <i class="fas fa-home"></i>
        </a>
        @auth
          {{-- Quand l'utilisateur est connecté on génère le lien pour l'envoie de badge et de demande de rdv --}}
          <a  id="btnConseilBadge" user="{{Auth::id()}}"
              type="button" class="btn btn-primary" title="Envoyer Mon Badge" tooltip="false"
              badge_url="{{ route('envoyer.email.badge', ['secret_id' => \Illuminate\Support\Facades\Crypt::encryptString(Auth::id())]) }}">
                  <i class="fa fa-user-circle"></i>
          </a>
          <a id="btnConseilRdv" user="{{Auth::id()}}"
          type="button" class="btn btn-primary"
          title="Prendre un RDV" tooltip="false"
          rdv_url="{{ route('envoyer.email.rdv', ['secret_id' => \Illuminate\Support\Facades\Crypt::encryptString(Auth::id()) ])  }}">
                  <i class="fa fa-flag"></i>
          </a>
        @else
          {{-- Quand le visiteur n'est pas connecté on lui affiche la modale d'inscription/connexion --}}
          <a  id="btnConseilBadge" type="button" class="btn btn-primary" title="Envoyer Mon Badge" tooltip="false">
                  <i class="fa fa-user-circle"></i>
          </a>
          <a id="btnConseilRdv" type="button" class="btn btn-primary"
              title="Prendre un RDV" tooltip="false">
                  <i class="fa fa-flag"></i>
          </a>
        @endauth
        <a id="btnConseilMessage" type="button" class="btn btn-primary"
           title="Envoyer un Message" tooltip="false">
                <i class="fas fa-envelope"></i>
        </a>
        <a  id="btnConseilTelecharger" target="_blank" type="button" class="btn btn-primary"
           title="Télécharger la brochure" tooltip="false">
                <i class="fas fa-download"></i>
        </a>  
        <div class="row col-sm-12 ml-1 mt-2 text-center">
          <a id="btnConseilVisite" type="button" target="_blank" class="btn btn-primary text-white mb-1 col-sm-12" 
             title="visite virtuel " tooltip="false">
              Visiter l'école <i class="fas fa-door-open"></i>
          </a>
        </div>
      </div>  
    </div> 

    {{-- Contenu Assistante --}}
    <div class="col-md-8 ml-4">
      <div class="row">
        {{-- Message Assistante --}}
        <div id="assistant-messages" class="col-md-12">
          <div class="row">
            <div class="col-md-6 text-center anT1">
              Bienvenu, je suis ziara
            </div>
            <div class="col-md-7 text-center mt-2 anT2">
              Nous pouvons commencer la visite.
            </div>
          </div>
        </div>
    
        {{-- partie lien visite rapide --}}
        <div id="assistante-visite-rapide" class="col-md-6">
          <div class="row" id="sceneList">
            <div style="background: transparent;width:100%;">              
              
              <div id="hall-container" class="card" style="background:rgba(255,255,255,0.8);">
                <div class="card-header" id="headingOne">
                  <h5 class="mb-0">
                      HALL D'ENTREE
                    <button class="btn scene"                           
                            id="hall"
                            href="#" 
                            data-id="0-hall">                            
                      <i class="fas fa-door-open"></i>
                    </button>
                  </h5>
                </div>  
              </div>

              <div id="video-presentation">
                  <iframe allow="fullscreen;" src="">
                  </iframe> 
                  <div style="height:10%;margin:0px;" class="text-center">
                      PRESENTATION
                  </div>
              </div>

              <div id="date-rdv">
                <form action="submit" class="form-horizontal">
                  <label for="date-rdv-input"> pour le : </label> 
                  <div class="row">
                    <div class="col-md-12">
                        <div class="input-append date form_datetime" data-date="2013-02-21T15:25:00Z">
                          <input id="date-rdv-input" class="form-control" size="20" type="text" value="" readonly>
                          <span class="add-on"><i class="icon-remove"></i></span>
                          <span class="add-on"><i class="icon-calendar"></i></span>
                        </div>
                    </div>
                    <div id="prendre-rdv-div">
                      <a href="#" id="prendre-rdv" class="btn btn-primary"> 
                        <i class="fas fa-paper-plane text-primary"></i>  
                      </a>
                    </div>
                  </div>
                </form>          
              </div>  

              <div style="background:rgba(255,255,255,0.8);" class="card" id="ListeEcolePanel">
                <h5 class="mb-0">
                  <a class="btn" 
                     data-toggle="collapse" href="#ListeEcoleCollapse" 
                     role="button" aria-expanded="false" 
                     id="btn-show-list-ecole"
                     aria-controls="collapseExample">
                    LISTE DES ECOLES
                  </a>
                </h5>

                <div id="ListeEcoleCollapse" class="collapse">
                  <button class="btn scene ecole-item btn-block text-left"  
                          href="javascript:void(0)"  
                          data-id="1-voir-le-conseill"  
                          id="ESSEM"
                          nomEcole = "ESSEM"
                          lienVisite = "https://my.matterport.com/show/?m=2TnLXETMUkP"
                          lienSite = "https://www.essem-bs.com"
                          lienPdf = ".\asset\school\brochure\plaquette_essem.pdf"
                          lienVideo = "https://www.youtube.com/embed/N-lsn_I6aAI?autoplay=1&mute=0"
                          idEcole = "1"
                          fb_page_id="104357908459359">                
                            <span class="badge badge-primary">1</span> 
                            ESSEM 
                  </button>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- End Block Assistante  --}}


{{-- Entête de la Visite --}}
<div id="sceneHeader">
  <div id="titleBar">
    <h1 class="sceneName"></h1>
  </div>

  <a href="javascript:void(0)" id="autorotateToggle">
    <i class="fas fa-play-circle icon off"></i>
    <i class="fas fa-pause-circle icon on"></i>
  </a>

  <a href="javascript:void(0)" id="fullscreenToggle">
    <i class="fas fa-expand icon off"></i>
    <i class="fas fa-compress-alt icon on"></i>
  </a>
</div>
{{-- End Entête de la Visite --}}


<a href="#" id="sceneListToggle" class="text-center">
   <i class="fas fa-cogs"></i>
</a>

{{-- outils de Visite  --}}
<div id="toolNav" style="opacity: 0;">
  <a href="javascript:void(0)" id="viewUp" class="viewControlButton viewControlButton-1 animTool">
    <i class="fas fa-chevron-up icon"></i>
  </a>

  <a href="javascript:void(0)" id="viewDown" class="viewControlButton viewControlButton-2 animTool">
    <i class="fas fa-chevron-down icon"></i>
  </a>

  <a href="javascript:void(0)" id="viewLeft" class="viewControlButton viewControlButton-3 animTool">
    <i class="fas fa-chevron-left icon"></i>
  </a>

  <a href="javascript:void(0)" id="viewRight" class="viewControlButton viewControlButton-4 animTool">
    <i class="fas fa-chevron-right icon"></i>  
  </a>

  <a href="javascript:void(0)" id="viewIn" class="viewControlButton viewControlButton-5 text-center animTool">
    <i class="fas fa-search-plus icon"></i>
  </a>

  <a href="javascript:void(0)" id="viewOut" class="viewControlButton viewControlButton-6 text-center animTool">
    <i class="fas fa-search-minus icon"></i>
  </a>
</div>
{{-- End outils de Visite  --}}

<!-- Token ajax pour communiquer avec le serveur -->
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}" get_ecole="{{route('charger.ecole', 0) }}">

<a class="visite-trace" start_url="{{route('trace.visite.start')}}" actions_url="{{route('trace.actions.visiteurs')}}"></a>

{{-- Bootstrap core JS --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

{{-- datepicker --}}
<script type="text/javascript" src=".\vendor\bootstrap-datetimepicker-master\js\bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src=".\vendor\bootstrap-datetimepicker-master\js\locales\bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>

{{-- text animation --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

<script src="./js/marzipano/common/screenfull.min.js" ></script>
<script src="./js/marzipano/common/bowser.min.js" ></script>
<script src="./js/marzipano/marzipano.js" ></script>

<script src="./js/marzipano/models/generated/data.js"></script>
<script src="./js/marzipano/models/generated/index.js"></script>

<!-- Injection dynamique des ecoles publié -->
<script src="./js/front/visite/inject-ecol-inhall.js"></script>

{{-- gestion des intéractions de la visite --}}
<script src="./js/front/visite/hall.visite.js"></script>


<!-- Appel du script js de faccesbok -->
<script src="./js/front/facebook-sdk.js"></script>
<script src="./js/front/facebook-sdk.js"></script>
<script src="./js/front/options-visite.js"></script>

<!-- Inclusion des Modales -->
@auth
    {{-- Si l'utilisateur est connecté on n'affiche pas de modal --}}
@else
    @include("front.modals.login-registre-form")
@endauth

<div id="fb-chabot-div">
<!-- Ici seront généré automariquement le pluing du chatbot Messenger -->
</div>

</body>
</html>