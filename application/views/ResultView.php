
<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header"></div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav"></ul>
        <ul class="nav navbar-nav navbar-right"></ul>
      </div><!--/.nav-collapse -->
  </div>
</nav>
<!-- this is result view  -->
    
<div class="container">
<div class="jumbotron">
      <div style="float: right;">
       <button class="btn btn-info" onclick="window.print();">Print  </button>
      <button class="btn btn-danger" id="btnExport"> Export To Excel</button>
      </div>
      <h2>Result</h2>
      <div >
        <table class="table table-bordered" id="table_wrapper" border="1">
          <thead>
          <tr>
            <th>Q No</th>
            <th>Question</th>
            <th>Given Answer</th>
            <th>Right Answer</th>
            <th>Marks</th>
          </tr>
        </thead>
        <tbody>
        <?php 
          $i=1;
          $toalt=0;
        ?>
          <?php if(!empty($result)) {foreach ($result as $answer){?>
            <?php
              if($answer['answer']==$answer['std_answer']){$toalt += $answer['marks'];}elseif($answer['answer']==$answer['std_answer']){$toalt += $answer['marks'];}elseif($answer['answer']==$answer['std_answer']){$toalt += $answer['marks'];}elseif($answer['answer']==$answer['std_answer']){ $toalt += $answer['marks'];} else{}
            ?>
          <?php 
           $cls=""; 
          if($answer['answer']==$answer['std_answer']){$cls="success";}elseif($answer['answer']==$answer['std_answer']){$cls="success";}elseif($answer['answer']==$answer['std_answer']){$cls="success";}elseif($answer['answer']==$answer['std_answer']){$cls="success";} else{$cls="danger";}?>

          <tr class='<?=$cls?>'>
            <td><?=$i++;?></td>
            
            
            <td><?php echo $answer['question']; ?></td>
            <td><?php echo $answer['std_answer']; ?></td>
            <td><?php echo $answer['answer']; ?></td>
            <td><?php if($answer['answer']==$answer['std_answer']){echo $answer['marks'];}elseif($answer['answer']==$answer['std_answer']){echo $answer['marks'];}elseif($answer['answer']==$answer['std_answer']){echo $answer['marks'];}elseif($answer['answer']==$answer['std_answer']){ echo $answer['marks'];} else{echo 0;}?></td>
        </tr>
       
        <?php } }?>
  
       <tr>
         <td>Total Marks : <?php if(!empty($answer['set_total_marks'])){echo $answer['set_total_marks'];} ?><br></td>
         <td>Passing Marks : <?php if(!empty($answer['set_passing_mark'])){echo $answer['set_passing_mark'];} ?></td>
         <td>Obtained Marks : <?php echo $toalt;?></td>
         <td colspan="2">Status : <?php if(!empty($answer['set_passing_mark'])){if ($toalt>=$answer['set_passing_mark']) {
             echo "Pass";
           }else{echo 'Fail';}} ?></td>
       </tr>
        </tbody>
      </table>
      </div>
      </div>
      
     
      
     
     

  </div>
</div> <!-- /container -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script>
  $(document).ready(function() {
  $("#btnExport").click(function(e) {
    e.preventDefault();

    //getting data from our table
    var data_type = 'data:application/vnd.ms-excel';
    var table_div = document.getElementById('table_wrapper');
    var table_html = table_div.outerHTML.replace(/ /g, '%20');

    var a = document.createElement('a');
    a.href = data_type + ', ' + table_html;
    a.download = 'exported_table_' + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
    a.click();
  });
});
</script>

  
