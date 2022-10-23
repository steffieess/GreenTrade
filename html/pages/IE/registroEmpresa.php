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
<section class="reg-user">
    <h1 class="heading-title"> Registrar Empresa </h1>
    <div>
        <form action="../../func/tools/funcRegistrarEmpresa.php" id='regEmpresa' class='input-group-regEmpresa' method="POST">
            <?php
            $sqlEmpresa = ("SELECT * FROM tipo_empresa");
            $dataEmpresa = mysqli_query($connc, $sqlEmpresa);
            ?>
            <div class="form-group">
                <label for="id_tipoEmpresa"><b>Tipo de Empresa</b></label>
                <select class="form-control" name="id_tipoEmpresa" id="id_tipoEmpresa">
                    <?php while ($rowEmpresa = mysqli_fetch_array($dataEmpresa)) { ?>
                        <option class="form-control" value="<?php echo $rowEmpresa['id_tipoempresa']; ?>">
                            <?php echo $rowEmpresa['nom_tipoempresa']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="content">
                <label for="razonSocial"><b>Razón Social</b></label>
                <input name="razonSocial" type="text" class='input-field' placeholder="Razón Social" required>
            </div>
            <div class="content">
                <label for="dicEmpresa"><b>Dirección Empresa</b></label>
                <input name="dicEmpresa" type="text" class='input-field' placeholder="Dirección Empresa" required>
            </div>
            <div class="content">
                <label for="telEmpresa"><b>Teléfono Empresa</b></label>
                <input name="telEmpresa" type="tel" pattern="[0-9]{9}" class='input-field' placeholder="Teléfono Empresa" required>
            </div>
            <div class="content">
                <label for="correoEmpresa"><b>Correo Empresa</b></label>
                <input name="correoEmpresa" type="text" class='input-field' placeholder="Correo Empresa" required>
            </div>
            <input class="submit-btn" type="submit" value="Registrar Empresa" name="regEmpresa">
    </div>
    </form>
    </div>
    </div>
</section>
<!--body section ends-->

<!-- footer section starts  -->
<?php include("../../../includes/footer.php"); ?>
<!-- footer section ends -->