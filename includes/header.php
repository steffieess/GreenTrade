<?php include("../../func/mantenedor/mantenedor.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" type="image/png" href="../../img/logo.png">
   <title>GreenTrade</title>
   <!-- swiper css link  -->
   <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <script src="https://kit.fontawesome.com/edde590ebc.js" crossorigin="anonymous"></script>
   <!-- CSS only -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
   <!-- CSS -->
   <link rel="stylesheet" href="../../../css/style.css">
   <link rel="stylesheet" href="../../../fancy-file/styles.css">
</head>

<style>
   @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

   body {
      font-family: Lato, Helvetica, sans-serif;

      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
   }

   :root {
      --main-color: #7DBC66;
      --black: #222;
      --white: #fff;
      --light-black: #777;
      --light-white: #fff9;
      --dark-bg: rgba(0, 0, 0, .7);
      --light-bg: #eee;
      --border: .1rem solid var(--black);
      --box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .1);
      --text-shadow: 0 1.5rem 3rem rgba(0, 0, 0, .3);
   }

   * {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      outline: none;
      border: none;
      text-decoration: none;

   }

   html {
      font-size: 70.5%;
      overflow-x: hidden;
   }

   html::-webkit-scrollbar {
      width: 1rem;
   }

   html::-webkit-scrollbar-track {
      background-color: var(--white);
   }

   html::-webkit-scrollbar-thumb {
      background-color: var(--main-color);
   }

   section {
      padding: 5rem 10%;
   }

   @keyframes fadeIn {
      0% {
         transform: scale(0);
         opacity: 0;
      }
   }

   .heading {
      background-size: cover !important;
      background-position: center !important;
      padding-top: 10rem;
      padding-bottom: 15rem;
      display: flex;
      align-items: center;
      justify-content: center;
   }

   .heading h1 {
      font-size: 10rem;
      text-transform: uppercase;
      color: var(--white);
      text-shadow: var(--text-shadow);
   }

   .heading-title {
      text-align: center;
      margin-bottom: 3rem;
      font-size: 6rem;
      text-transform: uppercase;
      color: var(--black);
   }

   img {
      height: 30px;
      width: 30px;
      display: flex;
   }

   .btn {
      background-color: var(--main-color);
      color: #fff;
   }

   .btn:hover {
      background-color: #668C4A !important;
      color: white;
      border: #222;
   }

   .modal-open {
      overflow: hidden;
      padding-right: 0px !important;
   }
</style>

<body>
   <header class="p-3 bg-dark text-white">
      <div class="container">
         <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="../general/inicio.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
               <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                  <use xlink:href="#bootstrap" />
               </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
               <?php if (!empty($dataUserM)) : ?>
                  <?php if ($tipoUsu == 1 || $tipoUsu == 2) : ?>
                     <li><a href="../general/inicio.php"><img src="../../img/logo.png" alt=""></a></li>
                     <li><a href="../general/inicio.php" class="nav-link px-2 text-white" style="font-size: 15px;">GreenTrade</a></li>
                     <li><a href="../general/homepage.php" class="nav-link px-2 text-white" style="font-size: 15px;">Inicio</a></li>
                     <li><a href="../general/importaciones.php" class="nav-link px-2 text-white" style="font-size: 15px;">Importaciones</a></li>
                     <li><a href="../general/exportaciones.php" class="nav-link px-2 text-white" style="font-size: 15px;">Exportaciones</a></li>
                     <li><a href="../IE/usuario.php" class="nav-link px-2 text-white" style="font-size: 15px;">Usuarios</a></li>
                     <li><a href="../IE/empresa.php" class="nav-link px-2 text-white" style="font-size: 15px;">Empresas</a></li>
                     <li><a href="../IE/reciclaje.php" class="nav-link px-2 text-white" style="font-size: 15px;">Reciclaje</a></li>
                  <?php endif ?>

                  <?php if ($tipoUsu == 3 || $tipoUsu == 4 || $tipoUsu == 5 || $tipoUsu == 6 || $tipoUsu == 7) : ?>
                     <li><a href="../general/inicio.php"><img src="../../img/logo.png" alt=""></a></li>
                     <li><a href="../general/inicio.php" class="nav-link px-2 text-white" style="font-size: 15px;">GreenTrade</a></li>
                     <li><a href="../general/homepage.php" class="nav-link px-2 text-white" style="font-size: 15px;">Inicio</a></li>
                     <li><a href="../general/importaciones.php" class="nav-link px-2 text-white" style="font-size: 15px;">Importaciones</a></li>
                     <li><a href="../general/exportaciones.php" class="nav-link px-2 text-white" style="font-size: 15px;">Exportaciones</a></li>
                  <?php endif ?>

                  <?php if ($tipoUsu == 8) : ?>
                     <li><a href="../general/inicio.php"><img src="../../img/logo.png" alt=""></a></li>
                     <li><a href="../general/inicio.php" class="nav-link px-2 text-white" style="font-size: 15px;">GreenTrade</a></li>
                     <li><a href="../general/homepage.php" class="nav-link px-2 text-white" style="font-size: 15px;">Inicio</a></li>
                  <li><a href="../Reciclador/solicitudes.php" class="nav-link px-2 text-white" style="font-size: 15px;">Solicitudes</a></li>
                  <li><a href="../Reciclador/historial.php" class="nav-link px-2 text-white" style="font-size: 15px;">Historial</a></li>
                  <?php endif ?>

               <?php else : ?>
                  <li><a href="../general/inicio.php"><img src="../../img/logo.png" alt=""></a></li>
                  <li><a href="../general/inicio.php" class="nav-link px-2 text-white" style="font-size: 15px;">GreenTrade</a></li>
                  <li><a href="../general/vision.php" class="nav-link px-2 text-white" style="font-size: 15px;">Visión</a></li>
               <?php endif ?>
            </ul>
            <?php if (!empty($dataUserM)) : ?>
               <div class="text-end">
                  <a href="../../func/tools/salir.php" class="btn"><i class="fa-solid fa-right-from-bracket"></i> Salir</a>
               </div>
            <?php else : ?>
               <div class="text-end">
                  <a href="../general/login_register.php" class="btn">Ingresar</a>
               </div>
            <?php endif ?>
         </div>
      </div>
   </header>