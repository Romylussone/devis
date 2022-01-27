@extends("admin.layouts.main")

@section("title","Admin Paramètres")

@section("content")
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-dark text-white mr-2">
          <i class="mdi mdi-settings"></i>
        </span> Paramètres administrateurs
      </h3>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Modifier mon mot de passe</h4>
                <form class="forms-sample">
                    <div class="form-group">
                        <label for="pwdAdmin">Mot de passe</label>
                        <input type="password" class="form-control" id="pwdAdmin" placeholder="Mot de passe">
                    </div>
                    <div class="form-group">
                    <label for="cpwdAdmin">Confirmation de mot de passe</label>
                    <input type="password" class="form-control" id="cpwdAdmin" placeholder="Confirmer le mot de passe">
                    </div>
                    <button type="submit" class="btn btn-gradient-dark mr-2">Enregistrer</button>
                    <button class="btn btn-light">Annuler</button>
                </form>
                </div>
            </div>
        </div>

        <!-- Ajouter un nouvel admin  -->
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Ajouter un administrateur</h4>
                <form id="formAddnewAdmin" class="forms-sample" method="post" post_url="{{route('admin.ajouter.admin')}}">
                  <div class="form-group">
                    <label for="newAdminNom">Nom</label>
                    <input type="text" class="form-control" id="newAdminNom" placeholder="Login">
                  </div>
                  <div class="form-group">
                    <label for="newAdminPren">Prenom</label>
                    <input type="text" class="form-control"  id="newAdminPren" placeholder="Login">
                  </div>
                  <div class="form-group">
                    <label for="newAdminEmail">Email</label>
                    <input type="text" class="form-control" id="newAdminEmail" placeholder="Login">
                  </div>
                  <div class="form-group">
                    <label for="newAdminlogin">Login</label>
                    <input type="text" class="form-control" id="newAdminlogin" placeholder="Login" required="required">
                  </div>
                  <div class="form-group">
                    <label for="newAdminPwd">Mot de passe </label>
                    <input type="password" class="form-control" id="newAdminPwd" placeholder="Mot de passe" required="required">
                  </div>
                  <div class="form-group">
                    <label for="newAdmincPwd">Confirmer le mot de passe </label>
                    <input type="password" class="form-control" id="newAdmincPwd" placeholder="Confrimer le mot de passe" required="required">
                  </div>
                  <button id="btnAddAdmin" class="btn btn-gradient-dark mr-2 todesabled">Ajouter</button>
                  <button id="btnLoader" class="btn btn-light btn-sm btn-icon"id="" style="display: none;"><i class="lds-dual-ring"></i></button>
                  <button id="btnAnnuler" class="btn btn-light">Annuler</button>
                  <label class="" id="ajouterAdmininfo" style="display: none;"> </label>
                </form>
                <form id="hiddenForm" method="get" action="route('admin-home')">
                </form>
              </div>
            </div>
        </div>
    </div>

    <!-- Liste des administrateurs -->
    <div class="row">
      <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Liste des Administrateurs</h4>
            </p>
            <table class="table ">
              <thead>
                <tr>
                  <th>Login</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>admin</td>
                  <td>
                      <a class="" href="#">
                          <i class="mdi mdi-grease-pencil icon-sm"></i>
                      </a>
                      <a class="" href="#">
                          <i class="mdi mdi-delete-forever icon-sm"></i>
                      </a>
                  </td>
                </tr>
                <tr>
                  <td>admin2</td>
                  <td>
                      <a class="" href="#">
                          <i class="mdi mdi-grease-pencil icon-sm"></i>
                      </a>
                      <a class="" href="#">
                          <i class="mdi mdi-delete-forever icon-sm"></i>
                      </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Modifier un admin  -->
      <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Modifier</h4>
              <form class="forms-sample">
                <div class="form-group">
                  <label for="modifAdminLogin">Login</label>
                  <input type="text" class="form-control" id="modifAdminLogin" placeholder="Login">
                </div>
                <div class="form-group">
                  <label for="modifAdminPwd">Mot de passe </label>
                  <input type="password" class="form-control" id="modifAdminPwd" placeholder="Mot de passe">
                </div>
                <div class="form-group">
                  <label for="modifAdmincPwd">Confirmer le mot de passe </label>
                  <input type="password" class="form-control" id="modifAdmincPwd" placeholder="Confrimer le mot de passe">
                </div>
                <button type="submit" class="btn btn-gradient-dark mr-2">Modifier</button>
                <button class="btn btn-light">Annuler</button>
              </form>
            </div>
          </div>
      </div>
    </div>
@endsection