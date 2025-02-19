<?php
session_start();
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

$phone = $_POST['phone'];

$account_sid = 'ACba59bcd1bc901d7102ffd95b0465cfe5';
$auth_token = 'bab13a25e5ec156af62ac349d8d6d917';

$twilio_number = "+19285758460";

$client = new Client($account_sid, $auth_token);

$client->messages->create(
    $phone,
    array(
        'from' => $twilio_number,
        'body' => 'We have received your report and we will coordinate this with the authority. We appreciate your concern and will work to resolve the issue as soon as possible. Thank you for bringing this to our attention.'
    )
);
?>