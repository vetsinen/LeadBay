<?php

$url = 'https://crm.belmar.pro/api/v1/addlead';
$headers = [
    'token: ba67df6a-a17c-476f-8e95-bcdb75ed3958',
    'Content-Type: application/json'
];

$data = [
    'firstName' => 'dfsd',
    'lastName' => 'dfffdfsd',
    'phone' => '2356373',
    'email' => 'qw@bs.com',
    'countryCode' => 'GB',
    'box_id' => '28',
    'offer_id' => '5',
    'landingUrl' => 'www.google.con',
    'ip' => '127.0.0.1',
    'password' => 'qwerty12',
    'language' => 'en',
    'clickId' => '',
    'quizAnswers' => '',
    'custom1' => ''
];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    echo 'Response: ' . $response;
}

curl_close($ch);