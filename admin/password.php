
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

     <div class="card shadow my-3">
    <div class="card-header text-success">Update Password</div>
                <div class="card-body">

                <?php $user = new users (); ?>       
            <?php if($user->getUser($_SESSION['u_id'])) : ?>
                  <?php foreach($user->getUser($_SESSION['u_id']) as $user) : ?>
            
                <form action="code.php" method="POST" enctype="multipart/form-data">
       <input type="hidden" name="edit_id" value="<?= $_SESSION['u_id']; ?>">
        <div class="form-group">
          <label for="">New Password</label>
          <input type="password" class="form-control" placeholder="Enter New Password" name="newpass">
        </div>
        <div class="form-group">
          <label for="">Repeat Password:</label>
          <input type="password" class="form-control" placeholder="Repeat Password" name="repeatpass">
        </div>
       <button type="reset" class="btn btn-danger">Clear</button>
    <button type="submit" name="update_user_pass" class="btn btn-primary">Update</button>
 </form>

 <?php endforeach; ?>
    <?php endif; ?>
 
    </div><!-- card-body ends-->
     </div><!-- card shadow mt-3 ends-->


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     <?php include('includes/footer.php');?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->


  <?php include('includes/script.php'); ?>