<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>
<?php
session_start();
?>
<div class="container-fluid">
  <h1 class="text-center" style="background-color: aliceblue;">Zgłoszenie uwagi</h1>
  <form method="post" class="bg-white">
    <label for="pText">Treść uwagi</label><br>
    <textarea name="pText" minlength="5" maxlength="255" cols="50" rows="15"></textarea>
    <input type="hidden" name="pUserID" value=<?= $_SESSION['userID'] ?>><br>
    <button class="btn btn-dark btn-lg btn-block">Wyślij</button>
  </form>
</div>
<?= $this->endSection() ?>