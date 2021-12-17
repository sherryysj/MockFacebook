<?php

include_once("../vendor/autoload.php");

$client = new MongoDB\Client("mongodb+srv://SherryDemo:SherryYang@sherrydemo.dabra.mongodb.net/MockFacebook?retryWrites=true&w=majority");  
$collection = $client->MockFacebook->PostLike;

$postID = $_POST["postID"];
$memberEmail = $_POST["memberEmail"];

$insertLike = $collection->insertOne([
    '_id' => new MongoDB\BSON\ObjectID,
    'MEMBER_EMAIL' => $memberEmail,
    'POSTID' => $postID
]);

sleep(1);

header("Location: ../mainpage.php");

?>
