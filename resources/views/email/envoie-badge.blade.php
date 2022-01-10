<!DOCTYPE html>
<html lang="en-US">
   <!-- Mirrored from demo.templateflip.com/material-resume/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 May 2021 23:51:19 GMT -->
   <!-- Added by HTTrack -->
   <meta http-equiv="content-type" content="text/html;charset=utf-8" />
   <!-- /Added by HTTrack -->
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Badge Visiteur</title>
      <!-- <link href="/css/envoie-badge/font-awesome/css/all.min8d1e.css?ver=1.2.2" rel="stylesheet"> -->
      <link href="/css/envoie-badge/mdb.min8d1e.css?ver=1.2.2" rel="stylesheet">
      <link href="/css/envoie-badge/aos8d1e.css?ver=1.2.2" rel="stylesheet">
      <link href="/css/envoie-badge/main8d1e.css?ver=1.2.2" rel="stylesheet">
      <noscript>
        
      </noscript>
   </head>
   <body class="bg-light" id="top">
      <header class="d-print-none">
         <div class="container text-center text-lg-left">
            <div class="pt-4 clearfix">
               <h1 class="site-title mb-0">{{$nomVisiteur}}</h1>
               <div class="site-nav">
                  <nav role="navigation">
                     <ul class="nav justify-content-center">
                        <li class="nav-item"><a class="nav-link" href="#about" title="About"><span class="menu-title">Infos personnel</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="#experience" title="Experience"><span class="menu-title">Experiences</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="#education" title="Education"><span class="menu-title">Parcours</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact" title="Contact"><span class="menu-title">Contacts</span></a></li>
                     </ul>
                  </nav>
               </div>
            </div>
         </div>
      </header>
      <div class="page-content">
         <div class="container">
            <div class="resume-container">
               <div class="shadow-1-strong bg-white my-5" id="intro">
                  <div class="bg-info text-white">
                     <div class="cover bg-image">
                        <!-- <img src="images/header-background.jpg" width="1600" height="685" /> -->
                        <div class="mask" style="background-color: rgba(0, 0, 0, 0.7);backdrop-filter: blur(2px);">
                           <div class="text-center p-5">
                              <div class="avatar p-1"><img class="img-thumbnail shadow-2-strong" src="/img/envoie-badge/windows10-default-user-icon.jpg" width="160" height="160" /></div>
                              <div class="header-bio mt-3">
                                 <div>
                                    <h2 class="h1">{{$nomVisiteur}}</h2>
                                 </div>
                                 <!-- <div class="header-social mb-3 d-print-none" data-aos="zoom-in" data-aos-delay="200">
                                    <nav role="navigation">
                                       <ul class="nav justify-content-center">
                                          <li class="nav-item"><a class="nav-link" href="https://twitter.com/templateflip" title="Twitter"><i class="fab fa-twitter"></i><span class="menu-title sr-only">Twitter</span></a></li>
                                          <li class="nav-item"><a class="nav-link" href="https://www.facebook.com/templateflip" title="Facebook"><i class="fab fa-facebook"></i><span class="menu-title sr-only">Facebook</span></a></li>
                                          <li class="nav-item"><a class="nav-link" href="https://www.instagram.com/templateflip" title="Instagram"><i class="fab fa-instagram"></i><span class="menu-title sr-only">Instagram</span></a></li>
                                          <li class="nav-item"><a class="nav-link" href="https://github.com/templateflip" title="Github"><i class="fab fa-github"></i><span class="menu-title sr-only">Github</span></a></li>
                                       </ul>
                                    </nav>
                                 </div> -->
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="shadow-1-strong bg-white my-5 p-5" id="about">
                  <div class="about-section">
                     <div class="row">
                        <div class="col-md-6">
                           <h2 class="h2 fw-light mb-4">A Propos de Moi</h2>
                           <p>Salut! Je suis {{$nomVisiteur}}  
                                @if($isBac)
                                    <strong>Etudiant ayant un diplôme Bac + {{$niveauEtude}} </strong>
                                @else
                                    <strong>Elève en classe de {{$niveauEtude}}</strong>
                                @endif
                            </p>
                           <p>Après avoir visiter votre etablissement sur <a href="virtualex.ma">virtualex.ma</a> Je vous soumet ma candidature en vue de rejoindre l'Etabliseement pour mes etudes Supérieurs <p>
                        </div>
                        <div class="col-md-5 offset-lg-1">
                           <div class="row mt-2">
                              <h2 class="h2 fw-light mb-4">Informations personnelles</h2>
                              <div class="col-sm-5">
                                 <div class="pb-2 fw-bolder"><i class="far fa-calendar-alt pe-2 text-muted" style="width:24px;opacity:0.85;">
                                </i> Nom & Prénoms </div>
                              </div>
                              <div class="col-sm-7">
                                 <div class="pb-2">{{$nomVisiteur}} </div>
                              </div>
                              <div class="col-sm-5">
                                 <div class="pb-2 fw-bolder"><i class="far fa-envelope pe-2 text-muted" style="width:24px;opacity:0.85;"></i> Email</div>
                              </div>
                              <div class="col-sm-7">
                                 <div class="pb-2">{{$emailVisiteur}}</a></div>
                              </div>
                              <div class="col-sm-5">
                                 <div class="pb-2 fw-bolder"><i class="fas fa-phone pe-2 text-muted" style="width:24px;opacity:0.85;"></i> Telephone</div>
                              </div>
                              <div class="col-sm-7">
                                 <div class="pb-2">{{$numeroVisiteur}}</div>
                              </div>
                           </div>
                        </div>
                     </div> 
                  </div>
               </div>
               {{-- On Affiche l'expérience pro du visiteur si il en a --}}
               
               @if($experiencePro != "")
                    <div class="shadow-1-strong bg-white my-5 p-5" id="experience">
                        <div class="work-experience-section">
                            <h2 class="h2 fw-light mb-4">Expérience Professionnelle</h2>
                            <div class="timeline">
                                <div class="timeline-card timeline-card-info">
                                <div class="timeline-head px-4 pt-3">
                                    <div class="h5">{{$domaineExpePro}}<span class="text-muted h6">---</span></div>
                                </div>
                                <div class="timeline-body px-4 pb-4">
                                    <div class="text-muted text-small mb-3">------</div>
                                    <div>
                                        {{$experiencePro}}
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
               @endif
               {{--Fin section expe pro --}}

               <div class="shadow-1-strong bg-white my-5 p-5" id="education">
                  <div class="education-section">
                     <h2 class="h2 fw-light mb-4">Parcours </h2>
                     <div class="timeline">
                         @if($isBac)
                            {{-- Le visiteur a le Bac : On affiche le parcours Bac --}}
                                <div class="timeline-card timeline-card-success" >
                                    <div class="timeline-head px-4 pt-3">
                                        <div class="h5">Baccalauréat <span class="text-muted h6"> | {{$anneeBac}} </span> </div>
                                    </div>
                                    <div class="timeline-body px-4 pb-4">
                                        <div class="text-muted text-small mb-3">{{$typeBac}}</div> </div>
                                        @if($niveauEtude > 0)
                                            <div> j'ai Actuellement un Bac + {{$niveauEtude}} </div>
                                        @else
                                            {{-- --}}
                                        @endif
                                    </div>
                                </div>
                         @else
                            {{-- Le visiteur n'a pas le Bac : On affiche son niveau Academique --}}
                                <div class="timeline-card timeline-card-success">
                                    <div class="timeline-head px-4 pt-3">
                                        <div class="h5">Niveau Scolaire <span class="text-muted h6"> | -- </span> </div>
                                    </div>
                                    <div class="timeline-body px-4 pb-4">
                                        <div class="text-muted text-small mb-3">{{$niveauEtude}}</div> </div>
                                        <div>---</div>
                                    </div>
                                </div>
                         @endif
                     </div>
                  </div>
               </div>
               <div class="shadow-1-strong bg-white my-5 p-5" id="contact">
                  <div class="contant-section">
                     <h2 class="h2 fw-light text mb-4">Me contacter</h2>
                     <div class="row mb-4">
                        <div class="col-md-5">
                           <div class="mt-1">
                              <div class="h6"><i class="fas fa-phone pe-2 text-muted" style="width:24px;opacity:0.85;"></i> {{$numeroVisiteur}}</div>
                              <div class="h6"><i class="far fa-envelope pe-2 text-muted" style="width:24px;opacity:0.85;"></i> {{$emailVisiteur}}</div>
                           </div>
                        </div>
                        <div class="col-md-7 d-print-none">
                          <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d496.9774799129763!2d-73.98032087190995!3d40.765927126473905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c258f9cfcb250d%3A0xdb570ddcb766e3a8!2sNew%20York%20City%20Center!5e0!3m2!1sen!2sin!4v1614183731149!5m2!1sen!2sin" width="500" height="400" style="border:0;width:100%;" allowfullscreen="" loading="lazy"></iframe> -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <footer class="pt-4 pb-4 text-muted text-center d-print-none">
         <div class="container">
            <div class="my-3">
               <div class="h4">Mail en provenance de Virtual Exhibition</div>
               <div class="footer-nav">
                  <nav role="navigation">
                     <ul class="nav justify-content-center">
                        <li class="nav-item"><a class="nav-link" href="https://virtualex.ma" title="Web"><i class="fas fa-external-link-alt">virtualex.ma</i><span class="menu-title sr-only">Site Web</span></a></li>
                     </ul>
                  </nav>
               </div>
            </div>
            <div class="text-small">
               <div class="mb-1">&copy; Virtual exhibition . tout droits réservés.</div>
            </div>
         </div>
      </footer>
   </body>
</html>

