
<?php

include("header.php");

?>

<?php  ?>
<div class="container" style="margin-top:20px; margin-left:70px; ">
<div class="row">
<a href="<?= base_url("Admin/addArticle") ?>" class="btn btn-primary"> Add Articles </a>
</div>
</div>


<div class="container" style="margin-top:20px">

    
    <?php if($info=$this->session->flashdata('Art_del')): ?>     
        <div class="row">
        <div class="col-lg-4">
            <div class="<?= $this->session->flashdata('msg_class')?>"><?php echo $info; ?> </div>
        </div>
        </div>

     <?php endif; ?>

    <?php if($info=$this->session->flashdata('Art_up')): ?>     
        <div class="row">
        <div class="col-lg-4">
            <div class="<?= $this->session->flashdata('msg_class')?>"><?php echo $info; ?> </div>
        </div>
        </div>

     <?php endif; ?>
    
    <div class="table">
    <table>
       <thead> 
        <tbody>
        
        <th>ID</th>
        <th>Article Title</th>
        <th>Edit</th>
        <th>Delete</th>
       </thead> 
       
       <?php if(count($articles)):?>
        <?php foreach ($articles as $art): ?>
       <tr>
            <td><?php echo $art->acticle_id; ?></td>
            <td><?php echo $art->article_title; ?></td>
            <td>
            
            <?=

                form_open('Admin/editArt'),
                form_hidden('id',$art->acticle_id),
                form_submit(['name'=>'submit','value'=>'Edit','class'=>'btn btn-success']),
                form_close();

?>
            </td>
            <td>
            <?=

                form_open('Admin/delArt'),
                form_hidden('id',$art->acticle_id),
                form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger']),
                form_close();


            ?>  
            </tr>
        <?php endforeach; ?>
        <?php else: ?>
            <tr>
            <td colspan="3">No Data Available</td>
            </tr>
        <?php endif; ?>
       </tbody>
    </table>
    </div>


</div>


<?php
include("footer.php");
?>