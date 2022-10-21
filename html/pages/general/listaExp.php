<!-- header section starts  -->
<?php include("../../../includes/header.php"); ?>
<!-- header section ends -->

<?php
if (isset($_GET['nro_orden'])) {
    $nroOrden = $_GET['nro_orden'];
    $queryeditExp = "SELECT * FROM usuario WHERE nro_orden = '$nroOrden'";
    $queryeditExpList = mysqli_query($connc, $queryeditExp);

    if (mysqli_num_rows($queryeditExpList) == 1) {
        $row = mysqli_fetch_array($queryeditExpList);
        $nOrden = $row['nro_orden'];

    }
}
?>

<!--body section starts-->
<section class="reg-import">
    <h1 class="heading-title"> Editar Exportación </h1>
    <div>
        <form action="../../func/tools/editarExportacion.php?nro_orden=<?php echo $_GET['nro_orden']?>" id='editExp' class='input-group-editExp' method="POST">
        
            <div>
                <input class="submit-btn" type="submit" value="Guardar" name="editExp">
            </div>
        </form>
    </div>
    </div>
</section>
<!--body section ends-->

<!-- footer section starts  -->
<?php include("../../../includes/footer.php"); ?>
<!-- footer section ends -->