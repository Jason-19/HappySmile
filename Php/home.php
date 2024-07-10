<?php
include ("../config/connection.php");

// funcion para definiir los precios de los tratamientos 
function precios($trat)
{
     switch ($trat) {
          case "Limpieza dental":
               return 25.00;
          case "Blanqueamiento Dental":
               return 100.00;
          case "Sellantes de fosas y fisuras":
               return 200.00;
          case "Tratamiento para la Caries Dental":
               return 70.00;
          case "Carillas de Porcelana":
               return 500.00;
          case "Resinas":
               return 800.00;
          default:
               return 0.00;
     }
}
// capturo los datso de la consulta y los almacenamos en un array
function getData()
{
     $nombre = $_POST['name'];
     $apellido = $_POST['apellido'];
     $cedula = $_POST['id'];
     $email = $_POST['email'];
     $phone = $_POST["phone"];
     $tratamiento = $_POST['Tratamientos'];
     $monto = precios($tratamiento);


     // factura
     $fecha_fact = $_POST['date_consult'];
     $metodo_pago = $_POST['metodoP'];

     // return vector == [ $nombre,$apellido,$cedula,$email,$phone,$tratamiento,$fecha_fact, $metodo_pago, $monto];
     $vector = array(
          "nombre" => $nombre,
          "apellido" => $apellido,
          "cedula" => $cedula,
          "email" => $email,
          "phone" => $phone,
          "tratamiento" => $tratamiento,
          "fecha_factura" => $fecha_fact,
          "metodo_pago" => $metodo_pago,
          "monto" => $monto
     );

     // Devolver el array
     return $vector;
}

// funcion para relazar la consulta 
function consulta($sql)
{
     include ("../config/connection.php");
     return $conn->querry($sql);
}
// funcion para la la consulta 
function AddInfo()
{
     include ("../config/connection.php");

     $client = getData(); // optenemos los inputs 
     $sql_usuario = "INSERT INTO usuarios (NOMBRE, APELLIDO, CEDULA, EMAIL, PHONE) VALUES (?, ?, ?, ?, ?)";
     $stmt_usuario = $conn->prepare($sql_usuario);
     $stmt_usuario->bind_param("sssss", $client['nombre'], $client['apellido'], $client['cedula'], $client['email'], $client['phone']);
     $stmt_usuario->execute();


     if ($stmt_usuario->affected_rows > 0) {
          $usuario_id = $stmt_usuario->insert_id; // Obtener el ID del usuario recién insertado

          // Insertar la factura en la base de datos
          $sql_factura = "INSERT INTO FACTURA (
          USUARIO_ID, 
          TRATAMIENTO, 
          FECHA_FACTURA, 
          MONTO, 
          METODO_PAGO)
          VALUES (?, ?, ?, ?, ?)";
          // 
          $stmt_factura = $conn->prepare($sql_factura);
          // INSERTAMOS LOS INPUTS
          $stmt_factura->bind_param("issss", $usuario_id, $client['tratamiento'], $client['fecha_factura'], $client['monto'], $client['metodo_pago']);
          // EJECUTAMOS LA CONSULTA 
          $stmt_factura->execute();

          if ($stmt_factura->affected_rows > 0) {
               echo "Cita agendada exitosamente.";
          } else {
               echo "Error al agendar la cita.";
          }

          $stmt_factura->close();
     } else {
          echo "Error al registrar el usuario.";
     }

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

     if (isset($_POST['mainBTN'])) {

          AddInfo(); // consulta sql 
          $client = getData();
          foreach ($client as $i) {
               echo $i . "<br>";
          }
     }

} else {
     echo " <script>MostrarError()</script>";

}

?>



<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>🦷HAPPY SMILES´S</title>
     <link rel="stylesheet" href="../CSS/css.css">
     <link rel="icon"
          href="https://w7.pngwing.com/pngs/717/439/png-transparent-tooth-brushing-toothbrush-dentist-toothbrash-child-face-dentistry-thumbnail.png">
</head>

<body>

     <div class='error' id="error">
          <P>ERROR REQUEST_METHOD</P>
     </div>
     <!-- links para demas paguinas  -->

     <div class="navbar">
          <div class="image">
               <a href="home.php">
                    <img src="../image/logo.png" alt="imagen">
               </a>
          </div>
          <div class="titleVuelo">
               <h1>HAPPY SMILES´S</h1>
          </div>
     </div>
     <div class="links">
          <a href="home.php">Home</a>
          <a href="#about">Sobre Nosotros</a>
          <a href="#who">Quienes somos </a>
          <a href="invoice.php">Invoices</a>
          <a href="login.php">Logout</a>


     </div>


     <div class="container">
          <div class="asideimg">
               <img src="../image/smile.jpg" alt="">
          </div>
          <div class="formFlight">
               <div class="agenda">
                    <h3>Agenda una cita</h3>
               </div>
               <form action="" method="post" class="form_main">

                    <div class="datosPer">
                         <input name="name" type="text" placeholder="Nombre" maxlength="15" required>
                         <input name="apellido" type="text" placeholder="Apellido" maxlength="15" required>
                         <input name="id" type="text" placeholder="Cédulas" maxlength="10" required>
                         <input name="email" type="text" placeholder="Email" required>
                         <input name="phone" type="text" placeholder="Teléfono" required>

                    </div>

                    <div class="menuFact">
                         <select name="Tratamientos" required>
                              <option value="NULL">Seleccione Tratamientos</option>
                              <option value="Limpieza dental">Limpieza dental</option>
                              <option value="Blanqueamiento Dental">Blanqueamiento Dental</option>
                              <option value="Sellantes de fosas y fisuras">Sellantes de fosas y fisuras</option>
                              <option value="Tratamiento para la Caries Dental">Tratamiento para la Caries Dental
                              </option>
                              <option value="Carillas de Porcelana">Carillas de Porcelana</option>
                              <option value="Resinas">Resinas</option>

                         </select>

                         <div class="date">
                              <input name="date_consult" type="date">
                         </div>

                    </div>
                    <div class="method">
                         <select name="metodoP" id="">
                              <option value="TARJETA">Tarjeta</option>
                              <option value="EFECTIVO">Efectivo</option>
                         </select>
                    </div>



                    <button name="mainBTN" class="mainBTN">Agendar</button>
                    <!-- <button name="btn">OK</button>      -->
               </form>


               <div class="footer">
                    <div class="info">
                    </div>
               </div>

          </div>
     </div>
     <div id="about">
          <div class="title">
               <h1>
                    Sobre Nosotros
               </h1>
          </div>
          <div class="info">
               <div class="img_info">
                    <img src="../image/who.jpg" alt="">
               </div>
               <div class="parrafo">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id molestias cupiditate adipisci quasi
                         velit amet inventore nemo, molestiae quia aliquam eaque dolore rem, dolorum sint? Repellendus
                         possimus quia reprehenderit ullam! Lorem ipsum dolor sit amet consectetur adipisicing elit.
                         Sequi ab illum, nostrum perspiciatis, exercitationem vitae velit unde saepe culpa rerum neque
                         eos placeat, beatae atque aliquam repellat iusto magni molestias?</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id molestias cupiditate adipisci quasi
                         velit amet inventore nemo, molestiae quia aliquam eaque dolore rem, dolorum sint? Repellendus
                         possimus quia reprehenderit ullam! Lorem ipsum dolor sit amet consectetur adipisicing elit.
                         Sequi ab illum, nostrum perspiciatis, exercitationem vitae velit unde saepe culpa rerum neque
                         eos placeat, beatae atque aliquam repellat iusto magni moles</p>

               </div>
          </div>
     </div>

     <div id="who">
          <div class="title">
               <h1>Quienes Somos</h1>
          </div>
          <div class="info">

               <div class="parrafo">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id molestias cupiditate adipisci quasi
                         velit amet inventore nemo, molestiae quia aliquam eaque dolore rem, dolorum sint? Repellendus
                         possimus quia reprehenderit ullam! Lorem ipsum dolor sit amet consectetur adipisicing elit.
                         Sequi ab illum, nostrum perspiciatis, exercitationem vitae velit unde saepe culpa rerum neque
                         eos placeat, beatae atque aliquam repellat iusto magni molestias?</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id molestias cupiditate adipisci quasi
                         velit amet inventore nemo, molestiae quia aliquam eaque dolore rem, dolorum sint? Repellendus
                         possimus quia reprehenderit ullam! Lorem ipsum dolor sit amet consectetur adipisicing elit.
                         Sequi ab illum, nostrum perspiciatis, exercitationem vitae velit unde saepe culpa rerum neque
                         eos placeat, beatae atque aliquam repellat iusto magni molestias?</p>

               </div>

               <div class="img_info">
                    <img src="https://www.shutterstock.com/image-photo/dentist-team-patient-thumbs-portrait-600nw-2312325981.jpg"
                         alt="">
               </div>
          </div>


     </div>


     <div id="contact">
          <div class="title">
               <h1>Contactanos</h1>
          </div>
          <div class="info">
               <div class="img_info">
                    <img src="https://gacetadental.com/wp-content/uploads/2022/07/Dentistas.jpg" alt="">
               </div>
               <div class="parrafo">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id molestias cupiditate adipisci quasi
                         velit amet inventore nemo, molestiae quia aliquam eaque dolore rem, dolorum sint? Repellendus
                         possimus quia reprehenderit ullam! Lorem ipsum dolor sit amet consectetur adipisicing elit.
                         Sequi ab illum, nostrum perspiciatis, exercitationem vitae velit unde saepe culpa rerum neque
                         eos placeat, beatae atque aliquam repellat iusto magni molestias?</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id molestias cupiditate adipisci quasi
                         velit amet inventore nemo, molestiae quia aliquam eaque dolore rem, dolorum sint? Repellendus
                         possimus quia reprehenderit ullam! Lorem ipsum dolor sit amet consectetur adipisicing elit.
                         Sequi ab illum, nostrum perspiciatis, exercitationem vitae velit unde saepe culpa rerum neque
                         eos placeat, beatae atque aliquam repellat iusto magni molestias?</p>

               </div>
          </div>
     </div>

     <!-- footer -->
     <div class="container">

          <div class="text" style="backdrop-filter: blur(100px);">

               <div>
                    <h1 style="font-size: 50px;">Salud de Boca en Boca</h1>

                    <p>
                         Cuidando su salud desde 1982. <br>
                         Horario: Lunes a Viernes de 8am a 5pm y Sábados 8am a 1pm.<br><br>Central
                         Telefónica: 323-8000
                    </p>
                    <img src="https://efdcbd.a2cdn1.secureserver.net/wp-content/uploads/2018/09/visa_mastercard.png"
                         alt="Aceptamos VISA y MASTERCARD">
               </div>
          </div>

     </div>

     <script src="../js/script.js"></script>
</body>

</html>