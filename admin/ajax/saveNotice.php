<?php

include ('conect.php');


$id=$_POST['id'];
$title=$_POST['title'];
$text=$_POST['text'];
$img='algo.png';
$date=$_POST['date'];
$opcion=$_POST['opcion'];
$autor=$_POST['autor'];

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
switch ($opcion) {
  case 0:
  if( $title != "" && $text != "" && $img != "" ){
        $query="UPDATE notices SET title = '$title', texto = '$text', dates= '$date', autor='$autor' WHERE notices.id = '$id'";
        $resutltado=mysqli_query($conn, $query);
        verify($resutltado);
        close($conn);
    }else{
      $info= 4;
      echo json_encode($info);
    }
    break;
  case 1:
  if( $title != "" && $text != "" && $img != "" ){
        $query="INSERT INTO notices (id,title, img, texto, dates, autor) VALUES (NULL,'$title','$img' , '$text', '$date','$autor')";
        $resutltado=mysqli_query($conn, $query);
        verify($resutltado);
        close($conn);
    }else{
      $info= 4;
      echo json_encode($info);
    }

    break;
}
