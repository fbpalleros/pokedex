<?php
session_start();

if( isset($_SESSION["usuario"])  ){
    //echo "hola " . $_SESSION["usuario"] . "!";
} else {
    header("location:index.php?error=3");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pokedex</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="logo.png" alt="logo" width="60" height="60">
            </a>
            <a class="navbar-brand">Pokedex</a>
            <form class="d-flex" role="search" action="login.php" method="post">
                <?php  echo "Usuario: " . $_SESSION["usuario"]; ?>
            </form>
        </div>
    </nav>
    <form class="row" role="search" method="GET">
        <div class="input-group mb-3 ">
            <input class="form-control" type="search" placeholder="Buscar por nombre o tipo o numero identificador"
                name="search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">¿Quien es este pokemon?</button>
        </div>
    </form>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>



    <?php
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



// Traer los pokemones de la base de dato
if (mysqli_num_rows($result) > 0) {
    echo '<table class="table table-hover">';
    echo '<thead><tr><th scope="col">ID</th><th scope="col">Identificador</th><th scope="col">Imagen</th><th scope="col">Nombre</th><th scope="col">Tipo</th><th scope="col">Descripcion</th><th scope="col">Acciones</th></tr></thead>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tbody>';
        echo '<tr>';
        echo '<td scope="row" >' . $row['id'] . '</td>';
        echo '<td>' . $row['numero_identificador'] . '</td>';
        echo '<td>' . '<img src="img_pokemon/' . $row['imagen'] . '.png" alt="' . $row['imagen'] . '" width="100" height="90">' . '</td>';
        echo '<td>' . $row['nombre'] . '</td>';
        echo '<td>' . '<img src="img_tipo/' . $row['tipo'] . '.png" alt="' . $row['tipo'] . '" width="80" height="20">' . '</td>';
        echo '<td>' . $row['descripcion'] . '</td>';
        echo '<td> <form action="modificar_pokemon.php" method="post"><input type="hidden" name="pokemon_id" value="' . $row['id'] . '"><button class="btn btn-outline-primary" type="submit">Modificar</button></form>
            <form action="eliminar_pokemon.php" method="post"><input type="hidden" name="pokemon_id" value="' . $row['id'] . '"><button class="btn btn-outline-danger" type="submit">Baja</button></form></td>';
        echo '</tr>';
    }
    echo '</tbody></table>';

} else {
    echo '0 resultados';
}
?>

    <form class="d-flex" role="search" action="nuevoPokemon.html" method="post">
        <button class="btn btn-outline-success " type="submit">Nuevo Pokemon</button>
    </form>


</body>

</html>




<?php
// No olvides cerrar la conexión cuando termines
mysqli_close($conn);
?>