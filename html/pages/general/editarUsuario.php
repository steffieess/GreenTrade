<!-- header section starts  -->
<?php include("../../../includes/header.php"); ?>
<!-- header section ends -->

<?php
if (isset($_GET['rut_usuario'])) {
    $rutUsu = $_GET['rut_usuario'];
    $queryEditUser = "SELECT * FROM usuario WHERE rut_usuario = '$rutUsu'";
    $queryEditUserList = mysqli_query($connc, $queryEditUser);

    if (mysqli_num_rows($queryEditUserList) == 1) {
        $row = mysqli_fetch_array($queryEditUserList);
        $tel = $row['tel_usuario'];
        $estado = $row['status'];
    }
}
?>

<!--body section starts-->
<section class="reg-import">
    <h1 class="heading-title"> Editar usuario </h1>
    <div>
        <form action="../../func/tools/editarUsuario.php?rut_usuario=<?php echo $_GET['rut_usuario'] ?>" id='editUsuario' class='input-group-editUsuario' method="POST">
            <div class="content">
                <label for="newTelUser"><b>Nuevo Telefóno</b></label>
                <input name="newTelUser" type="tel" pattern="[0-9]{9}" class='input-field' placeholder="Ingrese nuevo teléfono" value="<?php echo $tel; ?>" required autocomplete="off">
            </div>

            <div class="form-group">
                <label for="status">Cambiar Estado</label>
                <select class="form-control" name="newstatus" id="newstatus">
                    <?php
                    if ($estado == 0) { ?>
                        <option value="0" selected>
                            Habilitado
                        </option>
                        <option value="1">
                            Deshabilitado
                        </option>
                    <?php } else { ?>
                        <option value="0">
                            Habilitado
                        </option>
                        <option value="1" selected>
                            Deshabilitado
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <input class="submit-btn" type="submit" value="Guardar" name="editUser">
            </div>
        </form>
    </div>
    </div>
</section>
<!--body section ends-->

<!-- footer section starts  -->
<?php include("../../../includes/footer.php"); ?>
<!-- footer section ends -->