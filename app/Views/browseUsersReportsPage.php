<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>
<?php
session_start();
?>
<div class="container-fluid d-flex flex-row flex-wrap">
  <?php
  foreach ($dataToShow as $report) {
    echo '
    <div class="card m-2" style="width: fit-content; max-width:25vw;">
    <div class="card-body">
      <h5 class="card-title">ID użytkownika: ' . $report['ID_uzytkownika'] . '</h5>
      <p class="card-text">Treść zgłoszenia:</br>' . $report['Tekst'] . '</p>
      <p class="card-text">Data przyjęcia zgłoszenia: ' . $report['Data'] . '</p>
      <form method="post">
      <input type="hidden" name="pReportID" value="' . $report['ID'] . '">
        <button class="btn btn-primary">Oznacz jako przeczytane</button>
      </form>
    </div>
  </div>';
  }
  ?>
</div>
<?= $this->endSection() ?>