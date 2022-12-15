<!-- header section starts  -->
<?php include("../../../includes/header.php"); ?>
<!-- header section ends -->
<!-- restrccion section starts  -->
<?php include("../../func/tools/restriccion.php"); ?>
<!-- restrccion section ends -->

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
<section class="usuario">
    <div class="container-usuario">
        <article class="fondo-usuario">
            <img src="../../img/usuario.png" alt="">
            <h1 class="heading-title">Buenas Tardes, <?php echo utf8_encode($nombreP) ?></h1>
        </article>
    </div>
</section>
<!--body section ends-->
<?php

$queryImpE = "SELECT SUM(REPLACE(peso_total_papel,'(g)','')) AS Peso FROM imp_exp";
$queryImpEList = mysqli_query($connc, $queryImpE);

$row = mysqli_fetch_array($queryImpEList);
$peso_total_papel = $row['Peso'];

$queryDocu = "SELECT SUM(nro_paginas) AS PesoDoc FROM documento";
$queryDocuList = mysqli_query($connc, $queryDocu);

$row = mysqli_fetch_array($queryDocuList);
$PesoDoc = $row['PesoDoc'];
$PesoDoc = $PesoDoc * 4.31;
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Peso físico', <?php echo $peso_total_papel ?>],
            ['Peso digital', <?php echo $PesoDoc ?>]
        ]);

        var options = {
            colors: ['#FF0000', '#7DBC66'],
            pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>
<center>
<?php if($peso_total_papel != 0 || $PesoDoc != 0){ ?>
    <h3>Tu reducción de huella de carbono es:</h3>
    <div id="piechart" style="width: 700px; height: 400px;"></div>
<?php } ?>
</center>

<!-- footer section starts  -->
<?php include("../../../includes/footer.php"); ?>
<!-- footer section ends -->