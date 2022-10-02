<?php
require '../../database/database.php';

if (isset($_SESSION['usuarios_rut'])) {
    $rutUserM = $_SESSION['usuarios_rut'];
    $sqlUserM="SELECT u.rut_usuario, u.nom_usuario, e.mail_empresa FROM usuario u INNER JOIN empresa e on u.rut_usuario = e.usuario_empresa WHERE rut_usuario = '$rutUserM'";
    $queryUserM = mysqli_query($connc, $sqlUserM);

    $dataUserM = mysqli_fetch_array($queryUserM);

    $mailM = $dataUserM['mail_empresa'];
    $rutP = $dataUserM['rut_usuario'];
    $nombreP = $dataUserM['rut_usuario'];

  }else {
    
  }

?>