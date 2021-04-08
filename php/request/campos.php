<?php

$usuario = $_POST['b'];
$usuario;
$nivel;

if(!empty($usuario)) 
{
  cambio($usuario);
}

function cambio($b) 
{
	$rol;
	require("../connections/conexion.php");
	$sql_datos_usuario = "SELECT usuario, password, nivel FROM usuarios WHERE id = '".$b."'";
	$res_datos = mysqli_query($mysqli, $sql_datos_usuario);
		if($res_datos)
		{
			while($row = mysqli_fetch_row($res_datos))
			{
				
				$usuario = $row[0];
				$nivel = $row[2];
			}
		}
		switch ($nivel) 
		{
			case '1':
				$rol = "Capturista";
				break;

			case '2':
				$rol = "Administrador";
				break;
		}
	echo '<form action = "../request/editar_usuario.php" method = "post">';
	echo '<div class="row">';
	echo '<input id="id_usuario" name = "id_usuario" type="hidden" value ="'.$b.'" >';
	echo '<div class="input-field col s4">';
	echo '<i class="material-icons prefix">person</i>';
	echo '<input id="usuario" name = "usuario" type="text" class="validate" value ="'.$usuario.'" >';
	echo '<label class="active" for="usuario">Nombre de usuario</label>';
	echo '</div>';

	echo '<div class="input-field col s4">';
	//echo '<i class="material-icons prefix">vpn_key</i>';
	echo '<input id="password" name = "password" type="password" class="validate">';
	echo '<label class="active" for="password">Nueva contraseña</label>';
	echo '</div>';

	echo '<div class="input-field col s4">';
	echo '<select name="rol" id="rol" class="browser-default">';
	echo '<option value="'.$nivel.'">'.$rol.'</option>';
	echo '<option value="">-------------</option>';
	echo '<option value="0">Consultor</option>';
	echo '<option value="1">Capturista</option>';
	echo '<option value="2">Administrador</option>';
	echo '</select>';
	echo '</div>';
	echo '</div>';  
	echo '<div class="input-field col s12">';
    echo '<button class="waves-effect waves-light btn" style = "float: right;">Actualizar <i class="material-icons right">send</i></button>';
    echo '</div>';  
	echo '</form>';
}

?>