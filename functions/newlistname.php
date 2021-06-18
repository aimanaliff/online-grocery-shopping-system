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

if(isset($_POST['id1'])){
   
    $ListID = $_POST['id1'];
    $sql = "DELETE FROM listname where ListID='$ListID'";
    $sql1 = "DELETE FROM productinlist where ListID='$ListID'";
    $run_sql = mysqli_query($db, $sql);
    
    if($run_sql){
        $response = true;
        $run_sql1 = mysqli_query($db, $sql1);
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

if(isset($_POST['productInListID'])){
   
    $productInListID = $_POST['productInListID'];
    $sql = "DELETE FROM productinlist where ProductInListID='$productInListID'";
    $run_sql = mysqli_query($db, $sql);
    if($run_sql){
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

if(isset($_POST['update'])){
    
    $productInListID1 = $_POST['update'];
    $id = $_POST['id'];
    $quantity = $_POST['quantity1'];
    $query = "UPDATE productinlist set quantity='$quantity' where productInListID=$productInListID1";
    $run_query = mysqli_query($db, $query);
    
    if($run_query){
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



//add to cart from shopping list
if(isset($_POST['quantity'])){
    
    $productInListID1 = $_POST['productInListID1'];
    $id = $_POST['id'];
    $quantity = $_POST['quantity'];

    $query = "SELECT * FROM productinlist where ProductInListID='$productInListID1' and id='$id'";
    $run_query = mysqli_query($db, $query);
    $row_query = mysqli_fetch_array($run_query);
    $product_id = $row_query['product_id'];
    $quantity = $row_query['quantity'];
    
    $sql = "INSERT INTO cart (product_id,id,quantity) VALUES('$product_id','$id','$quantity')";
    $run_sql = mysqli_query($db, $sql);

    $querydelete = "DELETE FROM productinlist where ProductInListID='$productInListID1' and id='$id'";
    $run_querydelete = mysqli_query($db, $querydelete);

    
    if($run_sql){
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

// update quantity when user click in cart
if(isset($_POST['updateCart'])){
    
    $quantity = $_POST['updateCart'];
    $cartid = $_POST['cartid'];
    $query = "UPDATE cart set quantity='$quantity' where cartID=$cartid";
    $run_query = mysqli_query($db, $query);
    
    if($run_query){
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



//delete cart
if(isset($_POST['cartID'])){
    
    $cartID = $_POST['cartID'];

    $querydelete = "DELETE FROM cart where cartID='$cartID'";
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


//add to cart from product page

if(isset($_POST['product_id'])){
    
    $product_id = $_POST['product_id'];
    $id = $_POST['id'];
    $quantity = $_POST['quantity'];
    
    $sql = "INSERT INTO cart (product_id,id,quantity) VALUES('$product_id','$id','1')";
    $run_sql = mysqli_query($db, $sql);

    if($run_sql){
        $response = true;
    }
    else{
        $response = false;
    }
} else {
}

// add to cart from product closeup
if(isset($_POST['product_id1'])){
    
    $product_id2 = $_POST['product_id1'];
    $id2 = $_POST['id2'];
    $quantity2 = $_POST['quantity2'];
    
    $sql = "INSERT INTO cart (product_id,id,quantity) VALUES('$product_id2','$id2','$quantity2')";
    $run_sql = mysqli_query($db, $sql);

    if($run_sql){
        $response = true;
    }
    else{
        $response = false;
    }
} else {
}

if(isset($_POST['listnam'])){
    $listnam = $_POST['listnam'];
    $id  =  $_POST['id'];

    $insert_product = "insert into listname (ListName,id)
                       values ('$listnam','$id')";

    $run_product = mysqli_query($db,$insert_product);
    if($run_product){
        $response = true;
    }
    else{
        $response = false;
    }
}





?>