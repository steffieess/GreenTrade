<!-- header section starts  -->
<?php include("../../../includes/header.php"); ?>
<!-- header section ends -->

<!--body section starts-->

<?php
$querySoli = "SELECT * FROM solicitud WHERE empresa_id_empresa = '$idEmpresaM' AND estado != 'Retiro Pendiente' AND fecha_recicladora = null";
$querySoliList = mysqli_query($connc, $querySoli);
$querySoliListt = mysqli_query($connc, $querySoli);

if (mysqli_num_rows($querySoliListt) == 1) {
    $row = mysqli_fetch_array($querySoliListt);
    $imp_exp_id_imp_exp = $row['imp_exp_id_imp_exp'];

    $queryImpExp = "SELECT * FROM imp_exp WHERE id_imp_exp = '$imp_exp_id_imp_exp'";
    $queryImpExpList = mysqli_query($connc, $queryImpExp);

    if (mysqli_num_rows($queryImpExpList) == 1) {
        $row = mysqli_fetch_array($queryImpExpList);
        $nro_orden = $row['nro_orden'];
}
}


?>

<script>
    <?php if (isset($_SESSION['message'])) { ?>
        $(document).ready(function() {
            setTimeout(clickbutton, 0);

            function clickbutton() {
                $("#btn-modal").click();
            }
        });
        $(document).on('click', '#btn-modal', function() {
            $('#modal-ejemplo').modal('show')
        });
    <?php } ?>
</script>

<button id="btn-modal" class="btn btn-primary" hidden>ABRIR MODAL </button>
<?php if (isset($_SESSION['message'])) { ?>
    <div class="modal fade" id="modal-ejemplo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo $_SESSION['message_type'] ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo $_SESSION['message'] ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
<?php unset($_SESSION['message']);
} ?>

<section>
    <h1 class="heading-title"> Solicitud de Reciclaje  </h1>
    <div class="table-responsive">
        <div class="col-md-8 table-user">
            <table class="table">
                <thead>
                    <tr>
                        <th>N° de Orden</th>
                        <th>Tipo de papel</th>
                        <th>Peso aproximado</th>
                        <th>Fecha Requerida desde</th>
                        <th>Fecha Requerida hasta</th>
                        <th>Empresa Solicitante</th>
                        <th>Aprobar / Rechazar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($querySoliList) != 0) { ?>
                        <?php while ($dataSoli = mysqli_fetch_array($querySoliList)) { ?>
                            <tr>
                                <td><?php echo $nro_orden; ?></td>
                                <td><?php echo $dataSoli['tipo_papel']; ?></td>
                                <td><?php echo $dataSoli['gramaje_total']; ?></td>
                                <td><?php echo date("d-m-Y", strtotime($dataSoli['fecha_requeridaD'])); ?></td>
                                <td><?php echo date("d-m-Y", strtotime($dataSoli['fecha_requeridaH'])); ?></td>
                                <td><?php echo $dataSoli['solicitante']; ?></td>
                                <td><a href="../../../html/pages/Reciclador/aprobar.php?id_imp_exp=<?php echo $imp_exp_id_imp_exp ?>"><i class="fa-regular fa-circle-check"></i></a> <a href="../../../html/pages/Reciclador/rechazo.php?id_imp_exp=<?php echo $imp_exp_id_imp_exp ?>"><i class="fa-solid fa-trash-can"></i></a></td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<!--body section ends-->

<!-- footer section starts  -->
<?php include("../../../includes/footer.php"); ?>
<!-- footer section ends -->