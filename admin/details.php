<?php
session_start();
if(!isset($_SESSION['u_email'])){
  header('location: login.php');
}
if($_SESSION['role'] != 'admin'){
  header('location: login.php');
}
     include('includes/main_header.php');
     include('includes/class-autoload.inc.php');
?>


<style>

    .details-img-resize {

    height: 450px;
    width: 100%;
    object-fit: cover;
    object-position: top center;
}

@media(max-width: 991px){
  .details-img-resize {
    height: 250px;
    width: 100%;
    object-fit: cover;
    object-position: center center;
}
}

.image-resize {
    height: 150px;
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


        <!-- The Modal -->
  <div class="modal fade" id="Model">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Delete Scholar?</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <?php $scholar = new scholars (); ?>       
        <?php if($scholar->getScholar($id = $_GET['scholar_id'])) : ?>
            <?php foreach($scholar->getScholar($id = $_GET['scholar_id']) as $scholar) : ?>
         <div class="modal-body"> Are You Sure to Delete Scholar <?= $scholar['scholar_name']; ?> ? </div>

         <?php endforeach; ?>
          <?php endif; ?>
      
        
       <!-- Modal footer -->
        <div class="modal-footer">
        <form action="code.php" method="POST">
          <input type="hidden" name="scholar_delete_id" value="<?= $scholar['scholar_id']?>">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No, cancel</button>
          <button name="delete_scholar" class="btn btn-danger btn-user">
                  Yes, Delete
                </button>
                
        </form>
        </div>
      </div>
    </div>
  </div>

  <!-- The file Modal -->
  <div class="modal fade" id="fileModel">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Scholar Files Registration</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form class="user" method="POST" action="code.php" enctype="multipart/form-data">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="file_title" class="form-control form-control-user" placeholder="File Title" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="file_desc" class="form-control form-control-user"  placeholder="File Desc"required>
                  </div>
                </div>
                   <!--GETTING USER ID-->
                   
   
  <div class="form-group">
  <select name="scholar_u_id" class="form-control">
    <option>Select User</option>

    <?php $user = new users (); ?>       
        <?php if($user->getUsers()) : ?>
            <?php foreach($user->getUsers() as $user) : ?>

          <option value="<?= $user['u_id']; ?>"><?= $user['u_fullname']; ?></option>
          <?php endforeach; ?>
                <?php endif; ?>
             </select>
        </div>
  <!--GETTING USER ID END HERE-->
                 <div class="form-group">
                <label class="text-primary">Upload Scholar File Image</label>
                  <input type="file" name="file_image" class="form-control" id="file" onchange="return fileValidation()"> 
                </div>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="hidden" name="scholar_f_id" value="<?= $scholar['scholar_id']; ?>">
          <input type="hidden" name="scholar_f_id" value="<?= $scholar['scholar_id']; ?>">
          <button name="Add_file" class="btn btn-primary btn-user">
                  Add File
                </button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- end of file modal -->
 


        <?php include('includes/header.php'); ?>

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

     




<div class="col-md-8"> <!--col-md-9 begin-->
            
 
<?php $scholar = new scholars (); ?>       
        <?php if($scholar->getScholar($id = $_GET['scholar_id'])) : ?>
            <?php foreach($scholar->getScholar($id = $_GET['scholar_id']) as $scholar) : ?>
  
            <div class="card shadow"> <!--card begin-->
            <div class="card-header">Scholar Details <button class="btn btn-link float-right"><i class="fa fa-bars"></i></button></div> 
                <div class="card-img-fluid"> <!--card-img-fluid begin-->
                 <img class="details-img-resize " src="upload/scholar/<?= $scholar['scholar_img'];?>" alt="" width>
                </div> <!--card-img-fluid finish-->
                <div class="card-title m-3"> <!--card-title begin-->
                    
                  <i class="text-primary">Name:</i> <?= $scholar['scholar_name']; ?><br><hr>
                  <i class="text-primary">Location:</i> <?= $scholar['scholar_location']; ?><br><hr>
                  <i class="text-primary">Date Created:</i> <?= $scholar['date']; ?><br><hr>
                  <i class="text-primary">Desc:</i> <?= $scholar['scholar_desc']; ?>
                
                </div> <!--card-title finish-->
                
                 <div class="card-footer"> 

                 <!--delet btn-->
                 <button type="button" data-toggle="modal" data-target="#Model" class="m-1 btn btn-danger btn-circle btn-sm float-right"><i class="fa fa-trash"></i>
                 </button>

                  <!--edit btn-->
                <form action="scholar_edit.php" method="post">
        <input type="hidden" name="scholar_edit_id" value="<?= $scholar['scholar_id']; ?>">
        <button type="submit" name="scholar_update" class=" m-1 btn btn-success btn-circle btn-sm float-right"><i class="fas fa-edit"></i></button>
        </form>

            </div>    
         </div> <!--card shadow finish-->  

         <?php endforeach; ?>
                <?php endif; ?>
      
<hr>
<div class="card">

<div class="card-header">

<span class="text-dark"> <i class="fa fa-book "></i> Scholar Books</span>  
<button class="m-1 btn btn-success btn-circle btn-sm float-right" data-toggle="modal" data-target="#fileModel"><i class="fas fa-folder-plus"></i></button>



</div>

</div>


 <div class="row"> <!--row begin..-->
 
 <?php $file = new files (); ?>       
        <?php if($file->getScholarFile($id = $_GET['scholar_id'])) : ?>
            <?php foreach($file->getScholarFile($id = $_GET['scholar_id']) as $file) : ?>

         <div class="col-md-4 col-sm-12 col-12"> <!--col-md-6 2 begin..-->
    <a href="more.php?file_id=<?= $file['file_id'];?>&scholar_id=<?= $_GET['scholar_id'];?>">
        <div class="card shadow mb-3 mt-3"> <!--card shadow begin-->
            <div class="card-img-fluid">
            
            <?php
            if($file['file_image'] == ""){
                ?>
               <img class="image-resize" src="upload/files/default.jpg">
               <?php 
            }else{
                 ?>
                 <img class="image-resize" src="upload/files/<?= $file['file_image']?>">
            <?php 
            }
            ?>
            
           </div> 
           </a>
                <div class="card-footer">
                    <span class="text-dark"></span>
                    <?= $file['file_title'] ?>
                     <!--delet btn-->
                </div>
        </div> <!--card shadow finish-->
    </div><!--col-md-6 2 finish--> 
               
         <?php endforeach; ?>
         <?php else : ?>
          <h1>No file found</h1>
          <?php endif; ?>

</div>


</div><!--col-md-9 finish-->



      <!-- /.container-fluid -->
</div>
      <!-- End of Main Content -->
<?php include('includes/footer.php');?>

</div>
    
    <!-- End of Content Wrapper -->
</div>
  <!-- End of Page Wrapper -->

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
   <!-- The Modal -->
   <div class="modal fade" id="Mode2">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Delete File?</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->

         <div class="modal-body"> Are You Sure to Delete File <?= $file['file_id'];?> </div>
      
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>

          <form action="code.php" method="post">
        <input type="text" name="delete_id" value="<?= $file['file_id'];?>"> 
        <input type="hidden" name="scholar" value="<?= $scholar['scholar_id']; ?>"> 
        <button type="submit" name="delete_file" class="btn btn-danger btn-user"></i> Yes, Delete</button>
        </form>
      </div>

    </div>
  </div>
</div>