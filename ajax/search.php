<?php
include ('conect.php');

$name=$_POST['name'];
$surname=$_POST['apellido'];
$email=$_POST['email'];
$tel=$_POST['tel'];
$dir=$_POST['dir'];
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

$comentario=$_POST['coment'];

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


if( $name != "" && $surname != "" && $email != "" && $profesion != ""   ){

      $query="INSERT INTO clientes
      (id,name, apellido,tel, email, direccion, profesion,sueldos,sociedades,monotributo,impuestos, autonomos, judiciales,gestion, certificaciones, contabilidad, comentario)
       VALUES
       (NULL,'$name', '$surname','$tel', '$email','$dir','$profesion',
          '$sueldos','$sp','$mn','$impuestos', '$au', '$jd', '$gs', '$ce','$cb', '$comentario')";
      $resutltado=mysqli_query($conn, $query);
      verify($resutltado);
      close($conn);
  }
