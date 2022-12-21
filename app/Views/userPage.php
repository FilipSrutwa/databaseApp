<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>
<section class="h-75">
  <div class="container py-2 h-100">
    <div class="row d-flex justify-content-center mt-5 h-100">
      <div class="col col-xl-10">
        <!-- zmienić ogólną szerokość okienka można tutaj "col-xl-10"-->
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-12 d-flex align-items-center">
              <!--blok danych osobistych mam 4 columny do przycisku usun-->
              <div class="card-body p-4 p-lg-5 text-black">
                <div class="d-flex align-items-center mb-3 pb-1">
                  <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                  <span class="h1 fw-bold mb-0">Strona użytkownika</span>
                </div>

                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Dane użytkownika</h5>

                <div class="form-outline mb-4">
                  <h3>Email: <?= $_SESSION['userEmail'] ?></h3>
                </div>

                <div class="form-outline mb-4">
                  <h3>Nazwa uzytkownika: <?= $_SESSION['userName'] ?></h3>
                </div>

                <div class="form-outline mb-4">
                  <a class="btn btn-dark btn-lg btn-block" href="/User/changePassword">Przejdz do zmiany hasla</a>
                </div>

                <div class="form-outline mb-4 text-end">
                  <a class="btn btn-outline-danger btn-lg btn-block" data-bs-toggle="modal" data-bs-target="#myModal">Usuń konto</a>
                </div>

                <!-- modal window====================================-->
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="modatl-title" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Usuwanie konta</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Czy na pewno chcesz usunąć konto?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                        <a type="button" class="btn btn-outline-danger" href="/User/deleteUser/<?= $_SESSION['userID'] ?>">Usuń konto</a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- modal window====================================-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>