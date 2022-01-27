<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport">
    <title>S&S PACKAGING - Devis sur mesure </title>
    <!-- plugins:css -->
    <!-- <link rel="stylesheet" href="{{url('/vendor/mdi/css/materialdesignicons.min.css')}}"> -->
    <link rel="stylesheet" href="{{url('/css/admin/style.css')}}">
    <!-- End layout styles -->
  </head>
  <body >
    <div class="container-scroller">
        <div class="">
          <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-2">
                    .
                </div>
                <div class="col-lg-8" id="devisToPdf">
                    <div class="card px-2">
                    <div class="card-body">
                        <div class="container-fluid">
                        <h3 class="text-right my-5">Devis&nbsp;&nbsp;#{{sprintf("%'.05d", $numero)}}</h3>
                        <hr>
                        </div>
                        <div class="container-fluid d-flex justify-content-between">
                        <div class="col-lg-3 pl-0">
                            <p class="mt-5 mb-2"><b>S&S PACKAGING </b></p>
                            <p>Route 1077,<br>Par Route D'El Jadida,<br>Lot. Tissir N 22 Z.I. Lissasfa.</p>
                        </div>
                        <div class="col-lg-3 pr-0">
                            <p class="mt-5 mb-2 text-right"><b>Devis pour </b></p>
                            <p class="text-right">{{$entreprise}},<br></p>
                        </div>
                        </div>
                        <div class="container-fluid d-flex justify-content-between">
                        <div class="col-lg-3 pl-0">
                            <p class="mb-0 mt-5">Date de devis : {{date('Y-m-dd')}}</p>
                            <p>Date de demande : {{date('Y-m-dd')}}</p>
                        </div>
                        </div>
                        <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                        <div class="table-responsive w-100">
                            <table class="table">
                            <thead>
                                <tr class="bg-dark text-white">
                                <th>#</th>
                                <th>Designation </th>
                                <th>Nombre de sac par carton</th>
                                <th class="text-right">Nombre Tot de carton</th>
                                <th class="text-right">Qte sac</th>
                                <th class="text-right">Prix unitaire</th>
                                <th class="text-right">Prix Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr class="text-right">
                                    <td class="text-left">1</td>
                                    <td class="text-left">Bretelles 45 x 26 x 12 (Hauteur x Largeur x Soufflet en cm)</td>
                                    <td>500</td>
                                    <td>40</td>
                                    <td>20000</td>
                                    <td>0.03159€</td>
                                    <td>631.80000 €</td>
                                </tr> -->
                                @foreach ($devis as $dev)
                                <tr class="text-right">
                                    <td class="text-left">1</td>
                                    <td class="text-left">{{substr($dev["designation"], 0, 59)}}</td>
                                    <td>{{$dev["nb_sac_par_carton"]}}</td>
                                    <td>{{$dev["nb_tot_carton"]}}</td>
                                    <td>{{$dev["nb_tot_sac"]}}</td>
                                    <td>{{$dev["pu_sac_prix_exw"]}}€</td>
                                    <td>{{$dev["Total"]}}€</td>
                                </tr>
                                @endforeach
                                
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
                        <!-- <a href="#" class="btn btn-primary float-right mt-4 ml-2"><i class="mdi mdi-printer mr-1"></i>J'en profite</a> -->
                        <a href="#" class="btn btn-success float-right mt-4 btnDevisToPdf" ><i class="mdi mdi-telegram mr-1"></i>Accepter devis</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </span>
    <script src="/vendor/html2canvas/html2canvas.min.js"></script>
    <script src="/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="/vendor/jspdf1.5.3/jspdf.debug.js"></script>
    <script src="/js/admin/devis-jsPdf.js"></script>
  </body>
</html>