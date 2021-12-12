<!doctype html>

<html lang="en">
 <head>
    <title>Mock Facebook</title>
    <meta charset = "utf-8">
   
    <!-- Bootstrap core CSS -->
    <link href="style/bootstrap.min.css" rel="stylesheet">

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
    <link href="style/signin.css" rel="stylesheet">

 </head>


 <body class="text-center">

    <div class="mydiv">
      <div>
        <h1 class="h1 mb-2 fw-normal">Welcome to Mock Facebook</h1>
        <h2 class="h2 mb-2 fw-normal">You have to sign in to see the contents of the website.</h2>
        <h2 class="h2 mb-5 fw-normal">If you do not have an account, please click sign up to register one.</h2>
        <h3 class="h3 mb-2 fw-normal">For demo purpose, you can use Username: DemoUser@sherry.com, Password: Demo to login. </h3>
        <h3 class="h3 mb-5 fw-normal">Or you can create a new account to test the sign up function if you are willing to do so.</h3>
      </div>

      <div>
        <main class="form-signin">

          <form class="mb-2" action="shared/loginValidate.php" method="post">

            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
              <input name="Email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">Email address</label>
            </div>

            <div class="form-floating">
              <input name="Password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Password</label>
            </div>

            <div class="checkbox mb-3">
              <label>
                <input type="checkbox" value="remember-me"> Remember me
              </label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>

          </form>

          <form action="signup.php">
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
          </form>

        </main>
      </div>

    </div>
 
</body>

</html>

