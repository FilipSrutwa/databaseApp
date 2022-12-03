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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body style="background-image: url('images/background.jpg'); background-repeat:no-repeat;background-size: cover;">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between p-2 border-bottom">
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="/" class="nav-link px-2 link-light">Home</a></li>
            <li><a href="#" class="nav-link px-2 link-light">#</a></li>
            <li><a href="#" class="nav-link px-2 link-light">#</a></li>
            <li><a href="#" class="nav-link px-2 link-light">#</a></li>
        </ul>
        <div class="text-end">
            <?php
            if (isset($_SESSION['loggedIn']))
                echo "<a href='/Logout' class='btn btn-outline-primary me-2 mr-2'>Wyloguj się </a>";
            else {
                echo "<a href='/Login' class='btn btn-outline-primary me-2 mr-2'>Zaloguj się</a>";
                echo "<a href='/Register' class='btn btn-primary'>Zarejestruj się</a>";
            }
            ?>
        </div>
    </header>

    <div class="content">
        <?= $this->renderSection('content') ?>
    </div>

    <div class="footer align-items-center justify-content-center bg-dark text-light text-center fixed-bottom" style="height: 5vh;">
        <!--
        To jest przygotowany div na stopke, mozesz zmienic lub zostawic    
        !-->
        <p style="font-size: 2.5vh;">Strona Valerka i Fifiego</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>