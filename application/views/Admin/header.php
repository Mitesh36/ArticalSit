<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article List</title>
    <!-- <link href="http://localhost/work/Assets/css/bootstrap1.min.css" rel="stylesheet"> -->
   
    <link href="<?= base_url("Assets/css/bootstrap.min.css") ?>" rel="stylesheet">
    
   
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Admin Panel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
<?php  
  if($this->session->userdata('id')){

    ?>
    <li> <a href="<?= base_url('Admin/logout'); ?>" class="btn btn-danger">Logout</a></li>
    <?php
  }
else{
   ?>
<p></p>
   <?php
}

?>
  
</nav>

<!--
<script src="https://localhost/work/Assets/js/bootstrap.bundle.min.js"/></script>
<script src="https://localhost/work/Assets/js/bootstrap.min.js"/></script>
-->

<script src="<?= base_url("/Assets/js/bootstrap.min.js") ?> "></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

</body>
</html>