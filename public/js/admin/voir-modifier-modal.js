// Pour les offres en cous  : data-toggle="modal" data-target="#modifierFormeSac"
(function($) {
    //Configuration global de ajax
    var id = "";
    var libelle = "";
    var statutFormeSac="";
    var statutCouleurSac="";
    var url_update='',
        url_update_base='',
        url_delete='',
        url_delete_base='';
    var description = "";
    var taille_h ='',
        taille_l='',
        taille_s='',
        taille_libel='',
        taille_statut='',
        qte_sac='',
        qte_sac_libelle='', grammage_sac_libelle='', grammage_sac='', statut_grammage_sac='';
    // var etat = "non_expiré"

    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('#token').val()}
    });
    url_modifier = $('#modifierFormeSac').attr('post_url');

    //Au cliqué sur btnModifier Forme sac
    $('.btnvoirFormeSac').on('click', function(e) {
        
        id = $(this).parent().parent().attr('id');

        $(this).parent().parent().children().each(function(){
            if($(this).hasClass("libelle"))
            {
                libelle = $(this).text();
            }

            if($(this).hasClass("statut"))
            {
                statutFormeSac = $(this).text();
            }
        })

        $('#modal-modi-libelle').val(libelle);
        $('#modi-statut-forme-sac').val(statutFormeSac);
        $('#modal-modi-libelle').attr('libid', id);

        //get before
        url_update_base = $('#modifierFormeSac').attr('post_url');

        $('#modifierFormeSac').modal('toggle');

    });

    //Ajax de modification forme sac
    $('.btnModifierFormeSac').on('click', function(){
        libelle = $('#modal-modi-libelle').val();
        statutFormeSac = $('#modi-statut-forme-sac').val();
        id = $('#modal-modi-libelle').attr('libid');
        url_update = url_update_base+'/'+id;
        
        data = {
            id:id,
            libelle: libelle,
            statut: statutFormeSac,
        };

        modifier(data, url_update, 'post', '#modifierFormeSac', '.ligneFormeSacID');
    })

    //Au cliqué sur btnvoirCouleurSac Forme sac
    $('.btnvoirCouleurSac').on('click', function(e) {
        id = $(this).parent().parent().attr('id');

        $(this).parent().parent().children().each(function(){
            if($(this).hasClass("libelle"))
            {
                libelle = $(this).text();
            }
            if($(this).hasClass("statut"))
            {
                statutCouleurSac = $(this).text();
            }
        })

        $('#modal-modi-couleur-libelle').val(libelle);
        $('#modi-statut-couleur-sac').val(statutCouleurSac);
        $('#modal-modi-couleur-libelle').attr('libid', id);

        //get before
        url_update_base = $('#modifierCouleurSac').attr('post_url');

        $('#modifierCouleurSac').modal('toggle');

    });

    //Ajax de modification couleur sac
    $('.btnModifierCouleurSac').on('click', function(){
        libelle = $('#modal-modi-couleur-libelle').val();
        statutCouleurSac = $('#modi-statut-couleur-sac').val();
        id = $('#modal-modi-couleur-libelle').attr('libid');
        url_update = url_update_base+'/'+id;
        
        data = {
            id:id,
            libelle: libelle,
            statut: statutCouleurSac,
        };

        modifier(data, url_update, 'post', '#modifierCouleurSac', '.ligneCouleurSacID');
    })

    //Taille sac
    //**
    //Au cliqué sur btnvoirCouleurSac Forme sac
    $('.btnvoirTailleSac').on('click', function(e) {
        id = $(this).parent().parent().attr('id');

        $(this).parent().parent().children().each(function(){
            if($(this).hasClass("hauteur"))
            {
                taille_h = $(this).text();
            }
            if($(this).hasClass("largeur"))
            {
                taille_l = $(this).text();
            }
            if($(this).hasClass("souflet"))
            {
                taille_s = $(this).text();
            }
            if($(this).hasClass("libelle"))
            {
                taille_libel = $(this).text();
            }
            if($(this).hasClass("statut"))
            {
                taille_statut = $(this).text();
            }
            
        })

        $('#modal-modi-taille-libelle').val(taille_libel);
        $('#modal-modi-taille-h').val(taille_h);
        $('#modal-modi-taille-l').val(taille_l);
        $('#modal-modi-taille-s').val(taille_s);
        $('#modi-statut-taille-sac').val(taille_statut);

        $('#modifierTailleSac').attr('tailleSacID', id);

        //get before
        url_update_base = $('#modifierTailleSac').attr('post_url');

        $('#modifierTailleSac').modal('toggle');

    });

    //Ajax de modification couleur sac
    $('.btnModifierTailleSac').on('click', function(){
        taille_libel = $('#modal-modi-taille-libelle').val();
        taille_h = $('#modal-modi-taille-h').val();
        taille_l = $('#modal-modi-taille-l').val();
        taille_s = $('#modal-modi-taille-s').val();
        taille_statut = $('#modi-statut-taille-sac').val();

        id = $('#modifierTailleSac').attr('tailleSacID');
        url_update = url_update_base+'/'+id;
        
        data = {
            id:id,
            libelle: taille_libel,
            hauteur: taille_h,
            largeur: taille_l,
            souflet: taille_s,
            statut: taille_statut,
        };

        modifier(data, url_update, 'post', '#modifierTailleSac', '.ligneTailleSacID');
    })


     //Au cliqué sur btnvoirQteSac sac
     $('.btnvoirQteSac').on('click', function(e) {
        
        id = $(this).parent().parent().attr('id');

        $(this).parent().parent().children().each(function(){
            if($(this).hasClass("libelle"))
            {
                qte_sac_libelle = $(this).text();
            }

            if($(this).hasClass("qte"))
            {
                qte_sac = $(this).text();
            }
        })

        $('#modal-modi-qte-libelle-sac').val(qte_sac_libelle);
        $('#modal-modi-qte-sac').val(qte_sac);
        $('#modifierQteSac').attr('qteSacID', id);

        //get before
        url_update_base = $('#modifierQteSac').attr('post_url');

        $('#modifierQteSac').modal('toggle');

    });

    //Ajax de modification qte sac
    $('.btnModifierQteSac').on('click', function(){
        qte_sac_libelle = $('#modal-modi-qte-libelle-sac').val();
        qte_sac= $('#modal-modi-qte-sac').val();
        id = $('#modifierQteSac').attr('qteSacID');

        url_update = url_update_base+'/'+id;
        
        data = {
            id:id,
            libelle: qte_sac_libelle,
            qte: qte_sac,
        };

        modifier(data, url_update, 'post', '#modifierQteSac', '.ligneQteSacID');
    })


     //Au cliqué sur btnvoirGrammageSac sac
     $('.btnvoirGrammageSac').on('click', function(e) {
        
        id = $(this).parent().parent().attr('id');

        $(this).parent().parent().children().each(function(){
            if($(this).hasClass("libelle"))
            {
                grammage_sac_libelle = $(this).text();
            }

            if($(this).hasClass("grammage"))
            {
                grammage_sac = $(this).text();
            }
            if($(this).hasClass("statut"))
            {
                statut_grammage_sac = $(this).text();
            }
        })

        $('#modal-modi-libelle-sac').val(grammage_sac_libelle);
        $('#modal-modi-grammage-sac').val(grammage_sac);
        $('#modi-statut-grammage-sac').val(statut_grammage_sac);
        $('#modifierGrammageSac').attr('grammageSacID', id);

        //get before
        url_update_base = $('#modifierGrammageSac').attr('post_url');

        $('#modifierGrammageSac').modal('toggle');

    });

    //Ajax de modification grammage sac
    $('.btnModifierGrammageSac').on('click', function(){
        grammage_sac_libelle = $('#modal-modi-libelle-sac').val();
        grammage_sac = $('#modal-modi-grammage-sac').val();
        statut_grammage_sac = $('#modi-statut-grammage-sac').val();

        id = $('#modifierGrammageSac').attr('grammageSacID');

        url_update = url_update_base+'/'+id;
        
        data = {
            id:id,
            libelle: grammage_sac_libelle,
            grammage: grammage_sac,
            statut: statut_grammage_sac
        };

        modifier(data, url_update, 'post', '#modifierGrammageSac', '.ligneGrammageSacID');
    })


    //Ajouter 
    function modifier(data, url, method, modalidName, ligneClassName)
    {
        if(method ==='get'){
            $.ajax({
                url : url,
                method : method,
                beforeSend : function(){
                    $(modalidName).modal('toggle');
                }
            }).done( function(res){
                showSuccesModifier(res.message);
                
                // $(ligneClassName).each(function(){
                //     if($(this).attr('id') == id) {
                //       $(this).css('display', 'none');
                //     }
                // })
            }).fail(function(res){
                showEchecModifier(res.message);
            });
        }
        else {
            $.ajax({
                url : url,
                method : method,
                data: data,
                beforeSend : function(){
                    $(modalidName).modal('toggle');
                }
            }).done( function(res){
                showSuccesModifier(res.message);
                
                // $(ligneClassName).each(function(){
                //     if($(this).attr('id') == id) {
                //       $(this).css('display', 'none');
                //     }
                // })
            }).fail(function(res){
                showEchecModifier(res.message);
            });
        }
            
        
        
    }

})(jQuery);