<?php 
$db=mysqli_connect("localhost","root","","groceries");

global $selectedval;

function getpro(){
    
    GLOBAL $db,$p_cat_id0,$id;

    if(isset($_GET['p_cat_id'])){
        $p_cat_id0 = $_GET['p_cat_id'];
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }


    $get_product = "select * from product";

    $run_product = mysqli_query($db,$get_product);

    while($row_product=mysqli_fetch_array($run_product)){
        global $product_id;
        $product_id = $row_product['product_id'];
        $p_cat_id = $row_product['p_cat_id'];
        $product_name = $row_product['product_name'];
        $product_price = $row_product['product_price'];
        $product_img = $row_product['product_img'];
        $product_quantity = $row_product['product_quantity'];
        $product_desc = $row_product['product_desc'];
        
        if($p_cat_id == $p_cat_id0){
            $_SESSION['cart'] = $product_id;
            echo "
            
            <div class='col'>
                <div class='card shadow-sm sshighlight'>
                    <a href='products-closeup.php?id=$id&product_id=$product_id'>
                        <img src='../admin_area/product_images/$product_img' alt='pise' class='card-img-top'>
                    </a>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_name</h5>
                        <p class='card-text'>RM $product_price</p>
                        <div class='d-flex flex-sm-column justify-content-around'>
                            <a href='products-closeup.php?product_id=$product_id'  class='btn btn-success rounded-pill mb-sm-2  '>Add to List</a>
                            <a href='products-closeup.php?product_id=$product_id' class='btn btn-warning rounded-pill'>Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            
            ";
        } 

    }


}

function get_pro_details(){
    
}


// if(isset($_GET['quantity'])){
//     echo "asdas";
//     $ff = $_GET['quantity'];
// }






$username ="";
$email ="";
$a = "";
session_start();
if(isset($_POST['submit_Register'])){
    
    register();
}


function register(){
    GLOBAL $db,$username,$email;
    
    $username = $_POST['username'];
    $email = $_POST['email1'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    $password = $password1;
    if($password1 == $password2){
        if (isset($_POST['user_type'])) {
            $user_type = $_POST['user_type'];
            $query = "INSERT INTO user (username, email, passwordd, user_type, token ) 
                        VALUES('$username', '$email', '$password','admin', '123a' )";
            mysqli_query($db, $query);
            $_SESSION['success']  = "New user successfully created!!";
            header('location: ../admin_area/admin.php');
        }else{
            $code = '123456789qazwsxedcrfvtgbyhnujmikolp';
            $code = str_shuffle($code);
            $code = substr($code,0, 10);
            $taken = "select * from user where username='$username'";
            $takenResult = mysqli_query($db,$taken);
            if(mysqli_num_rows($takenResult)>0){
                // $a = "Username Already Exists";
                // echo "<script>$('#msg').html('Username Already Exists').css('color', 'red')</script>";
                // echo "<script>alert('Username already taken')</script>";
                // echo "<script>window.open('index.php','_self')</script>";
            }else{
                $query = "INSERT INTO user (username, email,  passwordd, user_type, token) 
                VALUES('$username', '$email', '$password','user','$code')";
                mysqli_query($db, $query);
    
                
                $get_id = "select * from user where id=(select max(id) from user)";
    
                $run_id = mysqli_query($db,$get_id);
                
                $row_id=mysqli_fetch_array($run_id);
    
                $usrname = $row_id['id'];
    
                $query1 = "insert into userdetails (id,name,phoneNo,dateOfBirth,street,city,state,zipcode) values ('$usrname','',''
                ,'','','','','')";
    
                mysqli_query($db,$query1);
    
                $logged_in_user_id = mysqli_insert_id($db);
    
                $_SESSION['user'] = $usrname; // put logged in user in session
                $_SESSION['success']  = "You are now logged in";
                header('location: ../src/index.php?id='.$usrname);
            }
            
        }
    }else{
        echo "<script>alert('Password not same')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
    
    
}       

if (isset($_POST['loginbtn'])) {
	login();
}

// LOGIN USER
function login(){
	global $db, $username;

	// grap form values
	$username = $_POST['username'];
	$password1 = $_POST['password'];

	

	// attempt login if no errors on form
    $password = $password1;

    $query = "SELECT * FROM user WHERE username='$username' AND passwordd='$password' LIMIT 1";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) == 1) { // user found
        // check if user is admin or user
        $logged_in_user = mysqli_fetch_assoc($results);
        echo "$logged_in_user";
        if ($logged_in_user['user_type'] == 'admin') {

            $_SESSION['user'] = $logged_in_user['id'];
            $_SESSION['success']  = "You are now logged in";
            header('location: ../admin_area/admin.php');		  
        }else{
            $_SESSION['user'] = $logged_in_user['id'];
            $_SESSION['success']  = "You are now logged in";

            header('location: ../src/index.php?id='.$logged_in_user['id']);
        }
    }else {
        echo "<script>alert('Wrond email or password')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}





if (isset($_POST['save'])) {
	userDetail();
}

function userDetail(){
    global $db, $name, $phoneNo,  $dateOfBirth, $street, $city, $state, $zipcode,$id;

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $name = $_POST['name'];
    $phoneNo = $_POST['phoneNo'];

    
    $dateOfBirth = $_POST['dateOfBirth'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipcode = $_POST['zipcode'];

    $query = "update userdetails set name='$name',phoneNo='$phoneNo',dateOfBirth='$dateOfBirth',street='$street'
    ,city='$city',state='$state',zipcode='$zipcode' where id=$id";
    $run_query = mysqli_query($db,$query);

    if($run_query){
        echo "<script>alert('Your Information Have Been Saved')</script>";
        echo "<script>window.open('user.php?id=$id')</script>";
    }
}

?>





