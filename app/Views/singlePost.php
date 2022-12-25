<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>
<?php
session_start();
?>

<!--
DODAJ MIEJSCE NA KOMENTARZE

-->
<div class="container-fluid text-center pb-5">
    <div class="row content">
        <div class="col-sm-1 sidenav"></div>
        <div class="col-sm-10 text-left mt-2" style="background-color: black; color:white;">
            <h1><?= $postTitle ?></h1>
            <!--Nazwa artykułu-->
            <div class="container-fluid row content">
                <div class="col-sm-9" style="text-align: left;"><?= $text ?></div>
                <div class="col-sm-3 text-end">
                    <img src="/images/ori1.jpg" class="img-fluid" style="border-radius: 1rem 1rem 1rem 1rem; max-height:400px" />
                </div>
            </div>

            <hr>
        </div>
        <div class="col-sm-1 sidenav"></div>
    </div>
</div>

<!-- w tym komentażu to co dodałem. To co z góry nie dotykałem======================================================== -->
<div class="container-fluid ">
    <!-- blok komentaży-->
    <div class="row content">
        <div class="col-sm-1"></div>
        <div class="col-sm-10 text-left bg-black">

            <?php
            if (isset($_SESSION['loggedIn'])) {
                echo '<div class="p-2">
                <!-- Dodanie nowego komentaża -->
                <form method="post">
                <div class="d-flex flex-row align-items-start">
                    <textarea class="form-control textarea bg-dark mt-4" style="color:white;" required name="pText">
                    </textarea>
                </div>
                <input type="hidden" name="pCommenterID" value="' . $_SESSION['userID'] . '">
                <div class="mt-2 text-end">
                    <button class="btn btn-primary btn-sm" type="submit">
                        Dodaj komentarz
                    </button>
                </div>
                </form>
            </div> <!-- /Dodanie nowego komentarza-->';
            }
            ?>


            <hr class="text-light"> <!-- linia oddzielająca komentaż -->
            <?php
            foreach ($comments as $comment) {
                echo '<div class="bg-black p-2">
                <!-- Dodany wcześniej komentaż-->
                <div class="d-flex flex-row">
                    <div class="d-flex flex-column justify-content-start">
                        <span class="d-block text-primary">' . $comment['Author'] . '</span> <!-- imie użytkownika-->
                        <span class="text-white-50">' . $comment['CreatedAt'] . '</span>
                    </div> <!-- Data dodania komentaża-->
                </div>
                <div class="mt-2">
                    <!-- tekst komentarza-->
                    <p class="text-light">' . $comment['CommentText'] . '</p>
                </div>
            </div>';
            }
            ?>
            <!-- /Dodany wcześniej komentaż-->

        </div>
    </div>
</div> <!-- /blok komentaży-->
<!-- ======================================================================================= -->

<?= $this->endSection() ?>