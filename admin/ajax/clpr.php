<?php
include ('conect.php');
$query="SELECT * FROM clicks";

$num=mysqli_query($conn,$query);
$n=mysqli_fetch_all($num);
mysqli_close();

echo $n[0][1];
