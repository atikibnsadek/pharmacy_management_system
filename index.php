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

    if(isset($_POST['user_name'])){
        $username=$_POST['user_name'];
        $pass=$_POST['user_pass'];

        $sql = "select * from user_table where user_id='$username' and user_pass='$pass'";
        $result=mysqli_query($conn,$sql);

		$val = mysqli_fetch_row($result); 
		$userType = $val[6];


        if(mysqli_num_rows($result)==1){
			$_SESSION['userName']=$username;
			if(strcmp($userType,"admin")==0){
				header('location:admin.php');
			}elseif(strcmp($userType,"manager")==0){
				header('location:manager.php');
			}elseif(strcmp($userType,"salesman")==0){
				header('location:salesman.php');
			}
        }else{
            $error_msg='incorrect information';
        }
    }
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Login Page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
						<img src="img/medicine.png" alt="logo" width="100">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4 align-items-center text_center">Login</h1>

							<?php
							echo '<span class="card-title fw-bold aling-items-center error_msg">' . $error_msg . '</span>';
							?>
					
							<form method="POST" action="">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">User Name</label>
									<input name="user_name" type="text" class="form-control" name="email" value="" required autofocus>
								</div>

								<div class="mb-3">
									<div class="mb-2 w-100">
										<label class="text-muted" for="password">Password</label>
									</div>
									<input name="user_pass" type="password" class="form-control" name="password" required>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

								<div class="d-flex align-items-right">
                                    <input type="submit" value="Login" class="btn btn-primary ms-auto">
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Don't have an account? <a href="registration.php" class="text-dark">Create One</a>
							</div>
						</div>
					</div>
					<div class="text-center mt-5 text-muted">
						Copyright &copy; 2017-2021 &mdash; Your Company 
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/login.js"></script>
</body>
</html>