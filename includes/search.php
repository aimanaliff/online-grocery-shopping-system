<?php
$db=mysqli_connect("localhost","root","","groceries");

$count = 0;
if(isset($_POST['query'])) {
    $output = "";
    $searchquery = $_POST['query'];
    $searchquery = preg_replace("#[^0-9a-z]#i","",$searchquery);
    $query ="SELECT * FROM product WHERE product_name LIKE '%$searchquery%'";
    $result =mysqli_query($db, $query);
    $count = mysqli_num_rows($result);
    $id = $_POST['id'];
    if($count == 0) {
        echo "<p>No product found</p>";
    } else {
        while ($row = mysqli_fetch_array($result)) {
            $product_id = $row['product_id'];
            $p_cat_id = $row['p_cat_id'];
            $product_name = $row['product_name'];
            $product_price = $row['product_price'];
            $product_img = $row['product_img'];
            $product_quantity = $row['product_quantity'];
            $product_desc = $row['product_desc'];
            echo "
                <a href='products-closeup.php?id=$id&product_id=$product_id&p_cat_id=$p_cat_id'><p>" . $product_name . "</p></a>
            ";
            
        }
        
    }
}

?>