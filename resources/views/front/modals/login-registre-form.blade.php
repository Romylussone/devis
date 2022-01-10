<!-- Login & Register Form -->
<div class="modal fade" id="login-register-modal" tabindex="-1" role="dialog" 
  aria-labelledby="login-register" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="container">
            <div class="row" style="height:2rem;">
              <button type="button" 
                      class="close text-danger"
                      style="position:absolute;right:1rem;"
                      data-dismiss="modal" 
                      aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="row">
              <div class="col-md-6" style="border-right : 2px solid #64a19d">
                  <img src = ".\img\marzipano\tiles\0-hall\1\b\0\0.jpg" 
                       class="img-responsive img-thumbnail" 
                       style="width:95%;height:90%;" 
                       alt="batiment"/>
                  <p class="text-center mt-3"> 
                    <span style="padding:2rem;border-radius:50%;background:white;">
                       <a title="visite anonyme" 
                          href="{{url("visite-hall")}}"> 
                            <i class="fas fas fa-door-open" > </i> 
                       </a>
                    </span>
                  </p>
                </div>

                <!-- Formulaire de Connexion -->
                <div class="col-md-5"  id="conexionForm">                  
                   <form action="{{route('connexion')}}" id="connexionForm">
                     <legend class="text-center mb-2 text-primary"> <span style="color:black;"> Connexion </span> /  
                        <a href="#" onClick="active(1)"> Inscription </a>
                      </legend>
                      <!-- Chargement de connexion -->
                      <div id="snipper-connexion" style="display:none;">
                        <div class="d-flex justify-content-center text-secondary">
                          <div class="spinner-border spinner-border-sm" role="status">
                            <span class="sr-only">Loading...</span>
                          </div>
                        </div>
                      </div>
                      <!-- Fin chargement de connexion -->
                      <div class="form-group mt-3">
                        <label for="inputLogin" style="font-size:0.8em;color:#64a19d;">Email</label>
                        <input type="text" 
                              class="form-control" id="inputLogin" placeholder="Login...">
                      </div>
                    <div class="form-group mt-3">
                      <label for="inputPwd" style="font-size:0.8em;color:#64a19d;">Mot de Passe </label>
                      <input type="password" class="form-control input-error" id="inputPwd" placeholder="Mot de Passe...">
                    </div>
                    <hr/>
                    <div class="container-fluid">
                      <div class="row mb-2">
                        <div class="col-md-12">
                          <a href="#" class="btn btn-user btn-block btn-primary text-white" id="btn-con" onClick="connexion()">
                           Se Connecter 
                          </a>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                            <a href="{{route('socialite.redirect', 'google') }}" class="btn btn-google btn-user btn-block text-danger" 
                                        style="border: 1px solid red;">
                              <i class="fab fa-google fa-fw"></i> Google
                            </a>
                          </div>
                          <div class="col-md-6">
                            <a href="{{route('socialite.redirect', 'facebook') }}" class="btn btn-facebook btn-user btn-block " 
                                        style="color:#3b5998;border: 1px solid #3b5998;">
                              <i class="fab fa-facebook-f fa-fw"></i> facebook
                            </a>                        
                          </div>
                      </div>
                      <div class="row mt-5">
                        <div class="col-md-12 text-center">
                          <a href="#">Mot de passe oublié <span class="fas fa-question-circle"></span> </a>
                        </div>
                      </div>
                    </div> 
                  </form>
                </div>

                <!-- Formulaire inscription -->
                <div class="col-md-5"  id="inscriptionForm" style="display:none;" >                  
                   <form  action="{{route('save')}}" id="inscription">
                     <legend class="text-center mb-2 text-primary"><a href="#" onClick="active(0)"> Connexion  </a>  /  
                         <span style="color:black;"> Inscription </span>
                      </legend>
                    <div class="form-group mt-3">
                      <label for="inputnom" style="font-size:0.8em;color:#64a19d;">Nom </label>
                      <input type="text" 
                             class="form-control" id="inputnom" required="required" placeholder="Nom...">
                    </div>
                    <div class="form-group mt-3">
                      <label for="inputpren" style="font-size:0.8em;color:#64a19d;">Prenoms</label>
                      <input type="text" class="form-control" id="inputpren" required="required" placeholder="Prenoms...">
                    </div>
                    <div class="form-group mt-3">
                      <label for="inputemail" style="font-size:0.8em;color:#64a19d;">Email</label>
                      <div class="">
                      <input type="email" class="form-control" id="inputemail" 
                        placeholder="Email..." required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                      </div>
                      <div id="inputEmailchecking" style="display:none;">
                        <span class="spinner-border spinner-border-sm text-success" role="status" aria-hidden="true">
                          <span class="sr-only">Loading...</span>
                          <!-- <span class="fas fa-check"></span> -->
                        </span>
                      </div>
                    </div>
                    <hr/>
                    <div class="container-fluid">
                      <div class="row mb-2">
                          <div class="col-md-6">
                            <a href="{{route('socialite.redirect', 'google') }}" class="btn btn-google btn-user btn-block text-danger" 
                                        style="border: 1px solid red;">
                              <i class="fab fa-google fa-fw"></i> Google
                            </a>
                          </div>
                          <div class="col-md-6">
                            <a href="{{route('socialite.redirect', 'facebook') }}" class="btn btn-facebook btn-user btn-block " 
                                        style="color:#3b5998;border: 1px solid #3b5998;">
                              <i class="fab fa-facebook-f fa-fw"></i> facebook
                            </a>                        
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <a href="#" id="linkcheckmail" url="{{route('mailcheck')}}" class="btn btn-user btn-block btn-primary text-white" onClick="registerNext(1)">
                           Suivant
                          </a>
                        </div>
                      </div>
                      {{-- <div class="row mt-2">
                        <div class="col-md-12">
                          <a href="{{route("visite-hall")}}" class="btn btn-user btn-block btn-primary text-primary"
                             style="background: transparent;border:1px solid #64a19d; padding-top:10px
                                    ;padding-bottom:10px;">
                           Visite Anonyme
                          </a>
                        </div>
                      </div> --}}
                    </div> 
                  </form>
                </div>
                
                 <!-- Question Qui visite ? -->
                 <div class="col-md-5" id="pourQuiVisite" style="display:none;">  
                   <form>
                     <legend class="text-center mb-2 text-primary">
                         <span style="color:black;"> Pour qui souhaitez-vous faire la visite ? </span>
                      </legend>
                    
                    <hr/>
                    <div class="container-fluid">
                       <div class="row mb-2 d-flex flex-row justify-content-around mt-100">
                          <!-- Oui BAC -->
                            <div class="p-2"> 
                              <label> 
                                  <input type="radio" class="option-input radio" value="moi" name="visitePour"  id="ouiVisiteSoi" checked />Pour moi même
                              </label>
                            </div>
                            <!-- Non BAC -->
                            <div class="p-2">
                              <label> 
                                  <input type="radio" class="option-input radio" value="autre" name="visitePour" id="nonVisiteSoi" />Pour autre
                              </label>
                            </div>
                          </div>
                      <hr/>
                      <div class="row ">
                        <div class="col-md-4">
                          <a href="#" class="btn btn-sm  btn-block btn-primary text-white" onClick="registerBack(0)">
                           <!-- Précédent -->
                           <i class="fas fa-angle-double-left"></i>
                          </a>
                        </div>
                        <div class="col-md-4 offset-md-4">
                          <a href="#" class="btn btn-sm  btn-block btn-primary text-white rezise-btn" onClick="registerNext(2)">
                           <!-- Suivant -->
                           <i class="fas fa-angle-double-right"></i>
                          </a>
                        </div>
                      </div>
                    </div> 
                  </form>
                </div>
                      
                <!-- Si Visite pour autre  Alors demander la saisie des infors suplémentaire -->
                <div class="col-md-5" id="inforSupleVisitePourAutre" style="display:none;">  
                   <form>
                     <legend class="text-center mb-2 text-primary">
                         <span style="color:black;"> Information Suplémentaire </span>
                      </legend>
                    <hr/>
                    <h4>Visiteur </h4>
                     <!-- Form Row 0 -->
                     <div class="form-row  ">
                            <div class="form-group col-md-6">
                                <label for="selecAffiliation" style="font-size:0.8em;color:#64a19d;">Affiliation ?</label>
                                <select class="form-control-sm form-control" id="selecAffiliation">
                                  <option value="parent" seleced >Parent</option>
                                  <option value="autre">Autre</option>
                                </select>
                                <!-- <input type="text" class="form-control" id="selectTypeBac" required="required" placeholder="... "> -->
                            </div>
                            <div class="form-group col-md-6">
                              <label for="telParent" style="font-size:0.8em;color:#64a19d;">Votre numéro Tel </label>
                              <input type="tel" class="form-control " id="telParent" required="required" placeholder="(+212)...">
                            </div>
                        </div>
                        <!-- Fin Form Row 0 -->
                        <h4 >Personne Concernée </h4>
                        <!-- Form Row 01 -->
                       <div class="form-row ">
                            <div class="form-group col-md-6">
                                <label for="nomtiers" style="font-size:0.8em;color:#64a19d;">Nom </label>
                                <input type="text" class="form-control" id="nomtiers" placeholder="Nom.." required="required">
                                <!-- <input type="text" class="form-control" id="selectTypeBac" required="required" placeholder="... "> -->
                            </div>
                            <div class="form-group col-md-6">
                              <label for="prentiers" style="font-size:0.8em;color:#64a19d;">Prenoms </label>
                              <input type="text" class="form-control" id="prentiers" placeholder="Prenoms ..." required="required">
                            </div>
                        </div>
                        <!-- Fin Form Row 01 -->

                    <div class="container-fluid" >
                      <hr/>
                      <div class="row ">
                        <div class="col-md-4">
                          <a href="#" class="btn btn-sm btn-block btn-primary text-white " onClick="registerBack(1)">
                           <!-- Précédent -->
                           <i class="fas fa-angle-double-left"></i>
                          </a>
                        </div>
                        <div class="col-md-4 offset-md-4">
                          <a href="#" class="btn btn-sm btn-block  btn-primary  text-white rezise-btn" onClick="registerNext(3)">
                           <!-- Suivant -->
                           <i class="fas fa-angle-double-right"></i>
                           
                          </a>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- Fin Si Visite pour autre  -->
                
                  
                 <!-- Création de Badge Question Avez-vous le BAC  -->
                <div class="col-md-5" id="creationBadge" style="display:none;">  
                   <form action="{{url('inscription/cbadge')}}" id="createBadgeForm">
                     <legend class="text-center mb-2 text-primary">
                         <span style="color:black;"> Création de Badge </span>
                      </legend>
                    <hr/>
                    <!-- Chargement de connexion -->
                    <div id="chargement-inscription" style="display:none;">
                        <div class="d-flex justify-content-center text-secondary">
                          <div class="spinner-border spinner-border-sm" role="status">
                            <span class="sr-only">Loading...</span>
                          </div>
                        </div>
                      </div>
                      <!-- Fin chargement de connexion -->
                    <h4 class="questionBac">Avez-vous le BAC</h4>
                    <div class="btn-group d-flex flex-row justify-content-around w-100 btn-group-toggle " role="group" data-toggle="buttons" >
                        <a class="btn btn-outline-primary btn-sm active" onClick="activateFormBac()">
                          <input type="radio" name="options" id="ouibac" autocomplete="off" checked>Oui
                        </a>
                        
                        <a class="btn btn-outline-primary btn-sm " onClick="activateFormNonBac()">
                          <input type="radio" name="options" id="nonbac" autocomplete="off"> Non
                        </a>
                      </div>

                      <!-- Formulaire de création badge pour ouiBac -->
                      <div  style="display:online;" id="ouiBacForm">
                        <!-- Form Row 1 -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="selecTypeBac" style="font-size:0.8em;color:#64a19d;">Type BAC </label>
                                <select class="form-control form-control" id="selecTypeBac">
                                  <option value="">...</option>
                                  <option value="1">Bac Sciences Agronomiques</option>
                                  <option value="2">Bac Sciences mathématiques A</option>
                                  <option value="3">Bac Sciences mathématiques B</option>
                                  <option value="4">Bac Techniques de gestion et comptabilité</option>
                                  <option value="5">Bac Lettres</option>
                                  <option value="6">Bac Sciences économiques</option>
                                </select>
                                <!-- <input type="text" class="form-control" id="selectTypeBac" required="required" placeholder="... "> -->
                            </div>
                            <div class="form-group col-md-6">
                              <label for="anneeBac" style="font-size:0.8em;color:#64a19d;">Annee Bac </label>
                              <input type="number" min="1900" max="2099" step="1" value="2020" class="form-control" id="anneeBac" required="required" placeholder="...">
                            </div>
                        </div>
                        <!-- Fin Form Row 1 -->

                        <!-- Form Row 2 -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="niveauSup" style="font-size:0.8em;color:#64a19d;">Niveau d'étude Sup </label>
                                <select class="form-control form-control" name="niveauSup" id="selecNiveauSup">
                                  <option value="0">...</option>
                                  <option value="2">Bac + 2</option>
                                  <option value="3">Bac + 3</option>
                                  <option value="4">Bac + 4</option>
                                  <option value="5">Bac + 5</option>
                                  <option value="6">Bac + 6</option>
                                  <option value="7">Bac + 7</option>
                                  <option value="8">Bac + 8</option>
                                </select>
                                <!-- <input type="text" class="form-control" id="levelEtude" required="required" placeholder="... "> -->
                            </div>
                            <div class="form-group col-md-6">
                                <label for="numtel" style="font-size:0.8em;color:#64a19d;">Contact* </label>
                                <input type="tel" 
                                      class="form-control" id="numtel" required="required" placeholder="... ">
                            </div>
                        </div>
                        <!-- Fin Form Row 2 -->
                        
                        <!-- Form Row 3 domaine experience  -->
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="domaineExpepro" style="font-size:0.8em;color:#64a19d;">Domaine Experience pro</label>
                                <input type="text" class="form-control" id="domaineExpepro" required="required" placeholder="... ">
                            </div>                           
                        </div>
                        <!-- Fin Form Row 3 domaine experience  -->
                        <!-- Form Row 3 -->
                        <div class="form-row">
                            <div class="form-group col-md-12">
                              <!-- <label for="inputExpe" style="font-size:0.8em;color:#64a19d;">Expérience Pro </label>
                              <input type="text" class="form-control" id="inputExpe" required="required" placeholder="..."> -->
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" style="font-size:0.8em;color:#64a19d;" >Expérience pro</span>
                                </div>
                                <textarea class="form-control" aria-label="Expérience Pro" id="expepro"></textarea>
                              </div>
                            </div>
                        </div>
                        <!-- Fin Form Row 3 -->

                      </div>
                    <!-- Fin Formulaire de création badge pour ouiBac -->

                    <!-- Formulaire de création badge pour NonBAC -->
                    <div style="display:none;" id="nonBacForm">
                        <!-- Form Row 1 -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="selecNiveauSco" style="font-size:0.8em;color:#64a19d;">Nivau Scolaire </label>
                                <select class="form-control form-control" name="niveauSco" id="selecNiveauSco">
                                  <option value="0">...</option>
                                  <option value="1">Primaire</option>
                                  <option value="2">Collège</option>
                                  <option value="3">Lycée(1ere Année)</option>
                                  <option value="4">Lycée(2ere Année)</option>
                                  <option value="5">Lycée(3ere Année)</option>
                                </select>
                                <!-- <input type="text" 
                                      class="form-control" id="niveauSco" required="required" placeholder="... "> -->
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputetabliactu" style="font-size:0.8em;color:#64a19d;">Etablissement actuel </label>
                              <input type="text" class="form-control" id="inputetabliactu" required="required" placeholder="...">
                            </div>
                        </div>
                        <!-- Fin Form Row 1 -->

                        <!-- Form Row 2 -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputOrientation" style="font-size:0.8em;color:#64a19d;">Orientation d'étud. Sup </label>
                                <input type="text" 
                                      class="form-control" id="inputOrientation" required="required" placeholder="... ">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputnumtelnonBac" style="font-size:0.8em;color:#64a19d;">Numéro Tel </label>
                              <input type="tel" class="form-control" id="inputnumtelnonBac" required="required" placeholder="...">
                            </div>
                        </div>
                        <!-- Fin Form Row 2 -->
                    </div>
                    <!-- Fin Formulaire de création badge pour NonBAC -->

                    <div class="container-fluid">
                      <hr/>
                      <div class="row ">
                        <div class="col-md-4">
                          <a href="#" class="btn btn-sm btn-block btn-primary text-white" onClick="registerBack(1)">
                           <!-- Précédent -->
                           <i class="fas fa-angle-double-left"></i>
                          </a>
                        </div>
                        <div class="col-md-4 offset-md-4">
                          <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                          <a href="#" class="btn btn-sm  btn-block btn-primary text-white rezise-btn" onClick="register()">
                          <i class="fas fa-check-double"></i>
                           <!-- Suivant -->
                           <!-- Go -->
                           <!-- <i class="fas fa-angle-double-right"></i> -->
                          </a>
                        </div>
                      </div>
                    </div> 
                  </form>
                </div>
                <!-- Fin création de Badge -->
            </div>
          </div>          
        </div>
      </div>
    </div>
</div>