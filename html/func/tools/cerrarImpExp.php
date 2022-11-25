<?php
require '../mantenedor/mantenedor.php';

if (isset($_GET['id_imp_exp'])) {
    $id_imp_exp = $_GET['id_imp_exp'];
    $queryImpExp = "SELECT tipo_ie_id_tipoie FROM imp_exp WHERE id_imp_exp = '$id_imp_exp'";
    $queryEditImpExp = mysqli_query($connc, $queryImpExp);

    if (mysqli_num_rows($queryEditImpExp) == 1) {
        $row = mysqli_fetch_array($queryEditImpExp);
        $tipo_ie = $row['tipo_ie_id_tipoie'];

    }

} else {
    $_SESSION['message'] = 'Error';
    $_SESSION['message_type'] = 'Error';
    echo "<script> window.location='../../pages/general/importaciones.php?pagina=1'; </script>";
}

if (isset($_POST['Cerrar'])) {
    
    $newFechaCierre = $_POST['newFechaCierre'];
    
    
        $queryUpdateEmp = "UPDATE imp_exp SET estado ='Cerrado',  fecha_cierre ='$newFechaCierre' WHERE id_imp_exp = '$id_imp_exp'";
        $resultUpdateEmp = mysqli_query($connc, $queryUpdateEmp);

        if ($resultUpdateEmp) {
            $_SESSION['message'] = 'Cerrado exitosamente';
            $_SESSION['message_type'] = 'Exitoso';
            if ($tipo_ie == 1) {
                echo "<script> window.location='../../pages/general/importaciones.php?pagina=1'; </script>";
            }else{
                echo "<script> window.location='../../pages/general/exportaciones.php?pagina=1'; </script>";
            }
            
        } else {
            $_SESSION['message'] = 'Error al cerrar';
            $_SESSION['message_type'] = 'Error';
            echo "<script> window.location='../../pages/general/cerrarImpExp.php?id_imp_exp=$id_imp_exp'; </script>";
        }
} else {
    $_SESSION['message'] = 'Error';
    $_SESSION['message_type'] = 'Error';
    echo "<script> window.location='../../pages/general/cerrarImpExp.php?id_imp_exp=$id_imp_exp'; </script>";
}