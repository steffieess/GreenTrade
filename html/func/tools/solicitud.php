<?php
require '../mantenedor/mantenedor.php';

if (isset($_GET['id_imp_exp'])) {
    $id_imp_exp = $_GET['id_imp_exp'];
    $queryEditEmp = "SELECT * FROM imp_exp WHERE id_imp_exp = '$id_imp_exp'";
    $queryEditEmpList = mysqli_query($connc, $queryEditEmp);

    if (mysqli_num_rows($queryEditEmpList) == 1) {
        $row = mysqli_fetch_array($queryEditEmpList);
        $id_imp_exp = $row['id_imp_exp'];
        $tipo_ie_id_tipoie = $row['tipo_ie_id_tipoie'];
    }
}

if (isset($_POST['Solicitar'])) {
    
    $TipoP = $_POST['TipoP'];
    $PesoT = $_POST['PesoT'];
    $FechaRD = $_POST['FechaRD'];
    $FechaRH = $_POST['FechaRH'];
    $id_empExt = $_POST['id_empExt'];

    $querySoli = "SELECT * FROM solicitud WHERE imp_exp_id_imp_exp = '$id_imp_exp'";
    $querySoliList = mysqli_query($connc, $querySoli);

    if (mysqli_num_rows($querySoliList) == 1) {

        $queryUpdateSoli = "UPDATE solicitud SET fecha_requeridaD = '$FechaRD', fecha_requeridaH = '$FechaRH', empresa_id_empresa = '$id_empExt' WHERE imp_exp_id_imp_exp ='$id_imp_exp'";
        $resultSoli = mysqli_query($connc, $queryUpdateSoli);

        if ($resultSoli) {
            $_SESSION['message'] = 'Solicitud enviada';
            $_SESSION['message_type'] = 'Exitoso';
            echo "<script> window.location='../../pages/IE/reciclaje.php'; </script>";
            
        } else {
            $_SESSION['message'] = 'Error al solicitar';
            $_SESSION['message_type'] = 'Error';
            echo "<script> window.location='../../pages/general/solicitar.php?id_imp_exp=$id_imp_exp'; </script>";
        }

    }else{
        $querySolicitud = "INSERT INTO solicitud(fecha_requeridaD, fecha_requeridaH, tipo_papel, gramaje_total, solicitante, estado, imp_exp_id_imp_exp, empresa_id_empresa) VALUES  ('$FechaRD', '$FechaRH','$TipoP','$PesoT', '$razonM', 'Pendiente','$id_imp_exp', '$id_empExt')";
        $resultSolicitud = mysqli_query($connc, $querySolicitud);

        $queryUpdateImpo = "UPDATE imp_exp SET estado = 'Pendiente' WHERE id_imp_exp='$id_imp_exp'";
        $resultImpo = mysqli_query($connc, $queryUpdateImpo);

        if ($resultSolicitud) {
            $_SESSION['message'] = 'Solicitud enviada';
            $_SESSION['message_type'] = 'Exitoso';
            if($tipo_ie_id_tipoie == 1){
                echo "<script> window.location='../../pages/general/importaciones.php?pagina=1'; </script>";
            }elseif($tipo_ie_id_tipoie == 2){
                echo "<script> window.location='../../pages/general/exportaciones.php?pagina=1'; </script>";
            }
            
        } else {
            $_SESSION['message'] = 'Error al solicitar';
            $_SESSION['message_type'] = 'Error';
            echo "<script> window.location='../../pages/general/solicitar.php?id_imp_exp=$id_imp_exp'; </script>";
        }
    }

        
} else {
    $_SESSION['message'] = 'Error';
    $_SESSION['message_type'] = 'Error';
    echo "<script> window.location='../../pages/general/solicitar.php?id_imp_exp=$id_imp_exp'; </script>";
}

