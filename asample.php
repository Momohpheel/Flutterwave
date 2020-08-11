<?php
//sk_test_f2a6d1d7f41d7d5e23c4221cf683a56b03ea3a81
$url = "http://localhost/Flutterwave%20Intergration/sample.json";
$ch = curl_init($url);

curl_setopt_array($ch, array(
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode([
        'name' => 'boruto',
        'age' => '3'
    ]),
    CURLOPT_HTTPHEADER => array(
        'Content-Type : application/json',
        'Accept: application/json'
        // 'Authorization : Bearer FLWSECK_TEST-cf744a18ea5f5c0faabb5ad92eca6217-X',
    ),
));


$response = curl_exec($ch);

$error = curl_error($ch);

if ($error){
    die('There was an error: '. $error);
}


print_r($response);
//curl_close($ch);


?>
