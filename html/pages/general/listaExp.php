<!-- header section starts  -->
<?php include("../../../includes/header.php"); ?>
<!-- header section ends -->

<?php
if (isset($_GET['id_imp_exp'])) {
    $id_imp_exp = $_GET['id_imp_exp'];
    $queryeditImp = "SELECT * FROM imp_exp WHERE id_imp_exp = '$id_imp_exp'";
    $queryeditImpList = mysqli_query($connc, $queryeditImp);

    if (mysqli_num_rows($queryeditImpList) == 1) {
        $row = mysqli_fetch_array($queryeditImpList);
        $nOrden = $row['nro_orden'];
        $origen = $row['origen'];
        $destino = $row['destino'];
        $incoterm = $row['incoterm'];
        $observaciones = $row['observaciones'];
        $reserva = $row['nro_reserva'];
        $fechaedt = $row['fecha_edt'];
        $fechaeta = $row['fecha_eta'];
        $ndoctrasporte = $row['nro_doctrasporte'];
        $fechadoctrasporte = $row['fecha_doctrasporte'];
        $pol = $row['puerto_areo_embarque'];
        $pod = $row['puerto_areo_desembarque'];
        $bultos = $row['cant_bultos'];
        $peso = $row['peso_estimado'];
        $volumen = $row['vol_estimado'];
        $ncontenedor = $row['nro_contenedor'];
        $tipocontenedor = $row['tipo_contenedor'];
        $npoliza = $row['nro_poliza'];
        $fechapoliza = $row['fecha_poliza'];
        $montopoliza = $row['monto_prima_poliza'];
    }

    $queryMercaderia = "SELECT * FROM mercaderia m INNER JOIN subcategoria s ON m.subcategoria_id_subcategoria = s.id_subcategoria INNER JOIN categoria c ON s.categoria_id_categoria = c.id_categoria WHERE imp_exp_id_imp_exp = '$id_imp_exp'";
    $queryeditMercaderia = mysqli_query($connc, $queryMercaderia);
    if (mysqli_num_rows($queryeditMercaderia) == 1) {
        $row = mysqli_fetch_array($queryeditMercaderia);
        //echo mysqli_num_rows($queryeditMercaderia);
        $subcategoria = $row['subcategoria'];
        $id_categoria = $row['id_categoria'];
        $categoria = $row['categoria'];
    }

    $querySeguimiento = "SELECT * FROM seguimiento WHERE imp_exp_id_imp_exp = '$id_imp_exp'";
    $queryeditSeguimiento = mysqli_query($connc, $querySeguimiento);
    if (mysqli_num_rows($queryeditSeguimiento) == 1) {
        $row = mysqli_fetch_array($queryeditSeguimiento);
        $link = $row['link_seguimiento'];
        $nseguimiento = $row['nro_seguimiento'];
    }


    $queryDoc1 = "SELECT * FROM documento WHERE imp_exp_id_imp_exp = '$id_imp_exp' and tipo_documento_id_tipodoc=1";
    $queryeditDoc1 = mysqli_query($connc, $queryDoc1);
    $nom_documento1 = "";
    $documento1 = "";
    $tipo1 = "";
    $id1= "";
    if (mysqli_num_rows($queryeditDoc1) == 1) {
        $row = mysqli_fetch_array($queryeditDoc1);
        $obligatorio1 = $row['obligatorio'];
        if($obligatorio1==1 or $obligatorio1==0){
            $variable1 = 'nada';
        }
        else{
            $variable1 = 'todo';
            $nom_documento1 = $row['nom_documento'];
            $documento1 = $row['documento'];
            $tipo1 = "application/pdf";
            $id1 = $row['id_documento'];
        }
    }

    $queryDoc2 = "SELECT * FROM documento WHERE imp_exp_id_imp_exp = '$id_imp_exp' and tipo_documento_id_tipodoc=2";
    $queryeditDoc2 = mysqli_query($connc, $queryDoc2);
    $nom_documento2 = "";
    $documento2 = "";
    $tipo2 = "";
    $id2= "";
    if (mysqli_num_rows($queryeditDoc2) == 1) {
        $row = mysqli_fetch_array($queryeditDoc2);
        $obligatorio2 = $row['obligatorio'];
        if($obligatorio2==1 or $obligatorio2==0){
            $variable2 = 'nada';
        }
        else{
            $variable2 = 'todo';
            $nom_documento2 = $row['nom_documento'];
            $documento2 = $row['documento'];
            $tipo2 = "application/pdf";
            $id2 = $row['id_documento'];
        }
    }

    $queryDoc3 = "SELECT * FROM documento WHERE imp_exp_id_imp_exp = '$id_imp_exp' and tipo_documento_id_tipodoc=3";
    $queryeditDoc3 = mysqli_query($connc, $queryDoc3);
    $nom_documento3 = "";
    $documento3 = "";
    $tipo3 = "";
    $id3= "";
    if (mysqli_num_rows($queryeditDoc3) == 1) {
        $row = mysqli_fetch_array($queryeditDoc3);
        $obligatorio3 = $row['obligatorio'];
        if($obligatorio3==1 or $obligatorio3==0){
            $variable3 = 'nada';
        }
        else{
            $variable3 = 'todo';
            $nom_documento3 = $row['nom_documento'];
            $documento3 = $row['documento'];
            $tipo3 = "application/pdf";
            $id3 = $row['id_documento'];
        }
    }

    $queryDoc4 = "SELECT * FROM documento WHERE imp_exp_id_imp_exp = '$id_imp_exp' and tipo_documento_id_tipodoc=4";
    $queryeditDoc4 = mysqli_query($connc, $queryDoc4);
    $nom_documento4 = "";
    $documento4 = "";
    $tipo4 = "";
    $id4= "";
    if (mysqli_num_rows($queryeditDoc4) == 1) {
        $row = mysqli_fetch_array($queryeditDoc4);
        $obligatorio4 = $row['obligatorio'];
        if($obligatorio4==1 or $obligatorio4==0){
            $variable4 = 'nada';
        }
        else{
            $variable4 = 'todo';
            $nom_documento4 = $row['nom_documento'];
            $documento4 = $row['documento'];
            $tipo4 = "application/pdf";
            $id4 = $row['id_documento'];
        }
    }

    $queryDoc5 = "SELECT * FROM documento WHERE imp_exp_id_imp_exp = '$id_imp_exp' and tipo_documento_id_tipodoc=5";
    $queryeditDoc5 = mysqli_query($connc, $queryDoc5);
    $nom_documento5 = "";
    $documento5 = "";
    $tipo5 = "";
    $id5= "";
    if (mysqli_num_rows($queryeditDoc5) == 1) {
        $row = mysqli_fetch_array($queryeditDoc5);
        $obligatorio5 = $row['obligatorio'];
        if($obligatorio5==1 or $obligatorio5==0){
            $variable5 = 'nada';
        }
        else{
            $variable5 = 'todo';
            $nom_documento5 = $row['nom_documento'];
            $documento5 = $row['documento'];
            $tipo5 = "application/pdf";
            $id5 = $row['id_documento'];
        }
    }

    $queryDoc6 = "SELECT * FROM documento WHERE imp_exp_id_imp_exp = '$id_imp_exp' and tipo_documento_id_tipodoc=6";
    $queryeditDoc6 = mysqli_query($connc, $queryDoc6);
    $nom_documento6 = "";
    $documento6 = "";
    $tipo6 = "";
    $id6= "";
    if (mysqli_num_rows($queryeditDoc6) == 1) {
        $row = mysqli_fetch_array($queryeditDoc6);
        $obligatorio6 = $row['obligatorio'];
        if($obligatorio6==1 or $obligatorio6==0){
            $variable6 = 'nada';
        }
        else{
            $variable6 = 'todo';
            $nom_documento6 = $row['nom_documento'];
            $documento6 = $row['documento'];
            $tipo6 = "application/pdf";
            $id6 = $row['id_documento'];
        }
    }

}
?>

        <script language="javascript" src="../../../js/jquery-3.6.1.min.js"></script>
		
		<script language="javascript">
			$(document).ready(function(){
				$("#cbx_estado").change(function () {
					
					$("#cbx_estado option:selected").each(function () {
						id_estado = $(this).val();
						$.post("../general/getCategoria.php", { id_estado: id_estado }, function(data){
							$("#newMercaderiaImp").html(data);
						});            
					});
				})
			});

		</script>

<!--body section starts-->

<section class="reg-import">
<h1 class="heading-title"> Editar Exportación </h1>
    <?php if ($tipoUsu == 1 || $tipoUsu == 2) : ?>
    <div>
        <form action="../../func/tools/editarExportacion.php?id_imp_exp=<?php echo $_GET['id_imp_exp'] ?>" id='editExp' class='input-group-editExp' method="POST" enctype="multipart/form-data">
            
        <div class="content">
                    <input name="xxx" id="xxx" type="hidden" class='input-field' placeholder="N° de Orden" value="<?php echo $id_imp_exp; ?>" readonly>
                </div>
                <div class="content">
                    <label for="newnroOrdenImp"><b>N° de Orden</b></label>
                    <input name="newnroOrdenImp" id="newnroOrdenImp" type="text" class='input-field' placeholder="N° de Orden" value="<?php echo $nOrden; ?>" readonly>
                </div>
                <div class="content">
                    <label for="newnpaisOrigenImp"><b>País de Origen</b></label>
                    <input name="newnpaisOrigenImp" id="newnpaisOrigenImp" type="text" class='input-field' placeholder="N° de Orden" value="<?php echo utf8_encode($origen); ?>" readonly>
                </div>
                <div class="content">
                    <label for="newnpaisDestinoImp"><b>País de Destino</b></label>
                    <input name="newnpaisDestinoImp" id="newnpaisDestinoImp" type="text" class='input-field' placeholder="N° de Orden" value="<?php echo utf8_encode($destino); ?>" readonly>
                </div>
                <div class="content">
                    <label for="newincotemImp"><b>Incotem</b></label>
                    <input name="newincotemImp" id="newincotemImp" type="text" class='input-field' placeholder="Incotem" value="<?php echo utf8_encode($incoterm); ?>" readonly>
                </div>
                <div class="content">
                    <label for="newobsImp"><b>Observaciones</b></label>
                    <input name="newobsImp" id="newobsImp"  type="text" class='input-field' placeholder="Obervaciones" autocomplete="off" value="<?php echo utf8_encode($observaciones); ?>">
                </div>
                <div class="content">
                    <label for="newReservaImp"><b>N° Reserva</b></label>
                    <input name="newReservaImp" id="newReservaImp" type="text" class='input-field' placeholder="" required autocomplete="off" value="<?php if($reserva==null){echo '';}else{echo $reserva;} ?>">
                </div>
                <div class="content">
                    <label for="newEdtImp"><b>Fecha EDT</b></label>
                    <input name="newEdtImp" id="newEdtImp" type="date" class='input-field' placeholder="" required autocomplete="off"  value="<?php if($fechaedt==null){echo '';}else{echo $fechaedt;} ?>">
                </div>
                <div class="content">
                    <label for="newEtaImp"><b>Fecha ETA</b></label>
                    <input name="newEtaImp" id="newEtaImp" type="date" class='input-field' placeholder="" required autocomplete="off"  value="<?php if($fechaeta==null){echo '';}else{echo $fechaeta;} ?>">
                </div>
                <div class="content">
                    <label for="newNroDocImp"><b>N° Documento de Transporte</b></label>
                    <input name="newNroDocImp" id="newNroDocImp" type="text" class='input-field' placeholder="" required autocomplete="off"  value="<?php if($ndoctrasporte==null){echo '';}else{echo $ndoctrasporte;} ?>">
                </div>
                <div class="content">
                    <label for="newFechaDocImp"><b>Fecha del Documento de Transporte</b></label>
                    <input name="newFechaDocImp" id="newFechaDocImp" type="date" class='input-field' placeholder="" required autocomplete="off"  value="<?php if($fechadoctrasporte==null){echo '';}else{echo $fechadoctrasporte;} ?>">
                </div>


                <div class="form-group">
                    <label for="newEmbarquePuertoAereoImp"><b>POL / AOL</b></label>
                    <input name="newEmbarquePuertoAereoImp" id="newEmbarquePuertoAereoImp" type="text" class='input-field' placeholder="" required autocomplete="off"  value="<?php if($pol==null){echo '';}else{echo utf8_encode($pol);} ?>">

                </div>

                <div class="form-group">
                    <label for="newDesembarquePuertoAereoImp"><b>POD / AOD</b></label>
                    <input name="newDesembarquePuertoAereoImp" id="newDesembarquePuertoAereoImp" type="text" class='input-field' placeholder="" required autocomplete="off"  value="<?php if($pod==null){echo '';}else{echo utf8_encode($pod);} ?>">

                </div>

                <?php
                $sqlCat = ("SELECT * FROM categoria");
                $resultado = mysqli_query($connc, $sqlCat);
                ?>

                <div class="form-group">
                    <div> <label for="newMercaderiaImp"><b>Categoría</b></label> 
                        <select class="form-control" name="cbx_estado" id="cbx_estado">
                        <?php if($subcategoria == NULL) {?>
                        <option value="">Seleccionar categoría</option>
                
                        <?php while($row = $resultado->fetch_assoc()) { ?>
                            <option value="<?php echo $row['id_categoria']; ?>"><?php echo utf8_encode($row['categoria']); ?></option>

                        <?php } ?>
                        <?php }else{ ?>
                                <?php while($row = $resultado->fetch_assoc()) { ?>
                                    <?php if($row['id_categoria'] == $id_categoria) { ?>
                                        <option value="<?php echo $row['id_categoria']; ?>" selected><?php echo utf8_encode($row['categoria']); ?></option>
                                <?php }else{ ?>
                                    <option value="<?php echo $row['id_categoria']; ?>"><?php echo utf8_encode($row['categoria']); ?></option>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                
                
                <div> 
                    <label for="newMercaderiaImp"><b>Mercadería</b></label> 
                    <?php if(!isset($subcategoria)) {?>
                    <select class="form-control" name="newMercaderiaImp" id="newMercaderiaImp"></select>
                    <?php }else{ ?>

                        <?php
                        $sqlSub = ("SELECT * FROM subcategoria WHERE categoria_id_categoria = '$id_categoria'");
                        $dataSub = mysqli_query($connc, $sqlSub);
                        ?>

                <div class="form-group">
                    <select class="form-control" name="newMercaderiaImp" id="newMercaderiaImp">

                        <?php while ($rowSub = mysqli_fetch_array($dataSub)){ ?>
                            <?php if ($subcategoria == $rowSub['subcategoria']) { ?>

                            <option class="form-control" value="<?php echo $rowSub['id_subcategoria']; ?>" selected>
                            <?php echo utf8_encode($rowSub['subcategoria']);?>
                            </option>

                            <?php } else { ?> 
                                <option class="form-control" value="<?php echo $rowSub['id_subcategoria']; ?>" >
                            <?php echo utf8_encode($rowSub['subcategoria']);?>
                            </option>
                            <?php } ?>
                        <?php } ?>

                    </select>
                </div>
                    <?php } ?>
                </div>

                <div class="content">
                    <label for="newCantBultosImp"><b>Cantidad de Bultos</b></label>
                    <input name="newCantBultosImp" id="newCantBultosImp" type="text" class='input-field' placeholder="" required autocomplete="off" value="<?php if($bultos==null){echo '';}else{echo $bultos;} ?>">
                </div>
                <div class="content">
                    <label for="newPesoImp"><b>Peso Estimado</b></label>
                    <input name="newPesoImp" id="newPesoImp" type="text" class='input-field' placeholder="" required autocomplete="off"  value="<?php if($peso==null){echo '';}else{echo $peso;} ?>">
                </div>
                <div class="content">
                    <label for="newVolumenImp"><b>Volumen Estimado</b></label>
                    <input name="newVolumenImp" id="newVolumenImp" type="text" class='input-field' placeholder="" required autocomplete="off"  value="<?php if($volumen==null){echo '';}else{echo $volumen;} ?>">
                </div>
                <div class="content">
                    <label for="newNroContenedorImp"><b>N° Contenedor</b></label>
                    <input name="newNroContenedorImp" id="newNroContenedorImp" type="text" class='input-field' placeholder="" required autocomplete="off" value="<?php if($ncontenedor==null){echo '';}else{echo $ncontenedor;} ?>">
                </div>
                <div class="content">
                    <label for="newTipoContenedorImp"><b>Tipo de Contenedor</b></label>
                    <input name="newTipoContenedorImp" id="newTipoContenedorImp" type="text" class='input-field' placeholder="" required autocomplete="off" value="<?php if($tipocontenedor==null){echo '';}else{echo utf8_encode($tipocontenedor);} ?>">
                </div>
                <div class="content">
                    
                    <span style="font-size: 15px;"><b>Commercial Invoice &emsp;&emsp;</b><input type="checkbox" name="checkci" value="" <?php if($obligatorio1!=0){ ?> checked <?php } ?> ><span style="font-size: 15px;"> Documento Obligatorio</span>
                    <?php if($variable1 !='nada'){ ?>
                        <img src="../../img/pdf.png" style="width: 100%;max-width:50px;height:70px">
                        <p><a href="cargar.php?id=<?php echo $id1; ?>" target="_blank"><?php echo utf8_encode($nom_documento1) ?></a></p>
                    <?php } ?>
                    <input type="file" name="comercialInvoice" id="comercialInvoice" accept=".pdf" class='fancy-file'>

                </div>
                <div class="content">
                    <span style="font-size: 15px;"><b>Packing List &emsp;&emsp;</b><input type="checkbox" name="checkpl" value="" <?php if($obligatorio2!=0){ ?> checked <?php } ?> ><span style="font-size: 15px;"> Documento Obligatorio</span>
                    <?php if($variable2 !='nada'){ ?>
                        <img src="../../img/pdf.png" style="width: 100%;max-width:50px;height:70px">
                        <p><a href="cargar.php?id=<?php echo $id2; ?>" target="_blank"><?php echo utf8_encode($nom_documento2) ?></a></p>
                    <?php } ?>
                    <input type="file" name="packingList" id="packingList" accept=".pdf" class='fancy-file'>

                </div>
                <div class="content">
                    <span style="font-size: 15px;"><b>Certificado de Origen &emsp;&emsp;</b><input type="checkbox" name="checkco" value="" <?php if($obligatorio3!=0){ ?> checked <?php } ?> ><span style="font-size: 15px;"> Documento Obligatorio</span>
                    <?php if($variable3 !='nada'){ ?>
                        <img src="../../img/pdf.png" style="width: 100%;max-width:50px;height:70px">
                        <p><a href="cargar.php?id=<?php echo $id3; ?>" target="_blank"><?php echo utf8_encode($nom_documento3) ?></a></p>
                    <?php } ?>
                    <input type="file" name="certificadoOrigen" id="certificadoOrigen" accept=".pdf" class='fancy-file'>
                </div>
                <div class="content">
                    <span style="font-size: 15px;"><b>Documento de Transporte &emsp;&emsp;</b><input type="checkbox" name="checkdt" value="" <?php if($obligatorio4!=0){ ?> checked <?php } ?> ><span style="font-size: 15px;"> Documento Obligatorio</span>
                    <?php if($variable4 !='nada'){ ?>
                        <img src="../../img/pdf.png" style="width: 100%;max-width:50px;height:70px">
                        <p><a href="cargar.php?id=<?php echo $id4; ?>" target="_blank"><?php echo utf8_encode($nom_documento4) ?></a></p>
                    <?php } ?>
                    <input type="file" name="documentoTransporte" id="documentoTransporte" accept=".pdf" class='fancy-file'>
                </div>
                <div class="content">
                    <span style="font-size: 15px;"><b>Póliza de Seguro &emsp;&emsp;</b><input type="checkbox" name="checkps" value="" <?php if($obligatorio5!=0){ ?> checked <?php } ?> ><span style="font-size: 15px;"> Documento Obligatorio</span>
                    <?php if($variable5 !='nada'){ ?>
                        <img src="../../img/pdf.png" style="width: 100%;max-width:50px;height:70px">
                        <p><a href="cargar.php?id=<?php echo $id5; ?>" target="_blank"><?php echo utf8_encode($nom_documento5) ?></a></p>
                    <?php } ?>
                    <input type="file" name="polizaSeguro" id="polizaSeguro" accept=".pdf" class='fancy-file'>
                </div>
                <div class="content">
                    <span style="font-size: 15px;"><b>Otros &emsp;&emsp;</b><input type="checkbox" name="checko" value="" <?php if($obligatorio6!=0){ ?> checked <?php } ?> ><span style="font-size: 15px;"> Documento Obligatorio</span>
                    <?php if($variable6 !='nada'){ ?>
                        <img src="../../img/pdf.png" style="width: 100%;max-width:50px;height:70px">
                        <p><a href="cargar.php?id=<?php echo $id6; ?>" target="_blank"><?php echo utf8_encode($nom_documento6) ?></a></p>
                    <?php } ?>
                    <input type="file" name="newOtroImp" id="newOtroImp" accept=".pdf" class='fancy-file'>
                </div>
                <div class="content">
                    <label for="newLinkImp"><b>Link Seguimiento</b></label>
                    <input name="newLinkImp" id="newLinkImp" type="text" class='input-field' placeholder="" autocomplete="off" value="<?php if($link==null){echo '';}else{echo utf8_encode($link);} ?>">
                </div>
                <div class="content">
                    <label for="newNroSegImp"><b>N° Seguimiento</b></label>
                    <input name="newNroSegImp" id="newNroSegImp" type="text" class='input-field' placeholder="" autocomplete="off" value="<?php if($nseguimiento==null){echo '';}else{echo $nseguimiento;} ?>">
                </div>

                <div class="content">
                    <label for="newNroPolizaImp"><b>N° Póliza de Seguro</b></label>
                    <input name="newNroPolizaImp" id="newNroPolizaImp" type="text" class='input-field' placeholder="" autocomplete="off" value="<?php if($npoliza==null){echo '';}else{echo $npoliza;} ?>">
                </div>
                <div class="content">
                    <label for="newFechaPolizaImp"><b>Fecha Póliza de Seguro</b></label>
                    <input name="newFechaPolizaImp" id="newFechaPolizaImp" type="date" class='input-field' placeholder="" autocomplete="off" value="<?php if($fechapoliza==null){echo '';}else{echo $fechapoliza;} ?>">
                </div>
                <div class="content">
                    <label for="newPrimaPolizaImp"><b>Monto Prima Póliza de Seguro</b></label>
                    <input name="newPrimaPolizaImp" id="newPrimaPolizaImp" type="text" class='input-field' placeholder="" autocomplete="off" value="<?php if($montopoliza==null){echo '';}else{echo $montopoliza;} ?>">
                </div>
                <div>
                    <input class="submit-btn" type="submit" value="Guardar" name="editImp">
                </div>
                <script src="../../../fancy-file/script.js"></script>
            </form>
        </div>

    <?php endif ?>


    <!--  Usuario 3 -->
    <?php if ($tipoUsu == 3) : ?>
        <div>
        <form action="../../func/tools/editarExportacion.php?id_imp_exp=<?php echo $_GET['id_imp_exp'] ?>" id='editExp' class='input-group-editExp' method="POST" enctype="multipart/form-data">
            <div class="content">
                    <input name="xxx" id="xxx" type="hidden" class='input-field' placeholder="N° de Orden" value="<?php echo $id_imp_exp; ?>" readonly>
                </div>
                <div class="content">
                    <label for="newnroOrdenImp"><b>N° de Orden</b></label>
                    <input name="newnroOrdenImp" id="newnroOrdenImp" type="text" class='input-field' placeholder="N° de Orden" value="<?php echo $nOrden; ?>" readonly>
                </div>
                <div class="content">
                    <label for="newnpaisOrigenImp"><b>País de Origen</b></label>
                    <input name="newnpaisOrigenImp" id="newnpaisOrigenImp" type="text" class='input-field' placeholder="N° de Orden" value="<?php echo utf8_encode($origen); ?>" readonly>
                </div>
                <div class="content">
                    <label for="newnpaisDestinoImp"><b>País de Destino</b></label>
                    <input name="newnpaisDestinoImp" id="newnpaisDestinoImp" type="text" class='input-field' placeholder="N° de Orden" value="<?php echo utf8_encode($destino); ?>" readonly>
                </div>
                <div class="content">
                    <label for="newincotemImp"><b>Incotem</b></label>
                    <input name="newincotemImp" id="newincotemImp" type="text" class='input-field' placeholder="Incotem" value="<?php echo utf8_encode($incoterm); ?>" readonly>
                </div>
                <div class="content">
                    <label for="newobsImp"><b>Observaciones</b></label>
                    <input name="newobsImp" id="newobsImp"  type="text" class='input-field' placeholder="Obervaciones" autocomplete="off" value="<?php echo utf8_encode($observaciones); ?>">
                </div>
                <div class="content">
                    <label for="newReservaImp"><b>N° Reserva</b></label>
                    <input name="newReservaImp" id="newReservaImp" type="text" class='input-field' placeholder="" required autocomplete="off" value="<?php if($reserva==null){echo '';}else{echo $reserva;} ?>">
                </div>
                <div class="content">
                    <label for="newEdtImp"><b>Fecha EDT</b></label>
                    <input name="newEdtImp" id="newEdtImp" type="date" class='input-field' placeholder="" required autocomplete="off"  value="<?php if($fechaedt==null){echo '';}else{echo $fechaedt;} ?>">
                </div>
                <div class="content">
                    <label for="newEtaImp"><b>Fecha ETA</b></label>
                    <input name="newEtaImp" id="newEtaImp" type="date" class='input-field' placeholder="" required autocomplete="off"  value="<?php if($fechaeta==null){echo '';}else{echo $fechaeta;} ?>">
                </div>
                <div class="content">
                    <label for="newNroDocImp"><b>N° Documento de Transporte</b></label>
                    <input name="newNroDocImp" id="newNroDocImp" type="text" class='input-field' placeholder="" required autocomplete="off"  value="<?php if($ndoctrasporte==null){echo '';}else{echo $ndoctrasporte;} ?>">
                </div>
                <div class="content">
                    <label for="newFechaDocImp"><b>Fecha del Documento de Transporte</b></label>
                    <input name="newFechaDocImp" id="newFechaDocImp" type="date" class='input-field' placeholder="" required autocomplete="off"  value="<?php if($fechadoctrasporte==null){echo '';}else{echo $fechadoctrasporte;} ?>">
                </div>
                <div class="form-group">
                    <label for="newEmbarquePuertoAereoImp"><b>POL / AOL</b></label>
                    <input name="newEmbarquePuertoAereoImp" id="newEmbarquePuertoAereoImp" type="text" class='input-field' placeholder="" required autocomplete="off"  value="<?php if($pol==null){echo '';}else{echo utf8_encode($pol);} ?>">

                </div>

                <div class="form-group">
                    <label for="newDesembarquePuertoAereoImp"><b>POD / AOD</b></label>
                    <input name="newDesembarquePuertoAereoImp" id="newDesembarquePuertoAereoImp" type="text" class='input-field' placeholder="" required autocomplete="off"  value="<?php if($pod==null){echo '';}else{echo utf8_encode($pod);} ?>">

                </div>

                <?php
                $sqlCat = ("SELECT * FROM categoria");
                $resultado = mysqli_query($connc, $sqlCat);
                ?>

                <div class="form-group">
                    <div> <label for="newMercaderiaImp"><b>Categoría</b></label> 
                        <select class="form-control" name="cbx_estado" id="cbx_estado">
                        <?php if($subcategoria == NULL) {?>
                        <option value="">Seleccionar categoría</option>
                
                        <?php while($row = $resultado->fetch_assoc()) { ?>
                            <option value="<?php echo $row['id_categoria']; ?>"><?php echo utf8_encode($row['categoria']); ?></option>

                        <?php } ?>
                        <?php }else{ ?>
                                <?php while($row = $resultado->fetch_assoc()) { ?>
                                    <?php if($row['id_categoria'] == $id_categoria) { ?>
                                        <option value="<?php echo $row['id_categoria']; ?>" selected><?php echo utf8_encode($row['categoria']); ?></option>
                                <?php }else{ ?>
                                    <option value="<?php echo $row['id_categoria']; ?>"><?php echo utf8_encode($row['categoria']); ?></option>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                
                
                <div> 
                    <label for="newMercaderiaImp"><b>Mercadería</b></label> 
                    <?php if(!isset($subcategoria)) {?>
                    <select class="form-control" name="newMercaderiaImp" id="newMercaderiaImp"></select>
                    <?php }else{ ?>

                        <?php
                        $sqlSub = ("SELECT * FROM subcategoria WHERE categoria_id_categoria = '$id_categoria'");
                        $dataSub = mysqli_query($connc, $sqlSub);
                        ?>

                <div class="form-group">
                    <select class="form-control" name="newMercaderiaImp" id="newMercaderiaImp">

                        <?php while ($rowSub = mysqli_fetch_array($dataSub)){ ?>
                            <?php if ($subcategoria == $rowSub['subcategoria']) { ?>

                            <option class="form-control" value="<?php echo $rowSub['id_subcategoria']; ?>" selected>
                            <?php echo utf8_encode($rowSub['subcategoria']);?>
                            </option>

                            <?php } else { ?> 
                                <option class="form-control" value="<?php echo $rowSub['id_subcategoria']; ?>" >
                            <?php echo utf8_encode($rowSub['subcategoria']);?>
                            </option>
                            <?php } ?>
                        <?php } ?>

                    </select>
                </div>
                    <?php } ?>
                </div>
               
                <div class="content">
                    <label for="newCantBultosImp"><b>Cantidad de Bultos</b></label>
                    <input name="newCantBultosImp" id="newCantBultosImp" type="text" class='input-field' placeholder="" required autocomplete="off" value="<?php if($bultos==null){echo '';}else{echo $bultos;} ?>">
                </div>
                <div class="content">
                    <label for="newPesoImp"><b>Peso Estimado</b></label>
                    <input name="newPesoImp" id="newPesoImp" type="text" class='input-field' placeholder="" required autocomplete="off"  value="<?php if($peso==null){echo '';}else{echo $peso;} ?>">
                </div>
                <div class="content">
                    <label for="newVolumenImp"><b>Volumen Estimado</b></label>
                    <input name="newVolumenImp" id="newVolumenImp" type="text" class='input-field' placeholder="" required autocomplete="off"  value="<?php if($volumen==null){echo '';}else{echo $volumen;} ?>">
                </div>
                <div class="content">
                    <label for="newNroContenedorImp"><b>N° Contenedor</b></label>
                    <input name="newNroContenedorImp" id="newNroContenedorImp" type="text" class='input-field' placeholder="" required autocomplete="off" value="<?php if($ncontenedor==null){echo '';}else{echo $ncontenedor;} ?>">
                </div>
                <div class="content">
                    <label for="newTipoContenedorImp"><b>Tipo de Contenedor</b></label>
                    <input name="newTipoContenedorImp" id="newTipoContenedorImp" type="text" class='input-field' placeholder="" required autocomplete="off" value="<?php if($tipocontenedor==null){echo '';}else{echo utf8_encode($tipocontenedor);} ?>">
                </div>

                <div class="content">
                    
                    <span style="font-size: 15px;"><b>Commercial Invoice &emsp;&emsp;</b><input type="checkbox" name="checkci" value="" <?php if($obligatorio1!=0){ ?> checked <?php } ?> ><span style="font-size: 15px;"> Documento Obligatorio</span>
                    <?php if($variable1 !='nada'){ ?>
                        <img src="../../img/pdf.png" style="width: 100%;max-width:50px;height:70px">
                        <p><a href="cargar.php?id=<?php echo $id1; ?>" target="_blank"><?php echo utf8_encode($nom_documento1) ?></a></p>
                    <?php } ?>
                    <input type="file" name="comercialInvoice" id="comercialInvoice" accept=".pdf" class='fancy-file'>

                </div>
                <div class="content">
                    <span style="font-size: 15px;"><b>Packing List &emsp;&emsp;</b><input type="checkbox" name="checkpl" value="" <?php if($obligatorio2!=0){ ?> checked <?php } ?> ><span style="font-size: 15px;"> Documento Obligatorio</span>
                    <?php if($variable2 !='nada'){ ?>
                        <img src="../../img/pdf.png" style="width: 100%;max-width:50px;height:70px">
                        <p><a href="cargar.php?id=<?php echo $id2; ?>" target="_blank"><?php echo utf8_encode($nom_documento2) ?></a></p>
                    <?php } ?>
                    <input type="file" name="packingList" id="packingList" accept=".pdf" class='fancy-file'>

                </div>
                <div class="content">
                    <span style="font-size: 15px;"><b>Certificado de Origen &emsp;&emsp;</b><input type="checkbox" name="checkco" value="" <?php if($obligatorio3!=0){ ?> checked <?php } ?> ><span style="font-size: 15px;"> Documento Obligatorio</span>
                    <?php if($variable3 !='nada'){ ?>
                        <img src="../../img/pdf.png" style="width: 100%;max-width:50px;height:70px">
                        <p><a href="cargar.php?id=<?php echo $id3; ?>" target="_blank"><?php echo utf8_encode($nom_documento3) ?></a></p>
                    <?php } ?>
                    <input type="file" name="certificadoOrigen" id="certificadoOrigen" accept=".pdf" class='fancy-file'>
                </div>
                <div class="content">
                    <span style="font-size: 15px;"><b>Documento de Transporte &emsp;&emsp;</b><input type="checkbox" name="checkdt" value="" <?php if($obligatorio4!=0){ ?> checked <?php } ?> ><span style="font-size: 15px;"> Documento Obligatorio</span>
                    <?php if($variable4 !='nada'){ ?>
                        <img src="../../img/pdf.png" style="width: 100%;max-width:50px;height:70px">
                        <p><a href="cargar.php?id=<?php echo $id4; ?>" target="_blank"><?php echo utf8_encode($nom_documento4) ?></a></p>
                    <?php } ?>
                    <input type="file" name="documentoTransporte" id="documentoTransporte" accept=".pdf" class='fancy-file'>
                </div>
                <div class="content">
                    <span style="font-size: 15px;"><b>Otros &emsp;&emsp;</b><input type="checkbox" name="checko" value="" <?php if($obligatorio6!=0){ ?> checked <?php } ?> ><span style="font-size: 15px;"> Documento Obligatorio</span>
                    <?php if($variable6 !='nada'){ ?>
                        <img src="../../img/pdf.png" style="width: 100%;max-width:50px;height:70px">
                        <p><a href="cargar.php?id=<?php echo $id6; ?>" target="_blank"><?php echo utf8_encode($nom_documento6) ?></a></p>
                    <?php } ?>
                    <input type="file" name="newOtroImp" id="newOtroImp" accept=".pdf" class='fancy-file'>
                </div>
                <div>
                    <input class="submit-btn" type="submit" value="Guardar" name="editImp">
                </div>
                <script src="../../../fancy-file/script.js"></script>
            </form>
        </div>

    <?php endif ?>


    <!-- Usuario 5 -->
    <?php if ($tipoUsu == 5) : ?>
        <div>
        <form action="../../func/tools/editarExportacion.php?id_imp_exp=<?php echo $_GET['id_imp_exp'] ?>" id='editExp' class='input-group-editExp' method="POST" enctype="multipart/form-data">
            <div class="content">
                    <input name="xxx" id="xxx" type="hidden" class='input-field' placeholder="N° de Orden" value="<?php echo $id_imp_exp; ?>" readonly>
                </div>
                <div class="content">
                    <label for="newnroOrdenImp"><b>N° de Orden</b></label>
                    <input name="newnroOrdenImp" id="newnroOrdenImp" type="text" class='input-field' placeholder="N° de Orden" value="<?php echo $nOrden; ?>" readonly>
                </div>
                <div class="content">
                    <label for="newnpaisOrigenImp"><b>País de Origen</b></label>
                    <input name="newnpaisOrigenImp" id="newnpaisOrigenImp" type="text" class='input-field' placeholder="N° de Orden" value="<?php echo utf8_encode($origen); ?>" readonly>
                </div>
                <div class="content">
                    <label for="newnpaisDestinoImp"><b>País de Destino</b></label>
                    <input name="newnpaisDestinoImp" id="newnpaisDestinoImp" type="text" class='input-field' placeholder="N° de Orden" value="<?php echo utf8_encode($destino); ?>" readonly>
                </div>
                <div class="content">
                    <label for="newincotemImp"><b>Incotem</b></label>
                    <input name="newincotemImp" id="newincotemImp" type="text" class='input-field' placeholder="Incotem" value="<?php echo utf8_encode($incoterm); ?>" readonly>
                </div>
                <div class="content">
                    <label for="newobsImp"><b>Observaciones</b></label>
                    <input name="newobsImp" id="newobsImp"  type="text" class='input-field' placeholder="Obervaciones" autocomplete="off" value="<?php echo utf8_encode($observaciones); ?>">
                </div>
                <div class="content">
                    <label for="newLinkImp"><b>Link Seguimiento</b></label>
                    <input name="newLinkImp" id="newLinkImp" type="text" class='input-field' placeholder="" autocomplete="off" value="<?php if($link==null){echo '';}else{echo utf8_encode($link);} ?>">
                </div>
                <div class="content">
                    <label for="newNroSegImp"><b>N° Seguimiento</b></label>
                    <input name="newNroSegImp" id="newNroSegImp" type="text" class='input-field' placeholder="" autocomplete="off" value="<?php if($nseguimiento==null){echo '';}else{echo $nseguimiento;} ?>">
                </div>
                <div>
                    <input class="submit-btn" type="submit" value="Guardar" name="editImp">
                </div>
                <script src="../../../fancy-file/script.js"></script>
            </form>
        </div>

    <?php endif ?>


    <!-- Usuario 7 -->

    <?php if ($tipoUsu == 7) : ?>
        <div>
        <form action="../../func/tools/editarExportacion.php?id_imp_exp=<?php echo $_GET['id_imp_exp'] ?>" id='editExp' class='input-group-editExp' method="POST" enctype="multipart/form-data">
            <div class="content">
                    <input name="xxx" id="xxx" type="hidden" class='input-field' placeholder="N° de Orden" value="<?php echo $id_imp_exp; ?>" readonly>
                </div>
                <div class="content">
                    <label for="newnroOrdenImp"><b>N° de Orden</b></label>
                    <input name="newnroOrdenImp" id="newnroOrdenImp" type="text" class='input-field' placeholder="N° de Orden" value="<?php echo $nOrden; ?>" readonly>
                </div>
                <div class="content">
                    <label for="newnpaisOrigenImp"><b>País de Origen</b></label>
                    <input name="newnpaisOrigenImp" id="newnpaisOrigenImp" type="text" class='input-field' placeholder="N° de Orden" value="<?php echo utf8_encode($origen); ?>" readonly>
                </div>
                <div class="content">
                    <label for="newnpaisDestinoImp"><b>País de Destino</b></label>
                    <input name="newnpaisDestinoImp" id="newnpaisDestinoImp" type="text" class='input-field' placeholder="N° de Orden" value="<?php echo utf8_encode($destino); ?>" readonly>
                </div>
                <div class="content">
                    <label for="newincotemImp"><b>Incotem</b></label>
                    <input name="newincotemImp" id="newincotemImp" type="text" class='input-field' placeholder="Incotem" value="<?php echo utf8_encode($incoterm); ?>" readonly>
                </div>
                <div class="content">
                    <label for="newobsImp"><b>Observaciones</b></label>
                    <input name="newobsImp" id="newobsImp"  type="text" class='input-field' placeholder="Obervaciones" autocomplete="off" value="<?php echo utf8_encode($observaciones); ?>">
                </div>

                <div class="content">
                    <label for="newNroPolizaImp"><b>N° Póliza de Seguro</b></label>
                    <input name="newNroPolizaImp" id="newNroPolizaImp" type="text" class='input-field' placeholder="" autocomplete="off" value="<?php if($npoliza==null){echo '';}else{echo $npoliza;} ?>">
                </div>
                <div class="content">
                    <label for="newFechaPolizaImp"><b>Fecha Póliza de Seguro</b></label>
                    <input name="newFechaPolizaImp" id="newFechaPolizaImp" type="date" class='input-field' placeholder="" autocomplete="off" value="<?php if($fechapoliza==null){echo '';}else{echo $fechapoliza;} ?>">
                </div>
                <div class="content">
                    <label for="newPrimaPolizaImp"><b>Monto Prima Póliza de Seguro</b></label>
                    <input name="newPrimaPolizaImp" id="newPrimaPolizaImp" type="text" class='input-field' placeholder="" autocomplete="off" value="<?php if($montopoliza==null){echo '';}else{echo $montopoliza;} ?>">
                </div>
                <div class="content">
                    <span style="font-size: 15px;"><b>Póliza de Seguro &emsp;&emsp;</b><input type="checkbox" name="checkps" value="" <?php if($obligatorio5!=0){ ?> checked <?php } ?> ><span style="font-size: 15px;"> Documento Obligatorio</span>
                    <?php if($variable5 !='nada'){ ?>
                        <img src="../../img/pdf.png" style="width: 100%;max-width:50px;height:70px">
                        <p><a href="cargar.php?id=<?php echo $id5; ?>" target="_blank"><?php echo utf8_encode($nom_documento5) ?></a></p>
                    <?php } ?>
                    <input type="file" name="polizaSeguro" id="polizaSeguro" accept=".pdf" class='fancy-file'>
                </div>
                <div>
                    <input class="submit-btn" type="submit" value="Guardar" name="editImp">
                </div>
                <script src="../../../fancy-file/script.js"></script>
            </form>
        </div>

    <?php endif ?>

</section>
<!--body section ends-->

<!-- footer section starts  -->
<?php include("../../../includes/footer.php"); ?>
<!-- footer section ends -->