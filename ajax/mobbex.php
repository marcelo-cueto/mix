<?php

include ('conect.php');

// Datos para pago
$dni=$_POST['dni'];
$name=$_POST['name'];
$surname=$_POST['apellido'];
$email=$_POST['email'];
$tel=$_POST['tel'];
$type=0;
$pass=$_POST['pass'];
$profesion=$_POST['profesion'];

// Datos para email
$eol = PHP_EOL;
$mensaje = 'Hay un nuevo profesional suscripto' . $eol . $eol;
$mensaje .= 'Nombre: ' . $name . $eol;
$mensaje .= 'Apellido: ' . $surname . $eol;
$mensaje .= 'E-mail: ' . $email . $eol;
$mensaje .= 'DNI: ' . $dni . $eol;
$mensaje .= 'Tel: ' . $tel . $eol;
$mensaje .= 'Profesión: ' . $profesion . $eol;
$mensaje .= 'Especialista en:';

// Datos para pago y mail
if (isset($_POST['sueldos'])) {
  $sueldos='si';
  $mensaje .= ' sueldos';
}else{
  $sueldos='no';
}
if (isset($_POST['sociedad_pyme'])) {
  $sp='si';
  $mensaje .= ' sociedad_pyme';
}else{
  $sp='no';
}
if (isset($_POST['contabilidad'])) {
  $cb='si';
  $mensaje .= ' contabilidad';
}else{
  $cb='no';
}
if (isset($_POST['monotributo'])) {
  $mn='si';
  $mensaje .= ' monotributo';
}else{
  $mn='no';
}
if (isset($_POST['autonomos'])) {
  $au='si';
  $mensaje .= ' autonomos';
}else{
  $au='no';
}
if (isset($_POST['certificaciones'])) {
  $ce='si';
  $mensaje .= ' certificaciones';
}else{
  $ce='no';
}
if (isset($_POST['gestion'])) {
  $gs='si';
  $mensaje .= ' gestion';
}else{
  $gs='no';
}
if (isset($_POST['judiciales'])) {
  $jd='si';
  $mensaje .= ' judiciales';
}else{
  $jd='no';
}
if (isset($_POST['impuestos'])) {
  $impuestos='si';
  $mensaje .= ' impuestos';
}else{
  $impuestos='no';
}

// Datos para pago
$otras=$_POST['otras'];
$matricula=$_POST['matricula'];
$conocio=$_POST['conocio'];
$comentario=$_POST['coment'];

// Datos para mail
$mensaje .= ' '.$otras;
$mensaje .= $eol;
$mensaje .= 'Matrícula: ' . $matricula . $eol;
$mensaje .= 'Cómo nos conoció: ' . $conocio . $eol;
$mensaje .= 'Comentarios: ' . $comentario . $eol;

print_r($mensaje);

$header = 'From: no-responder@enlaceprofesional.com.ar' . $eol;
$header .= 'Reply-To: info@enlaceprofesional.com.ar' . $eol;
$header .= 'X-Mailer: PHP/' . phpversion();
//$mail = mail('info@enlaceprofesional.com.ar', 'Profesional suscripto', $mensaje, $header);

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
if( $name != "" && $surname != "" && $email != "" && $profesion != ""  && $conocio!= "" && $dni!= "" &&
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
