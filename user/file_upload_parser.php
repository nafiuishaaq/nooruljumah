<?php
 session_start();
 if(!isset($_SESSION['u_email'])){
   header('location: ../admin/login.php');
 }
 if($_SESSION['role'] != 'user'){
   header('location: ../admin/login.php');
 }
    include('include/class-autoload.inc.php');

if($_FILES != null ){ // if file not chosen
$file_id = $_POST['f_id'];
$u_id = $_POST['u_id'];
$audio_name = $_FILES["file1"]["name"]; // The file name
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file1"]["type"]; // The type of file it is
$size = $_FILES["file1"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true

if($fileErrorMsg > 0) { 
    // echo "<div class='alert alert-danger'> ERROR: Please browse for a file before clicking the upload button. </div>";
    echo '<div class="alert alert-danger">Ops Something is wrong</div>';
    // exit();
}else{

  
    $upload = new upload ();
    if($upload->uploadAudio($file_id,$u_id,$audio_name,$size)){
        move_uploaded_file($fileTmpLoc, "../admin/upload/audio/$audio_name");
    echo "<div class='alert alert-success'>$audio_name upload is complete</div>"; 
    }else{
        echo "<div class='alert alert-danger'> Check your Query </div>";
    }

    
// } else {
//     echo "move_uploaded_file function failed";
}

}else{
    echo '<div class="alert alert-danger">ERROR: Please browse for a file before clicking the upload button. </div>';
}
?>