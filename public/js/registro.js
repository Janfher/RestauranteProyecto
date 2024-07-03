document.getElementById('registroForm').addEventListener('submit', function(event) {
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirm_password').value;
    
    if (password !== confirmPassword) {
        alert('Las contraseñas no coinciden.');
        event.preventDefault();
    }
});

function validateInput(input) {
    var pattern = new RegExp(input.pattern);
    if (!pattern.test(input.value)) {
        input.nextElementSibling.textContent = 'Ingrese datos validos';
    } else {
        input.nextElementSibling.textContent = '';
    }
}
