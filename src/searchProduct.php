<?php 
  include("../includes/header.php");
  include("../includes/db.php");

  $per_page = 10;
  // if(isset($_GET['page'])){ $page=$_GET['page']; }
  // else{ $page=1; }
  $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
  if (isset($_GET['search'])) $searchquery = $_GET['search'];
  $searchquery = preg_replace("#[^0-9a-z]#i","",$searchquery);
  $start_from = ($page-1) * $per_page;
  $get_product = "SELECT * FROM product WHERE product_name LIKE '%$searchquery%' LIMIT $start_from,$per_page";
  $run_product = mysqli_query($db, $get_product);
  $count = mysqli_num_rows($run_product);

  
  $get_productAmount = "SELECT COUNT(*) FROM product  WHERE product_name LIKE '%$searchquery%'";
  $run_productAmount = mysqli_query($db, $get_productAmount);
  $productAmount = mysqli_fetch_row($run_productAmount);
?>

<div class="container pt-5">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb fw-bold">
                <li class="breadcrumb-item"><a href="index.php" class="text-dark text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $searchquery ?></li>
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
        <div id="s"  class="card">
            <div class="card-body m-3 mt-2">
                <h1>Search result for "<?php echo $searchquery ?>"</h1>
                <div class="container d-flex flex-row justify-content-between align-item-center p-0">
                    <p id="showProdAmount">Showing <strong><?php echo $count ?></strong> of <strong><?php echo $productAmount[0] ?></strong> products</p>

                    <div class="dropdown pb-3">
                            <button class="btn bg-transparent dropdown-toggle" type="button" id="dropdownSort"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Sort by:
                            </button>

                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownSort">
                                <?php
                            if($count > 1 && isset($_SESSION['user'])){
                                ?>
                                <li>
                                    <a class="dropdown-item" href="../src/searchProduct.php?page=<?php echo $page ?>&id=<?php echo $userid ?>&search=<?php echo $searchquery ?>&sort=A2Z" 
                                    role="button">Alphabetically, A-Z</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="../src/searchProduct.php?page=<?php echo $page ?>&id=<?php echo $userid ?>&search=<?php echo $searchquery ?>&sort=Z2A" 
                                    role="button">Alphabetically, Z-A</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="../src/searchProduct.php?page=<?php echo $page ?>&id=<?php echo $userid ?>&search=<?php echo $searchquery ?>&sort=L2H" 
                                    role="button">Price, low to high</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="../src/searchProduct.php?page=<?php echo $page ?>&id=<?php echo $userid ?>&search=<?php echo $searchquery ?>&sort=H2L" 
                                    role="button">Price, high to low</a>
                                </li>
                                <?php 
                                }
                                
                                else
                                    if(isset($_SESSION['user']) && $count < 1){

                                    ?>
                                    <li>
                                        <a class="dropdown-item" href="../src/searchProduct.php?page=<?php echo $page ?>&id=<?php echo $userid ?>&search=<?php echo $searchquery ?>&sort=A2Z" 
                                        role="button">Alphabetically, A-Z</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="../src/searchProduct.php?page=<?php echo $page ?>&id=<?php echo $userid ?>&search=<?php echo $searchquery ?>&sort=Z2A" 
                                        role="button">Alphabetically, Z-A</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="../src/searchProduct.php?page=<?php echo $page ?>&id=<?php echo $userid ?>&search=<?php echo $searchquery ?>&sort=L2H" 
                                        role="button">Price, low to high</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="../src/searchProduct.php?page=<?php echo $page ?>&id=<?php echo $userid ?>&search=<?php echo $searchquery ?>&sort=H2L" 
                                        role="button">Price, high to low</a>
                                    </li>

                                    <?php }
                                    else
                                        if(!isset($_SESSION['user']) && $count > 1){
                                    ?>
                                        <li>
                                            <a class="dropdown-item" href="../src/searchProduct.php?page=<?php echo $page ?>&id=0>&search=<?php echo $searchquery ?>&sort=A2Z" 
                                            role="button">Alphabetically, A-Z</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="../src/searchProduct.php?page=<?php echo $page ?>&id=0&search=<?php echo $searchquery ?>&sort=Z2A" 
                                            role="button">Alphabetically, Z-A</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="../src/searchProduct.php?page=<?php echo $page ?>&id=0&search=<?php echo $searchquery ?>&sort=L2H" 
                                            role="button">Price, low to high</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="../src/searchProduct.php?page=<?php echo $page ?>&id=0&search=<?php echo $searchquery ?>&sort=H2L" 
                                            role="button">Price, high to low</a>
                                        </li>
                                    
                                <?php 
                                        }else{

                                        ?>

                                            <li>
                                                <a class="dropdown-item" href="../src/searchProduct.php?page=<?php echo $page ?>&id=0&search=<?php echo $searchquery ?>&sort=A2Z" 
                                                role="button">Alphabetically, A-Z</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="../src/searchProduct.php?page=<?php echo $page ?>&id=0&search=<?php echo $searchquery ?>&sort=Z2A" 
                                                role="button">Alphabetically, Z-A</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="../src/searchProduct.php?page=<?php echo $page ?>&id=0&search=<?php echo $searchquery ?>&sort=L2H" 
                                                role="button">Price, low to high</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="../src/searchProduct.php?page=<?php echo $page ?>&id=0&search=<?php echo $searchquery ?>&sort=H2L" 
                                                role="button">Price, high to low</a>
                                            </li>
                                        <?php 
                                        }
                                ?>
                            </ul>
                        </div>
                    </div>

<?php   
if(isset($_GET['search'])){
    $searchquery = $_GET['search'];
    $userid = $_GET['id'];
    // $searchquery = preg_replace("#[^0-9a-z]#i","",$searchquery);
    // $query ="SELECT * FROM product WHERE product_name LIKE '%$searchquery%'";
    // $result =mysqli_query($db, $query);
    // $count = mysqli_num_rows($result);
    if($count == 0) {
        echo '<h3 style="text-align:center;color:grey;" class="py-3 rounded-3">&nbsp&nbsp&nbsp&nbsp&nbspNo Product Found</h3>';
        ?>
        </div>
        </div>
    </main>

    <?php
    } else {
        ?>
    

                
          <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-3">

     <?php
            global $per_page;
            $per_page = 10;

            if (isset($_GET['sort'])) {
                $sort = $_GET['sort'];
                if ($sort == 'A2Z') getProA2Z1();
                elseif ($sort == 'Z2A') getProZ2A1();
                elseif ($sort == 'L2H') getProL2H1();
                elseif ($sort == 'H2L') getProH2L1();
                else getProDef1();
            } else getProDef1();
        
            
        ?>

        </div>
        <nav aria-label="Product page navigation">
                    <ul class="pagination justify-content-end mb-0 mt-4">
                    <?php 
                        global $searchquery,$sort;
                        if (isset($_GET['search'])) $searchquery = $_GET['search'];
                        
                        $query = "SELECT * FROM product WHERE product_name LIKE '%$searchquery%'";
                        $result = mysqli_query($db,$query);
                        $total_records = mysqli_num_rows($result);
                        $total_pages = ceil($total_records / $per_page);

                        if(isset($_SESSION['user'])){
                            $userid=$_SESSION['user'];
                        if($page >= 2) {   
                            echo '
                            <li class="page-item">
                                <a class="page-link" href="../src/searchProduct.php?page='.($page-1).'&id='.$userid.'&search='.$searchquery.'&sort='.$sort.'">
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

                        for($i=1; $i<=$total_pages; $i++){
                            echo '
                        
                            <li class="page-item" aria-current="page"><a class="page-link" href="../src/searchProduct.php?page='.$i.'&id='.$userid.'&search='.$searchquery.'&sort='.$sort.'">
                            '.$i.'</a>
                            </li>
                            '
                            ;
                        }

                        if ($page < $total_pages) {
                            echo '
                            <li class="page-item">
                                <a class="page-link active" href="../src/searchProduct.php?page='.($page+1).'&id='.$userid.'&search='.$searchquery.'&sort='.$sort.'">
                                Next</a>
                            </li>
                            ';
                        } 
                        else {
                            echo '
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Next</a>
                            </li>
                            ';
                        }
                    } else {
                        if($page >= 2) {   
                            echo '
                            <li class="page-item">
                                <a class="page-link" href="../src/searchProduct.php?page='.($page-1).'&id='.$userid.'&search='.$searchquery.'&sort='.$sort.'">
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

                        for($i=1; $i<=$total_pages; $i++){

                            echo '
                        
                            <li class="page-item" aria-current="page"><a class="page-link" href="../src/searchProduct.php?page='.$i.'&id='.$userid.'&search='.$searchquery.'&sort='.$sort.'">
                            '.$i.'</a></li>
                        
                            '
                            ;
                        }

                        if ($page < $total_pages) {
                            echo '
                            <li class="page-item">
                                <a class="page-link active" href="../src/searchProduct.php?page='.($page+1).'&id='.$userid.'&search='.$searchquery.'&sort='.$sort.'">
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
                    </ul>
                </nav>
          </div>
        </div>
        </main>
        <?php
        
    

    }


}

function getpro1($run_product)
{
    $id = $_GET['id'];
    while ($row = mysqli_fetch_array($run_product)) {
        $product_id = $row['product_id'];
        $p_cat_id = $row['p_cat_id'];
        $product_name = $row['product_name'];
        $product_price = $row['product_price'];
        $product_img = $row['product_img'];
        $product_quantity = $row['product_quantity'];
        $product_desc = $row['product_desc'];
        $sale = $row['sale'];
        $percentage = $row['percentage'];

        if (strlen($product_name) > 15) {
            $product_name = substr($product_name, 0, 8). " .. " . substr($product_name, -4);
        }

        if (isset($_SESSION['user'])) {
            $_SESSION['cart'] = $product_id;
            $id = $_SESSION['user'];
            echo "
            
            <div class='col'>
                <div class='card shadow-sm sshighlight'>
                    <a href='products-closeup.php?id=$id&product_id=$product_id&p_cat_id=$p_cat_id'>
                        <img src='../admin_area/product_images/$product_img' alt='pise' class='card-img-top' style='height: 200px;'>
                    </a>
                    <div class='card-body'>
                    ";
                    if($sale == "1"){
                        ?>
                        <div class='position-absolute top-0 end-0 pt-3'>
                            <h5><span class='badge bg-danger'><?php echo $percentage;?>% off</span></h5>
                        </div>
                        <?php
                    }
                    ?>
                <?php echo "
                        <h5 class='card-title'>$product_name</h5>
                        <p class='card-text'>RM $product_price</p>
            "; ?>

                        <div class='d-flex flex-column justify-content-around gap-2 gap-sm-0'>
                            <a href='products-closeup.php?id=<?php echo $id?>&product_id=<?php echo $product_id?>&p_cat_id=<?php echo $p_cat_id ?>'  class='btn btn-success rounded-pill mb-sm-2  '>View More</a>
                            <a onclick="add<?=$product_id?>()" class='btn btn-warning rounded-pill'>Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
    <?php
            
        } else {
            $_SESSION['cart'] = $product_id;
            echo "
            
            <div class='col'>
                <div class='card shadow-sm sshighlight'>
                    <a href='products-closeup.php?product_id=$product_id&p_cat_id=$p_cat_id'>
                        <img src='../admin_area/product_images/$product_img' alt='pise' class='card-img-top' style='height: 200px;'>
                    </a>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_name</h5>
                        <p class='card-text'>RM $product_price</p>
                "; ?>

                        <div class='d-flex flex-column justify-content-around gap-2 gap-sm-0'>
                            <a href='products-closeup.php?product_id=<?php echo $product_id?>&p_cat_id=<?php echo $p_cat_id ?>'  class='btn btn-success rounded-pill mb-sm-2  '>View More</a>
                            <a href='' data-bs-toggle='modal' data-bs-target='#exampleModal'  class='btn btn-warning rounded-pill'>Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            
        }
        ?>
        <script>
    
        function add<?=$product_id?>(){
            console.log("asd");
            var product_id = <?php echo $product_id ;?>;
            var id = <?php echo $id ;?>;
            $.ajax({
                    type:"post",
                    cache:false,
                    url:"../functions/newlistname.php",
                    data:{
                        product_id:product_id,
                        id:id
                    },
                    success:function(response){
                        if(response){
                            Swal.fire(
                                'Added!',
                                'Sucessfully added to your cart',
                                'success',
                                ).then((result) =>{
                                    if(result.isConfirmed){
                                        // location.reload();
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
    }


}


function getProDef1()
{
    global $db, $searchquery, $id, $page, $count;

    $per_page = 10;
    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
    if (isset($_GET['search'])) $searchquery = $_GET['search'];
    if (isset($_GET['id'])) $id = $_GET['id'];

    $start_from = ($page-1) * $per_page;
    $get_product = "SELECT * FROM product WHERE product_name LIKE '%$searchquery%' LIMIT $start_from,$per_page";
    $run_product = mysqli_query($db, $get_product);
    $count = mysqli_num_rows($run_product);

    getpro1($run_product);
}

function getProA2Z1()
{
    global $db, $searchquery, $id, $page, $count;

    $per_page = 10;
    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
    if (isset($_GET['search'])) $searchquery = $_GET['search'];
    if (isset($_GET['id'])) $id = $_GET['id'];

    $start_from = ($page-1) * $per_page;
    $get_product = "SELECT * FROM product WHERE product_name LIKE '%$searchquery%' ORDER BY product_name ASC 
                    LIMIT $start_from,$per_page";
    $run_product = mysqli_query($db, $get_product);
    $count = mysqli_num_rows($run_product);

    getpro1($run_product);
}

function getProZ2A1()
{
    global $db, $searchquery, $id, $page, $count;

    $per_page = 10;
    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
    if (isset($_GET['search'])) $searchquery = $_GET['search'];
    if (isset($_GET['id'])) $id = $_GET['id'];

    $start_from = ($page-1) * $per_page;
    $get_product = "SELECT * FROM product WHERE product_name LIKE '%$searchquery%' ORDER BY product_name DESC
                    LIMIT $start_from,$per_page";
    $run_product = mysqli_query($db, $get_product);
    $count = mysqli_num_rows($run_product);

    getpro1($run_product);
}

function getProL2H1()
{
    // echo "asdasa";
    global $db, $searchquery, $id, $page, $count;

    $per_page = 10;
    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
    if (isset($_GET['search'])) $searchquery = $_GET['search'];
    if (isset($_GET['id'])) $id = $_GET['id'];

    $start_from = ($page-1) * $per_page;
    $get_product = "SELECT * FROM product WHERE product_name LIKE '%$searchquery%' ORDER BY product_price ASC
                    LIMIT $start_from,$per_page";
    $run_product = mysqli_query($db, $get_product);
    $count = mysqli_num_rows($run_product);

   

    getpro1($run_product);
}

function getProH2L1()
{
    global $db, $searchquery, $id, $page, $count;

    $per_page = 10;
    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
    if (isset($_GET['search'])) $searchquery = $_GET['search'];
    if (isset($_GET['id'])) $id = $_GET['id'];

    $start_from = ($page-1) * $per_page;
    $get_product = "SELECT * FROM product WHERE product_name LIKE '%$searchquery%' ORDER BY product_price DESC
                    LIMIT $start_from,$per_page";
    $run_product = mysqli_query($db, $get_product);
    $count = mysqli_num_rows($run_product);

    getpro1($run_product);
}
    
 include("../includes/footer.php") 



?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
<script src="../nyumscript.js"></script>