<?php
include ('conect.php');

print_r($_POST);

$title=$_POST['title'];
$text1=$_POST['text'];
$img='algo.png;'


$info=[];



  $query=$query="INSERT INTO notices (id, title, texto, dates, img) VALUES (NULL,'$title', '$text1', '2020-06-03 15:52:00','$img')";
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
