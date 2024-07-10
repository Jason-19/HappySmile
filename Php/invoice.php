<?php
include ("../config/connection.php");
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
     <div class="links">
          <a href="home.php">Home</a>

     </div>
     <div class="container_invoise">

          <div class="userInvoid">
               <h1>Clientes y Consultas</h1>
               <?php include("consulta.php");?>
          </div>

     </div>
</body>

</html>