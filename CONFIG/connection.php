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
<<<<<<< HEAD
     // echo "SQL✅";
=======
     //echo "SQL✅";
>>>>>>> 5f86c141751ed4bea89dbe57230aa234b054d8ce
}
