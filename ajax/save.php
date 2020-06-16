<?php

include ('conect.php');

print_r($_POST);
$id=$_POST['id'];
$name=$_POST['name'];
$surname=$_POST['surname'];
$email=$_POST['email'];
$type=$_POST['type'];
$opcion=$_POST['opcion'];
$info=[];
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
  $query="UPDATE suscriptions SET name = '$name', surname= '$surname', email= '$email', type= $type WHERE suscriptions.id = '$id'";
  $resutltado=mysqli_query($conn, $query);
  break;

  case 1:
  $query="INSERT INTO suscriptions (name, surname, email, type) VALUES ('$name', '$surname', '$email', '$type')";
  $resutltado=mysqli_query($conn, $query);
    break;
}


  verify($resultado);
  close($conn);
