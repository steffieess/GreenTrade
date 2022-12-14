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
    <h1 class="heading-title"> Crear Reciclador</h1>
    <div>
        <form action="../../func/tools/registrarRecicladora.php" id='regUser' class='input-group-regUser' method="POST">
        
                <h1>Registrar Empresa</h1>
                <br>
                <div class="content">
                    <label for="razon"><b>Razón social</b></label>
                    <input name="razon" type="text" class='input-field' placeholder="Razón social" required autocomplete="off">
                </div>
                <div class="content">
                    <label for="direc_empresa"><b>Dirección Empresa</b></label>
                    <input name="direc_empresa" type="text" class='input-field' placeholder="Dirección Empresa" autocomplete="off">
                </div>
                <div class="content">
                    <label for="tel_empresa"><b>Teléfono Empresa</b></label>
                    <input name="tel_empresa" type="tel"  class='input-field'  placeholder="Teléfono Empresa" autocomplete="off">
                </div>
                <div class="content">
                    <label for="mail_empresa"><b>Correo Empresa</b></label>
                    <input name="mail_empresa" type="text" class='input-field' placeholder="greentrade@greentrade.com" autocomplete="off">
                </div>
                <br>
                <h1>Representante de la Empresa</h1>
                <br>
                <div class="content">
                    <label for="rut_user"><b>Rut representante</b></label>
                    <input name="rut_user" type="text" class='input-field' placeholder="11111111-1" required autocomplete="off">
                </div>
                <div class="content">
                    <label for="nom_user"><b>Nombre representante</b></label>
                    <input name="nom_user" type="text" class='input-field' placeholder="Nombre representante" required autocomplete="off">
                </div>
                <div class="content">
                    <label for="appat_user"><b>Apellido paterno representante</b></label>
                    <input name="appat_user" type="text" class='input-field' placeholder="Apellido Paterno" required autocomplete="off">
                </div>
                <div class="content">
                    <label for="apmat_user"><b>Apellido materno representante</b></label>
                    <input name="apmat_user" type="text" class='input-field' placeholder="Apellido Materno" required autocomplete="off">
                </div>
                <div class="content">
                    <label for="mail_user"><b>Correo representante</b></label>
                    <input name="mail_user" type="text" class='input-field' placeholder="greentrade@greentrade.com" required autocomplete="off">
                </div>
                <div class="content">
                    <label for="tel_user"><b>Teléfono representante</b></label>
                    <input name="tel_user" type="tel" class='input-field' placeholder="Teléfono" required autocomplete="off">
                </div>
                <div class="content">
                    <label for="clave_user"><b>Crear contraseña representante</b></label>
                    <input name="clave_user" type="password" minlength="6" maxlength="6" class='input-field' placeholder="••••••••••••" required autocomplete="off">
                </div>
                <div class="content">
                    <label for="clave_user_valid"><b>Repita contraseña creada</b></label>
                    <input name="clave_user_valid" type="password" minlength="6" maxlength="6" class='input-field' placeholder="••••••••••••" required autocomplete="off">
                </div>
                <div>
                    <input class="submit-btn" type="submit" value="Registrar" name="Registrar">
                </div>
            
        </form>
    </div>
    </div>
</section>
<!--body section ends-->

<!-- footer section starts  -->
<?php include("../../../includes/footer.php"); ?>
<!-- footer section ends -->