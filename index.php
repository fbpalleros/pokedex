<?php
include_once('header.html');

// Configurar el .ini 
$config = parse_ini_file('configBD.ini');

$conn = mysqli_connect($config['host'], $config['username'], $config['password'], $config['database']);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$query = "SELECT * FROM pokemon";
$result = mysqli_query($conn, $query);



// En caso que la barra de busqueda tenga informacion 
$search = isset($_GET['search']) ? $_GET['search'] : '';
$query = "SELECT * FROM pokemon";
if (!empty($search)) {
    $query .= " WHERE nombre LIKE '%$search%' OR tipo LIKE '%$search%' OR numero_identificador LIKE '%$search%'";
}
$result = mysqli_query($conn, $query);





if (mysqli_num_rows($result) > 0) {
    echo '<table class="table table-hover">';
    echo '<thead><tr><th scope="col">ID</th><th scope="col">Identificador</th><th scope="col">Imagen</th><th scope="col">Nombre</th><th scope="col">Tipo</th><th scope="col">Descripcion</th></tr></thead>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tbody>';
        echo '<tr>';
        echo '<td scope="row" >' . $row['id'] . '</td>';
        echo '<td>' . $row['numero_identificador'] . '</td>';
        echo '<td>' . '<img src="img_pokemon/' . $row['imagen'] . '.png" alt="' . $row['imagen'] . '" width="100" height="90">' . '</td>';
        echo '<td>' . $row['nombre'] . '</td>';
        echo '<td>' . '<img src="img_tipo/' . $row['tipo'] . '.png" alt="' . $row['tipo'] . '" width="80" height="20">' . '</td>';
        echo '<td>' . $row['descripcion'] . '</td>';
        echo '</tr>';
    }
    echo '</tbody></table>';

} else {
    echo '0 resultados';
}


// No olvides cerrar la conexión cuando termines
mysqli_close($conn);


