<?php
require '../../database/database.php';

$nombre = $_POST['nombre'];
$rut = $_POST['rut'];

//$password = password_hash($_POST['contra'], PASSWORD_BCRYPT);
$validarUser = "SELECT rut_usuario, nom_usuario FROM usuario WHERE nom_usuario='" . $_POST['nombre'] . "'";
$sqlexec = mysqli_query($connc, $validarUser);

$sqlcantidad = mysqli_num_rows($sqlexec);
$dataDE = mysqli_fetch_array($sqlexec);

if ($sqlcantidad > 0) {
    if ($nombre == $dataDE['nom_usuario'] && $rut == $dataDE['rut_usuario']) {
        $pasa = 1;
    }
}

if ($pasa == 1) {
    echo "<script>alert('Bien');window.location= '../pages/inicio.php'</script>";
} else {
    echo "<script>alert('Mal');window.location= '../pages/login.php'</script>";
}
?>