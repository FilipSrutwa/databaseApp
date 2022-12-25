<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
  <div class="text-left" style="color:white;">
    <h1 class="text-center">ORI - Fandom</h1>
    <div class="d-flex justify-content-center flex-row flex-wrap border-1" style="padding-bottom: 50px;">
      <?php
      foreach ($posts as $row) {
        echo '<div class="card" style="width: 240px; margin: 7px;">';
        echo '<img src="images\icon.png" class="card-img-top" style="height: 200px ;">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title" style="color: black;">' . $row['Tytul'] . '</h5>';
        echo '<a href="/SinglePost/post/' . $row['ID'] . '" class="btn btn-primary">Przejdź do postu</a>';
        echo '</div>
        </div>';
      }
      ?>
    </div>
  </div>
</div>
<?= $this->endSection() ?>