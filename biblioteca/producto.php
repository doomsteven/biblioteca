<?php
// Configuración de conexión a la base de datos
$host = 'localhost'; // Cambia esto según tu configuración
$db = 'nombre_base_datos'; // Cambia esto según tu configuración
$user = 'usuario'; // Cambia esto según tu configuración
$pass = 'contraseña'; // Cambia esto según tu configuración

// Crear conexión
$conn = new mysqli($host, $user, $pass, $db);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener los datos de los libros
$sql = "SELECT libro.*, autor.nombre AS autor_nombre, editorial.nombre AS editorial_nombre, materia.nombre AS materia_nombre
        FROM libro
        INNER JOIN autor ON libro.id_autor = autor.id
        INNER JOIN editorial ON libro.id_editorial = editorial.id
        INNER JOIN materia ON libro.id_materia = materia.id
        WHERE libro.estado = 1"; // Solo muestra libros activos

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Salida de cada libro
    while($row = $result->fetch_assoc()) {
        $foto = "assets/products/" . $row['imagen']; // Ruta de la imagen

        echo '<div class="product">
                <a href="#">
                    <div class="image">
                        <img src="' . $foto . '" alt="Imagen del libro"/>
                    </div>
                </a>
                <div class="details">
                    <h3 class="title">' . htmlspecialchars($row['titulo']) . '</h3>
                    <p class="author">de ' . htmlspecialchars($row['autor_nombre']) . '</p>
                    <p class="description">' . htmlspecialchars($row['materia_nombre']) . '</p>
                    <p class="price">ISBN: ' . htmlspecialchars($row['isbn']) . '</p>
                </div>
                <div class="actions">
                    <a href="#" class="add-to-cart"><i class="fa-solid fa-bag-shopping"></i> Disponible</a>
                    <a href="#" class="add-to-wishlist"><i class="fa-solid fa-heart"></i></a>
                </div>
            </div>';
    }
} else {
    echo "No se encontraron productos.";
}

// Cerrar conexión
$conn->close();
?>
