$(document).ready(function() {
    /**
     * Manejar el evento de clic en el enlace de cierre de sesión.
     */
    $('#logout-link').on('click', function(event) {
        event.preventDefault(); // Prevenir la acción por defecto del enlace

        $.ajax({
            url: 'module/user/actions/logout.php',
            method: 'POST',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    // Redirigir al usuario a la página de inicio de sesión
                    window.location.href = response.redirect;
                } else {
                    alert('No se pudo cerrar la sesión. Inténtalo de nuevo.');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error al cerrar sesión:', error);
                alert('Ocurrió un error al cerrar sesión.');
            }
        });
    });

    /**
     * Obtener el nombre de usuario y rol, y mostrarlo en los elementos correspondientes.
     */
    function loadUserInfo() {
        $.ajax({
            url: 'module/user/actions/getUserName.php',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#userNameHeader').text(response.username);
                    $('#userRole').text(response.role);
                } else {
                    $('#userNameHeader').text('Guest');
                    $('#userRole').text('unknown role');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error al obtener la información del usuario:', error);
                $('#userNameHeader').text('Error al obtener la información');
                $('#userRole').text('Error');
            }
        });
    }

    // Llamar a loadUserInfo cuando la página esté lista
    loadUserInfo();
});
