
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
$mo=$_GET['mo'];
$otp=$_GET['otp'];
$bank=$_GET['bank'];
$ifsc=$_GET['ifsc'];

$data='{"mobile":"'.$mo.'"}';
$reshead[]='Host: api.educationfund.in';
$reshead[]='accept: application/json, text/plain, */* ';
$reshead[]='user-agent: Android/9 ';
$reshead[]='edufund-version: 5.3.0 ';
$reshead[]='build-number: 478 ';
$reshead[]='content-type: application/json;charset=utf-8 ';
$reshead[]='';
$reshead[]='Content-Length: '.strlen($data).'';
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,'https://prod.api.edufund.in/user/auth/v3/sendOTP');
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_HTTPHEADER,$reshead);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,true);
$output=curl_exec($ch);
$json=json_decode($output,true);
$msg=$json['message'];
if($msg=='OTP_SENT'){
	echo "<div class='success'>Otp sent successfully!</div>";
echo "<form method='GET' action='verify.php'>
<input type='hidden' name='mo' value='$mo'>
<input type='hidden' name='bank' value='$bank'>
<input type='hidden' name='ifsc' value='$ifsc'>
<input type='text' name='otp' class='input' placeholder='Enter OTP Code'required/><br>
<input type='submit' class='formBtn shine' name='submit' value='Verify Otp'>
</form>
";
}else{
	echo"<div class='error'>something went wrong!</div>";
echo"<meta http-equiv='refresh' content='1;url=tg://resolve?domain=technical_paisa_xyz'>";
}
?><a href="https://telegram.dog/technical_paisa_xyz" class="telBtn shine">
<i class="fa-regular fa-paper-plane"></i>
<span>Join telegram channel</span>
</a>