<?php

include("header.php");
?>

<!--Form start -->

<div class="container" style="margin-top:20px">
    
    <h1>Register Your Details</h1>
             
    <?php if($error=$this->session->flashdata('user_added')): ?>     
        <div class="row">
        <div class="col-lg-5">
            <div class="alert alert-success"><?php echo $error; ?> </div>
        </div>
        </div>

     <?php endif; ?>



    <?php echo form_open('Admin/signUp'); ?>
    
    <div class="row">
    
        <div class="col-sm-5">
            <div class="form-group">
            <label for="username">Username:</label>
            <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter ur Username','name'=>'username','id'=>'username','value'=>set_value('username')]);?>
            </div>
        </div>
        <div class="col-sm-4" style="margin-top:40px">
        <?php   echo form_error('username'); ?> </div>
            
        <div class="col-sm-5">
            <div class="form-group">
            <label for="password">Password:</label>
            <?php echo form_password(['class'=>'form-control','placeholder'=>'Enter your Password','name'=>'password','id'=>'password','value'=>set_value('password')]);?>
            </div>
        </div>
        <div class="col-sm-4" style="margin-top:40px">
        <?php echo form_error('password'); ?> </div>

        
        <div class="col-sm-5">
            <div class="form-group">
            <label for="firstname">Firstname:</label>
            <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter ur firstname','name'=>'firstname','id'=>'firstname','value'=>set_value('firstname')]);?>
            </div>
        </div>
        <div class="col-sm-4" style="margin-top:40px">
        <?php   echo form_error('firstname'); ?> </div>

        
        <div class="col-sm-5">
            <div class="form-group">
            <label for="lastname">Lastname:</label>
            <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter ur lastname','name'=>'lastname','id'=>'lastname','value'=>set_value('lastname')]);?>
            </div>
        </div>
        <div class="col-sm-4" style="margin-top:40px">
        <?php   echo form_error('username'); ?> </div>


        
        <div class="col-sm-5">
        <?php echo form_submit(['type'=>'Submit','class'=>'btn btn-primary','value'=>'Signup'])?>
        <?php echo form_reset(['type'=>'reset','class'=>'btn btn-info','value'=>'Reset'])?>
      
        </div>
    </div>
    
    </div>
<?php
include("footer.php");
?>