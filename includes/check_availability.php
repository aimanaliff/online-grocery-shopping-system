<?php 

$db=mysqli_connect("localhost","root","","groceries");

if(isset($_POST['username'])){
    $username =$_POST['username'];
    $query ="SELECT * FROM user where username ='$username'";
    $result =mysqli_query($db, $query);
    $rowcount=mysqli_num_rows($result);
    if($rowcount >0){
        $response= "<span style='color: red;' class='status-not-available'> Username is not available</span>";
    }else{
        if($username == ""){
            $response = "";
        }else {
            $response= "<span style='color: green;' class='status-available'> Username is available</span>";
        }
        
    }

    echo $response;
}

?>

<?php

// global $ff;


if(isset($_POST['id2'])){
    $return_data = array();
    $id2 = $_POST['id2'];
    $pass = $_POST['pass'];
    $passEnc = md5($pass);
    $query = "SELECT * FROM user where passwordd='$passEnc'";
    $run_query = mysqli_query($db, $query); 
    $count1 = mysqli_num_rows($run_query);

    if($count1 > 0 ){
        $querydelete2 = "DELETE FROM user where passwordd='".$passEnc."' and id='".$id2."'";
        $results = mysqli_query($db, $querydelete2);
        $return_data['status'] = 'success';
    } else {
        $return_data['status'] = 'info';
    }

    echo json_encode($return_data);
    die;
} else {

}

?>





