<?php
print_r($_POST);
$opcion=$_POST['opcion'];

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
  $customer=json_encode(array('total' => $_POST['total'],'currency' => 'ARS','type'=> 'dynamic','name'=>$_POST['name'], 'description' => $_POST['description'], 'interval'=>$_POST['interval'], 'limit'=>$_POST['limit'], 'return_url'=>'localhost/mix1/pago.php'));


  $payload = json_encode($data);
  $curl = curl_init();

    curl_setopt_array($curl, array(
      // Modificar cuando se suba al host
      CURLOPT_SSL_VERIFYPEER => false,

      CURLOPT_URL => "https://mobbex.com/p/subscriptions/".$_POST['uid']."?",
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
         //"x-access-token: 44bca490-8e4b-4d3f-bf86-508bbc07acb3",
         //"x-api-key: cCTVKLuqjA6sAs~iLT7YHOvXQLATeO0BvpoybFc5",

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
      $res=json_decode($response);
      if ($res==true) {
        $int=$_POST['interval'];
        $lim=$_POST['limit'];
        $uid=$_POST['uid'];
        $des=$_POST['description'];
        $tot=$_POST['total'];
        include ('conect.php');
        $query="UPDATE typesus  SET intervalo='$int',limite='$lim',description='$des',total='$tot'	WHERE uid='$uid'";
        $resutltado=mysqli_query($conn, $query);
        verify($resutltado);
        close($conn);
      }
    }

    break;

    case 1:
    $customer=json_encode(array('total' => $_POST['total'],'currency' => 'ARS','type'=> 'dynamic','name'=>$_POST['name'], 'description' => $_POST['description'], 'interval'=>$_POST['interval'], 'limit'=>$_POST['limit'], 'return_url'=>'https://enlaceprofesional.com.ar/pago.php'));


    $payload = json_encode($data);
    $curl = curl_init();

      curl_setopt_array($curl, array(
         // Modificar cuando se suba al host
         CURLOPT_SSL_VERIFYPEER => false,

        CURLOPT_URL => "https://mobbex.com/p/subscriptions",
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
         //"x-access-token: 44bca490-8e4b-4d3f-bf86-508bbc07acb3",
         //"x-api-key: cCTVKLuqjA6sAs~iLT7YHOvXQLATeO0BvpoybFc5",
         
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
        $res=json_decode($response);
        $data=$res->data;

        $uid=$data->uid;

        $int=$data->interval;
        $lim=$data->limit;
        $sul=$data->shorten_url;
        $url=$data->url;
        $des=$data->description;
        $tot=$data->total;


        include ('conect.php');
        $query="INSERT INTO typesus (id, uid, intervalo,limite, shorten_url, url, currency,status,description,total,created	) VALUES (NULL,'$uid' , '$int', '$lim', '$sul', '$url','ARS','0','$des','$tot', 'algo')";
        $resutltado=mysqli_query($conn, $query);
        verify($resutltado);
        close($conn);
      }
      break;
}
