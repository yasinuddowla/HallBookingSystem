<?php include('includes/header.php'); ?>

<?php

$halls = mysqli_query($dblink, "SELECT * FROM hall");
$clients = mysqli_query($dblink, "SELECT * FROM client");

if(isset($_POST['add'])){

	$client_id = $_POST['client_id'];
	$hall_id = $_POST['hall_id'];
	$slot = $_POST['slot'];
	$date = $_POST['date'];

	
	

	$q = "INSERT INTO booking VALUES(NULL,'{$client_id}','{$hall_id}','{$slot}','{$date}')";

	$result = mysqli_query($dblink, $q);

	if(!$result){
		echo mysqli_error($dblink) ;
		dangerMsg('There was an error.');
	}
	else{
		successMsg('Hall Booked.');
	}
}

?>
	<h2>Hall Booking</h2>
	<form method="post">
	  
		<div class="form-group">
			<label for="client">Client</label>
			<select name="client_id" required class="form-control" id="client"> 
				
				<option value="" disabled selected>Select Client</option>
			<?php
			$rows = mysqli_query($dblink, "SELECT * FROM client");
			while($r = mysqli_fetch_assoc($rows)){
			?>
				
				<option value="<?php echo $r['client_id']?>" ><?php echo $r['name']?></option>

			<?php
			}
			?>
			
			
			</select>
		</div>
		<div class="form-group">
			<label for="hall">Hall</label>
			<select name="hall_id" required class="form-control" id="hall"> 
				
				<option value="" disabled selected>Select hall</option>
			<?php
			$rows = mysqli_query($dblink, "SELECT * FROM hall");
			while($r = mysqli_fetch_assoc($rows)){
			?>
				
				<option value="<?php echo $r['hall_id']?>" ><?php echo $r['name']?></option>

			<?php
			}
			?>
			
			
			</select>
		</div>
		<div class="form-group">
			<label for="slot">Slot</label>
			<select  name="slot" required class="form-control" id="slot" placeholder="Enter Slot">
			<option disabled selected value="">Select Slot</option>
			<option value="Day">Day</option>
			<option value="Night">Night</option>
			</select>
		</div>
		<div class="form-group">
		    <label for="date">Date</label>
		    <input type="date" name="date" required class="form-control" id="date" placeholder="Enter Date">
	  	</div>
		
	  <button type="submit" name="add" class="btn btn-primary">Submit</button>
	</form>

<?php include('includes/footer.php'); ?>
