<?php

include("../includes/header.php");



?>

<main>
    <div class="container-lg py-3 rounded" style="background-color:white;">
        <div id="s" class="row">
        <?php 
            if (isset($_SESSION['success']))
            {
                // header('Location: index.php');
        
            
        ?>
            <div class="col col-sm-3 py-5">
           
                <div class="d-flex justify-content-center">
                    <?php if (isset($_SESSION['user'])) : ?>

                        <?php
                        $query = "select * from userdetails where id=" . $_SESSION['user'];
                        $run_query = mysqli_query($db, $query);
                        $row_query = mysqli_fetch_array($run_query);
                        $user_img = $row_query['image'];
                        echo "<img class='rounded-circle' src='../admin_area/product_images/user_image/$user_img' width='150' height='150'>";
                        ?>
                    <?php endif ?>
                </div>
                <div class="d-flex justify-content-center m-2">

                    <?php
                    if (isset($_SESSION['success'])) {
                        $userid = $_SESSION['user'];
                        echo "
                                <a href='edituser.php?id=$userid' style='text-decoration: none;'>Edit
                                    Profile</a>
                            ";
                    } else {
                        echo "
                                <a href='edituser.php' style='text-decoration: none;'>Edit
                                Profile</a>
                            ";
                    }
                    ?>
                </div>
                <?php 
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $query = "select * from user where id='$id'";
                        $run_query = mysqli_query($db, $query);
                        $row_query = mysqli_fetch_array($run_query);
                        $user_pass = $row_query['passwordd'];

                        if($user_pass != ""){
                            ?>
                        <div class="d-flex justify-content-center mb-2">
                            <a class="" style="text-decoration:none;" data-bs-toggle="modal" data-bs-target="#updatePass">
                                    Change Password
                            </a>
                        </div>
                            <?php
                        } else{

                        }

                    }
                
                ?>
                
                <div class="modal fade" id="updatePass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form  method="post" enctype="multipart/form-data">
                                    <div class="mb-2">
                                        <input type="password" name="old" class="form-control" placeholder="Enter your old password">
                                    </div>
                                    <div class="mb-2">
                                        <input type="password" name="new1" class="form-control" placeholder="Enter your new password">
                                    </div>
                                    <div class="mb-2">
                                        <input type="password" name="new2" class="form-control" placeholder="Re-enter your new password">
                                    </div>
                               
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="updatePas" class="btn btn-primary">Save changes</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="logout.php">
                        <button class="btn btn-outline-danger" >
                            Logout
                        </button>
                    </a>
                   
                </div>
                
            </div>
            <div class="col-lg-9 py-2">
                <div class="col-lg-9 py-2">
                    <h4>My Profile</h4>
                    <h6>Manage and protect your account</h6>
                    <hr>
                    <div class="row g-3 py-2">
                        <div class="col-md-3">
                            <label for="labelName" class="col-form-label"><strong>Name</strong></label>
                        </div>
                        <div class="col-md-3 offset-md-2">

                            <?php if (isset($_SESSION['user'])) : ?>

                                <?php
                                $query = "select * from userdetails where id=" . $_SESSION['user'];
                                $run_query = mysqli_query($db, $query);
                                $row_query = mysqli_fetch_array($run_query);
                                $name = $row_query['name'];
                                $phoneNo = $row_query['phoneNo'];
                                $dateOfBirth = $row_query['dateOfBirth'];
                                $street = $row_query['street'];
                                $city = $row_query['city'];
                                $state = $row_query['state'];
                                $zipcode = $row_query['zipcode'];
                                
                                ?>



                                <label for="name" class="col-form-label"><?php echo "$name"; ?></label>

                            <?php endif ?>
                        </div>
                    </div>
                    <div class="row g-3 py-2">
                        <div class="col-md-3">
                            <label for="labelName" class="col-form-label"><strong>Username</strong></label>
                        </div>
                        <div class="col-md-3 offset-md-2">
                            <?php if (isset($_SESSION['user'])) : ?>

                                <?php

                                $query = "select * from user where id=" . $_SESSION['user'];
                                $run_query = mysqli_query($db, $query);

                                $row_query = mysqli_fetch_array($run_query);

                                $name = $row_query['username'];

                                ?>

                                <label for="name" class="col-form-label"><?php echo "$name"; ?></label>

                            <?php endif ?>
                        </div>
                    </div>
                    <div class="row g-3 py-2">
                        <div class="col-md-3">
                            <label for="labelEmail" class="col-form-label"><strong>Email</strong></label>
                        </div>
                        <div class="col-md-3 offset-md-2">
                            <?php if (isset($_SESSION['user'])) : ?>

                                <?php

                                $query = "select * from user where id=" . $_SESSION['user'];
                                $run_query = mysqli_query($db, $query);

                                $row_query = mysqli_fetch_array($run_query);

                                $email = $row_query['email'];
                                ?>
                                <label for="email" class="col-form-label"><?php echo "$email"; ?></label>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="row g-3 py-2">
                        <div class="col-md-3">
                            <label for="labelPhone" class="col-form-label"><strong>Phone Number</strong></label>
                        </div>
                        <div class="col-md-3 offset-md-2">
                            <?php if (isset($_SESSION['user'])) : ?>

                                <?php

                                $query = "select * from userdetails where id=" . $_SESSION['user'];
                                $run_query = mysqli_query($db, $query);

                                $row_query = mysqli_fetch_array($run_query);

                                $name = $row_query['name'];
                                $phoneNo = $row_query['phoneNo'];
                                $dateOfBirth = $row_query['dateOfBirth'];
                                $street = $row_query['street'];
                                $city = $row_query['city'];
                                $state = $row_query['state'];
                                $zipcode = $row_query['zipcode'];
                                ?>

                                <label for="name" class="col-form-label"><?php echo "$phoneNo"; ?></label>
                            <?php endif ?>
                        </div>
                    </div>
                   
                    <div class="row g-3 py-2">
                        <div class="col-md-3">
                            <label for="labelDOB" class="col-form-label"><strong>Date Of Birth</strong></label>
                        </div>
                        <div class="col-md-3 offset-md-2">
                            <?php if (isset($_SESSION['user'])) : ?>

                                <?php

                                $query = "select * from userdetails where id=" . $_SESSION['user'];
                                $run_query = mysqli_query($db, $query);

                                $row_query = mysqli_fetch_array($run_query);

                                $name = $row_query['name'];
                                $phoneNo = $row_query['phoneNo'];
                                $dateOfBirth = $row_query['dateOfBirth'];
                                $street = $row_query['street'];
                                $city = $row_query['city'];
                                $state = $row_query['state'];
                                $zipcode = $row_query['zipcode'];
                                ?>

                                <label for="name" class="col-form-label"><?php echo "$dateOfBirth"; ?></label>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 py-2">
                    <div class="row py-2">
                        <h4>Address Information</h4>
                        <h6>Manage your delivery information</h6>
                        <hr>
                    </div>
                    <div class="row g-3 py-2">
                        <div class="col-md-3">
                            <label for="labelAddress" class="col-form-label"><strong>Street</strong></label>
                        </div>
                        <div class="col-md-3 offset-md-2">
                            <?php if (isset($_SESSION['user'])) : ?>

                                <?php

                                $query = "select * from userdetails where id=" . $_SESSION['user'];
                                $run_query = mysqli_query($db, $query);

                                $row_query = mysqli_fetch_array($run_query);

                                $name = $row_query['name'];
                                $phoneNo = $row_query['phoneNo'];
                                $dateOfBirth = $row_query['dateOfBirth'];
                                $street = $row_query['street'];
                                $city = $row_query['city'];
                                $state = $row_query['state'];
                                $zipcode = $row_query['zipcode'];
                                ?>

                                <label for="address" placeholder="asdad" class="col-form-label"><?php echo "$street"; ?></label>
                            <?php endif ?>

                        </div>
                    </div>
                    <div class="row g-3 py-2">
                        <div class="col-md-3">
                            <label for="labelCity" class="col-form-label"><strong>City</strong></label>
                        </div>
                        <div class="col-md-3 offset-md-2">
                            <?php if (isset($_SESSION['user'])) : ?>

                                <?php

                                $query = "select * from userdetails where id=" . $_SESSION['user'];
                                $run_query = mysqli_query($db, $query);

                                $row_query = mysqli_fetch_array($run_query);

                                $name = $row_query['name'];
                                $phoneNo = $row_query['phoneNo'];
                                $dateOfBirth = $row_query['dateOfBirth'];
                                $street = $row_query['street'];
                                $city = $row_query['city'];
                                $state = $row_query['state'];
                                $zipcode = $row_query['zipcode'];
                                ?>

                                <label for="address" class="col-form-label"><?php echo "$city"; ?></label>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="row g-3 py-2">
                        <div class="col-md-3">
                            <label for="labelCity" class="col-form-label"><strong>State</strong></label>
                        </div>
                        <div class="col-md-3 offset-md-2">
                            <?php if (isset($_SESSION['user'])) : ?>

                                <?php

                                $query = "select * from userdetails where id=" . $_SESSION['user'];
                                $run_query = mysqli_query($db, $query);

                                $row_query = mysqli_fetch_array($run_query);

                                $name = $row_query['name'];
                                $phoneNo = $row_query['phoneNo'];
                                $dateOfBirth = $row_query['dateOfBirth'];
                                $street = $row_query['street'];
                                $city = $row_query['city'];
                                $state = $row_query['state'];
                                $zipcode = $row_query['zipcode'];
                                ?>

                                <label for="address" class="col-form-label"><?php echo "$state"; ?></label>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="row g-3 py-2">
                        <div class="col-md-3">
                            <label for="labelZipcode" class="col-form-label"><strong>Zipcode</strong></label>
                        </div>
                        <div class="col-md-3 offset-md-2">
                            <?php if (isset($_SESSION['user'])) : ?>

                                <?php

                                $query = "select * from userdetails where id=" . $_SESSION['user'];
                                $run_query = mysqli_query($db, $query);

                                $row_query = mysqli_fetch_array($run_query);

                                $name = $row_query['name'];
                                $phoneNo = $row_query['phoneNo'];
                                $dateOfBirth = $row_query['dateOfBirth'];
                                $street = $row_query['street'];
                                $city = $row_query['city'];
                                $state = $row_query['state'];
                                $zipcode = $row_query['zipcode'];
                                ?>

                                <label for="address" class="col-form-label"><?php echo "$zipcode"; ?></label>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } else {
                // session_unset();
                ?>
                <script>location.replace("index.php");</script>
                <?php
                }
                
                ?>
        </div>
    </div>
</main>
<!-- test -->
<?php

include("../includes/footer.php")

?>

<?php

if(isset($_POST['updatePas'])){
    $id = $_GET['id'];
    $old = $_POST['old'];
    $new1 = $_POST['new1'];
    $new2 = $_POST['new2'];
    $encrypte = md5($old);
    $sql = "select * from user where passwordd='$encrypte' and id='$id'";
    $run_sql = mysqli_query($db, $sql);
    $count = mysqli_num_rows($run_sql);

    if($count == 1){
        if($new1 == $new2){
            $md = md5($new1);
            $updatesql = "update user set passwordd='$md' where id=$id";
            $run_sql = mysqli_query($db, $updatesql);
            echo '
            <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script type="text/javascript">

            $(document).ready(function(){

                Swal.fire({
                    icon: "success",
                    type: "success",
                    title: "",
                    text: "Password successfully updated"
                });
            });
            </script>
            ';

            die();
        } else{
            echo '
            <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script type="text/javascript">

            $(document).ready(function(){

                Swal.fire({
                    icon: "error",
                    type: "error",
                    title: "",
                    text: "Password does not match"
                });
            });
            </script>
            ';
            die();
            // echo "<script>location.reload()</script>";
        }
    }else{
        echo '
            <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script type="text/javascript">

            $(document).ready(function(){

                Swal.fire({
                    icon: "error",
                    type: "error",
                    title: "",
                    text: "Password does not match"
                });
            });
            </script>
            ';
        die();
        // echo "<script>location.reload()</script>";
    }
    echo "<script>location.reload()</script>";
    die;
    
}


?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="/nyumscript.js"></script>

<script>



</script>


</body>

</html>