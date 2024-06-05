
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
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Admin Registration Form</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form class="user" method="post" action="code.php">
        <div class="modal-body">

      <!--GETTING SCHOLAR ID-->
              
  <div class="form-group">
      <select name="u_scholar_id" class="form-control" required> 
              <option>Select Scholar For User</option>
        <?php $scholar = new scholars (); ?>       
          <?php if($scholar->getScholars()) : ?>
            <?php foreach($scholar->getScholars() as $scholar) : ?>
              <option value="<?= $scholar['scholar_id']; ?>"><?= $scholar['scholar_name']; ?></option>
            <?php endforeach; ?>
          <?php endif; ?>
      </select>
  </div>
<!--GETTING SCHOLAR ID END HERE-->
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="full_name" class="form-control form-control-user" id="exampleFirstName" placeholder="Full Name" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="username" class="form-control form-control-user" id="exampleLastName" placeholder="Username" required>
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" required> 
                </div>
                <div class="form-group">
                  <input type="phone" name="phone" class="form-control form-control-user" id="exampleInputEmail" placeholder="Phone Number" required> 
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                    <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required>
                  </div>
                </div>
                <div class="form-group row">
                <div class="col-sm-12">
                    <select name="role" class="form-control">
                     <option>Select Role For User</option>
                      <option value="admin">admin</option>
                      <option value="user">user</option>
                    </select>
                  </div>
            </div>

       
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button name="reg_user" class="btn btn-primary btn-user">
                  Add Account
                </button>
        </div>
        </form>
       </div>
    </div>
  </div>
</div>
 
          <div class="col-md-12"><!-- col-md-12 begin-->

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

        <div class="card shadow mt-3">
        <div class="card-header text-primary">
        
                
                <span>Admin Profiles</span> 
                <!-- Button to Open the Modal -->
                <button type="button" class="btn btn-sm btn-primary mb-2 float-right" data-toggle="modal" data-target="#myModal">
                  <i class="fa fa-user-plus"> Add</i>
                </button>
                
        </div>
                <div class="card-body">
        

<table class="table table-stripe table-responsive">

    <thead class="text-primary">
      <tr>
        <th>ID</th>
        <th>FULLNAME</th>
        <th>USERNAME</th>
        <th>EMAIL</th>
        <th>PHONE NUMBER</th>
        <th>ROLE</th>
      </tr>
    </thead>

    <?php $user = new users (); ?>       
            <?php if($user->getUsers()) : ?>
                  <?php foreach($user->getUsers() as $user) : ?>
            
      <tr>
        <td><?= $user['u_id']; ?></td>
        <td><?= $user['u_fullname']; ?></td>
        <td><?= $user['u_username']; ?></td>
        <td><?= $user['u_email']; ?></td>
        <td><?= $user['u_phone']; ?></td>
        <td><?= $user['role']; ?></td>
        <td>
        <form action="admin_edit.php" method="post">
        <input type="hidden" name="edit_id" value="<?= $user['u_id']; ?>">
        <button type="submit" name="edit_user" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></button>
        </form>
        </td>
        <td>
        <form action="code.php" method="post">
        <input type="hidden" name="delete_id" value="<?= $user['u_id']; ?>"> 
        <button type="submit" name="delete_user" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
        </form>
        </td>
      </tr>
      <?php endforeach; ?>
                      <?php else : ?>
                    <h1>No data found</h1>
                <?php endif; ?>

    </tbody>
  </table>

</div>
</div>
</div>
 </div><!-- col-md-12 finish-->
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