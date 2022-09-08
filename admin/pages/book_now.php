<?php
ob_start();
session_start();

include('../include/connect.php');

if($_SESSION['username']){
    echo $_SESSION['username'];
}

$username= "maria@gmail.com";
$bus_no = "T234CCF";
$set_no = "17";
$from ="dodoma";
$to="moshi";
$time = "";
$price ="";

if(isset($_POST['bus_no'])){
    $bus_no = $_POST['bus_no'];
}

if(isset($_POST['username'])){
    $username = $_POST['username'];
}

if(isset($_POST['from'])){
    $from = $_POST['from'];
}

if(isset($_POST['to'])){
    $to = $_POST['to'];
}

if(isset($_POST['set_no'])){
  $set_no = $_POST['set_no'];
}

if(!empty($username) ){
 $select_customer = "SELECT *  FROM users WHERE username = '$username'";
  $customer_result = mysqli_query($conn, $select_customer);
  if(mysqli_num_rows($customer_result) > 0){
    while($row = mysqli_fetch_assoc($customer_result)){
      $customer = $row['id'];
    }
  }
}

if(!empty($bus_no)){
    $select_product = "SELECT * FROM routes WHERE bus_no = '$bus_no'";
    $product_result = mysqli_query($conn, $select_product);
    if(mysqli_num_rows($product_result) > 0){
      while($row = mysqli_fetch_assoc($product_result)){
        $route = $row['id'];
        $price = $row['price'];
        $time=$row['time'];

      }
    }
}

if(!empty($set_no)){
    $select_customer = "SELECT *  FROM bookings WHERE seat = '$set_no'";
  $customer_result = mysqli_query($conn, $select_customer);
  if(mysqli_num_rows($customer_result) > 0){
    $result['success']='0';
    $result['message']='Seat already booked please select another one';
        echo json_encode($result);
        mysqli_close($conn);
  }
  else{
      $insert_query = "INSERT INTO bookings (seat,price, start, dest,time, customer_id,status) values ('$set_no', '$price', '$from', '$to', '$time', '$customer', 'received')";
      
       
       if(mysqli_query($conn,$insert_query)){
            $result['success']='1';
        $result['message']='Book placed succesfull';
            echo json_encode($result);
          mysqli_close($conn);
       }
       else {
            $result['success']='0';
            $result['message']='error';
                echo json_encode($result);
                mysqli_close($conn);
       }
  }
}



?>