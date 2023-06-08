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
		$fname=$_POST['f_name'];
		$email=$_POST['email'];
		$phone=$_POST['phone_num'];
		$address=$_POST['address'];
        $pass=$_POST['user_pass'];
		$cpass=$_POST['cuser_pass'];
		$user_type=$_POST['user_type'];
        $cur_date=date("Y-m-d");

        $sql = "select * from user_table where user_id='$username'";
        $result=mysqli_query($conn,$sql);


        if(mysqli_num_rows($result)==1){
            $error_msg='Already user!';
        }else{
            if($pass!=$cpass){
				$error_msg='Password Not Matched';
			}else{
				$reg="insert into user_table(user_id,user_pass,fname,email,phone,address,user_type,dateOfReg) values ('$username','$pass','$fname','$email','$phone','$address','$user_type','$cur_date')";
				mysqli_query($conn,$reg);
				$_SESSION['userName']=$username;
				$error_msg='Done';
				if(strcmp($user_type,"manager")==0){
					header('location:manager.php');
				}elseif(strcmp($user_type,"salesman")==0){
					header('location:salesman.php');
				}
			}
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Register Page</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
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
							<h1 class="fs-4 card-title fw-bold mb-4">Register</h1>

                            <?php
							echo '<span class="card-title fw-bold aling-items-center error_msg">' . $error_msg . '</span>';
							?>


							<form method="POST" action="" autocomplete="off">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="user_name">User Name</label>
									<input type="text" class="form-control" name="user_name" placeholder="User ID" required autofocus>
								</div>
								
								<div class="mb-3">
									<label class="mb-2 text-muted" for="name">Name</label>
									<input type="text" class="form-control" name="f_name" placeholder="Enter Your Full Name" required>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">Email</label>
									<input type="email" class="form-control" name="email" placeholder="Enter Your Email" required>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="phone">Phone Number</label>
									<input type="number" class="form-control" name="phone_num" placeholder="Enter Your Phone Number" required>
								</div>


								<div class="mb-3">
									<label class="mb-2 text-muted" for="address">Address</label>
									<input type="text" class="form-control" name="address" placeholder="Address">
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="password">Password</label>
									<input type="password" class="form-control" name="user_pass" placeholder="Password" required>						    
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="password">Retype Password</label>
									<input type="password" class="form-control" name="cuser_pass" placeholder="Retype Password" required>						    
								</div>

								<label class="text-muted" for="usertype">User Type</label>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="user_type" value="manager">
									<label class="form-check-label" for="user_type">
									  Manager
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="user_type" value="salesman" checked>
									<label class="form-check-label" for="usertype">
									  Salesman
									</label>
								</div>

								<p class="form-text text-muted mb-3">
									By registering you agree with our terms and condition.
								</p>

								<div class="align-items-center d-flex">
									<button type="submit" class="btn btn-primary ms-auto">
										Register	
									</button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Already have an account? <a href="index.php" class="text-dark">Login</a>
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