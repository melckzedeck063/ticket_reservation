<?php

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
         <div class="card shadow rounded p-3">
             <div class="table-responsive">
            <h4 class="display-5 text-primary"> Registered Bus </h4>
            <table class="table">
                <thead class="bg-primary text-light">
                    <th>S/NO</th>
                    <th>Bus</th>
                    <th>Bus Name</th>
                    <th>From</th>
                    <th>Destination</th>
                    <th>Action</th>
                </thead>
                <tbody>

                    <?php
                    $select_query =  "SELECT * FROM buses";
                    $results = mysqli_query($conn, $select_query);
                    if(mysqli_num_rows($results) > 0){
                        while( $rows = mysqli_fetch_assoc($results)){
                            ?>
                             <tr>      
                        <td> <?= $rows["id"] ?> </td>
                        <td> <?= $rows["bus_name"] ?> </td>
                        <td> <?= $rows["bus_no"] ?> </td>
                        <td> <?= $rows["depature"] ?> </td>
                        <td> <?= $rows["destination"] ?> </td>
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
     </div>
</body>
</html>

<?php
include('../include/footer.php');
?>