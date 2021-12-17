<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Mock Facebook</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/navbar-fixed/">

    

    <!-- Bootstrap core CSS -->
<link href="style/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="style/style.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="style/navbar-top-fixed.css" rel="stylesheet">

  </head>

<?php
session_start();
$email = $_SESSION['userEmail'];
$fullname = $_SESSION['userFullname'];
$screenname = $_SESSION['userScreenname'];
$location = $_SESSION['userLocation'];
$birthDate = $_SESSION['userBirthdate'];
$status = $_SESSION['userStatus'];
$gender = $_SESSION['userGender'];
?>
 


<body>
    
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand">Mock Facebook</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="friends.php">My Friends</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="requests.php">Requests</a>
          </li>
        </ul>
        <a class="navbar-brand">Welcome, <?php echo $screenname; ?></a>
        <form class="d-flex" action="searchFriend.php" method="post">
          <input class="form-control me-2" type="search" placeholder="Find friends" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <main class="container homePageMain">
    <div class="bg-light p-5 rounded">

      <div class="form-floating mb-5">

        <h4>Share your thoughs:</h4>
        <form action="shared\createPost.php" method="post">
          <textarea class="form-control mb-2 postInput" placeholder="What's your thought?" name="Post"></textarea>
          <input type="hidden" name="memberEmail" value="<?php echo $email; ?>">
          <button type="submit" class="btn btn-outline-secondary" style="float:right">Post</button>
        </form>
      </div>


      <div>
        
        <h5> Recent Posts </h5><br>

<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once("vendor/autoload.php");

$client = new MongoDB\Client("mongodb+srv://SherryDemo:SherryYang@sherrydemo.dabra.mongodb.net/MockFacebook?retryWrites=true&w=majority");  
$collection = $client->MockFacebook->Post;

$post = $collection->find(['MEMBER_EMAIL' => $email]);

$recentPostNum = 10;
foreach ($post as $row) {
    echo $row['TIMESTAMP'];
    echo '<br>';
    echo $row['MEMBER_EMAIL'];
    echo ':&nbsp';
    echo $row['BODY'];
    $postID = $row['_id'];

    echo '<form action="shared\createReply.php" method="post">
          <textarea class="ReplyInput" name="Reply" rows="4" cols="50"></textarea>
          <input type="hidden" name="memberEmail" value='."$email".'>
          <input type="hidden" name="parentPostID" value='."$postID".'>
          <input type="submit" value="Reply">
          </form>';
    echo '<form action="shared\createPostLike.php" method="post">
          <input type="hidden" name="memberEmail" value='."$email".'>
          <input type="hidden" name="postID" value='."$postID".'>
          <input type="submit" value="Like">
          </form>';
    
    $reply = $collection->find(['PARENTPOSTID' => $postID]);
    echo '&nbsp&nbsp <h6> Recent Replies </h6><br>'; 
    foreach ($reply as $row1) {
        echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
        echo $row1['TIMESTAMP'];
        echo '<br>';
        echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
        echo $row['MEMBER_EMAIL'];
        echo ':&nbsp';
        echo $row1['BODY'];
        $replyID = $row1['_id'];
        echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
        echo '<form action="shared\createReply.php" method="post">
              <textarea class="ReplyInput" name="Reply" rows="2" cols="30"></textarea>
              <input type="hidden" name="memberEmail" value='."$email".'>
              <input type="hidden" name="parentPostID" value='."$postID".'>
              <input type="hidden" name="parentReplyID" value='."$replyID".'>
              <input type="submit" value="Reply">
              </form>';
        echo '<form action="shared\createRespondLike.php" method="post">
              <input type="hidden" name="memberEmail" value='."$email".'>
              <input type="hidden" name="replyID" value='."$replyID".'>
              <input type="submit" value="Like">
              </form>';
        echo '<br>';
        
        $recentReplyNum -= 1;
        if ($recentReplyNum == 0) {
            break;
        }

    }
    echo '<br>';
    $recentPostNum -= 1;
    if ($recentPostNum == 0) {
        break;
    }
}

?>
</div>

    </div>
    

  </main>

</body>


    <script src="style/bootstrap/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>


