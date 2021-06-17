<?php
$db = mysqli_connect("localhost", "root", "", "groceries");

function getpro($run_product)
{

    global $db, $p_cat_id0, $id, $page, $count;

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
        $sale = $row_product['sale'];
        $percentage = $row_product['percentage'];

        if (strlen($product_name) > 15) {
            $product_name = substr($product_name, 0, 8). " .. " . substr($product_name, -4);
        }

        if ($p_cat_id == $p_cat_id0 && isset($_SESSION['user'])) {
            $_SESSION['cart'] = $product_id;
            $id = $_SESSION['user'];
            echo "
            
            <div class='col'>
                <div class='card shadow-sm sshighlight'>
                    <a href='products-closeup.php?id=$id&product_id=$product_id&p_cat_id=$p_cat_id'>
                        <img src='../admin_area/product_images/$product_img' alt='pise' class='card-img-top' style='height: 200px;'>
                    </a>
                    <div class='card-body'>
                    ";
                    if($sale == "1"){
                        ?>
                        <div class='position-absolute top-0 end-0 pt-3'>
                            <h5><span class='badge bg-danger'><?php echo $percentage;?>% off</span></h5>
                        </div>
                        <?php
                    }
                    ?>
                <?php echo "
                        <h5 class='card-title'>$product_name</h5>
                        <p class='card-text'>RM $product_price</p>
            "; ?>

                        <div class='d-flex flex-column justify-content-around gap-2 gap-sm-0'>
                            <a href='products-closeup.php?id=<?php echo $id?>&product_id=<?php echo $product_id?>&p_cat_id=<?php echo $p_cat_id ?>'  class='btn btn-success rounded-pill mb-sm-2  '>Add to List</a>
                            <a onclick="add<?=$product_id?>()" class='btn btn-warning rounded-pill'>Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
    <?php
            
        } else {
            $_SESSION['cart'] = $product_id;
            echo "
            
            <div class='col'>
                <div class='card shadow-sm sshighlight'>
                    <a href='products-closeup.php?product_id=$product_id&p_cat_id=$p_cat_id'>
                        <img src='../admin_area/product_images/$product_img' alt='pise' class='card-img-top' style='height: 200px;'>
                    </a>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_name</h5>
                        <p class='card-text'>RM $product_price</p>
                "; ?>

                        <div class='d-flex flex-column justify-content-around gap-2 gap-sm-0'>
                            <a href='products-closeup.php?product_id=<?php echo $product_id?>&p_cat_id=<?php echo $p_cat_id ?>'  class='btn btn-success rounded-pill mb-sm-2  '>Add to List</a>
                            <a href='' data-bs-toggle='modal' data-bs-target='#exampleModal'  class='btn btn-warning rounded-pill'>Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            
        }
        ?>
        <script>
    
        function add<?=$product_id?>(){
            console.log("asd");
            var product_id = <?php echo $product_id ;?>;
            var id = <?php echo $id ;?>;
            $.ajax({
                    type:"post",
                    cache:false,
                    url:"../functions/newlistname.php",
                    data:{
                        product_id:product_id,
                        id:id
                    },
                    success:function(response){
                        if(response){
                            Swal.fire(
                                'Added!',
                                'Sucessfully added to your cart',
                                'success',
                                ).then((result) =>{
                                    if(result.isConfirmed){
                                        // location.reload();
                                    }
                                })
                        } else{
                            alert('not succesfully');
                            window.open("_self");
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        console.log(textStatus, errorThrown);
                    }
                });
        }
    
    
    </script>
    <?php
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

    getpro($run_product);
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

    getpro($run_product);
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

    getpro($run_product);
}

function getProL2H()
{
    // echo "asdasa";
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

   

    getpro($run_product);
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

    getpro($run_product);
}


function get_pro_details()
{
    global $product_id,$db;
    if(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];
        if(isset($_GET['id'])) $id = $_GET['id'] ;
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
        $sale = $row_product['sale'];
        $percentage = $row_product['percentage'];
        
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
                                ";
                                ?>
                                
                                
                                
                            <?php
                            echo "
                                <hr>
                                <div class='d-flex flex-column'>
                                    <div class='d-flex flex-row align-items-center gap-3 pb-3'>
                                    ";?>
                                        <label for='price' class='fs-5 pb-3'>Price:</label>
                                        <p class='fs-3 ps-4'>RM<?=$product_price; ?> </p>
                                        <?php
                                        if($sale == 1){
                                            ?>
                                            <h5><span class='badge bg-danger mb-2'><?=$percentage;?>% off</span></h5>
                                        <?php    
                                        }
                                        ?>
                                       
                                    </div>
                                    <?php echo "<form  method='post' enctype='multipart/form-data'>
                                    <div class='d-flex flex-row align-items-center gap-3 pb-3'>
                                        <label for='quantity' class='fs-5'>Quantity:</label>
        ";
        ?>
                                        <div class='dropdown'>
                                            <input type='number' class='form-control' id='op' name='quantity' value='1' min='1'>
                                        
                                        </div>
                                    </div>
                                    <div class='d-flex flex-row gap-3'>
                                    <?php 
                                        if(isset($_SESSION['user'])){
                                            ?>
                                            <a href='' data-bs-toggle='modal' data-bs-target='#modalProduct' class='btn btn-success rounded-pill'>Add to List</a>
                                            <a onclick="insertToCart1()" class='btn btn-warning rounded-pill'>Add to Cart</a>
                                        <?php
                                        } else{
                                            ?>
                                            <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success rounded-pill">Add to List</a>
                                            <a href='#' data-bs-toggle='modal' data-bs-target='#exampleModal' class='btn btn-warning rounded-pill'>Add to Cart</a>
                                        <?php
                                        }
                                    ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class='card shadow-sm p-2'>
                            <div class='card-body'>
                                <h1 class='card-title pb-3'>Description</h1>
                                
                                <p class='fs-5'><?php echo $product_desc?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <script>
        function insertToCart1(){
            console.log("asd");
            var product_id1 = <?php echo $product_id ;?>;
            var id2 = <?php echo $id ;?>;
            var quantity2 = document.querySelectorAll("#op");
            $.ajax({
                type:"post",
                cache:false,
                url:"../functions/newlistname.php",
                data:{
                    product_id1:product_id1,
                    id2:id2,
                    quantity2:quantity2[0].value
                },
                success:function(response){
                    if(response){
                        Swal.fire(
                            'Added!',
                            'Successfully added to your cart.',
                            'success',
                            ).then((result) =>{
                                if(result.isConfirmed){
                                    // location.reload();
                    }
                })
                    } else{
                        wal("Error!", "asd", "error");
                        // window.open("_self");
                    }
                },
                error: function(jqXHR, textStatus, errorThrown){
                    console.log(textStatus, errorThrown);
                }
            });
            
        }
        
        
        </script>
    <?php
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




$username = "";
$email = "";
$a = "";
$_SESSION['success'] = false;
session_start();
if (isset($_POST['submit_Register'])) {

    register();
}


function register()
{
    global $db, $username, $email;
    $_SESSION['success'] = false;
    $username = $_POST['username'];
    $email = $_POST['email1'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

   
    $password = $password1;
    if ($password1 == $password2) {
        $uppercase = preg_match('@[A-Z]@', $password1);
        $lowercase = preg_match('@[a-z]@', $password1);
        $number    = preg_match('@[0-9]@', $password1);
        $specialChars = preg_match('@[^\w]@', $password1);
        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password1) < 8) {
            echo "<script>alert('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }else{
            if (isset($_POST['user_type'])) {
                $user_type = $_POST['user_type'];
                $query = "INSERT INTO user (username, email, passwordd, user_type, token ) 
                            VALUES('$username', '$email', '$password','admin', '123a' )";
                mysqli_query($db, $query);
                $_SESSION['success']  = "s";
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
                    ,'','','','','','default.png')";
    
                    mysqli_query($db, $query1);
    
                    $logged_in_user_id = mysqli_insert_id($db);
    
                    $_SESSION['user'] = $usrname; // put logged in user in session
                    $_SESSION['success']  = "s";
                    header('location: ../src/index.php?id=' . $usrname);
                }
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

            // $_SESSION['user'] = $logged_in_user['id'];
            // $_SESSION['success'] = true;
            header('location: ../admin_area/admin.php');
            
        } else {
            $_SESSION['user'] = $logged_in_user['id'];
            $_SESSION['success']  = true;

            header('location: ../src/index.php?id=' . $logged_in_user['id']);
        }
    } else {
        echo '
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript">

        $(document).ready(function(){

            Swal.fire({
                icon: "error",
                type: "error",
                title: "ERROR",
                text: "Wrong username or password",
            });
        });
        </script>
        ';
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
