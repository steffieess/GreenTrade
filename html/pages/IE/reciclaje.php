<!-- header section starts  -->
<?php include("../../../includes/header.php"); ?>
<!-- header section ends -->

<!--body section starts-->
<section>
    <h1 class="heading-title"> Reciclaje </h1>
    <div class="text-end">
        <?php
        if ($tipoUsu == 2) {

        ?>
            <a href="../IE/crearSolicitud.php" class="btn">Crear solicitud de Reciclaje</a>
        <?php } ?>
    </div>
    <div class="table-responsive">
        <div class="col-md-8 table-user">
            <table class="table">
                <thead>
                    <tr>
                        <th>N° de Orden</th>
                        <th>Cantidad de Hojas</th>
                        <th>Gramaje Total</th>
                        <th>Fecha Requerida</th>
                        <th>Empresa Recicladora</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>7008960</td>
                        <td>200</td>
                        <td>80 (g)</td>
                        <td>06/05/2023</td>
                        <td>Clean Planet</td>
                        <td>Solicitado</td>
                    </tr>
                    <tr>
                        <td>7008980</td>
                        <td>500</td>
                        <td>110 (g)</td>
                        <td>06/05/2023</td>
                        <td>qrubber</td>
                        <td>Completo</td>
                    </tr>
                    <tr>
                        <td>7008401</td>

                        <td>1000</td>
                        <td>220 (g)</td>
                        <td>06/05/2023</td>
                        <td>Clean Planet</td>
                        <td>Retiro Pendiente</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
<!--body section ends-->

<!-- footer section starts  -->
<?php include("../../../includes/footer.php"); ?>
<!-- footer section ends -->