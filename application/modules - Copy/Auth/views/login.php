<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Advanced login -->
					<?php echo form_open("auth/login");?>
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-warning-400 text-warning-400"><i class="icon-people"></i><?php echo $message;?></div>
								<h5 class="content-group-lg">Login to your account <small class="display-block">Enter your credentials</small></h5>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<?php echo form_input($identity,FALSE,'class="form-control"');?>
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								 <?php echo form_input($password, FALSE, 'class="form-control"');?>
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group login-options">
								<div class="row">
									<div class="col-sm-6">
										<label class="checkbox-inline">
											<input type="checkbox" class="styled"
											name="remember" checked="checked">
											Remember
										</label>
									</div>

									<div class="col-sm-6 text-right">
										 <a href="forgot_password">Forgot password?</a>
									</div>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" class="btn bg-pink-400 btn-block">Login <i class="icon-circle-right2 position-right"></i></button>
							</div>

							
						</div>
					</form>
					<!-- /advanced login -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->






  