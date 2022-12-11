<?php
require '../mantenedor/mantenedor.php';


$claveold = $_POST['claveold'];
$clavenew = $_POST['clavenew'];
$clavenewv = $_POST['clavenewvalida'];
$pasa = 0;
if ($clavenew == $clavenewv) {
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
        if (strlen($clavenew) == 6) {
            if (preg_match('`[a-z]`', $clavenew)) {
                if (preg_match('`[A-Z]`', $clavenew)) {
                    if (preg_match('`[0-9]`', $clavenew)) {
                        if ($result) {
                            $_SESSION['usuarios_rut'] = $rut;
                            $_SESSION['message'] = 'Contraseña actualizada exitosamente';
                            $_SESSION['message_type'] = 'Aviso';
                            echo "<script> window.location='../../pages/general/homepage.php'; </script>";
                        } else {
                            $_SESSION['message'] = 'Error al guardar';
                            $_SESSION['message_type'] = 'Error';
                            echo "<script> window.location='../../pages/general/cambiarClave.php'; </script>";
                        }
                    } else {
                        $_SESSION['message'] = 'La clave debe tener al menos un caracter numérico';
                        $_SESSION['message_type'] = 'Error';
                        echo "<script> window.location='../../pages/general/cambiarClave.php'; </script>";
                    }
                } else {
                    $_SESSION['message'] = 'La clave debe tener al menos una letra mayúscula';
                    $_SESSION['message_type'] = 'Error';
                    echo "<script> window.location='../../pages/general/cambiarClave.php'; </script>";
                }
            } else {
                $_SESSION['message'] = 'La clave debe tener al menos una letra minúscula';
                $_SESSION['message_type'] = 'Error';
                echo "<script> window.location='../../pages/general/cambiarClave.php'; </script>";
            }
        } else {
            $_SESSION['message'] = 'La clave debe tener 6 caracteres';
            $_SESSION['message_type'] = 'Error';
            echo "<script> window.location='../../pages/general/cambiarClave.php'; </script>";
        }
    }
} else {
    $_SESSION['message'] = 'Las contraseñas no coinciden';
    $_SESSION['message_type'] = 'Error';
    echo "<script> window.location='../../pages/general/cambiarClave.php'; </script>";
}
