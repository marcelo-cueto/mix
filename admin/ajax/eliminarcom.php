<?php

include ('conect.php');

print_r($_POST);
$id=$_POST['id'];


$info=[];




  $query="DELETE FROM coments WHERE id='$id'";
  $resutltado=mysqli_query($conn, $query);
  verify($resultado);
  close($conn);

function verify($resultado){
  if(!$resultado){
    $info['respuesta']='BIEN';
  }else{
    $info['respuesta']='ERROR';
  }
  echo json_encode($info);
}
function close($conn){
  mysqli_close($conn);
}
