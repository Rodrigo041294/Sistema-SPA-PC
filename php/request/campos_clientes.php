<?php
$id_cliente = $_POST['b'];


if(!empty($id_cliente)) 
{
  cambio($id_cliente);
}

function cambio($b) 
{
	$nombre;
	$direccion;
	$telefono1;
	$telefono2;
	$email;

	require("../connections/conexion.php");

	$sql_datos_cliente = "SELECT * FROM clientes WHERE id = '".$b."'";
	$res_datos = mysqli_query($mysqli, $sql_datos_cliente);
	if($res_datos)
	{
		while($row = mysqli_fetch_row($res_datos))
		{
			$nombre = $row[1];
			$direccion = $row[2];
			$telefono1 = $row[3];
			$telefono2 = $row[4];
			$email = $row[5];

		}
	}
	
	echo '<form action = "../request/editar_cliente.php" method = "post">';
	echo '<div class="row">';

	echo '<input id="id_cliente" name = "id_cliente" type="hidden" value ="'.$b.'" >';
	echo '<div class="input-field col s6">';
	echo '<input id="nombre" name = "nombre" type="text" class="validate" value ="'.$nombre.'" >';
	echo '<label class="active" for="nombre">Nombre:</label>';
	echo '</div>';

	echo '<div class="input-field col s6">';
	echo '<input id="direccion" name = "direccion" type="text" class="validate" value ="'.$direccion.'" >';
	echo '<label class="active" for="direccion">Direccion</label>';
	echo '</div>';
	echo '</div>';//div row

	echo '<div class="row">';
	echo '<div class="input-field col s2">';
	echo '<input id="telefono1" name = "telefono1" type="text" class="validate" value ="'.$telefono1.'" >';
	echo '<label class="active" for="telefono1">Telefono:</label>';
	echo '</div>';

	echo '<div class="input-field col s2">';
	echo '<input id="telefono2" name = "telefono2" type="text" class="validate" value ="'.$telefono2.'" >';
	echo '<label class="active" for="telefono2">Telefono 2:</label>';
	echo '</div>';

	echo '<div class="input-field col s8">';
	echo '<input id="email" name = "email" type="email" class="validate" value ="'.$email.'" >';
	echo '<label class="active" for="email">Email:</label>';
	echo '</div>';
	echo '</div>';//div row
	echo '<div class="input-field col s12">';
    echo '<button class="waves-effect waves-light btn" style = "float: right;">Actualizar <i class="material-icons right">send</i></button>';
    echo '</div>';  
	echo '</form>';


}
