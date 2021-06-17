<?php 



include("../includes/header.php");
include("../includes/db.php");
global $total_records, $sort;

$per_page = 10;
// if(isset($_GET['page'])){ $page=$_GET['page']; }
// else{ $page=1; }
$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
if (isset($_GET['p_cat_id'])) $p_cat_id0 = $_GET['p_cat_id'];

$start_from = ($page-1) * $per_page;
$get_product = "select * from product where p_cat_id=$p_cat_id0 LIMIT $start_from,$per_page";
$run_product = mysqli_query($db, $get_product);
$count = mysqli_num_rows($run_product);

$get_categoryName = "select * from product_categories where p_cat_id=$p_cat_id0";
$run_categoryName = mysqli_query($db, $get_categoryName);
$row_categoryName = mysqli_fetch_array($run_categoryName);
$p_cat_title = $row_categoryName['p_cat_title'];  

$get_productAmount = "SELECT COUNT(*) FROM product WHERE p_cat_id=$p_cat_id0";
$run_productAmount = mysqli_query($db, $get_productAmount);
$productAmount = mysqli_fetch_row($run_productAmount);

?>

    <div class="container pt-5">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb fw-bold">
                <li class="breadcrumb-item"><a href="index.php" class="text-dark text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $p_cat_title ?></li>
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
           
                <h1><?php echo $p_cat_title ?></h1>
                <!-- <p class="fs-5">Back to the Jungle!</p> -->
                <hr>
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
                                <a class="dropdown-item" href="../src/products.php?page=<?php echo $page ?>&id=<?php echo $userid ?>&p_cat_id=<?php echo $p_cat_id0 ?>&sort=A2Z" 
                                role="button">Alphabetically, A-Z</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="../src/products.php?page=<?php echo $page ?>&id=<?php echo $userid ?>&p_cat_id=<?php echo $p_cat_id0 ?>&sort=Z2A" 
                                role="button">Alphabetically, Z-A</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="../src/products.php?page=<?php echo $page ?>&id=<?php echo $userid ?>&p_cat_id=<?php echo $p_cat_id0 ?>&sort=L2H" 
                                role="button">Price, low to high</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="../src/products.php?page=<?php echo $page ?>&id=<?php echo $userid ?>&p_cat_id=<?php echo $p_cat_id0 ?>&sort=H2L" 
                                role="button">Price, high to low</a>
                            </li>
                            <?php 
                             }
                             
                             else
                                 if(isset($_SESSION['user']) && $count < 1){

                                ?>
                                <li>
                                <a class="dropdown-item" style="pointer-events:none;" href="../src/products.php?page=<?php echo $page ?>&p_cat_id=<?php echo $p_cat_id0 ?>&sort=A2Z" 
                                role="button">Alphabetically, A-Z</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" style="pointer-events:none;" href="../src/products.php?page=<?php echo $page ?>&p_cat_id=<?php echo $p_cat_id0 ?>&sort=Z2A" 
                                    role="button">Alphabetically, Z-A</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" style="pointer-events:none;" href="../src/products.php?page=<?php echo $page ?>&p_cat_id=<?php echo $p_cat_id0 ?>&sort=L2H" 
                                    role="button">Price, low to high</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" style="pointer-events:none;" href="../src/products.php?page=<?php echo $page ?>&p_cat_id=<?php echo $p_cat_id0 ?>&sort=H2L" 
                                    role="button">Price, high to low</a>
                                </li>
                                <?php }
                                else
                                    if(!isset($_SESSION['user']) && $count > 1){
                                ?>
                                <li>
                                <a class="dropdown-item"  href="../src/products.php?page=<?php echo $page ?>&p_cat_id=<?php echo $p_cat_id0 ?>&sort=A2Z" 
                                role="button">Alphabetically, A-Z</a>
                                </li>
                                <li>
                                    <a class="dropdown-item"  href="../src/products.php?page=<?php echo $page ?>&p_cat_id=<?php echo $p_cat_id0 ?>&sort=Z2A" 
                                    role="button">Alphabetically, Z-A</a>
                                </li>
                                <li>
                                    <a class="dropdown-item"  href="../src/products.php?page=<?php echo $page ?>&p_cat_id=<?php echo $p_cat_id0 ?>&sort=L2H" 
                                    role="button">Price, low to high</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="../src/products.php?page=<?php echo $page ?>&p_cat_id=<?php echo $p_cat_id0 ?>&sort=H2L" 
                                    role="button">Price, high to low</a>
                                </li>
                                
                            <?php 
                                    }else{

                                     ?>

                                <li>
                                <a class="dropdown-item" style="pointer-events:none;" href="../src/products.php?page=<?php echo $page ?>&p_cat_id=<?php echo $p_cat_id0 ?>&sort=A2Z" 
                                role="button">Alphabetically, A-Z</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" style="pointer-events:none;" href="../src/products.php?page=<?php echo $page ?>&p_cat_id=<?php echo $p_cat_id0 ?>&sort=Z2A" 
                                    role="button">Alphabetically, Z-A</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" style="pointer-events:none;" href="../src/products.php?page=<?php echo $page ?>&p_cat_id=<?php echo $p_cat_id0 ?>&sort=L2H" 
                                    role="button">Price, low to high</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" style="pointer-events:none;" href="../src/products.php?page=<?php echo $page ?>&p_cat_id=<?php echo $p_cat_id0 ?>&sort=H2L" 
                                    role="button">Price, high to low</a>
                                </li>
                                     <?php 
                                    }
                             ?>
                           
                        </ul>
                    </div>
                </div>

                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-3">

                    <?php 

                    global $per_page;
                    $per_page = 10;

                    if (isset($_GET['sort'])) {
                        $sort = $_GET['sort'];
                        if ($sort == 'A2Z') getProA2Z();
                        elseif ($sort == 'Z2A') getProZ2A();
                        elseif ($sort == 'L2H') getProL2H();
                        elseif ($sort == 'H2L') getProH2L();
                        else getProDef();
                    } else getProDef();
                    
                    ?>
                    
                </div>
                <nav aria-label="Product page navigation">
                    <ul class="pagination justify-content-end mb-0 mt-4">
                    <?php 
                        global $p_cat_id0;
                        if (isset($_GET['p_cat_id'])) $p_cat_id0 = $_GET['p_cat_id'];
                        
                        $query = "select * from product where p_cat_id=$p_cat_id0 ";
                        $result = mysqli_query($con,$query);
                        $total_records = mysqli_num_rows($result);
                        $total_pages = ceil($total_records / $per_page);

                        if(isset($_SESSION['user'])){
                            $userid=$_SESSION['user'];

                            if($page >= 2) {   
                                echo '
                                <li class="page-item">
                                    <a class="page-link" href="../src/products.php?page='.($page-1).'&id='.$userid.'&p_cat_id='.$p_cat_id0.'&sort='.$sort.'">
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
                            
                                <li class="page-item" aria-current="page"><a class="page-link" href="../src/products.php?page='.$i.'&id='.$userid.'&p_cat_id='.$p_cat_id0.'&sort='.$sort.'">
                                '.$i.'</a></li>
                            
                                '
                                ;
                            }
    
                            if ($page < $total_pages) {
                                echo '
                                <li class="page-item">
                                    <a class="page-link active" href="../src/products.php?page='.($page+1).'&id='.$userid.'&p_cat_id='.$p_cat_id0.'&sort='.$sort.'">
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
                        } else{
                            if($page >= 2) {   
                                echo '
                                <li class="page-item">
                                    <a class="page-link" href="../src/products.php?page='.($page-1).'&&p_cat_id='.$p_cat_id0.'&sort='.$sort.'">
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
                            
                                <li class="page-item" aria-current="page"><a class="page-link" href="../src/products.php?page='.$i.'&p_cat_id='.$p_cat_id0.'&sort='.$sort.'">
                                '.$i.'</a></li>
                            
                                '
                                ;
                            }
    
                            if ($page < $total_pages) {
                                echo '
                                <li class="page-item">
                                    <a class="page-link active" href="../src/products.php?page='.($page+1).'&p_cat_id='.$p_cat_id0.'&sort='.$sort.'">
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

    <?php include("../includes/footer.php") ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
    <script src="../nyumscript.js"></script>
</body>

</html>