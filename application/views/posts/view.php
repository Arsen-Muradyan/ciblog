<div class="container mt-2">
	<a href="/posts">&lt; Posts Page</a>
	<h1><?= $post['title'] ?></h1>
	<p><?= str_replace("&lt;","<",str_replace("&gt;",">",$post['content'])) ?></p>
	<?php if ($post['user_id'] == $this->session->userdata('id')): ?>
		<div class="d-flex justify-content-between">
			<a href="/posts/edit/<?php echo $post['id']; ?>" class="btn btn-primary">Edit</a>
			<form action="/posts/delete/<?php echo $post['id']; ?>" method="post">
				<button class="btn btn-danger" onclick="return confirm('Are You Sure?')">Delete</button>
			</form>
		</div>
	<?php endif; ?>
</div>