<?php
require '../../../database/database.php';

if (isset($_POST['Registrar'])) {

    $razon = $_POST['razon'];
    $direc_empresa = $_POST['direc_empresa'];
    $tel_empresa = $_POST['tel_empresa'];
    $mail_empresa = $_POST['mail_empresa'];

    $rut_user = $_POST['rut_user'];

    $nom_user = $_POST['nom_user'];
    $appat_user = $_POST['appat_user'];
    $apmat_user = $_POST['apmat_user'];
    $mail_user = $_POST['mail_user'];
    $tel_user = $_POST['tel_user'];
    $clave_user = $_POST['clave_user'];
    $clave_user_valid = $_POST['clave_user_valid'];

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

                $queryUsuario = "SELECT * FROM usuario WHERE rut_usuario =  '$rut_user'";
                $queryRutUsuario = mysqli_query($connc, $queryUsuario);
                $sqlcantidad = mysqli_num_rows($queryRutUsuario);

                if ($sqlcantidad <= 0) {
                    $queryInsertUsuario = "INSERT INTO usuario(rut_usuario, nom_usuario, ap_paterno, ap_materno, password, mail_usuario, tel_usuario, status, tipo_usu_id_tipousu, empresa_id_empresa) VALUES  ('$rut_user','$nom_user', '$appat_user', '$apmat_user', '$password', '$mail_user','$tel_user', 0, 1, '$id_empresa')";
                    $resultUsuario = mysqli_query($connc, $queryInsertUsuario);

                    if ($resultUsuario) {
                        $_SESSION['message'] = 'Usuario y empresa creados exitosamente';
                        $_SESSION['message_type'] = 'Exitoso';
                        echo "<script> window.location='../pages/general/login_register.php'; </script>";
                    } else {
                        $_SESSION['message'] = 'Error al crear usuario';
                        $_SESSION['message_type'] = 'Error';
                        echo "<script> window.location='../pages/general/login_register.php'; </script>";
                    }
                } else {
                    $_SESSION['message'] = 'Usuario ya registrado';
                    $_SESSION['message_type'] = 'Error';
                    echo "<script> window.location='../pages/general/login_register.php'; </script>";
                }
            } else {
                $_SESSION['message'] = 'Error al crear empresa';
                $_SESSION['message_type'] = 'Error';
                echo "<script> window.location='../pages/general/login_register.php'; </script>";
            }
        } else {
            $_SESSION['message'] = 'Empresa ya existente';
            $_SESSION['message_type'] = 'Error';
            echo "<script> window.location='../pages/general/login_register.php'; </script>";
        }
    } else {
        $_SESSION['message'] = 'Contraseñas no coinciden';
        $_SESSION['message_type'] = 'Error';
        echo "<script> window.location='../pages/general/login_register.php'; </script>";
    }
}
