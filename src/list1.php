<?php 

include("../includes/header.php");
include("../functions/listmethod.php");

?>

<div class="container-xl mt-4 mb-4" style="background-color: white;">

    <div class="row mb-5" style="background-color: #ED7D31;">
        <h3 style="text-align: center;" class="py-3 rounded-3">Shopping List</h3>
    </div>

    <?php 
            
            list1();
        
    ?>

    <div class="row">
        <form class="center m-3">
            <button type="button" class="btn btn-outline-success" id="buttonmodal" data-bs-toggle="modal" data-bs-target="#AddName" style="width: 30%;">
                <strong>+</strong> Create List
            </button>
        </div>
        <!-- Modal -->
        <!-- <form method="POST"> -->
        <div class="modal fade" id="AddName" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <form method="POST">
                    <div class="modal-header text-center">
                        <h5 class="modal-title" id="staticBackdropLabel">List Name</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="text-align: center;">
                        <input type="text" placeholder="Add a name" style="text-align: center;" name="listname">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit3" class="btn btn-primary">Save</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <!-- <form> -->
        

        <?php 
            
            if(isset($_POST['submit3'])){
                // $sql = 'SELECT * FROM listname';
                // $result = mysqli_query($db, $sql);
                // $listname = mysqli_fetch_array($result);
                echo $_POST['listname'];
            }else{
                echo 'none';
            }
        
        ?>

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