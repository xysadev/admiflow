<?php
// layout-loader.php

require_once __DIR__ . '/../../../vendor/autoload.php'; // ajustá si hace falta

use Xysdev\Admiflow\Session;

// Inicia / retoma sesión
Session::start();
?>

<!-- CSRF GLOBAL (se inicializa UNA vez por request de página) -->
<script>
    window.Admiflow = window.Admiflow || {};
    window.Admiflow.csrfToken = <?= json_encode(Session::csrfToken()) ?>;

window.Admiflow.secureFetch = function (url, options = {}) {
    options.headers = options.headers || {};
    options.headers['Content-Type'] = 'application/json';
    options.headers['X-CSRF-TOKEN'] = window.Admiflow.csrfToken;
    options.credentials = 'same-origin';
    return fetch(url, options);
};
</script>
<!-- PAGE LOADER -->
<div class="loader">
    <!-- Placeholder animated layout for preloader -->
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">

            <!-- Sidebar -->
            <aside class="page-sidebar placeholder-wave">
                <div class="placeholder col-12 h-100 bg-gray"></div>
            </aside>

            <!-- Content -->
            <div class="page-content d-flex flex-column flex-row-fluid">
                <div
                    class="content flex-column p-4 pb-0 d-flex justify-content-center align-items-center flex-column-fluid position-relative">

                    <div class="w-100 h-100 position-relative d-flex align-items-center justify-content-center">
                        <div class="spinner-border me-3 text-primary" role="status"></div>
                        <div>
                            <span>Loading...</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
