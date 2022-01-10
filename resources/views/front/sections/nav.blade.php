<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav" style="z-index: 99;">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top" style="font-size:2em;">Virtualex</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#page-top">COMMENCER LA VISITE</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">NOUS ?</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#projects">ECOLES</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#signup">CONTACT</a></li>
                <li class="nav-item">
                    @auth
                        <a href="{{ route('visite.hall') }}" class="btn btn-primary text-white mt-2"
                            id="btnVisite360Nav"                            
                            style="padding: 1rem;opacity:0;" >
                            360° VISITE
                            <i class="fas fa-door-open"></i>
                        </a>
                    @else          
                        <a class="btn btn-primary text-white mt-2"
                            data-toggle="modal" 
                            id="btnVisite360Nav"
                            data-target="#login-register-modal" 
                            style="padding: 1rem;opacity:0;" >
                            360° VISITE
                            <i class="fas fa-door-open"></i>
                        </a>
                    @endauth
                </li>

            </ul>
        </div>
    </div>
</nav>