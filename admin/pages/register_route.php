<?php
include('../include/security.php');
include('../include/connect.php');
include('../include/sideNav.php');

$start = $bus_no = $time = $price = $destination =$company = "";
$startErr = $bus_noErr = $timeErr = $priceErr = $destinationErr = "";


if(isset($_POST['next'])){
    $busname =   $_POST['bus'];
}

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
             <h4 class="display-5 text-primary"> Register Route </h4>
            <div class="">
                <label for="Start">Starting Point</label>
                <input type="text" name="start" placeholder="Enter Start" class="form-control">
                <span class="text-danger"></span>
            </div>
            <hr class="mt-2">
           
            <div class="">
                <label for="Bus No">Bus No</label>
            <select name="bus_no" id="" class="form-control">
                <option value="">Select Bus</option>
            <?php
              $select_query =  " SELECT * FROM buses WHERE bus_name = '$busname'";
              $results = mysqli_query($conn, $select_query);
              if(mysqli_num_rows($results) > 0){
                  while( $rows = mysqli_fetch_assoc($results)){
                      $bus = $rows['bus_name'];
                      ?>
                        <option value=<?= $rows['bus_no']?> > <?= $rows['bus_no'] . " " . $rows['bus_name'] ?></option>
                        <?php
                       
                  }   
                }
                ?>
            
            </select>
                <span class="text-danger"></span>
            </div>
            
           
            <hr class="mt-2">
            <div class="">
                <label for="Destination">Destination</label>
                <input type="text" name="destination" placeholder="Enter Destination" class="form-control">
                <span class="text-danger"></span>
            </div>
            <hr class="mt-2">
            <div class="">
                <label for="Time">Time</label>
                <input type="time" name="time" placeholder="Enter Time" class="form-control">
                <span class="text-danger"></span>
            </div>
            <hr class="mt-2">
            <div class="">
                <label for="price">price</label>
                <input type="text" name="price" placeholder="Enter price" class="form-control">
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
    if(empty($_POST['start'])){
        $startErr = $message;
    }
    else{
        $start = validate($_POST['start']);
    }

    if(empty($_POST['bus_no'])){
        $bus_noErr =  $message;
    }
    else{
        $bus_no = $_POST['bus_no'];
    }

    if(empty($_POST['time'])){
        $timeErr = $message;
    }
    else{
        $time =  validate($_POST['time']);
    }

    if(empty($_POST['price'])){
        $priceErr = $message;
    }
    else{
        $price =  validate($_POST['price']);
    }

    if(empty($_POST['destination'])){
        $destinationErr =  $message;
    }
    else{
        $destination =  validate($_POST['destination']);
    }

    
        $company =  validate($busname);

    

   } 


   if(!empty($start) && !empty($bus_no) && !empty($time) && !empty($destination) && !empty($price) && !empty($company)){

    $insert_query = "INSERT INTO routes(start, bus_no, company, time, destination, price) VALUES('$start', '$bus_no','$company' , '$time', '$destination', '$price')";
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

    // echo "  ====================  " .  $start . "<br>";
    // echo "  ====================  " .  $bus_no . "<br>";
    // echo "  ====================  " .  $company . "<br>";
    // echo "  ====================  " .  $price . "<br>";
    // echo "  ====================  " .  $destination. "<br>";
    // echo "  ====================  " .  $time . "<br>";
   }


}

?>