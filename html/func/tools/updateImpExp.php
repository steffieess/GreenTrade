<?php
require '../mantenedor/mantenedor.php';

if (isset($_GET['id_imp_exp'])) {
    $id_imp_exp = $_GET['id_imp_exp'];
    $queryeditImp = "SELECT * FROM imp_exp WHERE id_imp_exp = '$id_imp_exp'";
    $queryeditImpList = mysqli_query($connc, $queryeditImp);

    if (mysqli_num_rows($queryeditImpList) == 1) {
        $row = mysqli_fetch_array($queryeditImpList);
        $nOrden = $row['nro_orden'];
        $tipo_ie = $row['tipo_ie_id_tipoie'];
    }
}

if (isset($_POST['editImpExp'])) {
    
    $ImpExp = $_POST['ImpExp'];
    
        $queryUpdateEmp = "UPDATE imp_exp SET tipo_ie_id_tipoie='$ImpExp' WHERE id_imp_exp = '$id_imp_exp'";
        $resultUpdateEmp = mysqli_query($connc, $queryUpdateEmp);

        if ($resultUpdateEmp) {
            $_SESSION['message'] = 'Empresa editada exitosamente';
            $_SESSION['message_type'] = 'Exitoso';
            echo "<script> window.location='../../pages/general/cambioImpExp.php?pagina=1'; </script>";
        } else {
            $_SESSION['message'] = 'Error al editar empresa';
            $_SESSION['message_type'] = 'Error';
            echo "<script> window.location='../../pages/general/editarImpExp.php?id_imp_exp=$id_imp_exp'; </script>";
        }
} else {
    $_SESSION['message'] = 'Error';
    $_SESSION['message_type'] = 'Error';
    echo "<script> window.location='../../pages/general/editarImpExp.php?id_imp_exp=$id_imp_exp'; </script>";
}