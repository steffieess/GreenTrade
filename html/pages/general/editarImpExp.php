<!-- header section starts  -->
<?php include("../../../includes/header.php"); ?>
<!-- header section ends -->

<?php
if (isset($_GET['id_imp_exp'])) {
    $id_imp_exp = $_GET['id_imp_exp'];
    $queryeditImp = "SELECT * FROM imp_exp WHERE id_imp_exp = '$id_imp_exp'";
    $queryeditImpList = mysqli_query($connc, $queryeditImp);

    if (mysqli_num_rows($queryeditImpList) == 1) {
        $row = mysqli_fetch_array($queryeditImpList);
        $nOrden = $row['nro_orden'];
        $tipo_ie = $row['tipo_ie_id_tipoie'];
    }
}
?>

<!--body section starts-->
<section class="reg-import">
    <h1 class="heading-title"> Editar Impo | Expo</h1>
    <div>
        <form action="../../func/tools/updateImpExp.php?id_imp_exp=<?php echo $_GET['id_imp_exp'] ?>" id='editImp' class='input-group-editImp' method="POST" enctype="multipart/form-data">

            <div class="content">
                <input name="xxx" id="xxx" type="hidden" class='input-field' placeholder="N° de Orden" value="<?php echo $id_imp_exp; ?>" readonly>
            </div>
            <div class="content">
                <label for="newnroOrdenImp"><b>N° de Orden</b></label>
                <input name="newnroOrdenImp" id="newnroOrdenImp" type="text" class='input-field' placeholder="N° de Orden" value="<?php echo $nOrden; ?>" readonly>
            </div>

            <label for="status"><b>Cambiar Impo | Expo</b></label>
            <select class="form-control" name="ImpExp" id="ImpExp">
                <?php
                if ($tipo_ie == 1) { ?>
                    <option value="1" selected>
                        Importación
                    </option>
                    <option value="2">
                        Exportación
                    </option>
                <?php } else { ?>
                    <option value="1">
                        Importación
                    </option>
                    <option value="2" selected>
                        Exportación
                    </option>
                <?php } ?>
            </select>
    </div>

    <div>
        <input class="submit-btn" type="submit" value="Guardar" name="editImpExp">
    </div>
    <script src="../../../fancy-file/script.js"></script>
    </form>
    </div>

</section>
<!--body section ends-->

<!-- footer section starts  -->
<?php include("../../../includes/footer.php"); ?>
<!-- footer section ends -->