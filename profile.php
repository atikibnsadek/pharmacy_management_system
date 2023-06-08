<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pharmacy";
    
    $conn = mysqli_connect($servername,$username,$password);

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    mysqli_select_db($conn,$dbname);

    $userName = $_SESSION['userName'];

    $sql = "select * from user_table where user_id='$userName'";
    $result=mysqli_query($conn,$sql);

    $profileResult = mysqli_fetch_row($result);    
?>


<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Profile</title>
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <link rel="stylesheet" href="css/font-awesome.min.css" />
      <link rel="stylesheet" href="css/style.css" />
   </head>
   <body>
      <div class="container">
         <?php include 'asset/php/header.php'; ?>
      </div>
      <div class="container">
         <div class="main-body">
            <div class="row gutters-sm">
               <div class="col-md-4 mb-3">
                  <div class="card">
                     <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                           <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                           <div class="mt-3">
                               <?php
                                echo '<h4>'.$userName.'</h4>';
                                echo '<p class="text-secondary mb-1">'.$profileResult[6].'</p>';
                              ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-8">
                  <div class="card mb-3">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-sm-3">
                              <h6 class="mb-0">Full Name</h6>
                           </div>
                           <div class="col-sm-9 text-secondary">
                              <?php echo $profileResult[2]; ?>
                           </div>
                        </div>
                        <hr>
                        <div class="row">
                           <div class="col-sm-3">
                              <h6 class="mb-0">Email</h6>
                           </div>
                           <div class="col-sm-9 text-secondary">
                           <?php echo $profileResult[3]; ?>
                           </div>
                        </div>
                        <hr>
                        <div class="row">
                           <div class="col-sm-3">
                              <h6 class="mb-0">Phone</h6>
                           </div>
                           <div class="col-sm-9 text-secondary">
                           <?php echo $profileResult[4]; ?>
                           </div>
                        </div>
                        <hr>
                        <div class="row">
                           <div class="col-sm-3">
                              <h6 class="mb-0">Address</h6>
                           </div>
                           <div class="col-sm-9 text-secondary">
                           <?php echo $profileResult[5]; ?>
                           </div>
                        </div>
                        <hr>
                        <div class="row">
                           <div class="col-sm-3">
                              <h6 class="mb-0">Joining Date</h6>
                           </div>
                           <div class="col-sm-9 text-secondary">
                           <?php echo $profileResult[7]; ?>
                           </div>
                        </div>
                        <hr>
                        <div class="row">
                           <div class="col-sm-6">
                              <a class="btn btn-info" href="profileEdit.php">Edit</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>