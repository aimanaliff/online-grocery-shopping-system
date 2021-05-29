<?php 

$db=mysqli_connect("localhost","root","","groceries");

if(isset($_POST['username'])){
    $username =$_POST['username'];
    $query ="SELECT * FROM user where username ='$username'";
    $result =mysqli_query($db, $query);
    $rowcount=mysqli_num_rows($result);
    if($rowcount >0){
        $response= "<span style='color: red;' class='status-not-available'> Username Not Available.</span>";
    }else{
        if($username == ""){
            $response = "";
        }else {
            $response= "<span style='color: green;' class='status-available'> Username Available.</span>";
        }
        
    }

    echo $response;
    die;
}



// global $ff;








?>