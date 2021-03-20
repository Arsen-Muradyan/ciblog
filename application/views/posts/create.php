<div class="container mt-2">
	<h1>New Post</h1>
	<?php echo validation_errors(); ?>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="text" placeholder="Title" class="form-control" name='title'>
		<br>
		<textarea name="content" cols="30" rows="10" class="form-control" placeholder="Content"></textarea>
		<br>
		<input type="file" name="post_image">
		<br><br>
		<input type="submit" class="btn btn-primary" value="Create Post">
	</form>
</div>
