<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>S&S PACKAGING - Devis sur mesure </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{url('/vendor/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{url('/css/admin/style.css')}}">
    <style>
        .container-scroller {overflow: hidden; }
        .content-wrapper {
            background: #f2edf3;
            padding: 2.75rem 2.25rem;
            width: 100%;
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1; 
        }
        .page-header {
            margin: 0 0 1.5rem 0; 
        }
        .page-header .breadcrumb {
            border: 0;
            margin-bottom: 0; 
        }
        .page-header{
        -webkit-box-align: center !important;
        -ms-flex-align: center !important;
        align-items: center !important; }
        .page-header{
        display: -webkit-box !important;
        display: -ms-flexbox !important;
        display: flex !important; }
    .page-title {
        color: #343a40;
        font-size: 1.125rem;
        margin-bottom: 0; }
        .page-title .page-title-icon {
            display: inline-block;
        width: 36px;
        height: 36px;
        border-radius: 4px;
        text-align: center;
        -webkit-box-shadow: 0px 3px 8.3px 0.7px rgba(163, 93, 255, 0.35);
        box-shadow: 0px 3px 8.3px 0.7px rgba(163, 93, 255, 0.35); }
        .page-title .page-title-icon i {
        font-size: .9375rem;
        line-height: 36px; }
    .text-white p {
        color: #ffffff !important; 
    }
    .col-lg-12 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100%; 
    }
    .col-1, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-10, .col-11, .col-12, .col,
    .col-auto, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm,
    .col-sm-auto, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-md,
    .col-md-auto, .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg,
    .col-lg-auto, .col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl,
    .col-xl-auto {
        position: relative;
        width: 100%;
        padding-right: 20px;
        padding-left: 20px; 
    }
    .card-body {
        -webkit-box-flex: 1;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1.25rem; 
    }
    .card .card-body {
    padding: 2.5rem 2.5rem; }
    .card .card-body + .card-body {
      padding-top: 1rem; 
    }
    .container,
    .container-fluid,
    .container-sm,
    .container-md,
    .container-lg,
    .container-xl {
    width: 100%;
    padding-right: 20px;
    padding-left: 20px;
    margin-right: auto;
    margin-left: auto; }
    
   .container-fluid{
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between; }
    .d-flex, .page-header, .loader-demo-box, .list-wrapper ul li, .navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .dropdown-menu.navbar-dropdown .dropdown-item, .navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-profile .nav-link {
        display: -webkit-box !important;
        display: -ms-flexbox !important;
        display: flex !important; }
    .justify-content-between, .page-header {
        -webkit-box-pack: justify !important;
        -ms-flex-pack: justify !important;
        justify-content: space-between !important; }
    .col-lg-3 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 25%;
        flex: 0 0 25%;
        max-width: 25%; }
    .pl-0,
    .px-0 {
        padding-left: 0 !important; }
    .pr-0,
    .px-0 {
        padding-right: 0 !important; }
    .text-right {
        text-align: right !important; }
    .mt-5,
    .my-5 {
        margin-top: 3rem !important; }

    .mb-5,
    .my-5 {
        margin-bottom: 3rem !important; }
    .mb-2,
    .my-2 {
        margin-bottom: 0.5rem !important; }
        @media (max-width: 575.98px) {
  .table-responsive-sm {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch; }
    .table-responsive-sm > .table-bordered {
      border: 0; } }

@media (max-width: 767.98px) {
  .table-responsive-md {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch; }
    .table-responsive-md > .table-bordered {
      border: 0; } }

    @media (max-width: 991.98px) {
    .table-responsive-lg {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch; }
        .table-responsive-lg > .table-bordered {
        border: 0; } }

    @media (max-width: 1199.98px) {
    .table-responsive-xl {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch; }
        .table-responsive-xl > .table-bordered {
        border: 0; } }

    .table-responsive {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch; }
    .table-responsive > .table-bordered {
        border: 0; }
    
    .rtl .table-responsive::-webkit-scrollbar,
    .rtl ul.chats::-webkit-scrollbar {
        width: 0.5em; }
    .rtl .table-responsive::-webkit-scrollbar-track,
    .rtl ul.chats::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3); }
    .rtl .product-chart-wrapper::-webkit-scrollbar-thumb,
    .rtl .sidebar-fixed .nav::-webkit-scrollbar-thumb,
    .rtl .table-responsive::-webkit-scrollbar-thumb,
    .rtl ul.chats::-webkit-scrollbar-thumb {
        background-color: darkgrey;
        outline: 1px solid slategrey; }
    
    .w-100 {
        width: 100% !important; }
    
    .table {
    width: 100%;
    margin-bottom: 1rem;
    color: #212529; }
    .table th,
    .table td {
        padding: 0.9375rem;
        vertical-align: top;
        border-top: 1px solid #ebedf2; }
    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #ebedf2; }
    .table tbody + tbody {
        border-top: 2px solid #ebedf2; }
    .bg-dark {
        background-color: #3e4b5b !important; }
    .text-left {
    text-align: left !important; }
    </style>
    <!-- End layout styles -->
  </head>
  <body>
    <div class="container-scroller">
        <div class="">
          <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-dark text-white mr-2">
                    <i class="mdi mdi-receipt"></i>
                    </span> Devis sur mesure
                </h3>
            </div>
            <div class="row">
                <div class="col-lg-12">
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
                        <a href="#" class="btn btn-success float-right mt-4"><i class="mdi mdi-telegram mr-1"></i>Accepter devis</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
            
    </div>   
    </span>
  </body>
</html>