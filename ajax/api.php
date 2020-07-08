<?php

include ('conect.php');

$dni=$_POST['dni'];

print_r($_POST);
$email=$_POST['email'];
$query = "SELECT * FROM suscriptions WHERE email = '$email'";
$resultado = mysqli_query($conn, $query);
$res=$resultado->fetch_array(MYSQLI_ASSOC);
close($conn);

print_r($res);
function close($conn){
  mysqli_close($conn);
}

$customer=json_encode(array('identification' => $dni,'email' => $email,'name'=> $res['name'] .' '.$res['surname'] ));
$sdate=json_encode(array('day'=> date("d"),'month'=>date("m")));
$data=json_encode(array('customer'=> $customer,'startDate'=>$sdate,'reference'=>$res['id']));


$payload = json_encode($data);
$curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.mobbex.com/p/subscriptions/aXtHUdPsI/subscriber",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $payload,
    CURLOPT_HTTPHEADER => array(
      "Content-Type: application/json",
      "cache-control: no-cache",
      "x-access-token: 43d860e6-b37c-4724-8743-2c9167e39121",
      "x-api-key: L7buJqqodxsKdU11pIayTtUR1UbQsGgypIfqI4cT",
      "x-lang: es"
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    echo $response;
  }
