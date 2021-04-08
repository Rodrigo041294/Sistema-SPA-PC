<?php
require("../connections/conexion.php");
$sql = "SELECT * FROM empresas order by nombre ASC";
$sql_usuarios = mysqli_query($mysqli, $sql);
if($sql_usuarios)
{
  while($row = mysqli_fetch_row($sql_usuarios))
  {
    echo '<option value="'.$row[0].'">'.$row[1].'</option>';
  }
}
?>