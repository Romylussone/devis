@extends("adminvv.layouts.admintask")

@section("title","Gerer les ecoles")

@section("content")
    <div class="page-header" id="topLigne">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-dark text-white mr-2">
            <i class="mdi mdi-settings"></i>
            </span> Gérer les ecoles
        </h3>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Liste des ecoles</h4>
            </p>
            <table class="table tb-modification-suppression" id="listeEcole" get_url="{{ route('charger.ecole', 1) }}">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Site web</th>
                    <th>Visite virtuelle</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    <tr id="premLigne">
                        <td class=""></td>
                        <td class="" ></td>
                        <td class=""></td>
                        <td class="" >
                            <button id="btnLoader" class="btn btn-light btn-sm btn-icon">
                                <i class="lds-dual-ring"></i>
                            </button>
                        </td>
                        <td class="">
                        <a class="modifier" href="#" onClick="modifier()">
                            <!-- <i class="mdi mdi-grease-pencil icon-sm"></i> -->
                        </a>
                        <a class="supprimer" href="#">
                            <!-- <i class="mdi mdi-delete-forever icon-sm danger"></i> -->
                        </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>

    <!-- Modifier une ecole selectionnée -->
    <div id="formContainer" get_url="{{route('gerer.ecole.update')}}" get_url2="{{route('gerer.ecole.delete')}}">
        <div class="row formdiv" id="formVide">
            <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title ecole-a-modifier"> </h4>
                <form class="forms-sample formUpdate" id="formAjouterEcole" method="post" post_url="{{route('admin.ajouter.nouvel.ecole')}}">
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
                    <input type="file" id="imghomeEcole" name="img" accept="image/png, image/jpeg" 
                        class="file-upload-default" onChange="uploaderImgFunc(this)">
                    <div class="input-group col-xs-12">
                        <input type="text" id="imghomeEcoleinput" name="uploader" class="form-control file-upload-info" 
                        disabled placeholder="Uploader une image">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-dark"
                             type="button" onClick="browseFile(event, this)">Uploader</button>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fbPageCode">Page Facebook ID </label>
                    <input type="text" name="fbpageid" class="form-control" id="fbPageCode" 
                    placeholder="ID Page Fb" required="required"  >
                </div>
                <button type="" class="btn btn-gradient-success mr-2 btn-icon-append todesabled btnUpdate" onClick="updateEcole(event, this)" >Modifier</button>              
                <button id="btnLoaderUpdate" class="btn btn-light btn-sm btn-icon"id="" style="display: none;"><i class="lds-dual-ring"></i></button>
                <button class="btn btn-light " onClick="annulerUpdate(event, this)" >Annuler</button>
                <label class="" id="majEcoleinfo" style="display: none;"> </label>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- data-toggle="modal" data-target="#deleteEcoleModal" -->

    <!-- Modal de suppression d'ecole -->
    <div class="modal fade" id="deleteEcoleModal" tabindex="-1" role="dialog" aria-labelledby="deleteEcoleModal" aria-hidden="true"  >
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Suppression d'ecole</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Etes-vous sûr de vouloir supprimer définitevement cette ecole ?</p>
                    <button id="delLoader" class="btn btn-light btn-sm btn-icon"id="" style="display: none;"><i class="lds-dual-ring"></i></button>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-dark">Annuler</button>
                    <button type="button" class="btn btn-danger delete">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- btn caché pour aller en haut de la pge -->
    <a id="btnTop" href="#topLigne"></a>
@endsection