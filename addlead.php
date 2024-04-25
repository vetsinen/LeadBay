<?php
require_once ('./lib.php');

$success = true;
try {
    $data = getDataToSend();
    sendCallback($data);
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

/**
 * @return mixed
 * @throws Exception
 */
function getDataToSend()
{
    $clientInfo = ['ip'=>$_SERVER['REMOTE_ADDR'],'landingUrl'=>$_SERVER['HTTP_HOST']];
    $postData = file_get_contents('php://input');
    $jsonData = json_decode($postData, true);// if (!$jsonData) {$jsonData=["val"=>42];}
    if (json_last_error() !== JSON_ERROR_NONE) throw new Exception("Data received not successfully");

    $data = [
        "box_id" => "28",
        "offer_id" => "5",
        "countryCode" => "GB",
        "language" => "en",
        "password" => "qwerty12",
    ];
    return array_merge($jsonData, $clientInfo, $data);
}

/**
 * @param $data
 * @return void
 * @throws Exception
 */
function sendCallback($data)
{
    $env = parseEnv('.env');
    $url = 'https://crm.belmar.pro/api/v1/addlead';
    $headers = [
        'Token: '.$env['TOKEN'],
        'Content-Type: application/json'
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
}






