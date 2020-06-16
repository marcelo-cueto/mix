<?php

include ('conect.php');

print_r($_POST);
$id=$_POST['id'];
$title=$_POST['title'];
$text=$_POST['text'];
$img='algo.png';
$date=$_POST['date'];
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
switch ($opcion) {
  case 0:
    $query="UPDATE notices SET title = '$title', texto = '$text', dates= NOW() WHERE notices.id = '$id'";
    $resutltado=mysqli_query($conn, $query);
  break;

  case 1:
    $query="INSERT INTO notices (id,title, img, texto, dates, autor) VALUES (NULL,'$title','algo.png' , '$text', '2020/06/16',$autor)";
    $resutltado=mysqli_query($conn, $query);
    break;
}






  verify($resultado);
  close($conn);
