var currentEcoleID = "";
//On ferme le chabot au chargement de la page
window.onload = (event) => {
    $('.desktop-closed-message-avatar').hide();
}

//Configuration global de ajax
$.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('#token').val()}
})

//Au click sur le btn envoyer mon badge
$("#btnConseilBadge").on('click', function(){
    //Au click de envoyer mon badge
    var atrrExist =  $(this).attr('badge_url');
    
    if (typeof atrrExist !== 'undefined' && atrrExist !== false) {
        //Envoie du badge à l'établissement
        $.ajax({
            url : atrrExist,
            method : "POST",
            data: {idEcole: getCurrentEcol()},
            beforeSend: function (){
                writeTextAssistante("Votre Badge est en cours d'envoi ...");
            }
        }).done( function(response){
            //Si l'appel s'est bien passée

            //Enregistrer l'actions envoie de badge
            saveVisiteTrace("envoie-badge");

            writeTextAssistante("Votre Badge a bien été envoyé à l'établissement.");
            writeTextAssistante("Merci d'avoir soumit votre Badge à l'établissement, un conseiller vous contactera dans les 48h !");
    
        })
    }
    else {
        //On afficher la modal d'inscription
        $('#login-register-modal').modal('show');
    }
})


 //Au click sur demande de rdv
 $("#prendre-rdv").on('click', function(){

    var atrrExist =  $('#btnConseilRdv').attr('rdv_url');
    var dateRdv = $("#date-rdv-input").val();
    console.log(dateRdv);

    if (typeof atrrExist !== 'undefined' && atrrExist !== false) {
        $('#btnConseilRdv').trigger('click');
        //Envoie du mail de demande de rdv
        $.ajax({
            url : atrrExist,
            method : "POST",
            data: {idEcole : getCurrentEcol(), dateRDV: dateRdv},
            beforeSend: function()
            {
                //Action assistante
                writeTextAssistante("Votre demande de RDV est en cours de traitement merci de patienter ...");
            }
        }).done( function(response){
            //Si l'appel s'est bien passée
            //
            saveVisiteTrace("demande-rdv");

            writeTextAssistante("Votre demande de RDV a bien été envoyé à l'établissement ");
            writeTextAssistante("Un conseiller d'orientation vous contactera dans les 48h.");
        })
    }
    else {
        //On afficher la modal d'inscription
        $('#login-register-modal').modal('show');
    }
 });

 //Parcour la liste des ecole et récupère l'id de l'ecole courante
function getCurrentEcol()
{
    var ecoles_scenes = $('.scene');

    //On cherche l'ecole en cours de visite pour activer le chabot approprié
    ecoles_scenes.each( function(i, ecole) {
        //Si l'ecole est celle afficher actuellement alors on récupère son id 
        if( $(ecole).hasClass('current'))
        {
            cfb_page_id = $(ecole).attr('idEcole');
        }
    });
    
    return cfb_page_id;
}

//Fonction pour faire parler l'assistance
function writeTextAssistante(message)
{
    var textWrapper2 = document.querySelector('.anT2');                    
          textWrapper2.innerHTML = message;
          textWrapper2.innerHTML = textWrapper2.textContent.replace(/\S/g, "<span class='letter' style='opacity:0;' >$&</span>");

    var animtext1 = anime.timeline()
    .add({
            targets: '.anT2 .letter',
            scale: [4,1],
            opacity: [0,1],
            translateZ: 0,
            easing: "easeOutExpo",
            duration: 950,
            delay: (el, i) => 70*i
    });
}


//Fonction pour enregistrer le démarrage de visite d'une ecole
//&& l'enregistrement de toutes les actions visiteurs au cours d'une visite
function saveVisiteTrace(type="start")
{
    var isAnonyme = true ;
    var visiteurID = "";
    
    if(type == "start")
        var url =  $(".visite-trace").attr("start_url");
    else
        var url =  $(".visite-trace").attr("actions_url");
    
    var atrrExist =  $("#btnConseilBadge").attr('badge_url');

    //On verifie si il s'agit d'une visite anonyme ou une visite identifier
    if (typeof atrrExist !== 'undefined' && atrrExist !== false) {
        visiteurID = $("#btnConseilBadge").attr('user') ;
        isAnonyme = false;
    }
  

    $.ajax({
        url : url,
        method : "POST",
        data: {idEcole : getCurrentEcol(), visiteurID: visiteurID, isAnonyme: isAnonyme, type: type},
    }).done( function(response){
        //
    })
}




