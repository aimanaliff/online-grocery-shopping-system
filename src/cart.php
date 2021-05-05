<?php 

include("../includes/header.php")

?>

<main>
        <button type="button" class="btn rounded-circle" id="scrollUp" onclick="goUp()">
            <!-- Go Up Button -->
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="46" fill="currentColor"
                class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                <path
                    d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
            </svg>
        </button>

        <div class="container">
            <div class="row my-4">
                <div class="col-sm-12 col-lg-8 rounded-3 bg-white mx-auto my-1">
                    <!-- Cart section -->
                    <div class="row">
                        <h3 style="text-align: center; background-color: #ffc000;" class="py-3 rounded-3">Cart</h3>
                    </div>
                    <div class="row py-xxl-3 py-sm-4 align-items-center" style="border-bottom: 1px #c7c7c7 solid;">
                        <div class="col-sm-auto align-self-center py-2 mx-sm-auto">
                            <button type="button" class="btn btn-outline-danger btn-sm"
                                id="removeItemInCart">Remove</button>
                        </div>
                        <div class="col-2">
                            <img src="../img/banana.jpg" class="img-thumbnail" alt="">
                        </div>
                        <div class="col align-self-center">
                            <div>
                                <h4>Banana</h4>
                                <p class="text-success fw-bold" id="singlePrice">RM 0.50</p>
                            </div>
                        </div>
                        <div class="col-2">
                            <input type="number" class="form-control" id="inputQuantity" value="1"
                                onclick="cartTotalCal()" onkeyup="cartTotalCal()" min="0">
                        </div>
                        <div class="col-2 align-self-center">
                            <div>
                                <h6 class="text-center">Sub Total</h6>
                                <p class="text-center text-success fw-bold">RM 0.50</p>
                            </div>
                        </div>
                        <div class="col-1 align-self-center">
                            <input type="checkbox" name="" id="checkItem" class="" onclick="cartTotalCal()">
                        </div>
                    </div>
                    <!-- <hr> -->
                    <div class="row py-xxl-3 py-sm-4 align-items-center" style="border-bottom: 1px #c7c7c7 solid;">
                        <div class="col-sm-auto align-self-center py-2 mx-sm-auto">
                            <button type="button" class="btn btn-outline-danger btn-sm"
                                id="removeItemInCart">Remove</button>
                        </div>
                        <div class="col-2">
                            <img src="../img/banana.jpg" class="img-thumbnail" alt="">
                        </div>
                        <div class="col align-self-center">
                            <div>
                                <h4>Banana</h4>
                                <p class="text-success fw-bold" id="singlePrice">RM 0.50</p>
                            </div>
                        </div>
                        <div class="col-2">
                            <input type="number" class="form-control" id="inputQuantity" value="1"
                                onclick="cartTotalCal()" onkeyup="cartTotalCal()" min="0">
                        </div>
                        <div class="col-2 align-self-center">
                            <div>
                                <h6 class="text-center">Sub Total</h6>
                                <p class="text-center text-success fw-bold">RM 0.50</p>
                            </div>
                        </div>
                        <div class="col-1 align-self-center">
                            <input type="checkbox" name="" id="checkItem" class="" onclick="cartTotalCal()">
                        </div>
                    </div>
                    <!-- <hr> -->
                    <div class="row py-xxl-3 py-sm-4 align-items-center" style="border-bottom: 1px #c7c7c7 solid;">
                        <div class="col-sm-auto align-self-center py-2 mx-sm-auto">
                            <button type="button" class="btn btn-outline-danger btn-sm"
                                id="removeItemInCart">Remove</button>
                        </div>
                        <div class="col-2">
                            <img src="../img/banana.jpg" class="img-thumbnail" alt="">
                        </div>
                        <div class="col align-self-center">
                            <div>
                                <h4>Banana</h4>
                                <p class="text-success fw-bold" id="singlePrice">RM 0.50</p>
                            </div>
                        </div>
                        <div class="col-2">
                            <input type="number" class="form-control" id="inputQuantity" value="1"
                                onclick="cartTotalCal()" onkeyup="cartTotalCal()" min="0">
                        </div>
                        <div class="col-2 align-self-center">
                            <div>
                                <h6 class="text-center">Sub Total</h6>
                                <p class="text-center text-success fw-bold">RM 0.50</p>
                            </div>
                        </div>
                        <div class="col-1 align-self-center">
                            <input type="checkbox" name="" id="checkItem" class="" onclick="cartTotalCal()">
                        </div>
                    </div>
                    <!-- <hr> -->
                    <div class="row py-xxl-3 py-sm-4 align-items-center" style="border-bottom: 1px #c7c7c7 solid;">
                        <div class="col-sm-auto align-self-center py-2 mx-sm-auto">
                            <button type="button" class="btn btn-outline-danger btn-sm"
                                id="removeItemInCart">Remove</button>
                        </div>
                        <div class="col-2">
                            <img src="../img/banana.jpg" class="img-thumbnail" alt="">
                        </div>
                        <div class="col align-self-center">
                            <div>
                                <h4>Banana</h4>
                                <p class="text-success fw-bold" id="singlePrice">RM 0.50</p>
                            </div>
                        </div>
                        <div class="col-2">
                            <input type="number" class="form-control" id="inputQuantity" value="1"
                                onclick="cartTotalCal()" onkeyup="cartTotalCal()" min="0">
                        </div>
                        <div class="col-2 align-self-center">
                            <div>
                                <h6 class="text-center">Sub Total</h6>
                                <p class="text-center text-success fw-bold">RM 0.50</p>
                            </div>
                        </div>
                        <div class="col-1 align-self-center">
                            <input type="checkbox" name="" id="checkItem" class="" onclick="cartTotalCal()">
                        </div>
                    </div>
                    <!-- <hr> -->
                    <div class="row py-xxl-3 py-sm-4 align-items-center" style="border-bottom: 1px #c7c7c7 solid;">
                        <div class="col-sm-auto align-self-center py-2 mx-sm-auto">
                            <button type="button" class="btn btn-outline-danger btn-sm"
                                id="removeItemInCart">Remove</button>
                        </div>
                        <div class="col-2">
                            <img src="../img/banana.jpg" class="img-thumbnail" alt="">
                        </div>
                        <div class="col align-self-center">
                            <div>
                                <h4>Banana</h4>
                                <p class="text-success fw-bold" id="singlePrice">RM 0.50</p>
                            </div>
                        </div>
                        <div class="col-2">
                            <input type="number" class="form-control" id="inputQuantity" value="1"
                                onclick="cartTotalCal()" onkeyup="cartTotalCal()" min="0">
                        </div>
                        <div class="col-2 align-self-center">
                            <div>
                                <h6 class="text-center">Sub Total</h6>
                                <p class="text-center text-success fw-bold">RM 0.50</p>
                            </div>
                        </div>
                        <div class="col-1 align-self-center">
                            <input type="checkbox" name="" id="checkItem" class="" onclick="cartTotalCal()">
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-auto rounded-3 mx-auto my-1 bg-success align-self-start sticky-xl-topList">
                    <!-- Total section -->
                    <div class="row text-white align-items-center py-3">
                        <div class="col-sm-12 mx-auto">
                            <h3 class="text-center">Total</h3>
                        </div>
                        <div class="col-sm-12 mx-auto">
                            <h1 class="text-center" id="cartTotal">RM 10,000.00</h1>
                        </div>
                    </div>
                    <hr style="color: white;" class="hrList">
                    <div class="row align-items-center py-3">
                        <div class="col-12">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Select Address for Delivery</option>
                                <option value="1">Address 1</option>
                                <option value="2">Address 2</option>
                                <option value="3">Address 3</option>
                            </select>
                        </div>
                    </div>
                    <hr style="color: white;" class="hrList">
                    <div class="row text-white align-items-center py-3">
                        <div class="col-sm-12">
                            <button class="block rounded-3" type="submit">Checkout</button>
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
    <script src="../nyumscript.js"></script>
    <?php

        echo"<script src='../src/JS/cart.js?v=1'>

            </script>
        ";
?>
</body>

</html>