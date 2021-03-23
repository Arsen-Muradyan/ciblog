<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container mt-2">
	<?php if ($this->session->flashdata('message')): ?>
		<div class="alert alert-dismissible alert-warning mt-2">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  <p class="mb-0">	<?php echo $this->session->flashdata('message'); ?></p>
		</div>
		<?php unset($_SESSION['message']); ?>
	<?php endif; ?>
	<p class="float-right">Email` <?php echo $this->session->userdata('email'); ?></p>
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Title</th>
	      <th scope="col">Created At</th>
	      <th scope="col">Actions</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php foreach($posts as $post)  {?>
		  <tr>
	      <th scope="row"><?php echo $post['id']; ?></th>
	      <td><?php echo $post['title']; ?></td>
	      <td><?php echo $post['created_at']; ?></td>
	      <td>
	      	<a href="/posts/<?= $post['id']; ?>">View Details</a>
	      </td>
	    </tr>
	  </tbody>
	  <?php } ?>
	</table>
</div>
