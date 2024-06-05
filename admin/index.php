
<?php
session_start();
if(!isset($_SESSION['u_email'])){
  header('location: login.php');
}
if($_SESSION['role'] != 'admin'){
  header('location: login.php');
}
// include('includes/db.php');
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
         
        <div class="row"><!--row Begin-->

        <!-- Number of admins card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total No of Admins</div>

                    <?php $user = new users (); ?>       
                    <?php if($user->getTotalUsers()) : ?>
                        <?php foreach($user->getTotalUsers() as $user) : ?>

                     <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $user['total'];?> </div>

                <?php endforeach; ?>
                <?php endif; ?>
                        </div>
                    <div class="col-auto">
                      <i class="fa fa-users text-gray-800"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


      <!-- Number of scholars card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total No of Scholars</div>


                    <?php $scholar = new scholars (); ?>       
                    <?php if($scholar->getTotalScholars()) : ?>
                        <?php foreach($scholar->getTotalScholars() as $scholar) : ?>

                     <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $scholar['total'];?> </div>

                <?php endforeach; ?>
                <?php endif; ?>
                      
                        </div>
                    <div class="col-auto">
                      <i class="fa fa-users text-gray-800"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            

             <!-- Number of files card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total No of files</div>


                      <?php $file = new files (); ?>       
                    <?php if($file->getTotalFiles()) : ?>
                        <?php foreach($file->getTotalFiles() as $file) : ?>

                     <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $file['total'];?> </div>

                <?php endforeach; ?>
                <?php endif; ?>
                      
                      
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-file text-gray-800"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Number of files card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total No of Audios</div> 
                      
                      <?php $audio = new audio (); ?>       
                    <?php if($audio->getTotalAudio()) : ?>
                        <?php foreach($audio->getTotalAudio() as $audio) : ?>

                     <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $audio['total'];?> </div>

                <?php endforeach; ?>
                <?php endif; ?>
                      
                      
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-music text-gray-800"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            

            <div class="col-md-12">
        <div class="card shadow border-left-dark h-100 mt-3">
        <div class="card-body text-dark">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo rerum molestiae pariatur sequi provident alias officiis, at, hic nostrum distinctio quod modi ea vel ab, perspiciatis consequuntur unde quaerat! Praesentium!
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum totam, suscipit maiores doloremque possimus eaque. Autem nesciunt fugit esse. Quam quaerat incidunt soluta, impedit labore eius ut corrupti reiciendis recusandae.</div></div>
        
        </div>
        </div><!--row finish-->
          

         

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     <?php include('includes/footer.php');?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <?php include('includes/script.php'); ?>