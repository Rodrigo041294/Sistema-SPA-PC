<?php
require("../connections/conexion.php");

$id_equipo = $_POST['id_equipo_terminar_serv'];
$autoriza = mb_strtoupper($_POST['autoriza'], 'UTF-8');
$observaciones = mb_strtoupper($_POST['observaciones'], 'UTF-8');
$solucion = mb_strtoupper($_POST['solucion'], 'UTF-8');
$fecha = date("Y-m-d H:i");

$sql = "UPDATE servicios SET solucion = '$solucion', observaciones = '$observaciones', autoriza ='$autoriza', fecha_termino_real = '$fecha', estatus = '1' WHERE id = '$id_equipo'";
$resultado = mysqli_query($mysqli, $sql);
if($resultado)
{

     $mesg = "SE FINALIZO EL SERVICIO: ".$id_equipo; 
      $token = "394056872:AAH8b6d5amWo31VrrS854DOnM90BYI1hv8Y";
      $user_id = -278229952;// grupo

      $request_params = [
        'chat_id' => $user_id,
        'text' => $mesg
      ];
      $request_url = 'https://api.telegram.org/bot'.$token.'/sendMessage?'.http_build_query($request_params);
      file_get_contents($request_url);


        session_start();
    $usersistem = $_SESSION['usuario'];
    $dia = date("Y-m-d");
    $hora = date("H:i");
    $mensaje = "SE REGISTRO FINALIZACION DE SERVICIO: ".$id_equipo;
    $query_log = "INSERT INTO logs(fecha, hora, usuario, accion) VALUES ('$dia', '$hora', '$usersistem', '$mensaje')";
    $res_log = mysqli_query($mysqli, $query_log);

        echo '<script>alert ("Salida Registrada")</script>';
        echo "<script>location.href='../interfaces/firma3.php?id=".$id_equipo."'</script>";
    
	
}
else
{
	echo '<script>alert ("Error")</script>';
	echo "error".mysqli_error($mysqli);
	echo "<script>location.href='../interfaces/dashboard.php'</script>";
}

