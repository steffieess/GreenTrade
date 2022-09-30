<?php
require '../../database/database.php';

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
    
        $queryInsertEmpresa = "INSERT INTO empresa(razon_social, direccion_empresa, tel_empresa, mail_empresa, usuario_empresa, tipo_empresa_id_tipoempresa) VALUES  ('$razon', '$direc_empresa', '$tel_empresa', '$mail_empresa','$rut_user', 1)";
        $resultEmpresa = mysqli_query($connc, $queryInsertEmpresa);
        
        if ($resultEmpresa) {

            $queryEmpresa = "SELECT * FROM empresa WHERE razon_social =  '$razon' AND usuario_empresa = '$rut_user'";
            $queryIdEmpresa = mysqli_query($connc, $queryEmpresa);
            $dataIdEmpresa = mysqli_fetch_array($queryIdEmpresa);
            $id_empresa = $dataIdEmpresa['id_empresa'];

            $queryInsertUsuario = "INSERT INTO usuario(rut_usuario, nom_usuario, ap_paterno, ap_materno, mail_usuario, tel_usuario, tipo_usu_id_tipousu, empresa_id_empresa) VALUES  ('$rut_user','$nom_user', '$appat_user', '$apmat_user', '$mail_user','$tel_user', 1, '$id_empresa')";
            $resultUsuario = mysqli_query($connc, $queryInsertUsuario);

            if ($resultUsuario) {
                echo "<script>alert('Bien');window.location= '../pages/login_register.php'</script>";
            }
            else {
                echo "<script>alert('Mal');window.location= '../pages/login_register.php'</script>";
            }
        } else {
            echo "<script>alert('Mal');window.location= '../pages/login_register.php'</script>";
        }
    }
?>