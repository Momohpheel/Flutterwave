<?php
//sk_test_f2a6d1d7f41d7d5e23c4221cf683a56b03ea3a81
$url = "https://api.flutterwave.com/v3/payments";
$ch = curl_init($url);

curl_setopt_array($ch, array(
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => array(
        'Accept: application/json',
        'Content-Type : application/json',
        'Authorization : Bearer FLWSECK_TEST-cf744a18ea5f5c0faabb5ad92eca6217-X',
    ),
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode([
        'tx_ref' => 'qwerty-12345',
        'amount' => '100',
        'currency' => 'NGN',
        'redirect_url' => 'callback.php',//'C:\laragon\www\Flutterwave Intergration\callback.php',
        'payment_options' => 'card',
        'customer' => [
            'email' => 'momohmayowa14@gmail.com',
            'phone_number' => '08168252201',
            'name' => 'Momoh'
    ],
     'customization' => [
                'title'=> 'Pied Piper Payments',
                'description'=> 'Middleout isnt free. Pay the price',
                'logo'=> 'https://assets.piedpiper.com/logo.png'
                
     ]
    ]),
));


$response = curl_exec($ch);

$error = curl_error($ch);

if ($error){
    die('There was an error: '. $error);
}



$trans = json_decode($response, true);

header('Location :'. $trans['data']['link']);
//curl_close($ch);


?>
