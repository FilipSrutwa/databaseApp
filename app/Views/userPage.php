<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>
<!--
Dodaj tu jakiegos CSS
Ma być tutaj:
- wyświetlenie danych uzytkownika: email i nazwa uzytkownika
- przycisk z usunieciem konta (KONIECZNIE MA SIE WYSWIETLIC MODAL Z PYTANIEM O POTWIERDZENIE)
-->
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<div class="container-fluid">
    <h1>Strona użytkownika</h1>
    <h3>Email: <?= $_SESSION['userEmail'] ?></h3>
    <h3>Nazwa uzytkownika: <?= $_SESSION['userName'] ?></h3>
    <a href="/User/changePassword">Przejdz do zmiany hasla</a><br>
    <a href="/User/deleteUser/<?= $_SESSION['userID'] ?>">Usuń hasło</a>
</div>

<?= $this->endSection() ?>