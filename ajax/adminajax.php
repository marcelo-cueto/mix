<?php
include ('conect.php');

$query='SELECT *
 FROM users ';
$result=mysqli_query($conn, $query);

if(!$result){
  die('Error de conexion: '. mysqli_connect_errno());
}else{
  while($data= mysqli_fetch_assoc($result)){

    $arreglo['data'][]=$data;
  }
  echo json_encode($arreglo);
}

mysqli_free_result($result);
mysqli_close($conn);
