<style type="text/css">
.btn-success{
  background-color: #17AA1C;
  border-radius: 0;
}
</style>

  
   <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
         
         
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="#">Duration: <?php echo $duration['set_duration']?> Hours</a></li>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <li><a href="#" class="disabled">Question Marks: <?=$list['marks']?></a></li>
          <li><a href="<?php echo base_url('Login/Logout'); ?>" >Logout</a></li>
           
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    
    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="row">
          <div class="col-md-12">
          <p style="word-wrap: break-word;">
           <small>Question <?php //echo $que_num;?>:</small><br>
            <?=$list['question']?>

          </p>
          </div><br><br><br><br>
          <div class="row">
            <div class="col-md-10">
               <div class="alert <?php if($list['std_answer']!="null"){if($list['std_answer']=="a"){echo "alert-info";}}?>">
                <input type="radio" name="answer" value="a" <?php if($list['std_answer']!="null"){if($list['std_answer']=="a"){echo "checked";}}?>><span> <?=$list['a_obj']?></span>
                  
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-10">
               <div class="alert <?php if($list['std_answer']!="null"){if($list['std_answer']=="b"){echo "alert-info";}}?>">
                <input type="radio" name="answer" value="b" <?php if($list['std_answer']!="null"){if($list['std_answer']=="b"){echo "checked";}}?>><span> <?=$list['b_obj']?></span>
                  
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-10">
               <div class="alert <?php if($list['std_answer']!="null"){if($list['std_answer']=="c"){echo "alert-info";}}?>">
                <input type="radio" name="answer"  value="c" <?php if($list['std_answer']!="null"){if($list['std_answer']=="c"){echo "checked";}}?>><span> <?=$list['c_obj']?></span>
                  
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-10">
               <div class="alert <?php if($list['std_answer']!="null"){if($list['std_answer']=="d"){echo "alert-info";}}?>">
                <input type="radio" name="answer"  value="d" <?php if($list['std_answer']!="null"){if($list['std_answer']=="d"){echo "checked";}}?>><span> <?=$list['d_obj']?></span>
                  
              </div>
            </div>
          </div>
           

         
        </div>
      </div>
        <div id="response"></div>
       <div class="row"> <div class="col-md-12">
       <?php
      $student_id =  $this->session->userdata("student_id");
       $TotalQuestions++;
       if($TotalQuestions==$next_num){?>

          <a href="<?php echo base_url('Eexam/FinalResult/').$set_id.'/'.$student_id;?>" class="btn btn-success" style="float:right ;">Submit</a>&nbsp;
       <?php }else{

       echo '<a class="btn btn-success" style="float: right;" onClick="SubmitAns('.$set_id.','.$list['question_id'].',1,'.$next_num.')">Next </a>&nbsp;';

       }?>
       
       
      
      
      <?php

       
       if($pre_num<=0){

       }else{
        echo '<a class="btn btn-success" style="float: left;" onClick="SubmitAns('.$set_id.','.$list['question_id'].',1,'.$pre_num.')">Previous </a>&nbsp;';
       }
       ?>
      
    </div></div>

    </div> <!-- /container -->
     
     <br><br>

   

   
   
<!-- 
    <footer class="footer">
  
    </footer> -->
 

<script >
  function SubmitAns(set_id,q_id,type,q_num)
  {
    var selectedAnswer = $("input[type='radio']:checked").val();
   if(selectedAnswer==null){
    selectedAnswer="null";
   }
   
   $.post('<?php echo base_url();?>Eexam/SubmitQuestion/',{set_id:set_id,q_id:q_id,type:type,selected:selectedAnswer,q_num},function(data){
      $("#response").html(data);
   });
   
 }
   
</script>