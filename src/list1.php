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

        <div class="modal fade" id="AddName" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header text-center">
                        <h5 class="modal-title" id="staticBackdropLabel">List Name</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" >
                        <input id="nama" type="text" class="form-control" name="listnam" placeholder="Add a name"  required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" onclick="insert()" name="saves" class="btn btn-primary form-control">Save</button>
                        <button type="button" class="btn btn-secondary form-control" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


    

    <?php 
        $id  =  $_SESSION['user'];
    
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
    <script>
    function insert(){
        console.log("asd");
        var listname = document.querySelectorAll("#nama");
        var id = <?php echo $id ;?>;
        if(listname[0].value != ""){
            $.ajax({
                type:"post",
                cache:false,
                url:"../functions/newlistname.php",
                data:{
                    listnam:listname[0].value,
                    id:id
                },
                success:function(response){
                    if(response){
                        Swal.fire(
                            'Added!',
                            'New list name inserted',
                            'success',
                            ).then((result) =>{
                                if(result.isConfirmed){
                                    location.reload();
                                } else {
                                    location.reload();
                                }
                        })
                    } else{
                        alert('not succesfully');
                        location.reload();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown){
                    console.log(textStatus, errorThrown);
                }
            });
        }
        
    }

    </script>
    

  </body>

</html>