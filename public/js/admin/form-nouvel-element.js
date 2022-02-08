// Pour les offres en cous  : data-toggle="modal" data-target="#modifierFormeSac"
(function($) {
    'use strict';
    $.validator.setDefaults({
      submitHandler: function(element) {        
        var data = $(element).serializeArray();
        var btn = $(element).children('.btnAjouter');
        var span_loader = $(element).children('.span-loader');
        console.log(btn);
        console.log(span_loader);

        $.each(data, function(i, f) {
            console.log(f.name);
            console.log(f.value);
        });
        var url=$(element).attr('post_url');

        ajouter(data, url, btn, span_loader)

      }
    });
  

    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('#token').val()}
    });

    //On cliquer sur btnvoiroffre
    $('.btnAjouter').on('click', function(e) {
        // e.preventDefault();
        $(this).parent('form').validate({
            errorPlacement: function(label, element) {
              label.addClass('mt-2 text-danger');
              label.insertAfter(element);
            },
            highlight: function(element, errorClass) {
              $(element).parent().addClass('has-danger')
              $(element).addClass('form-control-danger')
            }
          });
    });

    //
    $('.btnAnnuler').on('click', function(e){
      e.preventDefault();
    });


    //Ajouter 
    function ajouter(data, url, btn=null, loader=null)
    {
        $.ajax({
            url : url,
            method : "post",
            data: data,
            beforeSend : function(){
                btn.css('display', 'none');
                loader.css('display', '');
            }
        }).done( function(res){
            showSuccesModifier(res.message);

            btn.css('display', '');
            loader.css('display', 'none');
        }).fail(function(res){
            showEchecModifier(res.responseJSON.message);

            btn.css('display', '');
            loader.css('display', 'none');
        });
        
    }

})(jQuery);