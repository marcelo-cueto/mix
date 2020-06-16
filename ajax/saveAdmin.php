<?php
include ('conect.php');

print_r($_POST);
$id=$_POST['id'];
$name=$_POST['name'];

$email=$_POST['email'];
$pass=$_POST['pass']; // type o pass?
$opcion=$_POST['opcion'];

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
  $info=[];


    $encrypted_pass = sha1($pass);
    $query="UPDATE users SET name = '$name', email= '$email', pass='$encrypted_pass' WHERE users.id = '$id'";
    $resutltado=mysqli_query($conn, $query);


    break;

  case 1:
  $info=[];



    $query="INSERT INTO users (id,name, email, pass) VALUES (NULL,'$name', '$email', '$pass')";
    $resutltado=mysqli_query($conn, $query);
    


    break;
}
verify($resultado);
close($conn);
