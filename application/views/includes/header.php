
<?php 
        if($this->session->userdata('student_id')=="")
        {
             redirect(base_url('Login'));
        }
 ?>

<!DOCTYPE HTML>
<html>
<head>
<title>E-Exam</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="keywords" content="Easy Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
 
<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="<?php echo base_url('assets/css/style.css');?>" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> 
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/icon-font.min.css'); ?>" type='text/css' />
<!-- //lined-icons -->
<!-- chart -->

<!-- //chart -->
<!--animate-->
<link href="<?php echo base_url('assets/css/animate.css'); ?>" rel="stylesheet" type="text/css" media="all">

<link href="<?php echo base_url('assets/css/custom.css'); ?>" rel="stylesheet" type="text/css" media="all">
<!-- alertify css -->
<link href="<?php echo base_url('assets/alertify/css/alertify.css');?>" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url('assets/alertify/css/alertify.min.css');?>" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="<?php echo base_url('assets/alertify/css/themes/default.min.css');?>">


    

<!-- Placed js at the end of the document so the pages load faster -->

</head> 
<body>   
        
             
             
            
 