<?php 



include("../includes/header.php");

// if (isset($_SESSION['success'])) { $userid = $_SESSION['user']; }

if (isset($_GET['product_id']) && isset($_GET['p_cat_id'])) {
    $productID = $_GET['product_id'];
    $categoryID = $_GET['p_cat_id'];

    $sql = "SELECT * FROM product WHERE product_id = $productID";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) { $productName = $row['product_name']; }
    } else { echo "0 results"; }

    $sql = "SELECT * FROM product_categories WHERE p_cat_id = $categoryID";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) { $categoryName = $row['p_cat_title']; }
    } else { echo "0 results"; }
}

?>

    <div class="container pt-5">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb fw-bold">
                <li class="breadcrumb-item"><a href="index.php" class="text-dark text-decoration-none">Home</a></li>
                <?php 
                if(isset($_GET['user'])){
                    ?>
                <li class="breadcrumb-item"><a href="products.php?page=1&id=<?php echo $userid ?>&p_cat_id=<?php echo $categoryID ?>" 
                    class="text-dark text-decoration-none"><?php echo $categoryName ?></a>
                </li>
                    <?php
                } else{
                    ?>
                <li class="breadcrumb-item"><a href="products.php?page=1&p_cat_id=<?php echo $categoryID ?>" 
                    class="text-dark text-decoration-none"><?php echo $categoryName ?></a>
                </li>
                    <?php
                }
                
                ?>
               
                <li class="breadcrumb-item active" aria-current="page"><?php echo $productName ?></li>
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
            <div class="card-body m-3">
                <?php get_pro_details(); ?>

                <div class="card shadow-sm p-2">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <h1 class="card-title pb-3 me-auto">Payment & Security</h1>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-lock-fill mt-3" viewBox="0 0 16 16">
                                <path
                                    d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                            </svg>
                        </div>

                        <p class="fs-5">Your payment information is processed securely. We do not store credit card
                            details nor have
                            access to your credit card information.</p>
                    </div>
                </div>

                
            </div>
        </div>
        
        <div class="modal fade" id="modalProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add To List</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="tab-content modal-body">
                            <div class="mb-3">
                                <select name="Listname" class="form-select" style="border-radius: 5px 5px 5px 5px;" aria-label="Default select example">
                                <?php 
                                    if(isset($_SESSION['user'])){
                                    $id = $_SESSION['user'];
                                    $query = "select * from listname where id=$id";
                                    $run_query = mysqli_query($db,$query);

                                    if(mysqli_num_rows($run_query)>0){
                                        echo "
                                        <option value=''>Select List</option>
                                        ";
                                        while($row_query = mysqli_fetch_array($run_query)){
                                            
                                            $ListID = $row_query['ListID'];
                                            $ListName = $row_query['ListName'];

                                            echo "
                                                <option value='$ListID'>$ListName</option>
                                            ";
                                        }
                                    } else {
                                        echo "
                                        <option value=''>No List</option>
                                        ";
                                    }
                                }
                                ?>
                                </select>
                            </div>
                            <button type="submit" name="submitListName" class="btn btn-primary btn-block">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    
     <?php include("../includes/footer.php"); ?> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
    <script src="../nyumscript.js"></script>
    
    <script>
        
        
    </script>

</body>

</html>