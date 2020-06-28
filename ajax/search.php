<?php
include ('conect.php');

// Datos para pago
$name=$_POST['name'];
$surname=$_POST['apellido'];
$email=$_POST['email'];
$tel=$_POST['tel'];
$dir=$_POST['dir'];
$profesion=$_POST['profesion'];

// Datos para email
$eol = PHP_EOL;
$mensaje = 'Hay una nueva busqueda de profesional' . $eol . $eol;
$mensaje .= 'Nombre: ' . $name . $eol;
$mensaje .= 'Apellido: ' . $surname . $eol;
$mensaje .= 'E-mail: ' . $email . $eol;
$mensaje .= 'Dirección: ' . $dir . $eol;
$mensaje .= 'Tel: ' . $tel . $eol;
$mensaje .= 'Profesional buscado: ' . $profesion . $eol;
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
$comentario=$_POST['coment'];

// Datos para email
$mensaje .= 'Comentarios: ' . $_POST['coment'] . $eol;

print_r($mensaje);

$header = 'From: no-responder@enlaceprofesional.com.ar' . $eol;
$header .= 'Reply-To: info@enlaceprofesional.com.ar' . $eol;
$header .= 'X-Mailer: PHP/' . phpversion();
//$mail = mail('info@enlaceprofesional.com.ar', 'Busqueda de profesional', $mensaje, $header);

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
