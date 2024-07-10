<?php
include ("../config/connection.php");

$sql = "SELECT 
u.USUARIO_ID, 
u.NOMBRE, 
u.APELLIDO, 
u.CEDULA, 
u.EMAIL, 
u.PHONE, 
u.fecha_registro,
f.FACTURA_ID, 
f.TRATAMIENTO, 
f.FECHA_FACTURA, 
f.MONTO, 
f.METODO_PAGO
FROM usuarios u
JOIN factura f ON u.USUARIO_ID = f.USUARIO_ID";
// consulta 
$result = $conn->query($sql);

echo '<table>
        <tr>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>EMAIL</th>
            <th>CEDULA</th>
            <th>TELEFONO</th>
            <th>FECHA CONSULTA</th>
            <th>TRATAMIENTO</th>
            <th>FECHA FACTURA</th>
            <th>PAGAR</th>
        </tr>';

if ($result->num_rows > 0) {
     // Mostrar datos de cada fila que se agreguen 
     while ($row = $result->fetch_assoc()) {
          echo "<tr>
                <td>" . ($row["NOMBRE"]) . "</td>
                <td>" . ($row["APELLIDO"]) . "</td>
                <td>" . ($row["EMAIL"]) . "</td>
                <td>" . ($row["CEDULA"]) . "</td>
                <td>" . ($row["PHONE"]) . "</td>
                <td>" . ($row["fecha_registro"]) . "</td>
                <td>" . ($row["TRATAMIENTO"]) . "</td>
                <td>" . ($row["FECHA_FACTURA"]) . "</td>
                <td>" . ($row["MONTO"]) . "$</td>
              </tr>";
     }
} else {
     echo "<tr><td colspan='8'>No hay resultados</td></tr>";
}

echo '</table>';

$conn->close();
