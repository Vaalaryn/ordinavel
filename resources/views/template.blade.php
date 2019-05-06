<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" type="img/x-icon" href="../images/icons/icon-128x128.png"/>
    <link rel="shortcut icon" type="img/x-icon" href="../images/icons/icon-128x128.png"/>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
          integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
            integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
            crossorigin=""></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="manifest" href="/manifest.json">
    <link rel="stylesheet" href="./assets/css/style.css">

    @yield('source')

    <title>@yield('title')</title>
</head>
<body>
<nav class="navbar is-link" id="main_menu">
    <div class="navbar-start">
        <h1 class="navbar-item navbar-brand title has-text-white"><a class="has-text-white" href="/index">Gend-Alim</a></h1>
    </div>

    <?php
    if (Session::has('nigend')) {
    ?>
    <div class="navbar-end navbar-item">
        <a onclick="openNav()" role="button" class="navbar-burger is-hidden-desktop has-background-link" aria-label="menu" aria-expanded="false">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>
    <ul class="tabs navbar-item is-hidden-touch">
        <li><a class="has-text-white" href="cree-fiche">Créer une fiche</a></li>
        <li><a class="has-text-white" href="/"><p>Liste des fiches</p></a></li>
        <li><a class="has-text-white" href="forum">Forum</a></li>
        <li><a class="has-text-white" href="profil">Profil</a></li>
        <!--Affichage uniquement si un admin est connecter-->
        <?= (Session::get('admin') > 1 && Session::get('admin')) ? '<li><a class="has-text-white"  href="admin">Page Admin</a></li>' : ''
        ?>
        <li><a class="has-text-white" href="logout">Se déconnecter</a></li>
    </ul>
    <?php
    }
    ?>
</nav>

<!-- The overlay -->
<div id="myNav" class="overlay">

    <!-- Button to close the overlay navigation -->
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    <!-- Overlay content -->
    <div class="overlay-content">
        <a class="has-text-white" href="cree-fiche">Créer une fiche</a>
        <a class="has-text-white" href="/"><p>Liste des fiches</p></a>
        <a class="has-text-white" href="forum">Forum</a>
        <a class="has-text-white" href="profil">Profil</a>
        <?= (Session::get('admin') > 1 && Session::get('admin')) ? '<a class="has-text-white"  href="admin.php">Page Admin</a>' : '' ?>
        <a class="has-text-white" href="logout">Se déconnecter</a>
    </div>

</div>

@yield('content')

</body>
</html>