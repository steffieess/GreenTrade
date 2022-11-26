<?php
require '../mantenedor/mantenedor.php';

if (isset($_POST['regExp'])) {

    $Date =  date('Y-m-d ');

    $nroOrdenExp = $_POST['nroOrdenExp'];
    $proveedor = utf8_decode($_POST['proveedor']);
    $ffww = utf8_decode($_POST['ffww']);
    $incotemExp = utf8_decode($_POST['incotemExp']);
    $obsExp = utf8_decode($_POST['obsExp']);

    $id_paisOrigenExp = utf8_decode($_POST['id_paisOrigenExp']);
    $id_paisDestinoExp = utf8_decode($_POST['id_paisDestinoExp']);

    $id_imp_exp = $nroOrdenExp . $usuEmpresaM;

    $queryExp = "SELECT * FROM imp_exp WHERE id_imp_exp =  '$id_imp_exp' AND tipo_ie_id_tipoie = 2";
    $queryIdExp = mysqli_query($connc, $queryExp);
    $sqlcantidadExp = mysqli_num_rows($queryIdExp);


    if ($sqlcantidadExp <= 0) {

        $queryInsertExp = "INSERT INTO imp_exp(id_imp_exp, nro_orden, usuempresa, usuproveedor, usutrasportadora, incoterm, origen, destino, fecha_creacion, estado, observaciones, tipo_ie_id_tipoie, usuario_rut_usuario) VALUES  ('$id_imp_exp', '$nroOrdenExp', '$rutP', '$proveedor', '$ffww', '$incotemExp', '$id_paisOrigenExp', '$id_paisDestinoExp', '$Date', 'Vigente' , '$obsExp', 2, '$usuEmpresaM')";
        $resultExp = mysqli_query($connc, $queryInsertExp);

        //Datos nuevos para que se generen los documentos en blanco asociados a la importación
        $queryInsertImpoDoc1 = "INSERT INTO documento(documento,tipo_documento_id_tipodoc, nro_paginas, formato_doc, recibido,obligatorio, imp_exp_id_imp_exp) 
        VALUES  (NULL, 1, 0, 'pdf', '0',1,'$id_imp_exp')";
        $resultImpoDoc1 = mysqli_query($connc, $queryInsertImpoDoc1);

        $queryInsertImpoDoc2 = "INSERT INTO documento(documento,tipo_documento_id_tipodoc, nro_paginas, formato_doc, recibido,obligatorio, imp_exp_id_imp_exp) 
        VALUES  (NULL, 2, 0, 'pdf', '0',1,'$id_imp_exp')";
        $resultImpoDoc2 = mysqli_query($connc, $queryInsertImpoDoc2);

        $queryInsertImpoDoc3 = "INSERT INTO documento(documento,tipo_documento_id_tipodoc, nro_paginas, formato_doc, recibido,obligatorio, imp_exp_id_imp_exp) 
        VALUES  (NULL, 3, 0, 'pdf', '0',1,'$id_imp_exp')";
        $resultImpoDoc3 = mysqli_query($connc, $queryInsertImpoDoc3);

        $queryInsertImpoDoc4 = "INSERT INTO documento(documento,tipo_documento_id_tipodoc, nro_paginas, formato_doc, recibido,obligatorio, imp_exp_id_imp_exp) 
        VALUES  (NULL, 4, 0, 'pdf', '0',1,'$id_imp_exp')";
        $resultImpoDoc4 = mysqli_query($connc, $queryInsertImpoDoc4);

        $queryInsertImpoDoc5 = "INSERT INTO documento(documento,tipo_documento_id_tipodoc, nro_paginas, formato_doc, recibido,obligatorio, imp_exp_id_imp_exp) 
        VALUES  (NULL, 5, 0, 'pdf', '0',1,'$id_imp_exp')";
        $resultImpoDoc5 = mysqli_query($connc, $queryInsertImpoDoc5);

        $queryInsertImpoDoc6 = "INSERT INTO documento(documento,tipo_documento_id_tipodoc, nro_paginas, formato_doc, recibido,obligatorio, imp_exp_id_imp_exp) 
        VALUES  (NULL, 6, 0, 'pdf', '0', 1,'$id_imp_exp')";
        $resultImpoDoc6 = mysqli_query($connc, $queryInsertImpoDoc6);

        //datos de registro de la mercaderia
        $queryInsertMerca = "INSERT INTO mercaderia(imp_exp_id_imp_exp) VALUES  ('$id_imp_exp')";
        $resultMerca = mysqli_query($connc, $queryInsertMerca);

        //datos de registro para el seguimiento
        $queryInsertSegui = "INSERT INTO seguimiento(imp_exp_id_imp_exp) VALUES  ('$id_imp_exp')";
        $resultSegui = mysqli_query($connc, $queryInsertSegui);

        if ($resultExp) {
            $_SESSION['message'] = 'Exportación creada exitosamente';
            $_SESSION['message_type'] = 'Exitoso';
            echo "<script> window.location='../../pages/general/exportaciones.php?pagina=1'; </script>";
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
