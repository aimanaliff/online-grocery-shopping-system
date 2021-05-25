<?php 

include("../includes/header.php");
include("../includes/db.php");
global $total_records;

if (isset($_GET['p_cat_id'])) {
    global $categoryID;
    $categoryID = $_GET['p_cat_id'];
    $sql = "SELECT * FROM product_categories WHERE p_cat_id = $categoryID";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) { $categoryName = $row['p_cat_title']; }
    } else { echo "0 results"; }

    mysqli_close($con);
}

function getProducts()
{
    global $db, $p_cat_id0, $id, $page, $results_per_page;

    if (isset($_GET['p_cat_id']) && isset($_GET['id'])) {
        $p_cat_id0 = $_GET['p_cat_id'];
        $id = $_GET['id'];
    }

    // if (!isset ($_GET['page'])) { $page = 1; } else { $page = $_GET['page']; }
    $page = (!isset ($_GET['page'])) ? 1 : $_GET['page'];
    $results_per_page = 20;
    $page_result = ($page-1) * $results_per_page;

    $get_product = "SELECT * FROM product LIMIT $page_result, $results_per_page";
    $run_product = mysqli_query($db, $get_product);

    while ($row_product = mysqli_fetch_array($run_product)) {
        global $product_id;
        $product_id = $row_product['product_id'];
        $p_cat_id = $row_product['p_cat_id'];
        $product_name = $row_product['product_name'];
        $product_price = $row_product['product_price'];
        $product_img = $row_product['product_img'];
        $product_quantity = $row_product['product_quantity'];
        $product_desc = $row_product['product_desc'];

        if ($p_cat_id == $p_cat_id0) {
            $_SESSION['cart'] = $product_id;
            echo "
            
            <div class='col'>
                <div class='card shadow-sm sshighlight'>
                    <a href='products-closeup.php?id=$id&product_id=$product_id&p_cat_id=$p_cat_id'>
                        <img src='../admin_area/product_images/$product_img' alt='pise' class='card-img-top'>
                    </a>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_name</h5>
                        <p class='card-text'>RM $product_price</p>
                        <div class='d-flex flex-sm-column justify-content-around'>
                            <a href='products-closeup.php?product_id=$product_id'  class='btn btn-success rounded-pill mb-sm-2  '>Add to List</a>
                            <a href='products-closeup.php?product_id=$product_id' class='btn btn-warning rounded-pill'>Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            
            ";
        }
    }
}

function pagination()
{
    global $db, $page, $id, $categoryID, $results_per_page, $total_records;

    $sql = "SELECT COUNT(*) FROM product WHERE p_cat_id = $categoryID";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_row($result);
    $total_records = $row[0];
    $total_pages = ceil($total_records / $results_per_page);     

    if($page >= 2) {   
        echo '
        <li class="page-item">
            <a class="page-link" href="products.php?page='.($page-1).'&id='.$id.'&p_cat_id='.$categoryID.'">
            Prev</a>
        </li>
        ';   
    } else {
        echo '
        <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Prev</a>
        </li>
        ';
    }

    for ($i=1; $i <= $total_pages; $i++) { 
        if ($i == $page) {
            echo '
            <li class="page-item active" aria-current="page">
                <a class="page-link" href="products.php?page='.$i.'&id='.$id.'&p_cat_id='.$categoryID.'">
                '.$i.'</a>
            </li>
            ';
        } else {
            echo '
            <li class="page-item">
                <a class="page-link" href="products.php?page='.$i.'&id='.$id.'&p_cat_id='.$categoryID.'">
                '.$i.'</a>
            </li>
            ';
        }
        
    }

    if ($page < $total_pages) {
        echo '
        <li class="page-item">
            <a class="page-link" href="products.php?page='.($page+1).'&id='.$id.'&p_cat_id='.$categoryID.'">
            Next</a>
        </li>
        ';
    } else {
        echo '
        <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Next</a>
        </li>
        ';
    }
}

?>
    <div class="container pt-5">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb fw-bold">
                <li class="breadcrumb-item"><a href="index.php" class="text-dark text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $categoryName ?></li>
            </ol>
        </nav>
    </div>

    <main class="container pb-5">
        <button type="button" class="btn rounded-circle" id="scrollUp" onclick="goUp()">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="46" fill="currentColor"
                class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                <path
                    d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
            </svg>
        </button>

        <div class="card">
            <div class="card-body m-3 mt-2">
                <h1><?php echo $categoryName ?></h1>
                <!-- <p class="fs-5">Back to the Jungle!</p> -->
                <hr>
                <div class="container d-flex flex-row justify-content-between align-item-center p-0">
                    <p id="showProdAmount"></p>
                    <script>
                        desc = document.getElementById('showProdAmount');
                        desc.innerHTML = 'Showing <strong>1 - 20</strong> of <strong><?php echo $total_records ?></strong> products'; // zieq tolong fikirkan cane nak tunjuk total records tu tengs
                    </script>

                    <div class="dropdown pb-3">
                        <button class="btn bg-transparent dropdown-toggle" type="button" id="dropdownSort"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Sort by:
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownSort">
                            <li><button class="dropdown-item" type="button" onclick="">Alphabetically, A-Z</button></li>
                            <li><button class="dropdown-item" type="button" onclick="">Alphabetically, Z-A</button></li>
                            <li><button class="dropdown-item" type="button" onclick="">Price, low to high</button></li>
                            <li><button class="dropdown-item" type="button" onclick="">Price, high to low</button></li>
                        </ul>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-3">

                    <?php 
                    
                    // getpro(); 
                    getProducts();
                    
                    ?>
                    
                </div>
                <nav aria-label="Product page navigation">
                    <ul class="pagination justify-content-end mb-0 mt-4">
                        <!-- <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item active" aria-current="page"><a class="page-link" href="products.php?page=&<?php echo $page ?>id=<?php echo $userid ?>&p_cat_id=<?php echo $categoryID ?>">
                            1</a></li>
                        <li class="page-item"><a class="page-link" href="#">
                            2</a></li>
                        <li class="page-item"><a class="page-link" href="#">
                            3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li> -->
                        <?php pagination() ?>
                    </ul>
                </nav>
            </div>
        </div>
    </main>

    <?php include("../includes/footer.php") ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
    <script src="../nyumscript.js"></script>
</body>

</html>