<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style>
		#edit-user-form {
			display: none;
		}
	</style>
</head>
<body>

<div id="container">
	<?php 
		// echo "<pre>";
		// print_r($userData);
	?>	
		<form id="add-user-form"> 
			<div class="col-12">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" name="username" id="username" class="form-control">
				</div>
			</div>

			<div class="col-12">
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" id="email" name="email" class="form-control">
				</div>
			</div>
			<div class="col-12">
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" id="password" name="password" class="form-control">
				</div>
			</div>
			<div class="col-12">
				<div class="form-group">
					<button type="submit" class="btn btn-success">Submit</button>
				</div>
			</div>
		</form>
		

		<form id="edit-user-form"> 
			<div class="col-12">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" name="editUsername" id="username" class="form-control">
				</div>
			</div>

			<div class="col-12">
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" id="email" name="editEmail" class="form-control">
				</div>
			</div>
			<div class="col-12">
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" id="password" name="editPassword" class="form-control">
				</div>
			</div>
			<div class="col-12">
				<div class="form-group">
					<input type="hidden" name="editUserId">
					<button type="submit" class="btn btn-success">Edit</button>
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
						<td><a href="#" onclick="editUser(<?= $user->ID ?>)">Edit</a></td>
						<td><a href="Delete/<?= $user->ID ?>">Delete</a></td>
					</tr>
				<?php 
				endforeach;
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>
	<script src="<?= base_url("assets/libraries/jquery-4.0.0.min.js") ?>"></script>
	<script>
		var base_url = "<?= base_url() ?>";

		function editUser (id) {
			// console.log(id);
			$('#add-user-form').hide();
			$('#edit-user-form').show();

			$.ajax({
				url: base_url + "user/get/data/" + id,
				success: (res) => {
					const { code, data } = JSON.parse(res);

					const {
						ID,
						EMAIL,
						USERNAME,
					} = data[0];

					$("input[name='editUsername']").val(USERNAME);
					$("input[name='editUserId']").val(ID);
					$("input[name='editEmail']").val(EMAIL);
				}
			})
		}

		$("#edit-user-form").on("submit", function (e) {			
			e.preventDefault();

			$.ajax({	
				url: base_url+"user/data/update",
				data: $(this).serializeArray(), // name=kashif&age=30
				method: "POST",
				beforeSend: () => {
					
				},
				success: (res) => {
					const result = JSON.parse(res);
					console.log(result);
				}
			})
		})

		$("#add-user-form").on('submit', function (e) {
			e.preventDefault();

			$.ajax({	
				url: base_url+"user/data/save",
				data: $(this).serializeArray(), // name=kashif&age=30
				method: "POST",
				beforeSend: () => {
					
				},
				success: (res) => {
					const result = JSON.parse(res);
					console.log(result);
				}
			})
		})
	</script>
</body>
</html>