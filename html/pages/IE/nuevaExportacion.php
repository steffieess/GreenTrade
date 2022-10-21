<!-- header section starts  -->
<?php include("../../../includes/header.php"); ?>
<!-- header section ends -->

<!--body section starts-->
<section class="reg-import">
    <h1 class="heading-title"> Nueva Emportación </h1>
    <div>
        <form action="../../func/tools/registroImportacion.php" id='regImportacion' class='input-group-regExportacion' method="POST">
            <div class="content">
                <label for="nroOrdenExp"><b>N° de Orden</b></label>
                <input name="nroOrdenExp" type="text" class='input-field' placeholder="N° de Orden" required>
            </div>

            <?php
                $sqlPais = ("SELECT * FROM pais");
                $dataPais = mysqli_query($connc, $sqlPais);
            ?>
            <div class="form-group">
                <label for="id_paisOrigenExp"><b>País de Origen</b></label>
                <select class="form-control" name="id_paisOrigenExp" id="id_paisOrigenExp">
                    <?php while ($rowPais = mysqli_fetch_array($dataPais)){ ?>
                        <option class="form-control" value="<?php echo $rowPais['id_pais']; ?>">
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
                        <option class="form-control" value="<?php echo $rowPais['id_pais']; ?>">
                        <?php echo $rowPais['nombre_pais'];?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            <div class="content">
                <label for="incotemExp"><b>Incotem</b></label>
                <input name="incotemExp" type="text" class='input-field' placeholder="Incotem" required>
            </div>
            <div class="content">
                <label for="obsExp"><b>Observaciones</b></label>
                <input name="obsExp" type="text" class='input-field' placeholder="Obervaciones">
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