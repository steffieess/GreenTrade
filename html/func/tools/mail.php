<?php
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

$validarUser = "SELECT id_imp_exp, nro_orden, usuaseguradora, estado, nro_reserva, fecha_edt, fecha_eta, nro_doctrasporte, fecha_doctrasporte, tipo_ie_id_tipoie, usuario_rut_usuario, fecha_creacion, fecha_cierre FROM imp_exp WHERE estado='Vigente'";
$sqlexec = mysqli_query($connc, $validarUser);


$sqlcantidad = mysqli_num_rows($sqlexec);
if ($sqlcantidad > 0) {
    
    while ($dataDE = mysqli_fetch_array($sqlexec)) {
        $id = $dataDE['id_imp_exp'];
        $orden = $dataDE['nro_orden'];
        $aseguradora = $dataDE['usuaseguradora'];
        $estado = $dataDE['estado'];
        $reserva = $dataDE['nro_reserva'];
        $edt = $dataDE['fecha_edt'];
        $eta = $dataDE['fecha_eta'];
        $transporte = $dataDE['nro_doctrasporte'];
        $fecha_transporte = $dataDE['fecha_doctrasporte'];
        $tipo = $dataDE['tipo_ie_id_tipoie'];
        $usuario = $dataDE['usuario_rut_usuario'];
        $creacion = $dataDE['fecha_creacion'];
        $cierre = $dataDE['fecha_cierre'];

        //si es una importación
        if($tipo == 1){
            //$time = strtotime($creacion);

            //$newformat = date('Y-m-d',$time);
            //echo $newformat;
            $Date =  date('Y-m-d ');
            //echo $Date;
            //$diferencia_en_dias = $newformat->diffInDays($Date);
            //echo $diferencia_en_dias;
            
            $date1 = new DateTime($creacion);
            $date2 = new DateTime($Date);
            $diff = $date1->diff($date2);
            // will output 2 days
            echo $diff->days . ' days ';
            //Alerta de reserva
            if($diff == 4){
                //si han pasado 4 dias y no existe reserva o fecha ETD
                if($reserva != NULL || $edt){
                    $destinatario = "v.rosendo@profesor.duoc.cl"; 
                    $asunto = "Alerta de Reserva"; 
                    $cuerpo = ' 
                    <html> 
                    <head> 
                    <title>Alerta de Reserva</title> 
                    </head> 
                    <body> 
                    <h1>Hola amigos!</h1> 
                    <p> 
                    <b>Bienvenidos a mi correo electrónico de prueba</b>. Estoy encantado de tener tantos lectores. Este cuerpo del mensaje es del artículo de envío de mails por PHP. Habría que cambiarlo para poner tu propio cuerpo. Por cierto, cambia también las cabeceras del mensaje. 
                    </p> 
                    </body> 
                    </html> 
                    '; 

                    //para el envío en formato HTML 
                    $headers = "MIME-Version: 1.0\r\n"; 
                    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

                    //dirección del remitente 
                    $headers .= "From: GreenTrade <noresponder@greentradechile.com>\r\n"; 


                    mail($destinatario,$asunto,$cuerpo,$headers);
                }
            }
        }
    }
}


session_destroy();
?>