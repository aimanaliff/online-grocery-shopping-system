<?php

include("../includes/header.php");
?>

<main>
    <div class="container-lg py-3 rounded" style="background-color:white;">
        <div class="row">
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
                <div class="d-flex justify-content-center">
                    <a href="logout.php">
                        <button class="btn btn-outline-danger">
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
                    <!-- <div class="row g-3 py-2">
                            <div class="col-md-5">
                                <label for="labelGender" class="col-form-label"><strong>Gender</strong></label>
                            </div>
                            <div class="col-md-5">
                                    <?php if (isset($_SESSION['user'])) : ?> 
                                    <?php
                                        // global $gender;
                                        // $query = "select * from userdetails where id=".$_SESSION['user'];
                                        // $run_query = mysqli_query($db,$query);

                                        // $row_query = mysqli_fetch_array($run_query);

                                        // $name = $row_query['name'];
                                        // $phoneNo = $row_query['phoneNo'];
                                        // $dateOfBirth = $row_query['dateOfBirth'];
                                        // $street = $row_query['street'];
                                        // $city= $row_query['city'];
                                        // $state = $row_query['state'];
                                        // $zipcode = $row_query['zipcode'];
                                    ?>
                                    <?php endif ?> 
                                
                                    <?php

                                    // if($gender=="option1"){

                                    //     echo "
                                    //     <div class='form-check form-check-inline'>
                                    //     <input class='form-check-input' type='radio' name='male'
                                    //     id='radioMale' value='option1' checked >
                                    //     <label class='form-check-label' for='radioMale'>Male</label>
                                    //     </div>
                                    //     ";
                                    // } else if($gender=="option2"){
                                    //     echo "
                                    //     <div class='form-check form-check-inline'>
                                    //     <input class='form-check-input' type='radio' name='female'
                                    //     id='radioFemale' value='option2' checked>
                                    //     <label class='form-check-labe' for='radioFemale'>Female</label>
                                    //     </div>
                                    //     ";
                                    //     $check = TRUE;
                                    // }

                                    ?>
                             </div> -->
                    <!-- </div> -->
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

                                <label for="address" class="col-form-label"><?php echo "$street"; ?></label>
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
        </div>
    </div>
</main>
<!-- test -->
<?php

include("../includes/footer.php")

?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="/nyumscript.js"></script>


</body>

</html>