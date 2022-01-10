//On récupère les du form d'ajout d'ecole
var inputNomEcol = $('#nomEcole').val();
var inputnomCompletEcol = $('#nomCompletEcol').val();
var inputEmailEcol = $('#emailEcole').val();
var inputLienSiteWebEcol = $('#sitewebEcole').val();
var inputLienVisiteVirtuelEcole = $('#vvEcole').val();
var inputIdPageFacebook = $('#fbPageCode').val();
var lienVideo = $('#lienVideo').val();
var imghomeEcoleinput = $('#imghomeEcole').val();
var imghomeEcole = $('#imghomeEcole')[0].files[0] ;


var urlaction = $("#formAjouterEcole").attr('post_url') ;


//Configuration global de ajax
$.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('#token').val()}
})

//Au click sur valider pour ajouter une novelle ecole
$("#btnAjouterEcole").on("click", function(e){
    e.preventDefault();
    
    //Update des valeurs saisis
    updateVal();

    //Si les champs sont valid
    if(champsValid())
    {
        if(imgValid()){
            AjouterEcole();
        }
    }
});

//Au click sur annuler 
$("#btnAnnuler").on("click", function(e){
    e.preventDefault();
    $(".todesabled").css("display", "inline-block");
    $("#btnLoader").css("display", "none");
});

function AjouterEcole()
{
    var formData = new FormData();

    //Remplir la formData 
    formData.append('nom', inputNomEcol);
    formData.append('nomComplet', inputnomCompletEcol);
    formData.append('emailEcole', inputEmailEcol);
    formData.append('liensiteweb', inputLienSiteWebEcol);
    formData.append('lienvv', inputLienVisiteVirtuelEcole);
    formData.append('fbpageid', inputIdPageFacebook);
    formData.append('lienVideo', lienVideo);    
    formData.append('imghomeEcole', imghomeEcole);


    //Appel à la method de création d'une nouvelle ecole pour enregistrer l'ecole dans la db
    $.ajax({
        url : urlaction,
        method : "POST",
        processData: false,
        contentType: false,
        data : formData,
        // data: {
        //     nom: inputNomEcol, 
        //     emailEcole:inputEmailEcol, 
        //     liensiteweb: inputLienSiteWebEcol, 
        //     lienvv: inputLienVisiteVirtuelEcole,
        //     fbpageid: inputIdPageFacebook,
        //     lienVideo : lienVideo
        // },
        beforeSend : function(){
            $(".todesabled").css("display", "none");
            $("#btnLoader").css("display", "inline-block");
        }
    }).done( function(res){
        console.log(res.message);
        $(".todesabled").css("display", "inline-block");
        $("#btnLoader").css("display", "none");
        $("#ajoutecoleinfo").addClass("text-info");
        $("#ajoutecoleinfo").text(res.message) ;
        $("#ajoutecoleinfo").css("display", "inline-block");
        
        setTimeout(function(){
            $("#ajoutecoleinfo").css("display", "none");    
        }, 7000);

        //On réinitialise tout le champs
        $('#formAjouterEcole :input').each(function(){
            $(this).val("");
        });
    }).fail(function(res){
        //Erreur d'appel 
        
        $(".todesabled").css("display", "inline-block");
        $("#btnLoader").css("display", "none");

        $("#ajoutecoleinfo").addClass("text-danger");
        $("#ajoutecoleinfo").text(res.responseJSON.message);
        $("#ajoutecoleinfo").css("display", "inline-block");

        setTimeout(function(){
            $("#ajoutecoleinfo").css("display", "none");    
        }, 7000);

         //On réinitialise tout le champs
         $('#formAjouterEcole :input').each(function(){
            $(this).val("");
        });
        

    });
}

//Fonction de vérification des champs saisied
function champsValid()
{
    if(inputNomEcol == "" || inputnomCompletEcol =="" || inputEmailEcol == "" || inputLienSiteWebEcol == "" 
        || inputLienVisiteVirtuelEcole =="" || inputIdPageFacebook == "" || lienVideo == "")
    {
        $('#formAjouterEcole :input').each( function(){
            
            if($(this).val() == ""){
                // labelError.insertAfter($(this));
                errocss(this);
            }
            
            // console.log(this);
        });
        return false ;
    }
    else
    {
        return true ;
    }
        
        
}

//On verifie si l'img est valide (taille et type)
function imgValid()
{
    var Upload = function (file) {
        this.file = file;
    };
    
    Upload.prototype.getType = function() {
        return this.file.type;
    };
    Upload.prototype.getSize = function() {
        return this.file.size;
    };
    Upload.prototype.getName = function() {
        return this.file.name;
    };

    var upimg = new Upload(imghomeEcole);
    
    //Taille maxi 115 ko soit  115000 octets

    if(upimg.file.size > 120000 || (upimg.file.type !="image/png" && upimg.file.type !="image/jpeg" && upimg.file.type !="image/jpg"))
    {
        //Pour les img non valid
        $("#imghomeEcoleinput").tooltip({
            title : "Veuillez choisir une image valide : Une images valide est une image jpg/png d'une taille de 115ko maxi ",
            trigger : "manual"
        });
        $("#imghomeEcoleinput").trigger("focus");
        $("#imghomeEcoleinput").tooltip('show');

        //Image non valid
        return false;
    }
    else 
        return true ;
    
}


//Quand l'utisateur saisie ces info à nouveau on enlève les bordure rouge 
$('#formAjouterEcole :input').on("keypress", function(){
    $(this).tooltip('hide');
    errocss(this, false);
    // console.log(this);
  });


  //Quand l'utisateur écrit ...
  $('#formAjouterEcole :input').on("keypress", function(){
    $(this).tooltip('hide');
    errocss(this, false);
    // console.log(this);
  });

  $('.file-upload-default').on("change", function(){
    errocss(this, false);
    // console.log(this);
  });

  $('.file-upload-browse').on('click', function() {
    var file = $(this).parent().parent().parent().find('.file-upload-default');
    file.trigger('click');
  });

  //Pour les ajustement de bordure des champs erronée
  //element : jquery selector (#id_element ou .class)
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

function updateVal()
{
    //On récupère les du form d'ajout d'ecole
    inputNomEcol = $('#nomEcole').val();
    inputnomCompletEcol = $('#nomCompletEcol').val();
    inputEmailEcol = $('#emailEcole').val();
    inputLienSiteWebEcol = $('#sitewebEcole').val();
    inputLienVisiteVirtuelEcole = $('#vvEcole').val();
    inputIdPageFacebook = $('#fbPageCode').val();
    lienVideo = $('#lienVideo').val();
    imghomeEcoleinput = $('#imghomeEcole').val();
    imghomeEcole = $('#imghomeEcole')[0].files[0] ;

}