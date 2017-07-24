<!-- Main content --> 
<div class="content-wrapper">

<!-- Registration form -->
 <?php $attributes = array('class' => 'create_user', 'id' => 'create_user'); ?>
  <?php echo form_open("auth/create_user",$attributes);?>
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<div class="panel registration-form">
				<div class="panel-body">
					<div class="text-center">
						<div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
						<h5 class="content-group-lg">Create account <small class="display-block">All fields are required</small></h5>
					</div>

					<div class="form-group has-feedback">
						
						<?=form_input($identity,FALSE,'class="form-control" placeholder="Choose username"');?>
						<div class="form-control-feedback">
							<i class="icon-user-plus text-muted"></i>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group has-feedback">
								<?php echo form_input($first_name,FALSE,'class="form-control" placeholder="First Name"');?>
								<div class="form-control-feedback">
									<i class="icon-user-check text-muted"></i>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group has-feedback">
								
								<?php echo form_input($last_name,FALSE,'class="form-control" placeholder="Second name"');?>
								<div class="form-control-feedback">
									<i class="icon-user-check text-muted"></i>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group has-feedback">
								<input type="password" class="form-control" placeholder="Create password" id="password" name="password">
								<div class="form-control-feedback">
									<i class="icon-user-lock text-muted"></i>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group has-feedback">
								<input type="password" class="form-control" placeholder="Repeat password" name="password_confirm">
								<div class="form-control-feedback">
									<i class="icon-user-lock text-muted"></i>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group has-feedback">								
								 <?php echo form_input($email,FALSE,'class="form-control" placeholder="Your email"');?>
								<div class="form-control-feedback">
									<i class="icon-mention text-muted"></i>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group has-feedback">
								
								 <?php echo form_input($phone,FALSE,'class="form-control" placeholder="Your Phone number"');?>
								<div class="form-control-feedback">
									<i class="icon-phone text-muted"></i>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group has-feedback">
								
								 <select name="gender" placeholder='Gender' class="form-control">
						        <option>--</option>
						        <option value="male">Male</option>
						        <option value="female">Female</option>
						      </select>
								<div class="form-control-feedback">
									<i class="icon-users text-muted"></i>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<!-- <div class="checkbox">
							<label>
								<input type="checkbox" class="styled" checked="checked">
								Send me <a href="login_registration_advanced.html#">test account settings</a>
							</label>
						</div> -->

						<div class="checkbox">
							<label>
								<input type="checkbox" class="styled" checked="checked">
								Subscribe to monthly newsletter
							</label>
						</div>

						<div class="checkbox">
							<label>
								<input type="checkbox" class="styled">
								Accept <a href="login_registration_advanced.html#">terms of service</a>
							</label>
						</div>
					</div>

					<div class="text-right">
						<span onclick="login();" type="submit" class="btn btn-link"><a href="<?=base_url('auth/login');?>"><i class="icon-arrow-left13 position-left"></i> Back to login form</a></span>
						<button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-10"><b><i class="icon-plus3"></i></b> Create account</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- /registration form -->

</div>
<!-- /main conten?/ -->
<script type="text/javascript">
   $(document).ready(function(){
    
   });

   $('#create_user').validate({
    rules:{
        identity: {
          required:true,
          minlength:2
        },        
        first_name:{
          required:true,         
          minlength: 1
        },
        last_name:{
          required:true,          
          minlength: 1
        },
        email:{
          required:true,          
          minlength: 4
        },
        password:{
          required:true,
          minlength: 8
        },
        password_confirm:{
          required:true,
          minlength:8,
          equalTo: "#password"
        },
        

    },
    messages:{
      name:{
        required: "please provide a name",
        minlength: "name must be atleast 3 characters long"
      },      
    },
    submitHandler: function() { 
      
      if(1 != ''){
          var f = document.getElementById('create_user');
          var formData = new FormData(f);
          
          for (var pair of formData.entries()) {
              //console.log(pair[0]+ ', ' + pair[1]); 
          }
          if (formData) {
                $.ajax({
                    url: "<?=base_url('auth/sign_up');?>",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success:function(data){
                       console.log(data);
                       $("#username").val('');           
                       $("email").val('');               

                       $.jGrowl('User added successfully,', {
                          header: 'Well done!',
                          theme: 'bg-success'
                       });
                       
                      localStorage.setItem('user_id', data);
                      $('.user_id').val(localStorage.getItem("user_id"));
                      window.location = "<?=base_url('auth/');?>";
                    },
                    error:function(xhr,status,err){
                      console.log(xhr);
                      console.log(status);
                      $.jGrowl(xhr.responseText['message'], {
                          header: 'Oh snap!',
                          theme: 'bg-danger'
                      });
                    }
                });
            } 
      }else{
        $.jGrowl('Image is empty fill and try submitting again', {
            header: 'Oh snap!',
            theme: 'bg-danger'
        });
      }
    }
  });

  function login(){
  	window.href='"<?=base_url('auth/login');?>"';
  }
 </script>