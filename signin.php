<?php 

  require 'vendor/autoload.php';

  use Xysdev\Admiflow\Config;

  // Obtener valores de configuración
  $pageTitle = Config::getTemplateConfig('app_name');

 ?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign In <?= $pageTitle; ?></title>
		<?= include_layout('template/ui8/layouts/stylesheets.layout.php'); ?>
           <script>
        document.addEventListener('DOMContentLoaded', function() {
    fetch('module/user/actions/check_session.php')
        .then(response => response.text()) // Cambiado de json() a text() para diagnóstico
        .then(text => {
            try {
                const data = JSON.parse(text);
                if (data.loggedIn) {
                    window.location.href = 'index.html'; // O la página a la que desees redirigir
                }
            } catch (e) {
                console.error('Error al analizar JSON:', e);
                console.error('Texto recibido:', text); // Mostrar el texto recibido para depuración
            }
        })
        .catch(error => {
            console.error('Error al verificar la sesión:', error);
        });
});
    </script>
    </head>

    <body>
<!--Theme mode switcher-->
<div class="position-absolute size-40 me-2 mt-2 end-0 top-0 z-fixed">
    <div class="dropdown">
      <button class="btn btn-outline-secondary size-35 fs-5 d-flex align-items-center justify-content-center p-0"
        id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-display="static">
        <span class="bi my-1 theme-icon-active"><i class="bi bi-sun"></i></span>
      </button>
      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bd-theme" style="--bs-dropdown-min-width: 8rem;">
        <li class="mb-1">
          <button type="button" class="dropdown-item d-flex align-items-center active"
            data-bs-theme-value="light">
            <span class="bi me-2 theme-icon"><i class="bi bi-sun"></i></svg>
              Light
          </button>
        </li>
        <li class="mb-1">
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark">
            <span class="bi me-2 theme-icon"><i class="bi bi-moon"></i></span>
            Dark
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="auto">
            <span class="bi me-2 theme-icon"><i class="bi bi-circle-half"></i></span>
            Auto

          </button>
        </li>
      </ul>
    </div>
  </div>


        <div class="d-flex flex-column flex-root">
            <!--Page-->
            <div class="page d-flex flex-row flex-column-fluid">
                
                <!--///////////Page content wrapper///////////////-->
                <main class="page-content overflow-hidden ms-0 d-flex flex-column flex-row-fluid">

                    <!--//content//-->
                    <div class="content p-1 d-flex flex-column-fluid position-relative">
                        <div class="container py-4">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-md-8 col-lg-5 col-xl-4">
                                    <!--Logo-->
                                    <a href="index.html"
                                        class="d-flex position-relative mb-4 z-1 align-items-center justify-content-center">
                                       
                                            <span class="sidebar-icon size-60 bg-primary text-white rounded-circle">
                            <img src="<?=Config::getTemplateConfig('logo_url'); ?>" alt="Logo" width="54" height="54">
                          </span>
                                   
                                    </a>
                                    <!--Card-->
                                    <div class="card card-body p-4">
                                        <h4 class="text-center">Welcome Back!</h4>
                                        <p class="mb-4 text-muted text-center">
                                            Please Sign In with details...
                                        </p>
                                       <form id="loginForm" class="z-1 position-relative needs-validation" novalidate>
    <div class="form-floating mb-3">
        <input type="email" class="form-control" required id="floatingInput" name="email" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
        <span class="invalid-feedback">Please enter a valid email address</span>
    </div>
    <div class="form-floating mb-3">
        <input type="password" required class="form-control" id="floatingPassword" name="pass" placeholder="Password">
        <label for="floatingPassword">Password</label>
        <span class="invalid-feedback">Enter the password</span>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign In</button>
    <div class="mt-4 mb-3"></div>
    <div class="d-flex align-items-center pb-3">
        <span class="flex-grow-1 border-bottom pt-1"></span>
        <span class="d-inline-flex align-items-center justify-content-center lh-1 size-30 rounded-circle text-mono">or</span>
        <span class="flex-grow-1 border-bottom pt-1"></span>
    </div>
    <div class="d-grid">
        <a href="#!" class="d-flex justify-content-center hover-lift btn-secondary btn position-relative center-both">
            <div class="position-relative d-flex align-items-center">
                <svg fill="currentColor" class="me-2" width="16" height="16" xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24"><path d="M12.48 10.92v3.28h7.84c-.24 1.84-.853 3.187-1.787 4.133-1.147 1.147-2.933 2.4-6.053 2.4-4.827 0-8.6-3.893-8.6-8.72s3.773-8.72 8.6-8.72c2.6 0 4.507 1.027 5.907 2.347l2.307-2.307C18.747 1.44 16.133 0 12.48 0 5.867 0 .307 5.387.307 12s5.56 12 12.173 12c3.573 0 6.267-1.173 8.373-3.36 2.16-2.16 2.84-5.213 2.84-7.667 0-.76-.053-1.467-.173-2.053H12.48z"/></svg>
                <span>sign in with google</span>
            </div>
        </a>
    </div>
</form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--///////////Page content wrapper end///////////////-->

                     <!--//Page-footer//-->
                     <?= include_layout('template/ui8/layouts/footer.layout.php'); ?>
                      <!--/.Page Footer End-->
                </main>
            </div>
        </div>
        
        <!--////////////Theme Core scripts Start/////////////////-->
<?= include_layout('template/ui8/layouts/coreScripts.layout.php'); ?>
        <!--////////////Theme Core scripts End/////////////////-->

        <script>
document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Evita que el formulario se envíe de la manera tradicional

    // Obtén los valores del formulario
    const email = document.getElementById('floatingInput').value;
    const pass = document.getElementById('floatingPassword').value;

    // Envía los datos usando fetch
    fetch('module/user/actions/login_action.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            email: email,
            pass: pass
        })
    })
    .then(response => {
        // Verifica si la respuesta es correcta antes de intentar convertirla a JSON
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            // Login exitoso, redirige al usuario o muestra un mensaje
            window.location.href = data.redirect;
        } else {
            // Muestra el mensaje de error
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Hubo un problema con el inicio de sesión.');
    });
});


</script>


    </body>


<!-- Mirrored from uigator.com/ui8/panel-admin-v2.0/page-auth-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Jul 2024 19:47:53 GMT -->
</html>
