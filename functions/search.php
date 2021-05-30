<?php
mysql_connect("localhost", "root", "groceries") or die("Could not connect to the database");
mysql_select_db("groceries") or die("Could not find database");
$output = '';

//collect
if(isset($_POST['search'])) {
    $searchquery = $_POST['search'];
    $searchquery = preg_replace("#[^0-9a-z]#i","",$searchquery);

    $query = mysql_query("SELECT * FROM productsid WHERE product_name LIKE '%$searchquery%' OR product_desc LIKE '%$searchquery%'") or die("Could not search.");
    $count = mysql_num_rows($query);
    if($count == 0) {
        $output = 'No products found.';
    } else {
        while($row = mysql_fetch_array($query)) {
            $prodname = $row['product_name'];
            $proddesc = $row['product_desc'];
            $id = $row['id'];

            $output .= '<div> '.$prodname.' '.$proddesc.'</div>';
        }
    }
}

?>