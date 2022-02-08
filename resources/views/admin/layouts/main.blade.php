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
    <link rel="stylesheet" href="/vendor/jquery-toast-plugin/jquery.toast.min.css">
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

      <!-- Modals Forme de sac -->
      <div class="modal fade" id="modifierFormeSac" post_url="{{route('admin.form.forme.sac.vue', 'update')}}" tabindex="-1" role="dialog" aria-labelledby="modifierOffreLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modifierFormeSac">Modification forme de sac</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="modal-modi-libelle" class="col-form-label" >Libelle :</label>
                  <input type="text" class="form-control" id="modal-modi-libelle" libid="">
                </div>
                <!-- <div class="form-group">
                  <label for="modal-modi-offreDescription" class="col-form-label">Descripton :</label>
                  <textarea class="form-control" id="modal-modi-offreDescription"></textarea>
                </div> -->
                <div class="form-group">
                  <label>Statut</label>
                  <select class="js-example-basic-single" style="width:100%" id="modi-statut-forme-sac">
                    <option value="created">created</option>
                    <option value="published">published</option>
                    <!-- <option value="non_expiré">deleted</option> -->
                  </select>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success btnModifierFormeSac">Modifier</button>
              <button type="button" class="btn btn-light" data-dismiss="modal">Fermer</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modals Couleur sac -->
      <div class="modal fade" id="modifierCouleurSac" post_url="{{route('admin.form.couleur.sac.vue', 'update')}}" tabindex="-1" role="dialog" aria-labelledby="modifierCouleurSacLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modifierCouleurSac">Modification couleur de sac</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="modal-modi-couleur-libelle" class="col-form-label" >Libelle :</label>
                  <input type="text" class="form-control" id="modal-modi-couleur-libelle" libid="">
                </div>
                <div class="form-group">
                  <label>Statut</label>
                  <select class="js-example-basic-single" style="width:100%" id="modi-statut-couleur-sac">
                    <option value="created">created</option>
                    <option value="published">published</option>
                    <!-- <option value="non_expiré">deleted</option> -->
                  </select>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success btnModifierCouleurSac">Modifier</button>
              <button type="button" class="btn btn-light" data-dismiss="modal">Fermer</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Fin Modals Couleur sac -->

      <!-- Modals Taille sac -->
      <div class="modal fade" id="modifierTailleSac" post_url="{{route('admin.form.taille.sac.vue', 'update')}}" tabindex="-1" role="dialog" aria-labelledby="modifierCouleurSacLabel" aria-hidden="true" tailleSacID="">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modifierTailleSac">Modification taille de sac</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="modal-modi-taille-h" class="col-form-label" >Hauteur :</label>
                      <input type="text" class="form-control" id="modal-modi-taille-h" libid="">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="modal-modi-taille-l" class="col-form-label" >Largeur :</label>
                      <input type="text" class="form-control" id="modal-modi-taille-l" libid="">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="modal-modi-taille-s" class="col-form-label" >Souflet :</label>
                      <input type="text" class="form-control" id="modal-modi-taille-s" libid="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="modal-modi-taille-libelle" class="col-form-label" >Libelle :</label>
                  <input type="text" class="form-control" id="modal-modi-taille-libelle" libid="">
                </div>
                <div class="form-group">
                <label>Statut :</label>
                  <select class="js-example-basic-single" style="width:100%" id="modi-statut-taille-sac">
                    <option value="created">created</option>
                    <option value="published">published</option>
                    <!-- <option value="non_expiré">deleted</option> -->
                  </select>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success btnModifierTailleSac">Modifier</button>
              <button type="button" class="btn btn-light" data-dismiss="modal">Fermer</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Fin Modals Taille sac -->

      <!-- Modals Qte de sac -->
      <div class="modal fade" id="modifierQteSac" post_url="{{route('admin.form.qte.sac.vue', 'update')}}" tabindex="-1" role="dialog" aria-labelledby="modifierOffreLabel" aria-hidden="true" qteSacID="">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modifierQteSac">Modification qte de sac</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="modal-modi-qte-sac" class="col-form-label" >Qte :</label>
                      <input type="text" class="form-control" id="modal-modi-qte-sac" libid="">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="modal-modi-qte-libelle-sac" class="col-form-label" >Libelle :</label>
                      <input type="text" class="form-control" id="modal-modi-qte-libelle-sac" libid="">
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success btnModifierQteSac">Modifier</button>
              <button type="button" class="btn btn-light" data-dismiss="modal">Fermer</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modals Qte de sac -->
      <div class="modal fade" id="modifierGrammageSac" post_url="{{route('admin.form.grammage.sac.vue', 'update')}}" tabindex="-1" role="dialog" aria-labelledby="modifierOffreLabel" aria-hidden="true" grammageSacID="">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modifierGrammageSac">Modification grammage de sac</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="modal-modi-grammage-sac" class="col-form-label" >Grammage :</label>
                      <input type="text" class="form-control" id="modal-modi-grammage-sac" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="modal-modi-libelle-sac" class="col-form-label" >Libéllé :</label>
                      <input type="text" class="form-control" id="modal-modi-libelle-sac" >
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="modi-statut-grammage-sac">Statut</label>
                  <select class="js-example-basic-single" style="width:100%" id="modi-statut-grammage-sac">
                    <option value="created">created</option>
                    <option value="published">published</option>
                    <!-- <option value="non_expiré">deleted</option> -->
                  </select>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success btnModifierGrammageSac">Modifier</button>
              <button type="button" class="btn btn-light" data-dismiss="modal">Fermer</button>
            </div>
          </div>
        </div>
      </div>




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
    
    <script src="/vendor/datatables.net/jquery.dataTables.js"></script>
    <script src="/vendor/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <!-- End plugin js for this page -->

    <script src="/js/admin/off-canvas.js"></script>
    <script src="/js/admin/hoverable-collapse.js"></script>
    <script src="/js/admin/misc.js"></script>
    <script src="/vendor/sweetalert/sweetalert.min.js"></script>
    <script src="/vendor/jquery-toast-plugin/jquery.toast.min.js"></script>
    <script src="/vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- <script src="/js/admin/dashboard.js"></script> -->
    <script src="/js/admin/toast-notifiications.js"></script>
    <script src="/js/admin/inline-datepicker.js"></script>    
    <script src="/js/admin/chart.js"></script>
    <script src="/js/admin/addlink.js"></script>
    <script src="/js/admin/todolist.js"></script>
    <script src="/js/admin/alerts.js"></script>
    <script src="/js/admin/voir-modifier-modal.js"></script>
    <script src="/js/admin/form-nouvel-element.js"></script>
    <!-- <script src="/js/admin/form-validation.js"></script> -->
      
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
    <script src="/js/admin/data-table.js"></script>

    <!-- <script src="/js/admin/ajouter-admin.js"></script> -->
    <!-- End custom js for this page -->

  </body>
</html>