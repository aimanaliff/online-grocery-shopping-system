<?php 

include("../includes/header.php")

?>
    <div class="container pt-5">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb fw-bold">
                <li class="breadcrumb-item"><a href="../index.html" class="text-dark text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Category</li>
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
                <h1>Le Fruits</h1>
                <p class="fs-5">Back to the Jungle!</p>
                <hr>
                <div class="container d-flex flex-row justify-content-between align-item-center p-0">
                    <p>Showing <strong>1 - 20</strong> of <strong>20</strong> products</p>
                    <div class="dropdown pb-3">
                        <button class="btn bg-transparent dropdown-toggle" type="button" id="dropdownSort"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Sort by:
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownSort">
                            <li><button class="dropdown-item" type="button">Alphabetically, A-Z</button></li>
                            <li><button class="dropdown-item" type="button">Alphabetically, Z-A</button></li>
                            <li><button class="dropdown-item" type="button">Price, low to high</button></li>
                            <li><button class="dropdown-item" type="button">Price, high to low</button></li>
                        </ul>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-3">

                    <?php 
                    
                        getpro();
                    
                    ?>
                    <!-- <div class="col">
                        <div class="card shadow-sm sshighlight">
                            <a href="products-closeup.html">
                                <img src="../img/banana.jpg" alt="pise" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Pise Gomo</h5>
                                <p class="card-text">RM 9999.99</p>
                                <div class="d-flex flex-sm-column justify-content-around">
                                    <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                    <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm sshighlight">
                            <a href="./products-closeup.html">
                                <img src="../img/kiwi.jpg" alt="pise" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Kiwi Gomo</h5>
                                <p class="card-text">RM 9999.99</p>
                                <div class="d-flex flex-sm-column justify-content-around">
                                    <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                    <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm sshighlight">
                            <a href="./products-closeup.html">
                                <img src="../img/pineapple.jpg" alt="pise" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Nenas Gomo</h5>
                                <p class="card-text">RM 9999.99</p>
                                <div class="d-flex flex-sm-column justify-content-around">
                                    <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                    <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm sshighlight">
                            <a href="./products-closeup.html">
                                <img src="../img/tomato.jpg" alt="pise" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Toma Tomo</h5>
                                <p class="card-text">RM 9999.99</p>
                                <div class="d-flex flex-sm-column justify-content-around">
                                    <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                    <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm sshighlight">
                            <a href="./products-closeup.html">
                                <img src="../img/banana.jpg" alt="pise" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Pise Gomo</h5>
                                <p class="card-text">RM 9999.99</p>
                                <div class="d-flex flex-sm-column justify-content-around">
                                    <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                    <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm sshighlight">
                            <a href="./products-closeup.html">
                                <img src="../img/kiwi.jpg" alt="pise" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Kiwi Gomo</h5>
                                <p class="card-text">RM 9999.99</p>
                                <div class="d-flex flex-sm-column justify-content-around">
                                    <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                    <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm sshighlight">
                            <a href="./products-closeup.html">
                                <img src="../img/pineapple.jpg" alt="pise" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Nenas Gomo</h5>
                                <p class="card-text">RM 9999.99</p>
                                <div class="d-flex flex-sm-column justify-content-around">
                                    <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                    <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm sshighlight">
                            <a href="./products-closeup.html">
                                <img src="../img/tomato.jpg" alt="pise" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Toma Tomo</h5>
                                <p class="card-text">RM 9999.99</p>
                                <div class="d-flex flex-sm-column justify-content-around">
                                    <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                    <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm sshighlight">
                            <a href="./products-closeup.html">
                                <img src="../img/banana.jpg" alt="pise" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Pise Gomo</h5>
                                <p class="card-text">RM 9999.99</p>
                                <div class="d-flex flex-sm-column justify-content-around">
                                    <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                    <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm sshighlight">
                            <a href="./products-closeup.html">
                                <img src="../img/kiwi.jpg" alt="pise" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Kiwi Gomo</h5>
                                <p class="card-text">RM 9999.99</p>
                                <div class="d-flex flex-sm-column justify-content-around">
                                    <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                    <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm sshighlight">
                            <a href="./products-closeup.html">
                                <img src="../img/pineapple.jpg" alt="pise" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Nenas Gomo</h5>
                                <p class="card-text">RM 9999.99</p>
                                <div class="d-flex flex-sm-column justify-content-around">
                                    <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                    <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm sshighlight">
                            <a href="./products-closeup.html">
                                <img src="../img/tomato.jpg" alt="pise" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Toma Tomo</h5>
                                <p class="card-text">RM 9999.99</p>
                                <div class="d-flex flex-sm-column justify-content-around">
                                    <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                    <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm sshighlight">
                            <a href="./products-closeup.html">
                                <img src="../img/banana.jpg" alt="pise" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Pise Gomo</h5>
                                <p class="card-text">RM 9999.99</p>
                                <div class="d-flex flex-sm-column justify-content-around">
                                    <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                    <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm sshighlight">
                            <a href="./products-closeup.html">
                                <img src="../img/kiwi.jpg" alt="pise" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Kiwi Gomo</h5>
                                <p class="card-text">RM 9999.99</p>
                                <div class="d-flex flex-sm-column justify-content-around">
                                    <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                    <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm sshighlight">
                            <a href="./products-closeup.html">
                                <img src="../img/pineapple.jpg" alt="pise" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Nenas Gomo</h5>
                                <p class="card-text">RM 9999.99</p>
                                <div class="d-flex flex-sm-column justify-content-around">
                                    <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                    <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm sshighlight">
                            <a href="./products-closeup.html">
                                <img src="../img/tomato.jpg" alt="pise" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Toma Tomo</h5>
                                <p class="card-text">RM 9999.99</p>
                                <div class="d-flex flex-sm-column justify-content-around">
                                    <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                    <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm sshighlight">
                            <a href="./products-closeup.html">
                                <img src="../img/banana.jpg" alt="pise" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Pise Gomo</h5>
                                <p class="card-text">RM 9999.99</p>
                                <div class="d-flex flex-sm-column justify-content-around">
                                    <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                    <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm sshighlight">
                            <a href="./products-closeup.html">
                                <img src="../img/kiwi.jpg" alt="pise" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Kiwi Gomo</h5>
                                <p class="card-text">RM 9999.99</p>
                                <div class="d-flex flex-sm-column justify-content-around">
                                    <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                    <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm sshighlight">
                            <a href="./products-closeup.html">
                                <img src="../img/pineapple.jpg" alt="pise" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Nenas Gomo</h5>
                                <p class="card-text">RM 9999.99</p>
                                <div class="d-flex flex-sm-column justify-content-around">
                                    <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                    <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm sshighlight">
                            <a href="./products-closeup.html">
                                <img src="../img/tomato.jpg" alt="pise" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Toma Tomo</h5>
                                <p class="card-text">RM 9999.99</p>
                                <div class="d-flex flex-sm-column justify-content-around">
                                    <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                    <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div> -->

                </div>
                <nav aria-label="Product page navigation">
                    <ul class="pagination justify-content-end mb-0 mt-4">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
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
</body>

</html>