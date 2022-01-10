@extends("adminvv.layouts.admintask")

@section("title","Ajouter une nouvelle ecole")

@section("content")
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-dark text-white mr-2">
            <i class="mdi mdi mdi-domain"></i>
            </span> Ajouter une nouvelle ecole
        </h3>
    </div>
    <div class="row">  
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Informations Ecole</h4>
            <form class="forms-sample" id="formAjouterEcole" method="post" post_url="{{route('admin.ajouter.nouvel.ecole')}}">
              <div class="row">
                  <div class="col-md-4">
                      <div class="form-group ">
                        <label for="nomEcole">Nom Abrégé </label>
                        <input type="text" class="form-control" id="nomEcole" name="nom" placeholder="Nom" required="required">
                      </div>
                  </div>
                  <div class="col-md-8">
                      <div class="form-group ">
                        <label for="nomCompletEcol">Nom Complet </label>
                        <input type="text" class="form-control" id="nomCompletEcol" name="nom" placeholder="Nom" required="required">
                      </div>
                  </div>
              </div>
              <div class="form-group">
                <label for="emailEcole">Email</label>
                <input type="email" class="form-control" id="emailEcole" 
                  placeholder="Email" required="required" name="emailEcole" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" >
              </div>
              <div class="form-group">
                <label for="sitewebEcole">Lien de site web</label>
                <input type="text" class="form-control" name="liensiteweb" id="sitewebEcole" placeholder="Lien Site web" required="required">
              </div>
              <div class="form-group">
                <label for="vvEcole">Lien de visite virtuelle </label>
                <input type="text" class="form-control" name="lienvv" id="vvEcole" placeholder="Lien Site web" required="required">
              </div>
              <div class="form-group">
                <label for="lienVideo">Lien de vidéo youtube de description  </label>
                <input type="text" class="form-control" name="lienVideo" id="lienVideo" placeholder="Lien Site web" required="video youtube">
              </div>
              <div class="form-group">
                <label>Image d'accueil</label>
                <input type="file" id="imghomeEcole" name="img" accept="image/png, image/jpeg" class="file-upload-default">
                <div class="input-group col-xs-12">
                  <input type="text" id="imghomeEcoleinput" name="uploader" class="form-control file-upload-info" disabled placeholder="Uploader une image">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-gradient-dark" type="button">Uploader</button>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <label for="fbPageCode">Page Facebook ID </label>
                <input type="text" name="fbpageid" class="form-control" id="fbPageCode" 
                  placeholder="ID Page Fb" required="required"  >
              </div>
              <button type="" class="btn btn-gradient-success mr-2 btn-icon-append todesabled" id="btnAjouterEcole" >Valider</button>              
              <button id="btnLoader" class="btn btn-light btn-sm btn-icon"id="" style="display: none;"><i class="lds-dual-ring"></i></button>
              <button class="btn btn-light " id="btnAnnuler" >Annuler</button>
              <label class="" id="ajoutecoleinfo" style="display: none;"> </label>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection