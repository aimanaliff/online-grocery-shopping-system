<?php 

$db=mysqli_connect("localhost","root","","groceries");


if(isset($_POST['name'])){
   
    $ListID = $_POST['id'];
    $update = $_POST['name'];
    $sql = "update listname set ListName='$update' where ListID='$ListID'";
    $run_sql = mysqli_query($db, $sql);
    if($run_sql){
        $response = true;
        echo "<script>alert('succesfully')</script>";
        echo "<script>window.open('_self')</script>";
    }
    else{
        $response = false;
        echo "<script>alert('not succesfully')</script>";
    }
} else {
    echo "<script>console.log(sadadsaaa)</script>";
    echo "<script>alert('not succesfully')</script>";
}
// echo "asdasd";

?>