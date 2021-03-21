<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

 ?>
<div class="container mt-2">
<?php foreach($posts as $post)  {?>
	<div class="card mt-2">
		  <div class="card-body">
		  	<div class="float-left mr-5">
				<img src="<?php echo base_url(); ?>/assets/images/posts/<?= $post['image']; ?>" alt="" width="200	">
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
<?php } ?>

</div>
