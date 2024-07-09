<?php
include ("../config/connection.php");

// capturo los datso de la consulta y los almacenamos en un array
function getData()
{
     $nombre = $_POST['name'];
     $apellido = $_POST['apellido'];
     $cedula = $_POST['id'];
     $email = $_POST['email'];
     $tratamiento = $_POST['Tratamientos'];
     $phone = $_POST["phone"];

     return $datos = array($nombre, $apellido, $cedula, $email, $phone, $tratamiento);
}


function AddInfo()
{
     include ("../config/connection.php");
     $client = getData();
     $INSERT = 'INSERT INTO clientes(`NOMBRE`,`APELLIDO`,`EMAIL`,`PHONE`,`CEDULA`)
     VALUES ("Maria","Turnner","mariT@gmail.com","6455-7778","8-000-0000")';

     $result = $conn->query($INSERT);
     if ($result) {
          echo " <script>MostrarError()</script>";
     }


}

if ($_SERVER["REQUEST_METHOD"] == "POST") {


     if (isset($_POST['mainBTN'])) {
          $client = getData();
          AddInfo();
          // foreach ($client as $i) {
          //      echo $i . "<br>";
          // }
          echo $client[0];
          echo $client[1];
          echo $client[2];
          echo $client[3];
          echo $client[4];
          echo $client[5];

          // header("Location:invoice.php");

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
</head>

<body class="bodyVuelo">
     <div class='error' id="error">
          <P>ERROR REQUEST_METHOD</P>
     </div>
     <!-- links para demas paguinas  -->
     <div class="links">
          <a href="index.php">Home</a>
          <a href="#about">Sobre Nosotros</a>
          <a href="#who">Quienes somos </a>
          <a href="invoice.php">Invoices</a>

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

                    <div class="tratamientos">
                         <select name="Tratamientos" required>

                              <option value="NULL">Seleccione Tratamientos</option>
                              <option value="Limpieza dental">Limpieza dental</option>
                              <option value="">Blanqueamiento Dental</option>
                              <option value="">Sellantes de fosas y fisuras'</option>
                              <option value="">Tratamiento para la Caries Dental</option>
                              <option value="">Carillas de Porcelana</option>
                              <option value="">Resinas</option>

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
               <div>
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

     <div id="who">
          <div class="title">
               <h1>Quienes Somos</h1>
          </div>
          <div class="info">

               <div>
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
               <div>
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
     <script src="../js/script.js"></script>
</body>

</html>