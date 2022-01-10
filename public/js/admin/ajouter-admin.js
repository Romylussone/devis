//On récupère les du form d'ajout d'ecole
var inputnewAdminNom = $('#newAdminNom').val();
var nputnewAdminPren = $('#ewAdminPren').val();
var inputnewAdminEmail = $('#newAdminEmail').val();
var inputnewAdminlogin = $('#newAdminlogin').val();
var inputnewAdminPwd = $('#newAdminPwd').val();
var inputnewAdmincPwd = $('#newAdmincPwd').val();

var url_addAdmin = $("#formAddnewAdmin").attr('post_url') ;


//Configuration global de ajax
$.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('#token').val()}
});

//Au click sur valider pour ajouter une novelle ecole
$("#btnAddAdmin").on("click", function(e){
    e.preventDefault();
    
    //Update des valeurs saisis
    updateVal();

    //Si les champs sont valid
    if(champsValid())
    {
        if(checkPwd()){
            ajouterAdmin();
        }
    }
});

//Au click sur annuler 
$("#btnAnnuler").on("click", function(e){
    e.preventDefault();

    // $(".todesabled").css("display", "inline-block");
    // $("#btnLoader").css("display", "none");
});

//Ajouter Admin
function ajouterAdmin()
{
    $.ajax({
        url : url_addAdmin,
        method : "POST",
        data: {
            loginAdmin: inputnewAdminlogin,
            nomAdmin:inputnewAdminNom, 
            prenAdmin: nputnewAdminPren, 
            pwdAdmin: inputnewAdminPwd,
            emailAdmin: inputnewAdminEmail
        },
        beforeSend : function(){
            $(".todesabled").css("display", "none");
            $("#btnLoader").css("display", "inline-block");
        }
    }).done( function(res){
        $(".todesabled").css("display", "inline-block");
        $("#btnLoader").css("display", "none");
        $("#ajouterAdmininfo").addClass("text-success");
        $("#ajouterAdmininfo").text(res.message) ;
        $("#ajouterAdmininfo").css("display", "inline-block");
        
        setTimeout(function(){
            $("#ajouterAdmininfo").css("display", "none");    
        }, 7000);

        //On réinitialise tout le champs
        $('#formAddnewAdmin :input').each(function(){
            $(this).val("");
        });
    }).fail(function(res){
        //Erreur d'appel 
        
        $(".todesabled").css("display", "inline-block");
        $("#btnLoader").css("display", "none");

        $("#ajouterAdmininfo").addClass("text-danger");
        $("#ajouterAdmininfo").text(res.responseJSON.message);
        $("#ajouterAdmininfo").css("display", "inline-block");

        setTimeout(function(){
            $("#ajouterAdmininfo").css("display", "none");    
        }, 7000);

         //On réinitialise tout le champs
         $('#formAddnewAdmin :input').each(function(){
            $(this).val("");
        });
        

    });
}


function checkPwd()
{
    if(inputnewAdminPwd != inputnewAdmincPwd)
    {
        $("#newAdminPwd").tooltip({
            title : "Les deux mots de passe entrer ne correspondent pas ",
            trigger : "manual"
        });
        $("#newAdminPwd").trigger("focus");
        $("#newAdminPwd").tooltip('show');

        $("#newAdminPwd").parent().addClass("has-danger");
        $("#newAdminPwd").addClass("form-control-danger");

        $("#newAdmincPwd").parent().addClass("has-danger");
        $("#newAdmincPwd").addClass("form-control-danger");

        return false
    }
    else 
        return true ;
}

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


//Quand l'utisateur saisie ces info à nouveau on enlève les bordure rouge 
$('#formAddnewAdmin :input').on("keypress", function(){
    errocss(this, false);
});


//Maj des val de champ
function updateVal()
{
    //On récupère les du form d'ajout d'ecole
    inputnewAdminNom = $('#newAdminNom').val();
    nputnewAdminPren = $('#ewAdminPren').val();
    inputnewAdminEmail = $('#newAdminEmail').val();
    inputnewAdminlogin = $('#newAdminlogin').val();
    inputnewAdminPwd = $('#newAdminPwd').val();
    inputnewAdmincPwd = $('#newAdmincPwd').val();

}

//Fonction de vérification des champs saisied
function champsValid()
{
    if(inputnewAdminlogin == "" || inputnewAdminPwd == "" || inputnewAdmincPwd == "" )
    {
        $('#formAddnewAdmin :input[required=required]').each( function(){
            if($(this).val() == ""){
                // labelError.insertAfter($(this));
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