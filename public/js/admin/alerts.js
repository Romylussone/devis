(function($) {

    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('#token').val()}
    });
  
    showSwal = function(type, url_del) {
      'use strict';
      if (type === 'basic') {
        swal({
          text: 'Any fool can use a computer',
          button: {
            text: "OK",
            value: true,
            visible: true,
            className: "btn btn-primary"
          }
        })
  
      } else if (type === 'title-and-text') {
        swal({
          title: 'Read the alert!',
          text: 'Click OK to close this alert',
          button: {
            text: "OK",
            value: true,
            visible: true,
            className: "btn btn-primary"
          }
        })
  
      } else if (type === 'success-message') {
        swal({
          title: 'Congratulations!',
          text: 'You entered the correct answer',
          icon: 'success',
          button: {
            text: "Continue",
            value: true,
            visible: true,
            className: "btn btn-primary"
          }
        })
  
      } else if (type === 'auto-close') {
        swal({
          title: 'Auto close alert!',
          text: 'I will close in 2 seconds.',
          timer: 2000,
          button: false
        }).then(
          function() {},
          // handling the promise rejection
          function(dismiss) {
            if (dismiss === 'timer') {
              console.log('I was closed by the timer')
            }
          }
        )
      } else if (type === 'avertissement-suppresion') {
        swal({
          title: 'Supprimer ?',
          text: "Cette forme de sac sera supprimée défivitement de la base de données !",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3f51b5',
          cancelButtonColor: '#ff4081',
          confirmButtonText: 'Great ',
          buttons: {
            cancel: {
              text: "Annuler",
              value: null,
              visible: true,
              className: "btn btn-danger",
              closeModal: true,
            },
            confirm: {
              text: "Supprimer",
              value: true,
              visible: true,
              className: "btn btn-primary",
              closeModal: true
            }
          }
        }).then(
          function(value) {
            if(value === true){
              supprimer(url_del);
              console.log(url_del);
            }
            
          }
        )
      }
    }
  
    //Suppprimer  
    function supprimer(url)
    {
        $.ajax({
            url : url,
            method : "get",
        }).done( function(res){
          showSuccesModifier(res.message);
            $('.ligneOffreID').each(function(){
              if($(this).attr('id') == id) {
                $(this).css('display', 'none');
              }
            })
        }).fail(function(res){
            showEchecModifier(res.message);
        });
    }
  
    
    
  })(jQuery);