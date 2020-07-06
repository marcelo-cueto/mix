<?php
$customer=json_encode(array('total' => 100.00,'currency' => 'ARS','type'=> 'dynamic','name'=>'Enlace Profesional', 'description' => 'Enlace Profesional', 'interval'=>'1m', 'limit'=>0, 'return_url'=>'admin/pago.php'));
$sdate=json_encode(array('day'=> date("d"),'month'=>date("m")));
$data=json_encode(array('customer'=> $customer,'startDate'=>$sdate,'reference'=>$res['id']));


$payload = json_encode($data);
$curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.mobbex.com/p/subscriptions",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $customer,
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
