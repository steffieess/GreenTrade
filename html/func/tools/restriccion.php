<?php
    if (isset($_SESSION['usuarios_rut'])){
            $req = $_SESSION['usuarios_rut'];
        }else{
            echo "<script> window.location='../../pages/general/login_register.php'; </script>";
        die() ;}
?>