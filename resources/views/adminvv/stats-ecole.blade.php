@extends("adminvv.layouts.admintask")

@section("title","Statistiques visiteurs")

@section("content")
    <div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-dark text-white mr-2">
        <i class="mdi mdi-chart-areaspline"></i>
        </span> Statistiques Actions visiteurs par ecole
    </h3>
    </div>
    <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Nombre d'actions visiteurs par ecole</h4>
                    </p>
                    <table class="table table-hover">
                    <thead>
                        <tr>
                        <th>Ecole</th>
                        <th>Visite <i class="mdi mdi-launch "></i></th>
                        <th>Visite virtuelle <i class="mdi mdi-home-modern"></i></th>
                        <th>Badge envoyé <i class="mdi mdi-account-circle "></th>
                        <th>Demande de rdv <i class="mdi mdi-flag-variant"></i> </th>
                        <th>Visite site web <i class="mdi mdi-web "></i> </th>                              
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>ESSM</td>
                        <td> <label class="badge badge-dark">30</label></td>
                        <td> <label class="badge badge-warning">30</label></td>
                        <td> <label class="badge badge-info">10</label>  </td>
                        <td><label class="badge badge-primary">20</label> </td>
                        <td> <label class="badge badge-success">50</label> </td>
                        </tr>
                        <tr>
                        <td>ESSM</td>
                        <td> <label class="badge badge-dark">30</label></td>
                        <td> <label class="badge badge-warning">30</label></td>
                        <td> <label class="badge badge-info">10</label>  </td>
                        <td><label class="badge badge-primary">20</label> </td>
                        <td> <label class="badge badge-success">50</label> </td>
                        </tr>
                        <tr>
                        <td>ESSM</td>
                        <td> <label class="badge badge-dark">30</label></td>
                        <td> <label class="badge badge-warning">30</label></td>
                        <td> <label class="badge badge-info">10</label>  </td>
                        <td><label class="badge badge-primary">20</label> </td>
                        <td> <label class="badge badge-success">50</label> </td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                </div>
            </div>

    </div>
    </div>
@endsection