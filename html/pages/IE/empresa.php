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

    <div class="card card-body col-md-2">
        <form action="empresa.php?pagina=1" method="POST">

            <div class="form-group">
                <label for="buscarEmpresa">Buscar empresa</label>
                <input name="buscar" type="text" class='input-field' placeholder="Razón social" autocomplete="off">
            </div>

            <input type="submit" name="buscarEmpresa" class="btn btn-success btn-block" value="Buscar">
        </form>
    </div>

    <div class="text-end">
        <?php
        if ($tipoUsu == 2) {

        ?>
            <a href="../IE/registroEmpresa.php" class="btn">Crear nueva Empresa</a>
        <?php } ?>
    </div>

    <?php if (isset($_POST['buscarEmpresa'])) { ?>
        <?php if ($_POST['buscar'] != '') {
            $buscar = $_POST['buscar'];
            $queryEmpresa = "SELECT * FROM empresa INNER JOIN tipo_empresa ON empresa.tipo_empresa_id_tipoempresa = tipo_empresa.id_tipoempresa WHERE usuario_empresa = '$usuEmpresaM' AND razon_social = '$buscar'";
            $queryEmpresaList = mysqli_query($connc, $queryEmpresa);
        } else {
            $queryEmpresa = "SELECT * FROM empresa INNER JOIN tipo_empresa ON empresa.tipo_empresa_id_tipoempresa = tipo_empresa.id_tipoempresa WHERE usuario_empresa = '$usuEmpresaM'";
    $queryEmpresaList = mysqli_query($connc, $queryEmpresa);
        } ?>
    <?php } else {
        $queryEmpresa = "SELECT * FROM empresa INNER JOIN tipo_empresa ON empresa.tipo_empresa_id_tipoempresa = tipo_empresa.id_tipoempresa WHERE usuario_empresa = '$usuEmpresaM'";
        $queryEmpresaList = mysqli_query($connc, $queryEmpresa);
    } ?>

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
                        <th>Modificar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($queryEmpresaList) != 0) { ?>
                        <?php while ($dataEmpresa = mysqli_fetch_array($queryEmpresaList)) { ?>
                            <tr>
                                <td><?php echo utf8_encode($dataEmpresa['nom_tipoempresa']); ?></td>
                                <td><?php echo utf8_encode($dataEmpresa['razon_social']); ?></td>
                                <td><?php echo utf8_encode($dataEmpresa['direccion_empresa']); ?></td>
                                <td><?php echo utf8_encode($dataEmpresa['tel_empresa']); ?></td>
                                <td><?php echo utf8_encode($dataEmpresa['mail_empresa']); ?></td>
                                <td><a href="../general/editEmpresa.php?id_empresa=<?php echo $dataEmpresa['id_empresa'] ?>"><i class="fa-solid fa-user-pen"></i></a></td>
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