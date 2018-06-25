<?php include('includes/header.php'); ?>

<h2>Find Hall</h2>
 <form class="form-inline my-2 my-lg-0">
  <input class="form-control mr-sm-2" type="text" name="hall_id" placeholder="Search" aria-label="Search">
  <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
 </form>
 <br>
 <br>
 <br>

<?php
if(isset($_POST['update'])){
	
	$hall_id = $_POST['hall_id'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$rent = $_POST['rent'];
	$manager_id = $_POST['manager_id'];
	$size = $_POST['size'];

	$q = "UPDATE hall SET name='{$name}', phone='{$phone}' , address='{$address}',  rent='{$rent}',  size='{$size}',  manager_id='{$manager_id}' WHERE hall_id = '{$hall_id}'";

	$result = mysqli_query($dblink, $q);

	if(!$result){
		dangerMsg('There was an error.');
	}
	else{
		successMsg('Hall Updated Successfully.');
	}
}

?>
<?php
if(isset($_GET['hall_id']) ){

	$hall_id = $_GET['hall_id'];

	$q = "SELECT * FROM hall where hall_id='{$hall_id}'";

	$res = mysqli_query($dblink, $q);
	if(mysqli_num_rows($res)>0){

		$hall  = mysqli_fetch_assoc($res);
		
		$name =  $hall['name'];
		$phone =  $hall['phone'];
		$address =  $hall['address'];
		$rent =  $hall['rent'];
		$size =  $hall['size'];
		$manager_id =  $hall['manager_id'];
?>

	<h3>Edit hall ID: <?php echo $hall_id?></h3>
	<form method="post" action="edit_hall.php">
		<input type="hidden" name="hall_id" value="<?php echo $hall_id?>">
	  <div class="form-group">
	    <label for="name">Hall Name</label>
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
		<label for="rent">Rent</label>
	    <input type="text" name="rent" value="<?php echo $rent?>" required class="form-control" id="rent" placeholder="Enter Rent">
	 </div>
	 <div class="form-group">
		<label for="size">Size</label>
	    <input type="text" name="size" value="<?php echo $size?>" required class="form-control" id="size" placeholder="Enter Size">
	 </div>

	 <div class="form-group">
			<label for="manager">Manager</label>
			<select name="manager_id" required class="form-control" id="manager"> 
				
				<option value="<?php echo $manager_id?>" selected><?php echo getManager($manager_id)['name']?></option>
			<?php
			$rows = mysqli_query($dblink, "SELECT * FROM manager");
			while($r = mysqli_fetch_assoc($rows)){
			?>
				
				<option value="<?php echo $r['manager_id']?>" ><?php echo $r['name']?></option>

			<?php
			}
			?>
			
			
			</select>
		</div>
	  <button type="submit" name="update" class="btn btn-primary">Update</button>
	</form>
<?php
	}
	else{
		alertMsg('Hall ID: <strong>'.$hall_id.'</strong> Not Found.');
	}
}

?>
<?php include('includes/footer.php'); ?>
