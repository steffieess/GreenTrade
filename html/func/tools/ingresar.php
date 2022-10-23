<?php
require '../../../database/database.php';


$mail_usuario = $_POST['correo'];
$clave = $_POST['clave'];
$clave_verify = "";
$pasa = 0;

$validarUser = "SELECT rut_usuario, mail_usuario, password FROM usuario WHERE mail_usuario='" . $_POST['correo'] . "'";
$sqlexec = mysqli_query($connc, $validarUser);

$sqlcantidad = mysqli_num_rows($sqlexec);
if ($sqlcantidad > 0) {
    while ($dataDE = mysqli_fetch_array($sqlexec)) {
        $rut = $dataDE['rut_usuario'];
        $parteNumerica = str_replace(substr($rut, -2, 2), '', $rut);
        if ($clave != $parteNumerica) {
            if (password_verify($clave, $dataDE['password'])) {
                $pasa = 1;
            } else {
                $_SESSION['message'] = 'Contraseña incorrecta';
                $_SESSION['message_type'] = 'Error';
                echo "<script> window.location='../../pages/general/login_register.php'; </script>";
            }
        } else {
            $pasa = 2;
        }
    }
} else {
    $_SESSION['message'] = 'Correo inexistente';
    $_SESSION['message_type'] = 'Error';
    echo "<script> window.location='../../pages/general/login_register.php'; </script>";
}

if ($pasa == 2) {
    $_SESSION['usuarios_rut'] = $rut;
    $_SESSION['message'] = 'Por temas de seguridad se le recomienda cambiar la contraseña';
    $_SESSION['message_type'] = 'Aviso';
    echo "<script> window.location='../../pages/general/cambiarClave.php'; </script>";
} else if ($pasa == 1) {
    $_SESSION['usuarios_rut'] = $rut;
    echo "<script> window.location='../../pages/general/homepage.php'; </script>";
}
