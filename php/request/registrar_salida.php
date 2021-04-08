<?php
require("../connections/conexion.php");
require("../request/enviar_correo.php");
$id_equipo = $_POST['id_equipo'];
$recibe = mb_strtoupper($_POST['recibe'], 'UTF-8');
$entrega = mb_strtoupper($_POST['entrega'], 'UTF-8');
$costo = $_POST['costo'];
$observaciones = mb_strtoupper($_POST['observaciones'], 'UTF-8');
$fecha = date("d/m/Y");
$equipo;
$marca;
$modelo;
$entrego;
$solucion;
$id_cliente;
$sql = "INSERT INTO salidas(id, recibe, entrega, costo, observaciones, fecha, id_equipo) VALUES ('".$id_equipo."','".$recibe."','".$entrega."','".$costo."','".$observaciones."','".$fecha."','".$id_equipo."')";
$resultado = mysqli_query($mysqli, $sql);
if($resultado)
{

	$sql_update = "UPDATE equipos_revision SET estado = 'ENTREGADO', id_salida = '".$id_equipo."' WHERE id = '".$id_equipo."'";
	$res = mysqli_query($mysqli, $sql_update);
	if($res)
	{

    $datos = "SELECT * FROM equipos_revision WHERE id = '$id_equipo'";
    $res_datos = mysqli_query($mysqli, $datos);
    if($res_datos)
    {
      while($rw = mysqli_fetch_row($res_datos))
      {
        $equipo = $rw[2];
        $marca = $rw[3];
        $modelo = $rw[4];
        $id_cliente = $rw[8];
      }
      $nombre_cliente;
      $tel1;
      $tel2;
      $sql_datos = "SELECT * FROM clientes WHERE id = '".$id_cliente."'";
      $res_datos = mysqli_query($mysqli, $sql_datos);
      if($res_datos)
      {
        while($row = mysqli_fetch_row($res_datos))
        {
          $nombre_cliente = $row[1];
          $tel1 = $row[3];
          $tel2 = $row[4];
        }
      }
      else
      {
        echo mysqli_error($mysqli);
      }
     $mesg = $fecha.' '.$equipo.' '.$marca.' '.$modelo.' ENTREGADO POR: '.$entrega.' A: '.$recibe.'. NUMERO DE ORDEN: '.$id_equipo.' CON SOLUCION: '.$observaciones.', COSTO: $'.$costo.',  CLIENTE: '.$nombre_cliente.' TELEFONO: '.$tel1.' - '.$tel2; 
      $token = "394056872:AAH8b6d5amWo31VrrS854DOnM90BYI1hv8Y";
      $user_id = -278229952;// grupo

      $request_params = [
        'chat_id' => $user_id,
        'text' => $mesg
      ];
      $request_url = 'https://api.telegram.org/bot'.$token.'/sendMessage?'.http_build_query($request_params);
      file_get_contents($request_url);

        enviar_correo_salida($id_cliente, $id_equipo);

        session_start();
    $usersistem = $_SESSION['usuario'];
    $dia = date("Y-m-d");
    $hora = date("H:i");
    $mensaje = "SE REGISTRO SALIDA O.S: ".$id_equipo;
    $query_log = "INSERT INTO logs(fecha, hora, usuario, accion) VALUES ('$dia', '$hora', '$usersistem', '$mensaje')";
    $res_log = mysqli_query($mysqli, $query_log);

        echo '<script>alert ("Salida Registrada")</script>';
        echo "<script>location.href='../interfaces/firma.php?id=".$id_equipo."'</script>";
    }
    
	}
	else
		{
			echo '<script>alert ("Error 2")</script>';
			echo "error".mysqli_error($mysqli);
			echo "<script>location.href='../interfaces/dashboard.php'</script>";
		}
	
}
else
{
	echo '<script>alert ("Error")</script>';
	echo "error".mysqli_error($mysqli);
	echo "<script>location.href='../interfaces/dashboard.php'</script>";
}

