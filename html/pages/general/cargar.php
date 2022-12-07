<?php

session_start();

$server = 'localhost';
$username = 'greentr1_GreenTrade';
$password = 'WpkU-2X_XlHo';
$database = 'greentr1_GreenTrade';

$connc=mysqli_connect($server,$username,$password,$database);
try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}
    $id_documento = $_GET['id'];
    $queryDoc1 = "SELECT * FROM documento WHERE id_documento = '$id_documento'";
    $queryeditDoc1 = mysqli_query($connc, $queryDoc1);
    if (mysqli_num_rows($queryeditDoc1) == 1) {
        $row = mysqli_fetch_array($queryeditDoc1);
        $tipo = "application/pdf";
        $nombre = $row['nom_documento'];
        $archivo = $row['documento'];
        $valor_tipo = "Content-type:$tipo";
        header("Content-type:$tipo");
        header("Content-Disposition:inline;filename=$nombre.$tipo");
        echo $archivo;
    }

