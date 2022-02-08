(function($) {
    'use strict';
    $(function() {
      $('#order-listing').DataTable({
        "aLengthMenu": [
          [5, 10, 15, -1],
          [5, 10, 15, "All"]
        ],
        "iDisplayLength": 10,
        "language": {
          search: "",
          lengthMenu: "Afficher _MENU_ ligne par page",
          zeroRecords: "Aucune ligne trouvée.",
          info: "Page _PAGE_ sur _PAGES_",
          infoEmpty: "Aucune ligne disponible",
          infoFiltered: "(filtrer de _MAX_ ligne total)"
        }
      });
      $('#order-listing').each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
        search_input.attr('placeholder', 'Search');
        search_input.removeClass('form-control-sm');
        // LENGTH - Inline-Form control
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
        length_sel.removeClass('form-control-sm');
      });
    });


    //forme-sac-list
    $(function() {
      $('#forme-sac-list').DataTable({
        "aLengthMenu": [
          [5, 10, 15, -1],
          [5, 10, 15, "All"]
        ],
        "iDisplayLength": 10,
        "language": {
          search: "",
          lengthMenu: "Afficher _MENU_ ligne par page",
          zeroRecords: "Aucune ligne trouvée.",
          info: "Page _PAGE_ sur _PAGES_",
          infoEmpty: "Aucune ligne disponible",
          infoFiltered: "(filtrer de _MAX_ ligne total)"
        }
      });
      $('#forme-sac-list').each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
        search_input.attr('placeholder', 'Search');
        search_input.removeClass('form-control-sm');
        // LENGTH - Inline-Form control
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
        length_sel.removeClass('form-control-sm');
      });
    });

    // couleur-sac-list
    $(function() {
      $('#couleur-sac-list').DataTable({
        "aLengthMenu": [
          [5, 10, 15, -1],
          [5, 10, 15, "All"]
        ],
        "iDisplayLength": 10,
        "language": {
          search: "",
          lengthMenu: "Afficher _MENU_ ligne par page",
          zeroRecords: "Aucune ligne trouvée.",
          info: "Page _PAGE_ sur _PAGES_",
          infoEmpty: "Aucune ligne disponible",
          infoFiltered: "(filtrer de _MAX_ ligne total)"
        }
      });
      $('#couleur-sac-list').each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
        search_input.attr('placeholder', 'Search');
        search_input.removeClass('form-control-sm');
        // LENGTH - Inline-Form control
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
        length_sel.removeClass('form-control-sm');
      });
    });

    //Taille sac
    
    $(function() {
      $('#taille-sac-list').DataTable({
        "aLengthMenu": [
          [5, 10, 15, -1],
          [5, 10, 15, "All"]
        ],
        "iDisplayLength": 10,
        "language": {
          search: "",
          lengthMenu: "Afficher _MENU_ ligne par page",
          zeroRecords: "Aucune ligne trouvée.",
          info: "Page _PAGE_ sur _PAGES_",
          infoEmpty: "Aucune ligne disponible",
          infoFiltered: "(filtrer de _MAX_ ligne total)"
        }
      });
      $('#taille-sac-list').each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
        search_input.attr('placeholder', 'Search');
        search_input.removeClass('form-control-sm');
        // LENGTH - Inline-Form control
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
        length_sel.removeClass('form-control-sm');
      });
    });

    //qte-sac-list
    $(function() {
      $('#qte-sac-list').DataTable({
        "aLengthMenu": [
          [5, 10, 15, -1],
          [5, 10, 15, "All"]
        ],
        "iDisplayLength": 10,
        "language": {
          search: "",
          lengthMenu: "Afficher _MENU_ ligne par page",
          zeroRecords: "Aucune ligne trouvée.",
          info: "Page _PAGE_ sur _PAGES_",
          infoEmpty: "Aucune ligne disponible",
          infoFiltered: "(filtrer de _MAX_ ligne total)"
        }
      });
      $('#qte-sac-list').each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
        search_input.attr('placeholder', 'Search');
        search_input.removeClass('form-control-sm');
        // LENGTH - Inline-Form control
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
        length_sel.removeClass('form-control-sm');
      });
    });

    
    // grammage-sac-list
    $(function() {
      $('#grammage-sac-list').DataTable({
        "aLengthMenu": [
          [5, 10, 15, -1],
          [5, 10, 15, "All"]
        ],
        "iDisplayLength": 10,
        "language": {
          search: "",
          lengthMenu: "Afficher _MENU_ ligne par page",
          zeroRecords: "Aucune ligne trouvée.",
          info: "Page _PAGE_ sur _PAGES_",
          infoEmpty: "Aucune ligne disponible",
          infoFiltered: "(filtrer de _MAX_ ligne total)"
        }
      });
      $('#grammage-sac-list').each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
        search_input.attr('placeholder', 'Search');
        search_input.removeClass('form-control-sm');
        // LENGTH - Inline-Form control
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
        length_sel.removeClass('form-control-sm');
      });
    });

  })(jQuery);