<?php

include ('conect.php');


$id=$_POST['id'];







  $query="DELETE FROM notices WHERE id='$id'";
  $resutltado=mysqli_query($conn, $query);
  verify($resutltado);
  close($conn);

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
