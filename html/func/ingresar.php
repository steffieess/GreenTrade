<?php
require '../../database/database.php';


$mail_usuario = $_POST['correo'];
$clave = $_POST['clave'];
$clave_verify ="";
$pasa = 0;

$validarUser = "SELECT rut_usuario, mail_usuario, password FROM usuario WHERE mail_usuario='" . $_POST['correo'] . "'";
$sqlexec = mysqli_query($connc, $validarUser);

$sqlcantidad = mysqli_num_rows($sqlexec);
if ($sqlcantidad > 0) {
    while ($dataDE = mysqli_fetch_array($sqlexec)) {
        $rut = $dataDE['rut_usuario'];
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
    $_SESSION['usuarios_rut'] = $rut;
    echo "<script>alert('Ingreso exitoso');window.location= '../pages/homepage.php'</script>";
} else {
    echo "<script>alert('Error al ingresasr');window.location= '../pages/login_register.php'</script>";
}

?>