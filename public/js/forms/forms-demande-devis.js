$(function() {
    var typeSac,
        couleurSac ;

    /** 
     * Etape 1 : Choix du type de sac
     * On parcours les checkbox pour voir le type de sac selectionné
     * Pour les sac en anses il y'a une colonne de plus à afficher
     * 
    */
    $('.ckbx-type-sac-selection input').on('change', function(){
        if(this.checked & this.value.indexOf('anse') >=0 )
        {
            $('.input-taille-anse').css('display','inline-block')
        }else {
            $('.input-taille-anse').css('display','none')
        }

        if(this.checked)
        {
            typeSac = this.value;
        }

    })


     /** 
     * Etape 2 : Choix de couleur et certains champs, caractéristique de sac
     *    
     * 
    */
      $('.btn-color-picker button').on('click', function(){
        //On retire la classe de couleur choisi à tous les autres btn
        $('.btn-color-picker button').removeClass('color-chosen');
        
        //Après avoir retriré la classe a tous les btn couleur, on l'ajoute au btn cliqué
        $(this).addClass('color-chosen');

        //On recupère le type de sac
        $('.ckbx-type-sac-selection input').each(function(){
            if(this.checked)
            {
                typeSac = this.value;
            }
        })

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
    })

     /** 
     * Etape 3 : En fonctiond de la couleut choisi à l'étape 1 et du type de sac choisi à l'étape 1
     * On affiche un exemplaire du sac
     *    
     * Type d'impression
    */
    $('.type-impression-c input').on('change', function(){
        if(this.checked & this.value.indexOf('imp-perso') >= 0){
            //On affiche les champs supplémentaire
            $('.form-show-for-personaliser').css('display','inline');
        }
        else {
            $('.form-show-for-personaliser').css('display','none');
        }
    })

     /** 
     * Etape 4 : Saisie des infors personnelles du demandeur de devis
     * On fait des controle de saisie sur les champs obligatoire et l'email depuis jqyery step onstepChanging
     *    
     * Type d'impression
    */
      $('.form-contact input').on('keyup', function(){
        if($(this).css('border-bottom-color') == 'rgb(162, 17, 44)')
        {
            $(this).css('border-bottom-color', '#5d718e');
        }
    })

   
    
})