<?php

include ('conect.php');

print_r($_POST);

$name=$_POST['name'];
$surname=$_POST['surname'];
$email=$_POST['email'];
$type=$_POST['type'];
$opcion=$_POST['opcion'];
$info=[];



  $query=$query="INSERT INTO suscriptions (name, surname, email, type) VALUES ('$name', '$surname', '$email', '$type')";
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
