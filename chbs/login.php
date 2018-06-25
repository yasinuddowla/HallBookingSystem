<?php ob_start();?>
<?php require_once("includes/functions.php"); ?>

<?php
$username = "";
$msg = "";
if (isset($_POST['login'])) {
 

	$username = $_POST["username"];
	$password = ($_POST["password"]);
	$user=mysqli_query($dblink,"SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1")
	
	or die(mysqli_error($dblink));
	$row=mysqli_fetch_array($user);

    if ($row) {
      // Success
			// Mark user as logged in
			if($row['type']=='admin'){
				setcookie('admin',true,time()+60*60*24*7);
			}
			
			
			setcookie('username',$username,time()+60*60*24*7);
			setcookie('loggedin',$username,time()+60*60*24*7);
			redirect_to("index.php");
    } else {
      // Failure
      $msg = "Invalid Login.";
    }
  }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Convention Hall Booking System</title>
	<link rel="stylesheet" type="text/css" href="includes/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="includes/style.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/fontawesome-all.min.css">
</head>
<body>

	<main role="main" class="container">

		
		
				
	<div class="login-area">
			
		<?php if($msg!=''){
			dangerMsg($msg);
		}
		?>

		<form method="post" class="form-signin">
		  <div class="form-group">
		    <label for="username">Username</label>
		    <input type="username" name="username" class="form-control" autocomplete="off" required id="username" placeholder="Username">
		    </div>
		  <div class="form-group">
		    <label for="pass">Password</label>
		    <input type="password" name="password" class="form-control" autocomplete="off" required id="pass" placeholder="Password">
		  </div>
		
		  <button type="submit" name="login" class="btn btn-primary">Login</button>
		</form>
		</div>
		</main>

</body>
</html>
