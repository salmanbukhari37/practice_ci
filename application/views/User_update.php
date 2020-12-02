<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<div id="container">
	<?php 
		// echo "<pre>";
		// print_r($userData);
	?>	
		<form action="Update" method="post"> 
			<div class="col-12">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" name="username" value="<?= $user->USERNAME ?>" id="username" class="form-control">
				</div>
			</div>

			<div class="col-12">
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" id="email" name="email" value="<?= $user->EMAIL ?>" class="form-control">
				</div>
			</div>
			<div class="col-12">
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" id="password" name="password" value="<?= $user->PASSWORD ?>" class="form-control">
				</div>
			</div>
			<div class="col-12">
				<div class="form-group">
					<button type="submit" class="btn btn-success">Submit</button>
				</div>
			</div>
		</form>
		
	
	<div class="row">
		<div class="col-12">
			<table class="table table-hover">
				<thead>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Action</th>
					<th></th>
				</thead>
				<tbody>
				<?php 
				foreach( $userData AS $user ) :
				?>
					<tr>
						<td><?= $user->ID ?></td>
						<td><?= $user->USERNAME ?></td>
						<td><?= $user->EMAIL ?></td>
						<td><a href="<?= base_url("Update/" . $user->ID) ?>">Edit</a></td>
						<td><a href="<?= base_url("Delete/" . $user->ID) ?>">Delete</a></td>
					</tr>
				<?php 
				endforeach;
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>

</body>
</html>