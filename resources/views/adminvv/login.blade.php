<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>S&S PACKAGING Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="./../vendor/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./../vendor/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="./../css/admin/style.css">
    <!-- End layout styles -->
    <!-- <link rel="shortcut icon" href="../../../../assets/images/favicon.ico" /> -->
    <link rel="stylesheet" href="/../css/admin/pure-css-loader.css">
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  S&S PACKAGING  Admin
                </div>
                <h4>Admin</h4>
                <h6 class="font-weight-light">Veuillez vous connectez</h6>
                <form  id="adminLoginForm" class="pt-3" method="post" action="#" post_url="{{route('admin.connexion')}}">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="loginAdmin" placeholder="Login" required="required">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="adminPwd" placeholder="Mot de passe" required="required">
                  </div>
                  <div class="mt-3">
                    <button id="btnLoader" class="btn btn-light btn-sm btn-icon"id="" style="display: none;"><i class="lds-dual-ring"></i></button>
                    <a id="btnConnexion" class="btn btn-block btn-gradient-dark btn-lg font-weight-medium auth-form-btn" href="#">Connexion</a>
                    <label class="" id="adminConneionInfo" style="display: none;"> </label>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> Rester connecté </label>
                    </div>
                    <a href="#" class="auth-link text-black">Mot de passe oublié ?</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="./../vendor/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="./../js/admin/off-canvas.js"></script>
    <script src="./../js/admin/hoverable-collapse.js"></script>
    <script src="./../js/admin/misc.js"></script>
    <!-- endinject -->
    <script src="./../js/admin/login-admin.js"></script>
  </body>
</html>