<?php 

include("../includes/header.php");
?>

    <main>
        <div class="container-lg py-3 rounded" style="background-color:white;">
            <div class="row">
                <div class="col col-sm-3 py-5">
                    <div class="d-flex justify-content-center">
                        <img class="rounded-circle" src="../img/dpalep.jpeg" width="180" height="200">
                    </div>
                    <div class="d-flex justify-content-center m-2">

                    <?php 
                        if(isset($_SESSION['success'])){
                            $userid = $_SESSION['user'];
                            echo "
                                <a href='edituser.php?id=$userid' style='text-decoration: none;'>Edit
                                    Profile</a>
                            "
                            ;
                        }
                        else{
                            echo "
                                <a href='edituser.php' style='text-decoration: none;'>Edit
                                Profile</a>
                            "
                        ;
                        }
                    ?>
                    </div>
                    <div class="d-flex justify-content-center">
                    <a href="logout.php">
                        <button   class="btn btn-outline-danger" >
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
                                
                                <?php  if (isset($_SESSION['user'])) : ?> 

                                    <?php 
                                        
                                        $query = "select * from user where id=".$_SESSION['user'];
                                        $run_query = mysqli_query($db,$query);

                                        $row_query = mysqli_fetch_array($run_query);

                                        $username = $row_query['username'];
                                        
                                    ?>

                                    <label for="name" class="col-form-label"><?php echo "$username";?></label>
                                     
                                <?php endif ?> 
                            </div>
                        </div>
                        <div class="row g-3 py-2">
                            <div class="col-md-3">
                                <label for="labelName" class="col-form-label"><strong>Username</strong></label>
                            </div>
                            <div class="col-md-3 offset-md-2">
                            <?php  if (isset($_SESSION['user'])) : ?> 
                                <?php 
                                    
                                    $query = "select * from user where id=".$_SESSION['user'];
                                    $run_query = mysqli_query($db,$query);

                                    $row_query = mysqli_fetch_array($run_query);

                                    $username = $row_query['username'];
                                    
                                ?>
                                <label for="name" class="col-form-label"><?php echo "$username";?></label>
                                
                                <?php endif ?> 
                            </div>
                        </div>
                        <div class="row g-3 py-2">
                            <div class="col-md-3">
                                <label for="labelEmail" class="col-form-label"><strong>Email</strong></label>
                            </div>
                            <div class="col-md-3 offset-md-2">
                                <label for="email" class="col-form-label">johndoe123@gmail.com</label>
                            </div>
                        </div>
                        <div class="row g-3 py-2">
                            <div class="col-md-3">
                                <label for="labelPhone" class="col-form-label"><strong>Phone Number</strong></label>
                            </div>
                            <div class="col-md-3 offset-md-2">
                                <label for="phone" class="col-form-label">555 5555 555</label>
                            </div>
                        </div>
                        <div class="row g-3 py-2">
                            <div class="col-md-5">
                                <label for="labelGender" class="col-form-label"><strong>Gender</strong></label>
                            </div>
                            <div class="col-md-5">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="male"
                                        id="radioMale" value="option1" checked>
                                    <label class="form-check-label" for="radioMale">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="female"
                                        id="radioFemale" value="option2">
                                    <label class="form-check-label" for="radioFemale">Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                        id="radioOther" value="option3">
                                    <label class="form-check-label" for="radioOther">Other</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 py-2">
                            <div class="col-md-3">
                                <label for="labelDOB" class="col-form-label"><strong>Date Of Birth</strong></label>
                            </div>
                            <div class="col-md-3 offset-md-2">
                                <label for="DOB" class="col-form-label">1/1/2000</label>
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
                                <label for="address" class="col-form-label">420 Jalan Panjang</label>
                            </div>
                        </div>
                        <div class="row g-3 py-2">
                            <div class="col-md-3">
                                <label for="labelCity" class="col-form-label"><strong>City</strong></label>
                            </div>
                            <div class="col-md-3 offset-md-2">
                                <label for="city" class="col-form-label">Petaling Jaya</label>
                            </div>
                        </div>
                        <div class="row g-3 py-2">
                            <div class="col-md-3">
                                <label for="labelCity" class="col-form-label"><strong>State</strong></label>
                            </div>
                            <div class="col-md-3 offset-md-2">
                                <label for="city" class="col-form-label">Selangor</label>
                            </div>
                        </div>
                        <div class="row g-3 py-2">
                            <div class="col-md-3">
                                <label for="labelZipcode" class="col-form-label"><strong>Zipcode</strong></label>
                            </div>
                            <div class="col-md-3 offset-md-2">
                                <label for="zipcode" class="col-form-label">10101</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php 

include("../includes/footer.php")

?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
    <script src="/nyumscript.js"></script>
    
    
</body>

</html>
