<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>S&S PACKAGING - @yield("title") </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/vendor/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/vendor/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="/vendor/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="/vendor/datatables.net-bs4/dataTables.bootstrap4.css">
    <!-- /vendor/bootstrap-datepicker/bootstrap-datepicker.min.js -->
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/css/admin/style.css">
    <link rel="stylesheet" href="/css/admin/pure-css-loader.css">
    <!-- End layout styles -->
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      @include("admin.partials.navbar")
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
          @include("admin.partials.sidebar")
        <!-- partial -->
        <!-- Main -->
        <div class="main-panel">
          <div class="content-wrapper">
             @yield("content")
             
            @include("admin.partials.footer")
        </div>
        <!-- main-panel ends -->
        
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="/vendor/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/vendor/chart.js/Chart.min.js"></script>
    <script src="/vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- plugin pour les -->
    @if(Route::current()->uri() == 'admin/devis/{periode}')
      <script src="/vendor/datatables.net/jquery.dataTables.js"></script>
      <script src="/vendor/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    @endif
    <!-- End plugin js for this page -->

    <script src="/js/admin/off-canvas.js"></script>
    <script src="/js/admin/hoverable-collapse.js"></script>
    <script src="/js/admin/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- <script src="/js/admin/dashboard.js"></script> -->
    <script src="/js/admin/inline-datepicker.js"></script>    
    <script src="/js/admin/chart.js"></script>
    <script src="/js/admin/addlink.js"></script>
    <script src="/js/admin/todolist.js"></script>
      
    </span>
    @if(Route::current()->uri() == 'admin/devis/{periode}' && Route::current()->parameters['periode'] == 'hebdo')
      <script src="/js/admin/data-table-devis-hebdo.js"></script>
    @endif
    @if(Route::current()->uri() == 'admin/devis/{periode}' && Route::current()->parameters['periode'] == 'mensuel')
      <script src="/js/admin/data-table-devis-mensuel.js"></script>
    @endif
    @if(Route::current()->uri() == 'admin/devis/{periode}' && Route::current()->parameters['periode'] == 'annuel')
      <script src="/js/admin/data-table-devis-annuel.js"></script>
    @endif
    @if(Route::current()->uri() == 'admin/devis/{periode}' && Route::current()->parameters['periode'] == 'all')
      <script src="/js/admin/data-table-devis-all.js"></script>
    @endif
    <!-- <script src="/js/admin/ajouter-admin.js"></script> -->
    <!-- End custom js for this page -->

  </body>
</html>