<?php
include ('conect.php');

$query='SELECT n.id as notice_id,
n.title as titulo,
n.texto as texto,
n.dates as fecha,
u.id as user_id,
u.name as nombre
 FROM notices as n
 INNER JOIN users as u
 ON u.id = n.autor ';
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
