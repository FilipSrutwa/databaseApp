<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>
<?php
if (session_status() === PHP_SESSION_NONE)
  session_start();
?>
<div class="container-fluid row content">
  <div class="col-sm-1"></div>
  <div class="col-sm-10">
    <h1 class="text-center" style="color:white;">Stworzenie postu</h1>
    <form method="post" class="p-2">
      <label for="pTopicID" style="color: white">Temat</label>
      <select name="pTopicID" class="rounded-5 bg-secondary text-light">
        <?php
        foreach ($topics as $topic) {
          echo '<option value=' . $topic['ID'] . '>' . $topic['Temat'] . '</option>';
        }
        ?>
      </select>

      <br><br><label for="pTitle" class="text-light" style="margin-right: 10px">Tytuł</label>
      <input class="rounded-3 bg-secondary text-light" type="text" name="pTitle" maxlength="255" minlength="1" required><br>

      <br><label for="pText" class="text-light">Treść postu</label><br>
      <textarea class="form-control textarea bg-dark mt-4 text-light" onfocus="this.value=''" name="pText" required cols="100" rows="15"></textarea><br>

      <input type="hidden" name="pAuthorID" value="<?= $_SESSION['userID'] ?>"><br>
      <button class="btn btn-primary btn-lg btn-block" type="submit">Utwórz post</button><br>
    </form>
  </div>
</div>
<?= $this->endSection() ?>