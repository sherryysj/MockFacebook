<?php

include_once("../vendor/autoload.php");

$client = new MongoDB\Client("mongodb+srv://SherryDemo:SherryYang@sherrydemo.dabra.mongodb.net/MockFacebook?retryWrites=true&w=majority");  
$collection = $client->MockFacebook->Post;

$inputBody = $_POST["Post"];
$memberEmail = $_POST["memberEmail"];
$postTime = date('Y-m-d H:i:s');

$insertPost = $collection->insertOne([
    '_id' => new MongoDB\BSON\ObjectID,
    'MEMBER_EMAIL' => $memberEmail,
    'BODY' => $inputBody,
    'TIMESTAMP' => $postTime,
]);

sleep(1);

header("Location: ../mainpage.php");

?>

