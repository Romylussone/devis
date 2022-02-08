@extends("admin.layouts.main")

@section("title","Ajouter nouvel élément")

@section("content")
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-dark text-white mr-2">
          <i class="mdi mdi-settings"></i>
        </span> Ajouter nouvel élément au formulaire 
      </h3>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Ajouter une forme de sac</h4>
                <form id="formAjouterFormSac" class="forms-sample" method="#" action="#" post_url="{{route('admin.form.forme.sac.vue', 'create')}}">
                    <div class="form-group">
                        <label for="formSacLibelle">Libelle</label>
                        <input type="text" name="libelle" class="form-control" id="formSacLibelle" placeholder="Nouvel forme de sac" required>
                        <input type="hidden" name="model" value="TypeArticle" >
                    </div>
                    <!-- <div class="form-group">
                        <label for="cpwdAdmin">Confirmation de mot de passe</label>
                        <input type="password" class="form-control" id="cpwdAdmin" placeholder="Confirmer le mot de passe">
                    </div> -->
                    <span class="btn btn-light btn-sm btn-icon btn l span-loader" style="display: none;">
                        <i class="lds-dual-ring"></i>
                    </span>
                    <button type="submit" class="btn btn-gradient-dark mr-2 btnAjouter">Ajouter</button>
                    <button class="btn btn-light btnAnnuler">Annuler</button>
                </form>
                </div>
            </div>
        </div>

        <!-- Ajouter nouvelle couleur -->
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Ajouter une nouvelle couleur de sac</h4>
                <form class="forms-sample" method="#" action="#" post_url="{{route('admin.form.couleur.sac.vue', 'create')}}">
                    <div class="form-group">
                        <label for="couleutSacLibelle">Libelle</label>
                        <input type="text" name="libelle" class="form-control" id="couleutSacLibelle" placeholder="Nouvelle couleur de sac" required>
                        <input type="hidden" name="model" value="ListeCouleurs">
                    </div>
                    <!-- <div class="form-group">
                        <label for="cpwdAdmin">Confirmation de mot de passe</label>
                        <input type="password" class="form-control" id="cpwdAdmin" placeholder="Confirmer le mot de passe">
                    </div> -->
                    <span class="btn btn-light btn-sm btn-icon btn l span-loader" style="display: none;">
                        <i class="lds-dual-ring"></i>
                    </span>
                    <button type="submit"  class="btn btn-gradient-dark mr-2 btnAjouter">Ajouter</button>
                    <button class="btn btn-light btnAnnuler">Annuler</button>
                </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Ajouter une nouvelle taille de sac</h4>
                <form class="forms-sample" post_url="{{route('admin.form.taille.sac.vue', 'create')}}">
                    <div class="form-group">
                        <label for="tailleSacH">Hauteur</label>
                        <input type="number" name="hauteur" min="0"  class="form-control" id="tailleSacH" placeholder="Hauteur">
                    </div>
                    <div class="form-group">
                        <label for="tailleSacL">Largeur</label>
                        <input type="number" name="largeur" min="0" class="form-control" id="tailleSacL" placeholder="Largeur">
                    </div>
                    <div class="form-group">
                        <label for="tailleSacS">Souflet</label>
                        <input type="number" name="souflet" min="0"  class="form-control" id="tailleSacS" placeholder="Souflet">
                        <input type="hidden" name="model" value="ListeCouleurs">
                    </div>
                    <!-- <div class="form-group">
                        <label for="cpwdAdmin">Confirmation de mot de passe</label>
                        <input type="password" class="form-control" id="cpwdAdmin" placeholder="Confirmer le mot de passe">
                    </div> -->
                    <span class="btn btn-light btn-sm btn-icon btn l span-loader" style="display: none;">
                        <i class="lds-dual-ring"></i>
                    </span>
                    <button  type="submit" class="btn btn-gradient-dark mr-2 btnAjouter">Ajouter</button>
                    <button class="btn btn-light btnAnnuler">Annuler</button>
                </form>
                </div>
            </div>
        </div>

        <!-- Ajouter nouvelle couleur -->
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Ajouter une nouvelle taille de anse </h4>
                <form class="forms-sample" post_url="{{route('admin.form.taille.anse.sac.vue', 'create')}}">
                    <div class="form-group">
                        <label for="tailleAnseSac">Libelle</label>
                        <input type="number" name="taille" min="1" class="form-control" id="tailleAnseSac" placeholder="Taille en cm">
                        <input type="hidden" name="model" value="TailleArticle">
                    </div>
                    <!-- <div class="form-group">
                        <label for="cpwdAdmin">Confirmation de mot de passe</label>
                        <input type="password" class="form-control" id="cpwdAdmin" placeholder="Confirmer le mot de passe">
                    </div> -->
                    <span class="btn btn-light btn-sm btn-icon btn l span-loader" style="display: none;">
                        <i class="lds-dual-ring"></i>
                    </span>
                    <button type="submit"  class="btn btn-gradient-dark mr-2 btnAjouter">Ajouter</button>
                    <button class="btn btn-light btnAnnuler">Annuler</button>
                </form>
                </div>
            </div>
        </div>
    </div>

    <!-- new row -->
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Ajouter une nouvelle liste de Qte article</h4>
                <form class="forms-sample" post_url="{{route('admin.form.qte.sac.vue', 'create')}}">
                    <div class="form-group">
                        <label for="qteSac">Qte</label>
                        <input type="number" min="10000" name="qte" class="form-control" id="qteSac" placeholder="Nouvelle qte">
                        <input type="hidden" name="model" value="ListeQteArticle">
                    </div>
                    <!-- <div class="form-group">
                        <label for="cpwdAdmin">Confirmation de mot de passe</label>
                        <input type="password" class="form-control" id="cpwdAdmin" placeholder="Confirmer le mot de passe">
                    </div> -->
                    <span class="btn btn-light btn-sm btn-icon btn l span-loader" style="display: none;">
                        <i class="lds-dual-ring"></i>
                    </span>
                    <button type="submit"  class="btn btn-gradient-dark mr-2 btnAjouter">Ajouter</button>
                    <button class="btn btn-light btnAnnuler">Annuler</button>
                </form>
                </div>
            </div>
        </div>

        <!-- Ajouter nouvelle couleur -->
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Ajouter une nouvelle liste de grammages </h4>
                <form class="forms-sample" post_url="{{route('admin.form.grammage.sac.vue', 'create')}}">
                    <div class="form-group">
                        <label for="grammageSac">grammage</label>
                        <input type="number" name="grammage" min="0" class="form-control" id="grammageSac" placeholder="Grammage (ex: 55)">
                    </div>
                    <div class="form-group">
                        <label for="grammageSacLibelle">Libelle</label>
                        <input type="text" name="libelle" class="form-control" id="grammageSacLibelle" placeholder="Ex: Ultra éco 30 gr">
                        <input type="hidden" name="model" value="GrammageArticles">
                    </div>
                    <!-- <div class="form-group">
                        <label for="cpwdAdmin">Confirmation de mot de passe</label>
                        <input type="password" class="form-control" id="cpwdAdmin" placeholder="Confirmer le mot de passe">
                    </div> -->
                    <span class="btn btn-light btn-sm btn-icon btn l span-loader" style="display: none;">
                        <i class="lds-dual-ring"></i>
                    </span>
                    <button  type="submit" class="btn btn-gradient-dark mr-2 btnAjouter">Ajouter</button>
                    <button class="btn btn-light btnAnnuler">Annuler</button>
                </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection