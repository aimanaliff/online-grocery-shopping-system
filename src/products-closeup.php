<?php 

include("../includes/header.php")

?>

    <div class="container pt-5">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb fw-bold">
                <li class="breadcrumb-item"><a href="/index.html" class="text-dark text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="products.html" class="text-dark text-decoration-none">Category</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Product</li>
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
                <?php 
                
                get_pro_details();
                
    
                
                ?>
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
                                    $query = "select * from listname";
                                    $run_query = mysqli_query($db,$query);

                                    if(mysqli_num_rows($run_query)==1){
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

    <footer class="footer container-fluid mt-auto pt-3" style="background-color: #006600; color: whitesmoke;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5">
                    <h3>NyumNyum Grocery Store</h4>
                </div>
                <div class="col-6 col-md">
                    <h5>About</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-reset text-decoration-none footer-link">Services</a></li>
                        <li><a href="#" class="text-reset text-decoration-none">Portfolio</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>Company</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-reset text-decoration-none footer-link">Career with Us</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>Policies</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-reset text-decoration-none footer-link">Refund Policy</a></li>
                        <li><a href="#" class="text-reset text-decoration-none footer-link">Privacy Policy</a></li>
                        <li><a href="#" class="text-reset text-decoration-none footer-link">Shipping Policy</a></li>
                        <li><a href="#" class="text-reset text-decoration-none footer-link">Terms of Policies</a></li>
                    </ul>
                </div>
                <hr>
                <div class="container text-center font-italic text-muted">
                    <p>&copy; 2021 NyumNyum Yummy Menjilat Jari</p>
                </div>
            </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
    <script src="../nyumscript.js"></script>
   
    
    <?php 
    
        
    // if(isset($_POST['submitListName'])){
    //     insertIntoList();    
    // } else {
    //     echo "<script>alert('asdasdad')</script>";
    //     echo "<script>window.open('_self')</script>";
    // }
    
    ?>


</body>

</html>