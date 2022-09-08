<?php
ob_start();
session_start();

include('../include/connect.php');
include('../include/sideNav.php');

if($_SESSION['busname']){
    $busname = $_SESSION['busname'];
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
         <div class="card shadow rounded p-3">
             <div class="table-responsive">
            <h4 class="display-5 text-primary"> Registered Routes</h4>
            <table class="table">
                <thead class="bg-primary text-light">
                    <th>S/NO</th>
                    <th>Starting Point</th>
                    <th>Destination</th>
                    <th>Time</th>
                    <th>Bus Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    $select_query = "SELECT * FROM routes WHERE company = '$busname' ";
                    $results =  mysqli_query($conn, $select_query);
                    if(mysqli_num_rows($results) > 0){
                        while( $row = mysqli_fetch_assoc($results)){
                            ?>
                            <tr>
                                <td> <?= $row['id'] ?> </td>
                                <td> <?= $row['start'] ?> </td>
                                <td> <?= $row['destination'] ?> </td>
                                <td> <?= $row['time'] ?> </td>
                                <td> <?= $row['bus_no'] ?> </td>
                                <td> <?= $row['price'] ?> </td>
                                <td> 
                            <button class="btn btn-info text-white">Edit</button>
                            <button class="btn btn-danger text-white">Edit</button>
                        </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
          </table>
         </div>
      </div>
</body>
</html>

<?php
include('../include/footer.php');
?>