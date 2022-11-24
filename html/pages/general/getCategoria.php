<?php
	require ('../../../database/database.php');
	
	$id_estado = $_POST['id_estado'];

    $sqlSub = ("SELECT * FROM subcategoria WHERE categoria_id_categoria = '$id_estado'");
    $resultadoSub = mysqli_query($connc, $sqlSub);
	
	$html= "<option value=''>Seleccionar mercadería</option>";
	
	while($rowM = $resultadoSub->fetch_assoc())
	{
		$html.= "<option value='".$rowM['id_subcategoria']."'>".$rowM['subcategoria']."</option>";
	}
	
	echo $html;
?>