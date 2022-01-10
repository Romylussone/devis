//On récupère les du form d'ajout d'ecole
var inputloginAdmin = $('#loginAdmin').val();
var nputadminPwd = $('#adminPwd').val();

var url_connexixon = $("#adminLoginForm").attr('post_url') ;


//Configuration global de ajax
$.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('#token').val()}
});

$("#btnConnexion").on("click", function(e){
    e.preventDefault();

    //Maj val
    updateVal();
    
    if(champsValid())
    {
        connexinAdmin();
    }
});


//Ajouter Admin
function connexinAdmin()
{
    $.ajax({
        url : url_connexixon,
        method : "POST",
        data: {
            login: inputloginAdmin,
            pwd: nputadminPwd            
        },
        beforeSend : function(){
            $("#btnLoader").css("display", "inline-block");
        }
    }).done( function(res){
        console.log(res);
        $("#btnLoader").css("display", "none");
        
        RedirectionJavascript(res.url);
    }).fail(function(res){
        //Erreur d'appel 
        
        $(".todesabled").css("display", "inline-block");
        $("#btnLoader").css("display", "none");

        $("#adminConneionInfo").addClass("text-danger");
        $("#adminConneionInfo").text(res.responseJSON.message);
        $("#adminConneionInfo").css("display", "inline-block");

        setTimeout(function(){
            $("#adminConneionInfo").css("display", "none");    
        }, 7000);

         //On réinitialise tout le champs
         $('#adminLoginForm :input').each(function(){
            $(this).val("");
        });
        

    });
}

//Quand l'utisateur saisie ces info à nouveau on enlève les bordure rouge 
$('#adminLoginForm :input').on("keypress", function(){
    errocss(this, false);
});

//Pour les ajustement de bordure des champs erronée
function errocss(element, isadd=true)
{
    if(isadd)
    {
        //Ajustement de la bordure du champ
        $(element).parent().addClass("has-danger");
        $(element).addClass("form-control-danger");
        
    }
    else{
        //Ajustement de la bordure du champ
        $(element).parent().removeClass("has-danger");
        $(element).removeClass("form-control-danger");
    }
}

//Dans le champ email
//Au click du la touche entrer du clavier par le user
$("#loginAdmin").on("keyup", function(event) {
    event.preventDefault();
    //KeyCode 13 correspond à Entrer    
    if(event.keyCode === 13){
        if($(this).val() !=""){
            //On met le focus sur le champs password pour que l'utilisateur saisisse son pwd
            $("#adminPwd").focus();
        }
    }
});

$("#adminLoginForm").on("submit", function(e){
    e.preventDefault();
    // $("#btnConnexion").trigger("clcik");
    // console.log('click');
    
    updateVal();
    
    if(champsValid())
    {
        connexinAdmin();
    }

});

//Fonction de vérification des champs saisied
function champsValid()
{
    if(inputloginAdmin == "" || nputadminPwd == "" )
    {
        $('#adminLoginForm :input[required=required]').each( function(){
            if($(this).val() == ""){
                errocss(this);
            }
        });
        return false ;
    }
    else
    {
        return true ;
    }
        
        
}

//Pour rédiriger l'utilisateur si l'inscription c'est bien passéé
function RedirectionJavascript(url){
    // var link = $("#visite-link").val();
    window.location.href=""+url;
}

//Maj des val de champ
function updateVal()
{
    //On récupère les du form d'ajout d'ecole
    inputloginAdmin = $('#loginAdmin').val();
    nputadminPwd = $('#adminPwd').val();

}