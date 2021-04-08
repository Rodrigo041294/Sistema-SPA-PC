<?php
require("../connections/conexion.php");
$contador_mensajes;
$sql_msj = "SELECT * FROM mensajes WHERE estatus = '0'";
$res_msj = mysqli_query($mysqli, $sql_msj);
$c1 = mysqli_num_rows($res_msj);
if($res_msj)
{
	if($c1 > 0)
	{
		echo '<div class="row">';
		while($row = mysqli_fetch_row($res_msj))
		{
			echo '<div class="col s6 m6">
          <div class="card #1e88e5 blue darken-1">
            <div class="card-content white-text">
              <span class="card-title">'.$row[2].'</span><label style = "color: white; ">'.$row[6]." ".$row[7].'</label>
              <p>'.$row[5].'</p>
            </div>
            <div class="card-action">
              <a href="../request/leido.php?id='.$row[0].'" style = "color: white; ">Contestado</a>
              <a href="tel:+'.$row[3].'" style = "color: white; ">Llamar Telefono 1</a>';
              if($row[4] == "")
              {

              }
              else
              {
              	echo '<a href="tel:+'.$row[3].'" style = "color: white; ">Llamar Telefono 2</a>';
              }
            echo '</div>
          </div>
        </div>';
		}
		echo '</div>';
   
	}
}



?>