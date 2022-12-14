<?php
require '../mantenedor/mantenedor.php';

if (isset($_GET['id_imp_exp'])) {
    $id_imp_exp = $_GET['id_imp_exp'];
    $queryEditEmp = "SELECT * FROM imp_exp WHERE id_imp_exp = '$id_imp_exp'";
    $queryEditEmpList = mysqli_query($connc, $queryEditEmp);


    $queryUpdateImpo = "UPDATE solicitud SET empresa_id_empresa = NULL WHERE imp_exp_id_imp_exp ='$id_imp_exp'";
    $resultImpo = mysqli_query($connc, $queryUpdateImpo);

    if ($resultImpo) {
        $_SESSION['message'] = 'Solicitud rechazada';
        $_SESSION['message_type'] = 'Exitoso';
        echo "<script> window.location='../../pages/Reciclador/solicitudes.php'; </script>";
        
    } else {
        $_SESSION['message'] = 'Error al rechazar';
        $_SESSION['message_type'] = 'Error';
        echo "<script> window.location='../../pages/Reciclador/solicitudes.php'; </script>";
    }
}
