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
    <h1 class="heading-title"> Usuarios </h1>
    <div class="card card-body col-md-2">
        <form action="usuario.php" method="POST">

            <div class="form-group">
                <label for="buscarUsuario">Buscar usuario</label>
                <input name="buscar" type="text" class='input-field' placeholder="Rut" autocomplete="off">
            </div>

            <input type="submit" name="buscarUsuario" class="btn btn-success btn-block" value="Buscar">
        </form>
    </div>
    <div class="text-end">
        <?php
        if ($tipoUsu == 1) {

        ?>
            <a href="../IE/registroUsuario.php" class="btn">Nuevo Usuario Colaborador</a>
        <?php } ?>
        <?php
        if ($tipoUsu == 2) {

        ?>
            <a href="../IE/registroUsuarioExterno.php" class="btn">Nuevo Usuario Externo</a>
        <?php } ?>
    </div>

    <?php if (isset($_POST['buscarUsuario'])) { ?>
        <?php if ($_POST['buscar'] != '') {
            $buscar = $_POST['buscar'];
            $querySuppliers = "SELECT * FROM usuario INNER JOIN empresa ON usuario.empresa_id_empresa = empresa.id_empresa WHERE empresa.usuario_empresa = '$usuEmpresaM' AND rut_usuario = '$buscar' ORDER BY empresa.id_empresa ASC";
            $queryUserSuppliers = mysqli_query($connc, $querySuppliers);
        } else {
            $querySuppliers = "SELECT * FROM usuario INNER JOIN empresa ON usuario.empresa_id_empresa = empresa.id_empresa WHERE empresa.usuario_empresa = '$usuEmpresaM' ORDER BY empresa.id_empresa ASC";
            $queryUserSuppliers = mysqli_query($connc, $querySuppliers);
        } ?>
    <?php } else {
        $querySuppliers = "SELECT * FROM usuario INNER JOIN empresa ON usuario.empresa_id_empresa = empresa.id_empresa WHERE empresa.usuario_empresa = '$usuEmpresaM' ORDER BY empresa.id_empresa ASC";
        $queryUserSuppliers = mysqli_query($connc, $querySuppliers);
    } ?>

    <div class="table-responsive">
        <div class="col-md-8 table-user ">
            <table class="table">
                <thead>
                    <tr>
                        <th>Rut</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Razón social</th>
                        <th>Estado</th>
                        <th>Modificar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($queryUserSuppliers) != 0) { ?>
                        <?php while ($dataUserSuppliers = mysqli_fetch_array($queryUserSuppliers)) { ?>
                            <tr>
                                <td><?php echo $dataUserSuppliers['rut_usuario']; ?></td>
                                <td><?php echo $dataUserSuppliers['nom_usuario']; ?></td>
                                <td><?php echo $dataUserSuppliers['ap_paterno']; ?></td>
                                <td><?php echo $dataUserSuppliers['ap_materno']; ?></td>
                                <td><?php echo $dataUserSuppliers['mail_usuario']; ?></td>
                                <td><?php echo $dataUserSuppliers['tel_usuario']; ?></td>
                                <td><?php echo $dataUserSuppliers['razon_social']; ?></td>
                                <?php
                                if ($dataUserSuppliers['status'] == 0) { ?>
                                    <td>Habilitado</td>
                                <?php } else { ?>
                                    <td>Deshabilitado</td>
                                <?php } ?>
                                <td><a href="../general/editarUsuario.php?rut_usuario=<?php echo $dataUserSuppliers['rut_usuario'] ?>"><i class="fa-solid fa-user-pen"></i></a></td>
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