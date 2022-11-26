<?php
require '../mantenedor/mantenedor.php';

if (isset($_POST['regImp'])) {

    $Date =  date('Y-m-d ');

    $nroOrdenImp = $_POST['nroOrdenImp'];
    $proveedor = utf8_decode($_POST['proveedor']);
    $ffww = utf8_decode($_POST['ffww']);
    $incotemImp = utf8_decode($_POST['incotemImp']);
    $obsImp = utf8_decode($_POST['obsImp']);

    $id_paisOrigenImp = utf8_decode($_POST['id_paisOrigenImp']);
    $id_paisDestinoImp = utf8_decode($_POST['id_paisDestinoImp']);

    $id_imp_exp = $nroOrdenImp . $usuEmpresaM;

    $queryImpo = "SELECT * FROM imp_exp WHERE id_imp_exp =  '$id_imp_exp' AND tipo_ie_id_tipoie = 1";
    $queryIdImpo = mysqli_query($connc, $queryImpo);
    $sqlcantidadImpo = mysqli_num_rows($queryIdImpo);


    if ($sqlcantidadImpo <= 0) {
        $queryInsertImpo = "INSERT INTO imp_exp(id_imp_exp, nro_orden, usuempresa, usuproveedor, usutrasportadora, incoterm, origen, destino, fecha_creacion, estado, observaciones, tipo_ie_id_tipoie, usuario_rut_usuario) VALUES  ('$id_imp_exp', '$nroOrdenImp', '$rutP', '$proveedor', '$ffww', '$incotemImp', '$id_paisOrigenImp', '$id_paisDestinoImp', '$Date', 'Vigente' , '$obsImp', 1, '$usuEmpresaM')";
        $resultImpo = mysqli_query($connc, $queryInsertImpo);
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

        
        if ($resultImpo) {
            $_SESSION['message'] = 'Importación creada exitosamente';
            $_SESSION['message_type'] = 'Exitoso';
            echo "<script> window.location='../../pages/general/importaciones.php?pagina=1'; </script>";
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
