<?php
require 'mantenedor.php';

if (isset($_POST['regUsuarioExt'])) {

    $rut_user = $_POST['rutUsuarioExt'];
    $nom_user = $_POST['nomUsuarioExt'];
    $appat_user = $_POST['appUsuarioExt'];
    $apmat_user = $_POST['apmUsuarioExt'];
    $mail_user = $_POST['mailUsuarioExt'];
    $tel_user = $_POST['telUsuarioExt'];
    

    $queryUsuario = "SELECT * FROM usuario WHERE rut_usuario =  '$rut_user'";
    $queryRutUsuario = mysqli_query($connc, $queryUsuario);
    $sqlcantidad = mysqli_num_rows($queryRutUsuario);

    if ($sqlcantidad <= 0) {
        $queryClave = substr($rut_user,0,8); 
        $queryInsertUsuario = "INSERT INTO usuario(rut_usuario, nom_usuario, ap_paterno, ap_materno, password, mail_usuario, tel_usuario, status, tipo_usu_id_tipousu, empresa_id_empresa) VALUES  ('$rut_user','$nom_user', '$appat_user', '$apmat_user', '$queryClave', '$mail_user','$tel_user', 0, 2, '$idEmpresaM')";
        $resultUsuario = mysqli_query($connc, $queryInsertUsuario);

        if ($resultUsuario) {
            $_SESSION['message'] = 'Usuario creado exitosamente';
            $_SESSION['message_type'] = 'Exitoso';
            echo "<script> window.location='../pages/IE/usuario.php'; </script>";
        } else {
            $_SESSION['message'] = 'Error al crear usuario';
            $_SESSION['message_type'] = 'Error';
            echo "<script> window.location='../pages/IE/registroUsuarioExterno.php'; </script>";
        }
    } else {
        $_SESSION['message'] = 'Usuario ya registrado';
        $_SESSION['message_type'] = 'Error';
        echo "<script> window.location='../pages/IE/registroUsuarioExterno.php'; </script>";
    }
} else {
    $_SESSION['message'] = 'Error';
    $_SESSION['message_type'] = 'Error';
    echo "<script> window.location='../pages/IE/registroUsuarioExterno.php'; </script>";
}