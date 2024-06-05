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

    //  $file_id = $_GET['file_id'];
    //  $user_id = $_SESSION['u_id'];

      ?>


<style>

   
.details-img-resize {

    height: 450px;
    width: 100%;
    object-fit: cover;
    object-position: top center;
}

@media(max-width: 991px){
  .details-img-resize {
    height: 250px;
    width: 100%;
    object-fit: cover;
    object-position: center center;
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


        <!-- The Modal -->
  <div class="modal fade" id="Model">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Delete File?</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->

        <?php $file = new files (); ?>       
        <?php if($file->getFile($id = $_GET['file_id'])) : ?>
            <?php foreach($file->getFile($id = $_GET['file_id']) as $file) : ?>

         <div class="modal-body"> Are You Sure to Delete File <?= $file['file_title']; ?> ? </div>
      
         <?php endforeach; ?>
          <?php endif; ?>
          
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>

          <form action="code.php" method="post">
        <input type="hidden" name="file_delete_id" value="<?= $file['file_id']; ?>"> 
        <input type="hidden" name="scholar_id" value="<?= $_GET['scholar_id']; ?>"> 
        <button type="submit" name="delete_file" class="btn btn-danger btn-user"></i> Yes, Delete</button>
        </form>
      </div>

    </div>
  </div>
</div>

 <!-- The upload_model -->
  <div class="modal fade" id="upload_model">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">File Upload</h4>

          <button type="button" class="close" data-dismiss="modal" id="close">&times;</button>
        </div>
        
        <!-- Modal body -->
         <div class="modal-body"> 


           <h6 id="status"></h6>
            <p id="loaded_n_total"></p>


         <form id="upload_form" enctype="multipart/form-data" method="post">  
         <div class="input-group">
        <input type="file" name="file1" accept="audio/*" class="form-control" id="file1" onchange="return fileValidation()"/>
        </div>
          </div>
        <!-- Modal footer -->
        <div class="modal-footer">
            <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
          <input type="reset" value="Clear" class="btn btn-secondary" data-dismiss="">
          <input type="hidden" name="get_file_id" value="<?= $_GET['file_id'] ?>" id="f_id"> 
          <input type="hidden" name="get_file_id" value="<?= $_SESSION['u_id'] ?>" id="u_id"> 
        <input type="button" value="Upload File" class="btn btn-success btn-user"  onclick="uploadFile()"> 
      </div>
        </form>
    </div>
  </div>
</div>



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

     




<div class="col-md-8"> <!--col-md-9 begin-->
            
    
<?php $file = new files (); ?>       
        <?php if($file->getFile($id = $_GET['file_id'])) : ?>
            <?php foreach($file->getFile($id = $_GET['file_id']) as $file) : ?>

            <div class="card shadow"> <!--card begin-->
            <div class="card-header">Scholar Details <button class="btn btn-link float-right"><i class="fa fa-bars"></i></button></div> 
                <div class="card-img-fluid"> <!--card-img-fluid begin-->

                 <?php
            if($file['file_image'] == ""){
                ?>
               <img class="details-img-resize" src="../admin/upload/files/default.jpg">
               <?php 
            }else{
                 ?>
                  <img class="details-img-resize " src="../admin/upload/files/<?= $file['file_image'];?>" alt="">
            <?php 
            }
            ?>
                </div> <!--card-img-fluid finish-->
                <div class="card-title m-3"> <!--card-title begin-->
                    
                  <i class="text-primary">Name:</i> <?= $file['file_title']; ?><br><hr>
                  <i class="text-primary">Date Created:</i><br><hr>
                  <i class="text-primary">Desc:</i>   <?= $file['file_desc']; ?>
                
                </div> <!--card-title finish-->
                
                 <div class="card-footer"> 

                 <!--delet btn-->
                 <button type="button" data-toggle="modal" data-target="#Model" class="m-1 btn btn-danger btn-circle btn-sm float-right"><i class="fa fa-trash"></i>
                 </button>

                  <!--edit btn-->
                <form action="file_edit.php" method="post">
        <input type="hidden" name="file_edit_id" value="<?= $file['file_id']; ?>" id="f_id">
        <button type="submit" name="file_update" class=" m-1 btn btn-success btn-circle btn-sm float-right"><i class="fas fa-edit"></i></button>
        </form>

            </div>    
         </div> <!--card shadow finish-->  

         <?php endforeach; ?>
         <?php else : ?>
          <h1>No file found</h1>
          <?php endif; ?>

                
<hr>
    <div class="card">

    <div class="card-header">

    <button type="button" data-toggle="modal" data-target="#upload_model" class="m-1 btn btn-info btn-circle btn-sm float-right"><i class="fa fa-upload"></i></button>

    </div>

    </div>

 <div class="col-md-12 m-3"><!-- col-md-8 begin-->
 <div class="row"> <!--row begin..-->

      <table class="table table-stripe table-responsive">

    <thead class="text-primary">
      <tr>
        <th>#</th>
        <th>FILE NAME</th>
        <th>SIZE</th>
        <th>COPY LINK</th>
        <th>DELETE</th>
      </tr>
    </thead>
    
    <?php $a=1; ?>
    <?php $audio = new audio (); ?>       
     <?php if($audio->getAllAudio($file_id = $_GET['file_id'])) : ?>
         <?php foreach($audio->getAllAudio($file_id = $_GET['file_id']) as $audio) : ?>
          
    <tbody>
    <tr>
        <td><?= $a; ?></td>
        <td><?= $audio['audio_name']; ?></td>
        <td>
        <?php $size = $audio['size']; 
              $s = 'KB';
              $x = round($size/1024,1);
              if($x > 1024){
                $x = round($x/1024,1);
                $s = 'MB';
              } else if ($x > 1048576){
                $x = round($x/1048576,1);
                $s = 'GB';
              }
              echo $x . ' ' . $s;
          ?> </td>
        <td class="float-right">
        <input type="hidden" name="edit_id" value="">
        <button type="submit" name="edit_user" class="btn btn-info btn-circle btn-sm"><i class="fas fa-copy"></i></button>
        </td> 

        <td>
        <input type="hidden" name="edit_id" value="">
        <button type="submit" name="edit_user" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
        </td> 
      </tr>

    </tbody>

      
    <?php $a++; ?>

<?php endforeach; ?>

<?php else : ?>

    <h1>No data found</h1>

<?php endif; ?>
    
  </table>   

   

</div>  <!--row finish..-->
</div> <!-- col-md-8 finish-->
</div><!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php include('include/footer.php');?>

</div>
    
    <!-- End of Content Wrapper -->
</div>
  <!-- End of Page Wrapper -->

  <script>
        function fileValidation() {
            var fileInput = document.getElementById('file1');
              
            var filePath = fileInput.value;
          
            // Allowing file type
            var allowedExtensions =
                    /(\.mp3|\.wma|\.aac|\.wav)$/i;
              
            if (!allowedExtensions.exec(filePath)) {
                alert('Invalid file type');
                fileInput.value = '';
                return false;
            } 
            // else 
            // {
              
                // Image preview
                // if (fileInput.files && fileInput.files[0]) {
                //     var reader = new FileReader();
                //     reader.onload = function(e) {
                //         document.getElementById(
                //             'imagePreview').innerHTML = 
                //             '<img src="' + e.target.result
                //             + '"/>';
                //     };
                      
                //     reader.readAsDataURL(fileInput.files[0]);
                // }
            // }
        }
    
/* Script written by Adam Khoury @ DevelopPHP.com */
/* Video Tutorial: http://www.youtube.com/watch?v=EraNFJiY0Eg */
function _(el){
	return document.getElementById(el);
}
function uploadFile(){
	var file = _("file1").files[0];
  var f_id = _("f_id").value;
  var u_id = _("u_id").value;
	// alert(file.name+" | "+file.size+" | "+file.type);
	var formdata = new FormData();
	formdata.append("file1", file);
  formdata.append("f_id", f_id);
  formdata.append("u_id", u_id);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "file_upload_parser.php");
	ajax.send(formdata);
}
function progressHandler(event){
	// _("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of"+event.total;
	var percent = (event.loaded / event.total) * 100;
	_("progressBar").value = Math.round(percent);
	_("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
}
function completeHandler(event){
	_("status").innerHTML = event.target.responseText;
	_("progressBar").value = 0;
}
function errorHandler(event){
	_("status").innerHTML = "Upload Failed";
}
function abortHandler(event){
	_("status").innerHTML = "Upload Aborted";
}
</script>

<?php include('include/script.php'); ?>