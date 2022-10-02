<!-- header section starts  -->
<?php include("../../includes/header.php"); ?>
<!-- header section ends -->

<!--body section starts-->
<section class="reg-user">
    <h1 class="heading-title"> Registrar Empresa </h1>
    <div>
    <form action="../func/registroEmpresa.php" id='regEmpresa' class='input-group-regEmpresa' method="POST">
                <div class="content">
                    <label for="rutUsuario"><b>Razón Social</b></label>
                    <input name="rutUsuario" type="text" class='input-field' placeholder="11111111-1" required>
                </div>
                <div class="content">
                    <label for="nomUsuario"><b>Nombre Dirección Empresa</b></label>
                    <input name="nomUsuario" type="text" class='input-field' placeholder="Nombre Usuario" required>
                </div>
                <div class="content">
                    <label for="appUsuario"><b>Teléfono Empresa</b></label>
                    <input name="appUsuario" type="text" class='input-field' placeholder="Apellido Paterno" required>
                </div>
                <div class="content">
                    <label for="apmUsuario"><b>Correo Empresa</b></label>
                    <input name="apmUsuario" type="text" class='input-field' placeholder="Apellido Materno" required>
                </div>
                    <input class="submit-btn" type="submit" value="Registrar Empresa" name="regEmpresa">
                </div>
            </form>
    </div>  
    </div>
</section>
<!--body section ends-->

<!-- footer section starts  -->
<?php include("../../includes/footer.php"); ?>
<!-- footer section ends -->