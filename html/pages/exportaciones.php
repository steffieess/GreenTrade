<!-- header section starts  -->
<?php include("../../includes/header.php"); ?>
<!-- header section ends -->

<!--body section starts-->
<section>
    <h1 class="heading-title"> Exportaciones </h1>
    <div class="text-end">
    <?php
        if ($tipoUsu == 2) {

        ?>
            <a href="nuevaExportacion.php" class="btn">Nueva Exportación</a>
        <?php } ?>
    </div>
    <?php
    $queryImpExp = "SELECT * FROM imp_exp INNER JOIN empresa ON imp_exp.usuario_rut_usuario  = empresa.usuario_empresa  WHERE usuario_rut_usuario = '$usuEmpresaM'";
    $queryImpExpList = mysqli_query($connc, $queryImpExp);
    ?>
    <div class="table-responsive">
        <div class="col-md-8 table-user">
            <table class="table">
                <thead>
                    <tr>
                        <th>N° de Orden</th>
                        <th>País de Origen</th>
                        <th>País de Destino</th>
                        <th>Embarque</th>
                        <th>Desembarque</th>
                        <th>Peso Estimado</th>
                        <th>Volumen Estimado</th>
                        <th>Incotem</th>
                        <th>Tipo de Contenedor</th>
                        <th>Cantidad de Contenedores</th>
                        <th>Documentación Asociada</th>
                        <th>Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($queryImpExpList) != 0) { ?>
                        <?php while ($dataImpExp = mysqli_fetch_array($queryImpExpList)) { ?>
                            <tr>
                                <td><?php echo $dataImpExp['nro_orden']; ?></td>
                                <td><?php echo $dataImpExp['pais_origen']; ?></td>
                                <td><?php echo $dataImpExp['pais_destino']; ?></td>
                                <td><?php echo $dataImpExp['embarque']; ?></td>
                                <td><?php echo $dataImpExp['desembarque']; ?></td>
                                <td><?php echo $dataImpExp['peso_estimado']; ?></td>
                                <td><?php echo $dataImpExp['vol_estimado']; ?></td>
                                <td><?php echo $dataImpExp['incoterm']; ?></td>
                                <td><?php echo $dataImpExp['tipocontenedor']; ?></td>
                                <td><?php echo $dataImpExp['cantcontenedor']; ?></td>
                                <td>
                                    <div class="doc"><a href="#"> <i class="fa-solid fa-file"></i><i class="fa-solid fa-eye"></i> </a></div>
                                </td>
                                <td><?php echo $dataImpExp['observaciones']; ?></td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<!--body section ends-->

<!-- footer section starts  -->
<?php include("../../includes/footer.php"); ?>
<!-- footer section ends -->