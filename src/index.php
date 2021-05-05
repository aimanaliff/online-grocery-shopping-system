<?php 

include("../includes/header.php")

?>
 

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner" style="height:fit-content;">
            <div class="carousel-item active">
                <img src="../img/Carousel1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../img/Carousel2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../img/Carousel3.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../img/Carousel4.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <div class="container-fluid">
        <div class="text-center">
            <div class="row">
                <div class="col-md" style="background-color: #FFC000; padding: 1rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-tags-fill" viewBox="0 0 16 16" style="margin: 20px;">
                        <path
                            d="M2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2zm3.5 4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                        <path
                            d="M1.293 7.793A1 1 0 0 1 1 7.086V2a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l.043-.043-7.457-7.457z" />
                    </svg>
                    <h1>BIG SALE!</h1>
                    <h5>Get up to 25% off</h5>
                    <a href="#" class="text-reset text-decoration-none">View details here >></a>
                </div>
                <div class="col-md" style="background-color: #ED7D31; padding: 1rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16" style="margin: 20px;">
                        <path
                            d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                    </svg>
                    <h1>FREE SHIPPING </h1>
                    <h5>On orders over RM150.00</h5>
                    <a href="#" class="text-reset text-decoration-none">View details here >></a>
                </div>
                <div class="col-md" style="background-color: #70AD47; padding: 1rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-credit-card-fill" viewBox="0 0 16 16" style="margin: 20px;">
                        <path
                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0V4zm0 3v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7H0zm3 2h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1z" />
                    </svg>
                    <h1>10% OFF</h1>
                    <h5>When you use credit card</h5>
                    <a href="#" class="text-reset text-decoration-none">View details here >></a>
                </div>
            </div>
        </div>
    </div>
    <div class="cardIndex">
        <div class="container">
            <div class="d-flex flex-row align-items-center py-3  gap-3">
                <h2 class="mt-1">SHOCKING SALE</h2>

                <div class="tick" data-did-init="handleTickInit">

                    <div data-repeat="true" data-layout="horizontal center fit" data-transform="preset(d, h, m, s) -> delay">

                        <div class="tick-group">

                            <div data-key="value" data-repeat="true" data-transform="pad(00) -> split -> delay">

                                <span data-view="flip"></span>

                            </div>


                        </div>

                    </div>

                </div>

            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-3 pb-3">
                <div class="col">
                    <div class="card sshighlight">
                        <img src="../img/kiwi.jpg" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <div class="position-absolute top-0 end-0 pt-3">
                                <h5><span class="badge bg-danger">25% off</span></h5>
                            </div>
                            <h5 class="card-title">New Zealand Kiwi</h5>
                            <p class="card-text">
                                RM215/100g
                            </p>
                            <div class="d-flex flex-sm-column justify-content-around">
                                <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card sshighlight">
                        <img src="../img/broccoli.jpg" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <div class="position-absolute top-0 end-0 pt-3">
                                <h5><span class="badge bg-danger">50% off</span></h5>
                            </div>
                            <h5 class="card-title">Broke Your Lee's</h5>
                            <p class="card-text">
                                RM2/pcs
                            </p>
                            <div class="d-flex flex-sm-column justify-content-around">
                                <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card sshighlight">
                        <img src="../img/tomato.jpg" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <div class="position-absolute top-0 end-0 pt-3">
                                <h5><span class="badge bg-danger">15% off</span></h5>
                            </div>
                            <h5 class="card-title">Tokma Toes</h5>
                            <p class="card-text">
                                RM20/pcs
                            </p>
                            <div class="d-flex flex-sm-column justify-content-around">
                                <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card sshighlight">
                        <img src="../img/pineapple.jpg" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <div class="position-absolute top-0 end-0 pt-3">
                                <h5><span class="badge bg-danger">50% off</span></h5>
                            </div>
                            <h5 class="card-title">Spongebob Haus</h5>
                            <p class="card-text">
                                RM17/pcs
                            </p>
                            <div class="d-flex flex-sm-column justify-content-around">
                                <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card sshighlight">
                        <img src="../img/banana.jpg" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <div class="position-absolute top-0 end-0 pt-3">
                                <h5><span class="badge bg-danger">30% off</span></h5>
                            </div>
                            <h5 class="card-title">Minion Banana</h5>
                            <p class="card-text">
                                RM0.50/person
                            </p>
                            <div class="d-flex flex-sm-column justify-content-around">
                                <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="cardIndex">
        <div class="container">
            <div class="d-flex flex-row align-items-center pt-3 gap-3">
                <h2 class="pb-3">NEW PRODUCTS
                    <h4><span class="mb-3 badge bg-primary">New!</span></h4>
                </h2>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-3 pb-3">
                <div class="col">
                    <div class="card sshighlight">
                        <img src="../imgfood/chocolate/daim.jpeg" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title">DAIMuda</h5>
                            <p class="card-text">
                                RM25.50/250g
                            </p>
                            <div class="d-flex flex-sm-column justify-content-around">
                                <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card sshighlight">
                        <img src="../imgfood/vegetables/carrot.jpg" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title">Rabbit Stuffs</h5>
                            <p class="card-text">
                                RM2/pcs
                            </p>
                            <div class="d-flex flex-sm-column justify-content-around">
                                <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card sshighlight">
                        <img src="../imgfood/vegetables/spinach.jpeg" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title">PopEye Spinach</h5>
                            <p class="card-text">
                                RM5/pcs
                            </p>
                            <div class="d-flex flex-sm-column justify-content-around">
                                <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card sshighlight">
                        <img src="../imgfood/chocolate/kinderbueono.jpeg" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title">Kinda Bueno</h5>
                            <p class="card-text">
                                RM4.90/pcs
                            </p>
                            <div class="d-flex flex-sm-column justify-content-around">
                                <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card sshighlight">
                        <img src="../imgfood/vegetables/garlic.jpeg" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title">Makcik's Secret</h5>
                            <p class="card-text">
                                RM3.50/kg
                            </p>
                            <div class="d-flex flex-sm-column justify-content-around">
                                <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="cardIndex">
        <div class="container">
            <div class="d-flex flex-row align-items-center pt-3 gap-3">
                <h2 class="pb-3">TOP PRODUCTS</h2>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-3 pb-3">
                <div class="col">
                    <div class="card sshighlight">
                        <img src="../imgfood/chocolate/daim.jpeg" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <div class="position-absolute top-0 start-0 m-1 badge border border-light rounded-circle bg-secondary p-1"><span class="badge bg-secondary fs-6">1</span></div>
                            <h5 class="card-title">DAIMuda</h5>
                            <p class="card-text">
                                RM25.50/250g
                            </p>
                            <div class="d-flex flex-sm-column justify-content-around">
                                <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card sshighlight">
                        <img src="../img/banana.jpg" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <div class="position-absolute top-0 start-0 m-1 badge border border-light rounded-circle bg-secondary p-1"><span class="badge bg-secondary fs-6">2</span></div>
                            <h5 class="card-title">Minion Banana</h5>
                            <p class="card-text">
                                RM0.50/person
                            </p>
                            <div class="d-flex flex-sm-column justify-content-around">
                                <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card sshighlight">
                        <img src="../img/tomato.jpg" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <div class="position-absolute top-0 start-0 m-1 badge border border-light rounded-circle bg-secondary p-1"><span class="badge bg-secondary fs-6">3</span></div>
                            <h5 class="card-title">Tokma Toes</h5>
                            <p class="card-text">
                                RM20/pcs
                            </p>
                            <div class="d-flex flex-sm-column justify-content-around">
                                <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card sshighlight">
                        <img src="../imgfood/chocolate/kinderbueono.jpeg" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <div class="position-absolute top-0 start-0 m-1 badge border border-light rounded-circle bg-secondary p-1"><span class="badge bg-secondary fs-6">4</span></div>
                            <h5 class="card-title">Kinda Bueno</h5>
                            <p class="card-text">
                                RM4.90/pcs
                            </p>
                            <div class="d-flex flex-sm-column justify-content-around">
                                <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card sshighlight">
                        <img src="../imgfood/vegetables/spinach.jpeg" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <div class="position-absolute top-0 start-0 m-1 badge border border-light rounded-circle bg-secondary p-1"><span class="badge bg-secondary fs-6">5</span></div>
                            <h5 class="card-title">PopEye Spinach</h5>
                            <p class="card-text">
                                RM5/pcs
                            </p>
                            <div class="d-flex flex-sm-column justify-content-around">
                                <a href="#" class="btn btn-success rounded-pill mb-sm-2">Add to List</a>
                                <a href="#" class="btn btn-warning rounded-pill">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php 

    include("../includes/footer.php")

    ?>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="../nyumscript.js"></script>
    <script src="https://unpkg.com/@pqina/flip/dist/flip.min.js"></script>
    <script>
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
            keyboard: false
        })
        var modalToggle = document.getElementById('exampleModal') // relatedTarget
        myModal.show(modalToggle)
    </script>
</body>

</html>