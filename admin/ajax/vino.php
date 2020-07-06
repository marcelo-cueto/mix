<?php
include ('conect.php');
$query="SELECT * FROM contadorn";

$num=mysqli_query($conn,$query);
$n=mysqli_num_rows($num);

echo $n;
