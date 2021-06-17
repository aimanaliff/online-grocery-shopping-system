<?php

include("../functions/function.php");
include("../src/passwordRecover.php");
include("../src/login.php");

//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if(isset($_GET["code"]))
{
 $code = $_GET["code"];
 //It will Attempt to exchange a code for an valid authentication token.
 $token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);

 //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
 if(!isset($token['error']))
 {
  //Set the access token used for requests
  $client->setAccessToken($token['access_token']);

  //Store "access_token" value in $_SESSION variable for future use.
  $_SESSION['access_token'] = $token['access_token'];

  //Create Object of Google Service OAuth 2 class
  $google_service = new Google_Service_Oauth2($client);

  //Get user profile data from google
  $data = $google_service->userinfo->get();

  //Below you can find Get profile data and store into $_SESSION variable
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
    $email =$data['email'];
    $username = $data['given_name'];
    $password = $data['password'];
 }
 $con = mysqli_connect("localhost","root","","groceries");
 $query = "SELECT * FROM user where email='$email'";
 $run=mysqli_query($con, $query);
 $count = mysqli_num_rows($run);

 if($count == 1){
    $row_id = mysqli_fetch_array($run);
    $userid = $row_id['id'];
    $_SESSION['user']=$userid;
    $_SESSION['success'] = "You are now logged in";
 } else {
    $code1 = '123456789qazwsxedcrfvtgbyhnujmikolp';
    $code1 = str_shuffle($code);
    $code1 = substr($code, 0, 10);
    $query1 = "INSERT INTO user (username, email,  passwordd, user_type, token) 
                    VALUES('$username', '$email', '$password','user','$code1')";
    mysqli_query($con, $query1);

    $get_id = "select * from user where id=(select max(id) from user)";
    
    $run_id = mysqli_query($con, $get_id);

    $row_id = mysqli_fetch_array($run_id);

    $usrname = $row_id['id'];
    $query2 = "insert into userdetails (id,name,phoneNo,dateOfBirth,street,city,state,zipcode,image) values ('$usrname','',''
    ,'','','','','','default.png')";

    mysqli_query($con, $query2);

    $_SESSION['user'] = $usrname; // put logged in user in session
    $_SESSION['success']  = "s";
 }

 
}

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <!-- <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NyumNyum Grocer Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet'>
    <link rel="stylesheet" href="../nyumstyle.css?v=<?=time();?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/@pqina/flip/dist/flip.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="../hamburgers.css" rel="stylesheet">
    <link rel="icon" href="../img/nyumicon.ico">
    <style>
    html {
        overflow-y: scroll;
    }
    .result{
        background-color: #f6f6f6;
        position:absolute;        
        z-index: 2;
        top: 100%;
        overflow-y: auto;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        width:95%;
        border-radius: 20px 0 0 20px;
        max-height: 20rem;
        left:1px;
    }

    .result a{
        text-decoration:none;
    }

    /* .result a p {
        color:black;
        padding-left:5px;
        padding-top:3px;
    } */

    .result a p:hover{
        background:lightgray;
        padding-top:15px;
        padding-bottom:15px;
    }

    .result p {
        color:#595959;
        padding-left:25px;
        padding-top:15px;
        padding-bottom:15px;
        font-size:15px;
        font-family: "Noto Sans", sans-serif;
        font-weight: bold;
    }

    </style>
    
</head>

<body>
<div id="page-container">
    <header class="py-3" style="background-color: #92D050;">
        <div class="container gap-3">
            <div class="d-flex align-items-center flex-wrap flex-sm-nowrap justify-content-between">
                <button class="btn btn-warning d-sm-none order-1" type="button" data-bs-toggle="collapse" data-bs-target="#categoriesToggle" aria-controls="categoriesToggle" aria-expanded="true" aria-label="Toggle navigation">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                    </svg>
                </button>
                <?php
                if(isset($_SESSION['success'])){
                    $userid = $_SESSION['user'];
                
                ?>
                <a href="index.php?id=<?=$userid; ?>" class="navbar-brand order-2">
                    <img src="../img/nyumnyumlogo.png" alt="logo" width="150" class="mx-2">
                </a>
            <?php 
            } else {

            
            ?>
                <a href="index.php" class="navbar-brand order-2">
                    <img src="../img/nyumnyumlogo.png" alt="logo" width="150" class="mx-2">
                </a>
            <?php 
            }
            ?>
                <form class="input-group order-4 order-sm-3 search-box" >
                    <input type="search" id="search" name="s"  class="form-control" placeholder="Search" style="outline: none !important;box-shadow:none;"  required>
                    <button class="btn btn-success" name="searchsubmit" onclick="loadSearch()" type="button" id="button-addon2" style="border-radius: 0 20px 20px 0;"><span class="material-icons pt-1">
                            search
                        </span></button>
                    <div class="result" id="hid"></div>
                </form>
                

                <ul class="navbar-nav order-3 order-sm-4 ms-3 mb-2 mb-md-0 d-flex flex-row">
                    <li class="nav-item mx-1">
                        <?php 
                          
                            if(isset($_SESSION['success'])){
                                $userid = $_SESSION['user'];
                                $query = "select * from user where id=".$userid;
                                $run_query = mysqli_query($db,$query);
                                $row_name=mysqli_fetch_array($run_query);
                                $name = $row_name['username'];
                                echo "
                                <a href='../src/user.php?id=$userid' . class='nav-link text-dark' data-bs-toggle='tooltip' data-bs-placement='top' title = '$name' value='$name'><svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-person' viewBox='0 0 16 16'>
                                    <path d='M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z' />
                                </svg>
                                
                                </a>
                                ";
                                

                            } else{
                                echo "
                                <a href='' class='nav-link text-dark' data-bs-toggle='modal' data-bs-target='#exampleModal'><svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-person' viewBox='0 0 16 16'>
                                    <path d='M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z' />
                                </svg></a>
                                ";
                            }
                        ?>
                        
                    </li>
                    <li class="nav-item mx-1">
                    <?php 
                        if(isset($_SESSION['success'])){
                            $userid = $_SESSION['user'];
                            echo "
                                <a href='../src/cart.php?id=$userid'  class='cart nav-link text-dark'><svg xmlns='http://www.w3.org/2000/svg' width='23' height='23' fill='currentColor' class='bi bi-bag' viewBox='0 0 16 16'>
                                <path d='M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z'/>
                              </svg></a>
                            "
                            ;
                        }
                        else{
                            echo "
                                <a href='' data-bs-toggle='modal' data-bs-target='#exampleModal' class='nav-link text-dark'><svg xmlns='http://www.w3.org/2000/svg' width='23' height='23' fill='currentColor' class='bi bi-bag' viewBox='0 0 16 16'>
                                <path d='M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z'/>
                              </svg></a>
                            "
                        ;
                        }
                    
                    ?>
                    </li>
                    <li class="nav-item mx-1">
                    <?php 
                        if(isset($_SESSION['success'])){
                            $userid = $_SESSION['user'];
                            echo "
                                <a href='../src/list1.php?id=$userid'. class='nav-link text-dark'><svg xmlns='http://www.w3.org/2000/svg' width='28' height='29' fill='currentColor' class='bi bi-list-ul' viewBox='0 0 16 16'>
                                <path fill-rule='evenodd' d='M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
                              </svg></a>
                            "
                            ;
                        }
                        else{
                            echo "
                                <a href='' data-bs-toggle='modal' data-bs-target='#exampleModal' class='nav-link text-dark'><svg xmlns='http://www.w3.org/2000/svg' width='28' height='33' fill='currentColor' class='bi bi-list-ul' viewBox='0 0 16 16'>
                                <path fill-rule='evenodd' d='M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
                              </svg></a>
                            "
                        ;
                        }
                    ?>
                    </li>
                    
                </ul>
            </div>
        </div>
    </header>

    <nav  class="navbar navbar-expand-sm stickyjimmy shadow py-2 justify-content-center" style="background-color: #FD6C5D;">
        <div class="collapse navbar-collapse" id="categoriesToggle">
            <div class="container">
                <ul class="navbar-nav mb-2 mb-md-0 w-100 justify-content-around next" style="font-weight: bold;">
                <?php 
                    if(isset($_SESSION['success'])){
                        $userid = $_SESSION['user'];
                        echo "
                            <li class='nav-item'><a href='../src/products.php?page=1&id=$userid&p_cat_id=1' class='nav-link text-dark'>Fruits</a></li>
                            <li class='nav-item'><a href='../src/products.php?page=1&id=$userid&p_cat_id=2' class='nav-link text-dark'>Vegetables</a></li>
                            <li class='nav-item'><a href='../src/products.php?page=1&id=$userid&p_cat_id=3' class='nav-link text-dark'>Meat</a></li>
                            <li class='nav-item'><a href='../src/products.php?page=1&id=$userid&p_cat_id=4' class='nav-link text-dark'>Cookies & Snacks</a></li>
                            <li class='nav-item'><a href='../src/products.php?page=1&id=$userid&p_cat_id=5' class='nav-link text-dark'>Beverages</a></li>
                        "
                        ;
                    }
                    else{
                        echo "
                        <li class='nav-item'><a href='../src/products.php?p_cat_id=1' class='nav-link text-dark'>Fruits</a></li>
                        <li class='nav-item'><a href='../src/products.php?p_cat_id=2' class='nav-link text-dark'>Vegetables</a></li>
                        <li class='nav-item'><a href='../src/products.php?p_cat_id=3' class='nav-link text-dark'>Meat</a></li>
                        <li class='nav-item'><a href='../src/products.php?p_cat_id=4' class='nav-link text-dark'>Cookies & Snacks</a></li>
                        <li class='nav-item'><a href='../src/products.php?p_cat_id=5' class='nav-link text-dark'>Beverages</a></li>
                        "
                    ;
                    }
                ?>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered signin_dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #70AD47;">
                    <img src="../img/nyumnyumlogo.png" alt="">
                </div>
                <div class="modal-body signin_modal">
                    <ul class="nav nav-tabs tab" id="myTab" role="tablist">
                        <li class="nav-item1">
                            <a class="nav-link active" style="color: black;" id="home-tab" data-bs-toggle="tab" data-bs-target="#signin" href="#signin" type="button" role="tab" aria-controls="home" aria-selected="true">Sign
                                In</a>
                        </li>
                        <li class="nav-item1" role="presentation">
                            <a class="nav-link" style="color: black;" id="profile-tab" data-bs-toggle="tab" data-bs-target="#signup" href="#signup" type="button" role="tab" aria-controls="profile" aria-selected="false">Sign Up</a>
                        </li>

                    </ul>

                 
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="home-tab">
                        <div class="social-login">
                            <ul class="social_log">
                                <li>
                                    <!-- <a href="https://www.facebook.com/" class="fa fa-facebook"></a> -->
                                    <?php
                                    $s = $client->createAuthUrl();
                                    echo "<a href='$s' class=''>
                                    <img src='../admin_area/product_images/signin.png' alt='' style='width:60%;'>
                                    </a>";
                                    ?>
                                </li>

                            </ul>

                        </div>
                            <form  method="post" enctype="multipart/form-data">

                                <div class="mb-3">
                                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" required>
                                </div>
                                <div class="mb-3">
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                                </div>
                                <button type="submit" name="loginbtn" class="btn btn-primary btn-block">Login</button>
                            </form>
                            <p class="forgot_link">
                                <a data-bs-dismiss="modal" class="text-decoration-none" style="color: black;" href="" data-bs-toggle='modal' data-bs-target='#example'>Forgot your password ?</a>
                            </p>
                        </div>
                        <div class="tab-pane fade" id="signup" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="social-login">
                            <ul class="social_log">
                                <li>
                                    <!-- <a href="https://www.facebook.com/" class="fa fa-facebook"></a> -->
                                    <?php
                                    $s = $client->createAuthUrl();
                                    echo "<a href='$s' class=''>
                                    <img src='../admin_area/product_images/signupnew.png' alt='' style='width:60%;'>
                                    </a>";
                                    ?>
                                </li>

                            </ul>

                        </div>
                            <form  method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <input type="email" name="email1" value="" onkeyup="checkAvailabilityEmail()" class="form-control" id="userEmail" aria-describedby="emailHelp" placeholder="Email" required>
                                    <div id="msg1"></div>
                                </div>

                                <div class="mb-3">
                                    <input type="text" name="username" value="" onkeyup="checkAvailability()" class="form-control" id="user" aria-describedby="textHelp" placeholder="Username" required>
                                    <div id="msg"></div>
                                </div>
                                
                                <div class="mb-3">
                                    <input type="password" name="password1" class="form-control" id="Password1" placeholder="Password" required>
                                </div>
                                <div class="mb-3">
                                    <input type="password" name="password2" class="form-control" id="Password2" placeholder="Re-Enter Password" required>
                                    <span id="message"></span>
                                </div>
                                
                                
                                <!-- <div class="mb-3">
                                <input class="form-check-input" type="checkbox" name="user_type" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Admin
                                </label>
                                </div> -->
                                <button type="submit" name="submit_Register" class="btn btn-primary btn-block">Create An Account</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="example" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="tab-content modal-body">
                <form  method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="username" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email" required>
                    </div>
                    <button type="submit" name="submitpasswordrecovery" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
            </div>
        </div>
    </div>
        

    <button type="button" class="btn rounded-circle" id="scrollUp" onclick="goUp()">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="46" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
            <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
        </svg>
    </button>
    <?php 
    if(isset($_SESSION['success'])){
        $id= $_SESSION['user'];
       
    }
        
        
    ?>
    <script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
    })
    
    <?php 
    // $_SESSION['varname']="<script>document.writeln(search);</script>";
    if(isset($_SESSION['user'])){
        $id = $_SESSION['user'];
    } else {
        $id = 0;
    }
    ?>
    function loadSearch(){
        
        var id = <?php echo $id; ?>;
        var search = $("#search").val();
        if(search !=""){
            window.open("../src/searchProduct.php?id="+id+"&search="+search+"&page=1","_self");
        } else{

        }
        
    }

    function myFn(){
        Swal.fire({ 
              title: "failed",
              text: "Thank you for contacting us. We will get back to you soon!",
              type: "error" 
        },
             function(){
                window.open('index.php','_self');
        });
    }

    </script>
    <script>
        $('#Password1, #Password2').on('keyup', function () {
        if ($('#Password1').val() == $('#Password2').val() ) {
            $('#message').html('Password matched').css('color', 'green');
        } else{
            if($('#Password2').val() =="" || $('#Password1').val() ==""){
            } else{
                $('#message').html('Password not matched').css('color', 'red');
            }
        }
        if($('#Password1').val() =="" && $('#Password2').val()==""){
            $('#message').html('');
        }
        if($('#Password1').val() !="" && $('#Password2').val()==""){
            $('#message').html('');
        }
        if($('#Password1').val() =="" && $('#Password2').val()!=""){
            $('#message').html('');
        }
            
        });

        function checkAvailability(){
        console.log("sad");
        var username = $("#user").val().trim();
            $.ajax({
                type:"post",
                url:"../includes/check_availability.php",
                data:{
                    username:username
                },
                success:function(response){
                    $("#msg").html(response);
                }
            });

        
        }

        function checkAvailabilityEmail(){
        console.log("sad");
        var email = $("#userEmail").val().trim();
            $.ajax({
                type:"post",
                url:"../includes/check_availabilityEmail.php",
                data:{
                    email:email
                },
                success:function(response){
                    console.log(response);
                    $("#msg1").html(response);
                }
            });

        
        }
    </script>
    <script type="text/javascript">
    
    
    
    $(document).ready(function(){
        // fetch data from table without reload/refresh page
        
        function loadData(query){
        var id = <?php echo $id; ?>;
          $.ajax({
            url : "../includes/search.php",
            type: "post",
            data:{query:query,id:id},
            success:function(response){
                $(".result").show()
                $(".result").html(response);
              
            }
          });  
        }

        // live search data from table without reload/refresh page
        $("#search").keyup(function(){
          var search = $("#search").val();
          if (search !="") {
            $(".result").show()
            loadData(search);
          }else{
            $("#hid").hide();
          }
        });
    });



    $(document).mouseup(function(e){
        var container1 = $("#search");
        var container = $("#hid");
        // If the target of the click isn't the container
        if(!container1.is(e.target) && container1.has(e.target).length === 0){
            container.hide();
        }
    });

    var input = document.getElementById("search");
    var search = $("#search").val();
    input.addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
        loadData(search);
        // document.getElementById("myBtn").click();
    }
    });
    </script>
    
    
    