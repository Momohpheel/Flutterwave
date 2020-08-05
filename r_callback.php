<?php



$tr_id = isset($_GET['tranasaction_id']) ? $_GET['tranasaction_id'] : null;

if ($tr_id == null){
    die('error: no trnasaction id found!');
}

$url = "https://api.flutterwave.com/v3/transactions/$tr_id/verify";
$ch = curl_init($url);


curl_setopt($ch, array(
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => array(
        'Accept: application/json',
        'Content-Type : application/json',
        'Authorization : Bearer FLWSECK_TEST-cf744a18ea5f5c0faabb5ad92eca6217-X',
    ),
    CURLOPT_CUSTOMREQUEST => "GET",
)   
);


$response = curl_exec($ch);

$trans = json_decode($response, true);

if ($trans['data']['status'] == 'successfull'){
    if ($trans['tx_ref'] == $_GET['tx_ref']){
        if ($trans['data']['currency'] == 'NGN'){
            echo "<h2>Thank you for making a purchase!.</h2>";
        }
    }   
}

curl_close($ch);



?>