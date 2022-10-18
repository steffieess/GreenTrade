<!-- header section starts  -->
<?php include("../../../includes/header.php"); ?>
<!-- header section ends -->
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
<!--body section starts-->
<section>
    <h1 class="heading-title"> Empresas </h1>
    <div class="text-end">
        <?php
        if ($tipoUsu == 2) {

        ?>
            <a href="IE/registroEmpresa.php" class="btn">Crear nueva Empresa</a>
        <?php } ?>
    </div>

    <?php
    $queryEmpresa = "SELECT * FROM empresa INNER JOIN tipo_empresa ON empresa.tipo_empresa_id_tipoempresa = tipo_empresa.id_tipoempresa WHERE usuario_empresa = '$usuEmpresaM' AND tipo_empresa_id_tipoempresa > 1 ";
    $queryEmpresaList = mysqli_query($connc, $queryEmpresa);
    ?>

    <div class="table-responsive">
        <div class="col-md-8 table-user">
            <table class="table">
                <thead>
                    <tr>
                        <th>Tipo Empresa</th>
                        <th>Razón Social</th>
                        <th>Dirección Empresa</th>
                        <th>Teléfono Empresa</th>
                        <th>Correo Empresa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($queryEmpresaList) != 0) { ?>
                        <?php while ($dataEmpresa = mysqli_fetch_array($queryEmpresaList)) { ?>
                            <tr>
                                <td><?php echo $dataEmpresa['nom_tipoempresa']; ?></td>
                                <td><?php echo $dataEmpresa['razon_social']; ?></td>
                                <td><?php echo $dataEmpresa['direccion_empresa']; ?><i class="fa-solid fa-pen-to-square"></i></td>
                                <td><?php echo $dataEmpresa['tel_empresa']; ?><i class="fa-solid fa-pen-to-square"></i></td>
                                <td><?php echo $dataEmpresa['mail_empresa']; ?><i class="fa-solid fa-pen-to-square"></i></td>
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