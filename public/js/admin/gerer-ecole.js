var listeEcole = $("#listeEcole");
var listeEcoleBody = $("#listeEcole tbody");
var trEcole = "";
var urlGetEcole = $("#listeEcole").attr("get_url");
var btnLoader = $("#btnLoader");
var passage = 0 ;


$.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('#token').val()}
})
   
//Charger toute les ecoles de la db pour les affciher
function chargerEcole(){
    $.ajax({
        url : urlGetEcole,
        method : "get",
        beforeSend : function(){
            btnLoader.css("display", "");
            $("#listeEcole tbody").find('tr').css("display", "none");
            $("#premLigne").css("display", "");
        }
    }).done( function(response){
        var listEcol = jQuery.parseJSON(response);

        btnLoader.css("display", "none");

        $.each(listEcol, function(k, v){
            //On clone le btn ecole par defaut
            trEcole = "<tr>";
                trEcole = trEcole + '<td class="nomEcol"> '+v.nomEtabli+'</td>';
                trEcole = trEcole + '<td class="emailEcol"> '+v.email_etabli+'</td>';
                trEcole = trEcole + '<td class=""> '+smartTrim(v.sitewebEtabli, 12, ' ', '...')+'</td>';
                trEcole = trEcole + '<td class=""> '+smartTrim(v.lienVisiteEtabli, 12, ' ', '...')+'</td>';
                trEcole = trEcole + '<td class=""> <a href="#ecoleid_'+v.etablissementID+'" class="modifier" onClick="modifier(this)"><i class="mdi mdi-grease-pencil icon-sm"></i></a> \n ';
                trEcole = trEcole + ' <a id="'+v.etablissementID+'" class="supprimer" data-toggle="modal" data-target="#deleteEcoleModal" href="#"><i class="mdi mdi-delete-forever icon-sm icon-danger"></i></a> \n </td>';
            trEcole = trEcole + "</tr>";

            if(passage == 0)
                listeEcoleBody.append(trEcole);
            else
                $("#listeEcole tbody tr").last().after(trEcole);

            passage ++;
        })

        remplirForm(listEcol);

    }).fail( function(res) {

    })
}

//On lance le chargement des ecoles
chargerEcole();

//Shoten words
function smartTrim(str, length, delim, appendix) {
    if (str.length <= length) return str;

    var trimmedStr = str.substr(0, length+delim.length);

    var lastDelimIndex = trimmedStr.lastIndexOf(delim);
    if (lastDelimIndex >= 0) trimmedStr = trimmedStr.substr(0, lastDelimIndex);

    if (trimmedStr) trimmedStr += appendix;
    return trimmedStr;
}


//Remplir les formulaire pour préparer la modification d'une ecole
function remplirForm(ecole)
{
    var formContainer = $("#formContainer");    
    var copydiv = $("#formContainer div").first().clone();

    $.each(ecole, function(k, v){

        copydiv.attr("style", "display:none;");
        copydiv.attr("id", "ecoleid_"+v.etablissementID);
        copydiv.find("h4.ecole-a-modifier").text("Modifier les infos de "+v.nomEtabli);
        copydiv.find("button.btnUpdate").attr("id", + v.etablissementID);
        copydiv.find("input").attr("onKeypress", "onKeyPressFunc(this)");
        
        copydiv.find("input").each(function(){
            switch($(this).attr("id")){
                case "nomEcole":
                    $(this).val(v.nomEtabli);
                    break;
                case "nomCompletEcol":
                    $(this).val(v.nomCompletEtabli);
                    break;
                case "emailEcole":
                    $(this).val(v.email_etabli);
                    break;
                case "sitewebEcole":
                    $(this).val(v.sitewebEtabli);
                    break;
                case "vvEcole":
                    $(this).val(v.lienVisiteEtabli);
                    break;
                case "lienVideo":
                    $(this).val(v.lienVideo);
                    break;
                case "imghomeEcoleinput":
                    $(this).attr("old_img", v.cheminImghome);
                    $(this).val(v.cheminImghome);
                    break;
                case "fbPageCode":
                    $(this).val(v.fb_page_id);
                    break;
            }
        });
        
        
        $("#formContainer").append(copydiv);

        copydiv = $("#formContainer div").first().clone();

    })

}



$("#listeEcole > tbody a.modifier").on("click", function(){
    var secDivID = $(this).attr("href");
    $("#formVide").css("display", "none");
    $(secDivID).css("display", "");
})


//Annuler l'action par defaut du btn anuller
function annulerUpdate(e, element){
    e.preventDefault();
    $(".todesabled").css("display", "inline-block");
    $("#btnLoader").css("display", "none");
}


//Au click sur le btn modifier d'une ecole
function modifier(element) {
    $("#formContainer div.formdiv").each(function(){
        $(this).css("display","none");
    })
    var secDivID = $(element).attr("href");
    
    $("#formVide").css("display", "none");
    $(secDivID).css("display", "");
}


//Au cas ou on modifie une ecole
function updateEcole(event, element)
{
    //On annule l'effet par defaut du clic
    event.preventDefault();

    idEcole = $(element).attr("id");
    
    //On selectionne la div pratente 
    parentDiv = $("#ecoleid_"+idEcole);

    //On récupère toute les valeurs saisie dans les champs
    var nomEcole = $('#ecoleid_'+idEcole+' input#nomEcole').val();
    var nomComplet = $('#ecoleid_'+idEcole+' input#nomCompletEcol').val();
    var emailEcole = $('#ecoleid_'+idEcole+' input#emailEcole').val();
    var sitewebEcole = $('#ecoleid_'+idEcole+' input#sitewebEcole').val();
    var lienVisiteEtabli = $('#ecoleid_'+idEcole+' input#lienVisiteEtabli').val();
    var lienVideo = $('#ecoleid_'+idEcole+' input#lienVideo').val();
    var fb_page_id = $('#ecoleid_'+idEcole+' input#fb_page_id').val();

    //Pour l'image 
    //imghomeEcoleinput : est le nom de l'image selectionné par l'user selection
    //imgEcole : est le fichier uploader lui meme
    var imghomeEcoleinput = $('#ecoleid_'+idEcole+' input#imghomeEcoleinput').val();
    var old_imghomeEcole = $('#ecoleid_'+idEcole+' input#imghomeEcoleinput').attr("old_img");

    //Préparation de formdata pour le transfert des données
    var formData = new FormData();

    //Remplir la formData 
    formData.append('ecoleID', idEcole);
    formData.append('nom', nomEcole);
    formData.append('nomComplet', nomComplet);
    formData.append('emailEcole', emailEcole);
    formData.append('liensiteweb', sitewebEcole);
    formData.append('lienvv', lienVisiteEtabli);
    formData.append('fbpageid', fb_page_id);
    formData.append('lienVideo', lienVideo);



    //On vérifie chaque infos saisie pour lancer la req de maj
    if( fb_page_id == "" || lienVideo == "" || lienVisiteEtabli=="" || sitewebEcole=="" || 
    emailEcole=="" || nomComplet =="" || nomEcole =="")
    {
        $('#ecoleid_'+idEcole+' :input').each( function(){
            if( $(this).val() == "" && $(this).attr("id") != "imghomeEcole" ){
                errocss(this);
            }
        });
    }
    else {
        //On vérifie si l'image a été modifié ou pas
        if(imghomeEcoleinput != old_imghomeEcole)
        {
            var imgEcole = $('#ecoleid_'+idEcole+' input#imghomeEcole')[0].files[0];

            //On vérifie si l'img selectionnée correspond aux type d'images obligé
            if(imgValid(imgEcole, '#ecoleid_'+idEcole+' input#imghomeEcoleinput'))
            { 
                formData.append('imghomeEcole', imgEcole);
                ajaxUpdateEcole(formData, true);
            }
                

        }
        else {
            ajaxUpdateEcole(formData);
        }
    }
    
}


//Pour mettre les infos de l'ecole à jour
//isNewfile: true : si l'image à changée false sinon
function ajaxUpdateEcole(formData, isNewfile = false)
{
    var urlaction = $("#formContainer").attr("get_url");

    formData.append('imgMaj', isNewfile);
    
    //Appel à la method la maj des données de l'ecole
    $.ajax({
        url : urlaction,
        method : "POST",
        processData: false,
        contentType: false,
        data : formData,
        beforeSend : function(){
            $(".todesabled").css("display", "none");
            $("#btnLoaderUpdate").css("display", "");
        }
    }).done( function(res){
        console.log(res.message);
        $(".todesabled").css("display", "");
        $("#btnLoaderUpdate").css("display", "none");
        $("#majEcoleinfo").addClass("text-info");
        $("#majEcoleinfo").text(res.message) ;
        $("#majEcoleinfo").css("display", "inline-block");
        
        setTimeout(function(){
            $("#majEcoleinfo").css("display", "none");    
        }, 7000);

        //On réinitialise tout les champs
        $('#formAjouterEcole :input').each(function(){
            $(this).val("");
        });
        
        //On retoure vers le haut de la page
        $("#btnTop").trigger("click");
        
        //On lance le chargement des ecoles après modification d'une ecole
        chargerEcole();

    }).fail(function(res){
        //Erreur d'appel 
        
        $(".todesabled").css("display", "inline-block");
        $("#btnLoader").css("display", "none");

        $("#majEcoleinfo").addClass("text-danger");
        $("#majEcoleinfo").text(res.responseJSON.message);
        $("#majEcoleinfo").css("display", "inline-block");

        setTimeout(function(){
            $("#majEcoleinfo").css("display", "none");    
        }, 7000);

        //On réinitialise tout le champs
        $('#formAjouterEcole :input').each(function(){
            $(this).val("");
        });
        

    });

}

//Quand l'utisateur saisie ces info à nouveau on enlève les bordure rouge 
function onKeyPressFunc(elmnt)
{
    //Pour supprimer les bordure rouge d'un champs érroné
    errocss(elmnt, false);
}


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

//On verifie si l'img est valide (taille et type)
function imgValid(imghomeEcole, input)
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
        $(input).tooltip({
            title : "Veuillez choisir une image valide : Une images valide est une image jpg/png d'une taille de 115ko maxi ",
            trigger : "manual"
        });
        $(input).trigger("focus");
        $(input).tooltip('show');

        //Image non valid
        return false;
    }
    else 
        return true ;
    
}


//Onchange input of input file field
function uploaderImgFunc(element)
{
    $(element).parent().find('.form-control').val($(element).val().replace(/C:\\fakepath\\/i, ''));
    errocss(element, false);
}


function browseFile(e, element){
    e.preventDefault();
    var file = $(element).parent().parent().parent().find('.file-upload-default');
    file.trigger('click');
}

//Pour la suppression d'une ecole
$('#deleteEcoleModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // On récupère le btn qui a déclanché la modal 
    var idEcole = button.attr("id");
    var nomEcole = button.parent().parent().find(".nomEcol").text();
    var modal = $(this)
    modal.find('button.delete').attr("idEcole", idEcole);
    modal.find('.modal-title').text('Suppresion de ' + nomEcole)
    // modal.find('.modal-body input').val(recipient)
})

//Pour supprimer une ecole
$('#deleteEcoleModal').find('button.delete').on("click", function(e) {
    e.preventDefault();

    var url_del = $("#formContainer").attr("get_url2");
    $.ajax({
        url : url_del,
        method : "POST",
        data: {
            id: $(this).attr('idEcole')
        },
        beforeSend : function(){
            $("button.delete").css("display", "none");
            $("#delLoader").css("display", "inline-block");
        }
    }).done( function(res){
        $("button.delete").css("display", "");
        $("#delLoader").css("display", "none");
        $('#deleteEcoleModal').find('.modal-body').text('Ecole Supprimée !');

        setTimeout(function(){
            $("#deleteEcoleModal").modal('hide');
        }, 2000);

        //On lance le chargement des nouvelles ecoles après la suppression d'une ecole
        chargerEcole();

    }).fail(function(res){
        //Erreur d'appel 
        $("button.delete").css("display", "");
        $("#delLoader").css("display", "none");
        $('#deleteEcoleModal').find('.modal-body').text('Erreur de suppression !');
    });
});
