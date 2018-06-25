<!DOCTYPE html>
<html>
<head>
	<title>CHBS</title>
	<style type="text/css">
		label{
			width: 120px;
			display: inline-block;
		}
	</style>
</head>
<body>

<?php
if(isset($_POST['register'])){
	$dblink = mysqli_connect('localhost','root','test','chbs');

	if(!$dblink){
		echo 'Connection Error';
	}

	echo "<pre>";
	print_r($_POST);
	echo "</pre>";


	$name = $_POST['c_name'];
	$phone = $_POST['phone'];
	$add = $_POST['add'];
	$email = $_POST['email'];

	

	$result = mysqli_query($dblink,"INSERT INTO client(client_id,name,phone,address,email) VALUES(NULL,'{$name}', '{$phone}', '{$add}', '{$email}')");

	if(!$result){
		echo mysqli_error($dblink);
	}
	else{
		echo 'Inserted Successfully';
	}

	header("Location: test.php");



}
?>

	<form method="post">
		<h1>Register</h1>
		<p>
			<label for="c_name">Name</label>		

			<input type="text" name="c_name" value="" placeholder="Enter your Name">
		</p>
		<p>
			<label for="phone">Phone</label>
			<input type="text" name="phone" value="" placeholder="Enter your mobile No.">
		</p>
		<p>
			<label for="add">Address</label>
			<input type="text" name="add" value="Chittagong" placeholder="Enter current address">
		</p>
		<p>
			<label for="email">Email</label>
			<input type="text" name="email" value="" placeholder="Enter your email ID">
		</p>
		<p>
			<input class="btn" type="submit" name="register" value="Register">
		</p>
	</form>
</body>
</html>