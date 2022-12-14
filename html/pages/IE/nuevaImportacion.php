<!-- header section starts  -->
<?php include("../../../includes/header.php"); ?>
<!-- header section ends -->

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
    <h1 class="heading-title"> Nueva Importación </h1>
    <div>
        <form action="../../func/tools/registroImportacion.php" id='regImportacion' class='input-group-regImportacion' method="POST">
            <div class="content">
                <label for="nroOrdenImp"><b>N° de Orden</b></label>
                <input name="nroOrdenImp" type="text" class='input-field' placeholder="N° de Orden" required autocomplete="off">
            </div>
            
            <?php
                $sqlProveedor = ("SELECT * FROM empresa WHERE usuario_empresa = '$usuEmpresaM' AND tipo_empresa_id_tipoempresa = 3 OR tipo_empresa_id_tipoempresa = 1 AND razon_social != '$razonM'");
                $dataProveedor = mysqli_query($connc, $sqlProveedor);
            ?>
            <div class="form-group">
                <label for="proveedor"><b>Proveedor</b></label>
                <select class="form-control" name="proveedor" id="proveedor">
                    <?php while ($rowProveedor = mysqli_fetch_array($dataProveedor)){ ?>
                        <option class="form-control" value="<?php echo utf8_encode($rowProveedor['razon_social']); ?>">
                        <?php echo utf8_encode($rowProveedor['razon_social']);?>
                    </option>
                    <?php } ?>
                </select>
            </div>

            <?php
                $sqlFFWW = ("SELECT * FROM empresa WHERE usuario_empresa = '$usuEmpresaM' AND tipo_empresa_id_tipoempresa = 5");
                $dataFFWW = mysqli_query($connc, $sqlFFWW);
            ?>
            <div class="form-group">
                <label for="ffww"><b>FFWW o Cía Transportadora</b></label>
                <select class="form-control" name="ffww" id="ffww">
                    <?php while ($rowFFWW = mysqli_fetch_array($dataFFWW)){ ?>
                        <option class="form-control" value="<?php echo utf8_encode($rowFFWW['razon_social']); ?>">
                        <?php echo utf8_encode($rowFFWW['razon_social']);?>
                    </option>
                    <?php } ?>
                </select>
            </div>

            <?php
                $sqlPais = ("SELECT * FROM pais");
                $dataPais = mysqli_query($connc, $sqlPais);
            ?>
            <div class="form-group">
                <label for="id_paisOrigenImp"><b>País de Origen</b></label>
                <select class="form-control" name="id_paisOrigenImp" id="id_paisOrigenImp">
                    <?php while ($rowPais = mysqli_fetch_array($dataPais)){ ?>
                        <option class="form-control" value="<?php echo utf8_encode($rowPais['nombre_pais']); ?>">
                        <?php echo utf8_encode($rowPais['nombre_pais']);?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            
            <?php
                $sqlPais = ("SELECT * FROM pais");
                $dataPais = mysqli_query($connc, $sqlPais);
            ?>
            <div class="form-group">
                <label for="id_paisDestinoImp"><b>País de Destino</b></label>
                <select class="form-control" name="id_paisDestinoImp" id="id_paisDestinoImp">
                    <?php while ($rowPais = mysqli_fetch_array($dataPais)){ ?>
                        <option class="form-control" value="<?php echo utf8_encode($rowPais['nombre_pais']); ?>">
                        <?php echo utf8_encode($rowPais['nombre_pais']);?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            <div class="content">
                <label for="incotemImp"><b>Incoterm</b></label>
                <input name="incotemImp" type="text" maxlength="50" class='input-field' placeholder="Incoterm" required autocomplete="off">
            </div>
            <div class="content">
                <label for="obsImp"><b>Observaciones</b></label>
                <input name="obsImp" type="text" class='input-field' placeholder="Obervaciones" required autocomplete="off">
            </div>
            <div>
                    <input class="submit-btn" type="submit" value="Guardar" name="regImp">
                </div>
        </form>
    </div>
    </div>
</section>
<!--body section ends-->

<!-- footer section starts  -->
<?php include("../../../includes/footer.php"); ?>
<!-- footer section ends -->