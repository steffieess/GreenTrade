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

    $queryInsertImpo = "INSERT INTO imp_exp(nro_orden, usuempresa, usuproveedor, usutrasportadora, incoterm, fecha_creacion, estado, observaciones, tipo_ie_id_tipoie, usuario_rut_usuario) VALUES  ('$nroOrdenImp', '$rutP', '$proveedor', '$ffww', '$incotemImp', '$Date', 'Vigente' , '$obsImp', 1, '$usuEmpresaM')";
    $resultImpo = mysqli_query($connc, $queryInsertImpo);

    if ($resultImpo) {

        $queryInsertIePaisOrigen = "INSERT INTO ie_pais(descripcion, pais_id_pais, imp_exp_nro_orden) VALUES  ('Origen', '$id_paisOrigenImp', '$nroOrdenImp')";
        $resultIePaisOrigen = mysqli_query($connc, $queryInsertIePaisOrigen);

        $queryInsertIePaisDestino = "INSERT INTO ie_pais(descripcion, pais_id_pais, imp_exp_nro_orden) VALUES  ('Destino', '$id_paisOrigenImp', '$nroOrdenImp')";
        $resultIePaisDestino = mysqli_query($connc, $queryInsertIePaisDestino);

        if ($resultIePaisOrigen && $resultIePaisDestino) {
            $_SESSION['message'] = 'Importación creada exitosamente';
            $_SESSION['message_type'] = 'Exitoso';
            echo "<script> window.location='../../pages/general/importaciones.php'; </script>";
        }else{
            $_SESSION['message'] = 'Error al crear importación';
            $_SESSION['message_type'] = 'Error';
            echo "<script> window.location='../../pages/IE/nuevaImportacion.php'; </script>";
        }
    } else {
        $_SESSION['message'] = 'Error al crear importación';
        $_SESSION['message_type'] = 'Error';
        echo "<script> window.location='../../pages/IE/nuevaImportacion.php'; </script>";
    }
} else {
    $_SESSION['message'] = 'Error';
    $_SESSION['message_type'] = 'Error';
    echo "<script> window.location='../../pages/IE/nuevaImportacion.php'; </script>";
}
