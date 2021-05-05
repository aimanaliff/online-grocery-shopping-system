<?php 

include("../includes/header.php")

?>

<div class="container-xl mt-4 mb-4" style="background-color: white;">

<div class="row mb-5" style="background-color: #ED7D31;">
    <h3 style="text-align: center;" class="py-3 rounded-3">Wishlist</h3>
</div>

<div class="row mb-3">
    <div class="col-1">

        <div class="edit d-flex justify-content-center" style="margin-top: 7px;">
            <button type="button" class="btn btn-outline-primary buttonsquare" id="buttonmodal" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="border-radius: 25px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>
          </button>
        </div>

    </div>
    <div class="col">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Chocolates
                    <span class="badge bg-secondary mx-2">2</span>
                    </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <div class="row py-xxl-5 py-sm-4 align-items-center">
                        <div class="col-1 align-self-center py-2 mx-sm-auto">
                            <button type="button" class="btn btn-outline-danger btn-sm">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                      </svg>
                    </button>
                        </div>
                        <div class="col-2">
                            <h4 style="text-align: center;">KitKat</h4>
                            <img src="../imgfood/chocolate/kitkat.jpeg" class="img-thumbnail" alt="">
                        </div>
                        <div class="col-2 align-self-center mt-5">
                            <div>
                                <p class="fw-normal">Item description</p>
                                <p class="fw-normal">Item description</p>
                                <p class="fw-normal">Item description</p>
                            </div>
                        </div>
                        <div class="col-2">
                            <input type="number" class="form-control" id="inputQuantity">
                        </div>
                        <div class="col-2 align-self-center">
                            <div>
                                <h6 class="text-center">Sub Total</h6>
                                <p class="text-center text-success fw-bold">RM 3.50</p>
                            </div>
                        </div>
                        <div class="col-1 align-self-center">
                            <input type="checkbox" name="" id="" class="">
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-outline-dark">Add to cart</button>
                        </div>
                    </div>
                    <div class="row py-xxl-5 py-sm-4 align-items-center">
                        <div class="col-1 align-self-center py-2 mx-sm-auto">
                            <button type="button" class="btn btn-outline-danger btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                  </button>
                        </div>
                        <div class="col-2">
                            <h4 style="text-align: center;">Kinder Bueono</h4>
                            <img src="../imgfood/chocolate/kinderbueono.jpeg" class="img-thumbnail" alt="">
                        </div>
                        <div class="col-2 align-self-center mt-5">
                            <div>
                                <p class="fw-normal">Item description</p>
                                <p class="fw-normal">Item description</p>
                                <p class="fw-normal">Item description</p>
                            </div>
                        </div>
                        <div class="col-2">
                            <input type="number" class="form-control" id="inputQuantity">
                        </div>
                        <div class="col-2 align-self-center">
                            <div>
                                <h6 class="text-center">Sub Total</h6>
                                <p class="text-center text-success fw-bold">RM 7.90</p>
                            </div>
                        </div>
                        <div class="col-1 align-self-center">
                            <input type="checkbox" name="" id="" class="">
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-outline-dark">Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-1">
        <div class="edit d-flex justify-content-center" style="margin-top: 7px;">
            <button type="button" class="btn btn-outline-danger buttonsquare" style="border-radius: 25px;" id="removeitemforwishlist">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
              <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
            </svg>
          </button>
        </div>
    </div>

</div>

<hr>

<div class="row mb-3">
    <div class="col-1">

        <div class="edit d-flex justify-content-center" style="margin-top: 7px;">
            <button type="button" class="btn btn-outline-primary buttonsquare" id="buttonmodal" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="border-radius: 25px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>
          </button>
        </div>

    </div>
    <div class="col">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
              Fruits <span class="badge bg-secondary mx-2">2</span>
            </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <div class="row py-xxl-5 py-sm-4 align-items-center">
                        <div class="col-1 align-self-center py-2 mx-sm-auto">
                            <button type="button" class="btn btn-outline-danger btn-sm">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                      </svg>
                    </button>
                        </div>
                        <div class="col-2">
                            <h4 style="text-align: center;">Banana</h4>
                            <img src="../imgfood/fruits/banana.jpg" class="img-thumbnail" alt="">
                        </div>
                        <div class="col-2 align-self-center mt-5">
                            <div>
                                <p class="fw-normal">Item description</p>
                                <p class="fw-normal">Item description</p>
                                <p class="fw-normal">Item description</p>
                            </div>
                        </div>
                        <div class="col-2">
                            <input type="number" class="form-control" id="inputQuantity">
                        </div>
                        <div class="col-2 align-self-center">
                            <div>
                                <h6 class="text-center">Sub Total</h6>
                                <p class="text-center text-success fw-bold">RM 3.50</p>
                            </div>
                        </div>
                        <div class="col-1 align-self-center">
                            <input type="checkbox" name="" id="" class="">
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-outline-dark">Add to cart</button>
                        </div>
                    </div>
                    <div class="row py-xxl-5 py-sm-4 align-items-center">
                        <div class="col-1 align-self-center py-2 mx-sm-auto">
                            <button type="button" class="btn btn-outline-danger btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                  </button>
                        </div>
                        <div class="col-2">
                            <h4 style="text-align: center;">Orange</h4>
                            <img src="../imgfood/fruits/orange.jpg" class="img-thumbnail" alt="">
                        </div>
                        <div class="col-2 align-self-center mt-5">
                            <div>
                                <p class="fw-normal">Item description</p>
                                <p class="fw-normal">Item description</p>
                                <p class="fw-normal">Item description</p>
                            </div>
                        </div>
                        <div class="col-2">
                            <input type="number" class="form-control" id="inputQuantity">
                        </div>
                        <div class="col-2 align-self-center">
                            <div>
                                <h6 class="text-center">Sub Total</h6>
                                <p class="text-center text-success fw-bold">RM 7.90</p>
                            </div>
                        </div>
                        <div class="col-1 align-self-center">
                            <input type="checkbox" name="" id="" class="">
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-outline-dark">Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-1">
        <div class="edit d-flex justify-content-center" style="margin-top: 7px;">
            <button type="button" class="btn btn-outline-danger buttonsquare" style="border-radius: 25px;" id="removeitemforwishlist">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
              <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
            </svg>
          </button>
        </div>
    </div>

</div>

<hr>

<div class="row mb-3">
    <div class="col-1">

        <div class="edit d-flex justify-content-center" style="margin-top: 7px;">
            <button type="button" class="btn btn-outline-primary buttonsquare" id="buttonmodal" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="border-radius: 25px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>
          </button>
        </div>

    </div>
    <div class="col">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseTwo">
              Vegetables <span class="badge bg-secondary mx-2">2</span>
            </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <div class="row py-xxl-5 py-sm-4 align-items-center">
                        <div class="col-1 align-self-center py-2 mx-sm-auto">
                            <button type="button" class="btn btn-outline-danger btn-sm">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                      </svg>
                    </button>
                        </div>
                        <div class="col-2">
                            <h4 style="text-align: center;">Broccoli</h4>
                            <img src="../imgfood/vegetables/BROCCOLI.jpg" class="img-thumbnail" alt="">
                        </div>
                        <div class="col-2 align-self-center mt-5">
                            <div>
                                <p class="fw-normal">Item description</p>
                                <p class="fw-normal">Item description</p>
                                <p class="fw-normal">Item description</p>
                            </div>
                        </div>
                        <div class="col-2">
                            <input type="number" class="form-control" id="inputQuantity">
                        </div>
                        <div class="col-2 align-self-center">
                            <div>
                                <h6 class="text-center">Sub Total</h6>
                                <p class="text-center text-success fw-bold">RM 3.50</p>
                            </div>
                        </div>
                        <div class="col-1 align-self-center">
                            <input type="checkbox" name="" id="" class="">
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-outline-dark">Add to cart</button>
                        </div>
                    </div>
                    <div class="row py-xxl-5 py-sm-4 align-items-center">
                        <div class="col-1 align-self-center py-2 mx-sm-auto">
                            <button type="button" class="btn btn-outline-danger btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                  </button>
                        </div>
                        <div class="col-2">
                            <h4 style="text-align: center;">Garlic</h4>
                            <img src="../imgfood/vegetables/garlic.jpeg" class="img-thumbnail" alt="">
                        </div>
                        <div class="col-2 align-self-center mt-5">
                            <div>
                                <p class="fw-normal">Item description</p>
                                <p class="fw-normal">Item description</p>
                                <p class="fw-normal">Item description</p>
                            </div>
                        </div>
                        <div class="col-2">
                            <input type="number" class="form-control" id="inputQuantity">
                        </div>
                        <div class="col-2 align-self-center">
                            <div>
                                <h6 class="text-center">Sub Total</h6>
                                <p class="text-center text-success fw-bold">RM 7.90</p>
                            </div>
                        </div>
                        <div class="col-1 align-self-center">
                            <input type="checkbox" name="" id="" class="">
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-outline-dark">Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-1">
        <div class="edit d-flex justify-content-center" style="margin-top: 7px;">
            <button type="button" class="btn btn-outline-danger buttonsquare" style="border-radius: 25px;" id="removeitemforwishlist">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
              <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
            </svg>
          </button>
        </div>
    </div>

</div>

<div class="row">
    <div class="center m-3">
        <button type="button" class="btn btn-outline-success" id="buttonmodal" data-bs-toggle="modal" data-bs-target="#AddName" style="width: 30%;">
            <strong>+</strong> Create List
          </button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="AddName" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="staticBackdropLabel">List Name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="text-align: center;">
                    <input type="text" placeholder="Add a name" style="text-align: center;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="staticBackdropLabel">List Name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="text-align: center;">
                    <input type="text" placeholder="Edit list name" style="text-align: center;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

          <?php 

          include("../includes/footer.php")

        ?>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
      crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>

</html>