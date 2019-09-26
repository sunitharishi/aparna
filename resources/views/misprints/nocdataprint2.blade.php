<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>NOC</title>

    <!-- Bootstrap -->
    <link rel="icon" href="images/ICON.png">
    
    
    <style>
	
 	body
	{
	 font-family:Arial, Helvetica, sans-serif;
	}

	.heading-div
	{
	text-align:center;
	border:1px solid #000;
	margin-bottom:5px;
	}
	
	.second-div
	{
	 overflow:hidden;
	  width:100%;
	 float:left;
	}
	.second-div  table
	{
	 border-collapse:collapse;
	}
	.second-div table thead tr th
	{
	text-align:center;
	padding:4px;
	font-size:12px;
	}
	.second-div  table tbody tr td
	{
	text-align:center;
	padding:4px;
	font-size:12px;
	}
	.second-div table tbody tr td table thead tr th
	{
	 padding:11px 10px;
	}
	.second-div table tbody tr td table tbody tr td
	{
	 padding:11px 10px;
	}
	.inner-sarvoure tbody tr th
	{
	 padding:23px 8px !important;
	}
	.inner-sarvoure tbody tr td
	{
	 padding:23px 8px !important;
	}
	
	table tbody tr td table tbody tr td p, tbody tr td table thead tr th p
	{
	 white-space:nowrap;
	 word-break:normal;
	 margin-top:4px;
	 margin-bottom:4px;
	}
	
	</style>
  </head>

  <body>
   
<div class="manjeera">
    <div class="heading-div">
    <h3>Status of Fire NOC Renewals as on <?php echo $report_on; ?></h3>
    </div>
    <div class="row">
        <div class="second-div">
        
            <table width="100%" border="0">
                <tr>
                
               		<?php /*?> <td style="border:0px;vertical-align:top;width:50%;">
                		@if (count($graderes) > 0)
                    <table width="100%" border="1"  class="inner-sarvoure">
                        <thead>
                            <tr>
                            	<th colspan="4">SAROVAR GRANDE FIRE NOC DETAILS</th>
                            </tr>
                            <tr>
                                <th>S.No</th>
                                <th>Block</th>
                                <th><p>Valid up to</p></th>
                                <th>Name Changed to Society</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php $i = 1; if(isset($graderes)) { foreach($graderes as $nocdata) {?>
                            <tr>
                            
                            <td><span><?php echo $i; ?></span></td>
                            <td><span><?php echo  $nocdata['blockname'];?></span></td>
                            <td><span><?php echo $nocdata['valid_upto'];?></span></td>
                            <td><span><?php echo $nocdata['name_change_socity'];?></span></td>  
                        
                        </tr>     
                        <?php $i = $i + 1; } }?>
                        </tbody>
                    </table> 
                    @endif
               
            </td><?php */?>
            
            <td style="border:0px;vertical-align:top;">
           		 @if (count($avenues) > 0) 
                    <table width="100%" border="1">
                        <thead>
                            <tr style="border:1px solid #000;">
                            	<th colspan="4"><b>HILLPARK AVENUES FIRE NOC DETAILS</b></th>
                            </tr>
                            <tr>
                                <th>S.No</th>
                                <th>Block</th>
                                <th><p>Valid up to</p></th>
                                <th>Name Changed to Society</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php $i = 1; if(isset($avenues)) { foreach($avenues as $nocdata) {?>
                                <tr>
                                
                                <td><span><?php echo $i; ?></span></td>
                                <td><span><?php echo  $nocdata['blockname'];?></span></td>
                                <td><span><?php echo $nocdata['valid_upto'];?></span></td>
                                <td><span><?php echo $nocdata['name_change_socity'];?></span></td>  
                            
                            </tr>     
                            <?php $i = $i + 1; }  }?>
                            
                        </tbody>
                    </table>
                
            @endif 
            
            </td>
            </tr>
            </table>
        </div>
    
    </div>
<?php if(isset($pageoneval)) { if($pageoneval > 0) {echo "page -".$pageoneval; } }?>
</div>
                    
      

  </body>
</html>
 <script src="/vendors1/jquery/dist/jquery.min.js"></script>
 
