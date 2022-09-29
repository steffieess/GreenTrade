<?php

session_start();

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'ejemplo';

$connc=mysqli_connect($server,$username,$password,$database);
try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

?>