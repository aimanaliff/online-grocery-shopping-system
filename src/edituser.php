<?php



include("../includes/header.php")


?>

<main>
    <div class="container-lg py-3" style="background-color:white;">
        <div class="row">

        <?php 
            if (isset($_SESSION['success']))
            {
                // header('Location: index.php');
        
            
        ?>
            <div class="col col-sm-3 p-5">
                <div class="d-flex justify-content-center">
                    <?php

                    $query = "select * from userdetails where id=" . $_SESSION['user'];
                    $run_query = mysqli_query($db, $query);
                    $row_query = mysqli_fetch_array($run_query);
                    $user_img = $row_query['image'];

                    echo "<img class='rounded-circle' src='../admin_area/product_images/user_image/$user_img' width='180' height='200'>";
                    ?>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="m-3">
                            <input class="form-control form-control-sm" id="formFileSm" type="file" name="image">
                        </div>
                    </div>
            </div>
            <div class="col-sm-9 py-2">
                <div class="col-lg-9 py-2">
                    <h4>Edit Profile</h4>
                    <h6>Edit your profile information</h6>
                    <hr>

                    <div class="row g-3 py-2">
                        <div class="col-md-3">
                            <label for="inputName" class="col-sm-2 col-form-label"><strong>Name</strong></label>
                        </div>
                        <div class="col-md-auto offset-md-2">
                            <?php if (isset($_SESSION['user'])) : ?>

                                <?php
                                $query = "select * from userdetails where id=" . $_SESSION['user'];
                                $run_query = mysqli_query($db, $query);
                                $row_query = mysqli_fetch_array($run_query);
                                $name = $row_query['name'];

                                ?>
                                <input class="form-control" type="text" name="name" value="<?php echo "$name"; ?>" aria-label="name">
                            <?php endif ?>

                        </div>
                    </div>
                    <div class="row g-3 py-2">
                        <div class="col-md-3">
                            <label for="labelUsername" class="col-form-label"><strong>Username</strong></label>
                        </div>
                        <div class="col-md-3 offset-md-2">
                            <?php if (isset($_SESSION['user'])) : ?>

                                <?php

                                $query = "select * from user where id=" . $_SESSION['user'];
                                $run_query = mysqli_query($db, $query);

                                $row_query = mysqli_fetch_array($run_query);

                                $name = $row_query['username'];
                                ?>

                                <label for="username" class="col-form-label"><?php echo "$name"; ?></label>
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
                        <div class="col-md-auto offset-md-2">
                            <?php if (isset($_SESSION['user'])) : ?>

                                <?php

                                $query = "select * from userdetails where id=" . $_SESSION['user'];
                                $run_query = mysqli_query($db, $query);
                                $row_query = mysqli_fetch_array($run_query);
                                $phoneNo = $row_query['phoneNo'];
                                ?>
                                <input class="form-control" name="phoneNo" type="text" value="<?php echo "$phoneNo"; ?>" aria-label="phone">
                            <?php endif ?>

                        </div>
                    </div>
                    <div class="row g-3 py-2">
                        <div class="col-md-3">
                            <label for="labelDOB" class="col-form-label"><strong>Date Of Birth</strong></label>
                        </div>
                        <div class="col-md-auto offset-md-2">
                            <?php if (isset($_SESSION['user'])) : ?>

                                <?php

                                $query = "select * from userdetails where id=" . $_SESSION['user'];
                                $run_query = mysqli_query($db, $query);
                                $row_query = mysqli_fetch_array($run_query);
                                $dateOfBirth = $row_query['dateOfBirth'];

                                ?>
                                <input class="form-control" name="dateOfBirth" value="<?php echo "$dateOfBirth"; ?>" type="date">
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 py-2">
                    <h4>Edit Address Information</h4>
                    <h6>Edit your delivery information</h6>
                    <hr>
                    <div class="row g-3 py-2">
                        <div class="col-md-3">
                            <label for="labelAddress" class="col-form-label"><strong>Street</strong></label>
                        </div>
                        <div class="col-md-auto offset-md-2">
                            <?php if (isset($_SESSION['user'])) : ?>
                                <?php
                                $query = "select * from userdetails where id=" . $_SESSION['user'];
                                $run_query = mysqli_query($db, $query);
                                $row_query = mysqli_fetch_array($run_query);
                                $street = $row_query['street'];
                                ?>
                                <input class="form-control" name="street" type="text" value="<?php echo "$street"; ?>" aria-label="street">
                            <?php endif ?>

                        </div>
                    </div>
                    <div class="row g-3 py-2">
                        <div class="col-md-3">
                            <label for="labelCity" class="col-form-label"><strong>City</strong></label>
                        </div>
                        <div class="col-md-auto offset-md-2">
                            <?php if (isset($_SESSION['user'])) : ?>

                                <?php

                                $query = "select * from userdetails where id=" . $_SESSION['user'];
                                $run_query = mysqli_query($db, $query);

                                $row_query = mysqli_fetch_array($run_query);
                                $city = $row_query['city'];

                                ?>

                                <input class="form-control" name="city" type="text" value="<?php echo "$city"; ?>" aria-label="city">
                            <?php endif ?>

                        </div>
                    </div>
                    <div class="row g-3 py-2">
                        <div class="col-md-3">
                            <label for="labelCity" class="col-form-label"><strong>State</strong></label>
                        </div>
                        <div class="col-md-auto offset-md-2">
                            <?php if (isset($_SESSION['user'])) : ?>

                                <?php

                                $query = "select * from userdetails where id=" . $_SESSION['user'];
                                $run_query = mysqli_query($db, $query);

                                $row_query = mysqli_fetch_array($run_query);

                                $state = $row_query['state'];
                                ?>

                                <input class="form-control" name="state" type="text" value="<?php echo "$state"; ?>" aria-label="state">
                            <?php endif ?>

                        </div>
                    </div>
                    <div class="row g-3 py-2">
                        <div class="col-md-3">
                            <label for="labelZipcode" class="col-form-label"><strong>Zipcode</strong></label>
                        </div>
                        <div class="col-md-auto offset-md-2">
                            <?php if (isset($_SESSION['user'])) : ?>

                                <?php

                                $query = "select * from userdetails where id=" . $_SESSION['user'];
                                $run_query = mysqli_query($db, $query);

                                $row_query = mysqli_fetch_array($run_query);


                                $zipcode = $row_query['zipcode'];
                                ?>

                                <input class="form-control" name="zipcode" type="text" value="<?php echo "$zipcode"; ?>" aria-label="zipcode">
                            <?php endif ?>

                        </div>
                    </div>
                    
                    <div class="row py-2">
                        <div class="col-6  mt-2">
                            <button type="submit" name="save" class="blockbtn btn btn-primary">Save</button>
                        </div>
                        <div class="col-6 ">
                            <button type="button" onclick="deleteAccount()"   class="blockbtn btn btn-outline-danger"  style="margin: 10px;">
                                Delete Account
                            </button>
                        </div>

                        <div class="modal fade" id="exampleModal12" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete your account?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input id="pas" type="password"   class="form-control" placeholder="Enter Your Password">
                                    <p class="er"></p>
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button"  class=" btn btn-danger">Delete</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
                </form>
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



<?php

include("../includes/footer.php")

?>
</div>



<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];
}


?>

<script>

function deleteAccount(){
    Swal.fire({
    title: 'Enter your password',
    input: 'password',
    allowOutsideClick: false,
    inputLabel: 'Password',
    inputPlaceholder: 'Enter your password',
    inputAttributes: {
        maxlength: 10,
    }
    }).then((result) => {
        if (result.value) {
            var id2 = <?php echo $id ;?>;
            // var quantity = document.querySelectorAll("#pas");
            var pass = result.value
            // var pass = quantity[0].value;
            $.ajax({
                type:"post",
                url:"../includes/check_availability.php",
                data:{
                    id2:id2,
                    pass:pass
                },
                dataType: 'json',
                success:function(data){
                    console.log(data.status);
                    if(data.status == 'info'){
                        // alert("password wrong");
                        Swal.fire(
                        'Password Wrong',
                        'Please re-enter your password',
                        'error', 
                        ).then((result) =>{
                            
                        })
                    } else {
                        Swal.fire(
                        'Deleted!',
                        'Your Account has been deleted.',
                        'success',
                        ).then((result) =>{
                            if(result.isConfirmed){
                                window.open("logout.php","_self");
                            } else {
                                window.open("logout.php","_self");
                            }
                        })
                    }
                }
            });
        }
    });
    
    
}


</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="/nyumscript.js"></script>





</body>

</html>