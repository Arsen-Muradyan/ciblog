<div class="container mt-2">
	<h1>Update Post</h1>
	<?php echo validation_errors(); ?>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="text" placeholder="Title" class="form-control" name='title' value="<?php echo $post['title']; ?>">
		<br>
		<textarea name="content" cols="30" rows="10" class="form-control" placeholder="Content"><?php echo $post['content']; ?></textarea>
		<br>
		<input type="file" name="post_image">
		<br><br>
		<input type="submit" class="btn btn-primary" value="Update">
	</form>
</div>
<script>
    CKEDITOR.replace( 'content' );
</script>
