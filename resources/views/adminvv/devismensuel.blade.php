@extends("adminvv.layouts.main")

@section("title","Liste des Devis | Stats Hebdo")

@section("content")
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-dark text-white mr-2">
          <i class="mdi mdi-receipt"></i>
        </span> Devis/Mensuel
      </h3>
    </div>
    <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Liste devis mensuel</h4>
                    <div class="row grid-margin">
                      <!-- <div class="col-12">
                        <div class="alert alert-warning" role="alert">
                          <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
                        </div>
                      </div> -->
                    </div>
                    <div class="row overflow-auto">
                      <div class="col-12">
                        <table id="devis-mensuel" class="table" cellspacing="0" width="100%">
                          <thead>
                            <tr class="bg-primary text-white">
                              <th>Numero #</th>
                              <th>Demandeur</th>
                              <th>Email </th>
                              <th>Qte article</th>
                              <th>Prix TTC</th>
                              <th>Reponse</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>000001</td>
                              <td>M Sidik Ali</td>
                              <td>sidik@gmail.com</td>
                              <td>4</td>
                              <td>3200 €</td>
                              <td>
                                <label class="badge badge-warning">En attente </label>
                              </td>
                              <td class="text-right">
                                <button class="btn btn-light">
                                  <i class="mdi mdi-eye text-primary"></i>voir</button>
                                <button class="btn btn-light">
                                  <i class="mdi mdi-close text-danger"></i>supprimer</button>
                              </td>
                            </tr>
                            <tr>
                              <td>000002</td>
                              <td>M Sidik Ali</td>
                              <td>sidik@gmail.com</td>
                              <td>4</td>
                              <td>3200 €</td>
                              <td>
                                <label class="badge badge-success">Accepté </label>
                              </td>
                              <td class="text-right">
                                <button class="btn btn-light">
                                  <i class="mdi mdi-eye text-primary"></i>voir</button>
                                <button class="btn btn-light">
                                  <i class="mdi mdi-close text-danger"></i>supprimer</button>
                              </td>
                            </tr>
                            <tr>
                              <td>000002</td>
                              <td>M Sidik Ali</td>
                              <td>sidik@gmail.com</td>
                              <td>4</td>
                              <td>8200 €</td>
                              <td>
                                <label class="badge badge-danger">Refusé </label>
                              </td>
                              <td class="text-right">
                                <button class="btn btn-light">
                                  <i class="mdi mdi-eye text-primary"></i>voir</button>
                                <button class="btn btn-light">
                                  <i class="mdi mdi-close text-danger"></i>supprimer</button>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endsection