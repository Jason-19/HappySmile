<?php
include ("../config/connection.php");
$sql = "SELECT clientes.CLIENTE_ID, clientes.NOMBRE, clientes.TELEFONO,clientesEMAIL, co.FECHA_CONSULT, t.NOMBRE_TRATAMIENTO, t.ESPECIALIZACION, d.NOMBRE_DOCTOR, d.ESPECIALIDAD, f.FECHA_FACTURA, f.MONTO
        FROM CLIENTES c
        LEFT JOIN CONSULT co ON c.CLIENTE_ID = co.CLIENTE_ID
        LEFT JOIN TRATAMIENTOS t ON co.TRATAMIENTO_ID = t.TRATAMIENTO_ID
        LEFT JOIN DOCTORES d ON co.DOCTOR_ID = d.DOCTOR_ID
        LEFT JOIN FACTURAS f ON co.CONSULT_ID = f.CONSULT_ID";
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
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Fecha Consulta</th>
                    <th>Tratamiento</th>
                    <th>Especialización Tratamiento</th>
                    <th>Doctor</th>
                    <th>Especialización Doctor</th>
                    <th>Fecha Factura</th>
                    <th>Monto Factura</th>
               </tr>
               <?php
               if ($result->num_rows > 0) {
                    // Mostrar datos de cada fila
                    while ($row = $result->fetch_assoc()) {
                         echo "<tr>
                        <td>" . $row["CLIENTE_ID"] . "</td>
                        <td>" . $row["NOMBRE"] . "</td>
                        <td>" . $row["TELEFONO"] . "</td>
                        <td>" . $row["EMAIL"] . "</td>
                        <td>" . $row["FECHA_CONSULT"] . "</td>
                        <td>" . $row["NOMBRE_TRATAMIENTO"] . "</td>
                        <td>" . $row["ESPECIALIZACION"] . "</td>
                        <td>" . $row["NOMBRE_DOCTOR"] . "</td>
                        <td>" . $row["ESPECIALIDAD"] . "</td>
                        <td>" . $row["FECHA_FACTURA"] . "</td>
                        <td>" . $row["MONTO"] . "</td>
                      </tr>";
                    }
               } else {
                    echo "<tr><td colspan='12'>No hay resultados</td></tr>";
               }
               ?>
     </div>
</body>

</html>