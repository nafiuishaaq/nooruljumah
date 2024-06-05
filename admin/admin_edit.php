
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
<div class="card shadow"><!--card shadow Begin-->
<div class="card-header py-3  text-info">Edit Admin Profile</div>
<div class="card-body">
 
<?php $user = new users (); ?>       
        <?php if($user->getUser($user_id = $_POST['edit_id'])) : ?>
            <?php foreach($user->getUser($user_id = $_POST['edit_id']) as $user) : ?>

        <form action="code.php" method="post">
    <div class="form-group">

      <input type="hidden" name="edit_id" value="<?= $user['u_id']; ?>">
      <label for="">Fullname:</label>
      <input type="text" name="edit_name" value="<?= $user['u_fullname'] ?>" class="form-control" >
    </div>
    <div class="form-group">
      <label for="">Username:</label>
      <input type="text" class="form-control" value="<?= $user['u_username'] ?>" name="edit_username">
    </div>
    <div class="form-group">
      <label for="">Email:</label>
      <input type="text" class="form-control" value="<?= $user['u_email'] ?>"  name="edit_email">
    </div>
     <div class="form-group">
      <label for="">Phone Number:</label>
      <input type="phone" class="form-control" value="<?= $user['u_phone'] ?>" name="edit_phone">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" value="<?= $user['password'] ?>"  name="edit_password">
    </div>
    <div class="form-group row">
                <div class="col-sm-12">
                    <select name="role_edit" class="form-control">
                    <?php if($user['role'] == "admin"){
                      ?>
                      <option value="admin">admin</option>
                      <option value="user">user</option>
                      <?php
                    }else{
                      ?>
                      <option value="user">user</option>
                      <option value="admin">admin</option>
                      <?php
                    } 
                    ?>
                   
                    </select>
                  </div>
            </div>
    

       <a href="admin.php" class="btn btn-danger">Cancel</a>
  
    <button type="submit" name="update_user" class="btn btn-primary">Update</button>
 </form>

  <?php endforeach; ?>
 <?php endif; ?>
  
</div>
</div><!--card shadow Finish-->
</ </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     <?php include('includes/footer.php');?>

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

    include('includes/script.php');

?>


