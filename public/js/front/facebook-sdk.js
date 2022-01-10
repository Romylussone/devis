
// //On ferme le chabot au chargement de la page
// window.onload = (event) => {
//     $('.fb-customerchat').hide();
// }

function riseFacebookMess(mutationslist, observer)
{   
  //On parcour la liste des evenement de mutation
  mutationslist.forEach( mut => {

    //On vérifie si la class de hall à changer
    if(mut.attributeName ==='class')
    {
        //Si le Hall a la class current alors on désactive le chabot si non on l'active
        if($("#hall").hasClass('current')){
           //
        }
        else{
          riseFaceBookchatBot();
        }
    }
})
}

function riseFaceBookchatBot()
{
  var ecoles_scenes = $('.scene');
    var fb_chabot_div =$('.fb-customerchat');
    var cfb_page_id="";

    //Avant d'activer le chabot on vérifie s'il n'est pas dejà activé
    if(fb_chabot_div.attr('page_id') != undefined)
    {
      if(fb_chabot_div.attr('page_id') !="")
      {
        fb_chabot_div.attr('page_id', '');
      }
      else {
        //On cherche l'ecole en cours de visite pour activer le chabot approprié
        // console.log(ecoles_scenes);
        ecoles_scenes.each( function(i, ecole) {
          //Si l'ecole est celle afficher actuellement alors on récupère son fb_page_id 
          //Puis on active son chabot Messenger
          if( $(ecole).hasClass('current'))
          {
            cfb_page_id = $(ecole).attr('fb_page_id');
            console.log(ecole);
            $("#fb-chabot-div").html("<div class='fb-customerchat'attribution='page_inbox' page_id='"+cfb_page_id+"'></div>");
             
            // $('.fb-customerchat').attr('page_id', cfb_page_id);
            // $('.fb-customerchat').show();
          }
        });
      }
    }
    else {
        
        //On cherche l'ecole en cours de visite pour activer le chabot approprié
        // console.log(ecoles_scenes);
        ecoles_scenes.each( function(i, ecole) {
          //Si l'ecole est celle afficher actuellement alors on récupère son fb_page_id 
          //Puis on active son chabot Messenger
          if( $(ecole).hasClass('current'))
          {
            cfb_page_id = $(ecole).attr('fb_page_id');
            // console.log(ecole);
            $("#fb-chabot-div").html("<div class='fb-customerchat'attribution='page_inbox' page_id='"+cfb_page_id+"'></div>");
            
            //Appel 
            reloadFB();
          }
        });
    }
}


const mutationObs = new MutationObserver(riseFacebookMess);

mutationObs.observe(
    document.getElementById("hall"),
    {attributes : true}
)

function reloadFB(){
    FB.init({
      xfbml            : true,
      version          : 'v10.0'
    });
  
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/fr_FR/sdk/xfbml.customerchat.js';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
}

