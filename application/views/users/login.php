<div class="container mt-2 d-flex justify-content-center text-center">
	<div class="card p-3 " style="width: 25rem">
		<h1>Login</h1>
	<?php echo validation_errors(); ?>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="email" placeholder="Email" class="form-control" name='email'>
		<br>
		<input type="password" placeholder="Password" class="form-control" name='password'>
		<br>
		<input type="submit" class="btn btn-primary" value="login">
	</form>
	</div>
</div>
