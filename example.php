<?php

$url = 'https://api.flutterwave.com/v3/accounts/resolve';
$ch = curl_init($url);
$data = [
    'account_number' => '0787860837',
    'account_bank' => '044'
];

curl_setopt_array($ch, array(
    //CURLOPT_URL => 'http://localhost/Flutterwave%20Intergration/sample.json',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => json_encode([
        'account_number' => '0690000032',//'0787860837',
        'account_bank' => '044'
    ]),
    CURLOPT_HTTPHEADER =>   array(
        'cache-control: no-cache',
        "Content-Type: application/json",
        "Authorization: Bearer FLWSECK_TEST-cf744a18ea5f5c0faabb5ad92eca6217-X",
    )
    
));
// curl_setopt($ch, CURLOPT_URL,  $url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


$response = curl_exec($ch);

$error = curl_error($ch);

if ($error){
    die('There was an error: '. $error);
}

$trans = json_decode($response);

//print_r ($trans);

curl_close($ch);

echo $response;
?>
