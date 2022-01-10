@extends('front.layouts.base')

@section("title","Landing Page")

@section("content")
    <!-- Projects-->
    <section class="projects-section bg-light section-ecole" id="ecole-section"  url_get="{{ route('charger.ecole', 0) }}">
        <div class="container" id="indexEcoleContainer">
            <!-- Featured Project Row-->
            <div class="row align-items-center no-gutters mb-4 mb-lg-5 ligneEcol">
                <div class="col-xl-8 col-lg-7 imgEcol"><img class="img-fluid mb-3 mb-lg-0" 
                     src=".\img\ecole\essem_bg.jpg" alt="" /></div>
                <div class="col-xl-4 col-lg-5">
                    <div class="featured-text text-center text-lg-left">
                        <h4 class="nom-ecol-abreger">ESSEM</h4>
                        <p class="text-black-50 mb-0 nomEcol"> 
                            L'Ecole Supérieure des Sciences Economiques et de Management de Casablanca.
                        </p>
                        <a class="btn btn-primary text-primary lienvisiteEcol" style="background-color: transparent;
                            border: #64a19d 1px solid;" href="https://www.essem-bs.com/" >
                            visiter le site
                            <i class="fas fa-globe"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection