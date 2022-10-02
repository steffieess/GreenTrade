<!-- header section starts  -->
<?php include("../../includes/header.php"); ?>
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
<section>
    <h1 class="heading-title"> Empresas </h1>
    <div class="text-end">
        <a href="registroEmpresa.php" class="btn">Crear nueva Empresa</a>
    </div>
    <div class="table-responsive">
    <div class="col-md-8 table-user">
        <table class="table">
            <thead>
                <tr>
                    <th>Tipo Empresa</th>
                    <th>Razón Social</th>
                    <th>Dirección Empresa</th>
                    <th>Teléfono Empresa</th>
                    <th>Correo Empresa</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>aa</td>
                    <td>Deportes</td>
                    <td>Calle Nueva 0610<i class="fa-solid fa-pen-to-square"></i></td>
                    <td>+56976809134<i class="fa-solid fa-pen-to-square"></i></td>
                    <td>empresa@empresa.cl<i class="fa-solid fa-pen-to-square"></i></td>
                </tr>
                <tr>
                    <td>aa</td>
                    <td>Deportes</td>
                    <td>Calle Nueva 0610<i class="fa-solid fa-pen-to-square"></i></td>
                    <td>+56976809134<i class="fa-solid fa-pen-to-square"></i></td>
                    <td>empresa@empresa.cl<i class="fa-solid fa-pen-to-square"></i></td>
                </tr>
                <tr>
                    <td>aa</td>
                    <td>Deportes</td>
                    <td>Calle Nueva 0610<i class="fa-solid fa-pen-to-square"></i></td>
                    <td>+56976809134<i class="fa-solid fa-pen-to-square"></i></td>
                    <td>empresa@empresa.cl<i class="fa-solid fa-pen-to-square"></i></td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
</section>

<!--body section ends-->

<!-- footer section starts  -->
<?php include("../../includes/footer.php"); ?>
<!-- footer section ends -->