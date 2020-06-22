<?php
  $server='localhost';
  $db='florencia';
	$user = 'root';
	$pass = 'root';

  $conn = new PDO("mysql:host=$server;dbname=$db", $user, $pass);

  if(!$conn){
    die('Error de conexion: '. mysqli_connect_errno());
  }
