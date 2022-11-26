<?php
require '../mantenedor/mantenedor.php';

if (isset($_GET['id_empresa'])) {
    $id_empresa = $_GET['id_empresa'];
    $queryEditEmp = "SELECT * FROM empresa WHERE id_empresa = '$id_empresa'";
    $queryEditEmpList = mysqli_query($connc, $queryEditEmp);

    if (mysqli_num_rows($queryEditEmpList) == 1) {
        $row = mysqli_fetch_array($queryEditEmpList);
        $direccion = $row['direccion_empresa'];
        $telefono = $row['tel_empresa'];
        $correo = $row['mail_empresa'];
    }
}

if (isset($_POST['editEmpresa'])) {
    
    $DirecEmp = utf8_decode($_POST['newDirecEmp']);
    $TelEmp = $_POST['newTelEmp'];
    $CorreoEmp = utf8_decode($_POST['newCorreoEmp']);
    $idEmp = $_GET['id_empresa'];
    
        $queryUpdateEmp = "UPDATE empresa SET direccion_empresa ='$DirecEmp',  tel_empresa ='$TelEmp', mail_empresa='$CorreoEmp' WHERE id_empresa = '$idEmp'";
        $resultUpdateEmp = mysqli_query($connc, $queryUpdateEmp);

        if ($resultUpdateEmp) {
            $_SESSION['message'] = 'Empresa editada exitosamente';
            $_SESSION['message_type'] = 'Exitoso';
            echo "<script> window.location='../../pages/IE/empresa.php'; </script>";
        } else {
            $_SESSION['message'] = 'Error al editar empresa';
            $_SESSION['message_type'] = 'Error';
            echo "<script> window.location='../../pages/general/editEmpresa.php?id_empresa=$id_empresa'; </script>";
        }
} else {
    $_SESSION['message'] = 'Error';
    $_SESSION['message_type'] = 'Error';
    echo "<script> window.location='../../pages/general/editEmpresa.php?id_empresa=$id_empresa'; </script>";
}