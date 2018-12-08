<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">
    </div>
     
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
     
      </ul>
      <ul class="nav navbar-nav navbar-right">
        
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
       

    
<div class="container">

      <!-- Main component for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="row">
  			<div class="col-xs-6 col-md-3">
  			<h3><span class="label label-default">Student Name : <?php echo $this->session->userdata('student_name'); ?></span></h3>
    		<h3><span class="label label-default">Course Name : <?php echo $list['course_name']; ?></span></h3>
  			</div>
	 </div>

	<div class="row">
		<div class="col-xs-12" >
				<div class="col-xs-4"></div><h2 class="col-xs-4">Course Sets</h2><div class="col-xs-4"></div>
			</div>
		</div><br>
		<div class="row">
			<?php foreach ($set_list as $value) {?>
				  
					<a href="<?php echo base_url('Exams/NewExam/').$value['set_id']; ?>" class="col-xs-3 btn btn-default btn-lg" style="border-radius: 0px;margin-bottom:15px;"><?php echo $value["set_name"];?></a>
					<div class="col-xs-1"></div>
									
				 <?php } ?> 
		</div>
 

    <div class="row">
      <div class="col-xs-4"> </div>
    </div>
  </div>
</div> <!-- /container -->
      
     


<footer class="footer"></footer>
     
     

   

   
   

  
