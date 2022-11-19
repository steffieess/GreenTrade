<?php
if ($tipoUsu == 9) {
    
    $queryP = "SELECT * FROM imp_exp ie";
    $queryImpP = mysqli_query($connc, $queryP);

    $imp_x_pagina = 10;

    $total_imp_bd = mysqli_num_rows($queryImpP);

    $paginas = $total_imp_bd / $imp_x_pagina;
    $paginas = ceil($paginas);

    if(!$_GET){
        echo "<script> window.location='cambioImpExp.php?pagina=1'; </script>";
    }

    if($_GET['pagina'] == '' ){
        echo "<script> window.location='cambioImpExp.php?pagina=1'; </script>";
    }

    if($_GET['pagina'] < 1){
        echo "<script> window.location='cambioImpExp.php?pagina=1'; </script>";
    }

    $iniciar = ($_GET['pagina']-1)* $imp_x_pagina;
}
    
?>