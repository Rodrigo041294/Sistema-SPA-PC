<?php
$id_usuario = $_POST['b']; //id agente
if(!empty($id_usuario)) 
{
  cambio($id_usuario);
}

function cambio($b) 
{
	echo '<form action = "../request/eliminar_usuario.php" method = "post">';
	echo '<div class="row"><br><br><br>';
	echo '<input id="id_cliente" name = "id_usuario" type="hidden" value ="'.$b.'" >';
	echo '<div class="input-field col s2 offset-s5">';
    echo '<button class="waves-effect waves-light btn">Eliminar Usuario <i class="material-icons right">send</i></button>';
    echo '</div>';  
	echo '</form>';
}

?>