<?php include('includes/header.php'); ?>
<?php
	if(isset($_POST['delete'])){
		$hall_id = $_POST['hall_id'];
		$name = getHall($hall_id)['name'];

		$q = "DELETE FROM hall where hall_id='{$hall_id}'";

		$result = mysqli_query($dblink, $q);

		if(!$result){			
			dangerMsg('Can\'t delete hall. To delete first remove all <strong>Booking</strong> of <strong>'.$name.'</strong>.');
		}
		else{
			dangerMsg('<strong>'.$name.'</strong> Deleted');
		}

		
	}
?>
<?php
	$query = "SELECT * FROM hall";
	$halls = mysqli_query($dblink,$query);
	if(mysqli_num_rows($halls)==0){
		dangerMsg('No Hall added yet.');
	}
	else{

?>
	
<h2 class="text-center">Halls</h2>                                                                                      
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Hall ID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Rent</th>
        <th>Size</th>
        <th>Manager</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	<?php
		$count = 1;
		while($r = mysqli_fetch_assoc($halls)){

			?>
      <tr>

        <td><?php echo $count++;?></td>
		<td><?php echo $r['hall_id']?></td>
		<td><?php echo $r['name']?></td>
		<td><?php echo $r['phone']?></td>
		<td><?php echo $r['address']?></td>
		<td><?php echo $r['rent']?></td>
		<td><?php echo $r['size']?></td>
		<td><?php echo $r['manager_id']?></td>
				
		<td>
			<div class="btn-group">
				<button  class="btn btn-primary" onclick="location.href='edit_hall.php?hall_id=<?php echo $r['hall_id']?>'" ><i class="fa fa-edit"></i>Edit</button>&nbsp;&nbsp;&nbsp;
				<form method="post" class="inline">
					<input type="hidden" name="hall_id" value="<?php echo $r['hall_id']?>">
					
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
