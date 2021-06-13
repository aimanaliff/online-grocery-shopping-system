<?php 

include("../includes/db.php")

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Admin Page</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="admin.css?v=<?php echo time();?>">

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
                <li class="active">
                    <a href="#homeSubmenu" class="text">
                        <i class="fas fa-cart-plus"></i>&nbsp&nbspInsert Product</a>
                </li>

                <li>
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
                    <h4 class="align-items-center">Insert Products</h4>
                </div>
            </nav>

            <div class="container">
                <form method="post" enctype="multipart/form-data">
                    <div class=" mb-3">
                        <label class="col-auto">Product Name</label>
                        <input name="product_name" type="text" class="form-control" style="border-radius: 5px 5px 5px 5px;" required>
                    </div>
                    <div class="mb-3">
                        <label class="col-auto">Product Category</label>
                        <select name="product_categories" class="form-select" style="border-radius: 5px 5px 5px 5px;" aria-label="Default select example">
                            <option value="">Select a Category</option>
                            
                            <?php 

                                $get_p_cat = "select * from product_categories";
                                $run_p_cat = mysqli_query($con,$get_p_cat);
                               

                                while( $row_cat = mysqli_fetch_array($run_p_cat)){

                                    $p_cat_id = $row_cat['p_cat_id'];
                                    $p_cat_title = $row_cat['p_cat_title'];

                                    echo "
                                    
                                    <option value='$p_cat_id'>$p_cat_title</option>
                                    
                                    
                                    ";
                                }
                            
                            
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="col-auto">Sales</label>
                        <select onclick="myFunction()" id="sale" name="sale" class="form-select" style="border-radius: 5px 5px 5px 5px;" aria-label="Default select example">
                            <option value="">Select</option>
                            <option  value="1">Sale</option>
                            <option value="2">No Sale</option>
                        </select>
                    </div>
                    <div class="mb-3" id="myDIV" style="display:none;">
                        <label class="col-auto">Discount Range</label>
                        <input name="percentage" type="range" min="1" max="100" value="50" class="slider" id="myRange">
                        <p>Value: <span id="demo"></span></p>
                    </div>
                    <div class="mb-3">
                        <label class="col-auto">Product Price</label>
                        <input name=" product_price" type="text" class="form-control" style="border-radius: 5px 5px 5px 5px;" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="col-auto">Product Image</label>
                        <input name="product_img" type="file" class="form-control" style="border-radius: 5px 5px 5px 5px;">
                    </div>
                    <div class="mb-3">
                        <label class="col-auto">Product Quantity</label>
                        <input name="product_stock" type="text" class="form-control" style="border-radius: 5px 5px 5px 5px;" required>
                    </div>
                    <div class="mb-3">
                        <label class="col-auto">Product Description</label>
                        <textarea name="product_desc" cols="19" rows="6" class="form-control" style="border-radius: 5px 5px 5px 5px;"></textarea>
                    </div>
                    <input name="submit" value="Insert Product" type="submit" class="btn btn-primary form-control">
                </form>
            </div>



        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js " integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo " crossorigin="anonymous "></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js " integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ " crossorigin="anonymous "></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js " integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm " crossorigin="anonymous "></script>
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

        var slider = document.getElementById("myRange");
        var output = document.getElementById("demo");
        output.innerHTML = slider.value; // Display the default slider value

        // Update the current slider value (each time you drag the slider handle)
        slider.oninput = function() {
        output.innerHTML = this.value;
        }

        function myFunction() {
            var x = document.getElementById("myDIV");
            var y = document.getElementById("sale").value;
            if(y == 1){
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
            
        }  
    </script>

    <?php 
    
        if(isset($_POST['submit'])){
            $product_name = $_POST['product_name'];
            $product_categories = $_POST['product_categories'];
            $product_price = $_POST['product_price'];
            $product_desc = $_POST['product_desc'];
            $product_stock = $_POST['product_stock'];

            $sale = $_POST['sale'];
            if($sale == 1){
                $percentage = $_POST['percentage'];
            } else{
                $percentage = '';
            }

            $product_img = $_FILES['product_img']['name'];

            $temp_name1=$_FILES['product_img']['tmp_name'];

            move_uploaded_file($temp_name1,"product_images/$product_img");

            $insert_product = "insert into product (p_cat_id,date,product_name,sale,percentage,product_price,product_img,product_quantity,product_desc)
                               values ('$product_categories',NOW(),'$product_name','$sale','$percentage','$product_price','$product_img','$product_stock','$product_desc')";

            $run_product = mysqli_query($con,$insert_product);

            if($run_product){
                echo "<script>alert('Product has been inserted succesfully')</script>";
                echo "<script>window.open('admin.php','_self')</script>";
            }
            else{
                echo "<script>alert('Product not inserted succesfully')</script>";
            }

        }
    
    
    
    
    
    
    ?>


</body>

</html>

</html>