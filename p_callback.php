<?php



$tr_id = isset($_GET['reference']) ? $_GET['reference'] : null;

if ($tr_id == null){
    die('error: no trnasaction id found!');
}

$url = "https://api.paystack.co/transaction/verify/$tr_id";
$ch = curl_init($url);


curl_setopt($ch, array(
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        'cache-control: no-cache',
        'Content-Type : application/json',
        'Authorization : Bearer sk_test_f2a6d1d7f41d7d5e23c4221cf683a56b03ea3a81',
    ),
)   
);


$response = curl_exec($ch);

$trans = json_decode($response, true);

if ($trans['data']['status'] == 'successfull'){
    
    echo '<h1>Successfull Transaction!!</h1>';   
}

curl_close($ch);



?>