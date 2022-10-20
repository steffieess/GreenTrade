<!-- header section starts  -->
<?php include("../../../includes/header.php"); ?>
<!-- header section ends -->

<?php
if (isset($_GET['id_empresa'])) {
    $id_empresa = $_GET['id_empresa'];
    $queryEditEmp = "SELECT * FROM empresa WHERE id_empresa = '$id_empresa'";
    $queryEditEmpList = mysqli_query($connc, $queryEditEmp);

    if (mysqli_num_rows($queryEditEmpList) == 1) {
        $row = mysqli_fetch_array($queryEditEmpList);
        $direccion = $row['direccion_empresa'];
        $telefono = $row['tel_empresa'];
        $correo = $row['mail_empresa'];
    }
}
?>

<!--body section starts-->
<section class="reg-import">
    <h1 class="heading-title"> Editar empresa </h1>
    <div>
        <form action="../../func/tools/editarEmpresa.php?id_empresa=<?php echo $_GET['id_empresa']?>" id='editUsuario' class='input-group-editUsuario' method="POST">
            <div class="content">
                <label for="newDirecEmp"><b>Nuevo Telefóno</b></label>
                <input name="newDirecEmp" type="text" class='input-field' placeholder="Ingrese nueva dirección" value="<?php echo $direccion; ?>" required autocomplete="off">
            </div>

            <div class="content">
                <label for="newTelEmp"><b>Nuevo Telefóno</b></label>
                <input name="newTelEmp" type="text" class='input-field' placeholder="Ingrese nuevo teléfono" value="<?php echo $telefono; ?>" required autocomplete="off">
            </div>

            <div class="content">
                <label for="newCorreoEmp"><b>Nuevo Telefóno</b></label>
                <input name="newCorreoEmp" type="text" class='input-field' placeholder="Ingrese nuevo correo" value="<?php echo $correo; ?>" required autocomplete="off">
            </div>

            <div>
                <input class="submit-btn" type="submit" value="Guardar" name="editEmpresa">
            </div>
        </form>
    </div>
    </div>
</section>
<!--body section ends-->

<!-- footer section starts  -->
<?php include("../../../includes/footer.php"); ?>
<!-- footer section ends -->