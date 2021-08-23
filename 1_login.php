<?php
  $login = false;
  $showError = false;
  if($_SERVER["REQUEST_METHOD"] == "POST"){
  
  include 'parti/_dbconnect.php';
  $username = $_POST["username"];
    // $email = $_POST["email"];
  $password = $_POST["password"];
    // $cpassword = $_POST["cpassword"];
   
    // BEFORE WE WERE USING THIS FOR NOT SERCURING THE PASSW0RD
      // $sql = "Select * from users where username='$username' AND password = '$password'";
      $sql = "Select * from users where username='$username'";
      $result = mysqli_query($conn, $sql);
      $num=mysqli_num_rows($result);
       if($num == 1){
         while($row=mysqli_fetch_assoc($result)){
           if(password_verify($password, $row['password'])){
             $login= true;
            
            session_start();
            $_SESSION['loggedin']= true;
            $_SESSION['username']= $username;
            header("location:3_welcome.php");
           }
           else{
            $showError= "invaild credentials";
         }
        }
      }
         else{
             $showError= "invaild credentials";
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

    <title>Login</title>
  </head>

  <body>
    <?php require 'parti/_nav.php' ?>
<?php
    if($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success<--></strong> Great you have Done!! U are Logged in..
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
        <h2 class= "text-center">Login to our webpage</h2>
        <form action= "/loginsys/1_login.php" method= "post">
        <div class="form-group col-md-6 ">
            <label for="username">username</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
        </div>
           
        <div class="form-group col-md-6">
            <label for="password">password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        
        <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>