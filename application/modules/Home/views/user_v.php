<?php
 //print_r($user);
 ?>
 <div class="row">
   <div class="panel panel-body">
 	<ul class="media-list">
 	<?php foreach ($user as $u) { ?>
	    <li><strong>First Name:</strong><?=$u['first_name'];?></li>
	    <li><strong>Last Name:</strong><?=$u['first_name'];?></li>
	    <li><strong>Middle Name:</strong><?=$u['username'];?></li>
	    <li><strong>Email:</strong><?=$u['email'];?></li>
	    <li><strong>Phone:</strong><?=$u['phone'];?></li>
	    

	 <?php }
	?>
 		<li></li>
 	</ul>
   </div>
 </div>
 