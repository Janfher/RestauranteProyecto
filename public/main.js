function cargarCategorias() {
    fetch('php/listar_categorias.php')
        .then(response => response.json())
        .then(data => {
            const listaCategorias = document.getElementById('listaCategorias');
            listaCategorias.innerHTML = '';
            data.forEach(categoria => {
                listaCategorias.innerHTML += `<div class="border rounded-lg p-4 mb-2 shadow-md bg-white">
                    <p class="font-bold text-xl text-gray-800">${categoria.nombre_categoria}</p>
                    <p class="text-gray-600 mb-2">${categoria.descripcion}</p>
                    <img src="${categoria.imagen_url}" alt="${categoria.nombre_categoria}" class="mb-2 w-full h-32 object-cover rounded-lg">
                    <div class="flex justify-between">
                        <button onclick="eliminarCategoria(${categoria.id_categoria})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">Eliminar</button>
                        <button onclick="mostrarFormularioActualizar(${categoria.id_categoria}, '${categoria.nombre_categoria}', '${categoria.descripcion}')" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-full">Actualizar</button>
                    </div>
                </div>`;
            });
        });
}

document.getElementById('formAgregarCategoria').addEventListener('submit', function(event) {
    event.preventDefault();
    const nombreCategoria = document.querySelector('input[name="nombre_categoria"]').value;
    const descripcionCategoria = document.querySelector('textarea[name="descripcion_categoria"]').value;
    const imagenCategoria = document.querySelector('input[name="imagen_categoria"]').files[0];

    if (!/^[a-zA-Z\s]+$/.test(nombreCategoria)) {
        alert('El nombre de la categoría solo debe contener letras y espacios.');
        return;
    }

    const formData = new FormData();
    formData.append('nombre_categoria', nombreCategoria);
    formData.append('descripcion_categoria', descripcionCategoria);
    formData.append('imagen_categoria', imagenCategoria);

    fetch('php/agregar_categoria.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            alert(data.error);
        } else {
            alert('Categoría agregada correctamente.');
            document.querySelector('input[name="nombre_categoria"]').value = '';
            document.querySelector('textarea[name="descripcion_categoria"]').value = '';
            document.querySelector('input[name="imagen_categoria"]').value = '';
            cargarCategorias();
        }
    });
});

function eliminarCategoria(idCategoria) {
    if (confirm('¿Estás seguro de que deseas eliminar esta categoría?')) {
        fetch('php/eliminar_categoria.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ id_categoria: idCategoria }),
        })
        .then(response => response.json())
        .then(data => {
            alert('Categoría eliminada correctamente.');
            cargarCategorias();
        });
    }
}

// Función para mostrar el formulario de actualización con los datos actuales de la categoría
function mostrarFormularioActualizar(idCategoria, nombreCategoria, descripcionCategoria) {
    const formActualizar = document.getElementById('formActualizarCategoria');
    formActualizar.style.display = 'block'; // Mostrar el formulario de actualización
    document.querySelector('input[name="id_categoria"]').value = idCategoria; // Asignar el ID de la categoría al campo oculto
    document.querySelector('input[name="nombre_categoria_actualizar"]').value = nombreCategoria; // Asignar el nombre de la categoría al campo de nombre
    document.querySelector('textarea[name="descripcion_categoria_actualizar"]').value = descripcionCategoria; // Asignar la descripción de la categoría al campo de descripción
}

// Listener para el formulario de actualización
document.getElementById('formActualizarCategoria').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevenir el envío estándar del formulario

    // Obtener los valores de los campos del formulario de actualización
    const idCategoria = document.querySelector('input[name="id_categoria"]').value;
    const nombreCategoria = document.querySelector('input[name="nombre_categoria_actualizar"]').value;
    const descripcionCategoria = document.querySelector('textarea[name="descripcion_categoria_actualizar"]').value;
    const imagenCategoria = document.querySelector('input[name="imagen_categoria_actualizar"]').files[0]; // Obtener el archivo de imagen seleccionado

    // Validación básica del nombre de la categoría
    if (!nombreCategoria.trim()) {
        alert('Por favor ingresa un nombre válido para la categoría.');
        return;
    }

    // Crear un objeto FormData para enviar los datos
    const formData = new FormData();
    formData.append('id_categoria', idCategoria);
    formData.append('nombre_categoria', nombreCategoria);
    formData.append('descripcion_categoria', descripcionCategoria);
    if (imagenCategoria) {
        formData.append('imagen_categoria', imagenCategoria); // Agregar la nueva imagen solo si se seleccionó una
    }

    // Enviar la solicitud de actualización al servidor usando fetch
    fetch('php/actualizar_categoria.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        // Manejar la respuesta del servidor
        if (data.error) {
            alert(data.error); // Mostrar mensaje de error si hay algún problema en el servidor
        } else {
            alert('Categoría actualizada correctamente.'); // Mostrar mensaje de éxito
            document.getElementById('formActualizarCategoria').style.display = 'none'; // Ocultar el formulario de actualización
            cargarCategorias(); // Volver a cargar la lista de categorías actualizada
        }
    })
    .catch(error => {
        console.error('Error al actualizar la categoría:', error); // Capturar errores de red u otros errores
        alert('Hubo un problema al actualizar la categoría. Por favor, intenta nuevamente.'); // Mostrar mensaje de error genérico
    });
});




cargarCategorias();
