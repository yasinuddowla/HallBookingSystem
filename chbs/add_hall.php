<?php include('includes/header.php'); ?>

<?php
if(isset($_POST['add'])){

	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$rent = $_POST['rent'];
	$manager_id = $_POST['manager_id'];
	$size = $_POST['size'];

	$q = "INSERT INTO hall VALUES(NULL,'{$name}','{$phone}','{$address}','{$rent}','{$size}','{$manager_id}')";

	$result = mysqli_query($dblink, $q);

	if(!$result){
		echo mysqli_error($dblink) ;
		dangerMsg('There was an error.');
	}
	else{
		successMsg('Hall Added Successfully.');
	}
}

?>
<h2>Add Hall</h2>
	<form method="post">
	  <div class="form-group">
	    <label for="name">Hall Name</label>
	    <input type="text" name="name" required class="form-control" id="name"  placeholder="Enter Name">
	    
	  
	  <div class="form-group">
	    <label for="phone">Phone</label>
	    <input type="text" name="phone" required class="form-control" id="phone" placeholder="Enter Phone">
	  </div>
	  </div>
		<div class="form-group">
		    <label for="address">Address</label>
		    <input type="text" name="address" required class="form-control" id="address" aria-describedby="addHelp" placeholder="Enter Address">
		    
		</div>
		<div class="form-group">
			<label for="rent">Rent</label>
			<input type="number" name="rent" required class="form-control" id="rent" placeholder="Enter Rent">
		</div>
		<div class="form-group">
			<label for="size">Size</label>
			<input type="number" name="size" required class="form-control" id="size" placeholder="Enter Size">
		</div>
		<div class="form-group">
			<label for="manager">Manager</label>
			<select name="manager_id" required class="form-control" id="manager"> 
				
				<option value="" disabled selected>Select Manager</option>
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
		
		
	  <button type="submit" name="add" class="btn btn-primary">Submit</button>
	</form>

<?php include('includes/footer.php'); ?>
