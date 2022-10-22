<!-- header section starts  -->
<?php include("../../../includes/header.php"); ?>
<!-- header section ends -->

<!--body section starts-->

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
    <h1 class="heading-title"> Importaciones </h1>
    <div class="text-end">
        <?php
        if ($tipoUsu == 2) {

        ?>
            <a href="../IE/nuevaImportacion.php" class="btn">Nueva Importación</a>
        <?php } ?>
        
    </div>
    <?php
    $queryImpExp = "SELECT * FROM imp_exp WHERE usuario_rut_usuario = '$usuEmpresaM' AND usuempresa = '$rutP'";
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
                        <th>Incotem</th>
                        <th>Observaciones</th>
                        <th>Ver más</th>
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
                                <td><?php echo $dataImpExp['incoterm']; ?></td>
                                <td><?php echo $dataImpExp['observaciones']; ?></td>
                                <td>
                                    <div class="doc"><i class="fa-solid fa-eye"></i> </a></div>
                                </td>
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
<?php include("../../../includes/footer.php"); ?>
<!-- footer section ends -->