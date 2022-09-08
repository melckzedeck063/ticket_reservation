<?php
ob_start();
session_start();

 include('./admin/include/connect.php');

 $username = $password = $usernameErr = $passwordErr =  "";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="row p-4">
        <div class="col"></div>
        <div class="col p-4">

        <?php
                   if(isset($_SESSION['success']) && $_SESSION['success'] != ''){
                      echo "<div class='bg-success text-light text-center msg p-2 mb-3'>" .$_SESSION['success'] . "</div>";
                      unset($_SESSION['success']);
                   }
                   if(isset($_SESSION['status']) && $_SESSION['status'] != ''){
                    echo "<div class='bg-danger text-light text-center msg p-2 mb-3'>" .$_SESSION['status'] . "</div>";
                    unset($_SESSION['status']);
                 }
          ?>

            <div class="form-group p-4 card shadow rounded">
                <h4 class="display-5 text-primary text-center mb-2">Sign In</h4>
                <form method="POST" class="needs-validation">
                    <div class="mb-3">
                        <label for="Username">Username</label>
                        <input type="email" name="email" placeholder="Username or email" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                    <hr class="mt-3">
                    <div class="mb-3">
                        <label for="password">password</label>
                        <input type="password" name="password" placeholder="password" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                    <hr class="mt-3">
                    <button style="width: 70%; margin : auto" name="login" class="btn btn-block btn-primary text-white">Login</button>
                </form>
                <div class="mt-2 text-center">
                    <span class="text-primary"> Don't account ? </span>
                    <span class=""> <a href="./register.php"  class="btn border-2 border-primary"> Sign Up </a> </span>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
</body>
</html>

<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){
    function validate($data){

      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    if(isset($_POST['login'])){
        if(empty($_POST['email'])){
            $usernameErr = "Error username is required";
        }
        else{
            $username = validate($_POST['email']);
        }
        if(empty($_POST['password'])){
            $passErr = "Error password is required";
        }
        else{
            $password =  validate(md5($_POST['password']));
        }
    }
}

// echo md5('zedeck123');
?>

<?php
if(isset($_POST['login'])){
        if(!empty($username) && !empty($password)){

           $login_query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' " ;
           $login_result = mysqli_query($conn, $login_query);
           
           if(mysqli_num_rows($login_result) > 0 ){
               while($row = mysqli_fetch_assoc($login_result) ){
                   if($row['role'] == 'ADMIN'){
                       $_SESSION['username'] =  $username ;
                       header('Location: ./admin/pages/index.php');
                       exit();
                    // echo  "login success";
                   }
               }
           }
           else{
               $_SESSION['status'] = "Invalid username or password";
               header('Location: ./index.php');
           }

        }
        else{
            $_SESSION['status'] = "Username and password is required";
            header('Location: ./index.php');
        }
    }

?>