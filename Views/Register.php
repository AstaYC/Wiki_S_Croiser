<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
    <link rel="stylesheet" href="../Public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Public/assets/css/templatemo-style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
      <section class="vh-100" style="background-color: gray;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                  <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                      alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                  </div>
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">      

                      <form method="POST" onsubmit="return validateForm()">      

                        <div class="d-flex align-items-center mb-3 pb-1">
                          <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                          <span class="h1 fw-bold mb-0">Welcome to Registration Page!</span>
                        </div>      

                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>      
                        
                        <div class="form-outline mb-1">
                        <label class="form-label" for="form2Example17">Full Name</label>  
                        <input type="name" id="nom" name="nom" class="form-control form-control-lg" />
                        </div> 

                        <div class="form-outline mb-1">
                        <label class="form-label" for="form2Example17">Email address</label>  
                        <input type="email" id="email" name="email" class="form-control form-control-lg" />
                        </div> 

                        <div class="form-outline mb-1">
                        <label class="form-label" for="form2Example17">Password</label>  
                        <input type="password" id="password" name="password" class="form-control form-control-lg" />
                        </div>      

                        <div class="form-outline mb-1">
                          <label class="form-label" for="form2Example27">Confirm your Password</label>
                          <input type="password" id="password_2" name="password_2"  class="form-control form-control-lg" />
                        </div>      

                        <div class="pt-1 mb-4">
                          <button class="btn btn-dark btn-lg btn-block" name="register" type="submit">Register</button>
                        </div>      

                        <a class="small text-muted" href="#!">Forgot password?</a>
                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Do you have an account? 
                        <a href="/login"style="color: #393f81;">Login here</a></p>
                      
                      </form>      

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <script>

        // validation.js
      function validateForm() {
          var username = document.getElementById('nom').value;
          var email = document.getElementById('email').value;
          var password = document.getElementById('password').value;
          var password_2 = document.getElementById('password_2').value;

      
          if (username.trim() === '') {
              alert('Please enter a username');
              return false;
          }
      
          var emailRegex = /^[^\s@]+@[^\s@]+.[^\s@]+$/;
          if (!emailRegex.test(email)) {
              alert('Invalid email format');
              return false;
          }
      
          if (password.trim() === '') {
              alert('Please enter a password');
              return false;
          }

          if (password_2.trim() === '') {
              alert('Please enter the confirm password');
              return false;
          }
      
          return true;
   }
      </script>
</body>
</html>