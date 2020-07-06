<?php
include ('conect.php');
$query="SELECT * FROM contador";

$num=mysqli_query($conn,$query);
$n=mysqli_num_rows($num);

echo $n;
