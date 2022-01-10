@extends("adminvv.layouts.main")

@section("title","Templates de devis")

@section("content")
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-dark text-white mr-2">
          <i class="mdi mdi-receipt"></i>
        </span> Devis/Templates
      </h3>
    </div>
    <div class="row">
              <div class="col-lg-12">
                <div class="card px-2">
                  <div class="card-body">
                    <div class="container-fluid">
                      <h3 class="text-right my-5">Devis&nbsp;&nbsp;#00001</h3>
                      <hr>
                    </div>
                    <div class="container-fluid d-flex justify-content-between">
                      <div class="col-lg-3 pl-0">
                        <p class="mt-5 mb-2"><b>S&S PACKAGING </b></p>
                        <p>Route 1077,<br>Par Route D'El Jadida,<br>Lot. Tissir N 22 Z.I. Lissasfa.</p>
                      </div>
                      <div class="col-lg-3 pr-0">
                        <p class="mt-5 mb-2 text-right"><b>Devis pour </b></p>
                        <p class="text-right">Gaala & Sons,<br> C-201, Beykoz-34800,<br> Canada, K1A 0G9.</p>
                      </div>
                    </div>
                    <div class="container-fluid d-flex justify-content-between">
                      <div class="col-lg-3 pl-0">
                        <p class="mb-0 mt-5">Date de devis : 07 Janv. 2022</p>
                        <p>Date de demande : 07 Janv. 2022</p>
                      </div>
                    </div>
                    <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                      <div class="table-responsive w-100">
                        <table class="table">
                          <thead>
                            <tr class="bg-dark text-white">
                              <th>#</th>
                              <th>Article</th>
                              <th>Description</th>
                              <th class="text-right">Qte</th>
                              <th class="text-right">Prix unitaire</th>
                              <th class="text-right">Prix Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="text-right">
                              <td class="text-left">1</td>
                              <td class="text-left">Bretelle</td>
                              <td>Bretelle Hauteur 23, largeur 40, grammage 4 et impression neutre</td>
                              <td>100000</td>
                              <td>0,002€</td>
                              <td>2000€</td>
                            </tr>
                            <tr class="text-right">
                              <td class="text-left">1</td>
                              <td class="text-left">Anses</td>
                              <td>Bretelle Hauteur 23, largeur 40, grammage 4 et impression neutre</td>
                              <td>100000</td>
                              <td>0,002€</td>
                              <td>2000€</td>
                            </tr>
                            <tr class="text-right">
                              <td class="text-left">1</td>
                              <td class="text-left">Box</td>
                              <td>Bretelle Hauteur 23, largeur 40, grammage 4 et impression neutre</td>
                              <td>100000</td>
                              <td>0,002€</td>
                              <td>2000€</td>
                            </tr>
                            <tr class="text-right">
                              <td class="text-left">1</td>
                              <td class="text-left">Bretelle</td>
                              <td>Bretelle Hauteur 23, largeur 40, grammage 4 et impression neutre</td>
                              <td>100000</td>
                              <td>0,002€</td>
                              <td>2000€</td>
                            </tr>
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="container-fluid mt-5 w-100">
                      <p class="text-right mb-2">Sous - Total arrété à : ......€</p>
                      <p class="text-right">TVA (10%) : ...€</p>
                      <h4 class="text-right mb-5">Total : .....€</h4>
                      <hr>
                    </div>
                    <div class="container-fluid w-100">
                      <a href="#" class="btn btn-primary float-right mt-4 ml-2"><i class="mdi mdi-printer mr-1"></i>Imprimer</a>
                      <a href="#" class="btn btn-success float-right mt-4"><i class="mdi mdi-telegram mr-1"></i>Envoyer Devis</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endsection