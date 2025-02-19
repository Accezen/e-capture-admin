<?php
session_start();
require __DIR__ . '/vendor/autoload.php';

use Twilio\Rest\Client;

$phone = $_POST['phone'];

$account_sid = '#';
$auth_token = '#';

$twilio_number = "#";

$client = new Client($account_sid, $auth_token);

$client->messages->create(
    $phone,
    array(
        'from' => $twilio_number,
        'body' => 'We have received your report and we will coordinate this with the authority. We appreciate your concern and will work to resolve the issue as soon as possible. Thank you for bringing this to our attention.'
    )
);
