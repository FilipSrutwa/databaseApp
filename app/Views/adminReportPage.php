<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>
<?php
if (session_status() === PHP_SESSION_NONE)
  session_start();
?>
<div class="container-fluid row content">
  <div class="col-sm-1"></div>
  <div class="col-sm-10">
  <h1 class="text-center" style="color:white">Składanie wniosku</h1>
    <form method="post" class="p-2">
      <label for="pText" class="text-light"><h3>Treść wniosku</h3></label><br>
      <div class="d-flex flex-row align-items-start">
        <textarea class="form-control textarea bg-dark mt-4 text-light" onfocus="this.value=''" name="pText" minlength="5" maxlength="255" cols="50" rows="15"></textarea>
      </div>
      <div class="mt-2 text-end">
        <input type="hidden" name="pAdminID" value=<?= $_SESSION['userID'] ?>><br>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Wyślij</button>
      </div>
    </form>
  </div>
</div>
<?= $this->endSection() ?>