<?php
$id_cliente = $_POST['b']; //id agente
if(!empty($id_cliente)) 
{
  cambio($id_cliente);
}

function cambio($b) 
{
	echo '<form action = "../request/eliminar_cliente.php" method = "post">';
	echo '<div class="row"><br><br><br>';
	echo '<input id="id_cliente" name = "id_cliente" type="hidden" value ="'.$b.'" >';
	echo '<div class="input-field col s2 offset-s5">';
    echo '<button class="waves-effect waves-light btn">Eliminar Cliente <i class="material-icons right">send</i></button>';
    echo '</div>';  
	echo '</form>';
}

?>