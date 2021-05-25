<?php

$db = mysqli_connect("localhost", "root", "", "groceries");

function list1(){

    global $db,$productInListID,$ListID,$product_id,$quantity,$arr;

    $id = $_GET['id'];

    $get_productList = "select * from productinlist where id='$id'";

    $run_productList = mysqli_query($db, $get_productList);

    $get_product = "select * from listname";

    $run_product = mysqli_query($db, $get_product);

    $arr = array();
    $i = 0;
    while ($row_product = mysqli_fetch_array($run_product)) {
        // $productInListID = $row_product['ProductInListID'];
        $ListID = $row_product['ListID'];
        // $product_id = $row_product['product_id'];
        // $quantity = $row_product['quantity'];
        $ListName = $row_product['ListName'];

        echo '
        
            <div class="row mb-3">
                <div class="col-1">

                    <div class="edit d-flex justify-content-center" style="margin-top: 7px;">
                        <button type="button" class="btn btn-outline-primary buttonsquare" id="buttonmodal" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="border-radius: 25px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </button>
                    </div>

                </div>
                <div class="col">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Vegetables <span class="badge bg-secondary mx-2">2</span>
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body"> ';
                           
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

                                echo '
                                <div class="row py-xxl-5 py-sm-4 align-items-center">
                                    <div class="col-1 align-self-center py-2 mx-sm-auto">
                                        <button type="button" class="btn btn-outline-danger btn-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="col-2">
                                        <h4 style="text-align: center;">'.$product_price.'</h4>
                                        <img src="../admin_area/product_images/'.$product_img.'" class="img-thumbnail" alt="">
                                    </div>
                                    <div class="col-2 align-self-center mt-5">
                                        <div>
                                            <p class="fw-normal"></p>
                                            
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <input type="number" min="0" class="form-control" id="inputQuantity1'.$i.'" onclick=\'multiply1();\' onkeyup=\'multiply1();\' value="'.$quantity.'">
                                    </div>
                                    <div class="col-2 align-self-center">
                                        <div>
                                            <h6 class="text-center">Sub Total</h6>
                                            <p id="cartTotal1'.$i.'" class="text-center text-success fw-bold"></p>
                                        </div>
                                    </div>
                                    <div class="col-1 align-self-center">
                                        <input type="checkbox" name="" id="" class="">
                                    </div>
                                    <div class="col-2">
                                        <button type="button" class="btn btn-outline-dark">Add to cart</button>
                                    </div>
                                </div>

                                ';
                                echo "
                                <script>
                                var total = 0.0;
                                function multiply1(){
                                    var quantity = document.querySelectorAll('#inputQuantity1".$i."');
                                    total = quantity[0].value * 10;
                                    document.getElementById('cartTotal1".$i."').innerHTML = 'RM ' + total;
                                    console.log(total);
                                }
                                
                                </script>
                                 ";

                                
                                 $i = $i + 1;
                            }
                            
                                echo '
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-1">
                    <div class="edit d-flex justify-content-center" style="margin-top: 7px;">
                        <button type="button" class="btn btn-outline-danger buttonsquare" style="border-radius: 25px;" id="removeitemforwishlist">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </button>
                    </div>
                </div>

            </div> 
            ';


      
       
    }

    
    


}

?>