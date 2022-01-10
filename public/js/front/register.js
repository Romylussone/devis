
//Pour basculer entre Connexion et Inscription
function active(i)
{
    switch(i)
    {
        case 1 : //Activer l'inscription
        $("#conexionForm").css("display", "none");
        $("#inscriptionForm").css("display", "block");
            break;
        case 0 : //Activer la connexion
        $("#conexionForm").css("display", "block");
        $("#inscriptionForm").css("display", "none");
            break;
    }
}

// Adapter la taille des btn
$(window).on('resize', function() {
    if($(window).width() < 1024) {
        $('.rezise-btn').addClass('mt-4');
    }
    else {
        $('.rezise-btn').removeClass('mt-4');
    }
});


// Etape 0 : 
//On récupère les info d'inscripton
var inputNom = $('#inputnom').val();
var inputPrenom = $('#inputpren').val();
var inputEmail = $('#inputemail').val();
var isBac = true ;
var isForMe = true ;
// Etape 1 : 
//On récupère le choix du visteur si il fait la visite pour lui même ou pour tiers
var quivisite = $('input[name=visitePour]:checked').val() || '';

// Etape 2 :
//On récupère les infos suplémentaire pour les visiteur qui font la visite pour tiers
var affiliationVisiteur = $('#selecAffiliation').val() ;
var affiliationVisiteurTxt = $("#selecAffiliation option:selected").text().toLowerCase();
var numerotelVisiteurParent = $('#telParent').val();
var nomPersonneConcern = $('#nomtiers').val();
var prenPersonneConcern = $('#prentiers').val();

//Etape 3 
//On récupère les infos pour la création du badge
//*** Cas Oui BAC
var typeBacVisiteur = $('#selecTypeBac').val();
var typeBacVisiteurText = $("#selecTypeBac option:selected").text().toLowerCase();
var anneeBac = $('#anneeBac').val();
//---
var niveauEtudSup = $('#selecNiveauSup').val();
// var niveauEtudSup = $("#selecNiveauSup option:selected").text().toLowerCase();
var numeroTelVisiouiBac = $("#numtel").val();
//----
var experiencePro = $("#expepro").val();
var domaineExpepro = $("#domaineExpepro").val();

//*** Cas non BAC
// var niveauScolaire = $("#selecNiveauSco").val();
var niveauScolaire = $("#selecNiveauSco option:selected").text().toLowerCase();
var etablisementActuelVisiteur = $("#inputetabliactu").val();
//---
var orientationEtudSupVisi = $('#inputOrientation').val();
var numeroTelVisinonBac = $('#inputnumtelnonBac').val();


//Pour tester et mettre les infos saisie à jour
function updateVal()
{
    //Pour l'étape 0 maj
    inputNom = $('#inputnom').val();
    inputPrenom = $('#inputpren').val();
    inputEmail = $('#inputemail').val();

    //Pour l'etape 1 maj
    quivisite = $('input[name=visitePour]:checked').val() || '';
    isForMe = (quivisite =="autre") ? false : true ;

    //Pour l'etape 2 maj
    affiliationVisiteur = $('#selecAffiliation').val() || '';
    affiliationVisiteurTxt = $("#selecAffiliation option:selected").text().toLowerCase();
    numerotelVisiteurParent = $('#telParent').val();
    nomPersonneConcern = $('#nomtiers').val();
    prenPersonneConcern = $('#prentiers').val();


    //Pour l'étape 3 maj
    //*** Cas Oui BAC
    typeBacVisiteur = $('#selecTypeBac').val();
    typeBacVisiteurText = $("#selecTypeBac option:selected").text().toLowerCase();
    anneeBac = $('#anneeBac').val();
    //---
    niveauEtudSup = $('#selecNiveauSup').val();
    // vniveauEtudSupText = $("#selecNiveauSup option:selected").text().toLowerCase();
    numeroTelVisiouiBac = $("#numtel").val();
    //----
     experiencePro = $("#expepro").val();
     domaineExpepro = $("#domaineExpepro").val();

    //*** Cas non BAC
    // niveauScolaire = $("#selecNiveauSco").val();
    niveauScolaire = $("#selecNiveauSco option:selected").text().toLowerCase();
    etablisementActuelVisiteur = $("#inputetabliactu").val();
    //---
    orientationEtudSupVisi = $('#inputOrientation').val();
    numeroTelVisinonBac = $('#inputnumtelnonBac').val();
    
}


//Fonction exécuté quand l'utilisateur appuie sur suivant
function registerNext(etape)
{    
    switch (etape){
        case  1 :
            //On vérifie si les champs Nom, Prenom et email ne sont pas vide
            if( inputNom !="" && inputPrenom !="" && inputEmail != "")
            {
                $('#inscriptionForm :input').each(function(){
                    $(this).tooltip('hide');
                  });

                //Vérification de l'email
                $.ajax({
                    url : $('#linkcheckmail').attr('url'),
                    method : "POST",
                    data: {email: inputEmail}, 
                    beforeSend : function(){
                        $("#inputEmailchecking").css("display", "block");
                    }
                }).done( function(response){
                    //Si l'appel s'est bien passé
                    // Si l'email n'existe pas dejà
                    $("#inputEmailchecking").css("display", "none");
                    // On affiche l'etape suivante
                    $("#inscriptionForm").hide();
                    $("#inforSupleVisitePourAutre").hide();
                    $("#creationBadge").hide();
                    $("#pourQuiVisite").show("slow");
        
                }).fail( function(response){
                    //Erreur d'appel 
                    $("#inputEmailchecking").css("display", "none");
                    switch(response.responseJSON.type)
                    {
                        case 'emailexist' :
                            //On affiche que l'email est dejà utilisé
                            $("#inputemail").tooltip({
                                title : response.responseJSON.message,
                                trigger : "manual"
                            });
                            $("#inputemail").trigger("focus");
                            $("#inputemail").tooltip('show');

                            //Ajustement du champ pour mise en évidence de l'erreur
                            errocss("#inputemail");
                            break;
                        default  :
                            
                            break;
                    }
                });
            }
            else{
                //Rensigner les champs obligatoire
                //Pour invalider les champs requis laissé vide par le user
                $("#inscriptionForm :input").each(function(){
                    if($(this).val() ==""){
                        errocss(this);
                    }
                });
            }
            break;
        case 2 :
            //On passe à la création de badge
            quivisite = $('input[name=visitePour]:checked').val() || ''
            if(quivisite == "autre")
            {
                $("#inforSupleVisitePourAutre").show();
                $(".questionBac").html("La Personne a-t-elle le Bac ?");

                //Si visite pour Autre alors l'étapce suivante c'est la demande d'information supplementaire
                $("#inscriptionForm").hide();
                $("#pourQuiVisite").hide();
                $("#creationBadge").hide();
            }
            else{
                $("#inforSupleVisitePourAutre").hide();
                $(".questionBac").html("Avez-vous le BAC ?");

                //Si visite pour moi meme alors l'etape suivante c'est la création de dabdge
                $("#inscriptionForm").hide();
                $("#pourQuiVisite").hide();
                $("#creationBadge").show("slow");
            }
            
            break;
        case 3 :
            // On rentre ici lorsque la visite se fait pour une autre personne
            $("#inforSupleVisitePourAutre").hide();
            $("#inscriptionForm").hide();
            $("#pourQuiVisite").hide();
            $("#creationBadge").show("slow");

            break;
        
        default :
            //On retourne au formulaire de connexion
            $("#pourQuiVisite").hide();
            $("#inforSupleVisitePourAutre").hide();
            $("#creationBadge").hide();
            $("#inscriptionForm").show("slow");

            break;
    }
    
    updateVal();
}

//Permet d'activer le formulaire des Non Bac
function activateFormNonBac()
{
    $("#ouiBacForm").hide();
    $("#nonBacForm").show("slow");

    //On met isBac à false
    isBac = false ;
}

//Permet d'activer le formulaire BAC active par defaut
function activateFormBac()
{
    $("#nonBacForm").hide();
    $("#ouiBacForm").show("slow");

    //On met la valeur de isBac à true par
    isBac = true ;
}


//Pour revenir à un formulaire donné
function registerBack(e)
{
    switch (e)
    {
        case 0 :
            //On retourne au formulaire d'inscription/Connexion
            $("#pourQuiVisite").hide();
            $("#inforSupleVisitePourAutre").hide();
            $("#inscriptionForm").show("slow");
            $("#creationBadge").hide();

            break ;
        case 1 :
            //On retourne à la question Pour qui visitez-vous
            $("#inscriptionForm").hide();
            $("#inforSupleVisitePourAutre").hide();
            $("#pourQuiVisite").show("slow");
            $("#creationBadge").hide();
            break ;
        default : 
            //On retourne au formulaire de connexion
            $("#pourQuiVisite").hide();
            $("#inforSupleVisitePourAutre").hide();
            $("#creationBadge").hide();
            $("#inscriptionForm").show("slow");

            break ;
    }
    //Test
    updateVal();
}


//Fonction de vérification des champs saisied
function fieldsValid(wf)
{
    //
    return true ;
}


//Configuration global de ajax
$.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('#token').val()}
})

//Fonction d'inscription et de validation des données de l'utilisateur
function register()
{
    updateVal();
    var urlaction = $("#inscription").attr('action') ;

    //---- On vérifie si les valeurs saisies par l'utilisateur sont valid
    if(fieldsValid(isBac))
    {
        //Appel à la method d'inscription pour sauvegarder les données du visiteur
        $.ajax({
            url : urlaction,
            method : "POST",
            data: {nom: inputNom, pren:inputPrenom, email: inputEmail},
            beforeSend : function(){
                $("#chargement-inscription").css("display", "block");
            }
        }).done( function(response){
            //Si l'appel s'est bien passé
            //On lance la création du badge
            createBadge(response);

            //On envoie un line de validation à l'adresse mail spécifié
            sendcodeverif(response, inputEmail);

        }).fail({
            //Erreur d'appel 
        });
    }
    else
    {
        //Données saisie non valid
    }
}


//Fonction de création de Badge
function createBadge(d)
{
    
    var djs = JSON.parse(d);
    var urlacreatebadge = $("#createBadgeForm").attr('action') ;
    // console.log(isBac);
    
    if(djs.visiteurID != "")
    {
        if(isBac)
        {
            var datavisi = {
                visiteuID: djs.visiteurID, affilliation : affiliationVisiteur,
                numerotelVisiteurParent : numerotelVisiteurParent,
                nomPersonneConcern : nomPersonneConcern,
                prenPersonneConcern : prenPersonneConcern,
                typeBacVisiteur : typeBacVisiteurText,
                anneeBac : anneeBac, 
                niveauEtudSup: niveauEtudSup,
                niveauScolaire: "", 
                etablisementActuelVisiteur : "",
                orientationEtudSupVisi : "",              
                numeroVisiteur: numeroTelVisiouiBac,
                domaineExpepro: domaineExpepro,
                experiencePro: experiencePro,
                isbac: isBac
            }
        }
        else {
            var datavisi = {
                visiteuID: djs.visiteurID, affilliation : affiliationVisiteur,
                numerotelVisiteurParent : numerotelVisiteurParent,
                nomPersonneConcern : nomPersonneConcern,
                prenPersonneConcern : prenPersonneConcern,
                typeBacVisiteur : "", anneeBac:"", 
                niveauEtudSup:"",
                niveauScolaire: niveauScolaire, 
                etablisementActuelVisiteur : etablisementActuelVisiteur,
                orientationEtudSupVisi : orientationEtudSupVisi,
                numeroVisiteur: numeroTelVisinonBac, 
                domaineExpepro: "",
                experiencePro: "",
                isbac: isBac
            }
        }
        
        //Si le visiteur fait la visite pour lui meme
        if(isForMe) 
        {
            $.ajax({
                url : urlacreatebadge+'/1',
                method : "POST",
                data: datavisi
            }).done( function(response){
                //Si l'appel s'est bien passé
                //On affiche le un message à l'utilisateur pour la confection de son badge
                // console.log(response);
                $('#login-register-modal').hide('slow');
                $('#login-register-modal').modal('hide');
                $("#chargement-inscription").css("display", "none");
                RedirectionJavascript(djs.urlwait);

            }).fail({
                //Erreur d'appel
                //Si la confection du badge n'a pas été fait on notifie le visiteur
            });
        }
        else {
            $.ajax({
                url : urlacreatebadge+'/0',
                method : "POST",
                data: datavisi
            }).done( function(response){
                //Si l'appel s'est bien passé
                //On affiche le un message à l'utilisateur pour la confection de son badge
                // console.log(response);
                $('#login-register-modal').hide('slow');
                $('#login-register-modal').modal('hide');
                $("#chargement-inscription").css("display", "none");
                RedirectionJavascript(link);
            }).fail({
                //Erreur d'appel
                //Si la confection du badge n'a pas été fait on notifie le visiteur
            });
        }
        
    }
}


//Pour rédiriger l'utilisateur si l'inscription c'est bien passéé
function RedirectionJavascript(url){
    // var link = $("#visite-link").val();
    window.location.href=""+url;
}

//Pour vérifier la taille de l'écrant et faire des ajustement
function checkWidth(init) {
    if ($(window).width() < 1024) {
        $('.rezise-btn').addClass('mt-4');
    }
  }
  
  $(document).ready(function() {
    checkWidth(true);
  
    // $(window).resize(function() {
    //   checkWidth(false);
    // });
  });

  //Fonction de connexion 
  function connexion()
  {
    //On récupère le lien de connexion
    var urlconnexion = $("#connexionForm").attr('action') ;

    //On récupère les infos de connexion du visiteur
    var login = $("#inputLogin").val();
    var password = $("#inputPwd").val();

    $.ajax({
        url : urlconnexion,
        method : "POST",
        data: {login: login, pwd: password},
        beforeSend : function(e){
            $("#snipper-connexion").css("display", "block");
        }
    }).done( function(response){
        //Si l'appel s'est bien passé
        $("#snipper-connexion").css("display", "none");
        
        $('#login-register-modal').hide('slow');
        $('#login-register-modal').modal('hide');
        //L'utilisateur est connectée donc on rédirige vers la visite
        r = JSON.parse(response);
        RedirectionJavascript(r.url);

    }).fail( function(res) {
        //Erreur d'appel
        $("#snipper-connexion").css("display", "none");
        switch(res.responseJSON.type){
            case "login":
                //Le login ou l'email est introuvable
                $("#inputLogin").tooltip({
                    title : res.responseJSON.message,
                    trigger : "manual"
                });
                $("#inputLogin").focus();
                $("#inputLogin").tooltip('show');

                //Ajustement des bordures du champ #inputLogin
                errocss("#inputLogin");
                break;
            case "pwd":
                //Le mot de passe saisie est incorrect (l'email est ok)
                $("#inputPwd").tooltip({
                    title : res.responseJSON.message,
                    trigger : "manual"
                });
                $("#inputPwd").focus();
                $("#inputPwd").tooltip('show');
                //Ajustement des bordures du champ #inputPwd
                errocss("#inputPwd");
                break;
            
        }
        // console.log(res.responseJSON);

    });
  }

  //Envoie le code de vérification de mail à l'adresse de l'utilisateur
  function sendcodeverif(res, email){
    var response = JSON.parse(res);

    $.ajax({
        url : response.url,
        method : "POST",
        data: {email: email, id: response.visiteurID}
    }).done( function(response){
        //Si l'appel s'est bien passé
        // console.log(response);

    })
  }

  //Pour les ajustement de bordure des champs erronée
  //element : jquery selector (#id_element ou .class)
  function errocss(element, isadd=true)
  {
    if(isadd)
    {
        //Ajustement de la bordure du champ
        $(element).css({
            'border-color':"#9f1d29",
            'box-shadow':' 0 0 0 0.2rem rgba(116, 33, 38, 0.25)'
        });
    }
    else{
        //Ajustement de la bordure du champ
        $(element).css({
            'border-color':'',
            'box-shadow':''
        });
    }
  }


  //Quand l'utisateur saisie ces info à nouveau on enlève les bordure rouge 
  $('#inscriptionForm :input').on("keypress", function(){
    $(this).tooltip('hide');
    errocss(this, false);
    // console.log(this);
  });


  //Quand l'utisateur écrit ...
  $('#connexionForm :input').on("keypress", function(){
    $(this).tooltip('hide');
    errocss(this, false);
    // console.log(this);
  });


  //Dans le champ email
  //Au click du la touche entrer du clavier par le user
  $("#inputLogin").on("keyup", function(event) {
    //KeyCode 13 correspond à Entrer    
    if(event.keyCode === 13){
        if($(this).val() !=""){
            //On met le focus sur le champs password pour que l'utilisateur saisisse son pwd
            $("#inputPwd").focus();
        }
    }
  });

  //Dans le champ mot de passe 
  //Au click du la touche entrer du clavier par le user
  $("#inputPwd").on("keyup", function(event) {
    //KeyCode 13 correspond à Entrer    
    if(event.keyCode === 13){
        //On déclanche un click sur le btn de connexion
        $("#btn-con").trigger("click");
    }
  });