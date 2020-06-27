<?php

include ('conect.php');

$query='SELECT recomendado, COUNT(*)
FROM suscriptions
GROUP BY recomendado ';
$result=mysqli_query($conn, $query);

if(!$result){
  die('Error de conexion: '. mysqli_connect_errno());
}else{
  while($data= mysqli_fetch_assoc($result)){

    $arreglo['data'][]=$data;
  }

echo json_encode($arreglo);




}

?>
