<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="nav-profile-image">
          <img src="/./img/admin/faces/admin.png" alt="profile">
          <span class="login-status online"></span>
          <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2">Administrateur</span>
          <span class="text-secondary text-small">sysadmin</span>
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('admin-home')}}">
        <span class="menu-title">Accueil</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-article" aria-expanded="false" aria-controls="ui-article">
        <span class="menu-title">Articles</span>
        <i class="menu-arrow"></i>
        <i class="  mdi mdi-briefcase menu-icon"></i>
      </a>
      <div class="collapse" id="ui-article">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{route('afficherarticle', 'bret')}}">Bretelles</a></li>
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{route('afficherarticle', 'poig')}}">Poignées</a></li>
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{route('afficherarticle', 'anse')}}">Anses</a></li>
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{route('afficherarticle', 'anselg')}}">Anses Longues</a></li>
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{route('afficherarticle', 'box')}}">Box</a></li>
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{route('afficherarticle', 'lami')}}">Laminé</a></li>
        </ul>
      </div>
    </li> -->

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-article" aria-expanded="false" aria-controls="ui-article">
        <span class="menu-title">Formulaire</span>
        <i class="menu-arrow"></i>
        <i class="  mdi mdi-briefcase menu-icon"></i>
      </a>
      <div class="collapse" id="ui-article">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{route('admin.form.forme.sac.vue')}}">Liste formes sac</a></li>
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{route('admin.form.couleur.sac.vue')}}">Liste couleurs sac</a></li>
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{route('admin.form.taille.sac.vue')}}">Liste tailles sac</a></li>
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{route('admin.form.qte.sac.vue')}}">Liste qte sac</a></li>
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{route('admin.form.grammage.sac.vue')}}">Liste grammages sac</a></li>
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{route('admin.form.taille.anse.sac.vue')}}">Liste tailles anses</a></li>
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{route('admin.form.ajouter.vue')}}">Ajouter nouvel élément</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-devis" aria-expanded="false" aria-controls="ui-devis">
        <span class="menu-title">Devis</span>
        <i class="menu-arrow"></i>
        <i class=" mdi mdi-receipt menu-icon"></i>
      </a>
      <div class="collapse" id="ui-devis">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{route('afficherdevis', 'hebdo')}}">Hebdomadaire</a></li>
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{route('afficherdevis', 'mensuel')}}">Mensuel</a></li>
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{route('afficherdevis', 'annuel')}}">Annuel</a></li>
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{route('afficherdevis', 'all')}}">All </a></li>
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{route('afficherdevis', 'template')}}">Templates </a></li>

        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-cmd" aria-expanded="false" aria-controls="ui-cmd">
        <span class="menu-title">Commandes</span>
        <i class="menu-arrow"></i>
        <i class=" mdi mdi mdi mdi-briefcase-upload menu-icon"></i>
      </a>
      <div class="collapse" id="ui-cmd">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{--route('admin-ajouter-ecole')--}}">Les Commandes</a></li>
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{--route('admin-ajouter-ecole')--}}">Status</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-clients" aria-expanded="false" aria-controls="ui-clients">
        <span class="menu-title">Clients</span>
        <i class="menu-arrow"></i>
        <i class=" mdi mdi-clipboard-account menu-icon"></i>
      </a>
      <div class="collapse" id="ui-clients">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{--route('admin-ajouter-ecole')--}}">Gérer les clients</a></li>
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{--route('admin-ajouter-ecole')--}}">Par catégorie</a></li>
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{--route('admin-ajouter-ecole')--}}">Par date</a></li>

        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-pfc" aria-expanded="false" aria-controls="ui-pfc">
        <span class="menu-title">Prix fixe & Coeff</span>
        <i class="menu-arrow"></i>
        <i class="  mdi mdi-lightbulb-outline menu-icon"></i>
      </a>
      <div class="collapse" id="ui-pfc">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{--route('admin-ajouter-ecole')--}}">Gérer prix fixe</a></li>
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{--route('admin-ajouter-ecole')--}}">Coeff</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-pf" aria-expanded="false" aria-controls="ui-pf">
        <span class="menu-title">Prix & Formules </span>
        <i class="menu-arrow"></i>
        <i class=" mdi mdi-lightbulb menu-icon"></i>
      </a>
      <div class="collapse" id="ui-pf">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{--route('admin-ajouter-ecole')--}}">PRIX EXW</a></li>
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{--route('admin-ajouter-ecole')--}}"> PRIX PAR TRANSPORT ROUTIER</a></li>
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{--route('admin-ajouter-ecole')--}}">Qte prix sacs avec palette/Containers</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-facture" aria-expanded="false" aria-controls="ui-facture">
        <span class="menu-title">Factures</span>
        <i class="menu-arrow"></i>
        <i class=" mdi mdi-note-text menu-icon"></i>
      </a>
      <div class="collapse" id="ui-facture">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{--route('admin-ajouter-ecole')--}}">Factures proformat</a></li>
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{--route('admin-ajouter-ecole')--}}">Factures</a></li>
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{--route('admin-ajouter-ecole')--}}">Bons de livraison</a></li>
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{--route('admin-ajouter-ecole')--}}">BAT</a></li>
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{--route('admin-ajouter-ecole')--}}">Moteur de template</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-cfgc" aria-expanded="false" aria-controls="ui-cfgc">
        <span class="menu-title">Config console</span>
        <i class="menu-arrow"></i>
        <i class=" mdi mdi-wrench menu-icon"></i>
      </a>
      <div class="collapse" id="ui-cfgc">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{--route('admin-ajouter-ecole')--}}">Gérer les accès</a></li>
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{--route('admin-ajouter-ecole')--}}">Template email</a></li>
          <li class="nav-item"> <a class="nav-link" href="#" blink="{{--route('admin-ajouter-ecole')--}}">Template factures</a></li>
        </ul>
      </div>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link" href="pages/icons/mdi.html">
        <span class="menu-title">Personnaliser</span>
        <i class="mdi mdi-table-edit menu-icon"></i>
      </a>
    </li> -->
  </ul>
</nav>