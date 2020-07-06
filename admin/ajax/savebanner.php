<?php

include ('conect.php');


$id=$_POST['id'];
$posicion=$_POST['type'];
$link=$_POST['link'];
$opcion=$_POST['opcion'];

if (!empty($_FILES)) {
$fileName = time();

$rutanueva='../../img/banner/'.$fileName;
$rutamuestra='../img/banner/'.$fileName;
$rutaactual=$_FILES['img']['tmp_name'];

move_uploaded_file($rutaactual,$rutanueva);

$img='<img src="'.$rutamuestra.'" alt="" width="50%">';
$img1=$fileName;

  }
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
  if(isset($_POST['activa'])){
        $query="UPDATE banner   orden='$posicion', activa='1' link='$link'  WHERE banner.id = '$id'";
        $resutltado=mysqli_query($conn, $query);
        verify($resutltado);
        close($conn);
    }else{
      $query="UPDATE banner   orden='$posicion', activa='0' link='$link' WHERE banner.id = '$id'";
      $resutltado=mysqli_query($conn, $query);
      verify($resutltado);
      close($conn);
    }

    break;
  case 1:
  if(isset($_POST['activa'])){
        $query="INSERT INTO banner (id, img, orden, activa, nombre, link) VALUES (NULL,'$img' , '$posicion', '1', '$img1', '$link')";
        $resutltado=mysqli_query($conn, $query);
        verify($resutltado);
        close($conn);
    }else{
      $query="INSERT INTO banner (id, img, orden, activa, nombre, link) VALUES (NULL,'$img' , '$posicion', '0','$img1', '$link')";
      $resutltado=mysqli_query($conn, $query);
      verify($resutltado);
      close($conn);
    }

    break;
}
?>
