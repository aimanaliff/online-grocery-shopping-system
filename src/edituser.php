<?php 

include("../includes/header.php")

?>

    <main>
        <div class="container-lg py-3" style="background-color:white;">
            <div class="row">
                <div class="col col-sm-3 p-5">
                    <div class="d-flex justify-content-center">
                        <img class="rounded-circle" src="../img/dpalep.jpeg" width="180" height="200">
                    </div>
                    <form action="php/upload.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="m-3">
                                <input class="form-control form-control-sm" id="formFileSm" type="file">
                            </div>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-outline-primary" type="submit" name="submit">Upload
                                    Image</button>
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
                                <input class="form-control" type="text" aria-label="name">
                            </div>
                        </div>
                        <div class="row g-3 py-2">
                            <div class="col-md-3">
                                <label for="labelUsername" class="col-form-label"><strong>Username</strong></label>
                            </div>
                            <div class="col-md-3 offset-md-2">
                                <label for="username" class="col-form-label">johndoe</label>
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
                            <div class="col-md-auto offset-md-2">
                                <input class="form-control" type="text" aria-label="phone">
                            </div>
                        </div>
                        <div class="row g-3 py-2">
                            <div class="col-md-5">
                                <label for="labelGender" class="col-form-label"><strong>Gender</strong></label>
                            </div>
                            <div class="col-md-5">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                        id="radioMale" value="option1">
                                    <label class="form-check-label" for="radioMale">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
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
                        <h4>Edit Address Information</h4>
                        <h6>Edit your delivery information</h6>
                        <hr>
                        <div class="row g-3 py-2">
                            <div class="col-md-3">
                                <label for="labelAddress" class="col-form-label"><strong>Street</strong></label>
                            </div>
                            <div class="col-md-auto offset-md-2">
                                <input class="form-control" type="text" aria-label="street">
                            </div>
                        </div>
                        <div class="row g-3 py-2">
                            <div class="col-md-3">
                                <label for="labelCity" class="col-form-label"><strong>City</strong></label>
                            </div>
                            <div class="col-md-auto offset-md-2">
                                <input class="form-control" type="text" aria-label="city">
                            </div>
                        </div>
                        <div class="row g-3 py-2">
                            <div class="col-md-3">
                                <label for="labelCity" class="col-form-label"><strong>State</strong></label>
                            </div>
                            <div class="col-md-auto offset-md-2">
                                <input class="form-control" type="text" aria-label="state">
                            </div>
                        </div>
                        <div class="row g-3 py-2">
                            <div class="col-md-3">
                                <label for="labelZipcode" class="col-form-label"><strong>Zipcode</strong></label>
                            </div>
                            <div class="col-md-auto offset-md-2">
                                <input class="form-control" type="text" aria-label="zipcode">
                            </div>
                        </div>
                        <div class="row py-2">
                            <form>
                                <div class="col-6 mt-2">
                                    <input class="blockbtn btn btn-primary" type="submit" name="save" id="save"
                                        value="Save" style="margin: 10px;">
                                </div>
                                <div class="col-6 mt-2">
                                    <button type="button" class="blockbtn btn btn-outline-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDelete" style="margin: 10px;">
                                        Delete Account
                                    </button>
                                </div>
                                <div class="modal fade" id="modalDelete" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDeleteLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content" action="php/action_page.php">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="modaldeleteLabel">Delete Account</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h6>Are you sure you want to delete your account?</h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
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

</body>