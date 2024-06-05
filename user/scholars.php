
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


    <div class="card shadow mt-3">
    <div class="card-header text-success">SCHOLARS</div>
                <div class="card-body">
              

  <div class="col-md-12"><!-- col-md-12 begin-->
  <div class="row">


  <?php $scholar = new scholars (); ?>       
        <?php if($scholar->getUserScholar($_SESSION['u_id'])) : ?>
              <?php foreach($scholar->getUserScholar($_SESSION['u_id']) as $scholar) : ?>

  <div class="col-sm-12 col-md-4"><!-- col-md-4 begin-->
        <div class="card shadow mb-3"><!--card shadow begin-->  
        <a href="details.php?scholar_id=<?= $scholar['scholar_id'];?>">      
            <div class="card-img-fluid"><!--card-img-fluid begin-->

            <?php
            if($scholar['scholar_img'] == ""){
            ?>
            <img class="image-resize" src="../admin/upload/scholar/bootstrap.jpg">
            <?php 
            }else{
            ?>
            <img class="image-resize" src="../admin/upload/scholar/<?= $scholar['scholar_img'];?>" alt="">
            <?php 
            }
            ?>
            </div><!--card-img-fluid ends-->
          </a>
            <div class="card-footer"><!--card-footer begin-->
            <h6 class="text-dark text-center"><?= $scholar['scholar_name']; ?></h6>
            </div><!--card-footer ends-->
              </div><!--card shadow ends--> 
  </div><!-- col-md-4 begin-->

              <?php endforeach; ?>
              <?php else : ?>
                <div class='alert alert-warning'>No Scholar allocated to you yet. please contact your <a href='#'>administrator</a></div>
              <?php endif; ?>

           
      

  </div><!-- row ends-->
   </div><!-- col-md-12 finish-->
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

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <?php include('include/script.php'); ?>