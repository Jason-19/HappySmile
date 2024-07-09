<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyecto";

// Crear una nueva conexión con la base de datos 
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
     echo "SQL❌";
     die("Conexión fallida: " . $conn->connect_error);
} else {
     //echo "SQL✅";
}
