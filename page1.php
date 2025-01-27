

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/2121.png" type="image/x-icon">
  <title>Login</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/animatecss/animate.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Inter+Tight:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter+Tight:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"></noscript>
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
</head>
<body>
  <section data-bs-version="5.1" class="menu menu3 cid-tY29h8IJ1d" once="menu" id="menu3-20">
    <nav class="navbar navbar-dropdown navbar-fixed-top collapsed">
        <div class="container">
            <div class="navbar-brand">
                <span class="navbar-caption-wrap"><css><h1>UFO</h1></span>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                    <li class="nav-item"><a class="nav-link link text-black display-4" href="index.php">Home page</a></li>
                    <li class="nav-item"><a class="nav-link link text-black display-4" href="#">Services</a></li>
                    <li class="nav-item"><a class="nav-link link text-black display-4" href="#">Contacts</a></li>
                </ul>
            </div>
        </div>
    </nav>
</section>

<section data-bs-version="5.1" class="form3 cid-tY2907wGCV" id="form3-1x">
    <br><br><br><br>
    <div class="container-fluid">
        <div class="row justify-content-css">
            <div class="col-lg-7 col-12">
                <div class="image-wrapper">
                    <img class="w-100" src="assets/images/mbr-1432x953.jpg">
                </div>
            </div>
            <div class="col-lg-3 offset-lg-1 mbr-form" data-form-type="formoid">
                <form action="process_form.php" method="POST" class="mbr-form form-with-styler" data-form-title="Form Name">
                    <div class="dragArea row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h1 class="mbr-section-title mb-4 display-2"><strong>Welcome</strong></h1>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <p class="mbr-text mbr-fonts-style mb-4 display-7">Login and see what's new.</p>
                        </div>
                        <div data-for="name" class="col-lg-12 col-md col-sm-12 form-group mb-3">
                            <input type="text" name="name" placeholder="Username" data-form-field="name" class="form-control" value="" id="name-form3-1x">
                        </div>
                        <div class="col-lg-12 col-md col-sm-12 form-group mb-3" data-for="email">
                            <input type="email" name="email" placeholder="Email" data-form-field="email" class="form-control" value="" id="email-form3-1x">
                        </div>
                        <div class="col-lg-12 col-md col-sm-12 form-group mb-3" data-for="password">
                            <input type="password" name="password" placeholder="Password" data-form-field="password" class="form-control" value="" id="password-form3-1x">
                        </div>
                        <div class="col-md-auto col-12 mbr-section-btn"><button type="submit" class="btn btn-black display-4">Login</button></div>
                    </div>
                    <h4>Don't have an account? <a href="page2.php">Sign Up</a> now!</h4>
                </form>
            </div>
            <div class="offset-lg-1"></div>
        </div>
    </div>
    <div><css><a href="index.php">Back</a></div>
    <br>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let errorMessage = document.getElementById("error-message");
            let usernameField = document.getElementById("name-form3-1x");
            let passwordField = document.getElementById("password-form3-1x");
            let emailField = document.getElementById("email-form3-1x");

            let urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has("error")) {
                errorMessage.style.display = "block";
                errorMessage.innerHTML = "Incorrect username or password.";
            }

            usernameField.addEventListener("focus", function () {
                errorMessage.style.display = "none";
            });

            passwordField.addEventListener("focus", function () {
                errorMessage.style.display = "none";
            });

            emailField.addEventListener("focus", function () {
                errorMessage.style.display = "none";
            });
        });
    </script>
</section>

<section data-bs-version="5.1" class="footer3 cid-tY29aCTWRk mbr-reveal" once="footers" id="footer3-1z">
    <div class="mbr-overlay" style="opacity: 0.8; background-color: rgb(35, 35, 35);"></div>
    <div class="container-fluid">
        <div class="media-container-row align-css mbr-white">
            <div class="row social-row">
                <div class="social-list align-right pb-2">
                    <div class="soc-item">
                        <a href="#" target="_blank">
                            <span class="socicon-twitter socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div>
                    <div class="soc-item">
                        <a href="#" target="_blank">
                            <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div>
                    <div class="soc-item">
                        <a href="#" target="_blank">
                            <span class="socicon-youtube socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div>
                    <div class="soc-item">
                        <a href="#" target="_blank">
                            <span class="socicon-instagram socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row row-copirayt">
                <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-css display-7"></p>
            </div>
        </div>
    </div>

</section>  
</section><script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>  <script src="assets/smoothscroll/smooth-scroll.js"></script>  <script src="assets/ytplayer/index.js"></script>  <script src="assets/dropdown/js/navbar-dropdown.js"></script>  <script src="assets/theme/js/script.js"></script>  <script src="assets/formoid/formoid.min.js"></script>  


  <input name="animation" type="hidden">
    </body>
</html>