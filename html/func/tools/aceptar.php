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

if (isset($_POST['Aprobar'])) {

    $FechaRe = $_POST['FechaRe'];

    $querySoli = "SELECT * FROM solicitud WHERE imp_exp_id_imp_exp = '$id_imp_exp'";
    $querySoliList = mysqli_query($connc, $querySoli);

    if (mysqli_num_rows($querySoliList) == 1) {

        $queryUpdateSoli = "UPDATE solicitud SET fecha_recicladora = '$FechaRe', estado = 'Retiro Pendiente' WHERE imp_exp_id_imp_exp ='$id_imp_exp'";
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
    }
}
