
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

   <?php include('include/navbar.php');?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php include('include/topbar.php') ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
        <?php include('include/header.php'); ?>
         
    

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
    <div class="card-header text-success">Update Profile</div>
                <div class="card-body">

        <?php $user = new users (); ?>       
            <?php if($user->getUser($_SESSION['u_id'])) : ?>
                  <?php foreach($user->getUser($_SESSION['u_id']) as $user) : ?>
            
              
                <form action="code.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
        <input type="hidden" name="edit_id" value="<?= $user['u_id'] ?>">
          <label for="">Name:</label>
          <input type="text" name="edit_fullname" value="<?= $user['u_fullname'] ?>" class="form-control" >
        </div>
        <div class="form-group">
          <label for="">Username:</label>
          <input type="text" class="form-control" value="<?= $user['u_username'] ?>"  name="edit_username">
        </div>
        <div class="form-group">
          <label for="">Phone Number:</label>
          <input type="text" class="form-control" value="<?= $user['u_phone'] ?>"  name="edit_phone">
        </div>
        <div class="form-group">
          <label for="">Email:</label>
          <input type="text" class="form-control" value="<?= $user['u_email'] ?>"  name="edit_email">
        </div>
       <!-- <a href="details.php?scholar_id=<?= $scholar['scholar_id'] ?>" class="btn btn-danger">Cancel</a> -->
    <button type="submit" name="update_user" class="btn btn-primary float-right">Update</button>
 </form>

 <?php endforeach; ?>
    <?php endif; ?>

    
    </div><!-- card-body ends-->
     </div><!-- card shadow mt-3 ends-->



        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     <?php include('include/footer.php');?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->


  <?php include('include/script.php'); ?>