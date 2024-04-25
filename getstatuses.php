<?php
require_once ('./lib.php');

$success = true;
try {
    $data = getData();
} catch (Exception $e) {
    $success = false;
    $data = [];
} finally {
    header('Content-Type: application/json');
    echo json_encode([
        'success' => $success,
        'data' =>  $data,
        'message' => 'Data processed'
    ]);
}

function getData()
{
    $env = parseEnv('.env');
    $url = 'https://crm.belmar.pro/api/v1/getstatuses';
    $headers = [
        'Token: ba67df6a-a17c-476f-8e95-bcdb75ed3958',
        'Content-Type: '.$env['TOKEN']
    ];

    $data = [
        'date_from' => $_GET['start'],
        'date_to' => $_GET['end'],
        'page' => 0,
        'limit' => 3
    ];

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        throw new Exception(curl_error($ch));
    }
    curl_close($ch);
    $response = (json_decode($response, true));
    return $response['data'];
}

