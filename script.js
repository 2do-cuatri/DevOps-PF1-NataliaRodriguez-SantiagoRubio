document.getElementById('login').addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar que el formulario se envíe

    // Obtener los valores del formulario
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Crear el objeto de datos para enviar
    const data = { username, password };

    // Llamada AJAX usando fetch
    fetch('https://backend.com/api/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data) // Enviar los datos como JSON
    })
    .then(response => response.json()) // Procesar la respuesta como JSON
    .then(data => {
        console.log('Respuesta del backend:', data); // Manejar la respuesta
    })
    .catch(error => {
        console.error('Error en la llamada AJAX:', error); // Manejar errores
    });
});
