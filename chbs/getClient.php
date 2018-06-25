<?php include('includes/functions.php'); ?>
<?php 
if($_POST['search_name']==''){
	$query = "SELECT * FROM client";

}
else{
	$query = "SELECT * FROM client where name like '%{$_POST['search_name']}%' OR phone like '%{$_POST['search_name']}%' OR address like '%{$_POST['search_name']}%' OR email like '%{$_POST['search_name']}%' ";	
	
}
$clients = mysqli_query($dblink,$query);
	
	if(mysqli_num_rows($clients)>0){
?>
	 <div class="table-responsive">          
	  <table class="table">
	    <thead>
	      <tr>
	        <th>#</th>
	        <th>Client ID</th>
	        <th>Name</th>
	        <th>Phone</th>
	        <th>Address</th>
	        <th>Email</th>
	        <th>Action</th>
	      </tr>
	    </thead>
	    <tbody>
	    	<?php
			$count = 1;
			while($r = mysqli_fetch_assoc($clients)){

				?>
	      <tr>

	        <td><?php echo $count++;?></td>
			<td><?php echo $r['client_id']?></td>
			<td><?php echo $r['name']?></td>
			<td><?php echo $r['phone']?></td>
			<td><?php echo $r['address']?></td>
			<td><?php echo $r['email']?></td>
					
			<td>
				<div class="btn-group">
					<button  class="btn btn-primary" onclick="location.href='edit_client.php?client_id=<?php echo $r['client_id']?>'" ><i class="fa fa-edit"></i>Edit</button>&nbsp;&nbsp;&nbsp;
					<form method="post" class="inline">
						<input type="hidden" name="client_id" value="<?php echo $r['client_id']?>">
						
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
else{
	dangermsg('No Match Found.');
}
?>
