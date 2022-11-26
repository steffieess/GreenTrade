<?php
require '../mantenedor/mantenedor.php';

if (isset($_POST['regEmpresa'])) {

    $tipo_empresa = $_POST['id_tipoEmpresa'];
    $razon_social = utf8_decode($_POST['razonSocial']);
    $dic_empresa = utf8_decode($_POST['dicEmpresa']);
    $tel_empresa = $_POST['telEmpresa'];
    $correo_empresa = utf8_decode($_POST['correoEmpresa']);
    

    $queryEmpresa = "SELECT * FROM empresa WHERE razon_social =  '$razon_social' AND usuario_empresa = '$usuEmpresaM'";
    $queryRazonEmpresa = mysqli_query($connc, $queryEmpresa);
    $sqlcantidad = mysqli_num_rows($queryRazonEmpresa);

    if ($sqlcantidad <= 0) {
        $queryInsertEmpresa = "INSERT INTO empresa(razon_social, direccion_empresa, tel_empresa, mail_empresa, usuario_empresa,tipo_empresa_id_tipoempresa) VALUES  ('$razon_social','$dic_empresa', '$tel_empresa', '$correo_empresa', '$usuEmpresaM','$tipo_empresa')";
        $resultEmpresa = mysqli_query($connc, $queryInsertEmpresa);

        if ($resultEmpresa) {
            $_SESSION['message'] = 'Empresa creada exitosamente';
            $_SESSION['message_type'] = 'Exitoso';
            echo "<script> window.location='../../pages/IE/empresa.php'; </script>";
        } else {
            $_SESSION['message'] = 'Error al crear la empresa';
            $_SESSION['message_type'] = 'Error';
            echo "<script> window.location='../../pages/IE/registroEmpresa.php'; </script>";
        }
    } else {
        $_SESSION['message'] = 'Empresa ya registrada';
        $_SESSION['message_type'] = 'Error';
        echo "<script> window.location='../../pages/IE/registroEmpresa.php'; </script>";
    }
} else {
    $_SESSION['message'] = 'Error';
    $_SESSION['message_type'] = 'Error';
    echo "<script> window.location='../../pages/IE/registroEmpresa.php'; </script>";
}