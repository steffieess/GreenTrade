<?php
require '../mantenedor/mantenedor.php';

if (isset($_GET['id_imp_exp'])) {
    $id_imp_exp = $_GET['id_imp_exp'];
    $queryImpExp = "SELECT * FROM imp_exp WHERE id_imp_exp = '$id_imp_exp'";
    $queryEditImpExp = mysqli_query($connc, $queryImpExp);

    if (mysqli_num_rows($queryEditImpExp) == 1) {
        $row = mysqli_fetch_array($queryEditImpExp);
        $tipo_ie_id_tipoie = $row['tipo_ie_id_tipoie'];

        if ($tipo_ie_id_tipoie == 1) {

            $queryEliminar = "UPDATE imp_exp SET estado ='Borrado' WHERE id_imp_exp = '$id_imp_exp'";
            $resultEliminar = mysqli_query($connc, $queryEliminar);

            if ($resultEliminar) {
                $_SESSION['message'] = 'Importación borrada exitosamente';
                $_SESSION['message_type'] = 'Exitoso';
                echo "<script> window.location='../../pages/general/importaciones.php?pagina=1'; </script>";
            } else {
                $_SESSION['message'] = 'Error al borrar la importación';
                $_SESSION['message_type'] = 'Error';
                echo "<script> window.location='../../pages/general/listaImp.php?id_imp_exp=$id_imp_exp'; </script>";
            }
        } elseif ($tipo_ie_id_tipoie == 2) {
            $queryEliminar = "UPDATE imp_exp SET estado ='Borrado' WHERE id_imp_exp = '$id_imp_exp'";
            $resultEliminar = mysqli_query($connc, $queryEliminar);

            if ($resultEliminar) {
                $_SESSION['message'] = 'Exportación borrada exitosamente';
                $_SESSION['message_type'] = 'Exitoso';
                echo "<script> window.location='../../pages/general/exportaciones.php?pagina=1'; </script>";
            } else {
                $_SESSION['message'] = 'Error al borrar la exportación';
                $_SESSION['message_type'] = 'Error';
                echo "<script> window.location='../../pages/general/listaExp.php?id_imp_exp=$id_imp_exp'; </script>";
            }
        }
    }
}
