<?php

include_once("../vendor/autoload.php");

$client = new MongoDB\Client("mongodb+srv://SherryDemo:SherryYang@sherrydemo.dabra.mongodb.net/MockFacebook?retryWrites=true&w=majority");  
$collection = $client->MockFacebook->Post;

$inputBody = $_POST["Reply"];
$memberEmail = $_POST["memberEmail"];
$parentPostID = $_POST["parentPostID"];
$replyTime = date('Y-m-d H:i:s');
$parentReplyID = null;

if ($parentReplyID == null) {
    $insertPost = $collection->insertOne([
        '_id' => new MongoDB\BSON\ObjectID,
        'MEMBER_EMAIL' => $memberEmail,
        'BODY' => $inputBody,
        'TIMESTAMP' => $replyTime,
        'PARENTPOSTID' => $parentPostID
    ]);
} else {
    $insertPost = $collection->insertOne([
        '_id' => new MongoDB\BSON\ObjectID,
        'MEMBER_EMAIL' => $memberEmail,
        'BODY' => $inputBody,
        'TIMESTAMP' => $replyTime,
        'PARENTPOSTID' => $parentPostID,
        'PARENTREPLYID' => $parentReplyID 
    ]);
}

sleep(1);

header("Location: ../mainpage.php");

?>
