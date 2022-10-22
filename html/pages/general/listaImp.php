<!-- header section starts  -->
<?php include("../../../includes/header.php"); ?>
<!-- header section ends -->

<?php
if (isset($_GET['nro_orden'])) {
    $nroOrden = $_GET['nro_orden'];
    $queryeditImp = "SELECT * FROM imp_exp WHERE nro_orden = '$nroOrden'";
    $queryeditImpList = mysqli_query($connc, $queryeditImp);

    if (mysqli_num_rows($queryeditExpList) == 1) {
        $row = mysqli_fetch_array($queryeditImpList);
        $nOrden = $row['nro_orden'];
    }
}
?>

<!--body section starts-->
<section class="reg-import">
    <h1 class="heading-title"> Editar Importación </h1>
    <?php if ($tipoUsu == 1 || $tipoUsu == 2) : ?>
        <div>
            <form action="../../func/tools/editarImportacion.php" id='editImp' class='input-group-editImp' method="POST">
                <div class="content">
                    <label for="newnroOrdenImp"><b>N° de Orden</b></label>
                    <input name="newnroOrdenImp" type="text" class='input-field' placeholder="N° de Orden" readonly value="1">
                </div>
                <div class="content">
                    <label for="newnpaisOrigenImp"><b>País de Origen</b></label>
                    <input name="newnpaisOrigenImp" type="text" class='input-field' placeholder="N° de Orden" readonly>
                </div>
                <div class="content">
                    <label for="newnpaisDestinoImp"><b>País de Destino</b></label>
                    <input name="newnpaisDestinoImp" type="text" class='input-field' placeholder="N° de Orden" readonly>
                </div>
                <div class="content">
                    <label for="newincotemImp"><b>Incotem</b></label>
                    <input name="newincotemImp" type="text" class='input-field' placeholder="Incotem" readonly>
                </div>
                <div class="content">
                    <label for="newobsImp"><b>Observaciones</b></label>
                    <input name="newobsImp" type="text" class='input-field' placeholder="Obervaciones">
                </div>
                <div class="content">
                    <label for="newReservaImp"><b>N° Reserva</b></label>
                    <input name="newReservaImp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newEdtImp"><b>Fecha EDT</b></label>
                    <input name="newEdtImp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newEtaImp"><b>Fecha ETA</b></label>
                    <input name="newEtaImp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newNroDocImp"><b>N° Docuemento de Transporte</b></label>
                    <input name="newFechaDocImp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newFechaDocImp"><b>Fecha del Documento de Transporte</b></label>
                    <input name="newFechaDocImp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newTipoEmbarqueImp"><b>Tipo de Embarque</b></label>
                    <input name="newTipoEmbarqueImp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newTipoDesembarqueImp"><b>Tipo de Desembarque</b></label>
                    <input name="newTipoDesembarqueImp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newMercaderiaImp"><b>Mercadería</b></label>
                    <input name="newMercaderiaImp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newCantBultosImp"><b>Cantidad de Bultos</b></label>
                    <input name="newCantBultosImp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newPesoImp"><b>Peso Estimado</b></label>
                    <input name="newPesoImp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newVolumenImp"><b>Volumen Estimado</b></label>
                    <input name="newVolumenImp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newNroContenedorImp"><b>N° Contenedor</b></label>
                    <input name="newNroContenedorImp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newTipoContenedorImp"><b>Tipo de Contenedor</b></label>
                    <input name="newTipoContenedorImp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <span style="font-size: 15px;"><b>Commercial Invoice</b></span>
                    <input type="file" name="comercialInvoice" id="newInvoiceImp" accept=".pdf" class='fancy-file'>

                </div>
                <div class="content">
                    <span style="font-size: 15px;"><b>Packing List</b></span>
                    <input type="file" name="packingList" id="newPackingImp" accept=".pdf" class='fancy-file'>

                </div>
                <div class="content">
                    <span style="font-size: 15px;"><b>Certificado de Origen</b></span>
                    <input type="file" name="certificadoOrigen" id="newCertOrigenImp" accept=".pdf" class='fancy-file'>
                </div>
                <div class="content">
                    <span style="font-size: 15px;"><b>Documento de Transporte</b></span>
                    <input type="file" name="documentoTransporte" id="newDocTransporteImp" accept=".pdf" class='fancy-file'>
                </div>
                <div class="content">
                    <span style="font-size: 15px;"><b>Otros</b></span>
                    <input type="file" name="otros" id="newOtroImp" accept=".pdf" class='fancy-file'>
                </div>
                <div class="content">
                    <label for="newLinkImp"><b>Link Seguimiento</b></label>
                    <input name="newLinkImp" type="text" class='input-field' placeholder="">
                </div>
                <div class="content">
                    <label for="newNroSegImp"><b>N° Seguimiento</b></label>
                    <input name="newNroSegImp" type="text" class='input-field' placeholder="">
                </div>

                <div class="content">
                    <label for="newNroPolizaImp"><b>N° Póliza de Seguro</b></label>
                    <input name="newNroPolizaImp" type="text" class='input-field' placeholder="">
                </div>
                <div class="content">
                    <label for="newFechaPolizaImp"><b>Fecha Póliza de Seguro</b></label>
                    <input name="newFechaPolizaImp" type="text" class='input-field' placeholder="">
                </div>
                <div class="content">
                    <label for="newPrimaPolizaImp"><b>Monto Prima Póliza de Seguro</b></label>
                    <input name="newPrimaPolizaImp" type="text" class='input-field' placeholder="">
                </div>
                <div class="content">
                    <span style="font-size: 15px;"><b>Póliza de Seguro</b></span>
                    <input type="file" name="polizaSeguro" id="newPolizaImp" accept=".pdf" class='fancy-file'>
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
            <form action="../../func/tools/editarImportacion.php" id='editImp' class='input-group-editImp' method="POST">
                <div class="content">
                    <label for="newnroOrdenImp"><b>N° de Orden</b></label>
                    <input name="newnroOrdenImp" type="text" class='input-field' placeholder="N° de Orden" readonly value="1">
                </div>
                <div class="content">
                    <label for="newnpaisOrigenImp"><b>País de Origen</b></label>
                    <input name="newnpaisOrigenImp" type="text" class='input-field' placeholder="N° de Orden" readonly>
                </div>
                <div class="content">
                    <label for="newnpaisDestinoImp"><b>País de Destino</b></label>
                    <input name="newnpaisDestinoImp" type="text" class='input-field' placeholder="N° de Orden" readonly>
                </div>
                <div class="content">
                    <label for="newincotemImp"><b>Incotem</b></label>
                    <input name="newincotemImp" type="text" class='input-field' placeholder="Incotem" readonly>
                </div>
                <div class="content">
                    <label for="newobsImp"><b>Observaciones</b></label>
                    <input name="newobsImp" type="text" class='input-field' placeholder="Obervaciones">
                </div>
                <div class="content">
                    <label for="newReservaImp"><b>N° Reserva</b></label>
                    <input name="newReservaImp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newEdtImp"><b>Fecha EDT</b></label>
                    <input name="newEdtImp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newEtaImp"><b>Fecha ETA</b></label>
                    <input name="newEtaImp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newNroDocImp"><b>N° Docuemento de Transporte</b></label>
                    <input name="newFechaDocImp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newFechaDocImp"><b>Fecha del Documento de Transporte</b></label>
                    <input name="newFechaDocImp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newTipoEmbarqueImp"><b>Tipo de Embarque</b></label>
                    <input name="newTipoEmbarqueImp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newTipoDesembarqueImp"><b>Tipo de Desembarque</b></label>
                    <input name="newTipoDesembarqueImp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newMercaderiaImp"><b>Mercadería</b></label>
                    <input name="newMercaderiaImp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newCantBultosImp"><b>Cantidad de Bultos</b></label>
                    <input name="newCantBultosImp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newPesoImp"><b>Peso Estimado</b></label>
                    <input name="newPesoImp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newVolumenImp"><b>Volumen Estimado</b></label>
                    <input name="newVolumenImp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newNroContenedorImp"><b>N° Contenedor</b></label>
                    <input name="newNroContenedorImp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newTipoContenedorImp"><b>Tipo de Contenedor</b></label>
                    <input name="newTipoContenedorImp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <span style="font-size: 15px;"><b>Commercial Invoice</b></span>
                    <input type="file" name="comercialInvoice" id="newInvoiceImp" accept=".pdf" class='fancy-file'>

                </div>
                <div class="content">
                    <span style="font-size: 15px;"><b>Packing List</b></span>
                    <input type="file" name="packingList" id="newPackingImp" accept=".pdf" class='fancy-file'>

                </div>
                <div class="content">
                    <span style="font-size: 15px;"><b>Certificado de Origen</b></span>
                    <input type="file" name="certificadoOrigen" id="newCertOrigenImp" accept=".pdf" class='fancy-file'>
                </div>
                <div class="content">
                    <span style="font-size: 15px;"><b>Documento de Transporte</b></span>
                    <input type="file" name="documentoTransporte" id="newDocTransporteImp" accept=".pdf" class='fancy-file'>
                </div>
                <div class="content">
                    <span style="font-size: 15px;"><b>Otros</b></span>
                    <input type="file" name="otros" id="newOtroImp" accept=".pdf" class='fancy-file'>
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
            <form action="../../func/tools/editarImportacion.php" id='editImp' class='input-group-editImp' method="POST">
                <div class="content">
                    <label for="newnroOrdenImp"><b>N° de Orden</b></label>
                    <input name="newnroOrdenImp" type="text" class='input-field' placeholder="N° de Orden" readonly value="1">
                </div>
                <div class="content">
                    <label for="newnpaisOrigenImp"><b>País de Origen</b></label>
                    <input name="newnpaisOrigenImp" type="text" class='input-field' placeholder="N° de Orden" readonly>
                </div>
                <div class="content">
                    <label for="newnpaisDestinoImp"><b>País de Destino</b></label>
                    <input name="newnpaisDestinoImp" type="text" class='input-field' placeholder="N° de Orden" readonly>
                </div>
                <div class="content">
                    <label for="newincotemImp"><b>Incotem</b></label>
                    <input name="newincotemImp" type="text" class='input-field' placeholder="Incotem" readonly>
                </div>
                <div class="content">
                    <label for="newobsImp"><b>Observaciones</b></label>
                    <input name="newobsImp" type="text" class='input-field' placeholder="Obervaciones">
                </div>
                <div class="content">
                    <label for="newLinkImp"><b>Link Seguimiento</b></label>
                    <input name="newLinkImp" type="text" class='input-field' placeholder="">
                </div>
                <div class="content">
                    <label for="newNroSegImp"><b>N° Seguimiento</b></label>
                    <input name="newNroSegImp" type="text" class='input-field' placeholder="">
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
            <form action="../../func/tools/editarImportacion.php" id='editImp' class='input-group-editImp' method="POST">
                <div class="content">
                    <label for="newnroOrdenImp"><b>N° de Orden</b></label>
                    <input name="newnroOrdenImp" type="text" class='input-field' placeholder="N° de Orden" readonly value="1">
                </div>
                <div class="content">
                    <label for="newnpaisOrigenImp"><b>País de Origen</b></label>
                    <input name="newnpaisOrigenImp" type="text" class='input-field' placeholder="N° de Orden" readonly>
                </div>
                <div class="content">
                    <label for="newnpaisDestinoImp"><b>País de Destino</b></label>
                    <input name="newnpaisDestinoImp" type="text" class='input-field' placeholder="N° de Orden" readonly>
                </div>
                <div class="content">
                    <label for="newincotemImp"><b>Incotem</b></label>
                    <input name="newincotemImp" type="text" class='input-field' placeholder="Incotem" readonly>
                </div>
                <div class="content">
                    <label for="newobsImp"><b>Observaciones</b></label>
                    <input name="newobsImp" type="text" class='input-field' placeholder="Obervaciones">
                </div>

                <div class="content">
                    <label for="newNroPolizaImp"><b>N° Póliza de Seguro</b></label>
                    <input name="newNroPolizaImp" type="text" class='input-field' placeholder="">
                </div>
                <div class="content">
                    <label for="newFechaPolizaImp"><b>Fecha Póliza de Seguro</b></label>
                    <input name="newFechaPolizaImp" type="text" class='input-field' placeholder="">
                </div>
                <div class="content">
                    <label for="newPrimaPolizaImp"><b>Monto Prima Póliza de Seguro</b></label>
                    <input name="newPrimaPolizaImp" type="text" class='input-field' placeholder="">
                </div>
                <div class="content">
                    <span style="font-size: 15px;"><b>Póliza de Seguro</b></span>
                    <input type="file" name="polizaSeguro" id="newPolizaImp" accept=".pdf" class='fancy-file'>
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