<?php

$url = 'https://crm.belmar.pro/api/v1/getstatuses';
$headers = [
    'token: ba67df6a-a17c-476f-8e95-bcdb75ed3958',
    'Content-Type: application/json'
];

$data = [
    'date_from' => '2024-04-01 00:00:00',
    'date_to' => '2024-04-20 23:59:59',
    'page' => 0,
    'limit' => 2
];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

//if (curl_errno($ch)) {
//    echo 'Error: ' . curl_error($ch);
//} else {
//    echo 'Response: ' . $response;
//}

$response = (json_decode($response, true));
echo gettype($response);
print_r($response);

foreach ($response['data'] as $element) {
    print_r($element);
}
curl_close($ch);


