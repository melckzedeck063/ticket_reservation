<?php
  include('./admin/include/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../include/sideNav.css">
    <title>Document</title>
</head>
<body>
    <div class="container -mt-3">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <div class="form-group card shadow rounded p-4">
                    <h4 class="display-5 text-primary text-center"> Register User</h4>
                    <form action="" method="POST" class="needs-validation">
                        
                        <div class="mb-1">
                            <label for="Firstname">Firstname</label>
                            <input type="text" placeholder="Enter firstname" name="fname" class="form-control">
                        </div>
                        <hr class="mt-2">
                        <div class="mb-1">
                            <label for="Lasttname">Lasttname</label>
                            <input type="text" placeholder="Enter Lasttname" name="lname" class="form-control">
                        </div>
                        <hr class="mt-2">
                        <div class="row mb-1">
                          <div class="col">
                              <div class="">
                                <label for="Gender">Gender</label> <br>
                                <input type="radio" name="gender" value="Female" class="mr-2"> Female
                                <input type="radio" name="gender" value="Male" class="ml-2 mr-2">Male
                              </div>
                          </div>
                           
                                 <select name="role" hidden id="" class="form-control">
                                    <option value="CUSTOMER">CUSTOMER</option>
                                 </select>
                                 <!-- <input type="text" placeholder="Enter User Role" name="role" class="form-control"> -->
                               
                        </div>
                       
                        <div class="mb-1">
                            <label for="Telephone">Telephone</label>
                            <input type="tel" placeholder="Enter Telephone" name="phone" class="form-control">
                        </div>
                        <hr class="mt-2">
                        <div class="mb-1">
                            <label for="Username or Email">Username or Email</label>
                            <input type="email" placeholder="Enter Username or Email" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="Password">Password</label>
                            <input type="password" placeholder="Enter Password" name="password" class="form-control">
                        </div>
                        <button style="width: 70%; margin : auto" name="save" class="btn btn-block btn-primary text-white">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col"></div>
        </div>
      </div>
</body>
</html>

<?php
$message = "please fill out this input is required";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    function validate($data){

      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

   if(isset($_POST['save'])){
    if(empty($_POST['fname'])){
        $fnameErr = $message;
    }
    else{
        $fname = validate($_POST['fname']);
    }

    if(empty($_POST['lname'])){
        $lnameErr =  $message;
    }
    else{
        $lname = $_POST['lname'];
    }

    if(empty($_POST['gender'])){
        $genderErr = $message;
    }
    else{
        $gender =  validate($_POST['gender']);
    }

    if(empty($_POST['role'])){
        $roleErr = $message;
    }
    else{
        $role =  validate($_POST['role']);
    }

    if(empty($_POST['phone'])){
        $phoneErr =  $message;
    }
    else{
        $phone =  validate($_POST['phone']);
    }

    if(empty($_POST['email'])){
        $usernameErr = $message;
    }
    else{
        $username =  validate($_POST['email']);
    }

    if(empty($_POST['password'])){
        $passwordErr =  $message;
    }
    else{
        $password =  validate(md5($_POST['password']));
    }

   } 


   if(!empty($fname) && !empty($lname) && !empty($gender) && !empty($role) && !empty($phone) && !empty($username) && !empty($password)){

    $insert_query = "INSERT INTO users (fname, lname, gender, role, phone,username, password) VALUES('$fname', '$lname','$gender' , '$role', '$phone', '$username', '$password')";
    $results =  mysqli_query($conn, $insert_query);

    if($results){
       ?>
        <script> alert("user account created succesfull") </script>
         <?php
    }
    else{
        ?>
       <script> alert("request failed please try again") </script>
        <?php
    }

   }


}
?>