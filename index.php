 <?php 
  session_start();

  session_unset();

  session_destroy();
 echo "<script> window.location='html/pages/inicio.php'; </script>";
 ?> 