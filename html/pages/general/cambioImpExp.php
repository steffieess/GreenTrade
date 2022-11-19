<!-- header section starts  -->
<?php include("../../../includes/header.php"); ?>
<?php include("../../func/tools/paginadorImpExp.php"); ?>
<!-- header section ends -->

<!--body section starts-->

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

<section>


    <h1 class="heading-title"> Importaciones Y Exportaciones</h1>

    <div class="card card-body col-md-2">
        <form action="cambioImpExp.php?pagina=1" method="POST">

            <div class="form-group">
                <label for="nroOrdenImp">Buscar N° de Orden</label>
                <input name="buscar" type="text" class='input-field' placeholder="N° de Orden" autocomplete="off">
            </div>

            <input type="submit" name="buscarNroOrden" class="btn btn-success btn-block" value="Buscar">
        </form>
    </div>


        <!-- search section starts-->
        <?php if (isset($_POST['buscarNroOrden'])) { ?>
            <?php if ($_POST['buscar'] != '') {
                $buscar = $_POST['buscar'];
                $queryImpExp = "SELECT * FROM imp_exp ie WHERE nro_orden = '$buscar'";
                $queryImpExpList = mysqli_query($connc, $queryImpExp);
            } else {
                $queryImpExp = "SELECT * FROM imp_exp ie LIMIT $iniciar,$imp_x_pagina";
                $queryImpExpList = mysqli_query($connc, $queryImpExp);
            } ?>
        <?php } else {
            $queryImpExp = "SELECT * FROM imp_exp ie LIMIT $iniciar,$imp_x_pagina";
            $queryImpExpList = mysqli_query($connc, $queryImpExp);
        } ?>
        <!-- search section ends-->

        <div class="table-responsive">
            <div class="col-md-8 table-user">
                <table class="table">
                    <thead>
                        <tr>
                            <th>N° de Orden</th>
                            <th>Tipo Imp / Exp</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($queryImpExpList) != 0) { ?>
                            <?php while ($dataImpExp = mysqli_fetch_array($queryImpExpList)) { ?>
                                <tr>
                                    <td><?php echo $dataImpExp['nro_orden']; ?></td>

                                    <?php if ($dataImpExp['tipo_ie_id_tipoie'] == 1) { ?>
                                        <td>Importación</td>
                                    <?php } else { ?>
                                        <td>Exportación</td>
                                    <?php } ?>

                                    <td><a href="../general/editarImpExp.php?id_imp_exp=<?php echo $dataImpExp['id_imp_exp'] ?>"><i class="fa-solid fa-pencil"></i></a></td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>


    <center>
        <ul class="pagination">

            <?php if ($_GET['pagina'] > 1) { ?>
                <li><a href=" cambioImpExp.php?pagina=<?php echo $_GET['pagina'] - 1 ?>"> &laquo;</a></li>
            <?php } else { ?>

            <?php } ?>

            <?php for ($i = 0; $i < $paginas; $i++) : ?>
                <li <?php echo $_GET['pagina'] == $i + 1 ? 'class="active"' : '' ?>>
                    <a href="cambioImpExp.php?pagina=<?php echo $i + 1 ?>">
                        <?php echo $i + 1 ?>
                    </a>
                </li>
            <?php endfor ?>

            <?php if ($_GET['pagina'] < $paginas) { ?>
                <li><a href=" cambioImpExp.php?pagina=<?php echo $_GET['pagina'] + 1 ?>"> &raquo;</a></li>
            <?php } else { ?>

            <?php } ?>
        </ul>
    </center>
</section>
<!--body section ends-->

<!-- footer section starts  -->
<?php include("../../../includes/footer.php"); ?>
<!-- footer section ends -->