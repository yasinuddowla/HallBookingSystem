<?php include('includes/header.php'); ?>

<?php
if(isset($_POST['add'])){
	

	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];

	$q = "INSERT INTO manager VALUES(NULL,'{$name}','{$phone}','{$email}')";

	

	$result = mysqli_query($dblink, $q);

	if(!$result){
		echo dangerMsg('There was an error.');
	}
	else{
		echo successMsg('Manager Added Successfully.');
	}
}

?>
<h2>Add Manager</h2>
	<form method="post">
	  <div class="form-group">
	    <label for="name">Manager Name</label>
	    <input type="text" name="name" required class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter Name">
	    
	  </div>
	  <div class="form-group">
	    <label for="phone">Phone</label>
	    <input type="text" name="phone" required class="form-control" id="phone" placeholder="Enter Phone">
	  </div>
	 	<div class="form-group">
	    <label for="email">Email</label>
	    <input type="text" name="email" required class="form-control" id="email" placeholder="Enter Email">
	  </div>
	  <button type="submit" name="add" class="btn btn-primary">Submit</button>
	</form>

<?php include('includes/footer.php'); ?>
