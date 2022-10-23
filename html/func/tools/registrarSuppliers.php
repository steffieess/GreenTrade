<?php
require '../mantenedor/mantenedor.php';

if (isset($_POST['regUsuario'])) {

    $rut_user = $_POST['rutUsuario'];
    $nom_user = $_POST['nomUsuario'];
    $appat_user = $_POST['appUsuario'];
    $apmat_user = $_POST['apmUsuario'];
    $mail_user = $_POST['mailUsuario'];
    $tel_user = $_POST['telUsuario'];

    
    // Quitar los últimos 2 valores (el guión y el dígito verificador) y luego verificar que sólo sea
    // numérico
    $parteNumerica = str_replace(substr($rut_user, -2, 2), '', $rut_user);

    if (!preg_match("/^[0-9]*$/", $parteNumerica)) {
        $_SESSION['message'] = 'El RUT solo debe contener números';
        $_SESSION['message_type'] = 'Error';
        echo "<script> window.location='../../pages/IE/registroUsuario.php'; </script>";
    } else {

        $guionYVerificador = substr($rut_user, -2, 2);
        // Verifica que el guion y dígito verificador tengan un largo de 2.
        if (strlen($guionYVerificador) != 2) {
            $_SESSION['message'] = 'Error en el largo del dígito verificador';
            $_SESSION['message_type'] = 'Error';
            echo "<script> window.location='../../pages/IE/registroUsuario.php'; </script>";
        } else {
            // obliga a que el dígito verificador tenga la forma -[0-9] o -[kK]
            if (!preg_match('/(^[-]{1}+[0-9kK]).{0}$/', $guionYVerificador)) {
                $_SESSION['message'] = 'El dígito verificador no cuenta con el patrón requerido';
                $_SESSION['message_type'] = 'Error';
                echo "<script> window.location='../../pages/IE/registroUsuario.php'; </script>";
            } else {
                // Valida que sólo sean números, excepto el último dígito que pueda ser k
                if (!preg_match("/^[0-9.]+[-]?+[0-9kK]{1}/", $rut_user)) {
                    $_SESSION['message'] = 'Error al digitar el RUT';
                    $_SESSION['message_type'] = 'Error';
                    echo "<script> window.location='../../pages/IE/registroUsuario.php'; </script>";
                } else {

                    $rutV = preg_replace('/[\.\-]/i', '', $rut_user);
                    $dv = substr($rutV, -1);
                    $numero = substr($rutV, 0, strlen($rutV) - 1);
                    $i = 2;
                    $suma = 0;
                    foreach (array_reverse(str_split($numero)) as $v) {
                        if ($i == 8) {
                            $i = 2;
                        }
                        $suma += $v * $i;
                        ++$i;
                    }
                    $dvr = 11 - ($suma % 11);
                    if ($dvr == 11) {
                        $dvr = 0;
                    }
                    if ($dvr == 10) {
                        $dvr = 'K';
                    }

                    if ($dvr == strtoupper($dv)) {

                        $queryUsuario = "SELECT * FROM usuario WHERE rut_usuario =  '$rut_user' OR mail_usuario = '$mail_user'";
                        $queryRutUsuario = mysqli_query($connc, $queryUsuario);
                        $sqlcantidad = mysqli_num_rows($queryRutUsuario);

                        if ($sqlcantidad <= 0) {
                            $queryClave = substr($rut_user, 0, 8);
                            $password = password_hash($queryClave, PASSWORD_BCRYPT);
                            $queryInsertUsuario = "INSERT INTO usuario(rut_usuario, nom_usuario, ap_paterno, ap_materno, password, mail_usuario, tel_usuario, status, tipo_usu_id_tipousu, empresa_id_empresa) VALUES  ('$rut_user','$nom_user', '$appat_user', '$apmat_user', '$password', '$mail_user','$tel_user', 0, 2, '$idEmpresaM')";
                            $resultUsuario = mysqli_query($connc, $queryInsertUsuario);

                            if ($resultUsuario) {
                                $_SESSION['message'] = 'Usuario creado exitosamente';
                                $_SESSION['message_type'] = 'Exitoso';
                                echo "<script> window.location='../../pages/IE/usuario.php'; </script>";
                            } else {
                                $_SESSION['message'] = 'Error al crear usuario';
                                $_SESSION['message_type'] = 'Error';
                                echo "<script> window.location='../../pages/IE/registroUsuario.php'; </script>";
                            }
                        } else {
                            $_SESSION['message'] = 'Usuario ya registrado';
                            $_SESSION['message_type'] = 'Error';
                            echo "<script> window.location='../../pages/IE/registroUsuario.php'; </script>";
                        }
                    } else {
                        $_SESSION['message'] = 'El RUT ingresado no es válido';
                        $_SESSION['message_type'] = 'Error';
                        echo "<script> window.location='../../pages/IE/registroUsuario.php'; </script>";
                    }
                }
            }
        }
    }
} else {
    $_SESSION['message'] = 'Error';
    $_SESSION['message_type'] = 'Error';
    echo "<script> window.location='../../pages/IE/registroUsuario.php'; </script>";
}
