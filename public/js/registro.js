document.addEventListener('DOMContentLoaded', function() {
    // Obtener el mensaje de estado de la URL
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');
    const error = urlParams.get('error');

    if (status) {
        showAlert(decodeURIComponent(status));
    }

    if (error) {
        showAlert(decodeURIComponent(error));
    }
});
