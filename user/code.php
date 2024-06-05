<?php
session_start();
// include('include/db.php');
include('include/class-autoload.inc.php');


if(isset($_POST['Add_file'])){
    $user_id = $_SESSION['u_id'];
    $scholar_id = $_POST['scholar_f_id'];
    $file_title = $_POST['file_title'];
    $file_desc = $_POST['file_desc'];
    $file_image = $_FILES['file_image']["name"];
    $temp_name = $_FILES['file_image']["tmp_name"];

     
    $file = new files ();
    if($file->addFile($scholar_id,$user_id,$file_title,$file_desc,$file_image)){
        move_uploaded_file($temp_name,"../admin/upload/files/$file_image");
        $_SESSION['success'] = "<div class='alert alert-success mt-2'>Added scholar files successfully</div>";
        header('location: details.php?scholar_id='.$scholar_id);
    }else{
        $_SESSION['status'] = "<div class='alert alert-danger mt-2'>Didnt add scholar files!</div>";
        header('location: details.php?scholar_id='.$scholar_id);
    }
}
    
if(isset($_POST['update_scholar_btn'])){

    $scholar_id = $_POST['edit_scholar_id'];
    $scholar_name = $_POST['edit_scholar_name'];
    $scholar_location = $_POST['edit_scholar_location'];
    $scholar_desc = $_POST['edit_scholar_desc'];

    
    $scholar = new scholars ();
    if($scholar->updateScholar($scholar_name,$scholar_location,$scholar_desc,$scholar_id)){
        $_SESSION['success'] = '<div class="alert alert-success">Your data is updated successfully!</div>';
        header('location: details.php?scholar_id='.$scholar_id);
    }else{
        $_SESSION['status'] = '<div class="alert alert-danger">Your data is not updated!</div>';
        header('location: details.php?scholar_id='.$scholar_id);
    }
}

if(isset($_POST['delete_file'])){
    $delete_id = $_POST['file_delete_id'];
    $scholar_id = $_POST['scholar_id'];
    
    $delete = new files ();
    if($delete->deleteFile($delete_id)){
        echo $_SESSION['success'] = '<div class="alert alert-success">Your data has been deleted successfully!</div>';
        header('location: details.php?scholar_id='.$scholar_id);
    }else{
        echo $_SESSION['status'] = '<div class="alert alert-danger">Your data is not Deleted!</div>';
        header('location: details.php?scholar_id='.$scholar_id);
    }

}


if(isset($_POST['file_update'])){
    $file_id = $_POST['file_id'];
    // $scholar_id = $_POST['scholar_f_id'];
    $file_title = $_POST['edit_file_name'];
    $file_desc = $_POST['edit_file_desc'];

    $file = new files ();
    if($file->updateFile($file_title,$file_desc,$file_id)){
        $_SESSION['success'] = "<div class='alert alert-success mt-2'>Files Updated successfully!</div>";
        header('location: more.php?file_id='.$file_id);
    }else{
        $_SESSION['status'] = "<div class='alert alert-danger mt-2'>Didn't Update files!</div>";
        header('location: more.php?file_id='.$file_id);
    }
}


if(isset($_POST['update_user_pass'])){

    $id = $_POST['edit_id'];
    $newpass = $_POST['newpass'];
    $repeatpass = $_POST['repeatpass'];
    
    if($newpass == $repeatpass){
        $user = new users ();
        if($user->updateUserPass($newpass,$id)){
            $_SESSION['success'] = '<div class="alert alert-success">Your data is updated successfully!</div>';
            header('location: password.php');
        }else{
            $_SESSION['status'] = '<div class="alert alert-danger">Your data is not updated!</div>';
            header('location: password.php');
        }
    }else{
        $_SESSION['status'] = '<div class="alert alert-danger">Your New Password do not match!</div>';
        header('location: password.php');
    }
}

if(isset($_POST['update_user'])){

    $id = $_POST['edit_id'];
    $full_name = $_POST['edit_fullname'];
    $username = $_POST['edit_username'];
    $phone = $_POST['edit_phone'];
    $email = $_POST['edit_email'];

    $user = new users ();
    if($user->updateUserProfile($full_name,$username,$phone,$email,$id)){
        echo $_SESSION['success'] = '<div class="alert alert-success">Your data is updated successfully!</div>';
        header('location: profile.php');
    }else{
         echo $_SESSION['status'] = '<div class="alert alert-danger">Your data is not updated!</div>';
        header('location: profile.php');
    }
}

if(isset($_POST['login_button'])){

    $email = $_POST['email'];
    $pass = $_POST['password'];
   

    $user = new login();
    if($user->loginUser($email,$pass) === true){
        // echo $_SESSION['role'];
        // echo $_SESSION['u_email'];
        if($_SESSION['role'] === 'user'){
            header('location: index.php');
            // echo 'true';
        }else{
            header('location: ../admin/index.php');
            // echo 'false';
        }
    }else{
        header('location: login.php?error');
    }

} 



?>