<?php
require '../mantenedor/mantenedor.php';

if (isset($_POST['editImp'])) {
    $nro_orden = $_POST['newnroOrdenImp'];

    if ($tipoUsu == 1 || $tipoUsu == 2){
        

    }else if($tipoUsu == 3){

    }else if($tipoUsu == 5){

    }else if($tipoUsu == 7){

    }


}else {
    $_SESSION['message'] = 'Error';
    $_SESSION['message_type'] = 'Error';
    echo "<script> window.location='../../pages/general/importaciones.php'; </script>";
}
