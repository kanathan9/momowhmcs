<?php

if (basename($_SERVER['PHP_SELF']) === basename(__FILE__)) {
  header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
  exit;
}

$merchant_pw = "";  //Replace with your MTN Mobile Money Merchant password
$merchant_email = "";   //Replace with your MTN Mobile money merchant email

$amount = (int) $_POST['amount'];
$number = $_POST['number'];
$callbackUrl = $_POST['callback_url'];
$invoiceId = $_POST['invoice_id'];
$GetData = array("idbouton"=>"2", "typebouton"=>"PAIE", "_amount"=>$amount, "_tel"=>$number, "_clP"=>$merchant_pw, "_email"=>$merchant_email);
$suiteUrl = http_build_query($GetData);
$ch0 = curl_init();
curl_setopt($ch0, CURLOPT_URL, "https://developer.mtn.cm/OnlineMomoWeb/faces/transaction/transactionRequest.xhtml?".$suiteUrl);
curl_setopt($ch0, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch0, CURLOPT_CUSTOMREQUEST, "GET");
//curl_setopt($ch0, CURLOPT_POST, 1);
//curl_setopt($ch0, CURLOPT_POSTFIELDS, json_encode($GetData));
$response = curl_exec($ch0);
$err = curl_error($ch0);
$httpCode = curl_getinfo($ch0, CURLINFO_HTTP_CODE);
$responseBody = json_decode($response);
curl_close($ch0);
if($responseBody->StatusCode==01){
    //Success action here
    $status = true;
    $transactionId = $responseBody->TransactionID;
}else{
    //Failure action here
    $status = false;
    $transactionId = null;
}

$postData = array("x_status"=>$status, "x_invoice_id"=>$invoiceId, "x_trans_id"=>$transactionId, "x_amount"=>$amount, "x_fee"=>0, "x_hash"=>md5($invoiceId . $transactionId . $amount . $secret));
$postData = http_build_query($postData);
$ch1 = curl_init();
curl_setopt($ch1, CURLOPT_URL, urldecode($callbackUrl));
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch0, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch1, CURLOPT_POST, 1);
curl_setopt($ch1, CURLOPT_POSTFIELDS, $postData);
curl_exec($ch1);
echo $response;

?>