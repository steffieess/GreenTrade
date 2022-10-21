<!-- header section starts  -->
<?php include("../../../includes/header.php"); ?>
<!-- header section ends -->

<!--body section starts-->
<section class="reg-import">
    <h1 class="heading-title"> Nueva Importación </h1>
    <div>
        <form action="../../func/tools/registroImportacion.php" id='regImportacion' class='input-group-regImportacion' method="POST">
            <div class="content">
                <label for="nroOrdenImp"><b>N° de Orden</b></label>
                <input name="nroOrdenImp" type="text" class='input-field' placeholder="N° de Orden" required>
            </div>

            <?php
                $sqlPais = ("SELECT * FROM pais");
                $dataPais = mysqli_query($connc, $sqlPais);
            ?>
            <div class="form-group">
                <label for="id_paisOrigenImp"><b>País de Origen</b></label>
                <select class="form-control" name="id_paisOrigenImp" id="id_paisOrigenImp">
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
                <label for="id_paisDestinoImp"><b>País de Destino</b></label>
                <select class="form-control" name="id_paisDestinoImp" id="id_paisDestinoImp">
                    <?php while ($rowPais = mysqli_fetch_array($dataPais)){ ?>
                        <option class="form-control" value="<?php echo $rowPais['id_pais']; ?>">
                        <?php echo $rowPais['nombre_pais'];?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            <div class="content">
                <label for="incotemImp"><b>Incotem</b></label>
                <input name="incotemImp" type="text" class='input-field' placeholder="Incotem" required>
            </div>
            <div class="content">
                <label for="obsImp"><b>Observaciones</b></label>
                <input name="obsImp" type="text" class='input-field' placeholder="Obervaciones">
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