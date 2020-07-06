<?php
include ('conect.php');
//se requiere el archivo para validar los datos de usuario de bdd para conectar
if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip= $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip= $_SERVER['REMOTE_ADDR'];
}

//$ip = '150.192.2.1';//$REMOTE_ADDR
$fecha = date("m.d.y");
$hora = date("h:i:s");
$horau = date("h");
$diau = date("z");
$aniou = date("Y");

//se asignan la variables
$sql = "SELECT aniou, diau, horau, ip FROM contadorn WHERE aniou LIKE '$aniou' AND diau LIKE '$diau' AND horau LIKE '$horau' AND ip LIKE '$ip'";

$es = mysqli_query($conn,$sql);

//se buscan los registros que coincidan con la hora,dia,año e ip
if(mysqli_num_rows($es)>0)
{
}
else
{
$sql1 = "INSERT INTO contadorn (id, ip, fecha, hora, horau, diau, aniou) VALUES (NULL,'$ip','$fecha','$hora','$horau','$diau','$aniou')";
$es1 =mysqli_query($conn,$sql1);

mysqli_close();
}
//creamos el condicionamiendo para logearlo o no.

?>
