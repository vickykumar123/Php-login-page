<?php
    $err = false;
    $showError = false;
   if($_SERVER["REQUEST_METHOD"] == "POST"){
  
   include 'parti/_dbconnect.php';
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    // $exist= false;
    $existsql = "SELECT * FROM `users` WHERE username = '$username'";
    $result = mysqli_query($conn,$existsql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
      // $exists = true;
      $showError= " username exist already";

    }
    else{
      // $exists = false;
    
    if(($password == $cpassword)){
      $hash = password_hash($password, PASSWORD_DEFAULT);
      // before without sercure hash form 
      //  $sql = "INSERT INTO `users` ( `username`, `email`, `password`, `date`) VALUES ( '$username', '$email', '$password', current_timestamp())";
       $sql = "INSERT INTO `users` ( `username`, `email`, `password`, `date`) VALUES ( '$username', '$email', '$hash', current_timestamp())";
       $result = mysqli_query($conn, $sql);
       if($result){
           $err =true;
       }
      }
    else{
        $showError= "password is incorrect";
    }
    }
}
   
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Sign up</title>
  </head>

  <body>
    <?php require 'parti/_nav.php' ?>
<?php
    if($err){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success<--></strong> Great you have Done!! U can Login..
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
   }
if($showError){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error<--></strong> '.$showError.'
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
   </div>';
}
?>
        <div class="container mt-3">
        <h2 class= "text-center">SignUp to our webpage</h2>
        <form action= "/loginsys/2_signup.php" method= "post">
        <div class="form-group col-md-6 ">
            <label for="username">username</label>
            <input type="text" maxlength= "12" class="form-control" id="username" name="username" aria-describedby="emailHelp">
        </div>
            <div class="form-group col-md-6">
            <label for="email">email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group col-md-6">
            <label for="password">password</label>
            <input type="password" maxlength= "20" class="form-control" id="password" name="password">
        </div>
        <div class="form-group col-md-6">
            <label for="cpassword">Confirm Password</label>
            <input type="password" class="form-control" id="cpassword" name="cpassword">
        <small id="emailHelp" class="form-text text-muted">Please enter the same password.</small>
        </div>
        <button type="submit" class="btn btn-primary">Signup</button>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>