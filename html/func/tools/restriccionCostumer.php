<?php
    if (isset($_SESSION['usuarios_rut'])){
        if($tipoUsu == 1 || $tipoUsu == 2){
        }else{
            echo "<script> window.location='../../pages/general/login_register.php'; </script>";
            die() ; 
        }
    }else{
        echo "<script> window.location='../../pages/general/login_register.php'; </script>";
        die() ;
    }
?>