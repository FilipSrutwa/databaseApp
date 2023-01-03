<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>
<?php
if (session_status() === PHP_SESSION_NONE)
  session_start();
?>
<div class="container-fluid">
  <h1 class="text-center" style="background-color: aliceblue;">Stworzenie postu</h1>
  <form method="post" class="bg-white">
    <label for="pTopicID">Temat</label>
    <select name="pTopicID">
      <?php
      foreach ($topics as $topic) {
        echo '<option value=' . $topic['ID'] . '>' . $topic['Temat'] . '</option>';
      }
      ?>
    </select>

    <br><label for="pTitle">Tytuł</label><br>
    <input type="text" name="pTitle" maxlength="255" minlength="1" required><br>

    <label for="pText">Treść postu</label><br>
    <textarea name="pText" required cols="100" rows="15"></textarea><br>

    <input type="hidden" name="pAuthorID" value="<?= $_SESSION['userID'] ?>"><br>
    <button type="submit">Utwórz post</button><br>
  </form>
</div>
<?= $this->endSection() ?>