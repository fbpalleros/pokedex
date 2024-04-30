<?php
include_once('header.html');


//LISTAR POKEMONES

$hostname = "localhost:3307"; // Replace with your database server hostname
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "test"; // Replace with your database name

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM pokemon";
$result = mysqli_query($conn, $query);


if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>Nombre</th><th>Tipo</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['tipo'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}


