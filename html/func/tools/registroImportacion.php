<?php
require '../mantenedor/mantenedor.php';

if (isset($_POST['regImp'])) {

    $Date =  date('Y-m-d ');

    $nroOrdenImp = $_POST['nroOrdenImp'];
    $proveedor = $_POST['proveedor'];
    $ffww = $_POST['ffww'];
    $incotemImp = $_POST['incotemImp'];
    $obsImp = $_POST['obsImp'];

    $id_paisOrigenImp = $_POST['id_paisOrigenImp'];
    $id_paisDestinoImp = $_POST['id_paisDestinoImp'];

    $id_imp_exp = $nroOrdenImp . $usuEmpresaM;

    $queryImpo = "SELECT * FROM imp_exp WHERE id_imp_exp =  '$id_imp_exp' AND tipo_ie_id_tipoie = 1";
    $queryIdImpo = mysqli_query($connc, $queryImpo);
    $sqlcantidadImpo = mysqli_num_rows($queryIdImpo);


    if ($sqlcantidadImpo <= 0) {
        $queryInsertImpo = "INSERT INTO imp_exp(id_imp_exp, nro_orden, usuempresa, usuproveedor, usutrasportadora, incoterm, origen, destino, fecha_creacion, estado, observaciones, tipo_ie_id_tipoie, usuario_rut_usuario) VALUES  ('$id_imp_exp', '$nroOrdenImp', '$rutP', '$proveedor', '$ffww', '$incotemImp', '$id_paisOrigenImp', '$id_paisDestinoImp', '$Date', 'Vigente' , '$obsImp', 1, '$usuEmpresaM')";
        $resultImpo = mysqli_query($connc, $queryInsertImpo);
        
        if ($resultImpo) {
            $_SESSION['message'] = 'Importación creada exitosamente';
            $_SESSION['message_type'] = 'Exitoso';
            echo "<script> window.location='../../pages/general/importaciones.php'; </script>";
        } else {
            $_SESSION['message'] = 'Error al crear importación';
            $_SESSION['message_type'] = 'Error';
            echo "<script> window.location='../../pages/IE/nuevaImportacion.php'; </script>";
        }
    } else {
        $_SESSION['message'] = 'Nro de orden de importación ya existe';
        $_SESSION['message_type'] = 'Error';
        echo "<script> window.location='../../pages/IE/nuevaImportacion.php'; </script>";
    }
} else {
    $_SESSION['message'] = 'Error al crear importación';
    $_SESSION['message_type'] = 'Error';
    echo "<script> window.location='../../pages/IE/nuevaImportacion.php'; </script>";
}
