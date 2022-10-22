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
    <h1 class="heading-title"> Nueva Exportación </h1>
    <div>
        <form action="../../func/tools/registroExportacion.php" id='regImportacion' class='input-group-regExportacion' method="POST">
            <div class="content">
                <label for="nroOrdenExp"><b>N° de Orden</b></label>
                <input name="nroOrdenExp" type="number" class='input-field' placeholder="N° de Orden" required autocomplete="off">
            </div>

            <?php
                $sqlProveedor = ("SELECT * FROM empresa WHERE usuario_empresa = '$usuEmpresaM' AND tipo_empresa_id_tipoempresa = 2");
                $dataProveedor = mysqli_query($connc, $sqlProveedor);
            ?>
            <div class="form-group">
                <label for="proveedor"><b>Proveedor</b></label>
                <select class="form-control" name="proveedor" id="proveedor">
                    <?php while ($rowProveedor = mysqli_fetch_array($dataProveedor)){ ?>
                        <option class="form-control" value="<?php echo $rowProveedor['id_empresa']; ?>">
                        <?php echo $rowProveedor['razon_social'];?>
                    </option>
                    <?php } ?>
                </select>
            </div>

            <?php
                $sqlFFWW = ("SELECT * FROM empresa WHERE usuario_empresa = '$usuEmpresaM' AND tipo_empresa_id_tipoempresa = 4");
                $dataFFWW = mysqli_query($connc, $sqlFFWW);
            ?>
            <div class="form-group">
                <label for="ffww"><b>FFWW o Cía Transportadora</b></label>
                <select class="form-control" name="ffww" id="ffww">
                    <?php while ($rowFFWW = mysqli_fetch_array($dataFFWW)){ ?>
                        <option class="form-control" value="<?php echo $rowFFWW['id_empresa']; ?>">
                        <?php echo $rowFFWW['razon_social'];?>
                    </option>
                    <?php } ?>
                </select>
            </div>

            <?php
                $sqlPais = ("SELECT * FROM pais");
                $dataPais = mysqli_query($connc, $sqlPais);
            ?>
            <div class="form-group">
                <label for="id_paisOrigenExp"><b>País de Origen</b></label>
                <select class="form-control" name="id_paisOrigenExp" id="id_paisOrigenExp">
                    <?php while ($rowPais = mysqli_fetch_array($dataPais)){ ?>
                        <option class="form-control" value="<?php echo $rowPais['nombre_pais']; ?>">
                        <?php echo $rowPais['nombre_pais'];?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            
            <?php
                $sqlPais = ("SELECT * FROM pais");
                $dataPais = mysqli_query($connc, $sqlPais);
            ?>
            <div class="form-group">
                <label for="id_paisDestinoExp"><b>País de Destino</b></label>
                <select class="form-control" name="id_paisDestinoExp" id="id_paisDestinoExp">
                    <?php while ($rowPais = mysqli_fetch_array($dataPais)){ ?>
                        <option class="form-control" value="<?php echo $rowPais['nombre_pais']; ?>">
                        <?php echo $rowPais['nombre_pais'];?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            <div class="content">
                <label for="incotemExp"><b>Incotem</b></label>
                <input name="incotemExp" type="text" class='input-field' placeholder="Incotem" required autocomplete="off">
            </div>
            <div class="content">
                <label for="obsExp"><b>Observaciones</b></label>
                <input name="obsExp" type="text" class='input-field' placeholder="Obervaciones" required autocomplete="off">
            </div>
            <div>
                    <input class="submit-btn" type="submit" value="Guardar" name="regExp">
                </div>
        </form>
    </div>
    </div>
</section>
<!--body section ends-->

<!-- footer section starts  -->
<?php include("../../../includes/footer.php"); ?>
<!-- footer section ends -->