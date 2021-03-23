<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container mt-2">
	<?php if ($this->session->flashdata('message')): ?>
		<div class="alert alert-dismissible alert-warning mt-2">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  <p class="mb-0">	  <?php echo $this->session->flashdata('message'); ?></p>
		</div>
		<?php unset($_SESSION['message']); ?>
	<?php endif; ?>

	<?php foreach ($posts as $post) { ?>
		<div class="card mt-2">
		  <div class="card-body">
		  	<div class="float-left mr-5">
				<img src="<?php echo base_url(); ?>assets/images/posts/<?= $post['image']; ?>" alt="" width="200">
			</div>
		    <h4 class="card-title"><?= $post['title']; ?></h4>
		    <div style="height: 100px; overflow: hidden">
		    	<p class="card-text">
			    	<?php 
			    		echo str_replace("&lt;","<",str_replace("&gt;",">",$post['content'])); 
			    	?>
		    	</p>
		    </div>
		    <a href="posts/<?= $post['id']?>" class="card-link">More</a>
		  </div>
		</div>
	<?php }; ?>
</div>
