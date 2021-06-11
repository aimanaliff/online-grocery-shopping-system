<?php 

include("../includes/header.php");
include("../functions/listmethod.php");
include("../includes/db.php");

?>
<button type="button" class="btn rounded-circle" id="scrollUp" onclick="goUp()">
    <!-- Go Up Button -->
    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="46" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
        <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
    </svg>
</button>
<div id="s" class="container-xl mt-5 mb-5" style="background-color: white;">

    <div class="row mb-5" style="background-color: #ED7D31;">
        <h3 style="text-align: center;" class="py-3 rounded-3">&nbsp&nbsp&nbsp&nbsp&nbspShopping List</h3>
        
    </div>
    <?php 
    $id= $_SESSION['user'];
    $query = "SELECT * FROM listname where id=$id";
    $run_query = mysqli_query($db, $query);
    $count = mysqli_num_rows($run_query);
    if($count == 0){

    ?>
    <h3 style="text-align: center; color:lightgray;" class="py-3 rounded-3" >&nbsp&nbsp&nbsp&nbsp&nbspNo List Created</h3>

    <?php
    }
    ?>



        <?php 
                list1();
            
        ?>

    <div class="row">
        <div class="center m-3">
            <button type="button" class="btn btn-outline-success" id="buttonmodal" data-bs-toggle="modal" data-bs-target="#AddName" style="width: 30%;">
                <strong>+</strong> Create List
            </button>
        </div>
        <!-- Modal -->
        <form method="post" enctype="multipart/form-data">

        <div class="modal fade" id="AddName" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title" id="staticBackdropLabel">List Name</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="text-align: center;">
                        <input type="text" class="form-control" name="listnam" placeholder="Add a name" style="text-align: center;" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="saves" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
        </form>


    

    <?php 
        if(isset($_POST['saves'])){
            $listnam = $_POST['listnam'];
            $id  =  $_SESSION['user'];

            $insert_product = "insert into listname (ListName,id)
                               values ('$listnam','$id')";

            $run_product = mysqli_query($con,$insert_product);

            if($run_product){
                // echo "<script>alert('New List Name Created')</script>";
                echo "<script>window.open('list1.php?id=$id','_self')</script>";
            }
            else{
                // echo "<script>alert('Product not inserted succesfully')</script>";
            }

        } 
    
    
    ?>

</div>

</div>

          <?php 

          include("../includes/footer.php")

        ?>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
      crossorigin="anonymous"></script>
      <script src="../nyumscript.js"></script>
  
    

  </body>

</html>