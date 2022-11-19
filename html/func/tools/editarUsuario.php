<?php
require '../mantenedor/mantenedor.php';

if (isset($_GET['rut_usuario'])) {
    $rutUsu = $_GET['rut_usuario'];
    $queryEditUser = "SELECT * FROM usuario WHERE rut_usuario = '$rutUsu'";
    $queryEditUserList = mysqli_query($connc, $queryEditUser);

    if (mysqli_num_rows($queryEditUserList) == 1) {
        $row = mysqli_fetch_array($queryEditUserList);
        $tel = $row['tel_usuario'];
        $estado = $row['status'];
    }
}

if (isset($_POST['editUser'])) {
    
    $telefono = $_POST['newTelUser'];
    $estadoUsu = $_POST['newstatus'];
    $rutUser = $_GET['rut_usuario'];
    
        $queryInsertUsuario = "UPDATE usuario SET tel_usuario ='$telefono',  status ='$estadoUsu' WHERE rut_usuario = '$rutUser'";
        $resultUsuario = mysqli_query($connc, $queryInsertUsuario);

        if ($resultUsuario) {
            $_SESSION['message'] = 'Usuario editado exitosamente';
            $_SESSION['message_type'] = 'Exitoso';
            echo "<script> window.location='../../pages/IE/usuario.php'; </script>";
        } else {
            $_SESSION['message'] = 'Error al editar usuario';
            $_SESSION['message_type'] = 'Error';
            echo "<script> window.location='../../pages/general/editarUsuario.php?rut_usuario=$rutUsu'; </script>";
        }
} else {
    $_SESSION['message'] = 'Error';
    $_SESSION['message_type'] = 'Error';
    echo "<script> window.location='../../pages/general/editarUsuario.php?rut_usuario=$rutUsu'; </script>";
}