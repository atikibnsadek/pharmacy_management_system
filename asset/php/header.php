<?php
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
    $userType = $profileResult[6];    
?>


<nav class="navbar navbar-light navbar-expand-md bg-secondary justify-content-center">
    
    <h1>Pharmacy</h1>

    <div class="navbar-collapse collapse w-100" id="collapsingNavbar3">
        <ul class="navbar-nav w-100 justify-content-center">
            <li class="nav-item active">
            <?php
            if(strcmp($userType,"admin")==0){
				echo '<a class="nav-link" href="admin.php"><i class="fa fa-home" aria-hidden="true">Home</i></a>';
			}
            ?>
            </li>
            
            <li class="nav-item active">
                <a class="nav-link" href="profile.php"><i class="fa fa-user" aria-hidden="true">Profile</i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>

            <li class="nav-item">
            <?php
            if(strcmp($userType,"admin")==0){
				echo '<a class="nav-link" href="searchemp.php">search employee</a>';
			}
            ?>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="test.php">test</a>
            </li>
        </ul>
        <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
            <li class="nav-item">
              <a href="logout.php" class="btn btn-outline-danger"><i class="fa fa-sign-out" aria-hidden="true">Logout</i></a>
            </li>
        </ul>
    </div>
  </nav>