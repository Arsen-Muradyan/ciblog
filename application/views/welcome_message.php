<div class="container mt-2">
	<div class="jumbotron text-center">
		<h1>CiBlog</h1>
		<p>Lorem ipsum dolor, sit amet, consectetur adipisicing elit. Suscipit dolorum ut blanditiis odit optio placeat accusamus totam quisquam quibusdam perspiciatis. Harum quos iure sunt nulla blanditiis veniam nam vitae incidunt!</p>
		<?php if (!$this->session->userdata('logged_in')): ?>
			<a href="/users/login" class="btn btn-success">Login</a>
			<a href="/users/register" class="btn btn-primary">Register</a>
		<?php else: ?>
			<a href="/users/logout" class="btn btn-danger">Sign Out</a>
		<?php endif; ?>
	</div>
</div>