<?php



include("../includes/header.php")

?>

<main>
    <button type="button" class="btn rounded-circle" id="scrollUp" onclick="goUp()">
        <!-- Go Up Button -->
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="46" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
            <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
        </svg>
    </button>

    <div id="s" class="container">
        <div class="row my-4">
            <div class="col-sm-12 col-lg-8 rounded-3 bg-white mx-auto my-1">
                <!-- Cart section -->
                <div class="row">
                    <h3 style="text-align: center; background-color: #ffc000;" class="py-3 rounded-3">Cart</h3>
                </div>
                <?php 
                $id = $_SESSION['user'];
                $query = "select * from cart where id='$id'";
                $run_query = mysqli_query($db,$query);
                $kira = mysqli_num_rows($run_query);
                ?>
                <?php
                if($kira == 0){
                ?>
                    <h3 style="text-align: center; color:lightgray;" class="py-3 rounded-3" >Cart is Empty</h3>
                <?php
                }
                ?>
                <?php
                while ($row_product = mysqli_fetch_array($run_query)) {
                    $product_id = $row_product['product_id'];
                    $quantity = $row_product['quantity'];
                    $cartID = $row_product['cartID'];


                    $query1 = "select * from product where product_id='$product_id'";
                    $run_query1 = mysqli_query($db,$query1);
                    $row_product1 = mysqli_fetch_array($run_query1);
                    $product_image = $row_product1['product_img'];
                    $product_name = $row_product1['product_name'];
                    $product_price = $row_product1['product_price'];


                
                ?>
                <div class="row py-xxl-3 py-sm-4 align-items-center" style="border-bottom: 1px #c7c7c7 solid;">
                
                    <div class="col-sm-auto align-self-center py-2 mx-sm-auto">
                        <button type="button" onclick="remove<?=$cartID?>()" class="btn btn-outline-danger btn-sm" id="removeItemInCart">Remove</button>
                    </div>
                    <div class="col-2">
                        <img src="../admin_area/product_images/<?=$product_image ?>" class="img-thumbnail" alt="">
                    </div>
                    <div class="col align-self-center">
                        <div>
                            <h4><?=$product_name?></h4>
                            <p class="text-success fw-bold" id="singlePrice<?=$cartID?>">RM <?=$product_price?></p>
                        </div>
                    </div>
                    <div class="col-2">
                        <input type="number" class="form-control" id="inputQuantity<?=$cartID?>" value="<?=$quantity ?>" onclick="cartTotalCal<?=$cartID?>();" 
                         min="0">
                    </div>
                    <div class="col-2 align-self-center">
                        <div>
                        <script>
                            var total1 = 0.0;
                            var quantity = document.querySelectorAll("#inputQuantity<?=$cartID?>");
                            total1 = quantity[0].value * <?=$product_price?>;
                            <?php 
                            $phpvar = "<script>document.writeln(total1);</script>";
                            
                            ?>
                        </script>
                            <h6 class="text-center">Sub Total</h6>
                            <p id="total<?=$cartID?>" class="text-center text-success fw-bold">RM <?php echo $phpvar ?></p>
                        </div>
                    </div>
                    <div class="col-1 align-self-center">
                        <input type="checkbox" name="" id="checkItem<?=$cartID?>" class="" onclick="cartTotalCal1<?=$cartID?>()">
                    </div>
                </div>
                <script>
                var total = 0.0;
                var total1=0.0;
                function cartTotalCal<?=$cartID?>(){
                    var cartid = <?php echo $cartID ;?>;
                    var quantity = document.querySelectorAll("#inputQuantity<?=$cartID?>");
                    total = quantity[0].value * <?=$product_price?>;
                    document.getElementById("total<?=$cartID?>").innerHTML = "RM " + total.toFixed(2);
                    var itemBox = document.querySelectorAll("#checkItem<?=$cartID?>");
                    for (let index = 0; index < itemBox.length; index++) {
                        if (itemBox[index].checked == true) {
                            var sum = document.querySelectorAll("#cartTotal");
                            var quantity = document.querySelectorAll("#inputQuantity<?=$cartID?>");
                            var price = document.querySelectorAll("#singlePrice<?=$cartID?>");
                            var minus = sum[0].innerText.replace("RM ", "") - quantity[0].value * parseFloat(price[0].innerText.replace("RM ", ""));
                            console.log(sum[0].innerText.replace("RM ", ""));
                            document.getElementById("cartTotal").innerHTML = "RM " + minus.toFixed(2);
                        };
                    }
                    $.ajax({
                        type:"post",
                        cache:false,
                        url:"../functions/newlistname.php",
                        data:{
                            updateCart:quantity[0].value,
                            cartid:cartid
                        },
                        success:function(response){
                            if(response){
                                setTimeout(cartTotalCal<?=$cartID?>, 5000);
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
                
                function cartTotalCal1<?=$cartID?>(){
                    var price = document.querySelectorAll("#total<?=$cartID?>");
                    var itemBox = document.querySelectorAll("#checkItem<?=$cartID?>");
                    var quantity = document.querySelectorAll("#inputQuantity<?=$cartID?>");
                    
                    for (let index = 0; index < itemBox.length; index++) {
                        if (itemBox[index].checked == true) {
                            total1 += parseFloat(price[index].innerText.replace("RM ", ""));
                            document.getElementById("cartTotal").innerHTML = "RM " + total1.toFixed(2);
                        }else{
                            total1 = total1 - parseFloat(price[index].innerText.replace("RM ", ""));                          
                        };
                        
                    }
                    document.getElementById("cartTotal").innerHTML = "RM " + total1.toFixed(2);
                }

                function remove<?=$cartID?>(){
                    var cartID = <?php echo $cartID ;?>;
                    Swal.fire({
                    title: 'Are you sure you want to delete?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    reverseButtons: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                        $.ajax({
                                type:"post",
                                cache:false,
                                url:"../functions/newlistname.php",
                                data:{
                                    cartID:cartID
                                },
                                success:function(response){
                                    if(response){
                                        Swal.fire(
                                        'Deleted!',
                                        '',
                                        'success',
                                        ).then((result) =>{
                                            if(result.isConfirmed){
                                                location.reload();
                                            }
                                        })
                                        // setTimeout(worker, 5000);
                                    } else{
                                        alert('not succesfully');
                                        location.reload();
                                    }
                                },
                                error: function(jqXHR, textStatus, errorThrown){
                                    console.log(textStatus, errorThrown);
                                }
                            });
                        }
                    })
                }

                
                document.getElementById('checkItem<?=$cartID?>').onchange = function() {
                    document.getElementById('inputQuantity<?=$cartID?>').disabled = this.checked;
                };
                </script>
            <?php }?>
                <!-- <hr> -->
              
            </div>

            <div class="col-sm-12 col-lg-auto rounded-3 mx-auto my-1 bg-success align-self-start sticky-xl-topList">
                <!-- Total section -->
                <div class="row text-white align-items-center py-3">
                    <div class="col-sm-12 mx-auto">
                        <h3 class="text-center">Total</h3>
                    </div>
                    <div class="col-sm-12 mx-auto">
                        <h1 class="text-center" id="cartTotal">RM 0.00</h1>
                    </div>
                </div>
                <hr style="color: white;" class="hrList">
                <div class="row align-items-center py-3">
                    <div class="col-12">
                        <select class="form-select" aria-label="Default select example">
                            <?php 
                                if(isset($_SESSION['user'])){
                                    $id = $_SESSION['user'];
                                    $query = "SELECT * FROM userdetails where id='$id'";
                                    $run_query = mysqli_query($db,$query);
                                    $row_query = mysqli_fetch_array($run_query);
                                    $street = $row_query['street'];
                                    $city = $row_query['city'];
                                    $state = $row_query['state'];
                                }
                            
                            
                            ?>
                            <option selected>Select Address for Delivery</option>
                            <?php 
                            
                            if($street == ""){
                                $street= "Please Update Your Profile";
                                ?>
                                <option disabled value="1"><?php echo $street;?></option>
                                <?php
                            } else {
                                ?>
                                <option  value="1"><?php echo $street;?></option>

                                <?php
                            }
                            
                            ?>
                            
                            
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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="../nyumscript.js"></script>
<?php

?>
</body>

</html>