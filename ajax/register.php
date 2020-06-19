<?php

include ('conect.php');

$name=$_POST['name'];
$surname=$_POST['apellido'];
$email=$_POST['email'];
$tel=$_POST['tel'];
$type=0;
$pass=$_POST['pass'];
$profesion=$_POST['profesion'];
if (isset($_POST['sueldos'])) {
  $sueldos='si';
}else{
  $sueldos='no';
}
if (isset($_POST['sociedad_pyme'])) {
  $sp='si';
}else{
  $sp='no';
}
if (isset($_POST['monotributo_autonomos'])) {
  $mn='si';
}else{
  $mn='no';
}
if (isset($_POST['impuestos'])) {
  $impuestos='si';
}else{
  $impuestos='no';
}
$matricula=$_POST['matricula'];


function verify($resultado){
  if(!$resultado){
    $info=2;
  }else{
    $info=1;
  }
  echo json_encode($info);
}
function close($conn){
  mysqli_close($conn);
}
function existe_usuario($email, $conn){
  $query = "SELECT * FROM suscriptions WHERE email = '$email'";
  $resultado = mysqli_query($conn, $query);
  $existe_usuario = mysqli_num_rows( $resultado );
  return $existe_usuario;
}

$pass=sha1($pass);
if( $name != "" && $surname != "" && $email != "" && $profesion != "" && $matricula != "" && ($sueldos != 'no' || $sp != 'no' || $mn != 'no' || $impuestos != 'no') ){
    $existe = existe_usuario($email, $conn);
    if($existe>0){
      $info=3;
      echo json_encode($info);
    }else{
      $query="INSERT INTO suscriptions (name, surname,tel, email, type, pass, profesion,sueldos,matricula,sociedad_pyme,monotributo_autonomos,impuestos) VALUES ('$name', '$surname','$tel', '$email', '$type', '$pass','$profesion','$sueldos','$matricula','$sp','$mn','$impuestos')";
      $resutltado=mysqli_query($conn, $query);
      verify($resutltado);
      close($conn);
  }

}else{
  $info= 4;
  echo json_encode($info);
}
