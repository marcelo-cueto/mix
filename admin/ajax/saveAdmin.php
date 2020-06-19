<?php
include ('conect.php');


$id=$_POST['id'];
$name=$_POST['name'];

$email=$_POST['email'];
$pass=$_POST['pass']; // type o pass?
$opcion=$_POST['opcion'];

function verify($resultado){
  if(!$resultado){
    $info=2;
  }else{
    $info=1;
  }
  echo json_encode($info);
}
function existe_usuario($email, $conn){
  $query = "SELECT * FROM users WHERE email = '$email'";
  $resultado = mysqli_query($conn, $query);
  $existe_usuario = mysqli_num_rows( $resultado );
  return $existe_usuario;
}
function close($conn){
  mysqli_close($conn);
}
$info=[];
$encrypted_pass = sha1($pass);
switch ($opcion) {
  case 0:
  if( $name != "" && $pass != "" && $email != "" ){

        $query="UPDATE users SET name = '$name', email= '$email', pass='$encrypted_pass' WHERE users.id = '$id'";
        $resutltado=mysqli_query($conn, $query);
        verify($resutltado);
        close($conn);


  }else{
    $info= 4;
    echo json_encode($info);
  }

    break;

  case 1:
  if( $name != "" && $pass != "" && $email != "" ){
      $existe = existe_usuario($email, $conn);
      if($existe>0){
        $info=3;
        echo json_encode($info);
      }else{
        $query="INSERT INTO users (id,name, email, pass) VALUES (NULL,'$name', '$email', '$encrypted_pass')";
        $resutltado=mysqli_query($conn, $query);
        verify($resutltado);
        close($conn);
    }

  }else{
    $info= 4;
    echo json_encode($info);
  }






    break;
}
