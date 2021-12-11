<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

$inputEmail = $_POST["Email"];
$inputPassword = $_POST["Password"];

require_once("../vendor/autoload.php");

phpinfo();

$client = new MongoDB\Client("mongodb+srv://SherryDemo:SherryYang@sherrydemo.dabra.mongodb.net/MockFacebook?retryWrites=true&w=majority");  
$collection = $client->MockFacebook->Member;
$member = $collection->findOne(['EMAIL' => $inputEmail]);


$match = false;
if (strcmp($member->PASSWORD, $inputPassword)) {
        $match = true;
}

if ($match == true){
   echo 'Successfully log in, move to main page in 3 seconds.';
   session_start();
   $_SESSION['userEmail'] = $member->EMAIL;
   $_SESSION['userFullname'] = $member->FULLNAME;
   $_SESSION['userScreenname'] = $member->SCREENNAME;
   $_SESSION['userBirthdate'] = $member->DOB;
   $_SESSION['userLocation'] = $member->LOCATION;
   $_SESSION['userStatus'] = $member->STATUS;
   $_SESSION['userGender'] = $member->GENDER;
   header("refresh:3; url='mainpage.php'");
} else {
   echo 'Email or password incorrect';
   header("refresh:4; url='index.php'");
}


?>

