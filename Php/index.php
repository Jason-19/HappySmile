<?php include ("../CONFIG\connection.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="../CSS/css.css">
</head>

<body class="bodyVuelo">
     <div class='error'>
          <P>ERROR REQUEST_METHOD</P>
     </div>

     <div class="navbar">
          <div class="image">
               <a href="index.php">
                    <img src="http" alt="imagen">
               </a>
          </div>
          <div class="titleVuelo">
               <h1>HAPPY SMILES´S</h1>
          </div>
     </div>
     <!-- links para demas paguinas  -->
     <?php include ("Header.php") ?>


     <div class="container">

          <div class="formFlight">
               <h3>Agenda una cita</h3>
               <form action="" method="post">
                    <div class="datosPer">

                         <input type="text" placeholder="Nombre">
                         <input type="text" placeholder="Apellido">
                         <input type="text" placeholder="Cédulas">
                         <input type="text" placeholder="Email">
                    </div>





                    <input class="mainBTN" type="submit" value="Consultar">
               </form>
          </div>
          <div class="secction">
          </div>
     </div>


     <script>
          function MostrarError() { document.getElementById("error").style.display = "block" }
          function OcultarError() { document.getElementById("error").style.display = "none" }
     </script>
</body>

</html>


<?php

function getData()
{
     $origen = $_POST['origen'];
     $llegada = $_POST['llegada'];
     $fechaOrigen = $_POST['dateOrigen'];
     $fechaLlegada = $_POST['dateLlegada'];
     echo $origen, " ", $fechaOrigen, " ", $llegada, " ", $fechaLlegada;
}


function error()
{
     echo "<div class='error'>
     <P>ERROR REQUEST_METHOD</P>
</div>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     getData();
     if (isset($_POST[""])) {

     }


} else {
     echo " <script>MostrarError()</script>";

}
?>