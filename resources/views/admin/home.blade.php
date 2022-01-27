@extends("admin.layouts.main")

@section("title","Acceuil Admin")

@section("content")
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-dark text-white mr-2">
          <i class="mdi mdi-home"></i>
        </span> Dashboard
      </h3>
    </div>

    <!-- Dashbord -->
    <div class="row">
      <div class="col-sm-4 grid-margin">
        <div class="card bg-gradient-info text-white">
          <div class="card-body">
            <div class="grey-circle-profile-icon">
              <i class="mdi mdi-receipt"></i>
            </div>
            <h2 class="mb-0 mt-3">10 400</h2>
            <h5 class="font-weight-normal mb-3">Demandes devis</h5>
            <!-- <p class="text-medium m-0">  30%</p> -->
          </div>
        </div>
      </div>
      <div class="col-sm-4 grid-margin">
        <div class="card bg-gradient-success text-white">
          <div class="card-body">
            <div class="grey-circle-profile-icon">
              <i class="mdi mdi-briefcase-upload-outline"></i>
            </div>
            <h2 class="mb-0 mt-3">100 000</h2>
            <h5 class="font-weight-normal mb-3">Commandes</h5>
            <!-- <p class="text-medium m-0">  30%</p> -->
          </div>
        </div>
      </div>
      <div class="col-sm-4 grid-margin">
        <div class="card bg-gradient-danger text-white">
          <div class="card-body">
            <div class="grey-circle-profile-icon">
              <i class="mdi mdi-account-outline"></i>
            </div>
            <h2 class="mb-0 mt-3">109 000</h2>
            <h5 class="font-weight-normal mb-3">Clients</h5>
            <!-- <p class="text-medium m-0"> 30%</p> -->
          </div>
        </div>
      </div>
      <!-- <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
          <div class="card-body">
            <img src="./img/admin//dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Nombre d'Ecole <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">20</h2>
            <h6 class="card-text">Decreased by 10%</h6>
          </div>
        </div>
      </div> -->
      <!-- <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
          <div class="card-body">
            <img src="./img/admin//dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Utilisateurs inscrit<i class="mdi mdi-diamond mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">40</h2>
            <h6 class="card-text">Dans les 3 derniers mois</h6>
          </div>
        </div>
      </div> -->
    </div>
    <div class="row">
      <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Commandes Trimesrielle </h4>
            <canvas id="cmdChart" style="height:230px"></canvas>
          </div>
        </div>
      </div>
      <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Demande de devis </h4>
            <canvas id="ddvChart" style="height:230px"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-5 grid-margin stretch-card">
        <div class="card">
          <div class="card-body p-0 d-flex">
            <div id="inline-datepicker" class="datepicker datepicker-custom"></div>
          </div>
        </div>
      </div>
      <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title text-white">Todo</h4>
                    <div class="add-items d-flex">
                      <input type="text" class="form-control todo-list-input" placeholder="des tâches à faire aujouter ?">
                      <button class="add btn btn-gradient-primary font-weight-bold todo-list-add-btn" id="add-task">Ajouter</button>
                    </div>
                    <div class="list-wrapper">
                      <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                        <li>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox"> Livraison commande CMD5940G </label>
                          </div>
                          <i class="remove mdi mdi-close-circle-outline"></i>
                        </li>
                        <li class="completed">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox" checked> Verifier le niveau de production des sacs de la commandes du client Carfour </label>
                          </div>
                          <i class="remove mdi mdi-close-circle-outline"></i>
                        </li>
                        <li>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox"> Reunion présentation projet IA à 20h30 </label>
                          </div>
                          <i class="remove mdi mdi-close-circle-outline"></i>
                        </li>
                        <li>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox"> Appeller le client SMB </label>
                          </div>
                          <i class="remove mdi mdi-close-circle-outline"></i>
                        </li>
                        <li class="completed">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox" checked> Préparer la présentation demo </label>
                          </div>
                          <i class="remove mdi mdi-close-circle-outline"></i>
                        </li>
                        <li>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox"> Contacter le transitaire concernant la commandes CMD000054 du 25/12/2021 </label>
                          </div>
                          <i class="remove mdi mdi-close-circle-outline"></i>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
    </div>
    <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Statuts commandes </h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Code </th>
                            <th> Client </th>
                            <th> Date de commande </th>
                            <th> Date de livraison prévus </th>
                            <th> Statut actuel </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td> 1 </td>
                            <td> CMD00000001 </td>
                            <td> Carfour Market </td>
                            <td> 01/12/2021 </td>
                            <td> 25/12/2021 </td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td> 2 </td>
                            <td> CMD00000008 </td>
                            <td> SMB </td>
                            <td> 01/12/2021 </td>
                            <td> 25/12/2021 </td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td> 3 </td>
                            <td> CMD00000011 </td>
                            <td> SMB </td>
                            <td> 01/12/2021 </td>
                            <td> 25/12/2021 </td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td> 4 </td>
                            <td> CMD00000091 </td>
                            <td> LEPAINDEVIE </td>
                            <td> 01/12/2021 </td>
                            <td> 25/12/2021 </td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-gradient-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td> 5 </td>
                            <td> CMD00000781 </td>
                            <td> SOLIBRA </td>
                            <td> 01/12/2021 </td>
                            <td> 25/12/2021 </td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td> 5 </td>
                            <td> CMD00000051 </td>
                            <td> BIM </td>
                            <td> 01/12/2021 </td>
                            <td> 25/12/2021 </td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    <!-- </div> -->
@endsection