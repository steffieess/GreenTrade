<?php
require '../mantenedor/mantenedor.php';

if (isset($_POST['editImp'])) {
    $nro_orden = $_POST['xxx'];

    if ($tipoUsu == 1 || $tipoUsu == 2) {
        $observaciones = $_POST['newobsImp'];
        $reserva = $_POST['newReservaImp'];
        $edt = $_POST['newEdtImp'];
        $eta = $_POST['newEtaImp'];
        $ndocumento = $_POST['newNroDocImp'];
        $fechadocumento = $_POST['newFechaDocImp'];
        $pol = $_POST['newEmbarquePuertoAereoImp'];
        $pod = $_POST['newDesembarquePuertoAereoImp'];
        $mercaderia = $_POST['newMercaderiaImp']; //otra tabla
        $categoria = $_POST['newViaTransporteImp']; //otra tabla
        //echo $categoria;
        //  $subcategoria = $_POST['newTipoEmbarqueImp']; //otra tabla
        $bultos = $_POST['newCantBultosImp'];
        $peso = $_POST['newPesoImp'];
        $volumen = $_POST['newVolumenImp'];
        $ncontendor = $_POST['newNroContenedorImp'];
        $tipocontenedor = $_POST['newTipoContenedorImp'];
        //otros datos
        $link = $_POST['newLinkImp']; //otra tabla
        $nsegumiento = $_POST['newNroSegImp']; //otra tabla
        $npoliza = $_POST['newNroPolizaImp'];
        $fechapoliza = $_POST['newFechaPolizaImp'];
        $montopoliza = $_POST['newPrimaPolizaImp'];

        //update de importacion/exportación
        $queryUpdateImpo = "UPDATE imp_exp SET observaciones = '$observaciones', nro_reserva= $reserva, fecha_edt='$edt', fecha_eta='$eta', nro_doctrasporte=$ndocumento,
        fecha_doctrasporte='$fechadocumento', puerto_areo_embarque='$pol', puerto_areo_desembarque='$pod', cant_bultos=$bultos, peso_estimado=$peso, vol_estimado=$volumen,
        nro_contenedor=$ncontendor, tipo_contenedor='$tipocontenedor', nro_poliza=$npoliza, fecha_poliza='$fechapoliza', monto_prima_poliza=$montopoliza WHERE id_imp_exp='$nro_orden'";
        $resultImpo = mysqli_query($connc, $queryUpdateImpo);
        
        
        //update de mercaderia
        $queryUpdateMerca = "UPDATE mercaderia SET descripcion = '$mercaderia', categoria='$categoria' WHERE imp_exp_id_imp_exp='$nro_orden'";
        $resultMerca = mysqli_query($connc, $queryUpdateMerca);

        //update de seguimiento
        $queryUpdateSegui = "UPDATE seguimiento SET link_seguimiento = '$link', nro_seguimiento='$nsegumiento' WHERE imp_exp_id_imp_exp='$nro_orden'";
        $resultSegui = mysqli_query($connc, $queryUpdateSegui);


        //documentos
        //echo '2';
        if (isset($_POST['checkci'])) {
            
            if ($_FILES['comercialInvoice']['name']!=null) {
                
                $tipoArchivo = $_FILES['comercialInvoice']['type'];
                $nombreArchivo = $_FILES['comercialInvoice']['name'];
                $tamanoArchivo = $_FILES['comercialInvoice']['size'];

                $imagenSubida = fopen($_FILES['comercialInvoice']['tmp_name'], 'r');
                $binariosImagen = fread($imagenSubida, $tamanoArchivo);

                //cantidad de páginas
                $count = 0;

                $regex  = "/\/Count\s+(\d+)/";
                $regex2 = "/\/Page\W*(\d+)/";
                $regex3 = "/\/N\s+(\d+)/";

                if (preg_match_all($regex, $binariosImagen, $matches))
                    $count = max($matches);

                $count= $count[0];


                $binariosImagen = mysqli_escape_string($connc, $binariosImagen);
                $query = "UPDATE documento SET nom_documento ='$nombreArchivo', documento = '$binariosImagen',
                obligatorio=2, nro_paginas=$count WHERE imp_exp_id_imp_exp='$nro_orden' and tipo_documento_id_tipodoc=1";
                $resultQuery = mysqli_query($connc, $query);
                echo mysqli_error($connc);
                
                
            }
        } else {
            //si esta desmarcado actualizamos el documento como no obligatorio
            $query = "UPDATE documento SET obligatorio=0 WHERE imp_exp_id_imp_exp='$nro_orden' and tipo_documento_id_tipodoc=1";
            echo $query = "UPDATE documento SET obligatorio=0 WHERE imp_exp_id_imp_exp='$nro_orden' and tipo_documento_id_tipodoc=1";
                $resultQuery = mysqli_query($connc, $query);
        }


        if (isset($_POST['checkpl'])) {
            if ($_FILES['packingList']['name']!=null) {
                $tipoArchivo = $_FILES['packingList']['type'];
                $nombreArchivo = $_FILES['packingList']['name'];
                $tamanoArchivo = $_FILES['packingList']['size'];

                $imagenSubida = fopen($_FILES['packingList']['tmp_name'], 'r');
                $binariosImagen = fread($imagenSubida, $tamanoArchivo);

                //cantidad de páginas
                $count = 0;

                $regex  = "/\/Count\s+(\d+)/";
                $regex2 = "/\/Page\W*(\d+)/";
                $regex3 = "/\/N\s+(\d+)/";

                if (preg_match_all($regex, $binariosImagen, $matches))
                    $count = max($matches);

                $count= $count[0];


                $binariosImagen = mysqli_escape_string($connc, $binariosImagen);
                $query = "UPDATE documento SET nom_documento ='$nombreArchivo', documento = '$binariosImagen', formato_doc='$tipoArchivo'
                obligatorio=2, nro_paginas=$count WHERE imp_exp_id_imp_exp='$nro_orden' and tipo_documento_id_tipodoc=2";
                $resultQuery = mysqli_query($connc, $query);
            }
        } else {
            //si esta desmarcado actualizamos el documento como no obligatorio
            $query = "UPDATE documento SET obligatorio=0 WHERE imp_exp_id_imp_exp='$nro_orden' and tipo_documento_id_tipodoc=2";
                $resultQuery = mysqli_query($connc, $query);
        }

        
        if (isset($_POST['checkco'])) {
            if ($_FILES['certificadoOrigen']['name']!=null) {
                $tipoArchivo = $_FILES['certificadoOrigen']['type'];
                $nombreArchivo = $_FILES['certificadoOrigen']['name'];
                $tamanoArchivo = $_FILES['certificadoOrigen']['size'];

                $imagenSubida = fopen($_FILES['certificadoOrigen']['tmp_name'], 'r');
                $binariosImagen = fread($imagenSubida, $tamanoArchivo);

                //cantidad de páginas
                $count = 0;

                $regex  = "/\/Count\s+(\d+)/";
                $regex2 = "/\/Page\W*(\d+)/";
                $regex3 = "/\/N\s+(\d+)/";

                if (preg_match_all($regex, $binariosImagen, $matches))
                    $count = max($matches);

                $count= $count[0];


                $binariosImagen = mysqli_escape_string($connc, $binariosImagen);
                $query = "UPDATE documento SET nom_documento ='$nombreArchivo', documento = '$binariosImagen', formato_doc='$tipoArchivo'
                obligatorio=2, nro_paginas=$count WHERE imp_exp_id_imp_exp='$nro_orden' and tipo_documento_id_tipodoc=3";
                $resultQuery = mysqli_query($connc, $query);
            }
        } else {
            //si esta desmarcado actualizamos el documento como no obligatorio
            $query = "UPDATE documento SET obligatorio=0 WHERE imp_exp_id_imp_exp='$nro_orden' and tipo_documento_id_tipodoc=3";
                $resultQuery = mysqli_query($connc, $query);
        }


        if (isset($_POST['checkdt'])) {
            if ($_FILES['documentoTransporte']['name']!=null) {
                $tipoArchivo = $_FILES['documentoTransporte']['type'];
                $nombreArchivo = $_FILES['documentoTransporte']['name'];
                $tamanoArchivo = $_FILES['documentoTransporte']['size'];

                $imagenSubida = fopen($_FILES['documentoTransporte']['tmp_name'], 'r');
                $binariosImagen = fread($imagenSubida, $tamanoArchivo);

                //cantidad de páginas
                $count = 0;

                $regex  = "/\/Count\s+(\d+)/";
                $regex2 = "/\/Page\W*(\d+)/";
                $regex3 = "/\/N\s+(\d+)/";

                if (preg_match_all($regex, $binariosImagen, $matches))
                    $count = max($matches);

                $count= $count[0];


                $binariosImagen = mysqli_escape_string($connc, $binariosImagen);
                $query = "UPDATE documento SET nom_documento ='$nombreArchivo', documento = '$binariosImagen', formato_doc='$tipoArchivo'
                obligatorio=2, nro_paginas=$count WHERE imp_exp_id_imp_exp='$nro_orden' and tipo_documento_id_tipodoc=4";
                $resultQuery = mysqli_query($connc, $query);
            }
        } else {
            //si esta desmarcado actualizamos el documento como no obligatorio
            $query = "UPDATE documento SET obligatorio=0 WHERE imp_exp_id_imp_exp='$nro_orden' and tipo_documento_id_tipodoc=4";
                $resultQuery = mysqli_query($connc, $query);
        }
        
        if (isset($_POST['checkps'])) {
            if ($_FILES['polizaSeguro']['name']!=null) {
                $tipoArchivo = $_FILES['polizaSeguro']['type'];
                $nombreArchivo = $_FILES['polizaSeguro']['name'];
                $tamanoArchivo = $_FILES['polizaSeguro']['size'];

                $imagenSubida = fopen($_FILES['polizaSeguro']['tmp_name'], 'r');
                $binariosImagen = fread($imagenSubida, $tamanoArchivo);

                //cantidad de páginas
                $count = 0;

                $regex  = "/\/Count\s+(\d+)/";
                $regex2 = "/\/Page\W*(\d+)/";
                $regex3 = "/\/N\s+(\d+)/";

                if (preg_match_all($regex, $binariosImagen, $matches))
                    $count = max($matches);

                $count= $count[0];


                $binariosImagen = mysqli_escape_string($connc, $binariosImagen);
                $query = "UPDATE documento SET nom_documento ='$nombreArchivo', documento = '$binariosImagen', formato_doc='$tipoArchivo'
                obligatorio=2, nro_paginas=$count WHERE imp_exp_id_imp_exp='$nro_orden' and tipo_documento_id_tipodoc=5";
                $resultQuery = mysqli_query($connc, $query);
            }
        } else {
            //si esta desmarcado actualizamos el documento como no obligatorio
            $query = "UPDATE documento SET obligatorio=0 WHERE imp_exp_id_imp_exp='$nro_orden' and tipo_documento_id_tipodoc=5";
                $resultQuery = mysqli_query($connc, $query);
        }

        if (isset($_POST['checko'])) {
            if ($_FILES['newOtroImp']['name']!=null) {
                $tipoArchivo = $_FILES['newOtroImp']['type'];
                $nombreArchivo = $_FILES['newOtroImp']['name'];
                $tamanoArchivo = $_FILES['newOtroImp']['size'];

                $imagenSubida = fopen($_FILES['newOtroImp']['tmp_name'], 'r');
                $binariosImagen = fread($imagenSubida, $tamanoArchivo);

                //cantidad de páginas
                $count = 0;

                $regex  = "/\/Count\s+(\d+)/";
                $regex2 = "/\/Page\W*(\d+)/";
                $regex3 = "/\/N\s+(\d+)/";

                if (preg_match_all($regex, $binariosImagen, $matches))
                    $count = max($matches);

                $count= $count[0];


                $binariosImagen = mysqli_escape_string($connc, $binariosImagen);
                $query = "UPDATE documento SET nom_documento ='$nombreArchivo', documento = '$binariosImagen', formato_doc='$tipoArchivo'
                obligatorio=2, nro_paginas=$count WHERE imp_exp_id_imp_exp='$nro_orden' and tipo_documento_id_tipodoc=6";
                $resultQuery = mysqli_query($connc, $query);
            }
        } else {
            //si esta desmarcado actualizamos el documento como no obligatorio
            $query = "UPDATE documento SET obligatorio=0 WHERE imp_exp_id_imp_exp='$nro_orden' and tipo_documento_id_tipodoc=6";
                $resultQuery = mysqli_query($connc, $query);
        }

        $_SESSION['message'] = 'Importación modificada exitosamente';
        $_SESSION['message_type'] = 'Exitoso';
        echo "<script> window.location='../../pages/general/exportaciones.php?pagina=1'; </script>";
       
    } else if ($tipoUsu == 3) {
        $observaciones = $_POST['newobsImp'];
        $reserva = $_POST['newReservaImp'];
        $edt = $_POST['newEdtImp'];
        $eta = $_POST['newEtaImp'];
        $ndocumento = $_POST['newNroDocImp'];
        $fechadocumento = $_POST['newFechaDocImp'];
        $pol = $_POST['newEmbarquePuertoAereoImp'];
        $pod = $_POST['newDesembarquePuertoAereoImp'];
        $mercaderia = $_POST['newMercaderiaImp']; //otra tabla
        $categoria = $_POST['newViaTransporteImp']; //otra tabla
        //echo $categoria;
        //  $subcategoria = $_POST['newTipoEmbarqueImp']; //otra tabla
        $bultos = $_POST['newCantBultosImp'];
        $peso = $_POST['newPesoImp'];
        $volumen = $_POST['newVolumenImp'];
        $ncontendor = $_POST['newNroContenedorImp'];
        $tipocontenedor = $_POST['newTipoContenedorImp'];

         //update de importacion/exportación
         $queryUpdateImpo = "UPDATE imp_exp SET observaciones = '$observaciones', nro_reserva= $reserva, fecha_edt='$edt', fecha_eta='$eta', nro_doctrasporte=$ndocumento,
         fecha_doctrasporte='$fechadocumento', puerto_areo_embarque='$pol', puerto_areo_desembarque='$pod', cant_bultos=$bultos, peso_estimado=$peso, vol_estimado=$volumen,
         nro_contenedor=$ncontendor, tipo_contenedor='$tipocontenedor' WHERE id_imp_exp='$nro_orden'";
         $resultImpo = mysqli_query($connc, $queryUpdateImpo);
         
         
         //update de mercaderia
         $queryUpdateMerca = "UPDATE mercaderia SET descripcion = '$mercaderia', categoria='$categoria' WHERE imp_exp_id_imp_exp='$nro_orden'";
         $resultMerca = mysqli_query($connc, $queryUpdateMerca);
 
         if (isset($_POST['checkci'])) {
            
            if ($_FILES['comercialInvoice']['name']!=null) {
                
                $tipoArchivo = $_FILES['comercialInvoice']['type'];
                $nombreArchivo = $_FILES['comercialInvoice']['name'];
                $tamanoArchivo = $_FILES['comercialInvoice']['size'];

                $imagenSubida = fopen($_FILES['comercialInvoice']['tmp_name'], 'r');
                $binariosImagen = fread($imagenSubida, $tamanoArchivo);

                //cantidad de páginas
                $count = 0;

                $regex  = "/\/Count\s+(\d+)/";
                $regex2 = "/\/Page\W*(\d+)/";
                $regex3 = "/\/N\s+(\d+)/";

                if (preg_match_all($regex, $binariosImagen, $matches))
                    $count = max($matches);

                $count= $count[0];


                $binariosImagen = mysqli_escape_string($connc, $binariosImagen);
                $query = "UPDATE documento SET nom_documento ='$nombreArchivo', documento = '$binariosImagen',
                obligatorio=2, nro_paginas=$count WHERE imp_exp_id_imp_exp='$nro_orden' and tipo_documento_id_tipodoc=1";
                $resultQuery = mysqli_query($connc, $query);
                echo mysqli_error($connc);
                
                
            }
        } else {
            //si esta desmarcado actualizamos el documento como no obligatorio
            $query = "UPDATE documento SET obligatorio=0 WHERE imp_exp_id_imp_exp='$nro_orden' and tipo_documento_id_tipodoc=1";
            echo $query = "UPDATE documento SET obligatorio=0 WHERE imp_exp_id_imp_exp='$nro_orden' and tipo_documento_id_tipodoc=1";
                $resultQuery = mysqli_query($connc, $query);
        }


        if (isset($_POST['checkpl'])) {
            if ($_FILES['packingList']['name']!=null) {
                $tipoArchivo = $_FILES['packingList']['type'];
                $nombreArchivo = $_FILES['packingList']['name'];
                $tamanoArchivo = $_FILES['packingList']['size'];

                $imagenSubida = fopen($_FILES['packingList']['tmp_name'], 'r');
                $binariosImagen = fread($imagenSubida, $tamanoArchivo);

                //cantidad de páginas
                $count = 0;

                $regex  = "/\/Count\s+(\d+)/";
                $regex2 = "/\/Page\W*(\d+)/";
                $regex3 = "/\/N\s+(\d+)/";

                if (preg_match_all($regex, $binariosImagen, $matches))
                    $count = max($matches);

                $count= $count[0];


                $binariosImagen = mysqli_escape_string($connc, $binariosImagen);
                $query = "UPDATE documento SET nom_documento ='$nombreArchivo', documento = '$binariosImagen', formato_doc='$tipoArchivo'
                obligatorio=2, nro_paginas=$count WHERE imp_exp_id_imp_exp='$nro_orden' and tipo_documento_id_tipodoc=2";
                $resultQuery = mysqli_query($connc, $query);
            }
        } else {
            //si esta desmarcado actualizamos el documento como no obligatorio
            $query = "UPDATE documento SET obligatorio=0 WHERE imp_exp_id_imp_exp='$nro_orden' and tipo_documento_id_tipodoc=2";
                $resultQuery = mysqli_query($connc, $query);
        }

        
        if (isset($_POST['checkco'])) {
            if ($_FILES['certificadoOrigen']['name']!=null) {
                $tipoArchivo = $_FILES['certificadoOrigen']['type'];
                $nombreArchivo = $_FILES['certificadoOrigen']['name'];
                $tamanoArchivo = $_FILES['certificadoOrigen']['size'];

                $imagenSubida = fopen($_FILES['certificadoOrigen']['tmp_name'], 'r');
                $binariosImagen = fread($imagenSubida, $tamanoArchivo);

                //cantidad de páginas
                $count = 0;

                $regex  = "/\/Count\s+(\d+)/";
                $regex2 = "/\/Page\W*(\d+)/";
                $regex3 = "/\/N\s+(\d+)/";

                if (preg_match_all($regex, $binariosImagen, $matches))
                    $count = max($matches);

                $count= $count[0];


                $binariosImagen = mysqli_escape_string($connc, $binariosImagen);
                $query = "UPDATE documento SET nom_documento ='$nombreArchivo', documento = '$binariosImagen', formato_doc='$tipoArchivo'
                obligatorio=2, nro_paginas=$count WHERE imp_exp_id_imp_exp='$nro_orden' and tipo_documento_id_tipodoc=3";
                $resultQuery = mysqli_query($connc, $query);
            }
        } else {
            //si esta desmarcado actualizamos el documento como no obligatorio
            $query = "UPDATE documento SET obligatorio=0 WHERE imp_exp_id_imp_exp='$nro_orden' and tipo_documento_id_tipodoc=3";
                $resultQuery = mysqli_query($connc, $query);
        }


        if (isset($_POST['checkdt'])) {
            if ($_FILES['documentoTransporte']['name']!=null) {
                $tipoArchivo = $_FILES['documentoTransporte']['type'];
                $nombreArchivo = $_FILES['documentoTransporte']['name'];
                $tamanoArchivo = $_FILES['documentoTransporte']['size'];

                $imagenSubida = fopen($_FILES['documentoTransporte']['tmp_name'], 'r');
                $binariosImagen = fread($imagenSubida, $tamanoArchivo);

                //cantidad de páginas
                $count = 0;

                $regex  = "/\/Count\s+(\d+)/";
                $regex2 = "/\/Page\W*(\d+)/";
                $regex3 = "/\/N\s+(\d+)/";

                if (preg_match_all($regex, $binariosImagen, $matches))
                    $count = max($matches);

                $count= $count[0];


                $binariosImagen = mysqli_escape_string($connc, $binariosImagen);
                $query = "UPDATE documento SET nom_documento ='$nombreArchivo', documento = '$binariosImagen', formato_doc='$tipoArchivo'
                obligatorio=2, nro_paginas=$count WHERE imp_exp_id_imp_exp='$nro_orden' and tipo_documento_id_tipodoc=4";
                $resultQuery = mysqli_query($connc, $query);
            }
        } else {
            //si esta desmarcado actualizamos el documento como no obligatorio
            $query = "UPDATE documento SET obligatorio=0 WHERE imp_exp_id_imp_exp='$nro_orden' and tipo_documento_id_tipodoc=4";
                $resultQuery = mysqli_query($connc, $query);
        }

        if (isset($_POST['checko'])) {
            if ($_FILES['newOtroImp']['name']!=null) {
                $tipoArchivo = $_FILES['newOtroImp']['type'];
                $nombreArchivo = $_FILES['newOtroImp']['name'];
                $tamanoArchivo = $_FILES['newOtroImp']['size'];

                $imagenSubida = fopen($_FILES['newOtroImp']['tmp_name'], 'r');
                $binariosImagen = fread($imagenSubida, $tamanoArchivo);

                //cantidad de páginas
                $count = 0;

                $regex  = "/\/Count\s+(\d+)/";
                $regex2 = "/\/Page\W*(\d+)/";
                $regex3 = "/\/N\s+(\d+)/";

                if (preg_match_all($regex, $binariosImagen, $matches))
                    $count = max($matches);

                $count= $count[0];


                $binariosImagen = mysqli_escape_string($connc, $binariosImagen);
                $query = "UPDATE documento SET nom_documento ='$nombreArchivo', documento = '$binariosImagen', formato_doc='$tipoArchivo'
                obligatorio=2, nro_paginas=$count WHERE imp_exp_id_imp_exp='$nro_orden' and tipo_documento_id_tipodoc=6";
                $resultQuery = mysqli_query($connc, $query);
            }
        } else {
            //si esta desmarcado actualizamos el documento como no obligatorio
            $query = "UPDATE documento SET obligatorio=0 WHERE imp_exp_id_imp_exp='$nro_orden' and tipo_documento_id_tipodoc=6";
                $resultQuery = mysqli_query($connc, $query);
        }

        $_SESSION['message'] = 'Importación modificada exitosamente';
        $_SESSION['message_type'] = 'Exitoso';
        echo "<script> window.location='../../pages/general/exportaciones.php?pagina=1'; </script>";

    } else if ($tipoUsu == 5) {
        $observaciones = $_POST['newobsImp'];
        //otros datos
        $link = $_POST['newLinkImp']; //otra tabla
        $nsegumiento = $_POST['newNroSegImp']; //otra tabla

         //update de importacion/exportación
         $queryUpdateImpo = "UPDATE imp_exp SET observaciones = '$observaciones' WHERE id_imp_exp='$nro_orden'";
         $resultImpo = mysqli_query($connc, $queryUpdateImpo);
          
         //update de seguimiento
         $queryUpdateSegui = "UPDATE seguimiento SET link_seguimiento = '$link', nro_seguimiento='$nsegumiento' WHERE imp_exp_id_imp_exp='$nro_orden'";
         $resultSegui = mysqli_query($connc, $queryUpdateSegui);
 
         $_SESSION['message'] = 'Importación modificada exitosamente';
         $_SESSION['message_type'] = 'Exitoso';
         echo "<script> window.location='../../pages/general/exportaciones.php?pagina=1'; </script>";

    } else if ($tipoUsu == 7) {
        $observaciones = $_POST['newobsImp'];
        $npoliza = $_POST['newNroPolizaImp'];
        $fechapoliza = $_POST['newFechaPolizaImp'];
        $montopoliza = $_POST['newPrimaPolizaImp'];

        //update de importacion/exportación
        $queryUpdateImpo = "UPDATE imp_exp SET observaciones = '$observaciones', nro_poliza=$npoliza, fecha_poliza='$fechapoliza', monto_prima_poliza=$montopoliza WHERE id_imp_exp='$nro_orden'";
        $resultImpo = mysqli_query($connc, $queryUpdateImpo);

        if (isset($_POST['checkps'])) {
            if ($_FILES['polizaSeguro']['name']!=null) {
                $tipoArchivo = $_FILES['polizaSeguro']['type'];
                $nombreArchivo = $_FILES['polizaSeguro']['name'];
                $tamanoArchivo = $_FILES['polizaSeguro']['size'];

                $imagenSubida = fopen($_FILES['polizaSeguro']['tmp_name'], 'r');
                $binariosImagen = fread($imagenSubida, $tamanoArchivo);

                //cantidad de páginas
                $count = 0;

                $regex  = "/\/Count\s+(\d+)/";
                $regex2 = "/\/Page\W*(\d+)/";
                $regex3 = "/\/N\s+(\d+)/";

                if (preg_match_all($regex, $binariosImagen, $matches))
                    $count = max($matches);

                $count= $count[0];


                $binariosImagen = mysqli_escape_string($connc, $binariosImagen);
                $query = "UPDATE documento SET nom_documento ='$nombreArchivo', documento = '$binariosImagen', formato_doc='$tipoArchivo'
                obligatorio=2, nro_paginas=$count WHERE imp_exp_id_imp_exp='$nro_orden' and tipo_documento_id_tipodoc=5";
                $resultQuery = mysqli_query($connc, $query);
            }
        } else {
            //si esta desmarcado actualizamos el documento como no obligatorio
            $query = "UPDATE documento SET obligatorio=0 WHERE imp_exp_id_imp_exp='$nro_orden' and tipo_documento_id_tipodoc=5";
                $resultQuery = mysqli_query($connc, $query);
        }

        $_SESSION['message'] = 'Importación modificada exitosamente';
         $_SESSION['message_type'] = 'Exitoso';
         echo "<script> window.location='../../pages/general/exportaciones.php?pagina=1'; </script>";

    }
} else {
    $_SESSION['message'] = 'Error';
    $_SESSION['message_type'] = 'Error';
    echo "<script> window.location='../../pages/general/exportaciones.php?pagina=1'; </script>";
}