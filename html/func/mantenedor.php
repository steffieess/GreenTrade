<?php
require '../../database/database.php';

if (isset($_SESSION['usuarios_rut'])) {
    $rutUserM = $_SESSION['usuarios_rut'];
    $sqlUserM="SELECT u.rut_usuario, u.nom_usuario, e.mail_empresa, e.id_empresa FROM usuario u INNER JOIN empresa e on u.rut_usuario = e.usuario_empresa WHERE rut_usuario = '$rutUserM'";
    $queryUserM = mysqli_query($connc, $sqlUserM);

    $sqlcantidadM = mysqli_num_rows($queryUserM);
    if ($sqlcantidadM > 0) {
      $dataUserM = mysqli_fetch_array($queryUserM);

      $idEmpresaM = $dataUserM['id_empresa'];
      $mailM = $dataUserM['mail_empresa'];
      $rutP = $dataUserM['rut_usuario'];
      $nombreP = $dataUserM['nom_usuario'];
    }else{
    }
  }else {
  }
?>