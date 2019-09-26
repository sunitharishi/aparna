<div style="width:100%;height:100%;margin:0px;padding:0px">

<div style="width:100%;height:100%;margin:0px;padding:0px">

	<div>

        <a href="https://apmspl.com/" target="_blank"><img src="https://apmspl.com/wp-content/uploads/2018/09/APMS_Logo_b-1-2.png" alt="" style="width:200px"></a>  

    </div>

    <div><p style="margin:5px"></p></div>

    <div style="font-family:Arial,Helvetica,sans-serif"><p style="margin:5px;font-size:14px;color:red;line-height:50px; font-weight:bold;">Dear Team.</p></div>
    
	 <?php
		if(count($data)>0)
		{ 
		foreach($data as $key=>$asset)
		{
	?>
	<div style="font-family:Arial,Helvetica,sans-serif">
		 <p style="margin:5px;font-size:14px;">Your AMC for <b><?php echo $asset['aname']; ?></b> 
		 is going to expire on  date <b><?php echo date("d-m-Y", strtotime($asset['enddate'])); ?>.</b></p>
	</div>
	<?php } ?>
	
	 <div style="font-family:Arial,Helvetica,sans-serif"><p style="margin:5px;font-size:14px;">Requesting you to renew at the earliest.</p></div>
	 
	 <div style="font-family:Arial,Helvetica,sans-serif"><p style="margin:5px;font-size:14px;">Please find the following details:</p></div>
     <table border="1" cellpadding="0" cellspacing="2" width="100%" style="border:1px solid #CCC;">
    	   <tr bgcolor="#999999" height="25px">
           		<th>
                	Site
                </th>
                <th>
                	Asset
                </th>
                <th>
                	Location
                </th>
                <th>
                	Vendor
                </th>
                <th>
                	Type
                </th>
                <th>
                	Start Date
                </th>
                <th>
                	End Date
                </th>
           </tr>
			<?php
				foreach($data as $key=>$asset)
				{
			?>
    		<tr bgcolor="#FFFFFF" height="25px">
            	<td>
                	<?php echo $asset['site']; ?>
                </td>
                <td>
                	<?php echo $asset['aname']; ?>
                </td>
                <td>
                	<?php echo $asset['name']; ?>
                </td>
                <td>
                	<?php echo $asset['vendir']; ?>
                </td>
                <td>
                	<?php echo strtoupper($asset['amc_type']); ?>
                </td>
                <td>
                	<?php echo date("d-m-Y", strtotime($asset['startdate'])); ?>
                </td>
                <td>
                	<?php echo date("d-m-Y", strtotime($asset['enddate'])); ?>
                </td>
   			</tr>
            <?php } ?>
    </table>
	<?php } ?>

    <div style="text-align:center;font-family:Arial,Helvetica,sans-serif"><h2>Thank you for watching!</h2></div>

    <div style="font-family:Arial,Helvetica,sans-serif"><p style="margin:5px;font-size:14px"><b>For any queries or technical support please contact below</b></p></div>    

    <div><p></p></div>

    <div style="color:rgba(118,146,60,1);font-family:Arial,Helvetica,sans-serif"><p>T. Arun Kumar - 9502826126</p></div>

    <div style="color:rgba(118,146,60,1);font-family:Arial,Helvetica,sans-serif"><p>B. Naveen Teja - 8340998383</p></div>
    
    
    
    <div><p></p></div>

	

    <?php /*?><div style="font-family:Arial,Helvetica,sans-serif"><p style="margin:5px 5px 10px 5px"><b>Management:</b></p></div>

    <div style="color:rgba(118,146,60,1);font-family:Arial,Helvetica,sans-serif"><p>B. Ambikprasad  -  ambikaprasad@apmspl.com</p></div>

    <div style="color:rgba(118,146,60,1);font-family:Arial,Helvetica,sans-serif"><p>P. Pavankumar  - pavankumarpms@apmspl.com</p></div>

    <div style="color:rgba(118,146,60,1);font-family:Arial,Helvetica,sans-serif"><p>K. V. N. Madhu -  madhu-facilities@apmspl.com</p></div>

    <div><p></p></div><?php */?>

    

    <div style="background:#cccccc;padding:20px;color:#000000;font-weight:bold;font-family:Arial,Helvetica,sans-serif;clear:both;display:block"><p style="margin:5px;font-size:14px">#301 Door no: 6-3-352/2&amp;3,<br>Astral Heights, Road No.1,<br>Banjara Hills,<br>Hyderabad - 500 034.</p></div>
    
    <div><p></p></div>
     
    <div style="color:rgba(118,146,60,1);font-family:Arial,Helvetica,sans-serif"><p>Mandatory Disclosure Statements:</p></div>
    
    <div style="color:rgba(118,146,60,1);font-family:Arial,Helvetica,sans-serif"><p> This e-mail may contain trade secrets or privileged, undisclosed, or otherwise confidential information. If you have received this e-mail in error, you are hereby notified that any review, copying, or distribution of it is strictly prohibited. Please inform us immediately and destroy the original transmittal. Thank you for your cooperation.</p></div>


</div>

</div>

