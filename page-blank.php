<?php 

require 'vendor/autoload.php';

use Xysdev\Admiflow\Config;
use Xysdev\Admiflow\User\User; // Asegúrate de importar la clase User


// Obtener valores de configuración
$pageTitle = Config::getTemplateConfig('app_name');

// Crear una instancia de User y obtener el usuario autenticado
$userClass = new User();
$user = $userClass->getAuthenticatedUser(); // Obtener los datos del usuario

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blank, empty page - <?= htmlspecialchars($pageTitle); ?></title>

    <?= include_layout('template/ui8/layouts/stylesheets.layout.php'); ?>
</head>

<body>
    <!--////////////////// PreLoader Start//////////////////////-->
    <?= include_layout('template/ui8/layouts/preloader.layout.php'); ?>
    <!--////////////////// /.PreLoader END//////////////////////-->

    <!--App Start-->
    <div class="d-flex flex-column flex-root">
        <!--Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--///////////Page sidebar begin///////////////-->
            <?= include_layout('template/ui8/layouts/aside.layout.php'); ?>
            <!--///.Sidebar close end///-->

            <!--///////////Page content wrapper///////////////-->
            <main class="page-content d-flex flex-column flex-row-fluid">
                <!--//page-header//-->
                <?= include_layout('template/ui8/layouts/header.layout.php'); ?>
                <!--Main Header End-->

                <!--//Chat offcanvas start//-->
                <?= include_layout('template/ui8/layouts/offcanvasChat.layout.php'); ?>
                <!--//Chat offcanvas end//-->

                <!--//Page Toolbar//-->
                <div class="toolbar p-4 bg-body">
                    <div class="position-relative container-fluid px-0">
                        <div class="row align-items-center position-relative">
                            <div class="col-md-8 mb-4 mb-lg-0">
                                <h3 class="mb-2">Blank page</h3>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="#!">Home</a></li>
                                        <li class="breadcrumb-item active">Pages</li>
                                        <li class="breadcrumb-item active">Blank</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!--//Page Toolbar End//-->

                <!--//Page content//-->
                <div class="content p-4 d-flex flex-column-fluid">
                    <div class="container-fluid px-0">
                        <h5>Content here...</h5>
                        <?php if ($user): ?>
                            <p>Welcome, <?= htmlspecialchars($user['nombre']); ?>!</p>
                        <?php else: ?>
                            <p>Welcome, Guest!</p>
                            <!-- Puedes redirigir al usuario a la página de inicio de sesión aquí si lo deseas -->
                           
                                <p>Hello! It looks like you are not logged in yet. To access your projects and personalized settings, please <a href="signin.html">log in</a>. If you don't have an account yet, you can sign up to start enjoying our features.</p>

                        <?php endif; ?>
                        <!-- Aquí puedes usar cualquier dato del usuario que necesites -->
                    </div>
                </div>
                <!--//Page content End//-->

                <!--//Page-footer//-->
                <?= include_layout('template/ui8/layouts/footer.layout.php'); ?>
                <!--/.Page Footer End-->
            </main>
            <!--///////////Page content wrapper End///////////////-->
        </div>
    </div>
    
    <!--////////////Theme Core scripts Start/////////////////-->
    <?= include_layout('template/ui8/layouts/coreScripts.layout.php'); ?>
    <!--////////////Theme Core scripts End/////////////////-->

</body>
</html>
