<?php

$uid=$_POST['id'];

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
$url="https://api.mobbex.com/p/subscriptions/".$uid."/action/activate";

$curl = curl_init();

  curl_setopt_array($curl, array(
   // Modificar cuando se suba al host
   CURLOPT_SSL_VERIFYPEER => false,

    CURLOPT_URL =>$url ,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS => "",
    CURLOPT_HTTPHEADER => array(
      "Content-Type: application/json",
      "cache-control: no-cache",
      //"x-access-token: 43d860e6-b37c-4724-8743-2c9167e39121",
      //"x-api-key: L7buJqqodxsKdU11pIayTtUR1UbQsGgypIfqI4cT",

      // Credenciales de prueba
      "x-access-token: d31f0721-2f85-44e7-bcc6-15e19d1a53cc",
      "x-api-key: zJ8LFTBX6Ba8D611e9io13fDZAwj0QmKO1Hn1yIj",
      "x-lang: es"
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    print_r($response);
    
    include ('conect.php');


    $query="UPDATE typesus  SET status=1	WHERE uid='$uid'";
    $resutltado=mysqli_query($conn, $query);
    verify($resutltado);
    close($conn);
  }

 ?>
