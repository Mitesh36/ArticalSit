<?php

include("header.php");
?>

<!--Form start -->

<div class="container" style="margin-top:20px">
    
    <h1>Admin Login</h1>
          
   

     <?php if($error=$this->session->flashdata('login_failed')): ?>     
        <div class="row">
        <div class="col-lg-5">
            <div class="alert alert-danger"><?php echo $error; ?> </div>
        </div>
        </div>

     <?php endif; ?>

      
    
    <?php echo form_open('Admin/index'); ?>
    
    <div class="row">
    
        <div class="col-sm-5">
            <div class="form-group">
            <label for="Username">Username:</label>
            <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter ur Username','name'=>'uname','id'=>'Username','value'=>set_value('uname')]);?>
            </div>
        </div>
        <div class="col-sm-4" style="margin-top:40px">
        <?php   echo form_error('uname'); ?> </div>
            
        <div class="col-sm-5">
            <div class="form-group">
            <label for="pass">Password:</label>
            <?php echo form_password(['class'=>'form-control','placeholder'=>'Enter your Password','name'=>'pass','id'=>'pass','value'=>set_value('pass')]);?>
            </div>
        </div>
        <div class="col-sm-4" style="margin-top:40px">
        <?php echo form_error('pass'); ?> </div>
        
        <div class="col-sm-5">
        <?php echo form_submit(['type'=>'Submit','class'=>'btn btn-primary','value'=>'Login'])?>
        <?php echo form_reset(['type'=>'reset','class'=>'btn btn-info','value'=>'Reset'])?>
        <a href="<?= base_url("Admin/signUp") ?>">Signup</a>
        </div>
    </div>
    
    </div>
<?php
include("footer.php");
?>