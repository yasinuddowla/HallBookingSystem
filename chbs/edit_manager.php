<?php include('includes/header.php'); ?>

<h2>Find Manager</h2>
 <form class="form-inline my-2 my-lg-0">
  <input class="form-control mr-sm-2" type="text" name="manager_id" placeholder="Search" aria-label="Search">
  <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
 </form>
 <br>
 <br>
 <br>

<?php
if(isset($_POST['update'])){
	
	$manager_id = $_POST['manager_id'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];

	$q = "UPDATE manager SET name='{$name}', phone='{$phone}', email='{$email}' WHERE manager_id = '{$manager_id}'";

	$result = mysqli_query($dblink, $q);

	if(!$result){
		echo dangerMsg('There was an error.');
	}
	else{
		echo successMsg('Manager Updated Successfully.');
	}
}

?>
<?php
if(isset($_GET['manager_id']) ){

	$manager_id = $_GET['manager_id'];

	$q = "SELECT * FROM manager where manager_id='{$manager_id}'";

	$res = mysqli_query($dblink, $q);
	if(mysqli_num_rows($res)>0){

		$manager  = mysqli_fetch_assoc($res);
		
		$name =  $manager['name'];
		$phone =  $manager['phone'];
		$email =  $manager['email'];
?>

	<h3>Edit Manager ID: <?php echo $manager_id?></h3>
	<form method="post" action="edit_manager.php">
		<input type="hidden" name="manager_id" value="<?php echo $manager_id?>">
	  <div class="form-group">
	    <label for="name">Manager Name</label>
	    <input type="text" name="name" value="<?php echo $name?>" required class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter Name">
	    
	  </div>
	  <div class="form-group">
	    <label for="phone">Phone</label>
	    <input type="text" name="phone" value="<?php echo $phone?>" required class="form-control" id="phone" placeholder="Enter Phone">
	  </div>
	 	<div class="form-group">
	    <label for="email">Email</label>
	    <input type="text" name="email" value="<?php echo $email?>" required class="form-control" id="email" placeholder="Enter Email">
	  </div>
	  <button type="submit" name="update" class="btn btn-primary">Update</button>
	</form>
<?php
	}
	else{
		alertMsg('Manager ID: <strong>'.$manager_id.'</strong> Not Found.');
	}
}

?>
<?php include('includes/footer.php'); ?>
