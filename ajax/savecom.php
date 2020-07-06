<?php

include ('conect.php');



$autor=$_POST['subject'];
$text=$_POST['message'];
$hoy = date("Y-m-d H:i:s");
$notice=$_POST['notice'];



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

  if( $autor != "" && $text != ""){
        $query="INSERT INTO coments (id,idsuscriptor, coment, datetimes,notice_id) VALUES (NULL,'$autor', '$text','$hoy','$notice')";

        $resutltado=mysqli_query($conn, $query);
        verify($resutltado);
        close($conn);
    }else{
      $info= 4;
      echo json_encode($info);
    }
