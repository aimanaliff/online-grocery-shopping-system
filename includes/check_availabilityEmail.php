<?php 

$db=mysqli_connect("localhost","root","","groceries");

if(isset($_POST['email'])){
    $email =$_POST['email'];
    $query ="SELECT * FROM user where email ='$email'";
    $result =mysqli_query($db, $query);
    $rowcount=mysqli_num_rows($result);
    if($rowcount >0){
        $response= "<span style='color: red;' class='status-not-available'> Account already exist </span>";
    }else{
        if($email == ""){
            $response = "";
        }else {
            $response= "<span style='color: green;' class='status-available'> </span>";
        }
        
    }

    echo $response;
    die;
}



// global $ff;








?>