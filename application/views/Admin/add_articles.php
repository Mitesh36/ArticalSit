<?php

include("header.php");
?>

<!--Form start -->

<div class="container" style="margin-top:20px">
    
    <h1>Add Article</h1> 
    <a class="btn btn-primary" href="<?= base_url("Admin/welcome") ?>">Dashboard</a>

    <?php if($info=$this->session->flashdata('Art_added')): ?>     
        <div class="row">
        <div class="col-lg-5">
            <div class="alert alert-success"><?php echo $info; ?> </div>
        </div>
        </div>

     <?php endif; ?>



    <?php echo form_open('Admin/insertArt'); ?>
    <?php echo form_hidden('id',$this->session->userdata('id')); ?>
    <div class="row">
    
        <div class="col-sm-5">
            <div class="form-group">
            <label for="article_title">Article Title:</label>
            <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter ur Article Title','name'=>'article_title','id'=>'article_title','value'=>set_value('article_title')]);?>
            </div>
        </div>
        <div class="col-sm-4" style="margin-top:40px">
        <?php   echo form_error('article_title'); ?> </div>
            
        <div class="col-sm-5">
            <div class="form-group">
            <label for="article_body">Article Body:</label>
            <?php echo form_textarea(['class'=>'form-control','placeholder'=>'Enter your Article Body','name'=>'article_body','id'=>'article_body','value'=>set_value('article_body')]);?>
            </div>
        </div>
        <div class="col-sm-4" style="margin-top:40px">
        <?php echo form_error('article_body'); ?> </div>
        
        <div class="col-sm-5">
        <?php echo form_submit(['type'=>'Submit','class'=>'btn btn-primary','value'=>'Add'])?>
        <?php echo form_reset(['type'=>'reset','class'=>'btn btn-info','value'=>'Reset'])?>
        </div>
    </div>
    
    </div>
<?php
include("footer.php");
?>