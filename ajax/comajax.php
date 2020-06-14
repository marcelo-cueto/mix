<?php
include ('conect.php');

$query='SELECT c.id as coment_id,
c.coment as comentario,
c.datetime as fecha,
n.id as notice_id,
n.title as titulo,
s.id as sus_id,
s.name as suscriptor
 FROM coments as c
 INNER JOIN notices as n
 ON c.notice_id = n.id
 INNER JOIN suscriptions as s
 ON c.idsuscriptor = s.id
 ';
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
