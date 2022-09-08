<?php

include('../include/security.php');
include('../include/connect.php');
include('../include/sideNav.php');

$bus_name = $bus_no = $from = $destination = "";
$bus_nameErr = $bus_noErr =  $fromErr =  $destinationErr = "";

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
     <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
            <div class="form-group p-4 card shadow rounded">
             <form action="" method="POST" class="needs-validation">
             <h4 class="display-5 text-primary"> Register Bus </h4>
            <div class="">
                <label for="Bus Name">Bus Name</label>
                <input type="text" name="bus_name" placeholder="Enter bus name" class="form-control">
                <span class="text-danger"></span>
            </div>
            <hr class="mt-2">
            <div class="">
                <label for="Bus No">Bus No</label>
                <input type="text" name="bus_no" placeholder="Enter Bus No" class="form-control">
                <span class="text-danger"></span>
            </div>
            <hr class="mt-2">
            <div class="">
                <label for="From">From</label>
                <input type="text" name="from" placeholder="Enter From" class="form-control">
                <span class="text-danger"></span>
            </div>
            <hr class="mt-2">
            <div class="">
                <label for="Destination">Destination</label>
                <input type="text" name="destination" placeholder="Enter Destination" class="form-control">
                <span class="text-danger"></span>
            </div>
            <hr class="mt-2">
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
include('../include/footer.php');

$message = "please fill out this input is required";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    function validate($data){

      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

   if(isset($_POST['save'])){
    if(empty($_POST['bus_name'])){
        $bus_nameErr = $message;
    }
    else{
        $bus_name = validate($_POST['bus_name']);
    }

    if(empty($_POST['bus_no'])){
        $bus_noErr =  $message;
    }
    else{
        $bus_no = validate($_POST['bus_no']);
    }

    if(empty($_POST['from'])){
        $fromErr = $message;
    }
    else{
        $from =  validate($_POST['from']);
    }

    if(empty($_POST['destination'])){
        $destinationErr =  $message;
    }
    else{
        $destination =  validate($_POST['destination']);
    }

   } 


   if(!empty($bus_name) && !empty($bus_no) && !empty($from) && !empty($destination)){

    $insert_query = "INSERT INTO buses(bus_name, bus_no, depature, destination) VALUES('$bus_name', '$bus_no', '$from', '$destination')";
    $results =  mysqli_query($conn, $insert_query);

    if($results){
        ?>
        <script> alert("data inserted succesfully") </script>
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

