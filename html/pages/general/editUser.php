<!-- header section starts  -->
<?php include("../../../includes/header.php"); ?>
<!-- header section ends -->

<?php
if (isset($_GET['rut_usuario'])) {
    $rutUsu = $_GET['rut_usuario'];
    $queryEditUser = "SELECT * FROM usuario INNER JOIN empresa ON usuario.empresa_id_empresa = empresa.id_empresa WHERE rut_usuario = '$rutUsu'";
    $queryEditUserList = mysqli_query($connc, $queryEditUser);

    if (mysqli_num_rows($queryEditUserList) == 1) {
        $row = mysqli_fetch_array($queryEditUserList);
        $nombre = $row['nom_usuario'];
        $ap_paterno = $row['ap_paterno'];
        $ap_materno = $row['ap_materno'];
        $rut_usuario = $row['rut_usuario'];
        $tel = $row['tel_usuario'];
        $estado = $row['status'];
        $razon = $row['razon_social'];
    }
}
?>

<!--body section starts-->
<section class="reg-import">
    <h1 class="heading-title"> Editar usuario </h1>
    <div>
        <form action="../../func/tools/updateUser.php?rut_usuario=<?php echo $_GET['rut_usuario'] ?>" id='editUsuario' class='input-group-editUsuario' method="POST">

            <div class="content">
                <label for="newTelUser"><b>Rut usaurio</b></label>
                <input name="newTelUser" type="tel" class='input-field' placeholder="" value="<?php echo $rut_usuario; ?>" required autocomplete="off" readonly>

                <label for="newTelUser"><b>Nombre Usuario</b></label>
                <input name="newTelUser" type="tel" class='input-field' placeholder="" value="<?php echo utf8_encode($nombre . ' ' . $ap_paterno . ' ' . $ap_materno); ?>" required autocomplete="off" readonly>

                <label for="newTelUser"><b>Empresa</b></label>
                <input name="newTelUser" type="tel" class='input-field' placeholder="" value="<?php echo utf8_encode($razon); ?>" required autocomplete="off" readonly>

                <div class="form-group">

                    <label for="newTelUser"><b>Estado</b></label>
                    <?php
                    if ($estado == 0) { ?>

                        <input name="newTelUser" type="tel" class='input-field' placeholder="" value="Habilitado" required autocomplete="off" readonly>
                    <?php } else { ?>
                        <input name="newTelUser" type="tel" class='input-field' placeholder="" value="Deshabilitado" required autocomplete="off" readonly>

                    <?php } ?>
                    </select>
                </div>
            </div>

            <div>
                <input class="submit-btn" type="submit" value="Restablecer contraseña" name="RestUser">
            </div>
        </form>
    </div>
    </div>
</section>
<!--body section ends-->

<!-- footer section starts  -->
<?php include("../../../includes/footer.php"); ?>
<!-- footer section ends -->