<?php

include('../include/security.php');
include('../include/connect.php');
include('../include/sideNav.php');

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
            <div class="col"></div>
            <div class="col-6 mt-4">

                <div class="form-group p-4 card shadow rounded">
                <h4 class="display-5 text-primary"> Register Route </h4>
                    <form method="POST" action="./register_route.php" class="needs-validation p-2">
                        <div class="mb-3">
                            <label for="Select Bus">Select Bus</label>
                            <select name="bus" id="" class="form-control">
                            <option value="">Select Bus</option>
            <?php
              $select_query =  " SELECT * FROM buses";
              $results = mysqli_query($conn, $select_query);
              if(mysqli_num_rows($results) > 0){
                  while( $rows = mysqli_fetch_assoc($results)){
                      ?>
                        <option value=<?= $rows['bus_name']?> > <?= $rows['bus_name']?></option>
                        <?php
                  }   
                }
                ?>
                            </select>
                        </div>
                        
                         <button style="width : 70%; margin: auto" class="btn btn-block btn-primary" name="next" > <a style="text-decoration : none;" class="text-white" href="../pages/register_route.php"> Next </a> </button>
                    </form>
                </div>
            </div>
            <div class="col"></div>
        </div>
      </div>
</body>
</html>

<?php

// if($_SERVER["REQUEST_METHOD"] === "POST"){

//    if(isset($_POST['next'])){
//     if(!empty($_POST['bus'])){
//         $busname = $_POST['bus'];
//         $_SESSION["busname"] = $busname;
//         header('Location: ../pages/register_route.php');
//     }
//    }
// }

include('../include/footer.php');
?>