<?php
session_start();
if(isset($_SESSION['email']))
    include('../includes/connection.php');
    if(isset($_POST['adminLogin'])){
    	$query="select  email, password,name,uid from user where email='$_POST[email]' AND password='$POST[password]'";
		$query_run = mysql_query($connection,$query);
		if(mysqli_num_rows($query_run)){
			while($row=mysqli_fetch_assoc($query_run)){
                 $_SESSION['email'] = $row['email'];
                 $_SESSION['name'] = $row['name'];
			}
            echo"<script type='text/javascript'>
         	window.location.href='user_dashboard.php';
         </script>
		 ";
		}
		else{
			echo"<script type='text/javascript'>
         	alert('Please enter correct details.');
         	window.location.href='user_login.php';
         </script>
		 ";
		}
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TMS/ Admin Login</title>
	<!--JQuery file-->
	<script src="../includes/jquery_latest.js"></script>
	<!--bootstrap file -->
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<script src="../bootstrap/js/bootstrap.min.js"></script>
<!---external css file--->
<link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
     <div class="row">
     	<div class="col-md-3 m-auto" id="admin_login">
     		<center><h3 style="background-color: #5a8f7b; padding: 5px; width: 15vw;">Admin Login</h3></center>
     		<form action="" method="post">
     			<div class="form-group">
     				<input type="email" name="email" class="form-control" placeholder="Enter Email" required>
     			</div>
     			<div class="form-group">
     				<input type="password" name="password" class="form-control" placeholder="Enter Password" required>
     			</div>
     			<div class="form-group">
     				<center><input type="submit" name="adminLogin"value="Login" class="btn btn-warning"></center>
     			</div>
     		</form><br>
     		<center><a href="../index.php" class="btn btn-danger">Go to Home</a></center>
     	</div>
     </div>
</body>
</html>
<?php
}
else{
	header('Location:user_login.php');
}
?>