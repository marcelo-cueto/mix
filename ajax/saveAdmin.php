<?php
include ('conect.php');

print_r($_POST);
$id=$_POST['id'];
$name=$_POST['name'];

$email=$_POST['email'];
$type=$_POST['pass'];

$info=[];



  $query="UPDATE users SET name = '$name', email= '$email', pass= '$pass' WHERE users.id = '$id'";
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