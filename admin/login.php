<?php
session_start();
// include("include/db.php");
include('includes/class-autoload.inc.php');



?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-6 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                    <span>
                    
                    <?php 
                    
                    // if($conn){
                    //   echo '<div class="alert alert-success">conected!</div>';
                    //  } else{
                    //   echo '<div class="alert alert-danger">not conected!</div>';
                    //   };
                    
                    //getting users input
                    
                    // if(isset($_POST['login_button'])){
                      // $email = mysql_real_escape_string($_POST['email']);
                      // $password = md5($_POST['password']);

                      // $query = "select * from user where u_email = '".$email."' and password = '".$password."'";
                      // $query_run = mysql_query($query);

                      // $row = mysql_fetch_array($query_run);

                      // if(mysql_num_rows($query_run) > 0){
                      //   $_SESSION['email'] = $row['u_email'];
                      //   $_SESSION['u_id'] = $row['u_id'];
                      //   $_SESSION['scholar_id'] = $row['scholar_id'];

                        // echo '<div class="alert alert-success">welcome  ' .$row['firstname']. '</div>';
                  //       header('location: index.php');
                  //       }else{
                  //         echo '<div class="alert alert-danger">user doesnt exist</div>';
                  //       };
                  //   };
                  //  ?>

                    </span>
                  </div>


                   <?php if(isset($_GET['error'])){ ?>
                   <p class="alert alert-danger">Invalid Login details..</p>
                    <?php } ?>
                  <form class="user" action="code.php" method="post">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <!--<a href="index.html" class="btn btn-primary btn-user btn-block">
                      Login
                    </a>-->
                    <button name="login_button" class="btn btn-primary btn-user btn-block">Login</button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
