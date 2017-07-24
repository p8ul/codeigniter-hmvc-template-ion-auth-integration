<!-- Main content -->
<div class="content-wrapper">

<div class="row">
 <?php foreach ($users as $user) { ?>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-body">
			<div class="media">
				<div class="media-left">
					<a href="<?=base_url('home/view_user/');?><?=$user->id;?>" data-popup="lightbox">
						<img src="<?=img_url();?>/demo/images/1.png" style="width: 70px; height: 70px;" class="img-circle" alt="">
					</a>
				</div>

				<div class="media-body">
					<h6 class="media-heading"><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></h6>
					<p class="text-muted"><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></p>
					 
					<ul class="icons-list">
						<li><a href="#" data-popup="tooltip" title="Google Drive" data-container="body"><i class="icon-google-drive"></i></a></li>
						<li><a href="#" data-popup="tooltip" title="Twitter" data-container="body"><i class="icon-twitter"></i></a></li>
						<li><a href="#" data-popup="tooltip" title="Github" data-container="body"><i class="icon-github"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
</div>
	

</div>
<!-- /main content -->