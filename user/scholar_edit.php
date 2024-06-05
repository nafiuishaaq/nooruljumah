
<?php
  session_start();
  if(!isset($_SESSION['u_email'])){
    header('location: ../admin/login.php');
  }
  if($_SESSION['role'] != 'user'){
    header('location: ../admin/login.php');
  }
     include('include/main_header.php'); 
     include('include/class-autoload.inc.php');

?>


<!-- Page Wrapper -->
  <div id="wrapper">

   <?php include('include/navbar.php');?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php include('include/topbar.php') ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
        <?php include('include/header.php'); ?>
<div class="card shadow"><!--card shadow Begin-->
<div class="card-header py-3  text-info">Edit Scholar Info</div>
<div class="card-body">
 

<?php $scholar = new scholars (); ?>       
        <?php if($scholar->getScholar($scholar_id = $_POST['scholar_edit_id'])) : ?>
            <?php foreach($scholar->getScholar($scholar_id = $_POST['scholar_edit_id']) as $scholar) : ?>
                        
     <form action="code.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <input type="hidden" name="edit_scholar_id" value="<?= $scholar['scholar_id'] ?>">
          <label for="">Scholar Name:</label>
          <input type="text" name="edit_scholar_name" value="<?= $scholar['scholar_name'] ?>" class="form-control" >
        </div>
        <div class="form-group">
          <label for="">Scholar Location:</label>
          <input type="text" class="form-control" value="<?= $scholar['scholar_location'] ?>"  name="edit_scholar_location">
        </div>
        <div class="form-group">
        <label for="">Scholar Description:</label>
        <textarea class="form-control" name="edit_scholar_desc" cols="20" rows="5"><?= $scholar['scholar_desc'];?></textarea>
        </div>
       <a href="details.php?scholar_id=<?= $scholar['scholar_id'] ?>" class="btn btn-danger">Cancel</a>
    <button type="submit" name="update_scholar_btn" class="btn btn-primary">Update</button>
 </form>
 <?php endforeach; ?>
 <?php endif; ?>
 
  
</div>
</div><!--card shadow Finish-->
</div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     <?php include('include/footer.php');?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

<?php

    include('include/script.php');

?>


