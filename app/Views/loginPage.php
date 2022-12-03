<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" a href="bootstrap\bootstrap.css">
    <script src="bootstrap\bootstrap.js"></script>
    <title>OriFandom - logowanie</title>
</head>

<body>
  <section class="vh-100">
    <div style="background-image: url('images\background.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    position: fixed; 
    top: 0; 
    left: 0;
    min-width: 100%;
    min-height: 100%;
    z-index: -1;"></div>
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="images\ori1.jpg"
                  alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                  <form>
    
                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                      <span class="h1 fw-bold mb-0">Logowanie</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Wejść do swojego konta</h5>

                    <div class="form-outline mb-4">
                      <input type="text" class="form-control form-control-lg" name="pLogin"/>
                      <label class="form-label" for="pLogin">Login</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" class="form-control form-control-lg" name="pPassword"/>
                      <label class="form-label" for="pPassword">Hasło</label>
                    </div>

                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="button">Login</button>
                    </div>

                    <a class="small text-muted" href="#!">Forgot password?</a>
                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="#!"
                        style="color: #393f81;">Register here</a></p>
                  </form>  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>