<!-- header section starts  -->
<?php include("../../../includes/header.php"); ?>
<!-- header section ends -->

<?php
if (isset($_GET['id_imp_exp'])) {
    $id_imp_exp = $_GET['id_imp_exp'];
    $queryImpExp = "SELECT * FROM imp_exp WHERE id_imp_exp = '$id_imp_exp'";
    $queryEditImpExp = mysqli_query($connc, $queryImpExp);

    if (mysqli_num_rows($queryEditImpExp) == 1) {
        $row = mysqli_fetch_array($queryEditImpExp);
        $nro_orden = $row['nro_orden'];
    }
    date_default_timezone_set('America/Santiago');
    $hoy = date("Y-m-d");
}
?>

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

<!--body section starts-->
<section class="reg-import">
    <h1 class="heading-title"> Solicitud de Reciclaje </h1>
    <div>
        <form action="../../func/tools/rechazar.php?id_imp_exp=<?php echo $_GET['id_imp_exp']?>" id='editUsuario' class='input-group-editUsuario' method="POST">
            <?php
            $sqlSoli = ("SELECT * FROM solicitud WHERE imp_exp_id_imp_exp  = '$id_imp_exp'");
            $dataSoli = mysqli_query($connc, $sqlSoli);

            if (mysqli_num_rows($dataSoli) == 1) {
                $row = mysqli_fetch_array($dataSoli);
                $fecha_requeridaD = $row['fecha_requeridaD'];
                $fecha_requeridaH = $row['fecha_requeridaH'];
                $solicitante = $row['solicitante'];
            }
            ?>
            <div class="content">
                <label for="FechaRH"><b>Solicitante</b></label>
                <input name="FechaRH" type="text" class='input-field' value="<?php if($solicitante==null){echo '';}else{echo $solicitante;} ?>" placeholder="Ingrese fecha requerida" readonly required autocomplete="off">
                
            </div>
            <div class="content">
                <label for="NroOrden"><b>N° de Orden</b></label>
                <input name="NroOrden" type="text" class='input-field' placeholder="N° de Orden" value="<?php echo utf8_encode($nro_orden); ?>" required autocomplete="off" readonly>
            </div>
            <?php
            $sqlImpExp = ("SELECT * FROM imp_exp WHERE id_imp_exp = '$id_imp_exp'");
            $dataImpExp = mysqli_query($connc, $sqlImpExp);?>

            
            <div class="content">
                <label for="TipoP"><b>Tipo del papel</b></label>
                <?php while ($dataImpExpS = mysqli_fetch_array($dataImpExp)) { ?>
                <input name="TipoP" type="text" class='input-field' value="<?php echo $dataImpExpS['tipo_papel']; ?>" placeholder="Ingrese cantidad de hojas" required readonly autocomplete="off">
                
            </div>
            <div class="content">
                <label for="PesoT"><b>Peso aproximado del papel (En gramos)</b></label>
                <input name="PesoT" type="text" class='input-field' value="<?php echo $dataImpExpS['peso_total_papel']; ?>" placeholder="Ingrese gramaje total" readonly required autocomplete="off">
                <?php } ?>
            </div>
            
            <div class="content">
                <label for="FechaRD"><b>Fecha requerida desde</b></label>

                <input name="FechaRD" type="date" min="<?= $hoy ?>" class='input-field' value="<?php if($fecha_requeridaD==null){echo '';}else{echo $fecha_requeridaD;} ?>" placeholder="Ingrese fecha requerida" readonly required autocomplete="off">

            </div>

            <div class="content">
                <label for="FechaRH"><b>Fecha requerida hasta</b></label>
                <input name="FechaRH" type="date" min="<?= $hoy ?>" class='input-field' value="<?php if($fecha_requeridaH==null){echo '';}else{echo $fecha_requeridaH;} ?>" placeholder="Ingrese fecha requerida" readonly required autocomplete="off">
                
            </div>

            <div>
                <input class="submit-btn" type="submit" value="Rechazar" name="Rechazar">
            </div>
        </form>
    </div>
    </div>
</section>
<!--body section ends-->

<!-- footer section starts  -->
<?php include("../../../includes/footer.php"); ?>
<!-- footer section ends -->