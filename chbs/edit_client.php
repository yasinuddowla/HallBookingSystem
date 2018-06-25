<?php include('includes/header.php'); ?>

<h2>Find Client</h2>
 <form class="form-inline my-2 my-lg-0">
  <input class="form-control mr-sm-2" type="text" name="client_id" placeholder="Search" aria-label="Search">
  <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
 </form>
 <br>
 <br>
 <br>

<?php
if(isset($_POST['update'])){
	
	$client_id = $_POST['client_id'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$email = $_POST['email'];

	$q = "UPDATE client SET name='{$name}', phone='{$phone}' , address='{$address}',  email='{$email}' WHERE client_id = '{$client_id}'";

	$result = mysqli_query($dblink, $q);

	if(!$result){
		echo dangerMsg('There was an error.');
	}
	else{
		echo successMsg('Client Updated Successfully.');
	}
}

?>
<?php
if(isset($_GET['client_id']) ){

	$client_id = $_GET['client_id'];

	$q = "SELECT * FROM client where client_id='{$client_id}'";

	$res = mysqli_query($dblink, $q);
	if(mysqli_num_rows($res)>0){

		$client  = mysqli_fetch_assoc($res);
		
		$name =  $client['name'];
		$phone =  $client['phone'];
		$address =  $client['address'];
		$email =  $client['email'];
?>

	<h3>Edit Client ID: <?php echo $client_id?></h3>
	<form method="post" action="edit_client.php">
		<input type="hidden" name="client_id" value="<?php echo $client_id?>">
	  <div class="form-group">
	    <label for="name">Client Name</label>
	    <input type="text" name="name" value="<?php echo $name?>" required class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter Name">
	    
	  </div>
	  <div class="form-group">
	    <label for="phone">Phone</label>
	    <input type="text" name="phone" value="<?php echo $phone?>" required class="form-control" id="phone" placeholder="Enter Phone">
	  </div>
	
	<div class="form-group">
	    <label for="address">Address</label>
	    <input type="text" name="address" value="<?php echo $address?>" required class="form-control" id="address" placeholder="Enter Phone">
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
		alertMsg('Client ID: <strong>'.$client_id.'</strong> Not Found.');
	}
}

?>
<?php include('includes/footer.php'); ?>
