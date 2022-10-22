<?php
require '../mantenedor/mantenedor.php';

if (isset($_POST['regExp'])) {

    $Date =  date('Y-m-d ');

    $nroOrdenExp = $_POST['nroOrdenExp'];
    $proveedor = $_POST['proveedor'];
    $ffww = $_POST['ffww'];
    $incotemExp = $_POST['incotemExp'];
    $obsExp = $_POST['obsExp'];

    $id_paisOrigenExp = $_POST['id_paisOrigenExp'];
    $id_paisDestinoExp = $_POST['id_paisDestinoExp'];

    $id_imp_exp = $nroOrdenExp . $usuEmpresaM;

    $queryExp = "SELECT * FROM imp_exp WHERE id_imp_exp =  '$id_imp_exp' AND tipo_ie_id_tipoie = 2";
    $queryIdExp = mysqli_query($connc, $queryExp);
    $sqlcantidadExp = mysqli_num_rows($queryIdExp);


    if ($sqlcantidadExp <= 0) {
        
        $queryInsertExp = "INSERT INTO imp_exp(id_imp_exp, nro_orden, usuempresa, usuproveedor, usutrasportadora, incoterm, origen, destino, fecha_creacion, estado, observaciones, tipo_ie_id_tipoie, usuario_rut_usuario) VALUES  ('$id_imp_exp', '$nroOrdenExp', '$rutP', '$proveedor', '$ffww', '$incotemExp', '$id_paisOrigenExp', '$id_paisDestinoExp', '$Date', 'Vigente' , '$obsExp', 2, '$usuEmpresaM')";
        $resultExp = mysqli_query($connc, $queryInsertExp);

        if ($resultExp) {
            $_SESSION['message'] = 'Exportación creada exitosamente';
            $_SESSION['message_type'] = 'Exitoso';
            echo "<script> window.location='../../pages/general/exportaciones.php'; </script>";
        } else {
            $_SESSION['message'] = 'Error al crear exportación';
            $_SESSION['message_type'] = 'Error';
            echo "<script> window.location='../../pages/IE/nuevaExportacion.php'; </script>";
        }
    } else {
        $_SESSION['message'] = 'Nro de orden de exportación ya existe';
        $_SESSION['message_type'] = 'Error';
        echo "<script> window.location='../../pages/IE/nuevaExportacion.php'; </script>";
    }
} else {
    $_SESSION['message'] = 'Error al crear exportación';
    $_SESSION['message_type'] = 'Error';
    echo "<script> window.location='../../pages/IE/nuevaExportacion.php'; </script>";
}
