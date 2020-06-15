<?php
  $server='localhost';
  $db='florencia';
	$user = 'root';
	$pass = 'O6o2i987*';

  $conn=mysqli_connect($server,$user,$pass,$db);
  if(!$conn){
    die('Error de conexion: '. mysqli_connect_errno());
  }
