<?php
session_start();
if(!isset($_SESSION['u_email'])){
  header('location: login.php');
}
if($_SESSION['role'] != 'admin'){
  header('location: login.php');
}
    //  include('includes/db.php');
        include('includes/main_header.php');
        include('includes/class-autoload.inc.php');

?>

<style>
  .image-resize {
    height: 200px;
    width: 100%;
    object-fit: cover;
    object-position: top center;
    }
@media(max-width: 991px){
   .image-resize {
    height: 300px;
    width: 100%;
    }
}
</style>
<!-- Page Wrapper -->
  <div id="wrapper">

   <?php include('includes/navbar.php');?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php include('includes/topbar.php') ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
        <?php include('includes/header.php'); ?>


     

  <!-- The Modal -->
  <div class="modal fade" id="ScholarModel">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Scholar Registration Form</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form class="user" method="POST" action="code.php" enctype="multipart/form-data">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="scholar_name" class="form-control form-control-user" placeholder="Full Name of Scholar" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="scholar_location" class="form-control form-control-user"  placeholder="Scholar Location" required>
                  </div>
                </div>
                 <div class="form-group">
                    <textarea  name="scholar_desc" cols="20" rows="5" class="form-control" required></textarea>
                  </div>

              <div class="form-group">
                  <select name="user_id" class="form-control" required>

                    <option>Select User For Scholar</option>
                     
                  <?php $user = new users (); ?>       
                    <?php if($user->getUsers()) : ?>
                        <?php foreach($user->getUsers() as $user) : ?>
                          <option value="<?= $user['u_id']; ?>"><?= $user['u_fullname'];?></option>
                          <?php endforeach; ?>
                      <?php else : ?>
                    <h1>No data found</h1>
                <?php endif; ?>

                        </select>
                      </div>

                <div class="form-group">
                <label class="text-primary">Upload Scholar Image</label>
                  <input type="file" name="scholar_image" class="form-control" id="file" onchange="return fileValidation()"> 
                </div>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button name="Add_Scholar" class="btn btn-primary btn-user">
                  Add Scholar
                </button>
        </div>
        </form>
      </div>
    </div>
  </div>


<?php
      if(isset($_SESSION['success']) && $_SESSION['success']  !='')
      {
        echo $_SESSION['success'];
        unset($_SESSION['success']);
      }

        if(isset($_SESSION['status']) && $_SESSION['status']  !='')
      {
        echo $_SESSION['status'];
        unset($_SESSION['status']);
      }
      ?>


  <div class="card shadow mt-3"><!-- card shadow mt-3 begin-->
      <div class="card-header text-primary">
                List of Scholars
          <!-- Button to Open the Modal -->
          <button type="button" class="btn btn-sm btn-primary mb-2 float-right" data-toggle="modal" data-target="#ScholarModel">
          <i class="fa fa-user-plus"> Add</i>
          </button>
      </div>
      
  <div class="card-body"><!-- card-body begin-->


  <div class="col-md-12"><!-- col-md-12 begin-->
  <div class="row"> <!-- row begin-->

    <?php $scholar = new scholars (); ?>       
        <?php if($scholar->getScholars()) : ?>
            <?php foreach($scholar->getScholars() as $scholar) : ?>

  <div class="col-sm-12 col-md-4"><!-- col-md-4 begin-->
        <div class="card shadow mb-3"><!--card shadow begin-->  
        <a href="details.php?scholar_id=<?= $scholar['scholar_id'];?>">       
            <div class="card-img-fluid"><!--card-img-fluid begin-->

            <?php
            if($scholar['scholar_img'] == ""){
            ?>
            <img class="image-resize" src="upload/scholar/blog.jpeg">
            <?php 
            }else{
            ?>
            <img class="image-resize" src="upload/scholar/<?= $scholar['scholar_img'];?>" alt="">
            <?php 
            }
            ?>
            </div><!--card-img-fluid ends-->
          </a>
            <div class="card-footer"><!--card-footer begin-->
            <h6 class="text-dark text-center"><?= $scholar['scholar_name']; ?></h6>
            </div><!--card-footer ends-->
              </div><!--card shadow ends--> 
  </div><!-- col-md-4 ends-->

            
                <?php endforeach; ?>
                <?php endif; ?>
      

  </div><!-- row ends-->
   </div><!-- col-md-12 finish-->
    </div><!-- card-body ends-->
     </div><!-- card shadow mt-3 ends-->
        
      <!-- /.container-fluid -->
</div>
      <!-- End of Main Content -->
<?php include('includes/footer.php');?>

</div>
    
    <!-- End of Content Wrapper -->
</div>
  <!-- End of Page Wrapper -->
</div>


<script>
        function fileValidation() {
            var fileInput = 
                document.getElementById('file');
              
            var filePath = fileInput.value;
          
            // Allowing file type
            var allowedExtensions = 
                    /(\.jpg|\.jpeg|\.png|\.gif)$/i;
              
            if (!allowedExtensions.exec(filePath)) {
                alert('Invalid file type');
                fileInput.value = '';
                return false;
            } 
            // else 
            // {
              
                // Image preview
                // if (fileInput.files && fileInput.files[0]) {
                //     var reader = new FileReader();
                //     reader.onload = function(e) {
                //         document.getElementById(
                //             'imagePreview').innerHTML = 
                //             '<img src="' + e.target.result
                //             + '"/>';
                //     };
                      
                //     reader.readAsDataURL(fileInput.files[0]);
                // }
            // }
        }
    </script>

<?php include('includes/script.php'); ?>