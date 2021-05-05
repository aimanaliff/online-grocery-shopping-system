<?php 

$db=mysqli_connect("localhost","root","","groceries");



function getpro(){
    
    GLOBAL $db;

    $get_product = "select * from product";

    $run_product = mysqli_query($db,$get_product);

    while($row_product=mysqli_fetch_array($run_product)){
        
        $product_id = $row_product['product_id'];
        $product_name = $row_product['product_name'];
        $product_price = $row_product['product_price'];
        $product_img = $row_product['product_img'];
        $product_quantity = $row_product['product_quantity'];
        $product_desc = $row_product['product_desc'];

        echo "
        
        <div class='col'>
            <div class='card shadow-sm sshighlight'>
                <a href='products-closeup.php?product_id=$product_id'>
                    <img src='../admin_area/product_images/$product_img' alt='pise' class='card-img-top'>
                </a>
                <div class='card-body'>
                    <h5 class='card-title'>Pise Gomo</h5>
                    <p class='card-text'>RM $product_price</p>
                    <div class='d-flex flex-sm-column justify-content-around'>
                        <a href='#' class='btn btn-success rounded-pill mb-sm-2'>Add to List</a>
                        <a href='#' class='btn btn-warning rounded-pill'>Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
        
        
        ";


    }


}


?>