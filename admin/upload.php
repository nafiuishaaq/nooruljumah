<?php
 session_start();
    //  include('includes/db.php');
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




      


 <!-- Modal body -->

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

        <form method="post" action="code.php" enctype="multipart/form-data">
   

                
             <!--GETTING FILE ID-->

   

  <div class="form-group">
      <select name="file-upload" class="form-control" required>

        <option>Select file</option>
        <?php $file = new files (); ?>       
           <?php if($file->getFiles ()): ?>
              <?php foreach($file->getFiles() as $file) : ?>
      
              <option value="<?= $file['file_id']; ?>"><?= $file['file_title']; ?></option>

              <?php endforeach; ?>
            <?php else : ?>
                  <h1>No file found</h1>
        <?php endif; ?>
      
            </select>
          </div>

         

<!--GETTING SCHOLAR ID END HERE-->       
       
      
<!-- Change /upload-target to your upload address -->
<div class="form-group">
<div action="upload" class="dropzone" id="dropfrom" name="file">
  <div class="fallback">
    <input name="file" type="file" multiple />
  </div>
  </div>



  <button type="submit" name="upload" class="btn btn-primary btn-user btn-block mt-4"> Upload </button>
  </form>



<script src="testing/dist/dropzone.js"></script>
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