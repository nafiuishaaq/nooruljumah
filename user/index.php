
<?php
session_start();
if(!isset($_SESSION['u_email'])){
  header('location: ../admin/login.php');
}
if($_SESSION['role'] != 'user'){
  header('location: ../admin/login.php');
}
include('include/class-autoload.inc.php');
include('include/main_header.php');
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
         
        <div class="row"><!--row Begin-->

        


      <!-- Number of scholars card -->
            <div class="col-xl-4 col-md-6 col-sm-4 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total No of My Scholar</div>

                  <?php $scholar = new scholars (); ?>       
                    <?php if($scholar->getTotalUserScholars($_SESSION['u_id'])) : ?>
                        <?php foreach($scholar->getTotalUserScholars($_SESSION['u_id']) as $scholar) : ?>
                          
                              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $scholar['total'];?></div>
                    </div>

                    <?php endforeach; ?>
                    <?php endif; ?>

                    <div class="col-auto">
                      <i class="fa fa-users text-gray-800"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            

             <!-- Number of files card -->
            <div class="col-xl-4 col-md-6 col-sm-4 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total No of files</div>

                  <?php $file = new files (); ?>       
                    <?php if($file->getTotalUserFiles($_SESSION['u_id'])) : ?>
                        <?php foreach($file->getTotalUserFiles($_SESSION['u_id']) as $file) : ?>

                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $file['total']?></div>
                          
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>

                    <div class="col-auto">
                      <i class="fa fa-file text-gray-800"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Number of files card -->
            <div class="col-xl-4 col-md-6 col-sm-4 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total No of Audios</div>

                  <?php $audio = new audio (); ?>       
                    <?php if($audio->getTotalUserAudio($_SESSION['u_id'])) : ?>
                        <?php foreach($audio->getTotalUserAudio($_SESSION['u_id']) as $audio) : ?>

                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $audio['total']?></div>

                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>

                    <div class="col-auto">
                      <i class="fa fa-music text-gray-800"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            

      <div class="col-md-12">
          <div class="card shadow border-left-dark h-100 ">
              <div class="card-body text-dark">
                  <h4 class="text-center text-info">Welcome to Nurul-Jum'ah, Admin Panel</h4>
              </div>
          </div>
      </div>
      <video class="my-4" controls src="../admin/upload/files/videoplayback (4).mp4" width="100%" height="100%">textbjdavkb ksdjbvksdjvbdvjbdkcj</video>
        </div><!--row finish-->
          

         

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