/**
 * Admiflow Global JS
 */

/* =========================
   INIT GLOBAL
========================= */
window.Admiflow = window.Admiflow || {};
window.Admiflow.csrfToken = window.Admiflow.csrfToken || null;

/* =========================
   SECURE FETCH
========================= */
window.Admiflow.secureFetch = function (url, options = {}) {
    if (!window.Admiflow.csrfToken) {
        throw new Error('CSRF token no inicializado');
    }

    const headers = Object.assign(
        {},
        options.headers || {},
        {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': window.Admiflow.csrfToken
        }
    );

    return fetch(url, Object.assign({}, options, {
        credentials: 'same-origin',
        headers
    }));
};

$(document).ready(function () {

    /* =========================
       LOGOUT
    ========================= */
    $('#logout-link').on('click', function (event) {
        event.preventDefault();

        if (!window.Admiflow.csrfToken) {
            alert('CSRF no inicializado');
            return;
        }

        fetch('module/user/actions/logout.php', {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
                'X-CSRF-Token': window.Admiflow.csrfToken
            }
        })
        .then(r => r.json())
        .then(response => {
            if (response.success) {
                window.location.href = response.redirect;
            } else {
                alert('No se pudo cerrar la sesión');
            }
        })
        .catch(err => {
            console.error('Error logout:', err);
            alert('Error al cerrar sesión');
        });
    });

    /* =========================
       INFO USUARIO LOGUEADO
    ========================= */
    function loadUserInfo() {
        $.ajax({
            url: 'module/user/actions/getUserName.php',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    $('#userNameHeader').text(response.username);
                    $('#userRole').text(response.role);
                } else {
                    $('#userNameHeader').text('Guest');
                    $('#userRole').text('unknown');
                }
            },
            error: function () {
                $('#userNameHeader').text('Error');
                $('#userRole').text('Error');
            }
        });
    }

    loadUserInfo();
});
