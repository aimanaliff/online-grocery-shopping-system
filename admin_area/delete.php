<?php 

$db=mysqli_connect("localhost","root","","groceries");

if(isset($_POST['product'])){
    
    $product_id = $_POST['product'];

    $querydelete = "DELETE FROM product where product_id='$product_id'";
    $run_querydelete = mysqli_query($db, $querydelete);

    
    if($run_querydelete){
        $response = true;
        echo "<script>alert('Delete succesfully')</script>";
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

?>