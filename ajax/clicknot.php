<?php
include ('conect.php');
$where=$_POST['where'];

if($where=='not'){

  $q="UPDATE clicks SET noticias=noticias+1 WHERE id='1'";
  $resultado=mysqli_query($conn,$q);
}elseif($where=='sus'){

  $q="UPDATE clicks SET suscriptores=suscriptores+1 WHERE id='1'";
  $resultado=mysqli_query($conn,$q);
}else{
  $t=$cantidad['suscriptores']+1;
  $q="UPDATE clicks SET clientes=clientes+1 WHERE id='1'";

}


 ?>
