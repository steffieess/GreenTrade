<?php

require '../mantenedor/mantenedor.php';

if (isset($_GET['id_imp_exp'])) {
    $id_imp_exp = $_GET['id_imp_exp'];
    $queryeditImp = "SELECT * FROM imp_exp i INNER JOIN mercaderia m ON i.id_imp_exp = m.imp_exp_id_imp_exp 
    INNER JOIN subcategoria s ON m.subcategoria_id_subcategoria = s.id_subcategoria 
    INNER JOIN categoria c ON s.categoria_id_categoria = c.id_categoria 
    INNER JOIN seguimiento se ON se.imp_exp_id_imp_exp = i.id_imp_exp WHERE i.id_imp_exp = '$id_imp_exp' AND estado != 'Borrado'";
    $queryeditImpList = mysqli_query($connc, $queryeditImp);

        date_default_timezone_set('America/Santiago');
        $dia = date('d');
        $mes = date('m');
        $anio = date('Y');
        $fecha = $dia.'_'.$mes.'_'.$anio;
        $salida = "";
        $salida .= "<body style='border: 0.1pt solid #ccc'>  <table>";
        $salida .= "<thead> <th>Nro Orden</th> <th>Proveedor</th> <th>Transportadora</th> <th>Incoterm</th> <th>Origen</th> <th>Destino</th> 
        <th>Observaciones</th> <th>Estado</th> <th>Nro Reserva</th> <th>Fecha ETD</th> <th>Fecha ETA</th> <th>Nro Documento Transporte</th> 
        <th>Fecha Documento Transporte</th> <th>POL / AOL</th> <th>POD / AOD</th> <th>Categoria</th> <th>Mercaderia</th> <th>Tipo papel</th> 
        <th>Peso total papel</th> <th>Cantidad Bultos</th> <th>Peso Estimado</th> <th>Volumen Estimado</th> <th>Nro Contenedor</th> 
        <th>Tipo de Contenedor</th> <th>Link Seguimiento</th> <th>Nro Seguimiento</th> <th>Nro Poliza Seguro</th>
        <th>Fecha Poliza Seguro</th> <th>Monto Prima Poliza Seguro</th> </thead>";
        while ($dataImpExp = mysqli_fetch_array($queryeditImpList)) {
            $id_imp_exp = $dataImpExp['id_imp_exp'];
            $nOrden = $dataImpExp['nro_orden'];
            $usuproveedor = $dataImpExp['usuproveedor'];
            $usutrasportadora = $dataImpExp['usutrasportadora'];
            $origen = $dataImpExp['origen'];
            $destino = $dataImpExp['destino'];
            $incoterm = $dataImpExp['incoterm'];
            $observaciones = $dataImpExp['observaciones'];
            $reserva = $dataImpExp['nro_reserva'];
            $fechaedt = $dataImpExp['fecha_edt'];
            $fechaeta = $dataImpExp['fecha_eta'];
            $ndoctrasporte = $dataImpExp['nro_doctrasporte'];
            $fechadoctrasporte = $dataImpExp['fecha_doctrasporte'];
            $pol = $dataImpExp['puerto_areo_embarque'];
            $pod = $dataImpExp['puerto_areo_desembarque'];
            $bultos = $dataImpExp['cant_bultos'];
            $peso = $dataImpExp['peso_estimado'];
            $volumen = $dataImpExp['vol_estimado'];
            $ncontenedor = $dataImpExp['nro_contenedor'];
            $tipocontenedor = $dataImpExp['tipo_contenedor'];
            $npoliza = $dataImpExp['nro_poliza'];
            $fechapoliza = $dataImpExp['fecha_poliza'];
            $montopoliza = $dataImpExp['monto_prima_poliza'];

            $estado = $dataImpExp['estado'];

            $tipo_papel = $dataImpExp['tipo_papel'];
            $peso_total_papel = $dataImpExp['peso_total_papel'];

            $link_seguimiento = $dataImpExp['link_seguimiento'];
            $nro_seguimiento = $dataImpExp['nro_seguimiento'];

            $categoria = $dataImpExp['categoria'];
            $subcategoria = $dataImpExp['subcategoria'];
            
            $salida .= "<tr> <td>".$nOrden."</td> <td>".$usuproveedor."</td> <td>".$usutrasportadora."</td> <td>".$incoterm."</td> 
            <td>".$origen."</td> <td>".$destino."</td> <td>".$observaciones."</td> <td>".$estado."</td> <td>".$reserva."</td> <td>".$fechaedt."</td> 
            <td>".$fechaeta."</td> <td>".$ndoctrasporte."</td> <td>".$fechadoctrasporte."</td> <td>".$pol."</td> <td>".$pod."</td> 
            <td>".$categoria."</td> <td>".$subcategoria."</td> <td>".$tipo_papel."</td> <td>".$peso_total_papel."</td> 
            <td>".$bultos."</td> <td>".$peso."</td> <td>".$volumen."</td> <td>".$ncontenedor."</td> <td>".$tipocontenedor."</td> 
            <td>".$link_seguimiento."</td> <td>".$nro_seguimiento."</td> <td>".$npoliza."</td> <td>".$fechapoliza."</td> <td>".$montopoliza."</td> </tr>";
            $filename = $nOrden."_".$fecha.".xls";   
        }
        $salida .= "</table></body>";
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Transfer-Encoding: binary");
        header("Pragma: no-cache");
        header("Expires: 0");
        echo $salida;
}        