<?php
//include('../include/security.php');
include('../include/connect.php');
// include('../include/sideNav.php');


$username = '';

// if(isset($_POST['username'])){
//   $username = $_POST['username'];
// }

$select_customer = "SELECT *  FROM users WHERE username = '$username'";
$customer_result = mysqli_query($conn, $select_customer);
if(mysqli_num_rows($customer_result) > 0){
  while($row = mysqli_fetch_assoc($customer_result)){
    $customer = $row['id'];

    $contents = array();
    
    $select_query =  "SELECT * FROM bookings WHERE customer_id = '$customer' order by id asc ";
    $results =  mysqli_query($conn, $select_query);
    
    if(mysqli_num_rows($results) > 0){
        $temp_array = array();
    
     while($row = $results->fetch_object()){
         $temp_array =  $row;
         array_push($contents,$temp_array);
         
     }
    }
    
    echo json_encode($contents);
  }
}

?>


