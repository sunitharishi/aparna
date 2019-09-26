 
    <div class="panel panel-default panelmar add-nnnewww">    	
        <div class="panel-heading dark-lightss" style="margin-top:10px; margin-bottom:10px;">
            <span>Attendance Status Report </span> [<a href="/attendance" class="task-calendar" title="Calendar">ListView</a> ]
        </div>		  
		 <?php
		 if($empname == "") { $empname = $empname_val; }
		 
		 echo "<div class='col-sm-4' style='padding-left:0px;'><b>EMP CODE: ".$empcode."</b></div>";
		 echo "<div class='col-sm-4'><b> EMP NAME: </b>". $empname."</div>";
		 echo "<div class='col-sm-4'><b> DEPARTMENT: </b>". $department."</div><br><br>";
		 
		 $m = 0; 
		 $y = 0;
		 $tf = 0;     
		     
			  
			   foreach($yearmonth as $kk => $value){ ?>
		<br />
		<?php  
		
		 echo  "<b>".date('F', mktime(0, 0, 0, $value['month'], 10)); ?> - <?php   echo  $value['year']."</b>"; ?>&nbsp; &nbsp; &nbsp;
		 <?php  echo "<b style='color:red;'>Absent: </b><b>".getattendstatus($value['year'], $value['month'],$empcode,'absent')."</b>"; ?> &nbsp; &nbsp; &nbsp;
		 <?php echo "<b style='color:green;'>Present: </b><b>".getattendstatus($value['year'], $value['month'],$empcode,'present')."</b>";  ?> &nbsp; &nbsp; &nbsp;
		 <?php echo "<b style='color:orange;'>Not Entered: </b><b>".getattendstatus($value['year'], $value['month'],$empcode,'notenter')."</b>"; ?> &nbsp; &nbsp; &nbsp;
			    <table cellpadding="0" cellspacing="0" border="1" width="100%" class="table table-striped attend-table">
                       <tr>
                         <th>Date</th>
                         <?php
                          for($dm=1; $dm<=$value['days']; $dm++) {
                           $date = $value['year'].'_'.$value['month']."_".$dm;
                         
                             ?>
                                <td <?php if($yearmon[$date]['dflag'] == "1") { ?> style="color:#FF0000;" <?php } ?>><?php echo $dm; ?></td>
                             <?php 
                            
                          }
                         ?> 
                      </tr>
                       <tr>
                         <th>Status</th>
                          <?php
                          for($dm=1; $dm<=$value['days']; $dm++) {
                             $date = $value['year'].'_'.$value['month']."_".$dm;
                             echo '<td>'.$yearmon[$date]['status'].'</td>';
                             
                          }?>
                      </tr>
                       <tr>
                         <th>In Time</th>
                          <?php
                          for($dm=1; $dm<=$value['days']; $dm++) {
                             $date = $value['year'].'_'.$value['month']."_".$dm;
                             echo '<td>'.$yearmon[$date]['intime'].'</td>';
                             
                          }?>
                      </tr>
                       <tr>
                         <th>Out Time</th>
                          <?php
                          for($dm=1; $dm<=$value['days']; $dm++) {
                             $date = $value['year'].'_'.$value['month']."_".$dm;
                             echo '<td>'.$yearmon[$date]['outtime'].'</td>';
                             
                          }?>
                      </tr>
                       <tr>
                         <th>Total</th>
                           <?php
                          for($dm=1; $dm<=$value['days']; $dm++) {
                             $date = $value['year'].'_'.$value['month']."_".$dm;
                             echo '<td>'.$yearmon[$date]['duration'].'</td>';
                             
                          }?>
                      </tr>
		  
              </table>
                <?php   }
             
             ?>
           
        
    </div>
 