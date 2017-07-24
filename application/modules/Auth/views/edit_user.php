<?php foreach ($user as $u) { ?>
<!-- Main content -->
<div class="content-wrapper">
 <div class='panel'>
   <div class="panel-body">
  <div class="row">
  <div class='col-md-12 ' id="infoMessage"><?php echo $message;?></div>
  <!-- for -->
  <?php $attributes = array('class' => 'edit_user', 'id' => 'edit_user'); ?>
  <?php echo form_open("auth/create_user",$attributes);?>
  <div class='col-md-6'>
      <!-- fistname -->
    <div class="col-md-6">
     <div class="form-group">
      <label>First Name:</label>
       <?php echo form_input($first_name,FALSE,'class="form-control"');?>
     </div>
    </div>
    
    <!-- lastname -->
    <div class="col-md-6">
     <div class="form-group">
      <label>Last Name:</label>
      <?php echo form_input($last_name,FALSE,'class="form-control"');?>
     </div>
      
    </div>
    <!-- gender -->
    <div class="col-md-6">
     <div class="form-group">
      <label>Gender:</label>
      <select name="gender" class="form-control">
        <option>--</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
      </select>     
     </div>
    </div>
    <!-- middle name -->
    <div class="col-md-6">
     
    </div>
    <!-- PHone -->
    <div class="col-md-6">
     <div class="form-group">
      <label>Phone:</label>
       <?php echo form_input($phone,FALSE,'class="form-control"');?>
     </div>      
    </div>
  </div>
  <div class='col-md-6'>
    <!-- transfer date -->
    <div class="col-md-6">
     <div class="form-group">
      <label>Password:</label>
      <input type="password" id="password" class="form-control" value='' name="password">
     </div>
    </div>
    <!-- death -->
    <div class="col-md-6">
     <div class="form-group">
      <label>Confirm Password:</label>
      <input type="password" class="form-control" value='' name="password_confirm">
     </div>
    </div>
   <!-- transfer date -->
    <div class="col-md-6">
     <div class="form-group">
      <label>Company:</label>
       <?php echo form_input($company, FALSE,'class="form-control"');?>
     </div>
    </div>
    <!-- death -->
    <div class="col-md-6">
     <div class="form-group">
     <?php if ($this->ion_auth->is_admin()): ?>

          <label><?php echo lang('edit_user_groups_heading');?></label>
          <?php foreach ($groups as $group):?>
              <label class="checkbox">
              <?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  foreach($currentGroups as $grp) {
                      if ($gID == $grp->id) {
                          $checked= ' checked="checked"';
                      break;
                      }
                  }
              ?>
              <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
              <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
              </label>
          <?php endforeach?>

      <?php endif ?>

      <?php echo form_hidden('id', $u['id']);?>
      <?php echo form_hidden($csrf); ?> 
     </div>
    </div>
   <div class="col-md-6 text-right">
   
   
   
  
   </div>
  </div>
   <div class="col-md-12 text-right">
   <button class="btn btn-primary" type='submit'>Add Member</button>
   </div>
</form>

  </div>
 
  </div>

  </div>
</div>
<!-- ./main content -->


 <?=theme_js("plugins/ui/moment/moment.min.js");?>
 
 <script type="text/javascript">
   $(document).ready(function(){
    
   });

   $('#edit_user').validate({
    rules:{                
        first_name:{
          required:true,         
          minlength: 1
        },
        last_name:{
          required:true,          
          minlength: 1
        },       

    },
    messages:{
      first_name:{
        required: "please provide a name",
        minlength: "name must be atleast 3 characters long"
      },      
    },
    submitHandler: function() { 
      
      if(1 != ''){
          var f = document.getElementById('edit_user');
          var formData = new FormData(f);
          
          for (var pair of formData.entries()) {
              console.log(pair[0]+ ', ' + pair[1]); 
          }
          if (formData) {
                $.ajax({
                    url: "<?=base_url('auth/edit_user/'.$u['id']);?>",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success:function(data){
                       console.log(data);
                       $("#username").val('');           
                                     

                       $.jGrowl('User added successfully,', {
                          header: 'Well done!',
                          theme: 'bg-success'
                       });
                       
                      localStorage.setItem('user_id', data);
                      $('.user_id').val(localStorage.getItem("user_id"));
                      window.location = "<?=base_url('auth/');?>";
                    },
                    error:function(error){
                      console.log(error);
                      $.jGrowl('Change a few things up and try submitting again', {
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
 </script>
 <?php } ?>