<?php
$routes = [
    '/' => './pages/home.php',
    '/event/create-event' => './pages/event/create-event.php',
    '/event/join-event' => './pages/event/join-event.php',
    '/event/event-overview' => './pages/event/event-overview.php',
    '/user/create-profile' => './pages/user/create-profile.php',
];
$page = '/' . rtrim($_GET['page'], '/');

if (!isset($routes[$page])) {
    $page = '/';
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPArchery</title>


    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="/assets/plugins/toastr/toastr.min.css"/>

    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <script src="/assets/plugins/toastr/toastr.min.js"></script>
    <script src="/assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="/assets/js/accurate-sdk.min.js"></script>
    <script src="/assets/js/app.js"></script>
</head>
<body class="d-flex flex-column">
<div class="loader">
    <img src="/assets/img/logo.svg" width="200"/>
    <div class="spinner-border text-primary mt-2" style="width:30px;height:30px;" role="status"></div>
</div>

<div class="container">
    <nav class="row">
        <div class="col-6 d-flex align-items-center">
            <a href="/">
                <img src="/assets/img/logo.svg" width="110" alt="">
            </a>
        </div>
        <div class="col-6 d-flex justify-content-end">
            <div class="auth-wrapper">
                <button class="btn btn-primary login-button">Login</button>
                <div class="username" style="display:none"></div>
            </div>
        </div>
    </nav>
</div>

<div class="flex-grow-1">
    <div class="bg-white w-100 h-100">
        <?php include $routes[$page] ?>
    </div>
</div>


</body>
</html>