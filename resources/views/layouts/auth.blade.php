<!DOCTYPE html>
<html lang="en" dir="ltr"  style="--primary-rgb: 14, 107, 230;" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>

    <!-- META DATA eta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Formulaire d'identification des motos">
    <meta name="Author" content="Dev.Gaston Delimond">
    <meta name="keywords" content="IT Developer, Gaston delimond, ">

    <!-- TITLE -->
    <title>Formulaire d'enregistrement des motos </title>

    <!-- FAVICON -->
    <link rel="icon" href="{{asset('assets/img/drapeau_drc.png')}}" type="image/x-icon">

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{asset('assets/login/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- ICONS CSS -->
    <link href="{{asset('assets/login/icon-fonts/icons.css')}}" rel="stylesheet">

    <!-- APP SCSS -->
    <link rel="preload" as="style" href="{{asset('assets/login/css/app.css')}}" />
    <link rel="stylesheet" as="style" href="{{asset('assets/login/css/app.css')}}" />
</head>

<body>



@yield('content')



<!-- SCRIPTS -->

<!-- BOOTSTRAP JS -->
<script src="{{asset('assets/login/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- SECTION SCRIPTS -->
@yield('scripts')
<!-- END SECTION SCRIPTS -->
<!-- END SCRIPTS -->

</body>


</html>
