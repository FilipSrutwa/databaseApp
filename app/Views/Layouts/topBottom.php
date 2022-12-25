<!DOCTYPE html>
<html lang="pl">
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!--LAYOUT Z UZUPELNIONA GORA I DOLEM!-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= (isset($title) ? $title : "Ori-fandom") ?></title>
    <link rel="shortcut icon" href="/assets/Icons/mainIco.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body style="background-image: url('/images/background.jpg'); background-repeat:no-repeat;background-size: cover;">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between p-2 border-bottom">
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="/" class="nav-link px-2 link-light">Home</a></li>
            <?php
            if (isset($_SESSION['loggedIn'])) {
                echo "<li><a href='/User' class='nav-link px-2 link-light'>Użytkownik</a></li>";
                echo "<li><a href='/UserReport' class='nav-link px-2 link-light'>Wyślij uwagę</a></li>";
                echo "<li><a href='/UserReport/BrowseUsersReports' class='nav-link px-2 link-light'>Uwagi użytkowników</a></li>";
                echo "<li><a href='/PendingPosts' class='nav-link px-2 link-light'>Oczekujące posty</a></li>";
                echo "<li><a href='/CreatePost' class='nav-link px-2 link-light'>Dodaj post</a></li>";
                echo "<li><a href='/AdminReport' class='nav-link px-2 link-light'>Wyślij wniosek administratora</a></li>";
                echo "<li><a href='/AdminReport/BrowseAdminsReports' class='nav-link px-2 link-light'>Uwagi administratorów</a></li>";
            }
            ?>
        </ul>
        <div class="text-end">
            <?php
            if (isset($_SESSION['loggedIn'])) {
                echo "<a href='/Logout' class='btn btn-outline-primary me-2 mr-2'>Wyloguj się </a>";
            } else {
                echo "<a href='/Login' class='btn btn-outline-primary me-2 mr-2'>Zaloguj się</a>";
                echo "<a href='/Register' class='btn btn-primary'>Zarejestruj się</a>";
            }
            ?>
        </div>
    </header>

    <div class="content">
        <?= $this->renderSection('content') ?>
    </div>

    <!--TUTAJ MOŻESZ DODAĆ STOPKĘ,
    ALE NIE MUSISZ, STRONA I TAK WYGLĄDA DOBRZE-->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>