<?php
    session_start();

    if(isset($_POST['empId'])){
        $_SESSION['empId']=$_POST['empId']; 
    }   

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Search Employee</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <div class="container">
      <?php include 'asset/php/header.php'; ?>
    </div>
    
    <div class="container mt-5">
        <form action="" method="post">
            <div class="d-flex flex-row justify-content-center">
                <div class="col">
                    <input type="text" name="empId" class="form-control" placeholder="Employee's Usernname">
                 </div>
                 <div class="col">
                    <input type="submit" value="Search" class="btn btn-block btn-outline-secondary">
                 </div>
            </div>
        </form>
    </div>
    

    <div class="container mt-4">
        <?php
        if(isset($_SESSION['empId'])){
            include 'asset/php/empProfile.php';
        }
        
        ?>
      </div>


  </body>
</html>
