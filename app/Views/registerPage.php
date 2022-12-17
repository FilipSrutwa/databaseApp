<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<section class="h-75">
  <div class="container py-2 h-100">
    <div class="row d-flex justify-content-center mt-5 h-100">
      <div class="col col-xl-11">
        <div class="card" style="border-radius: 1rem;">

          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="\images\ori1.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
                <?php
                if (isset($alreadyExists))
                  echo "<p style='color:red;'>Login zajęty!</p>";
                ?>
                <form method="POST">
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Rejestracja</span>
                  </div>
                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Wprowadź swoje dane</h5>

                  <div class="form-outline mb-4">
                    <input type="text" class="form-control form-control-lg" name="pLogin" required />
                    <label class="form-label" for="pLogin">Login</label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="password" class="form-control form-control-lg" name="pPassword" required />
                    <label class="form-label" for="pPassword">Hasło</label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="text" class="form-control form-control-lg" name="pEmail" required pattern="^\S{1,}@\w{1,}.\w{1,}$" />
                    <label class="form-label" for="pEmail">Email</label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="text" class="form-control form-control-lg" name="pName" required />
                    <label class="form-label" for="pName">Nazwa użytkownika</label>
                  </div>
                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block">Zarejestruj się</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>