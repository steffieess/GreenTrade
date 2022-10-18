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

<section class="reg-user">
    <h1 class="heading-title"> Crear Usuario </h1>
    <div>
    <form action="../../func/registrarSuppliers.php" id='regUser' class='input-group-regUser' method="POST">
                <div class="content">
                    <label for="rutUsuario"><b>Rut Usuario</b></label>
                    <input name="rutUsuario" type="text" class='input-field' placeholder="11111111-1" required>
                </div>
                <div class="content">
                    <label for="nomUsuario"><b>Nombre Usuario</b></label>
                    <input name="nomUsuario" type="text" class='input-field' placeholder="Nombre Usuario" required>
                </div>
                <div class="content">
                    <label for="appUsuario"><b>Apellido Paterno Usuario</b></label>
                    <input name="appUsuario" type="text" class='input-field' placeholder="Apellido Paterno" required>
                </div>
                <div class="content">
                    <label for="apmUsuario"><b>Apellido Materno Usuario</b></label>
                    <input name="apmUsuario" type="text" class='input-field' placeholder="Apellido Materno" required>
                </div>
                <div class="content">
                    <label for="mailUsuario"><b>Correo Usuario</b></label>
                    <input name="mailUsuario" type="text" class='input-field' placeholder="greentrade@greentrade.com" required>
                </div>
                <div class="content">
                    <label for="telUsuario"><b>Teléfono Usuario</b></label>
                    <input name="telUsuario" type="text" class='input-field' placeholder="Teléfono Usuario" required>
                </div>
                <div>
                    <input class="submit-btn" type="submit" value="Registrar Usuario" name="regUsuario">
                </div>
            </form>
    </div>  
    </div>
</section>
<!--body section ends-->

<!-- footer section starts  -->
<?php include("../../../includes/footer.php"); ?>
<!-- footer section ends -->