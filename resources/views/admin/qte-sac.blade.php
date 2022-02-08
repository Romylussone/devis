@extends("admin.layouts.main")

@section("title","Liste des quantités de sac")

@section("content")
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-dark text-white mr-2">
          <i class="mdi mdi-briefcase"></i>
        </span> Formulaire / Liste quantité de sac
      </h3>
    </div>
    <!-- Liste des articles      -->
    <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Liste des quantités de sac</h4>
                    <div class="table-responsive">
                      <table class="table" id="qte-sac-list">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th>Qte</th>
                            <th>Libelle</th>
                            <!-- <th></th> -->
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($params as $k => $v)
                            @php 
                              $del_url = route('admin.form.qte.sac.vue', ['delete',$v->id]);
                            @endphp
                            <tr id="{{$v->id}}" class="ligneQteSacID">
                              <td>{{$k+1}}</td>
                              <td class="qte">{{$v->qte}}</td>
                              <td class="libelle"> {{$v->libelle}}</td>
                              <td class="">
                                <button class="btn btn-light btnvoirQteSac">
                                  <i class="mdi mdi-eye text-primary"></i>voir/modifier</button>
                                <!-- <button class="btn btn-light" onclick="showSwal('avertissement-suppresion', '{{$del_url}}')">
                                  <i class="mdi mdi-close text-danger btnSupprimeroffre"></i>supprimer
                                </button> -->
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    <!-- </div> -->
@endsection