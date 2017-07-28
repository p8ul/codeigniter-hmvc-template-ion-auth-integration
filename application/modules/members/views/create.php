<!-- Main content -->
<div class="content-wrapper">
 <div class='panel'>
   <div class="panel-body">
  <div class="row">
  <div class='col-md-12 ' id="infoMessage"><?php echo $message;?></div>
  <!-- for -->
  <?php $attributes = array('class' => 'create_member', 'id' => 'create_member'); ?>
  <?php echo form_open("member/create",$attributes);?>
  <div class='col-md-6'>
      <!-- fistname -->
    <div class="col-md-6">
     <div class="form-group">
      <label>First Name:</label>
       <?php echo form_input('first_name',FALSE,'class="form-control"');?>
     </div>
    </div>
    <!-- middle name -->
    <div class="col-md-6">
     <div class="form-group">
      <label>Middle Name:</label>
      <?=form_input('middle_name',FALSE,'class="form-control"');?>
     </div>
    </div>
    <!-- lastname -->
    <div class="col-md-6">
     <div class="form-group">
      <label>Last Name:</label>
      <?php echo form_input('last_name',FALSE,'class="form-control"');?>
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
    <div class="col-md-6">
     <div class="form-group">
      <label>Marital:</label>
      <select name="marital_status" class="form-control">
        <option>--</option>
        <option value="male">Married</option>
        <option value="female">Single</option>
        <option value="devorced">Divorced</option>
        <option value="widow">Widow</option>
      </select>
     
     </div>
    </div>
    <!-- middle name -->
    <div class="col-md-6">
     <div class="form-group">
      <label>Email:</label>
      <?php echo form_input('email',FALSE,'class="form-control"');?>
     </div>
    </div>
    <!-- PHone -->
    <div class="col-md-6">
     <div class="form-group">
      <label>Phone:</label>
       <?php echo form_input('phone',FALSE,'class="form-control"');?>
     </div>      
    </div>
  </div>
  <div class='col-md-6'>
    <!-- transfer date -->
    <div class="col-md-6">
     <div class="form-group">
      <label>District:</label>
      <select name="district" class="form-control">
        <option>--</option>
        <option value="thika">Thika</option>
        <option value="Nairobi">Nairobi</option>
      </select>
     </div>
    </div>
    <!-- death -->
    <div class="col-md-6">
     <div class="form-group">
      <label>Membership:</label>
      <select name="membership" class="form-control">
        <option>--</option>
        <option value="Full">Full</option>
        <option value="Adherent">Adherent</option>
      </select>
     </div>
    </div>
   <!-- transfer date -->
    <div class="col-md-6">
     <div class="form-group">
      <label>Date of Birth:</label>
      <input type="text" class="form-control  pickadate-editable" name="baptism_date">
     </div>
    </div>
    <!-- death -->
    <div class="col-md-6">
     <div class="form-group">
      <label>Baptism Date:</label>
      <input type="text" class="form-control  pickadate-editable" id="dob" name="dob">
     </div>
    </div>
    <div class="col-md-6">
     <div class="form-group">
      <label>Confirmation Date:</label>
      <input type="text" class="form-control  pickadate-editable" id="confirmation_date" name="confirmation_date">
     </div>
    </div>
    <div class="col-md-6">
     <div class="form-group">
      <label>Death Date:</label>
      <input type="text" class="form-control  pickadate-editable" id="death_date" name="death_date">
     </div>
    </div>
   <div class="col-md-6 text-right">
   <input type="hidden" class="hidden" value='12345678' name="password">
   <input type="hidden" class="hidden" value='12345678' name="password_confirm">
   
  
   </div>
  </div>

  </div>
  <div class="col-md-12 text-right">
   <button class="btn btn-primary" type='submit'>Add Member</button>
  </div>
</form>
  </div>

  </div>
</div>
<!-- ./main content -->


 <?=theme_js("plugins/ui/moment/moment.min.js");?>
 <?=theme_js("plugins/pickers/daterangepicker.js");?>
 <?=theme_js("plugins/pickers/pickadate/picker.js");?>
  <?=theme_js("plugins/pickers/pickadate/picker.date.js");?>
  <?=theme_js("plugins/pickers/anytime.min.js");?>
  <?=theme_js("plugins/pickers/pickadate/picker.time.js");?>
  <?=theme_js("plugins/pickers/pickadate/legacy.js");?>
 <?=theme_js("pages/picker_date.js");?>
 <script type="text/javascript">
   $(document).ready(function(){
     $('#death_date').val('');
   });
 </script>
 <script type="text/javascript">
   $(document).ready(function(){
    
   });

   $('#create_member').validate({
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
        

    },
    messages:{
      name:{
        required: "please provide a name",
        minlength: "name must be atleast 3 characters long"
      },      
    },
    submitHandler: function() { 
      
      if(1 != ''){
          var f = document.getElementById('create_member');
          var formData = new FormData(f);
          
          for (var pair of formData.entries()) {
              console.log(pair[0]+ ', ' + pair[1]); 
          }
          if (formData) {
                $.ajax({
                    url: "<?=base_url('members/create');?>",
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
                      window.location = "<?=base_url('members');?>";
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