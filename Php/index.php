<?php
     include ("../config/connection.php");

// capturo los datso de la consulta y los almacenamos en un array
function getData()
{
     $nombre = $_POST['name'];
     $apellido = $_POST['apellido'];
     $cedula = $_POST['id'];
     $email = $_POST['email'];
     $phone = $_POST["phone"];
     $tratamiento = $_POST['Tratamientos'];

     return $datos = array($nombre, $apellido, $cedula, $email, $phone, $tratamiento);
}


function AddInfo()
{
     include ("../config/connection.php");
     $client= getData();
     // consulta a la base de datos insersion 
     $INTO = "INSERT INTO usuarios(NOMBRE,APELLIDO,CEDULA,EMAIL,PHONE,TRATAMIENTO)
VALUES('$client[0]','$client[1]','$client[2]','$client[3]','$client[4]','$client[5]')";
     ECHO $INTO;


     $result = $conn->query($INTO);

     if ($result) {
          echo"Consulta lista <br>";
          $conn->close();
     }
     else{
          echo " <script>MostrarError()</script>";

     }


}

if ($_SERVER["REQUEST_METHOD"] == "POST") {


     if (isset($_POST['mainBTN'])) {
          AddInfo();
          $client = getData();
          // foreach ($client as $i) {
          //      echo $i . "<br>";
          // }
          // echo "0 ".$client[0].'<br>';
          // echo "1 ".$client[1].'<br>';
          // echo "2 ".$client[2].'<br>';
          // echo "3 ".$client[3].'<br>';
          // echo "4 ".$client[4].'<br>';
          // echo "5 ".$client[5].'<br>';

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
                              <option value="Blanqueamiento Dental">Blanqueamiento Dental</option>
                              <option value="Sellantes de fosas y fisuras">Sellantes de fosas y fisuras'</option>
                              <option value="ratamiento para la Caries Dental">Tratamiento para la Caries Dental</option>
                              <option value="Carillas de Porcelana<">Carillas de Porcelana</option>
                              <option value="Resinas">Resinas</option>

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
                         eos placeat, beatae atque aliquam repellat iusto magni moles</p>

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