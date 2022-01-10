<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Virtualex - @yield("title") </title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet"  href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Batman css wigdet -->
        <!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css"> -->
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/front/styles.css" rel="stylesheet" />
        <link href="css/front/login-register.css" rel="stylesheet" />
        <link href="css/front/home-style.css" rel="stylesheet" />
    </head>
    <body id="page-top">

        @include('front.sections.loader-layer')

        @include("front.sections.nav")

        @include("front.sections.header")

        @include("front.sections.about")

        @yield("content")                

        @include("front.sections.newslettres-contact")

        @include("front.sections.footer")
        
        <!-- Inclusion des Modales -->
        @auth
            {{-- Si l'utilisateur est connecté on n'affiche pas de modal--}}
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        @else
            @include("front.modals.login-registre-form")
        @endauth

        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>    
        {{-- text animation --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

        <!-- Botman widget -->
        <!-- <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0.0.20/build/js/widget.js'></script> -->

        <!-- Core theme JS-->
        <script src="./js/front/scripts.js"></script>
        <!-- BotMan  -->
        <script src="./js/front/register.js"></script>
        <!-- js pour charger les ecoles dans la page d'acceuil  -->
        <script src="./js/front/injecter-ecole-home.js"></script>
        <!-- <script src="./js/front/botman.js"></script> -->


        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-481B8Z2TFY"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-481B8Z2TFY');
        </script>
    </body>
</html>
