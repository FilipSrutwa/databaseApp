<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>
<?php
if (session_status() === PHP_SESSION_NONE)
  session_start();
?>
<div class="container-fluid">
  <h1 class="text-center" style="background-color: aliceblue;">Składanie wniosku</h1>
  <form method="post" class="bg-white">
    <label for="pText">Treść wniosku</label><br>
    <textarea name="pText" minlength="5" maxlength="255" cols="50" rows="15"></textarea>
    <input type="hidden" name="pAdminID" value=<?= $_SESSION['userID'] ?>><br>
    <button class="btn btn-dark btn-lg btn-block">Wyślij</button>
  </form>
</div>
<?= $this->endSection() ?>