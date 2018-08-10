<?php


$data = [
 'from'	=> $_POST['from'],
 'to'	=> $_POST['to'],
 'type'	=> $_POST['type'],
];


$required = array('from', 'to', 'type');

// Loop over field names, make sure each one exists and is not empty
$error = false;
foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}




$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://test.qdev.it/calculator",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>  json_encode($data),
  CURLOPT_HTTPHEADER => array(
    "Cache-Control: no-cache",
    "Postman-Token: 138f1526-fb6f-407b-a414-9e2c7d783021"
  ),
));



$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} 

else if($error) {
  echo "خطأ .. تأكد من اختيار جميع الحقول أولا";
}

else {
  echo $response; 
}

    

    ?>