<!Doctype>
<html>
<head>
<style>

body

{

 font-family:Arial, Helvetica, sans-serif;

}

 table

 {

  border-collapse:collapse;
  border:1px solid #000;
  font-size:12px;

 }

 table tr td, table tr th

 {

  padding:8px;
  text-align:center;

 }
 table tr td img

 {

  width:150px;

  height:150px;

 }

 table tr td:first-child

 {

  text-align:center;

  overflow:hidden;

 }
 
 hr

 {

  border-top:0.5px solid #000;

 }
 .aparna-logo
{
 background-color:#0157a4;
 position:absolute;
 right:0px;
 top:-20px;
 padding:4px;
 width:110px;
 height:auto;
 margin-bottom:25px;
}
 

</style>
</head>
<body>
	<div class="mmrreport-eading" style="height:50px;">
		 <img src="images/apms-logo.png" class="aparna-logo" >
	</div>
    <table  border="1" width="100%" class="apms-reporttable  snag-reports">
		 <?php 
			if (strpos($fields, 'all') !== false) 
			{
				$fields = $fields;
			}
			else
			{
				$fields1 = 'all,';
				$fields = $fields1.$fields;
			}
		 	
		 	$k = rtrim($fields,',');
			$fields = explode(",",$k);	
			$j=0;
			foreach($fields as $f)
			{
				if($f!='all') $j = $j+1;
			}
			$j = $j+1;
		?>

       <tbody>
	   
	   	<tr>

              <th>S.No</th>
			  <?php if (array_search("observation", $fields)) {?>
              <th>Observation</th>
              <?php } if (array_search("location", $fields)) {?>
              <th>Location</th>
			  <?php } if (array_search("picture", $fields)) {?>
              <th style="width:150px; padding:1px;">Picture</th>
			  <?php } if (array_search("recommendations", $fields)) {?>
              <th>Recommendations</th>
			  <?php } if (array_search("snagdate", $fields)) {?>
              <th>Snag Date</th>
			  <?php }if (array_search("timeline", $fields)) {?>
              <th>Timeline given by Projects team</th>
			  <?php } if (array_search("status", $fields)) {?>
              <th>Status</th>
			  <?php } ?>
           </tr>

         <?php 
		$i=0;
		$k=0; 
		 $nsite = "";
		 $psite = "";
		 $ncat = "";
		 $pcat = "";
		 $j = $j-2;
		?>

         @if (count($auditresult) > 0)

        @foreach ($auditresult as $kk => $tt)
		
		<?php
			$psite = $nsite;
			 $pcat = $ncat;
			 $nsite = $tt['site'];
			 $ncat = $tt['category'];
		?>
		
		<?php $i = $i + 1;?>
		<?php if (array_search("sname", $fields) && $psite!=$nsite) { ?>
		<tr style="background-color:#000000; color:#FFFFFF; font-size:18px;">
			<td colspan="<?php echo $j; ?>">
				 <?php echo $tt['site'];?>
			</td>
		</tr>
		<?php } if (array_search("cname", $fields) && $pcat!=$ncat) {?> 
		<tr style="background-color:#000000; color:#FFFFFF; font-size:18px;">
			<td colspan="<?php echo $j; ?>">
				<?php echo $tt['category'];?>
			</td>
		</tr>		
		<?php } ?>
		<tr>
		<td><?php echo $i; ?></td>
		<?php if (array_search("observation", $fields)) {?>
        <td style="text-align:left;"><?php echo $tt['observation'];?></td>
		<?php } if (array_search("location", $fields)) {?>
        <td><?php echo $tt['location'];?></td>
		<?php } if (array_search("picture", $fields)) {?>
        <td style="text-align:center; width:150px; padding:1px;"> 
			<?php if($tt['imagepath']!="") {  ?> 
            <img src="http://testing.rreg.in/uploads/snag/thumb/<?php echo $tt['imagepath']; ?>"  />                         	
			<?php } ?>
        </td>
		<?php }  if (array_search("recommendations", $fields)) {?>
        <td><?php echo $tt['recommendation'];?></td>
		<?php } if (array_search("snagdate", $fields)) {?>
        <td style="width:70px;"><?php if($tt['reporton']!="" && $tt['reporton']!='1970-01-01') echo date("d-m-Y",strtotime($tt['reporton'])); else echo "";?></td>
		<?php } if (array_search("timeline", $fields)) {?>
        <td style="width:70px;"><?php if($tt['timeline']!="" && $tt['timeline']!='1970-01-01') echo date("d-m-Y",strtotime($tt['timeline'])); else echo "";?></td>
		<?php } if (array_search("status", $fields)) {?>
        <td><?php echo $tt['status']; ?></td>
		<?php } ?>
        </tr>      

       @endforeach

    @else 

    

        <tr>

            <td colspan="<?php echo $j; ?>">No entries in table</td>

        </tr>

    @endif

    </tbody>
 </table>
</body>
</html>

 

  