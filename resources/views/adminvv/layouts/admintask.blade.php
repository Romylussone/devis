<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>S&S PACKAGING - @yield("title") </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/../vendor/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/../vendor/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/../css/admin/style.css">
    <!-- End layout styles -->
    <link rel="stylesheet" href="/../css/admin/pure-css-loader.css">

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      @include("adminvv.partials.navbar")
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
          @include("adminvv.partials.sidebar")
        <!-- partial -->
        <!-- Main -->
        <div class="main-panel">
          <div class="content-wrapper">
             @yield("content")

            @include("adminvv.partials.footer")
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="/../vendor/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/../vendor/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->

    <script src="/../js/admin/off-canvas.js"></script>
    <script src="/../js/admin/hoverable-collapse.js"></script>
    <script src="/../js/admin/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- <script src="/../js/admin/dashboard.js"></script> -->
    <script src="/../js/admin/addlink.js"></script>
    <script src="/../js/admin/todolist.js"></script>
    <!-- End custom js for this page -->
    <!-- Injection du js d'ajout d'ecol -->
    <script src="/../js/admin/file-upload.js"></script>

    @if(Route::current()->getName() == "admin-ajouter-ecole")
      <script src="/../js/admin/ajouter-ecole.js"></script>
    @endif
    
    <!-- Js pour gerer les ecoles -->
    @if(Route::current()->getName() == "admin-gerer-ecole")
      <script src="/../js/admin/gerer-ecole.js"></script>
    @endif

    <!-- Js pour gerer les ecoles -->
    @if(Route::current()->getName() == "admin-stats-ecole")
      <script src="/../js/admin/stats.js"></script>
    @endif

  </body>
</html>