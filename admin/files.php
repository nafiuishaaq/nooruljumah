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


      
  <div class="container">
 
 

  <!-- The Modal -->
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
                
<!--GETTING SCHOLAR ID-->
              
  <div class="form-group">
      <select name="scholar_f_id" class="form-control" required>
        <option>Select Scholar</option>

        <?php $scholar = new scholars (); ?>       
                    <?php if($scholar->getScholars()) : ?>
                        <?php foreach($scholar->getScholars() as $scholar) : ?>

              <option value="<?= $scholar['scholar_id']; ?>"><?= $scholar['scholar_name']; ?></option>
             <?php endforeach; ?>
                <?php endif; ?>
      
            </select>
          </div>

<!--GETTING SCHOLAR ID END HERE-->


         <!--GETTING USER ID-->


    <div class="form-group">
    <select name="scholar_u_id" class="form-control">
      <option>Select User</option>

      <?php $user = new users (); ?>       
            <?php if($user->getUsers()) : ?>
                  <?php foreach($user->getUsers() as $user) : ?>
            <option value="<?= $user['u_id']; ?>"><?= $user['u_fullname']; ?></option>
            <?php endforeach; ?>
                      <?php else : ?>
                    <h1>No data found</h1>
                <?php endif; ?>
               </select>
          </div>
          

    <!--GETTING USER ID END HERE-->
        
    <div class="form-group">
  <label class="text-primary">Upload Scholar File Image</label>
    <input type="file" name="file_image" class="form-control"> 
  </div>

</div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button name="Add_file" class="btn btn-primary btn-user">
                  Add File
                </button>
        </div>
        </form>
      </div>
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


  
<div class="container">


<div class="row">

 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-image"></i>Files Collection</h3>
								Click On an Image to Edit or Delete the File
                    <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-sm btn-primary mb-2 float-right" data-toggle="modal" data-target="#fileModel">
  <i class="fa fa-user-plus"> Add</i>
  </button>
                
							</div>
								
							<div class="card-body">
								<div class="row">

        <?php $file = new files (); ?>       
           <?php if($file->getFiles ()): ?>
              <?php foreach($file->getFiles() as $file) : ?>

									<a data-fancybox="gallery" href="details.php?file_id=<?= $file['file_id'];?>" class="img-fluid m-1">
                      <img data-toggle="tooltip" title="<?= $file['file_title']?>" src="upload/files/<?= $file['file_image'];?>" width="150px;" height="150px;" alt="">
									</a>

              <?php endforeach; ?>
            <?php else : ?>
                  <h1>No file found</h1>
        <?php endif; ?>
								
								</div>

              
								
							</div>														
						</div><!-- end card-->					
                    </div>

</div>
 </div>
        
      <!-- /.container-fluid -->
</div>
      <!-- End of Main Content -->
<?php include('includes/footer.php');?>

</div>
    
    <!-- End of Content Wrapper -->
</div>
  <!-- End of Page Wrapper -->

  
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<?php include('includes/script.php'); ?>