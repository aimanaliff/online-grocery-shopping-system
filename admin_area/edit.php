<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Collapsible sidebar using Bootstrap 4</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Bootstrap CSS CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous"> -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="admin.css">

        <!-- Font Awesome JS -->
        <!-- <script src="https://kit.fontawesome.com/1f0cb49d65.js" crossorigin="anonymous"></script> -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    </head>

    <body>

        <div class="wrapper">
            <!-- Sidebar Holder -->

            <nav id="sidebar">
                <div class="sidebar-header">
                    <img src="../img/nyumnyumlogo.png" alt="logo" width="150" class="mx-2">
                </div>

                <ul class="list-unstyled components">
                    <li>
                        <a href="admin.php" class="text">
                            <i class="fas fa-cart-plus"></i>&nbsp&nbspInsert Product</a>
                    </li>

                    <li class="active">
                        <a href="edit.php">
                            <i class="fas fa-edit"></i>&nbsp&nbspEdit</a>
                    </li>

                    <li>
                        <a href="#"><i class="fas fa-eye"></i>&nbsp&nbspView</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-power-off"></i>&nbsp&nbspLogout

                        </a>
                    </li>
                </ul>

            </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <button type="button" id="sidebarCollapse" class="navbar-btn">
                            <i class="fas fa-times-circle"></i>
                        </button>
                        <h4 class="align-items-center">Edit Products</h4>
                    </div>
                </nav>



                <div class="container">
                    <div class="mb-4">
                        <select class="form-select" style="border-radius: 5px 5px 5px 5px;">
                            <option selected>Select a Category</option>
                            <option value="1">Food Essentials</option>
                            <option value="2">Chilled & Frozen</option>
                            <option value="3">Beverages</option>
                            <option value="4">Cookies & Snacks</option>
                            <option value="5">Bakery</option>
                        </select>
                    </div>
                    <div class="table-responsive mb-4 ">
                        <table class="table table-striped table-hover table-bordered ">
                            <thead class="table-dark">
                                <tr class="">
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Product Category</th>
                                    <th>Product Quantity</th>
                                    <th style="width:25px;">Product Description</th>
                                    <th></th>
                                    <th></th>
                                </tr>

                            </thead>
                            <tbody>
                                <tr class="table">
                                    <td>Banana</td>
                                    <td>RM 1.20</td>
                                    <td>Fruits</td>
                                    <td>15</td>
                                    <div class="d-flex align-items-stretch">
                                        <td>Lorem</td>
                                    </div>
                                    <td>
                                        <div>
                                            <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-danger " data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Edit
                                          </button>
                                    </td>
                                </tr>
                                <tr class="table ">
                                    <td>Banana</td>
                                    <td>RM 1.20</td>
                                    <td>Fruits</td>
                                    <td>15</td>
                                    <td>lorem</td>
                                    <td>
                                        <div>
                                            <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-danger " data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Edit
                                          </button>
                                    </td>
                                </tr>
                                <tr class="table ">
                                    <td>Banana</td>
                                    <td>RM 1.20</td>
                                    <td>Fruits</td>
                                    <td>15</td>
                                    <td>lorem</td>
                                    <td>
                                        <div>
                                            <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-danger " data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Edit
                                      </button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary me-md-2" type="button">Delete</button>
                    </div>
                </div>




            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>

                    </div>
                    <div class="modal-body">
                        <label class="col-auto">Product Name</label>
                        <input name="product_title" placeholder="Banana" type="text" class="form-control" style="border-radius: 5px 5px 5px 5px;" required>
                        <label class="col-auto">Product Price</label>
                        <input name=" product_title " placeholder="RM1.20" type="text" class="form-control" style="border-radius: 5px 5px 5px 5px;" required>
                        <label class="col-auto">Product Category</label>
                        <select class="form-select" style="border-radius: 5px 5px 5px 5px;" aria-label="Default select example">
                            <option value="">Select a Category</option>
                            <option value="">Food Essentials</option>
                            <option value="">Chilled & Frozen</option>
                            <option value="">Beverages</option>
                            <option value="">Cookies & Snacks</option>
                            <option value="">Bakery</option>
                        </select>
                        <label class="col-auto">Product Quantity</label>
                        <input name=" product_stock " placeholder="15" type="text" class="form-control" style="border-radius: 5px 5px 5px 5px;" required>
                        <!-- <label class="col-auto">Shocking Sale</label> -->

                        <label class="col-auto">Product Description</label>
                        <textarea name="product_desc" placeholder="lorem" cols="19" rows="6" class="form-control" style="border-radius: 5px 5px 5px 5px;"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Update changes</button>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script src="js/tinymce/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: 'textarea'
            });
        </script>


        <script type="text/javascript ">
            $(document).ready(function() {
                $('#sidebarCollapse').on('click', function() {
                    $('#sidebar').toggleClass('active');
                    $(this).toggleClass('active');
                });
            });
        </script>


    </body>

    </html>

</html>
</body>

</html>