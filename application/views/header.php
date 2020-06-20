<html>
<head>
	<link href="<?php echo base_url()?>/css/bootstrap.min.css" rel="stylesheet">
	<script src="<?php echo base_url()?>/js/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
	<?php 
       if(isset($this->session->userdata["userid"])==true){ 
       if($this->session->userdata["role"]==0){
        ?>
        <a href="<?php echo base_url()?>adash" class="btn btn-primary"><b>CustomerList</b></a>
        <a href="<?php echo base_url()?>trandetail" class="btn btn-primary"><b>TranscationList</b></a>
        
         
        <?php }?>
        <a href="<?php echo base_url()?>/adash" class="btn btn-primary">Dashboard</a>
        <a href="<?php echo base_url()?>/logout">Logout</a>
    <?php   } ?>
    	<?php 
       if(isset($this->session->userdata["userid"])==false){ ?>
        <a href="<?php echo base_url()?>/login">Login</a>
    <?php   } ?>