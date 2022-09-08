<?php




include('./admin/include/connect.php');

$fname ="maria";
$lname ="elias";
$gender = "female";
$username = "maria@gmail.com";
$phone = "255718634141";
 $role= "CUSTOMER";
 $password = md5("maria123");

if(isset($_POST['fname'])){
    $fname = $_POST['fname'];
 }

 if(isset($_POST['lname'])){
    $lname =   $_POST['lname'];
 }
 if(isset($_POST['gender'])){
    $gender = $_POST['gender'];
 }

 if(isset($_POST['phone'])){
   $phone = $_POST['phone'];
 }

 if(isset($_POST['email'])){
    $username = $_POST['email'];
 }
 
 if(isset($_POST['password'])){
 $password =  $password =  md5($_POST['password']);
 }

 $role = "CUSTOMER";

 

?>

<?php

if(!empty($fname) && !empty($lname) && !empty($gender) && !empty($role) && !empty($phone) && !empty($username) && !empty($password)){

    $select_customer = "SELECT *  FROM users WHERE username = '$username'";
  $customer_result = mysqli_query($conn, $select_customer);
  if(mysqli_num_rows($customer_result) > 0){
    $result['success']='0';
        $result['message']='Email already exists please try another one';
            echo json_encode($result);
            mysqli_close($conn);
  }
  else{
      $insert_query = "INSERT INTO users (fname, lname, gender, role, phone,username, password) VALUES('$fname', '$lname','$gender' , '$role', '$phone', '$username', '$password')";
      $results =  mysqli_query($conn, $insert_query);
    
      if($results){
          $result['success']='1';
                      $result['message']='User account created successful';
                          echo json_encode($result);
                        mysqli_close($conn);
      }
      else{
          $result['success']='0';
          $result['message']='Request failed please try again';
              echo json_encode($result);
              mysqli_close($conn);
      }
  }


   }


?>

 

