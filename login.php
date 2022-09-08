
<?php
include('./admin/include/connect.php');

$username = "";
 if(isset($_POST['email'])){
    $username = $_POST['email'];
 }
 $password = "";
 if(isset($_POST['password'])){
 $password =  $password =  md5($_POST['password']);
 }

?>

<?php
if(isset($_POST['login'])){
        if(!empty($username) && !empty($password)){

           $login_query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' " ;
           $login_result = mysqli_query($conn, $login_query);
           
           if(mysqli_num_rows($login_result) > 0 ){
               while($row = mysqli_fetch_assoc($login_result) ){
                //    if($row['role'] == 'ADMIN'){
                    $result['success']='1';
                    $result['message']='Login successful';
                        echo json_encode($result);
                      mysqli_close($conn);
                //    }
               }
           }
           else {
            $result['success']='0';
            $result['message']='Invalid login credentials';
                echo json_encode($result);
                mysqli_close($conn);
       }

        }
        else {
            $result['success']='0';
            $result['message']='username and password is required';
                echo json_encode($result);
                mysqli_close($conn);
       }
    }

?>

 
