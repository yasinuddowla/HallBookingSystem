<?php include('includes/header.php'); ?>

<h2>Find Booking</h2>
 <form class="form-inline my-2 my-lg-0">
  <input class="form-control mr-sm-2" type="text" name="booking_id" placeholder="Search" aria-label="Search">
  <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
 </form>
 <br>
 <br>
 <br>

<?php
if(isset($_POST['update'])){
	
	$booking_id = $_POST['booking_id'];
	$client_id = $_POST['client_id'];
	$hall_id = $_POST['hall_id'];
	$slot = $_POST['slot'];
	$date = $_POST['date'];

	$q = "UPDATE booking SET client_id='{$client_id}', hall_id='{$hall_id}' , slot='{$slot}',  date='{$date}' WHERE booking_id = '{$booking_id}'";

	$result = mysqli_query($dblink, $q);

	if(!$result){
		echo dangerMsg('There was an error.');
	}
	else{
		echo successMsg('Booking Updated Successfully.');
	}
}

?>
<?php
if(isset($_GET['booking_id']) ){

	$booking_id = $_GET['booking_id'];

	$q = "SELECT * FROM booking where booking_id='{$booking_id}'";

	$res = mysqli_query($dblink, $q);
	if(mysqli_num_rows($res)>0){

		$booking  = mysqli_fetch_assoc($res);
		

		$client_id =  $booking['client_id'];
		$hall_id =  $booking['hall_id'];
		$slot =  $booking['slot'];
		$date =  $booking['date'];
?>

	<h3>Edit Booking ID: <?php echo $booking_id?></h3>
	<form method="post" action="edit_booking.php">
		<input type="hidden" name="booking_id" value="<?php echo $booking_id?>">
	 <div class="form-group">
			<label for="client">Client</label>
			<select name="client_id" required class="form-control" id="client"> 
				
				<option value="<?php  echo $client_id?>" selected><?php  echo getClient($client_id)['name']?></option>
				<option value="" disabled>Select Client</option>
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
				
				<option value="<?php  echo $hall_id?>" selected><?php  echo getHall($hall_id)['name']?></option>
				<option value=""  disabled>Select Hall</option>
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
			<option value="<?php  echo $slot?>" selected><?php  echo $slot?></option>
				<option value=""  disabled>Select Slot</option>
			<option value="Day">Day</option>
			<option value="Night">Night</option>
			</select>
		</div>
		<div class="form-group">
		    <label for="date">Date</label>
		    <input type="date" name="date" value="<?php echo $date?>" required class="form-control" id="date" placeholder="Enter Date">
	  	</div>
	  <button type="submit" name="update" class="btn btn-primary">Update</button>
	</form>
<?php
	}
	else{
		alertMsg('Booking ID: <strong>'.$booking_id.'</strong> Not Found.');
	}
}

?>
<?php include('includes/footer.php'); ?>
