<?php
$routes = [
    '/' => './pages/home.php',
    '/event/event-erstellen' => './pages/event/create-event.php',
    '/event/event-beitreten' => './pages/event/join-event.php',
    '/event/event-uebersicht' => './pages/event/event-overview.php',
    '/parkour/parkour-erstellen' => './pages/parcour/create-parcour.php',
    '/profil/profil-erstellen' => './pages/user/create-profile.php',
    '/event/event-endscreen' => './pages/event/event-endscreen.php',
    '/event/event-main' => './pages/event/event-main.php',
    '/event/event-endscreen-overview' => './pages/event/event-endscreen-overview.php',
    '/target-test' => './pages/target.php'
];
$page = isset($_GET['page']) ? '/' . rtrim($_GET['page']) : '/';

if (!isset($routes[$page])) {
    $page = '/';
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accurate</title>

    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="/assets/plugins/toastr/toastr.min.css"/>
    <link rel="stylesheet" href="/assets/plugins/swiper/swiper.css" />
    <script src="/assets/plugins/swiper/swiper.js"></script>

    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <script src="/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="/assets/plugins/touch-punch/touch-punch.min.js"></script>
    <script src="/assets/plugins/toastr/toastr.min.js"></script>
    <script src="/assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="/assets/js/accurate-sdk.min.js"></script>
    <script src="/assets/js/app.js"></script>
    <link rel="stylesheet" href="/assets/css/target.css">
</head>
<body class="d-flex flex-column">
<div class="loader">
    <img src="/assets/img/logo.svg" width="200"/>
    <div class="spinner-border text-primary mt-2" style="width:30px;height:30px;" role="status"></div>
</div>

<div class="container sticky-top nav-container">
    <nav class="row">
        <div class="col-6 d-flex align-items-center">
            <a href="/">
                <img src="/assets/img/logo.svg" width="110" alt="">
            </a>
        </div>
        <div class="col-6 d-flex justify-content-end">
            <div class="auth-wrapper">
                <button class="btn btn-primary login-button">Login</button>
                <div class="d-flex align-items-center gap-2">
                    <span class="username" style="display:none"></span>
                    <button class="btn btn-primary logout-button">Logout</button>
                </div>
            </div>
        </div>
    </nav>
</div>

<div class="flex-grow-1">
    <div class="w-100 h-100">
        <?php include $routes[$page] ?>
    </div>
</div>

</body>
</html>
