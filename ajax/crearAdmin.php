<?php

include ('conect.php');

print_r($_POST);

$name=$_POST['name'];

$email=$_POST['email'];
$pass=$_POST['pass'];

$info=[];



  $query="INSERT INTO users (id, name, email, pass) VALUES (NULL, '$name', '$email', '$pass')";
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
