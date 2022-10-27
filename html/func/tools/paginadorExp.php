<?php
if ($tipoUsu == 1 || $tipoUsu == 2) {
    
    $queryP = "SELECT * FROM imp_exp ie WHERE ie.usuario_rut_usuario = '$usuEmpresaM' AND ie.tipo_ie_id_tipoie = 2";
    $queryImpP = mysqli_query($connc, $queryP);

    $imp_x_pagina = 10;

    $total_imp_bd = mysqli_num_rows($queryImpP);

    $paginas = $total_imp_bd / $imp_x_pagina;
    $paginas = ceil($paginas);

    if(!$_GET){
        echo "<script> window.location='exportaciones.php?pagina=1'; </script>";
    }

    if($_GET['pagina'] == '' ){
        echo "<script> window.location='exportaciones.php?pagina=1'; </script>";
    }

    if($_GET['pagina'] < 1){
        echo "<script> window.location='exportaciones.php?pagina=1'; </script>";
    }

    $iniciar = ($_GET['pagina']-1)* $imp_x_pagina;
}elseif ($tipoUsu == 3) {
    $queryP = "SELECT * FROM imp_exp ie WHERE ie.usuario_rut_usuario = '$usuEmpresaM' AND ie.tipo_ie_id_tipoie = 2 AND usuproveedor = '$razonM'";
    $queryImpP = mysqli_query($connc, $queryP);

    $imp_x_pagina = 10;

    $total_imp_bd = mysqli_num_rows($queryImpP);

    $paginas = $total_imp_bd / $imp_x_pagina;
    $paginas = ceil($paginas);

    if(!$_GET){
        echo "<script> window.location='exportaciones.php?pagina=1'; </script>";
    }

    if($_GET['pagina'] == '' ){
        echo "<script> window.location='exportaciones.php?pagina=1'; </script>";
    }

    if($_GET['pagina'] < 1){
        echo "<script> window.location='exportaciones.php?pagina=1'; </script>";
    }

    $iniciar = ($_GET['pagina']-1)* $imp_x_pagina;
} elseif ($tipoUsu == 5) {
    $queryP = "SELECT * FROM imp_exp ie WHERE ie.usuario_rut_usuario = '$usuEmpresaM' AND ie.tipo_ie_id_tipoie = 2 AND usutrasportadora = '$razonM'";
    $queryImpP = mysqli_query($connc, $queryP);

    $imp_x_pagina = 10;

    $total_imp_bd = mysqli_num_rows($queryImpP);

    $paginas = $total_imp_bd / $imp_x_pagina;
    $paginas = ceil($paginas);

    if(!$_GET){
        echo "<script> window.location='exportaciones.php?pagina=1'; </script>";
    }

    if($_GET['pagina'] == '' ){
        echo "<script> window.location='exportaciones.php?pagina=1'; </script>";
    }

    if($_GET['pagina'] < 1){
        echo "<script> window.location='exportaciones.php?pagina=1'; </script>";
    }

    $iniciar = ($_GET['pagina']-1)* $imp_x_pagina;
} elseif ($tipoUsu == 7) {
    $queryP = "SELECT * FROM imp_exp ie WHERE ie.usuario_rut_usuario = '$usuEmpresaM' AND ie.tipo_ie_id_tipoie = 2 AND usuaseguradora = '$razonM'";
    $queryImpP = mysqli_query($connc, $queryP);

    $imp_x_pagina = 10;

    $total_imp_bd = mysqli_num_rows($queryImpP);

    $paginas = $total_imp_bd / $imp_x_pagina;
    $paginas = ceil($paginas);

    if(!$_GET){
        echo "<script> window.location='exportaciones.php?pagina=1'; </script>";
    }

    if($_GET['pagina'] == '' ){
        echo "<script> window.location='exportaciones.php?pagina=1'; </script>";
    }

    if($_GET['pagina'] < 1){
        echo "<script> window.location='exportaciones.php?pagina=1'; </script>";
    }

    $iniciar = ($_GET['pagina']-1)* $imp_x_pagina;
}
    
?>