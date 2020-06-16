<?php

include ('conect.php');

print_r($_POST);
$id=$_POST['id'];
$title=$_POST['title'];
$text=$_POST['text'];

$date=$_POST['date'];

$info=[];



  $query="UPDATE notices SET title = '$title', texto = '$text', dates= NOW() WHERE notices.id = '$id'";
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
