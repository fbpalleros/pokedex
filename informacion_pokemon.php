<?php
include_once('header.html');

// Configurar el .ini 
$config = parse_ini_file('configBD.ini');

$conn = mysqli_connect($config['host'], $config['username'], $config['password'], $config['database']);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$id = isset($_GET['id']) ? $_GET['id'] : '0';

$query = "SELECT * FROM pokemon Where id = " . $id;
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0){
    mysqli_close($conn);
    header("location:index.php?error=6");
    exit();
}

$row = mysqli_fetch_assoc($result);

// Info !
echo $row['numero_identificador'];
echo $row['nombre'];
echo $row['tipo'];
echo '<img src="img_pokemon/' . $row['imagen'] . '.png" alt="' . $row['imagen'] . '" width="100" height="90">';
echo $row['descripcion'];
echo $row['informacion'];

mysqli_close($conn);