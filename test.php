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

	$error_msg="";

    $userName = $_SESSION['userName'];

    $sql = "select * from user_table where user_id='$userName'";
    $result=mysqli_query($conn,$sql);

    $singleRow = mysqli_fetch_row($result);    

    $userType = $singleRow[6];

    if(strcmp($userType,"manager")==0){
        echo "manager";
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Employee/title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <div class="container">
        <?php include 'asset/php/header.php'; ?>
    </div>

    <h1>okkk</h1>
</body>
</html>



