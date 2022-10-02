<!-- header section starts  -->
<?php include("../../includes/header.php"); ?>
<!-- header section ends -->

<!--body section starts-->
<section>
    <h1 class="heading-title"> Usuarios </h1>
    <div class="text-end">
        <a href="registroUsuario.php" class="btn">Nuevo Usuario Colaborador</a>
        <a href="registroEmpresa.php" class="btn">Nuevo Usuario Externo</a>
    </div>
    <div class="col-md-8 table-user">
        <table class="table">
            <thead>
                <tr>
                    <th>Rut</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Estado</th>
                    <th>Modificar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>11.111.111-2</td>
                    <td>Victor</td>
                    <td>Navarro</td>
                    <td>Ruíz</td>
                    <td>vnavarro@greentrade.cl</td>
                    <td>+56911111111</td>
                    <td>Habilitado</td>
                    <td><a href="editarUsuario.php"><i class="fa-solid fa-user-pen"></i></a></td>
                </tr>
                <tr>
                    <td>11.111.111-2</td>
                    <td>Victor</td>
                    <td>Navarro</td>
                    <td>Ruíz</td>
                    <td>vnavarro@greentrade.cl</td>
                    <td>+56911111111</td>
                    <td>Habilitado</td>
                    <td><a href="editarUsuario.php"><i class="fa-solid fa-user-pen"></i></a></td>
                </tr>
                <tr>
                    <td>11.111.111-2</td>
                    <td>Victor</td>
                    <td>Navarro</td>
                    <td>Ruíz</td>
                    <td>vnavarro@greentrade.cl</td>
                    <td>+56911111111</td>
                    <td>Habilitado</td>
                    <td><a href="editarUsuario.php"><i class="fa-solid fa-user-pen"></i></a></td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<!--body section ends-->

<!-- footer section starts  -->
<?php include("../../includes/footer.php"); ?>
<!-- footer section ends -->