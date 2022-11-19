<?php
require '../mantenedor/mantenedor.php';

if (isset($_GET['rut_usuario'])) {
    $rutUsu = $_GET['rut_usuario'];
    $queryEditUser = "SELECT * FROM usuario WHERE rut_usuario = '$rutUsu'";
    $queryEditUserList = mysqli_query($connc, $queryEditUser);

    if (mysqli_num_rows($queryEditUserList) == 1) {
        $row = mysqli_fetch_array($queryEditUserList);
        $nombre = $row['nom_usuario'];
        $ap_paterno = $row['ap_paterno'];
        $ap_materno = $row['ap_materno'];
        $rut_usuario = $row['rut_usuario'];
        $tel = $row['tel_usuario'];
        $estado = $row['status'];
    }
}

if (isset($_POST['RestUser'])) {

    $queryClave = str_replace(substr($rutUsu, -2, 2), '', $rutUsu);
    $password = password_hash($queryClave, PASSWORD_BCRYPT);

    $queryInsertUsuario = "UPDATE usuario SET password ='$password' WHERE rut_usuario = '$rutUsu'";
    $resultUsuario = mysqli_query($connc, $queryInsertUsuario);

    if ($resultUsuario) {
        $_SESSION['message'] = 'Contraseña restablecida exitosamente';
        $_SESSION['message_type'] = 'Exitoso';
        echo "<script> window.location='../../pages/IE/usuario.php'; </script>";
    } else {
        $_SESSION['message'] = 'Error al restablecer contraseña';
        $_SESSION['message_type'] = 'Error';
        echo "<script> window.location='../../pages/general/editUser.php?rut_usuario=$rutUsu'; </script>";
    }
} else {
    $_SESSION['message'] = 'Error';
    $_SESSION['message_type'] = 'Error';
    echo "<script> window.location='../../pages/general/editUser.php?rut_usuario=$rutUsu'; </script>";
}
