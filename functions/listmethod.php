<?php

$db = mysqli_connect("localhost", "root", "", "groceries");

function list1(){

    global $db,$productInListID,$ListID,$product_id,$quantity,$arr;

    $id = $_GET['id'];

    
    $get_product = "select * from listname where id='$id'";

    $run_product = mysqli_query($db, $get_product);

    $arr = array();
    $i = 0;
    $k =0;
    while ($row_product = mysqli_fetch_array($run_product)) {
        // $productInListID = $row_product['ProductInListID'];
        $ListID = $row_product['ListID'];
        // $product_id = $row_product['product_id'];
        // $quantity = $row_product['quantity'];
        $ListName = $row_product['ListName'];

        $get_productList = "select * from productinlist where id='$id' AND ListID='$ListID' ";

        $run_productList = mysqli_query($db, $get_productList);

        $count = mysqli_num_rows($run_productList);

        ?>
        
            <div class="row mb-3" id="deletelist<?=$ListID?>">
                <div class="col-1">

                    <div class="edit d-flex justify-content-center" style="margin-top: 7px;">
                    <button type="button"  onclick="deleteLuaq<?=$ListID?>()"  class="btn btn-outline-danger buttonsquare" style="border-radius: 25px;" id="removeitemforwishlist">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </button>
                    </div>
     
        
                </div>
                <div class="col">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo" >
                            <button class="accordion-button collapsed" style="font-size:20px;"  type="button" onclick="multiply1<?=$k?>()" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree<?=$k?>" aria-expanded="false" aria-controls="flush-collapseTwo">
                                <?php echo $ListName?> <span class="badge bg-secondary mx-2"><?php echo $count ?></span>
                            </button>
                        </h2>
                        <div id="flush-collapseThree<?=$k?>" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body"> 
                            <?php
                            $kira = mysqli_num_rows($run_productList);
                                    if($kira == 0){
                                    ?>
                                    <h3 style="text-align: center; color:lightgray;" class="py-3 rounded-3" >&nbsp&nbsp&nbsp&nbsp&nbspNo Product 
                                    Inserted</h3>
                                <?php
                                } ?>
                            <?php           
                            
                            
                            while ($row_productList = mysqli_fetch_array($run_productList)) {

                                global $index;
                                
                                $productInListID = $row_productList['ProductInListID'];
                                $ListID = $row_productList['ListID'];
                                $product_id = $row_productList['product_id'];
                                $quantity = $row_productList['quantity'];
                            
                                $query = "select * from product where product_id='$product_id'";

                                $run_query = mysqli_query($db, $query);

                                $row_query = mysqli_fetch_array($run_query);

                                $product_img = $row_query['product_img'];

                                $product_desc = $row_query['product_desc'];

                                $product_name = $row_query['product_name'];

                                $product_price = $row_query['product_price'];

                                array_push($arr,$product_price);
                                ?>

                                <div class="row py-xxl-5 py-sm-4 align-items-center" id="removeItemInlist<?=$productInListID?>">
                                
                                    <div class="col-1 align-self-center py-2 mx-sm-auto">
                                        <button  type="button" class="btn btn-outline-danger btn-sm"  onclick="deleteDalam<?=$productInListID?>()">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="col-2">
                                        <h4 style="text-align: center;"><?php echo $product_name?></h4>
                                        <img src="../admin_area/product_images/<?php echo $product_img?>" class="img-thumbnail" alt="">
                                    </div>
                                    <div class="col-2 align-self-center mt-5">
                                        <div>
                                            <p class="fw-normal"></p>
                                            
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <input type="number" min="1" class="form-control" id="inputQuantity<?=$productInListID?>" onclick="multiply1<?=$productInListID?>()" onkeyup="multiply1<?=$productInListID?>()" value="<?=$quantity?>">
                                    </div>
                                    <div class="col-2 align-self-center">
                                        <div>
                                            <h6 class="text-center">Sub Total</h6>
                                            <script>
                                            var total1 = 0.0;
                                            var quantity = document.querySelectorAll("#inputQuantity<?=$productInListID?>");
                                            total1 = quantity[0].value * <?=$product_price?>;
                                            <?php 
                                            $phpvar = "<script>document.writeln(total1);</script>";
                                            
                                            ?>
                                            </script>
                                            <p id="cartTotal<?=$productInListID?>" class="text-center text-success fw-bold">RM <?=$phpvar?></p>
                                        </div>
                                    </div>
                                    <!-- <div class="col-1 align-self-center">
                                        <input type="checkbox" name="" id="" class="">
                                    </div> -->
                                    <div class="col-2">
                                        <button type="button" onclick="addcart<?=$productInListID?>()" class="btn btn-outline-dark">Add to cart</button>
                                    </div>
                                </div>

                            
                                

                                <script>
                                var total = 0.0;
                                function multiply1<?=$productInListID?>(){
                                    var quantity = document.querySelectorAll("#inputQuantity<?=$productInListID?>");
                                    total = quantity[0].value * <?=$product_price?>;
                                    document.getElementById("cartTotal<?=$productInListID?>").innerHTML = "RM " + total;
                                    console.log(total);
                                    var productInListID = <?php echo $productInListID ;?>;
                                    $.ajax({
                                            type:"post",
                                            cache:false,
                                            url:"../functions/newlistname.php",
                                            data:{
                                                update:productInListID,
                                                quantity1:quantity[0].value
                                            },
                                            success:function(response){
                                                if(response){
                                                    setTimeout(worker, 5000);
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
                                <script>
                                    function deleteDalam<?=$productInListID?>(){
                                        var productInListID = <?php echo $productInListID ;?>;
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
                                                var id1 = <?php echo $ListID ;?>;
                                                $.ajax({
                                                type:"post",
                                                cache:false,
                                                url:"../functions/newlistname.php",
                                                data:{
                                                    productInListID:productInListID
                                                },
                                                success:function(response){
                                                    if(response){
                                                        jQuery("#removeItemInlist<?=$productInListID?>").hide(400);
                                                        Swal.fire(
                                                        'Deleted!',
                                                        'Your item has been deleted.',
                                                        'success',
                                                        ).then((result) =>{
                                                            if(result.isConfirmed){
                                                                location.reload();
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
                                        })
                                        
                                    }

                                    
                                </script>
                                <script>    
                                    function addcart<?=$productInListID?>(){
                                        var productInListID1 = <?php echo $productInListID ;?>;
                                        var quantity = document.querySelectorAll("#inputQuantity<?=$productInListID?>");
                                        var id = <?php echo $id ;?>;
                                        $.ajax({
                                            type:"post",
                                            url:"../functions/newlistname.php",
                                            data:{
                                                productInListID1:productInListID1,
                                                id:id,
                                                quantity:quantity[0].value
                                            },
                                            success:function(response){
                                                if(response){
                                                    Swal.fire(
                                                        'Added',
                                                        'Succesfully added to cart',
                                                        'success',
                                                        ).then((result) =>{
                                                            if(result.isConfirmed){
                                                                location.reload();
                                                            } else{
                                                                location.reload();
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
                                 $i = $i + 1;

                            }
                            $k = $k + 1;
                            ?>
                               
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-1">
                    <div class="edit d-flex justify-content-center" style="margin-top: 7px;">
                        <!-- <button type="button"  data-bs-toggle="modal" data-bs-target="#delete"  class="btn btn-outline-danger buttonsquare" style="border-radius: 25px;" id="removeitemforwishlist">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                        </button> -->
                        <button type="button" class="btn btn-outline-primary buttonsquare"  id="buttonmodal" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?=$ListID?>" style="border-radius: 25px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </button>
                        
                    </div>
                </div>

            </div> 

            <div class="modal fade" id="staticBackdrop<?=$ListID?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h5 class="modal-title" id="staticBackdropLabel">Edit List Name</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input id="newlist<?=$ListID?>" class="form-control" value="<?= $ListName?>" name="newListName" type="text" placeholder="Edit list name" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" onclick="update<?=$ListID?>()" onkeyup="update<?=$ListID?>()" 
                            name="updateList" class="btn btn-primary form-control">Update</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="delete<?=$ListID?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h3 class="modal-title" id="staticBackdropLabel">Delete list "<?php echo $ListName ; ?>"</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h5>Are you sure you want to perform this action?</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" onclick="delete<?=$ListID?>()" onkeyup="update<?=$ListID?>()" 
                            name="updateList" class="btn btn-danger form-control">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
             <script type="text/javascript">
             var name = "";
             function update<?=$ListID?>(){
                 var quantity = document.querySelectorAll("#newlist<?=$ListID?>");
                 name = quantity[0].value;
                 var id = <?php echo $ListID ;?>;
                 
                 if(name != ""){
                    console.log(id);
                    $.ajax({
                        type:"post",
                        cache:false,
                        
                        url:"../functions/newlistname.php",
                        data:{
                            name:name,
                            id:id
                            
                        },
                        success:function(response){
                            if(response){
                                Swal.fire(
                                    'Update!',
                                    'Your list name has been updated.',
                                    'success',
                                    
                                    ).then((result) =>{
                                        if(result.isConfirmed){
                                            location.reload();
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
             }

            function deleteLuaq<?=$ListID?>(){
                console.log("asd");
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        var id1 = <?php echo $ListID ;?>;
                        $.ajax({
                            type:"post",
                            cache:false,
                            url:"../functions/newlistname.php",
                            data:{
                                id1:id1
                            },
                            success:function(response){
                                if(response){
                                    jQuery("#deletelist<?=$ListID?>").hide(400);
                                    Swal.fire(
                                    'Deleted!',
                                    'Your list has been deleted.',
                                    'success',
                                    ).then((result) =>{
                                        if(result.isConfirmed){
                                            location.reload();
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
                })
            }
             </script>
             
             <script>



             </script>

<?php

      
       
    }

    
    


}

?>