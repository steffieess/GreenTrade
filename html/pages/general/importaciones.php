<!-- header section starts  -->
<?php include("../../../includes/header.php"); ?>
<?php include("../../func/tools/paginadorImp.php"); ?>
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


    <h1 class="heading-title"> Importaciones </h1>

    <div class="card card-body col-md-2">
        <form action="importaciones.php?pagina=1" method="POST">

            <div class="form-group">
                <label for="nroOrdenImp">Buscar N° de Orden</label>
                <input name="buscar" type="text" class='input-field' placeholder="N° de Orden" autocomplete="off">
            </div>

            <input type="submit" name="buscarNroOrden" class="btn btn-success btn-block" value="Buscar">
        </form>
    </div>

    <div class="text-end">
        <?php
        if ($tipoUsu == 2) {

        ?>
            <a href="../IE/nuevaImportacion.php" class="btn">Nueva Importación</a>
        <?php } ?>

    </div>

    <?php if ($tipoUsu == 1 || $tipoUsu == 2) { ?>

        <!-- search section starts-->
        <?php if (isset($_POST['buscarNroOrden'])) { ?>
            <?php if ($_POST['buscar'] != '') {
                $buscar = $_POST['buscar'];
                $queryImpExp = "SELECT * FROM imp_exp ie WHERE ie.usuario_rut_usuario = '$usuEmpresaM' AND ie.tipo_ie_id_tipoie = 1 AND nro_orden = '$buscar'";
                $queryImpExpList = mysqli_query($connc, $queryImpExp);
            } else {
                $queryImpExp = "SELECT * FROM imp_exp ie WHERE ie.usuario_rut_usuario = '$usuEmpresaM' AND ie.tipo_ie_id_tipoie = 1 LIMIT $iniciar,$imp_x_pagina";
                $queryImpExpList = mysqli_query($connc, $queryImpExp);
            } ?>
        <?php } else {
            $queryImpExp = "SELECT * FROM imp_exp ie WHERE ie.usuario_rut_usuario = '$usuEmpresaM' AND ie.tipo_ie_id_tipoie = 1 LIMIT $iniciar,$imp_x_pagina";
            $queryImpExpList = mysqli_query($connc, $queryImpExp);
        } ?>
        <!-- search section ends-->

        <div class="table-responsive">
            <div class="col-md-8 table-user">
                <table class="table">
                    <thead>
                        <tr>
                            <th>N° de Orden</th>
                            <th>País de Origen</th>
                            <th>País de Destino</th>
                            <th>Embarque</th>
                            <th>Desembarque</th>
                            <th>Incotem</th>
                            <th>Observaciones</th>
                            <th>Estado</th>
                            <th>Ver más</th>
                            <th>Cerrar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($queryImpExpList) != 0) { ?>
                            <?php while ($dataImpExp = mysqli_fetch_array($queryImpExpList)) { ?>
                                <tr>
                                    <td><?php echo $dataImpExp['nro_orden']; ?></td>
                                    <td><?php echo $dataImpExp['origen']; ?></td>
                                    <td><?php echo $dataImpExp['destino']; ?></td>
                                    <?php if ($dataImpExp['puerto_areo_embarque'] == NULL) { ?>
                                        <td>Sin información</td>
                                    <?php } else { ?>
                                        <td><?php echo $dataImpExp['puerto_areo_embarque']; ?></td>
                                    <?php } ?>
                                    <?php if ($dataImpExp['puerto_areo_desembarque'] == NULL) { ?>
                                        <td>Sin información</td>
                                    <?php } else { ?>
                                        <td><?php echo $dataImpExp['puerto_areo_desembarque']; ?></td>
                                    <?php } ?>
                                    <td><?php echo $dataImpExp['incoterm']; ?></td>
                                    <td><?php echo $dataImpExp['observaciones']; ?></td>
                                    <td><?php echo $dataImpExp['estado']; ?></td>
                                    <td><a href="../general/listaImp.php?id_imp_exp=<?php echo $dataImpExp['id_imp_exp'] ?>"><i class="fa-solid fa-eye"></i></a></td>
                                    <td><a href="../general/cerrarImpExp.php?id_imp_exp=<?php echo $dataImpExp['id_imp_exp'] ?>"><i class="fa-solid fa-file-circle-check"></i></a></td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>


    <?php } elseif ($tipoUsu == 3) { ?>

        <!-- search section starts-->
        <?php if (isset($_POST['buscarNroOrden'])) { ?>
            <?php if ($_POST['buscar'] != '') {
                $buscar = $_POST['buscar'];
                $queryImpExp = "SELECT * FROM imp_exp ie WHERE ie.usuario_rut_usuario = '$usuEmpresaM' AND ie.tipo_ie_id_tipoie = 1 AND usuproveedor = '$razonM' AND nro_orden = '$buscar'";
                $queryImpExpList = mysqli_query($connc, $queryImpExp);
            } else {
                $queryImpExp = "SELECT * FROM imp_exp ie WHERE ie.usuario_rut_usuario = '$usuEmpresaM' AND ie.tipo_ie_id_tipoie = 1 AND usuproveedor = '$razonM' LIMIT $iniciar,$imp_x_pagina";
                $queryImpExpList = mysqli_query($connc, $queryImpExp);
            } ?>
        <?php } else {
            $queryImpExp = "SELECT * FROM imp_exp ie WHERE ie.usuario_rut_usuario = '$usuEmpresaM' AND ie.tipo_ie_id_tipoie = 1 AND usuproveedor = '$razonM' LIMIT $iniciar,$imp_x_pagina";
            $queryImpExpList = mysqli_query($connc, $queryImpExp);
        } ?>
        <!-- search section ends-->

        <div class="table-responsive">
            <div class="col-md-8 table-user">
                <table class="table">
                    <thead>
                        <tr>
                            <th>N° de Orden</th>
                            <th>País de Origen</th>
                            <th>País de Destino</th>
                            <th>Embarque</th>
                            <th>Desembarque</th>
                            <th>Incotem</th>
                            <th>Observaciones</th>
                            <th>Ver más</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($queryImpExpList) != 0) { ?>
                            <?php while ($dataImpExp = mysqli_fetch_array($queryImpExpList)) { ?>
                                <tr>
                                    <td><?php echo $dataImpExp['nro_orden']; ?></td>
                                    <td><?php echo $dataImpExp['origen']; ?></td>
                                    <td><?php echo $dataImpExp['destino']; ?></td>
                                    <?php if ($dataImpExp['puerto_areo_embarque'] == NULL) { ?>
                                        <td>Sin información</td>
                                    <?php } else { ?>
                                        <td><?php echo $dataImpExp['puerto_areo_embarque']; ?></td>
                                    <?php } ?>
                                    <?php if ($dataImpExp['puerto_areo_desembarque'] == NULL) { ?>
                                        <td>Sin información</td>
                                    <?php } else { ?>
                                        <td><?php echo $dataImpExp['puerto_areo_desembarque']; ?></td>
                                    <?php } ?>
                                    <td><?php echo $dataImpExp['incoterm']; ?></td>
                                    <td><?php echo $dataImpExp['observaciones']; ?></td>
                                    <td><a href="../general/listaImp.php?id_imp_exp=<?php echo $dataImpExp['id_imp_exp'] ?>"><i class="fa-solid fa-eye"></i></a></td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    <?php } elseif ($tipoUsu == 5) { ?>

        <!-- search section starts-->
        <?php if (isset($_POST['buscarNroOrden'])) { ?>
            <?php if ($_POST['buscar'] != '') {
                $buscar = $_POST['buscar'];
                $queryImpExp = "SELECT * FROM imp_exp ie WHERE ie.usuario_rut_usuario = '$usuEmpresaM' AND ie.tipo_ie_id_tipoie = 1 AND usutrasportadora = '$razonM' AND nro_orden = '$buscar'";
                $queryImpExpList = mysqli_query($connc, $queryImpExp);
            } else {
                $queryImpExp = "SELECT * FROM imp_exp ie WHERE ie.usuario_rut_usuario = '$usuEmpresaM' AND ie.tipo_ie_id_tipoie = 1 AND usutrasportadora = '$razonM' LIMIT $iniciar,$imp_x_pagina";
                $queryImpExpList = mysqli_query($connc, $queryImpExp);
            } ?>
        <?php } else {
            $queryImpExp = "SELECT * FROM imp_exp ie WHERE ie.usuario_rut_usuario = '$usuEmpresaM' AND ie.tipo_ie_id_tipoie = 1 AND usutrasportadora = '$razonM' LIMIT $iniciar,$imp_x_pagina";
            $queryImpExpList = mysqli_query($connc, $queryImpExp);
        } ?>
        <!-- search section ends-->

        <div class="table-responsive">
            <div class="col-md-8 table-user">
                <table class="table">
                    <thead>
                        <tr>
                            <th>N° de Orden</th>
                            <th>País de Origen</th>
                            <th>País de Destino</th>
                            <th>Embarque</th>
                            <th>Desembarque</th>
                            <th>Incotem</th>
                            <th>Observaciones</th>
                            <th>Ver más</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($queryImpExpList) != 0) { ?>
                            <?php while ($dataImpExp = mysqli_fetch_array($queryImpExpList)) { ?>
                                <tr>
                                    <td><?php echo $dataImpExp['nro_orden']; ?></td>
                                    <td><?php echo $dataImpExp['origen']; ?></td>
                                    <td><?php echo $dataImpExp['destino']; ?></td>
                                    <?php if ($dataImpExp['puerto_areo_embarque'] == NULL) { ?>
                                        <td>Sin información</td>
                                    <?php } else { ?>
                                        <td><?php echo $dataImpExp['puerto_areo_embarque']; ?></td>
                                    <?php } ?>
                                    <?php if ($dataImpExp['puerto_areo_desembarque'] == NULL) { ?>
                                        <td>Sin información</td>
                                    <?php } else { ?>
                                        <td><?php echo $dataImpExp['puerto_areo_desembarque']; ?></td>
                                    <?php } ?>
                                    <td><?php echo $dataImpExp['incoterm']; ?></td>
                                    <td><?php echo $dataImpExp['observaciones']; ?></td>
                                    <td><a href="../general/listaImp.php?id_imp_exp=<?php echo $dataImpExp['id_imp_exp'] ?>"><i class="fa-solid fa-eye"></i></a></td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    <?php } elseif ($tipoUsu == 7) { ?>

        <!-- search section starts-->
        <?php if (isset($_POST['buscarNroOrden'])) { ?>
            <?php if ($_POST['buscar'] != '') {
                $buscar = $_POST['buscar'];
                $queryImpExp = "SELECT * FROM imp_exp ie WHERE ie.usuario_rut_usuario = '$usuEmpresaM' AND ie.tipo_ie_id_tipoie = 1 AND usuaseguradora = '$razonM' AND nro_orden = '$buscar'";
                $queryImpExpList = mysqli_query($connc, $queryImpExp);
            } else {
                $queryImpExp = "SELECT * FROM imp_exp ie WHERE ie.usuario_rut_usuario = '$usuEmpresaM' AND ie.tipo_ie_id_tipoie = 1 AND usuaseguradora = '$razonM' LIMIT $iniciar,$imp_x_pagina";
                $queryImpExpList = mysqli_query($connc, $queryImpExp);
            } ?>
        <?php } else {
            $queryImpExp = "SELECT * FROM imp_exp ie WHERE ie.usuario_rut_usuario = '$usuEmpresaM' AND ie.tipo_ie_id_tipoie = 1 AND usuaseguradora = '$razonM' LIMIT $iniciar,$imp_x_pagina";
            $queryImpExpList = mysqli_query($connc, $queryImpExp);
        } ?>
        <!-- search section ends-->

        <div class="table-responsive">
            <div class="col-md-8 table-user">
                <table class="table">
                    <thead>
                        <tr>
                            <th>N° de Orden</th>
                            <th>País de Origen</th>
                            <th>País de Destino</th>
                            <th>Embarque</th>
                            <th>Desembarque</th>
                            <th>Incotem</th>
                            <th>Observaciones</th>
                            <th>Ver más</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($queryImpExpList) != 0) { ?>
                            <?php while ($dataImpExp = mysqli_fetch_array($queryImpExpList)) { ?>
                                <tr>
                                    <td><?php echo $dataImpExp['nro_orden']; ?></td>
                                    <td><?php echo $dataImpExp['origen']; ?></td>
                                    <td><?php echo $dataImpExp['destino']; ?></td>
                                    <?php if ($dataImpExp['puerto_areo_embarque'] == NULL) { ?>
                                        <td>Sin información</td>
                                    <?php } else { ?>
                                        <td><?php echo $dataImpExp['puerto_areo_embarque']; ?></td>
                                    <?php } ?>
                                    <?php if ($dataImpExp['puerto_areo_desembarque'] == NULL) { ?>
                                        <td>Sin información</td>
                                    <?php } else { ?>
                                        <td><?php echo $dataImpExp['puerto_areo_desembarque']; ?></td>
                                    <?php } ?>
                                    <td><?php echo $dataImpExp['incoterm']; ?></td>
                                    <td><?php echo $dataImpExp['observaciones']; ?></td>
                                    <td><a href="../general/listaImp.php?id_imp_exp=<?php echo $dataImpExp['id_imp_exp'] ?>"><i class="fa-solid fa-eye"></i></a></td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    <?php }  ?>
    <center>
        <ul class="pagination">

            <?php if ($_GET['pagina'] > 1) { ?>
                <li><a href=" importaciones.php?pagina=<?php echo $_GET['pagina'] - 1 ?>"> &laquo;</a></li>
            <?php } else { ?>

            <?php } ?>

            <?php for ($i = 0; $i < $paginas; $i++) : ?>
                <li <?php echo $_GET['pagina'] == $i + 1 ? 'class="active"' : '' ?>>
                    <a href="importaciones.php?pagina=<?php echo $i + 1 ?>">
                        <?php echo $i + 1 ?>
                    </a>
                </li>
            <?php endfor ?>

            <?php if ($_GET['pagina'] < $paginas) { ?>
                <li><a href=" importaciones.php?pagina=<?php echo $_GET['pagina'] + 1 ?>"> &raquo;</a></li>
            <?php } else { ?>

            <?php } ?>
        </ul>
    </center>
</section>
<!--body section ends-->

<!-- footer section starts  -->
<?php include("../../../includes/footer.php"); ?>
<!-- footer section ends -->