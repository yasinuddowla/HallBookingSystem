<?php include('includes/header.php'); ?>
<?php
	if(isset($_POST['delete'])){
		$manager_id = $_POST['manager_id'];

		$q = "DELETE FROM manager where manager_id='{$manager_id}'";

		$result = mysqli_query($dblink, $q);

		if(!$result){			
			dangerMsg('Can\'t delete manager. To delete first remove all <strong>Halls</strong> under him.');
		}
		else{
			dangerMsg('Manager: '.getManager($manager_id)['name'].' Deleted');
		}

		
	}
?>
<?php
	$query = "SELECT * FROM manager";
	$managers = mysqli_query($dblink,$query);
	if(mysqli_num_rows($managers)==0){
		dangerMsg('No manager added yet.');
	}
	else{

?>
	
<h2 class="text-center">Managers</h2>                                                                                      
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Manager ID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	<?php
		$count = 1;
		while($r = mysqli_fetch_assoc($managers)){

			?>
      <tr>

        <td><?php echo $count++;?></td>
		<td><?php echo $r['manager_id']?></td>
		<td><?php echo $r['name']?></td>
		<td><?php echo $r['phone']?></td>
		<td><?php echo $r['email']?></td>
				
		<td>
			<div class="btn-group">
				<button  class="btn btn-primary" onclick="location.href='edit_manager.php?manager_id=<?php echo $r['manager_id']?>'" ><i class="fa fa-edit"></i>Edit</button>&nbsp;&nbsp;&nbsp;
				<form method="post" class="inline">
					<input type="hidden" name="manager_id" value="<?php echo $r['manager_id']?>">
					
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
