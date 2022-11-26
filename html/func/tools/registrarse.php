<?php
require '../../../database/database.php';

if (isset($_POST['Registrar'])) {

    $razon = utf8_decode($_POST['razon']);
    $direc_empresa = utf8_decode($_POST['direc_empresa']);
    $tel_empresa = $_POST['tel_empresa'];
    $mail_empresa = $_POST['mail_empresa'];

    $rut_user = $_POST['rut_user'];

    $nom_user = utf8_decode($_POST['nom_user']);
    $appat_user = utf8_decode($_POST['appat_user']);
    $apmat_user = utf8_decode($_POST['apmat_user']);
    $mail_user = $_POST['mail_user'];
    $tel_user = $_POST['tel_user'];
    $clave_user = $_POST['clave_user'];
    $clave_user_valid = $_POST['clave_user_valid'];

    // Quitar los últimos 2 valores (el guión y el dígito verificador) y luego verificar que sólo sea
    // numérico
    $parteNumerica = str_replace(substr($rut_user, -2, 2), '', $rut_user);

    if (!preg_match("/^[0-9]*$/", $parteNumerica)) {
        $_SESSION['message'] = 'El RUT solo debe contener números';
        $_SESSION['message_type'] = 'Error';
        echo "<script> window.location='../../pages/general/login_register.php'; </script>";
    } else {

        $guionYVerificador = substr($rut_user, -2, 2);
        // Verifica que el guion y dígito verificador tengan un largo de 2.
        if (strlen($guionYVerificador) != 2) {
            $_SESSION['message'] = 'Error en el largo del dígito verificador';
            $_SESSION['message_type'] = 'Error';
            echo "<script> window.location='../../pages/general/login_register.php'; </script>";
        } else {
            // obliga a que el dígito verificador tenga la forma -[0-9] o -[kK]
            if (!preg_match('/(^[-]{1}+[0-9kK]).{0}$/', $guionYVerificador)) {
                $_SESSION['message'] = 'El dígito verificador no cuenta con el patrón requerido';
                $_SESSION['message_type'] = 'Error';
                echo "<script> window.location='../../pages/general/login_register.php'; </script>";
            } else {
                // Valida que sólo sean números, excepto el último dígito que pueda ser k
                if (!preg_match("/^[0-9.]+[-]?+[0-9kK]{1}/", $rut_user)) {
                    $_SESSION['message'] = 'Error al digitar el RUT';
                    $_SESSION['message_type'] = 'Error';
                    echo "<script> window.location='../../pages/general/login_register.php'; </script>";
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
                        if ($clave_user == $clave_user_valid) {

                            $password = password_hash($_POST['clave_user'], PASSWORD_BCRYPT);

                            $queryEmpresaC = "SELECT * FROM empresa WHERE razon_social =  '$razon' AND usuario_empresa = '$rut_user'";
                            $queryIdEmpresaC = mysqli_query($connc, $queryEmpresaC);
                            $sqlcantidadE = mysqli_num_rows($queryIdEmpresaC);


                            if ($sqlcantidadE <= 0) {
                                $queryInsertEmpresa = "INSERT INTO empresa(razon_social, direccion_empresa, tel_empresa, mail_empresa, usuario_empresa, tipo_empresa_id_tipoempresa) VALUES  ('$razon', '$direc_empresa', '$tel_empresa', '$mail_empresa','$rut_user', 1)";
                                $resultEmpresa = mysqli_query($connc, $queryInsertEmpresa);

                                if ($resultEmpresa) {

                                    $queryEmpresa = "SELECT * FROM empresa WHERE razon_social =  '$razon' AND usuario_empresa = '$rut_user'";
                                    $queryIdEmpresa = mysqli_query($connc, $queryEmpresa);
                                    $dataIdEmpresa = mysqli_fetch_array($queryIdEmpresa);
                                    $id_empresa = $dataIdEmpresa['id_empresa'];

                                    $queryUsuario = "SELECT * FROM usuario WHERE rut_usuario =  '$rut_user' OR mail_usuario = '$mail_user'";
                                    $queryRutUsuario = mysqli_query($connc, $queryUsuario);
                                    $sqlcantidad = mysqli_num_rows($queryRutUsuario);

                                    if ($sqlcantidad <= 0) {
                                        $queryInsertUsuario = "INSERT INTO usuario(rut_usuario, nom_usuario, ap_paterno, ap_materno, password, mail_usuario, tel_usuario, status, tipo_usu_id_tipousu, empresa_id_empresa) VALUES  ('$rut_user','$nom_user', '$appat_user', '$apmat_user', '$password', '$mail_user','$tel_user', 0, 1, '$id_empresa')";
                                        $resultUsuario = mysqli_query($connc, $queryInsertUsuario);

                                        if ($resultUsuario) {
                                            $_SESSION['message'] = 'Usuario y empresa creados exitosamente';
                                            $_SESSION['message_type'] = 'Exitoso';
                                            echo "<script> window.location='../../pages/general/login_register.php'; </script>";
                                        } else {
                                            $_SESSION['message'] = 'Error al crear usuario';
                                            $_SESSION['message_type'] = 'Error';
                                            echo "<script> window.location='../../pages/general/login_register.php'; </script>";
                                        }
                                    } else {
                                        $_SESSION['message'] = 'RUT o Correos ya registrados';
                                        $_SESSION['message_type'] = 'Error';
                                        echo "<script> window.location='../../pages/general/login_register.php'; </script>";
                                    }
                                } else {
                                    $_SESSION['message'] = 'Error al crear empresa';
                                    $_SESSION['message_type'] = 'Error';
                                    echo "<script> window.location='../../pages/general/login_register.php'; </script>";
                                }
                            } else {
                                $_SESSION['message'] = 'Empresa ya existente';
                                $_SESSION['message_type'] = 'Error';
                                echo "<script> window.location='../../pages/general/login_register.php'; </script>";
                            }
                        } else {
                            $_SESSION['message'] = 'Contraseñas no coinciden';
                            $_SESSION['message_type'] = 'Error';
                            echo "<script> window.location='../../pages/general/login_register.php'; </script>";
                        }
                    } else {
                        $_SESSION['message'] = 'El RUT ingresado no es válido';
                        $_SESSION['message_type'] = 'Error';
                        echo "<script> window.location='../../pages/general/login_register.php'; </script>";
                    }
                }
            }
        }
    }
} else {
    $_SESSION['message'] = 'Error';
    $_SESSION['message_type'] = 'Error';
    echo "<script> window.location='../../pages/IE/login_register.php'; </script>";
}
