<?php
require '../../database/database.php';

$mail_usuario = $_POST['correo'];
$clave = $_POST['clave'];
$clave_verify ="";
$pasa = 0;

$validarUser = "SELECT mail_usuario, password FROM usuario WHERE mail_usuario='" . $_POST['correo'] . "'";
$sqlexec = mysqli_query($connc, $validarUser);

$sqlcantidad = mysqli_num_rows($sqlexec);
if ($sqlcantidad > 0) {
    while ($dataDE = mysqli_fetch_array($sqlexec)) {
        if (password_verify($clave, $dataDE['password'])) {
            $pasa = 1;
        }else{
            echo "<script>alert('Contraseña incorrecta');window.location= '../pages/login_register.php'</script>";
        }
    }
    
}else{
    echo "<script>alert('Correo inexistente');window.location= '../pages/login_register.php'</script>";
}

if ($pasa == 1) {
    echo "<script>alert('Ingreso exitoso');window.location= '../pages/login_register.php'</script>";
} else {
    echo "<script>alert('Error al ingresasr');window.location= '../pages/login_register.php'</script>";
}

?>