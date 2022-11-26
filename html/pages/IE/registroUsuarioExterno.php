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
    <h1 class="heading-title"> Crear Usuario Externo</h1>
    <div>
        <form action="../../func/tools/registrarExternos.php" id='regUser' class='input-group-regUser' method="POST">
            <?php
            $sqlEmpresa = ("SELECT * FROM empresa WHERE usuario_empresa = '$usuEmpresaM'");
            $dataEmpresa = mysqli_query($connc, $sqlEmpresa);
            ?>
            <div class="form-group">
                <label for="id_empExt"><b>Empresa Perteneciente</b></label>
                <select class="form-control" name="id_empExt" id="id_empExt">
                    <?php while ($rowEmpresa = mysqli_fetch_array($dataEmpresa)) { ?>
                        <option class="form-control" value="<?php echo $rowEmpresa['id_empresa']; ?>">
                            <?php echo utf8_encode($rowEmpresa['razon_social']); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="content">
                <label for="rutUsuarioExt"><b>Rut Usuario</b></label>
                <input name="rutUsuarioExt" type="text" class='input-field' placeholder="11111111-1" required autocomplete="off">
            </div>
            <div class="content">
                <label for="nomUsuarioExt"><b>Nombre Usuario</b></label>
                <input name="nomUsuarioExt" type="text" class='input-field' placeholder="Nombre Usuario" required autocomplete="off">
            </div>
            <div class="content">
                <label for="appUsuarioExt"><b>Apellido Paterno Usuario</b></label>
                <input name="appUsuarioExt" type="text" class='input-field' placeholder="Apellido Paterno" required autocomplete="off">
            </div>
            <div class="content">
                <label for="apmUsuarioExt"><b>Apellido Materno Usuario</b></label>
                <input name="apmUsuarioExt" type="text" class='input-field' placeholder="Apellido Materno" required autocomplete="off"> 
            </div>
            <div class="content">
                <label for="mailUsuarioExt"><b>Correo Usuario</b></label>
                <input name="mailUsuarioExt" type="text" class='input-field' placeholder="greentrade@greentrade.com" required autocomplete="off">
            </div>
            <div class="content">
                <label for="telUsuarioExt"><b>Teléfono Usuario</b></label>
                <input name="telUsuarioExt" type="tel"  class='input-field' placeholder="Teléfono Usuario" required autocomplete="off">
            </div>
            <div>
                <input class="submit-btn" type="submit" value="Registrar Usuario Externo" name="regUsuarioExt">
            </div>
        </form>
    </div>
    </div>
</section>
<!--body section ends-->

<!-- footer section starts  -->
<?php include("../../../includes/footer.php"); ?>
<!-- footer section ends -->