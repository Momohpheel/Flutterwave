<?php
//sk_test_f2a6d1d7f41d7d5e23c4221cf683a56b03ea3a81
$url = "https://api.paystack.co/transaction/initialize";
$ch = curl_init($url);

curl_setopt_array($ch, array(
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode([
        'amount'=> '3000',
        'email'=> 'momohmayowa14@gmail.com',
        'callback_url' => 'p_callback.php'
    ]),
    CURLOPT_HTTPHEADER => array(
        'cache-control: no-cache',
        'Content-Type: application/json',
        'Authorization: Bearer sk_test_f2a6d1d7f41d7d5e23c4221cf683a56b03ea3a81',
    ),
));


$response = curl_exec($ch);
$error = curl_error($ch);

if ($error){
    die('There was an error: '. $error);
}



$trans = json_decode($response);

header('Location :'. $trans->data->authorization_url);
//curl_close($ch);


?>
