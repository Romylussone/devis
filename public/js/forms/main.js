$(function() {
    var dataTypeSac;
    var jsonCostumersData = [];
    var jsonCostumersDataContacts = [];
    var demandeDevisData = new FormData();
    var nbsacplusClick = 0;

    $("#wizard").steps({
        headerTag: "h4",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: false,
        enablePagination: false,
        transitionEffectSpeed: 500,
        labels: {
            current: ""
        },
        //On verifie les champs d'une étape à une autre
        onStepChanging: function(e, currentIndex, newIndex) {
            /*
            * Si nous somme à l'étape 2 alors : Caractéristique du sac
            * 
            */
            if(currentIndex === 1){
                if( $("#taile-sac").text() == "" || $("#taile-sac").text() == "* Taile du sac :"
                        || $("#qtesac").text() == "" || $("#qtesac").text() == "* Qte désirée :"
                        || $("#grammage-sac").text() =="" || $("#grammage-sac").text() == "* Sélectionnez le grammage de vos sacs :")
                {
                    checkForErrors(currentIndex);
                    return false;
                }
            }

            //Si nous sommme à l'étape 3 : Type d'impression
            else if(currentIndex === 2 && $(".type-impression-c input:checked").val() === "imp-perso"){
                if($(".select-nb-couleur-perso").text() == "* Nombre de couleurs :" || $(".btn-import-logo").text() ==""
                || $(".select-nb-couleur-perso").text() == "")
                {
                    checkForErrors(currentIndex);
                    return false;
                }
                else {
                    if(jsonCostumersData.length == 0 || nbsacplusClick > 0){
                        //ici l'utilisateur n'a choisi qu'un seul type de sac
                        //On lance l'enregistrement des choix du demandeur
                        saveDataClient();

                        //On reinitialise le btn ajouter sac
                        nbsacplusClick = 0;

                        return true;
                    }
                }
            }else if(currentIndex === 2 ){
                if( jsonCostumersData.length == 0 || nbsacplusClick > 0){
                    //ici l'utilisateur n'a choisi qu'un seul type de sac
                    //On lance l'enregistrement des choix du demandeur

                    saveDataClient();

                    //On reinitialise le btn ajouter sac
                    nbsacplusClick = 0;

                    return true;
                }
            }

            //Si nous sommme à l'étape 4 : Infos demandeurs
            else if(currentIndex === 3 ){
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                var novalid = false;

                $('.form-contact input').each(function(){
                    if(this.required && $(this).val().length == 0)
                    {   
                        novalid = true;
                        checkForErrors(currentIndex, this);
                    }

                    if($(this).attr('type') == 'email' && !emailReg.test($(this).val())){
                        novalid = true;
                        checkForErrors(currentIndex, this);
                    }

                    if($(this).attr('type') == 'checkbox' && !this.checked){
                        // console.log(this);
                        novalid = true;
                        checkForErrors(currentIndex, this);
                    }

                })
                if(novalid){
                    return false;
                }
                else{
                    var nbligne=0;
                    // var modeltabrecap = document.getElementById("first-cell-modal").cloneNode(true);
                    // num : i+1,
                    // typeSac: typeSac ,
                    // couleurSac: couleursac,
                    // qteSac: qtesac,
                    // tailleSac: taillesac,
                    // tailleanseSac: tailleanse,
                    // grammageSac: grammagesac
                    if($('.first-cell-modal').css('display') == 'none'){
                        
                        //Première entré
                        for (var i = 0; i < jsonCostumersData.length; i++){
                            // console.log(i);
                            if(i==0){
                                //Première colonne : premier type de sac
                                $('.first-cell-modal').css('display', 'block');
                                $('.first-cell-modal .val-typesac').text(jsonCostumersData[i][0].typeSac);
                                $('.first-cell-modal .val-qte').text(jsonCostumersData[i][0].qteSac);
                                $('.first-cell-modal .val-colorsac').text(jsonCostumersData[i][0].couleurSac);
                                $('.first-cell-modal .val-taille').text(jsonCostumersData[i][0].tailleSac);
                                $('.first-cell-modal .val-gram').text(jsonCostumersData[i][0].grammageSac);
                                
                                if(jsonCostumersData[i][0].tailleanseSac !="" ){
                                    $('.first-cell-modal .val-tailleanse').text(jsonCostumersData[i][0].tailleanseSac);
                                    $('.first-cell-modal .bill-unit-taille-anse').css('display', 'block');
                                }
                            }else{
                                //
                                var modeltabrecap = document.getElementById("first-cell-modal").cloneNode(true);
                                
                                $(modeltabrecap).css('display', 'block');
                                $(modeltabrecap).attr('id', 'cell-modal-'+i);
                                $(modeltabrecap).attr('num', i);
    
                                $(modeltabrecap).removeClass('first-cell-modal');
                                $(modeltabrecap).addClass('cell-modal'+i);
                                $(modeltabrecap).find('.val-typesac').text(jsonCostumersData[i][0].typeSac);
                                $(modeltabrecap).find('.val-qte').text(jsonCostumersData[i][0].qteSac);
                                $(modeltabrecap).find('.val-colorsac').text(jsonCostumersData[i][0].couleurSac);
                                $(modeltabrecap).find('.val-taille').text(jsonCostumersData[i][0].tailleSac);
                                $(modeltabrecap).find('.val-gram').text(jsonCostumersData[i][0].grammageSac);
    
                                if(jsonCostumersData[i][0].tailleanseSac !="" ){
                                    $(modeltabrecap).find('.val-tailleanse').text(jsonCostumersData[i][0].tailleanseSac);
                                    $(modeltabrecap).find('.bill-unit-taille-anse').css('display', 'block');
                                }
    
                                $('.recap-container').append(modeltabrecap);
                            }
                        }
                    }else {

                        //Seconde entré
                        $('.recap-container .bill-cell').each(function () {
                            if($(this).hasClass('first-cell-modal')){
                                $(this).css('display', 'none');
                            }else{
                                $(this).remove();
                            }
                        })
                       //Première entré
                        for (var i = 0; i < jsonCostumersData.length; i++){
                            // console.log(i);
                            if(i==0){
                                //Première colonne : premier type de sac
                                $('.first-cell-modal').css('display', 'block');
                                $('.first-cell-modal .val-typesac').text(jsonCostumersData[i][0].typeSac);
                                $('.first-cell-modal .val-qte').text(jsonCostumersData[i][0].qteSac);
                                $('.first-cell-modal .val-colorsac').text(jsonCostumersData[i][0].couleurSac);
                                $('.first-cell-modal .val-taille').text(jsonCostumersData[i][0].tailleSac);
                                $('.first-cell-modal .val-gram').text(jsonCostumersData[i][0].grammageSac);
                                
                                if(jsonCostumersData[i][0].tailleanseSac !="" ){
                                    $('.first-cell-modal .val-tailleanse').text(jsonCostumersData[i][0].tailleanseSac);
                                    $('.first-cell-modal .bill-unit-taille-anse').css('display', 'block');
                                }
                            }else{
                                //
                                var modeltabrecap = document.getElementById("first-cell-modal").cloneNode(true);
                                
                                $(modeltabrecap).css('display', 'block');
                                $(modeltabrecap).attr('id', 'cell-modal-'+i);
                                $(modeltabrecap).attr('num', i);

                                $(modeltabrecap).removeClass('first-cell-modal');
                                $(modeltabrecap).addClass('cell-modal'+i);
                                $(modeltabrecap).find('.val-typesac').text(jsonCostumersData[i][0].typeSac);
                                $(modeltabrecap).find('.val-qte').text(jsonCostumersData[i][0].qteSac);
                                $(modeltabrecap).find('.val-colorsac').text(jsonCostumersData[i][0].couleurSac);
                                $(modeltabrecap).find('.val-taille').text(jsonCostumersData[i][0].tailleSac);
                                $(modeltabrecap).find('.val-gram').text(jsonCostumersData[i][0].grammageSac);

                                if(jsonCostumersData[i][0].tailleanseSac !="" ){
                                    $(modeltabrecap).find('.val-tailleanse').text(jsonCostumersData[i][0].tailleanseSac);
                                    $(modeltabrecap).find('.bill-unit-taille-anse').css('display', 'block');
                                }

                                $('.recap-container').append(modeltabrecap);
                            }
                        }
                    }
                    
                    
                    return true;
                }
            }
            //Etape 3 recapitulatif de demande de devis
            else if (currentIndex === 4){
                
            }
            
            return true;
         },

         onFinishing: function(){
            saveDataClientContact();
            demandeDevisData.append("contacts", JSON.stringify(jsonCostumersDataContacts));
            demandeDevisData.append("articles", JSON.stringify(jsonCostumersData));
            
            console.log(demandeDevisData);
            //Près pour l'appel ajax vers l'api php
            //En attente du backend
            
            $('.finishing').css('display', 'none');
            $('.demande-ok').css('display', 'block');

            //On reinitialiser
            $('.form-contact input').each(function() {
                $(this).val("");
            })
         },

         onFinished: function(e, currentIndex) {             
             console.log("ococccc onFinished");
         }
    });
    $('.forward').click(function() {
        $("#wizard").steps('next');
        loadImg();
    })

    $('.btn-finish').click(function() {
        $("#wizard").steps('finish');
    })

    /**
     * 
     * 
     * Fonction de controle des champs obligatoire
     */    
    function checkForErrors(stepnumber, obj=null) {
        
        //Etapes Caractéristique du sac
        if(stepnumber == 1)
        {
            if($("#taile-sac").text() == "* Taile du sac :")
            {
                $("#taile-sac").css("border-bottom-color", "#a2112c");
            }
            if($("#qtesac").text() == "* Qte désirée :")
            {
                $("#qtesac").css("border-bottom-color", "#a2112c");
            }
            if($("#grammage-sac").text() == "* Sélectionnez le grammage de vos sacs :")
            {
                $("#grammage-sac").css("border-bottom-color", "#a2112c");
            }
        }

        //Etapes type d'impression
        if(stepnumber == 2){
            if($(".select-nb-couleur-perso").text() == "* Nombre de couleurs :")
            {
                $(".select-nb-couleur-perso").css("border-bottom-color", "#a2112c");
            }
        }

        //Etapes contacs : L'utilisateur saisie les infos de contact
        if(stepnumber == 3 ){
            $(obj).css("border-bottom-color", "#a2112c");
            
            //Si le champs secteur d'activité n'est pas saisie
            if($('.secteur-activite').text() == "* Secteur d'activité :"){
                $('.secteur-activite').css("border-bottom-color", "#a2112c");
            }
            
            if($(obj).attr('type') == 'checkbox' && !obj.checked){
                $('.cond-utiles').css("border-color", "#a2112c");
            }
        }
    }

    // var dp1 = $('#dp1').datepicker().data('datepicker');
    // dp1.selectDate(new Date());
    // var dp2 = $('#dp2').datepicker().data('datepicker');
    // dp2.selectDate(new Date());
    // var dp3 = $('#dp3').datepicker().data('datepicker');
    // dp3.selectDate(new Date());
    // var dp4 = $('#dp4').datepicker().data('datepicker');
    // dp4.selectDate(new Date());

    $('html').click(function() {
        $('.select .dropdown').hide();
    });
    $('.select').click(function(event) {
        event.stopPropagation();
    });
    $('.select .select-control').click(function() {
        $(this).parent().next().toggle();

        if($(this).css('border-bottom-color') == 'rgb(162, 17, 44)')
        {
            $(this).css('border-bottom-color','#5d718e');
        }
    })

    $('.select .dropdown li').click(function() {
        $(this).parent().toggle();
        var text = $(this).attr('rel');
        $(this).parent().prev().find('div').text(text);
    })

    /**
     * Gestion de l'ajout d'un nouveau type de sac
     * 
     */
     //Au click sur le bouton ajouter un autre type de sac :
     $('.btn-sac-plus').on('click', function(){
        $("#wizard").steps('previous');
        $("#wizard").steps('previous');
        
        nbsacplusClick++;
        // saveDataClient();
     })

     /** 
      * Fonction pour l'enregistrement des données de demande de devis client
      * 
      * 
     */
     function saveDataClient(){
        // jsonCostumersData
        var typeSac,
            couleursac,
            qtesac,
            taillesac,
            tailleanse="",
            grammagesac,
            typeImpression,
            nbCouleurImpression="",
            withLogo;

        /*
        ** 01 : Type de sac
        **Récupération du type de sac
        */
        $('.ckbx-type-sac-selection input').each(function(){
            if(this.checked){
                typeSac = this.value;
            }
        })

        /*
        ** 02 : Caractéristique du sac : Couleur, taille, type de grammage et qte désiré
        **Récupération du type de sac
        */
       //**Couleur sac
        $('.btn-color-picker button').each(function(){
            if($(this).hasClass('color-chosen')){
                couleursac = $(this).attr('id');
            }
        })

        //** Taille sac
        taillesac = $("#taile-sac").text();

        //** Qte sac
        qtesac = $("#qtesac").text();

        //** Qte sac
        grammagesac = $("#grammage-sac").text();

        //**Taille anses */
        if($('.input-taille-anse').css('display') != 'none' && typeSac == 'anse'){
            tailleanse = $('#taille-anse').text();
        }
        else {
            tailleanse = "";
        }

        //Type Impression 
        if($('.form-show-for-personaliser').css('display') != 'none' 
        && $(".type-impression-c input:checked").val() === "imp-perso"
        && $(".btn-import-logo").text() == "Importer votre logo ici" ){
            typeImpression = "personaliser";
            nbCouleurImpression = $('.select-nb-couleur-perso').text();
        }
        else {
            typeImpression = "neutre";
        }

        if(jsonCostumersData.length > 0){
            var i = jsonCostumersData.length;
            jsonCostumersData.push([
                {  
                    num : i+1,
                    typeSac: typeSac ,
                    couleurSac: couleursac,
                    qteSac: qtesac,
                    tailleSac: taillesac,
                    tailleanseSac: tailleanse,
                    grammageSac: grammagesac
                }
            ]);
        }else {
            jsonCostumersData.push([
                {  
                    num : 1,
                    typeSac: typeSac ,
                    couleurSac: couleursac,
                    qteSac: qtesac,
                    tailleSac: taillesac,
                    tailleanseSac: tailleanse,
                    grammageSac: grammagesac
                }
            ]);
        }

        console.log(jsonCostumersData);

     }

     /**
      * Fonction pour enregistrer les infos de contact du demandeur
      */
     function saveDataClientContact(){
        // jsonCostumersDataContacts
        var nomEntreprise,
            sectactiviteEntreprise,
            nomContact,
            prenomsContact,
            emailContact,
            numeroContact,
            paysContact,
            villeContact,
            adrContact,
            adrLivContact,
            codePostaclContact

        //On parcours les champs inpyt à la récupération des données.
        $('.form-contact input').each(function(){
            switch($(this).attr('name'))
            {
                case 'nomEntreprise': 
                    nomEntreprise = $(this).val();
                    break;
                case 'nomContact': 
                    nomContact = $(this).val();
                    break;
                case 'prenomsContact':
                    prenomsContact = $(this).val();
                    break;
                case 'emailContact':
                    emailContact = $(this).val();
                    break;
                case 'numeroContact':
                    numeroContact = $(this).val();
                    break;
                case 'paysContact':
                    paysContact = $(this).val();
                    break;
                case 'villeContact':
                    villeContact = $(this).val();
                    break;
                case 'adresseContact':
                    adrContact = $(this).val();
                    break;
                case 'adrlivraisonContact':
                    adrLivContact = $(this).val();
                    break;
                case 'codepostalContact':
                    codePostaclContact = $(this).val();
                    break;
            }
            
            // emailContact
            // emailContact,
            // numeroContact
            // paysContact
            // villeContact
            // adresseContact
            // codepostalContact
            // adrlivraisonContact
        })

        //
        sectactiviteEntreprise = $('.secteur-activite').text();

        jsonCostumersDataContacts.push({
            nomEntreprise: nomEntreprise,
            sectactiviteEntreprise: sectactiviteEntreprise,
            nomContact: nomContact,
            prenomsContact: prenomsContact,
            emailContact: emailContact,
            numeroContact: numeroContact,
            paysContact: paysContact,
            villeContact: villeContact,
            adrContact: adrContact,
            adrLivContact: adrLivContact,
            codePostaclContac: codePostaclContact
        });
        console.log(jsonCostumersDataContacts);

     }

    /**
     * 
     *  
     * 
     * */
    function loadImg(){
        var typeSac ;
        
        //On recupère le type de sac
        $('.ckbx-type-sac-selection input').each(function(){
            if(this.checked)
            {
                typeSac = this.value;
            }
        })

        //On enticipe 
        $('.btn-color-picker button').each( function(){
            
            if($(this).hasClass('color-chosen'))
            {
                //On prépare le chargement de l'exemplaire d'image requis
                //On fait ceci car lors de l'ajout de nouveaux type de sac le script d'ajout respect une codification bien définis
                //En plus toutes les img seront des jpg
                var img_src = $('.img-type-sac').attr('imgsacBase')+'/'+typeSac+'-'+$(this).attr('id')+'.jpg';
                var img_profile_src = $('.img-type-sac').attr('imgsacBase')+'/'+typeSac+'-'+$(this).attr('id')+'-profile.jpg';

                $('.img-container-1 img').attr('src', img_src);
                $('.img-container-2 img').attr('src', img_profile_src);
        
                $('.board-type-sac span').text(typeSac);
                $('.board-color-sac span').text($(this).attr('id'));
                // console.log(img_src);
                // console.log(img_profile_src);
            }
        })

        
    }


     // Pour retirer un article 
     $('.recap-container').on('click','.btn-sac-moins', function(){
        $(this).parents('.bill-cell').css("display", "none");
        console.log("Avant suppression");
        console.log(jsonCostumersData);
        console.log("après suppression");
        console.log($(this).parents('.bill-cell').attr('num'));
        console.log(parseInt($(this).parents('.bill-cell').attr('num')));
        jsonCostumersData.splice(parseInt($(this).parents('.bill-cell').attr('num')), 1);
        console.log(jsonCostumersData);
    })

    //Pour uploader le logo du demandeur si celui-ci existe
    $('#logo').on('change', function (e) {
        var f = this.files[0];
        //On verifie la taille et le type du fichier uploader par le demandeur
        if(f.size > 2000 || (f.type !="image/png" && f.type !="image/jpeg" && f.type !="image/jpg"))
        {
            //
            $('.logo-error-msg').css('display','block');
        }
        else {
            demandeDevisData.append('logo', f);
        }
    })
})