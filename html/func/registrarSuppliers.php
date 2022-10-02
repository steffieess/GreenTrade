<?php
require 'mantenedor.php';

if (isset($_POST['regUsuario'])) {

    $rut_user = $_POST['rutUsuario'];
    $nom_user = $_POST['nomUsuario'];
    $appat_user = $_POST['appUsuario'];
    $apmat_user = $_POST['apmUsuario'];
    $mail_user = $_POST['mailUsuario'];
    $tel_user = $_POST['telUsuario'];
    

    $queryUsuario = "SELECT * FROM usuario WHERE rut_usuario =  '$rut_user'";
    $queryRutUsuario = mysqli_query($connc, $queryUsuario);
    $sqlcantidad = mysqli_num_rows($queryRutUsuario);

    if ($sqlcantidad <= 0) {
        $queryInsertUsuario = "INSERT INTO usuario(rut_usuario, nom_usuario, ap_paterno, ap_materno, password, mail_usuario, tel_usuario, tipo_usu_id_tipousu, empresa_id_empresa) VALUES  ('$rut_user','$nom_user', '$appat_user', '$apmat_user', 'asdsad', '$mail_user','$tel_user', 2, '$idEmpresaM')";
        $resultUsuario = mysqli_query($connc, $queryInsertUsuario);

        if ($resultUsuario) {
            $_SESSION['message'] = 'Usuario creado exitosamente';
            $_SESSION['message_type'] = 'Exitoso';
            echo "<script> window.location='../pages/usuario.php'; </script>";
        } else {
            $_SESSION['message'] = 'Error al crear usuario';
            $_SESSION['message_type'] = 'Error';
            echo "<script> window.location='../pages/registroUsuario.php'; </script>";
        }
    } else {
        $_SESSION['message'] = 'Usuario ya registrado';
        $_SESSION['message_type'] = 'Error';
        echo "<script> window.location='../pages/registroUsuario.php'; </script>";
    }
} else {
    $_SESSION['message'] = 'Error';
    $_SESSION['message_type'] = 'Error';
    echo "<script> window.location='../pages/registroUsuario.php'; </script>";
}
