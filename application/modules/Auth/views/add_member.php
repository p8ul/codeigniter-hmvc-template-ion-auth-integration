<!-- Main content -->
<div class="content-wrapper">
 <div class='panel'>
   <div class="panel-body">
  <div class="row">
  <div class='col-md-12 ' id="infoMessage"><?php echo $message;?></div>
  <!-- for -->
  <?php echo form_open("auth/create_user");?>
  <div class='col-md-6'>
      <!-- fistname -->
    <div class="col-md-6">
     <div class="form-group">
      <label>First Name:</label>
       <?php echo form_input($first_name,FALSE,'class="form-control"');?>
     </div>
    </div>
    <!-- middle name -->
    <div class="col-md-6">
     <div class="form-group">
      <label>Middle Name:</label>
      <?=form_input($identity,FALSE,'class="form-control"');?>
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
     <div class="form-group">
      <label>Email:</label>
      <?php echo form_input($email,FALSE,'class="form-control"');?>
     </div>
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
      <label>Transfer Date</label>
      <input type="text" class="form-control daterange-single" name="transfer_date">
     </div>
    </div>
    <!-- death -->
    <div class="col-md-6">
     <div class="form-group">
      <label>Death Date</label>
      <input type="text" class="form-control daterange-single" id="death_date" name="death_date">
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
 <?=theme_js("pages/picker_date.js");?>
 <script type="text/javascript">
   $(document).ready(function(){
     $('#death_date').val('');
   });
 </script>