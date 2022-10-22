<!-- header section starts  -->
<?php include("../../../includes/header.php"); ?>
<!-- header section ends -->

<?php
if (isset($_GET['nro_orden'])) {
    $nroOrden = $_GET['nro_orden'];
    $queryeditExp = "SELECT * FROM imp_exp WHERE nro_orden = '$nroOrden'";
    $queryeditExpList = mysqli_query($connc, $queryeditExp);

    if (mysqli_num_rows($queryeditExpList) == 1) {
        $row = mysqli_fetch_array($queryeditExpList);
        $nOrden = $row['nro_orden'];
    }
}
?>

<!--body section starts-->
<section class="reg-import">
    <h1 class="heading-title"> Editar Exportación </h1>
    <div>
        <form action="../../func/tools/editarExportacion.php?nro_orden=<?php echo $_GET['nro_orden'] ?>" id='editExp' class='input-group-editExp' method="POST">
            <div class="content">
                <label for="newnroOrdenExp"><b>N° de Orden</b></label>
                <input name="newnroOrdenExp" type="text" class='input-field' placeholder="N° de Orden" readonly>
            </div>
            <div class="content">
                <label for="newnpaisOrigenExp"><b>País de Origen</b></label>
                <input name="newnpaisOrigenExp" type="text" class='input-field' placeholder="N° de Orden" readonly>
            </div>
            <div class="content">
                <label for="newnpaisDestinoExp"><b>País de Destino</b></label>
                <input name="newnpaisDestinoExp" type="text" class='input-field' placeholder="N° de Orden" readonly>
            </div>
            <div class="content">
                <label for="newincotemExp"><b>Incotem</b></label>
                <input name="newincotemExp" type="text" class='input-field' placeholder="Incotem" readonly>
            </div>
            <div class="content">
                <label for="newobsExp"><b>Observaciones</b></label>
                <input name="newobsExp" type="text" class='input-field' placeholder="Obervaciones">
            </div>
            <?php if ($tipoUsu == 3) : ?>
                <div class="content">
                    <label for="newReservaExp"><b>N° Reserva</b></label>
                    <input name="newReservaExp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newEdtExp"><b>Fecha EDT</b></label>
                    <input name="newEdtExp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newEtaExp"><b>Fecha ETA</b></label>
                    <input name="newEtaExp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newNroDocExp"><b>N° Docuemento de Transporte</b></label>
                    <input name="newFechaDocExp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newFechaDocExp"><b>Fecha del Documento de Transporte</b></label>
                    <input name="newFechaDocExp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newTipoEmbarqueExp"><b>Tipo de Embarque</b></label>
                    <input name="newTipoEmbarqueExp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newTipoDesembarqueExp"><b>Tipo de Desembarque</b></label>
                    <input name="newTipoDesembarqueExp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newMercaderiaExp"><b>Mercadería</b></label>
                    <input name="newMercaderiaExp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newCantBultosExp"><b>Cantidad de Bultos</b></label>
                    <input name="newCantBultosExp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newPesoExp"><b>Peso Estimado</b></label>
                    <input name="newPesoExp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newVolumenExp"><b>Volumen Estimado</b></label>
                    <input name="newVolumenExp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newNroContenedorExp"><b>N° Contenedor</b></label>
                    <input name="newNroContenedorExp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newTipoContenedorExp"><b>Tipo de Contenedor</b></label>
                    <input name="newTipoContenedorExp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newInvoiceExp"><b>Commercial Invoice</b></label>
                </div>
                <div class="content">
                    <label for="newPackingExp"><b>Packing List</b></label>
                </div>
                <div class="content">
                    <label for="newCertOrigenExp"><b>Certificado de Origen</b></label>
                </div>
                <div class="content">
                    <label for="newDocTransporteExp"><b>Documento de Transporte</b></label>
                </div>
                <div class="content">
                    <label for="newOtroExp"><b>Otros</b></label>
                </div>
            <?php endif ?>

            <?php if ($tipoUsu == 5) : ?>
                <div class="content">
                    <label for="newLinkExp"><b>Link Seguimiento</b></label>
                    <input name="newLinkExp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newNroSegExp"><b>N° Seguimiento</b></label>
                    <input name="newNroSegExp" type="text" class='input-field' placeholder="" required>
                </div>
            <?php endif ?>

            <?php if ($tipoUsu == 7) : ?>
                <div class="content">
                    <label for="newNroPolizaExp"><b>N° Póliza de Seguro</b></label>
                    <input name="newNroPolizaExp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newFechaPolizaExp"><b>Fecha Póliza de Seguro</b></label>
                    <input name="newFechaPolizaExp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newPrimaPolizaExp"><b>Monto Prima Póliza de Seguro</b></label>
                    <input name="newPrimaPolizaExp" type="text" class='input-field' placeholder="" required>
                </div>
                <div class="content">
                    <label for="newPolizaExp"><b>Poliza de Seguro</b></label>
                </div>
            <?php endif ?>


            <div>
                <input class="submit-btn" type="submit" value="Guardar" name="editExp">
            </div>
        </form>
    </div>
    </div>
</section>
<!--body section ends-->

<!-- footer section starts  -->
<?php include("../../../includes/footer.php"); ?>
<!-- footer section ends -->