<?php 

include("../includes/db.php")


?>

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

    <title>Admin Page</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <!-- Our Custom CSS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="admin.css?v=<?php echo time();?>">

    <!-- Font Awesome JS -->
    <!-- <script src="https://kit.fontawesome.com/1f0cb49d65.js" crossorigin="anonymous"></script> -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>

    <body>

        <div class="wrapper">
            <!-- Sidebar Holder -->

            <nav id="sidebar">
                <div class="sidebar-header">
                <a href="../src/index.php"><img src="../img/nyumnyumlogo.png" alt="logo" width="150" class="mx-2"></a>
                </div>

                <ul class="list-unstyled components">
                    <li>
                        <a href="admin.php" class="text">
                            <i class="fas fa-cart-plus"></i>&nbsp&nbspInsert Product</a>
                    </li>

                    <li class="active">
                        <a href="edit.php">
                            <i class="fas fa-edit"></i>&nbsp&nbspProduct Management</a>
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
                        <h4 class="align-items-center">Manage Products</h4>
                    </div>
                </nav>



                <div class="container">
                    <div class="mb-4">
                        <select class="form-select" style="border-radius: 5px 5px 5px 5px;" onchange="javascript:handleSelect(this)" >
                            <option selected>Select a Category</option>
                            <?php 
                                $query = "SELECT * FROM product_categories";
                                $run_query = mysqli_query($con,$query);

                                while ($row_product = mysqli_fetch_array($run_query)) {
                                    $p_cat_id = $row_product['p_cat_id'];
                                    $p_cat_title = $row_product['p_cat_title'];

                                ?>

                            
                                    <option value="<?= $p_cat_id; ?>"><?= $p_cat_title;?></option>
                                <?php
                                }


                            ?>
                            
                        </select>
                    </div>
                    <?php 
                    
                    if(isset($_GET['p_cat_id'])){
                        
                        $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
                        $per_page = 10;
                        $start_from = ($page-1) * $per_page;
                        $cat_id = $_GET['p_cat_id'];
                        $query = "SELECT * FROM product where p_cat_id='$cat_id' LIMIT $start_from,$per_page";
                        $query1 = "SELECT * FROM product where p_cat_id='$cat_id'";
                        $run_query = mysqli_query($con,$query);
                        $run_query1 = mysqli_query($con,$query1);
                        $total_records = mysqli_num_rows($run_query1);
                        $total_pages = ceil($total_records / $per_page);
                    ?>
                    <form method='post' >
                    <div class="table-responsive mb-4 ">
                        <table class="table table-striped table-hover table-bordered ">
                            <thead class="table-dark">
                                <tr class="">
                                    <th >Product Images</th>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Product Category</th>
                                    <th>Product Quantity</th>
                                    <th>Sale</th>
                                    <th>Discount (%)</th>
                                    <th>Product Description</th>
                                    <th></th>
                                    <th></th>
                                </tr>

                            </thead>
                            <tbody>
                            <?php
                                

                                while ($row_product = mysqli_fetch_array($run_query)) {
                                    global $product_id;
                                    $product_id = $row_product['product_id'];
                                    $p_cat_id = $row_product['p_cat_id'];
                                    $product_name = $row_product['product_name'];
                                    $product_price = $row_product['product_price'];
                                    $product_img = $row_product['product_img'];
                                    $product_quantity = $row_product['product_quantity'];
                                    $product_desc = $row_product['product_desc'];
                                    $sale = $row_product['sale'];
                                    $percentage = $row_product['percentage'];
                                    if($sale == 1){
                                        $sale="SALE";
                                    } else{
                                        $sale="No sale";
                                    }
                                ?>
                                <tr id="2<?=$product_id;?>"class="table align-middle">
                                <td><img src="../admin_area/product_images/<?=$product_img;?>" class="img-thumbnail img-fluid" alt="" width="40%" height="20%"></td>
                                    <td>&nbsp<?= $product_name ?>
                                    </td>
                                    
                                    <td><?= $product_price ?></td>
                                    <td><?= $p_cat_id ?></td>
                                    <td><?= $product_quantity ?></td>
                                    <td><?= $sale ?></td>
                                    <td><?= $percentage ?></td>
                                    <div class="d-flex align-items-stretch">
                                        <td><?= $product_desc ?></td>
                                    </div>
                                    
                                    <td>
                                        <a href="editInside.php?p_cat_id=<?=$p_cat_id;?>&product_id=<?=$product_id;?>"><button type="button" class="btn btn-outline-danger " >
                                            Edit
                                          </button></a>
                                        
                                    </td>
                                    <td>
                                    <button class="btn btn-primary" onclick="dele<?=$product_id?>()" name="but_delete" id="del<?=$product_id?>" type="button">Delete</button>
                                    </td>
                                </tr>
                                <script>
                                function dele<?=$product_id?>(){
                                    console.log("asda");
                                    Swal.fire({
                                        title: 'Are you sure?',
                                        text: "",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Yes, delete it!',
                                        }).then((result) => {
                                        if (result.isConfirmed) {
                                            var product = <?php echo $product_id ;?>;
                                            $.ajax({
                                                type:"post",
                                                cache:false,
                                                url:"../admin_area/delete.php",
                                                data:{
                                                    product:product
                                                },
                                                success:function(response){
                                                    if(response){
                                                        Swal.fire(
                                                        'Deleted!',
                                                        'Product has been deleted.',
                                                        'success',
                                                        ).then((result) =>{
                                                            if(result.isConfirmed){
                                                                location.reload();
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
                                    })
                                    console.log(<?=$product_id?>);
                                }
                                
                                </script>
                                
                                
                                
                                <div class="modal fade" id="staticBackdrop<?=$product_id;?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Understood</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php
                                }
                            ?>
                            
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        
                    </div>
                    </form>
                    <?php 
                    
                    ?>
                    <nav aria-label="Product page navigation">
                    <ul class="pagination justify-content-center mb-0 mt-4">
                    <?php 
                    if($page >= 2) {   
                        echo '
                        <li class="page-item">
                            <a class="page-link" href="../admin_area/edit.php?page='.($page-1).'&p_cat_id='.$cat_id.'">
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
                    
                        <li class="page-item" aria-current="page"><a class="page-link" href="../admin_area/edit.php?page='.$i.'&p_cat_id='.$cat_id.'">
                        '.$i.'</a></li>
                    
                        '
                        ;
                    }

                    if ($page < $total_pages) {
                        echo '
                        <li class="page-item">
                            <a class="page-link active" href="../admin_area/edit.php?page='.($page+1).'&p_cat_id='.$cat_id.'">
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
                    
                    ?>
                    </ul>
                    </nav>
                </div>
<?php }?>





            </div>
        </div>
        
       

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
        <script type="text/javascript">
        function handleSelect(elm)
        {
            window.location = "?p_cat_id="+elm.value;
        }

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