<?php include('includes/header.php'); ?>
<?php
	if(isset($_POST['delete'])){
		$booking_id = $_POST['booking_id'];

		$q = "DELETE FROM booking where booking_id='{$booking_id}'";

		$result = mysqli_query($dblink, $q);

		if(!$result){			
			dangerMsg('There was an error.');
		}
		else{
			dangerMsg('Booking ID: '.$booking_id.' Deleted');
		}

		
	}
?>
<?php
	$query = "SELECT * FROM booking";
	$bookings = mysqli_query($dblink,$query);
	if(mysqli_num_rows($bookings)==0){
		dangerMsg('No booking added yet.');
	}
	else{

?>
	
<h2 class="text-center">Bookings</h2>                                                                                      
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Booking ID</th>
        <th>Hall</th>
        <th>Client</th>
        <th>Date</th>
        <th>Slot</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	<?php
		$count = 1;
		while($r = mysqli_fetch_assoc($bookings)){

			?>
      <tr>

        <td><?php echo $count++;?></td>
		<td><?php echo $r['booking_id']?></td>
		<td><?php echo getHall($r['hall_id'])['name']?></td>
		<td><?php echo getClient($r['client_id'])['name']?></td>
		<td><?php echo $r['date']?></td>
		<td><?php echo $r['slot']?></td>
				
		<td>
			<div class="btn-group">
				<button  class="btn btn-primary" onclick="location.href='edit_booking.php?booking_id=<?php echo $r['booking_id']?>'" ><i class="fa fa-edit"></i>Edit</button>&nbsp;&nbsp;&nbsp;
				<form method="post" class="inline">
					<input type="hidden" name="booking_id" value="<?php echo $r['booking_id']?>">
					
					<button type="submit" class="btn btn-danger" name="delete" ><i class="fa fa-trash"></i>Delete</button>
				</form>
			</div>
		</td>

      </tr>

      <?php
	}
		?>
    </tbody>
  </table>
  </div>
 <?php
}
?>

<?php include('includes/footer.php'); ?>
