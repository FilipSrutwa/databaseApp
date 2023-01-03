<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>=
<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();
?>
<div class="container-fluid text-center pb-5">
    <div class="row content">
        <div class="col-sm-1 sidenav"></div>
        <div class="col-sm-10 text-left mt-2" style="background-color: black; color:white;">
            <h1><?= $pendingPost->Tytul ?></h1>
            <!--Nazwa artykułu-->
            <div class="container-fluid row content">
                <div class="col-sm-9" style="text-align: left;"><?= $pendingPost->Tekst ?></div>
                <div class="col-sm-3 text-end">
                    <img src="/images/ori1.jpg" class="img-fluid" style="border-radius: 1rem 1rem 1rem 1rem; max-height:400px" />
                </div>
            </div>

            <hr>
            <?= "<p class='text-danger'>Autor postu: $pendingPost->Author_name</p>" ?>
            <form method="post">
                <input type="hidden" name="pAuthorID" value="<?= $pendingPost->ID_autora ?>">
                <input type="hidden" name="pTopicID" value="<?= $pendingPost->ID_temat ?>">
                <input type="hidden" name="pTitle" value="<?= $pendingPost->Tytul ?>">
                <input type="hidden" name="pText" value="<?= $pendingPost->Tekst ?>">
                <input type="hidden" name="pAdminID" value="<?= $_SESSION['userID'] ?>">
                <button>Zatwierdź post</button>
            </form>
        </div>
        <div class="col-sm-1 sidenav"></div>
    </div>
</div>
<?= $this->endSection() ?>