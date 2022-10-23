<!-- header section starts  -->
<?php include("../../../includes/header.php"); ?>
<!-- header section ends -->

<!--body section starts-->
<section class="reg-import">
    <h1 class="heading-title"> Crear solicitud de Reciclaje </h1>
    <div>
        <form action="../../func/tools/registroImportacion.php" id='regImportacion' class='input-group-regImportacion' method="POST">
            <div class="content">
                <label for="nroOrdenSolicitar"><b>N° de Orden</b></label>
                <input name="nroOrdenSolicitar" type="text" class='input-field' placeholder="N° de Orden" required autocomplete="off>
            </div>

            <div class="content">
                <label for="empSolicitar"><b>Seleccionar empresa Recicladora</b></label>
                <input name="empSolicitar" type="date" class='input-field' placeholder="Nombre Empresa" required autocomplete="off>
            </div>
    
            <div class="content">
                <label for="pesoImp"><b>Fecha Estimada</b></label>
                <input name="pesoImp" type="text" class='input-field' placeholder="Peso (kg)" required autocomplete="off>
            </div>
            <div>
                    <input class="submit-btn" type="submit" value="Solicitar" name="regImp">
                </div>
        </form>
    </div>
    </div>
</section>
<!--body section ends-->

<!-- footer section starts  -->
<?php include("../../../includes/footer.php"); ?>
<!-- footer section ends -->