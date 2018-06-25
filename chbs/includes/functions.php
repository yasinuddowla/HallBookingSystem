<?php
global $dblink;
$dblink = mysqli_connect('localhost','root','yasin','yearstech_chbs');

	if(!$dblink){
		echo 'Connection Error';
	}
	function redirect_to($new_location) {
	  header("Location: " . $new_location);
	  exit;
	}

		function nav(){?>
			 <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
		      <a class="navbar-brand" href="#">Convention Hall Management System</a>
		      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
		        <span class="navbar-toggler-icon"></span>
		      </button>

		      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
		        <ul class="navbar-nav mr-auto">
		          <li class="nav-item active">
		            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
		          </li>
		          
		          
		          <li class="nav-item dropdown">
		            <a class="nav-link dropdown-toggle" href="view_client.php" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Client</a>
		            <div class="dropdown-menu" aria-labelledby="dropdown01">
		              <a class="dropdown-item" href="add_client.php"><i class="fa fa-plus"></i> Add</a>
		              <a class="dropdown-item" href="view_client.php"><i class="fa fa-eye"></i> View</a>
		              <a class="dropdown-item" href="edit_client.php"><i class="fa fa-edit"></i> Edit</a>
		            </div>
		          </li>
		          <li class="nav-item dropdown">
		            <a class="nav-link dropdown-toggle" href="view_manager.php" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Halls</a>
		            <div class="dropdown-menu" aria-labelledby="dropdown01">
		              <a class="dropdown-item" href="add_hall.php"><i class="fa fa-plus"></i> Add</a>
		              <a class="dropdown-item" href="view_hall.php"><i class="fa fa-eye"></i> View</a>
		              <a class="dropdown-item" href="edit_hall.php"><i class="fa fa-edit"></i> Edit</a>
		              
		            </div>
		            <li class="nav-item dropdown">
		            <a class="nav-link dropdown-toggle" href="view_hall.php" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manager</a>
		            <div class="dropdown-menu" aria-labelledby="dropdown01">
		              <a class="dropdown-item" href="add_manager.php"><i class="fa fa-plus"></i> Add</a>
		              <a class="dropdown-item" href="view_manager.php"><i class="fa fa-eye"></i> View</a>
		              <a class="dropdown-item" href="edit_manager.php"><i class="fa fa-edit"></i> Edit</a>
		              
		            </div>
		          </li>
		          <li class="nav-item dropdown">
		            <a class="nav-link dropdown-toggle" href="view_booking.php" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Booking</a>
		            <div class="dropdown-menu" aria-labelledby="dropdown01">
		              <a class="dropdown-item" href="add_booking.php"><i class="fa fa-plus"></i> Add</a>
		              <a class="dropdown-item" href="view_booking.php"><i class="fa fa-eye"></i> View</a>
		              <a class="dropdown-item" href="edit_booking.php"><i class="fa fa-edit"></i> Edit</a>
		              
		            </div>
		          </li>

		        </ul>
		        
		          <button class="btn btn-success my-2 my-sm-0" onclick="location.href='logout.php'" >Logout [<?php echo $_COOKIE['username']?>]</button>
		        
		      </div>
		    </nav>
		<?php 
		}

		function successMsg($msg){
			echo '<div class="alert alert-success">'.$msg.'</div>';
		}
		function dangerMsg($msg){
			echo '<div class="alert alert-danger">'.$msg.'</div>';
		}
		function alertMsg($msg){
			echo '<div class="alert alert-warning">'.$msg.'</div>';
		}

		function getManager($id){
			global $dblink;
			$query = "SELECT * FROM manager where manager_id = '{$id}'";
			$manager = mysqli_query($dblink,$query);
			$r = mysqli_fetch_assoc($manager);
			return $r;
		}
		function getClient($id){
			global $dblink;
			$query = "SELECT * FROM client where client_id = '{$id}'";
			$client = mysqli_query($dblink,$query);
			$r = mysqli_fetch_assoc($client);
			return $r;
		}
		function getHall($id){
			global $dblink;
			$query = "SELECT * FROM hall where hall_id = '{$id}'";
			$hall = mysqli_query($dblink,$query);
			$r = mysqli_fetch_assoc($hall);
			return $r;
		}

?>

<!-- <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
		      <a class="navbar-brand" href="#">Convention Hall Management System</a>
		      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
		        <span class="navbar-toggler-icon"></span>
		      </button>

		      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
		        <ul class="navbar-nav mr-auto">
		          <li class="nav-item active">
		            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
		          </li>
		          <li class="nav-item">
		            <a class="nav-link" href="#">Link</a>
		          </li>
		          <li class="nav-item">
		            <a class="nav-link disabled" href="#">Disabled</a>
		          </li>
		          <li class="nav-item dropdown">
		            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Client</a>
		            <div class="dropdown-menu" aria-labelledby="dropdown01">
		              <a class="dropdown-item" href="add_client.php"><i class="fa fa-plus"></i> Add</a>
		              <a class="dropdown-item" href="#">Another action</a>
		              <a class="dropdown-item" href="#">Something else here</a>
		            </div>
		          </li>
		          <li class="nav-item dropdown">
		            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manager</a>
		            <div class="dropdown-menu" aria-labelledby="dropdown01">
		              <a class="dropdown-item" href="add_manager.php"><i class="fa fa-plus"></i> Add</a>
		              <a class="dropdown-item" href="#">Another action</a>
		              <a class="dropdown-item" href="#">Something else here</a>
		            </div>
		          </li>
		        </ul>
		        <form class="form-inline my-2 my-lg-0">
		          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
		          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		        </form>
		      </div>
		    </nav>
 -->