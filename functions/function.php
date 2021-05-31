<?php
$db = mysqli_connect("localhost", "root", "", "groceries");

global $ff;

function getpro()
{

    global $db, $p_cat_id0, $id, $page, $count, $run_product;

    // $per_page = 10;
    // $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
    // if (isset($_GET['p_cat_id'])) $p_cat_id0 = $_GET['p_cat_id'];
    // if (isset($_GET['id'])) $id = $_GET['id'];

    // $start_from = ($page-1) * $per_page;
    // $get_product = "select * from product where p_cat_id=$p_cat_id0 LIMIT $start_from,$per_page";
    // $run_product = mysqli_query($db, $get_product);
    // $count = mysqli_num_rows($run_product);

    while ($row_product = mysqli_fetch_array($run_product)) {
        global $product_id;
        $product_id = $row_product['product_id'];
        $p_cat_id = $row_product['p_cat_id'];
        $product_name = $row_product['product_name'];
        $product_price = $row_product['product_price'];
        $product_img = $row_product['product_img'];
        $product_quantity = $row_product['product_quantity'];
        $product_desc = $row_product['product_desc'];

        if (strlen($product_name) > 15) {
            $product_name = substr($product_name, 0, 8). " ... " . substr($product_name, -4);
        }

        if ($p_cat_id == $p_cat_id0) {
            $_SESSION['cart'] = $product_id;
            echo "
            
            <div class='col'>
                <div class='card shadow-sm sshighlight'>
                    <a href='products-closeup.php?id=$id&product_id=$product_id&p_cat_id=$p_cat_id'>
                        <img src='../admin_area/product_images/$product_img' alt='pise' class='card-img-top'>
                    </a>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_name</h5>
                        <p class='card-text'>RM $product_price</p>
                        <div class='d-flex flex-column justify-content-around gap-2 gap-sm-0'>
                            <a href='products-closeup.php?id=$id&product_id=$product_id&p_cat_id=$p_cat_id'  class='btn btn-success rounded-pill mb-sm-2  '>Add to List</a>
                            <a href='products-closeup.php?product_id=$product_id' class='btn btn-warning rounded-pill'>Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            
            ";
        }
    }
}

function getProDef()
{
    global $db, $p_cat_id0, $id, $page, $count;

    $per_page = 10;
    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
    if (isset($_GET['p_cat_id'])) $p_cat_id0 = $_GET['p_cat_id'];
    if (isset($_GET['id'])) $id = $_GET['id'];

    $start_from = ($page-1) * $per_page;
    $get_product = "SELECT * FROM product WHERE p_cat_id=$p_cat_id0 LIMIT $start_from,$per_page";
    $run_product = mysqli_query($db, $get_product);
    $count = mysqli_num_rows($run_product);

    getpro();
}

function getProA2Z()
{
    global $db, $p_cat_id0, $id, $page, $count;

    $per_page = 10;
    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
    if (isset($_GET['p_cat_id'])) $p_cat_id0 = $_GET['p_cat_id'];
    if (isset($_GET['id'])) $id = $_GET['id'];

    $start_from = ($page-1) * $per_page;
    $get_product = "SELECT * FROM product WHERE p_cat_id=$p_cat_id0 ORDER BY product_name ASC 
                    LIMIT $start_from,$per_page";
    $run_product = mysqli_query($db, $get_product);
    $count = mysqli_num_rows($run_product);

    getpro();
}

function getProZ2A()
{
    global $db, $p_cat_id0, $id, $page, $count;

    $per_page = 10;
    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
    if (isset($_GET['p_cat_id'])) $p_cat_id0 = $_GET['p_cat_id'];
    if (isset($_GET['id'])) $id = $_GET['id'];

    $start_from = ($page-1) * $per_page;
    $get_product = "SELECT * FROM product WHERE p_cat_id=$p_cat_id0 ORDER BY product_name DESC
                    LIMIT $start_from,$per_page";
    $run_product = mysqli_query($db, $get_product);
    $count = mysqli_num_rows($run_product);

    getpro();
}

function getProL2H()
{
    global $db, $p_cat_id0, $id, $page, $count;

    $per_page = 10;
    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
    if (isset($_GET['p_cat_id'])) $p_cat_id0 = $_GET['p_cat_id'];
    if (isset($_GET['id'])) $id = $_GET['id'];

    $start_from = ($page-1) * $per_page;
    $get_product = "SELECT * FROM product WHERE p_cat_id=$p_cat_id0 ORDER BY product_price ASC
                    LIMIT $start_from,$per_page";
    $run_product = mysqli_query($db, $get_product);
    $count = mysqli_num_rows($run_product);

    getpro();
}

function getProH2L()
{
    global $db, $p_cat_id0, $id, $page, $count;

    $per_page = 10;
    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
    if (isset($_GET['p_cat_id'])) $p_cat_id0 = $_GET['p_cat_id'];
    if (isset($_GET['id'])) $id = $_GET['id'];

    $start_from = ($page-1) * $per_page;
    $get_product = "SELECT * FROM product WHERE p_cat_id=$p_cat_id0 ORDER BY product_price DESC
                    LIMIT $start_from,$per_page";
    $run_product = mysqli_query($db, $get_product);
    $count = mysqli_num_rows($run_product);

    getpro();
}


function get_pro_details()
{
    global $product_id,$db;
    if(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];
    }
    $query = "select * from product where product_id='$product_id'";
    $run_query = mysqli_query($db,$query);

    if($row_product=mysqli_fetch_array($run_query)){
        $p_cat_id = $row_product['p_cat_id'];
        $product_name = $row_product['product_name'];
        $product_price = $row_product['product_price'];
        $product_img = $row_product['product_img'];
        $product_quantity = $row_product['product_quantity'];
        $product_desc = $row_product['product_desc'];
        
        echo "
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script>
        <div class='row row-cols-1 row-cols-lg-2 g-4 pb-4'>
            <div class='col'>
                <div class='card shadow-sm p-5'>
                    <img src='../admin_area/product_images/$product_img' alt='pise'>
                </div>
            </div>
            <div class='col'>
                <div class='row'>
                    <div class='col'>
                        <div class='card shadow-sm p-2 mb-4'>
                            <div class='card-body'>
                                <h1 class='card-title'>$product_name</h1>
                                <hr>
                                <div class='d-flex flex-column'>
                                    <div class='d-flex flex-row align-items-center gap-5 pb-3'>
                                        <label for='price' class='fs-5 pb-3'>Price:</label>
                                        <p class='fs-3'>RM$product_price</p>
                                    </div>
                                    <form  method='post' enctype='multipart/form-data'>
                                    <div class='d-flex flex-row align-items-center gap-3 pb-3'>
                                        <label for='quantity' class='fs-5'>Quantity:</label>
                                        <div class='dropdown'>
                                            <input type='number' class='form-control' id='op' name='quantity' value='1' 
                                            onclick='check()' onkeyup='check()' min='1'>
                                        
                                        </div>
                                    </div>
                                    <div class='d-flex flex-row gap-3'>
                                        <a href='#' data-bs-toggle='modal' data-bs-target='#modalProduct' class='btn btn-success rounded-pill'>Add to List</a>
                                        <a href='#' class='btn btn-warning rounded-pill'>Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class='card shadow-sm p-2'>
                            <div class='card-body'>
                                <h1 class='card-title pb-3'>Description</h1>
                                <p class='fs-5'>$product_desc</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ";
    }
}

if(isset($_POST['submitListName'])){
    insertIntoList();   
}

function insertIntoList(){

    global $db,$selectedval,$selectedval,$ff;
    
    $id = $_GET['id'];

    $ListID = $_POST['Listname'];
    $quantity = $_POST['quantity'];
    $product_id = $_GET['product_id'];

    $query = "INSERT INTO productinlist (ListID, product_id, quantity, id) 
            VALUES('$ListID', '$product_id', '$quantity','$id')";
    mysqli_query($db, $query);
}


// function list1(){

//     global $db,$productInListID,$ListID,$product_id,$quantity,$arr;

//     $id = $_GET['id'];

//     $get_productList = "select * from productinlist where id='$id'";

//     $run_productList = mysqli_query($db, $get_productList);

//     $get_product = "select * from listname";

//     $run_product = mysqli_query($db, $get_product);

//     $arr = array();
//     $i = 0;
//     while ($row_product = mysqli_fetch_array($run_product)) {
//         // $productInListID = $row_product['ProductInListID'];
//         $ListID = $row_product['ListID'];
//         // $product_id = $row_product['product_id'];
//         // $quantity = $row_product['quantity'];
//         $ListName = $row_product['ListName'];

//         echo '
        
//             <div class="row mb-3">
//                 <div class="col-1">

//                     <div class="edit d-flex justify-content-center" style="margin-top: 7px;">
//                         <button type="button" class="btn btn-outline-primary buttonsquare" id="buttonmodal" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="border-radius: 25px;">
//                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
//                             <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
//                             <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
//                             </svg>
//                         </button>
//                     </div>

//                 </div>
//                 <div class="col">
//                     <div class="accordion-item">
//                         <h2 class="accordion-header" id="flush-headingTwo">
//                             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseTwo">
//                                 Vegetables <span class="badge bg-secondary mx-2">2</span>
//                             </button>
//                         </h2>
//                         <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
//                             <div class="accordion-body"> ';
                           
//                             while ($row_productList = mysqli_fetch_array($run_productList)) {

//                                 global $index;
                                
                                
//                                 $productInListID = $row_productList['ProductInListID'];
//                                 $ListID = $row_productList['ListID'];
//                                 $product_id = $row_productList['product_id'];
//                                 $quantity = $row_productList['quantity'];
                            
//                                 $query = "select * from product where product_id='$product_id'";

//                                 $run_query = mysqli_query($db, $query);

//                                 $row_query = mysqli_fetch_array($run_query);

//                                 $product_img = $row_query['product_img'];

//                                 $product_desc = $row_query['product_desc'];

//                                 $product_name = $row_query['product_name'];

//                                 $product_price = $row_query['product_price'];

//                                 array_push($arr,$product_price);

//                                 echo '
//                                 <div class="row py-xxl-5 py-sm-4 align-items-center">
//                                     <div class="col-1 align-self-center py-2 mx-sm-auto">
//                                         <button type="button" class="btn btn-outline-danger btn-sm">
//                                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
//                                                 <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
//                                                 <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
//                                             </svg>
//                                         </button>
//                                     </div>
//                                     <div class="col-2">
//                                         <h4 style="text-align: center;">'.$product_price.'</h4>
//                                         <img src="../admin_area/product_images/'.$product_img.'" class="img-thumbnail" alt="">
//                                     </div>
//                                     <div class="col-2 align-self-center mt-5">
//                                         <div>
//                                             <p class="fw-normal"></p>
                                            
//                                         </div>
//                                     </div>
//                                     <div class="col-2">
//                                         <input type="number" min="0" class="form-control" id="inputQuantity1'.$i.'" onclick=\'multiply1();\' onkeyup=\'multiply1();\' value="'.$quantity.'">
//                                     </div>
//                                     <div class="col-2 align-self-center">
//                                         <div>
//                                             <h6 class="text-center">Sub Total</h6>
//                                             <p id="cartTotal1'.$i.'" class="text-center text-success fw-bold"></p>
//                                         </div>
//                                     </div>
//                                     <div class="col-1 align-self-center">
//                                         <input type="checkbox" name="" id="" class="">
//                                     </div>
//                                     <div class="col-2">
//                                         <button type="button" class="btn btn-outline-dark">Add to cart</button>
//                                     </div>
//                                 </div>

//                                 ';
//                                 echo "
//                                 <script>
//                                 var total = 0.0;
//                                 function multiply1(){
//                                     var quantity = document.querySelectorAll('#inputQuantity1".$i."');
//                                     total = quantity[0].value * 10;
//                                     document.getElementById('cartTotal1".$i."').innerHTML = 'RM ' + total;
//                                     console.log(total);
//                                 }
                                
//                                 </script>
//                                  ";

                                
//                                  $i = $i + 1;
//                             }
                            
//                                 echo '
//                             </div>
//                         </div>
//                     </div>
//                 </div>

//                 <div class="col-1">
//                     <div class="edit d-flex justify-content-center" style="margin-top: 7px;">
//                         <button type="button" class="btn btn-outline-danger buttonsquare" style="border-radius: 25px;" id="removeitemforwishlist">
//                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
//                         <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
//                         <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
//                         </svg>
//                     </button>
//                     </div>
//                 </div>

//             </div> 
//             ';


      
       
//     }

    
    


// }









$username = "";
$email = "";
$a = "";
session_start();
if (isset($_POST['submit_Register'])) {

    register();
}


function register()
{
    global $db, $username, $email;

    $username = $_POST['username'];
    $email = $_POST['email1'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    $password = $password1;
    if ($password1 == $password2) {
        if (isset($_POST['user_type'])) {
            $user_type = $_POST['user_type'];
            $query = "INSERT INTO user (username, email, passwordd, user_type, token ) 
                        VALUES('$username', '$email', '$password','admin', '123a' )";
            mysqli_query($db, $query);
            $_SESSION['success']  = "New user successfully created!!";
            header('location: ../admin_area/admin.php');
        } else {
            $code = '123456789qazwsxedcrfvtgbyhnujmikolp';
            $code = str_shuffle($code);
            $code = substr($code, 0, 10);
            $taken = "select * from user where username='$username'";
            $takenResult = mysqli_query($db, $taken);
            if (mysqli_num_rows($takenResult) > 0) {
                // $a = "Username Already Exists";
                // echo "<script>$('#msg').html('Username Already Exists').css('color', 'red')</script>";
                // echo "<script>alert('Username already taken')</script>";
                // echo "<script>window.open('index.php','_self')</script>";
            } else {
                $query = "INSERT INTO user (username, email,  passwordd, user_type, token) 
                VALUES('$username', '$email', '$password','user','$code')";
                mysqli_query($db, $query);


                $get_id = "select * from user where id=(select max(id) from user)";

                $run_id = mysqli_query($db, $get_id);

                $row_id = mysqli_fetch_array($run_id);

                $usrname = $row_id['id'];

                $query1 = "insert into userdetails (id,name,phoneNo,dateOfBirth,street,city,state,zipcode,image) values ('$usrname','',''
                ,'','','','','','')";

                mysqli_query($db, $query1);

                $logged_in_user_id = mysqli_insert_id($db);

                $_SESSION['user'] = $usrname; // put logged in user in session
                $_SESSION['success']  = "You are now logged in";
                header('location: ../src/index.php?id=' . $usrname);
            }
        }
    } else {
        echo "<script>alert('Password not same')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}

if (isset($_POST['loginbtn'])) {
    login();
}

// LOGIN USER
function login()
{
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
        } else {
            $_SESSION['user'] = $logged_in_user['id'];
            $_SESSION['success']  = "You are now logged in";

            header('location: ../src/index.php?id=' . $logged_in_user['id']);
        }
    } else {
        echo "<script>alert('Wrond email or password')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}





if (isset($_POST['save'])) {
    userDetail();
}

function userDetail()
{
    global $db, $name, $phoneNo,  $dateOfBirth, $street, $city, $state, $zipcode, $id, $user_img, $temp_name1;

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    $name = $_POST['name'];
    $phoneNo = $_POST['phoneNo'];


    $dateOfBirth = $_POST['dateOfBirth'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipcode = $_POST['zipcode'];
    $user_img = $_FILES['image']['name'];

    if ($user_img == "") {
        $query = "select * from userdetails where id='$id'";
        $run_query = mysqli_query($db, $query);
        $row_query = mysqli_fetch_array($run_query);
        $user_img = $row_query['image'];

        $query = "update userdetails set name='$name',phoneNo='$phoneNo',dateOfBirth='$dateOfBirth',street='$street'
        ,city='$city',state='$state',zipcode='$zipcode', image='$user_img' where id=$id";
    } else {
        $temp_name1 = $_FILES['image']['tmp_name'];
        move_uploaded_file($temp_name1, "../admin_area/product_images/user_image/$user_img");

        $query = "update userdetails set name='$name',phoneNo='$phoneNo',dateOfBirth='$dateOfBirth',street='$street'
        ,city='$city',state='$state',zipcode='$zipcode', image='$user_img' where id=$id";
    }

    // if (isset($_POST['submit'])) {
    //     $file = $_FILES['file'];

    //     $fileName = $_FILES['file']['name'];
    //     $fileTmpName = $_FILES['file']['tmp_name'];
    //     $fileSize = $_FILES['file']['size'];
    //     $fileError = $_FILES['file']['error'];
    //     $fileType = $_FILES['file']['type'];

    //     $fileExt = explode('.', $fileName);
    //     $fileActualExt = strtolower(end($fileExt));

    //     $allowed = array('jpg', 'jpeg', 'png');

    //     if (in_array($fileActualExt, $allowed)) {
    //         if ($fileError === 0) {
    //             if ($fileSize < 50000) {
    //                 $fileNameNew = uniqid('', true) . "." . $fileActualExt;
    //                 $fileDestination = 'uploads/' . $fileNameNew;
    //                 move_uploaded_file($fileTmpName, $fileDestination);
    //                 header("Location: index.php?uploadsuccess");
    //             } else {
    //                 echo "Your file is too big!";
    //             }
    //         } else {
    //             echo "There was an error uploading your file!";
    //         }
    //     } else {
    //         echo "You cannot upload files of this type!";
    //     }
    // }

    $run_query = mysqli_query($db, $query);

    if ($run_query) {
        echo "<script>alert('Your Information Have Been Saved')</script>";
        echo "<script>window.open('../src/user.php?id=$id','_self')</script>";
    }
}
