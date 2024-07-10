
<?php
include ("../CONFIG/connection.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $usuario = $_POST['usuario'];
     $contraseña = $_POST['contrasena'];

     // echo $usuario;
     // echo $contraseña;
     $INTO = "SELECT usuario, contraseña from login where usuario = '$usuario' and contraseña = '$contraseña'";
     $result = $conn->query($INTO);

     if (mysqli_num_rows($result) == 1) {
          header("Location: Home.php");
          exit;
     } else {
          echo "<h1 class='error2'>NO ACCES</H1>";

     }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>CLINICA</title>
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Lobster&family=Satisfy&display=swap"
          rel="stylesheet">
     <link rel="stylesheet" href="../CSS/loginCss.css">
     <link rel="icon"
          href="https://w7.pngwing.com/pngs/717/439/png-transparent-tooth-brushing-toothbrush-dentist-toothbrash-child-face-dentistry-thumbnail.png">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>

<body class="">
     <header class="">
          <div class="titlee">
               <h1><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-dental" width="48"
                         height="48" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                         <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                         <path
                              d="M12 5.5c-1.074 -.586 -2.583 -1.5 -4 -1.5c-2.1 0 -4 1.247 -4 5c0 4.899 1.056 8.41 2.671 10.537c.573 .756 1.97 .521 2.567 -.236c.398 -.505 .819 -1.439 1.262 -2.801c.292 -.771 .892 -1.504 1.5 -1.5c.602 0 1.21 .737 1.5 1.5c.443 1.362 .864 2.295 1.262 2.8c.597 .759 2 .993 2.567 .237c1.615 -2.127 2.671 -5.637 2.671 -10.537c0 -3.74 -1.908 -5 -4 -5c-1.423 0 -2.92 .911 -4 1.5z" />
                         <path d="M12 5.5l3 1.5" />
                    </svg>Clínica<span>HappySmile</span></h1>
          </div>


          <div class=" Navegacion-Principal py-3 ">
               <nav class="d-flex flex-row justify-content-end gap-3">
                    <a href="#"> <img class="botones animate__animated animate__rollIn"
                              src="../image/svg//icono_wha.svg" alt=""></a>
                    <a href="#"> <img class="botones animate__animated animate__rollIn"
                              src="../image/svg//icono_facebook.svg" alt=""> </a>
                    <a href="#"> <img class="botones animate__animated animate__rollIn"
                              src="../image/svg//icono_instagram.svg" alt=""></a>
                    <a href="#"> <img class="botones animate__animated animate__rollIn"
                              src="../image/svg/icono_tiktok.svg" alt=""></a>
               </nav>
          </div>

     </header>
     <section class="hero  ">
          <div class="contenido-hero">
               <h2>HappySmile</h2>
               <p>


               <form class="formulario shadow-lg" action="" method="post">
                    <fieldset class=" ">

                         <legend>Inicia Seccion</legend>
                         <div class="contenedor-campo">
                              <div class="py-1">
                                   <label class="usuary">Usuario</label>
                                   <input class="input-text  animate__animated animate__bounceInRight " type="text"
                                        name="usuario" placeholder="Usuario" required>
                              </div>

                              <div class="mt-3">
                                   <label class="contra">Contraseña</label>
                                   <input class="input-password  animate__animated animate__bounceInRight "
                                        name="contrasena" alt="strongPass" minlength="8" maxlength="8" type="password"
                                        placeholder="contraseña" required>

                              </div>
                              <div class="d-flex justify-content-end">
                                   <button class=" shadow btn btn-info" type="submit">Login</button>
                              </div>
                         </div>
                    </fieldset>
               </form>

               </p>

          </div>
     </section>
     <p class="parrafo">


          <svg class="icono" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin" width="48"
               height="48" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fd0061" fill="none" stroke-linecap="round"
               stroke-linejoin="round">
               <path stroke="none" d="M0 0h24v24H0z" fill="none" />
               <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
               <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
          </svg> panama,panama city

     </p>

     <script>
          function Fail() {
               document.getElementById("error").style.display = "block"
          }
          function Login() {
               document.getElementById("error").style.display = "none"
          }
     </arError >
</body >


</html >