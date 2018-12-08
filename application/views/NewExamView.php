<style type="text/css">.btn-success{background-color: #17AA1C;}</style>

<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header"></div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav"></ul>
        <ul class="nav navbar-nav navbar-right"></ul>
      </div><!--/.nav-collapse -->
  </div>
</nav>

<div class="container">
  <div class="jumbotron">
    <div class="row">
      <div class="col-xs-12" >
        <div class="col-xs-4"></div><h2 class="col-xs-4">Start Exam</h2><div class="col-xs-4"></div>
      </div>
    </div><br>
    <div class="row">

		
				 <button class="col-xs-3 btn btn-default btn-lg" style="border-radius: 0px;margin-bottom:15px;">Course : <?php echo $this->session->userdata('student_course');?></button>
          <div class="col-xs-1"></div>

					<button class="col-xs-3 btn btn-default btn-lg" style="border-radius: 0px;margin-bottom:15px;"> Set : <?php echo $set_list["set_name"];?></button>
					<div class="col-xs-1"></div>

          <button class="col-xs-3 btn btn-default btn-lg" style="border-radius: 0px;margin-bottom:15px;"> Duration : <?php echo $set_list["set_duration"];?> Hours</button>
          <div class="col-xs-1"></div>

          <button class="col-xs-3 btn btn-default btn-lg" style="border-radius: 0px;margin-bottom:15px;">Total Marks : <?php echo $set_list["set_total_marks"];?></button>
          <div class="col-xs-1"></div>

           <button class="col-xs-3 btn btn-default btn-lg" style="border-radius: 0px;margin-bottom:15px;">Passing Marks : <?php echo $set_list["set_passing_mark"];?></button>
          <div class="col-xs-1"></div>
          <button class="col-xs-3 btn btn-default btn-lg" style="border-radius: 0px;margin-bottom:15px;"><?php echo $total_ques;?></button>
          <div class="col-xs-1"></div>

          <div class="col-xs-1"></div>
          <select class="col-xs-3" style="height:38px;" id="lang" onchange="SelectLanguag();">
            <option selected="" disabled="">Select Language</option>
            <option value="english" >English</option>
            <option value="hindi" >Hindi</option>
            <option value="urdu">Urdu</option>
          
          </select>
          <div class="col-xs-1"></div>
          <div >
          <a id="test" href="<?php echo base_url('Eexam/StartTest/').$set_list['set_id'].'/1'; ?>" class="col-xs-3 btn btn-success btn-lg disabled"  style="border-radius: 0px;margin-bottom:15px;">Start Exam</a></div>
          
            
         

          <div class="col-xs-1"></div>



		</div>

    <div class="row">
   
      <div class="col-xs-4"></div>
    </div>
  </div>
</div> <!-- /container -->

    <footer class="footer"></footer>
<script>

function SelectLanguag() {
  //alert("work");
  var lang=$('#lang').val();
  //
  
  $.ajax({
    type:"POST",
    url:"<?php echo base_url();?>Eexam/SetLanguage/",
    data:{lang:lang},
    success:function(data)
    {
      $("#test").removeClass("disabled");
      alertify.notify(data+' has been set as your default language', 'success', 5, function(){  console.log('dismissed'); });
      //alert(data);
    }
  }); 
}
</script>