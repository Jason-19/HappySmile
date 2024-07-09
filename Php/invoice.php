<?php
include ("../config/connection.php");
/*
SELECT clientes.CLIENTE_ID, clientes.NOMBRE, clientes.TELEFONO,clientes.EMAIL, co.FECHA_CONSULT, t.NOMBRE_TRATAMIENTO, t.ESPECIALIZACION, d.NOMBRE_DOCTOR, d.ESPECIALIDAD, f.FECHA_FACTURA, f.MONTO
        FROM CLIENTES c
        LEFT JOIN CONSULT co ON c.CLIENTE_ID = co.CLIENTE_ID
        LEFT JOIN TRATAMIENTOS t ON co.TRATAMIENTO_ID = t.TRATAMIENTO_ID
        LEFT JOIN DOCTORES d ON co.DOCTOR_ID = d.DOCTOR_ID
        LEFT JOIN FACTURAS f ON co.CONSULT_ID = f.CONSULT_ID
     */
$sql = "Select * from USUARIOS";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Invoice</title>
     <link rel="stylesheet" href="../CSS/css.css">

</head>

<body class="bodyInvoise">
     <div class="links">
          <a href="index.php">Home</a>

     </div>
     <div class="navbar">
          <div class="image">
               <a href="index.php">
                    <img src="../image/logo.png" alt="imagen">
               </a>
          </div>
          <div class="titleVuelo">
               <h1>HAPPY SMILES´S</h1>
          </div>

     </div>
     <div class="container_invoise">
          <h1>Clientes y Consultas</h1>
          <table>
               <tr>
                    <th>ID Cliente</th>
                    <th>NOMBRE</th>
                    <th>TELEFONO</th>
                    <th>Email</th>
                    <th>CEDULA</th>
                    <th>FECHA CONSULT</th>
                    <th>TRATAMIENTO</th>
                    <th>FECHA FACTURA</th>

               </tr>
               <?php
               if ($result->num_rows > 0) {
                    // Mostrar datos de cada fila
                    while ($row = $result->fetch_assoc()) {
                         echo "<tr>
                       
                        <td>" . $row["NOMBRE"] . "</td>
                        <td>" . $row["APELLIDO"] . "</td>                        
                        <td>" . $row["EMAIL"] . "</td>
                        <td>" . $row["CEDULA"] . "</td>                        
                        <td>" . $row["FECHA_FACTURA"] . "</td>
                        <td>" . $row["PHONE"] . "</td>
                        <td>" . $row["TRATAMIENTO"] . "</td>
                        <td>" . $row["FECHA_FACTURA"] . "</td>

                       
                    
                      </tr>";
                    }
               } else {
                    echo "<tr><td colspan='12'>No hay resultados</td></tr>";
               }
               ?>
     </div>
</body>

</html>
