<?php 

include('../admin/include/connect.php');
$contents = array();

$select_query =  "SELECT * FROM routes order by id asc";
$results =  mysqli_query($conn, $select_query);

if(mysqli_num_rows($results) > 0){
    $temp_array = array();

 while($row = $results->fetch_object()){
     $temp_array =  $row;
     array_push($contents,$temp_array);
     
 }
}

echo json_encode($contents);
	