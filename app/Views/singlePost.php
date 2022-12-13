<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>
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

<?= $this->endSection() ?>