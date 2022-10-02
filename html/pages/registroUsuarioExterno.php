<!-- header section starts  -->
<?php include("../../includes/header.php"); ?>
<!-- header section ends -->

<!--body section starts-->
<section class="reg-user">
    <h1 class="heading-title"> Crear Usuario Externo </h1>
    <div>
    <form action="../func/registroUsuario.php" id='regUser' class='input-group-regUser' method="POST">
                
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
                    <input name="telUsuari" type="password" class='input-field' placeholder="Teléfono Usuario" required>
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
<?php include("../../includes/footer.php"); ?>
<!-- footer section ends -->