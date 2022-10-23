<?php
require '../../../database/database.php';

if (isset($_SESSION['usuarios_rut'])) {
    $rutUserM = $_SESSION['usuarios_rut'];
    $sqlUserM="SELECT u.rut_usuario, u.nom_usuario, e.mail_empresa, e.id_empresa, u.tipo_usu_id_tipousu, e.usuario_empresa, e.razon_social, u.mail_usuario FROM usuario u INNER JOIN empresa e on u.empresa_id_empresa  = e.id_empresa  WHERE u.rut_usuario = '$rutUserM'";
    $queryUserM = mysqli_query($connc, $sqlUserM);

    $sqlcantidadM = mysqli_num_rows($queryUserM);
    if ($sqlcantidadM > 0) {
      $dataUserM = mysqli_fetch_array($queryUserM);

      $idEmpresaM = $dataUserM['id_empresa'];
      $mailM = $dataUserM['mail_empresa'];
      $rutP = $dataUserM['rut_usuario'];
      $nombreP = $dataUserM['nom_usuario'];
      $tipoUsu = $dataUserM['tipo_usu_id_tipousu'];
      $usuEmpresaM = $dataUserM['usuario_empresa'];
      $mailUserM = $dataUserM['mail_usuario'];
      $razonM = $dataUserM['razon_social'];

    }else{
    }
  }else {
  }
?>