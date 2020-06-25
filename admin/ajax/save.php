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
if (isset($_POST['contabilidad'])) {
  $cb='si';
}else{
  $cb='no';
}
if (isset($_POST['monotributo'])) {
  $mn='si';
}else{
  $mn='no';
}
if (isset($_POST['autonomos'])) {
  $au='si';
}else{
  $au='no';
}
if (isset($_POST['certificaciones'])) {
  $ce='si';
}else{
  $ce='no';
}
if (isset($_POST['gestion'])) {
  $gs='si';
}else{
  $gs='no';
}
if (isset($_POST['judiciales'])) {
  $jd='si';
}else{
  $jd='no';
}
if (isset($_POST['impuestos'])) {
  $impuestos='si';
}else{
  $impuestos='no';
}
$matricula=$_POST['matricula'];
$otras=$_POST['otras'];
$conocio=$_POST['conocio'];
$comentario=$_POST['coment'];

function verify($resultado){
  if(!$resultado){
    $info=2;
  }else{
    $info=1;
  }
  echo json_encode($info);
}
function existe_usuario($email, $conn){
  $query = "SELECT * FROM suscriptions WHERE email = '$email'";
  $resultado = mysqli_query($conn, $query);
  $existe_usuario = mysqli_num_rows( $resultado );
  return $existe_usuario;
}
function close($conn){
  mysqli_close($conn);
}
$pass=sha1($pass);

switch ($opcion) {
  case 0:
  if( $name != "" && $surname != "" && $email != "" && $profesion != ""  && $conocio!= "" &&
  ($sueldos != 'no' || $sp != 'no' || $mn != 'no' || $impuestos != 'no' ||
   $cb !='no' || $au != 'no' || $ce != 'no' || $gs != 'no'|| $jd != 'no') )
  $query="UPDATE suscriptions SET name = '$name', surname= '$surname', email= '$email', type= '$type', pass='$pass',profesion='$profesion',sueldos='$sueldos',matricula='$matricula',sociedades='$sp',monotributo='$mn',impuestos='$impuestos',
  autonomos='$au', judiciales='$jd',gestion='$gs', certificaciones='$ce', contabilidad='$cb', otras='$otras', recomendado='$conocio', comentario='$comentario'
  WHERE suscriptions.id = '$id'";
  $resutltado=mysqli_query($conn, $query);
  verify($resutltado);
  close($conn);
}else{
  $info= 4;
  echo json_encode($info);
}
  break;

  case 1:
  if( $name != "" && $surname != "" && $email != "" && $profesion != ""  && $conocio!= "" &&
  ($sueldos != 'no' || $sp != 'no' || $mn != 'no' || $impuestos != 'no' ||
   $cb !='no' || $au != 'no' || $ce != 'no' || $gs != 'no'|| $jd != 'no') ){
      $existe = existe_usuario($email, $conn);
      if($existe>0){
        $info=3;
        echo json_encode($info);
      }else{
        $query="INSERT INTO suscriptions
        (name, surname,tel, email, type, pass, profesion,sueldos,matricula,sociedades,monotributo,impuestos, autonomos, judiciales,gestion, certificaciones, contabilidad, otras, recomendado, comentario)
         VALUES
         ('$name', '$surname','$tel', '$email', '$type', '$pass','$profesion',
            '$sueldos','$matricula','$sp','$mn','$impuestos', '$au', '$jd', '$gs', '$ce','$cb','$otras','$conocio', '$comentario')";
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
