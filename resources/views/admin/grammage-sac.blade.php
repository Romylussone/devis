@extends("admin.layouts.main")

@section("title","Liste des grammages de sac")

@section("content")
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-dark text-white mr-2">
          <i class="mdi mdi-briefcase"></i>
        </span> Formulaire / Liste grammage de sac
      </h3>
    </div>
    <!-- Liste des articles      -->
    <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Liste des grammages de sac</h4>
                    <div class="table-responsive">
                      <table class="table" id="grammage-sac-list">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th>Grammage</th>
                            <th>Libéllé</th>
                            <th>Statut</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($params as $k => $v)
                            @php 
                              $del_url = route('admin.form.grammage.sac.vue', ['delete',$v->id]);
                            @endphp
                            <tr id="{{$v->id}}" class="ligneGrammageSacID">
                              <td>{{$k+1}}</td>
                              <td class="grammage">{{$v->grammage}}</td>
                              <td class="libelle">{{$v->libelle}}</td>
                              <td class="statut">{{$v->statut}}</td>
                              <td class="">
                                <button class="btn btn-light btnvoirGrammageSac">
                                  <i class="mdi mdi-eye text-primary"></i>voir/modifier</button>
                                <button class="btn btn-light" onclick="showSwal('avertissement-suppresion', '{{$del_url}}')">
                                  <i class="mdi mdi-close text-danger btnSupprimeroffre"></i>supprimer
                                </button>
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