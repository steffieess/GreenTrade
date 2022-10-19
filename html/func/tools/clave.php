<?php
require '../mantenedor/mantenedor.php';


$claveold = $_POST['claveold'];
$clavenew = $_POST['clavenew'];
$pasa = 0;

$validarUser = "SELECT rut_usuario, mail_usuario, password FROM usuario WHERE mail_usuario='" . $mailUserM . "'";
$sqlexec = mysqli_query($connc, $validarUser);

$sqlcantidad = mysqli_num_rows($sqlexec);
if ($sqlcantidad > 0) {
    while ($dataDE = mysqli_fetch_array($sqlexec)) {
        $rut = $dataDE['rut_usuario'];
        if (password_verify($claveold, $dataDE['password'])) {
            $pasa = 1;
        } else {
            $_SESSION['message'] = 'Contraseña actual incorrecta';
            $_SESSION['message_type'] = 'Error';
            echo "<script> window.location='../../pages/general/cambiarClave.php'; </script>";
        }
    }
} else {
    $_SESSION['message'] = 'Correo inexistente';
    $_SESSION['message_type'] = 'Error';
    echo "<script> window.location='../../pages/general/cambiarClave.php'; </script>";
}
if ($pasa == 1) {
    $password = password_hash($_POST['clavenew'], PASSWORD_BCRYPT);
    $query = "UPDATE usuario set password = '$password' WHERE mail_usuario = '$mailUserM'";
    $result = mysqli_query($connc, $query);
    if ($result) {
        $_SESSION['usuarios_rut'] = $rut;
        $_SESSION['message'] = 'Contraseña actualizada exitosamente';
        $_SESSION['message_type'] = 'Aviso';
        echo "<script> window.location='../../pages/general/cambiarClave.php'; </script>";
    } else {
        $_SESSION['message'] = 'Error al guardar';
        $_SESSION['message_type'] = 'Error';
        echo "<script> window.location='../../pages/general/cambiarClave.php'; </script>";
    }
}
