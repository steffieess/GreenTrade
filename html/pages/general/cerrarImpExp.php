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
        $tipo_ie_id_tipoie = $row['tipo_ie_id_tipoie'];
    }
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
    <?php if ($tipo_ie_id_tipoie == 1) { ?>
        <h1 class="heading-title"> Cerrar Importaci??n </h1>
    <?php } else { ?>
        <h1 class="heading-title"> Cerrar Exportaci??n </h1>
    <?php } ?>
    <div>
        <form action="../../func/tools/cerrarImpExp.php?id_imp_exp=<?php echo $_GET['id_imp_exp'] ?>" id='id_imp_exp' class='input-group-editUsuario' method="POST">
            <div class="content">
            <?php if ($tipo_ie_id_tipoie == 1) { ?>
                <label for="newFechaCierre"><b>Fecha del comprobante de pago de impuestos</b></label>
            <?php } else { ?>
                <label for="newFechaCierre"><b>Fecha de la declaraci??n ??nica de salida</b></label>
            <?php } ?>
                
                <input name="newFechaCierre" type="date" class='input-field' placeholder="Ingrese la fecha del comprobante de Pago de Impuestos" value="" required autocomplete="off">
            </div>


            <div>
                <?php if ($tipo_ie_id_tipoie == 1) { ?>
                    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cerrar importaci??n</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ??Deseas cerrar esta importaci??n?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <input class="btn btn-primary" type="submit" value="S??, deseo cerrar la importaci??n" name="Cerrar">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="submit-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Cerrar Importaci??n
                    </button>
                <?php } else { ?>
                    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cerrar exportaci??n</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ??Deseas cerrar esta exportaci??n?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <input class="btn btn-primary" type="submit" value="S??, deseo cerrar la exportaci??n" name="Cerrar">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="submit-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Cerrar Exportaci??n
                    </button>
                <?php } ?>

            </div>
        </form>
    </div>
</section>
<!--body section ends-->

<!-- footer section starts  -->
<?php include("../../../includes/footer.php"); ?>
<!-- footer section ends -->