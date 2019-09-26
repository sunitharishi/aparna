<div class="row" style="width:100%; overflow:hidden; margin-top:20px;">  
    <div class="scope-nature">
         <div class="mmr-manpower-table-div">
        	<input type="hidden" name="type" value="5"/>
			<input type="hidden" name="site" value="<?php echo $site; ?>"/>
			<input type="hidden" name="year" value="<?php echo Request::segment(4);; ?>"/>
			<input type="hidden" name="month" value="<?php echo Request::segment(5); ?>"/>
			<div>
				<a href="javascript:void(0)" style="float:right;" class="btn aturl green-back btn btn-primary" 
				data-toggle="modal" data-target="#summary">Excess Manpower</a>
			</div>
            <div class="col-sm-12"  style="margin-top:10px;">
               
              <table width="100%" border="1">
                <thead> 
					<tr bgcolor="#357ebd">
						<td colspan="10" height="35px" align="center">
							<b>Manpower Deployement Sheet for <?php echo $sites_attr_names[$site]; ?></b>
						</td>
					</tr>
                    <tr>
                        <th rowspan="2">S.no</th>
                        <th rowspan="2">Particulars</th>
                        <th colspan="4" style="text-align:center;">Shift</th>
                        <th rowspan="2" style="text-align:center; width:100px;">Manpower (Nos.)</th>
                    </tr>
                    <tr>
                        <th width="100px">General</th>
                        <th width="100px">A</th>
                        <th width="100px">B</th>
                        <th width="100px">C</th>
                    </tr>
                </thead>
				 @if(isset($manpowers))
                  @if(count($manpowers) > 0)
				<tbody>
						<?php 
							$i=0;
							$s = 0;
							$f = 0;
							$c = 0;
							$e = 0;
						?>
						@foreach($manpowers as $mkey => $mrs)
						<?php  
							$i = $i+1;
							if($mrs['type']=='Shared') {
							if($s==0){
						?>
						<tr>
							<td colspan="7">
								<b>Shared (On need basis):</b>
							</td>
						</tr>
						<?php } ?>
						<tr>
							<td>
								<?php echo $i; ?>
								<?php if($updated=='Yes'){ ?>
								<input type="hidden" name="ids[]" value="<?php echo $mrs['ids']; ?>" />
								<?php } else { ?>
								<input type="hidden" name="ids[]" value="" />
								<?php } ?>
								<input type="hidden" name="types[]" value="Shared" />
								<input type="hidden" name="sorder[]" value="<?php echo $mrs['sorder']; ?>" />
							</td>
							<td>
								<input type="text" value="<?php echo $mrs['title']; ?>" name="title[]" />
							</td>
							<td>
								<input type="number" style="width:90px;" value="<?php echo $mrs['general']; ?>" name="general[]" />
							</td>
							<td>
								<input type="number" style="width:90px;" value="<?php echo $mrs['a']; ?>" name="a[]" />
							</td>
							<td>
								<input type="number" style="width:90px;" value="<?php echo $mrs['b']; ?>" name="b[]" />
							</td>
							<td>
								<input type="number" style="width:90px;" value="<?php echo $mrs['c']; ?>" name="c[]" />
							</td>
							<td>
								<input type="number" style="width:90px;" value="<?php echo $mrs['mnos']; ?>" name="mnos[]" />
							</td>
						</tr>
						<?php }  $s = $s+1; ?>
						<?php 
							if($mrs['type']=='Full Time') { 
							if($f==0){
						?>
						<tr>
							<td colspan="7">
								<b>Full Time:</b>
							</td>
						</tr>
						<?php } ?>
						<tr>
							<td>
								<?php echo $i; ?>
								<?php if($updated=='Yes'){ ?>
								<input type="hidden" name="ids[]" value="<?php echo $mrs['ids']; ?>" />
								<?php } else { ?>
								<input type="hidden" name="ids[]" value="" />
								<?php } ?>
								<input type="hidden" name="types[]" value="Full Time" />
								<input type="hidden" name="sorder[]" value="<?php echo $mrs['sorder']; ?>" />
							</td>
							<td>
								<input type="text" value="<?php echo $mrs['title']; ?>" name="title[]" />
							</td>
							<td>
								<input type="number" style="width:90px;" value="<?php echo $mrs['general']; ?>" name="general[]" />
							</td>
							<td>
								<input type="number" style="width:90px;" value="<?php echo $mrs['a']; ?>" name="a[]" />
							</td>
							<td>
								<input type="number" style="width:90px;" value="<?php echo $mrs['b']; ?>" name="b[]" />
							</td>
							<td>
								<input type="number" style="width:90px;" value="<?php echo $mrs['c']; ?>" name="c[]" />
							</td>
							<td>
								<input type="number" style="width:90px;" value="<?php echo $mrs['mnos']; ?>" name="mnos[]" />
							</td>
						</tr>
						<?php $f = $f+1; }  ?>
						<?php 
							if($mrs['type']=='Club House') { 
							if($c==0){
						?>
						<tr>
							<td colspan="7">
								<b>Club House:</b>
							</td>
						</tr>
						<?php } ?>
						<tr>
							<td>
								<?php echo $i; ?>
								<?php if($updated=='Yes'){ ?>
								<input type="hidden" name="ids[]" value="<?php echo $mrs['ids']; ?>" />
								<?php } else { ?>
								<input type="hidden" name="ids[]" value="" />
								<?php } ?>
								<input type="hidden" name="types[]" value="Club House" />
								<input type="hidden" name="sorder[]" value="<?php echo $mrs['sorder']; ?>" />
							</td>
							<td>
								<input type="text" value="<?php echo $mrs['title']; ?>" name="title[]" />
							</td>
							<td>
								<input type="number"  style="width:90px;" value="<?php echo $mrs['general']; ?>" name="general[]" />
							</td>
							<td>
								<input type="number" style="width:90px;" value="<?php echo $mrs['a']; ?>" name="a[]" />
							</td>
							<td>
								<input type="number" style="width:90px;" value="<?php echo $mrs['b']; ?>" name="b[]" />
							</td>
							<td>
								<input type="number" style="width:90px;" value="<?php echo $mrs['c']; ?>" name="c[]" />
							</td>
							<td>
								<input type="number" style="width:90px;" value="<?php echo $mrs['mnos']; ?>" name="mnos[]" />
							</td>
						</tr>
						<?php $c = $c+1; }  ?>
						
						<?php 
							if($mrs['type']=='Excess') { 
							if($e==0){
						?>
						<tr>
							<td colspan="7">
								<b>Excess Manpower:</b>
							</td>
						</tr>
						<?php } ?>
						<tr>
							<td>
								<?php echo $i; ?>
								<?php if($updated=='Yes'){ ?>
								<input type="hidden" name="ids[]" value="<?php echo $mrs['ids']; ?>" />
								<?php } else { ?>
								<input type="hidden" name="ids[]" value="" />
								<?php } ?>
								<input type="hidden" name="types[]" value="Excess" />
								<input type="hidden" name="sorder[]" value="<?php echo $mrs['sorder']; ?>" />
							</td>
							<td>
								<input type="text" value="<?php echo $mrs['title']; ?>" name="title[]" />
							</td>
							<td>
								<input type="number"  style="width:90px;" value="<?php echo $mrs['general']; ?>" name="general[]" />
							</td>
							<td>
								<input type="number" style="width:90px;" value="<?php echo $mrs['a']; ?>" name="a[]" />
							</td>
							<td>
								<input type="number" style="width:90px;" value="<?php echo $mrs['b']; ?>" name="b[]" />
							</td>
							<td>
								<input type="number" style="width:90px;" value="<?php echo $mrs['c']; ?>" name="c[]" />
							</td>
							<td>
								<input type="number" style="width:90px;" value="<?php echo $mrs['mnos']; ?>" name="mnos[]" />
							</td>
						</tr>
						<?php $e = $e+1; }  ?>
						@endforeach
				</tbody> 
				 @endif
                    @endif           
            </table>
           </div><bR clear="all" /><br /><br />
		   <div class="updatebtn" style="text-align:center; float:none;">
                {!! Form::submit('Update', ['class' => 'btn btn-danger']) !!} 
				{!! Form::button('Reset', ['class' => 'btn btn-reser', 'id' => 'resetall']) !!}
            </div> 
      </div>
    </div>	 
</div>
<script type="text/javascript">/*
		function checkValue(tvalue,cvalue,dis)
		{
			var tsvalue = $("#"+tvalue).val();
			if(tsvalue!="" && tsvalue>0) tsvalue = tsvalue;
			else tsvalue = 0;
			console.log(tsvalue);
			console.log(cvalue);
			if(parseInt(tsvalue)>parseInt(cvalue) || parseInt(tsvalue)==parseInt(cvalue))
			{
				
			}
			else
			{
				
			}
		}*/
		function checkShared(key,value,dis)
		{
			var tvalue=0;
			var sgen = key+'_sgen';
			sgen = $("#"+sgen).val();
			tvalue = parseInt(tvalue);
			if(sgen!="" || sgen>0) 
			{
				sgen =  parseInt(sgen);
				tvalue = tvalue+sgen;
			}
			var sa = key+'_sa';
			sa = $("#"+sa).val();
			if(sa!="" || sa>0)
			{
				sa = parseInt(sa);
				tvalue = tvalue+sa;
			}
			var sb = key+'_sb';
			sb = $("#"+sb).val();
			if(sb!="" || sb>0) 
			{
				sb = parseInt(sb);
				tvalue = tvalue+sb;
			}
			var sc = key+'_sc';
			sc = $("#"+sc).val();
			if(sc!="" || sc>0) 
			{
				sc = parseInt(sc);
				tvalue = tvalue+sc;
			}
			var tv = key+'_stvalue';
			if(tvalue>value)
			{
				$("#"+dis).val("");
			}
			else
			{
				$("#"+tv).val(tvalue);
			}
		}
		
		function fullcheckShared(key,value,dis)
		{
			var tvalue=0;
			var sgen = key+'_fgen';
			sgen = $("#"+sgen).val();
			tvalue = parseInt(tvalue);
			if(sgen!="" || sgen>0) 
			{
				sgen =  parseInt(sgen);
				tvalue = tvalue+sgen;
			}
			var sa = key+'_fa';
			sa = $("#"+sa).val();
			if(sa!="" || sa>0)
			{
				sa = parseInt(sa);
				tvalue = tvalue+sa;
			}
			var sb = key+'_fb';
			sb = $("#"+sb).val();
			if(sb!="" || sb>0) 
			{
				sb = parseInt(sb);
				tvalue = tvalue+sb;
			}
			var sc = key+'_fc';
			sc = $("#"+sc).val();
			if(sc!="" || sc>0) 
			{
				sc = parseInt(sc);
				tvalue = tvalue+sc;
			}
			var tv = key+'_ftvalue';
			if(tvalue>value)
			{
				$("#"+dis).val("");
			}
			else
			{
				$("#"+tv).val(tvalue);
			}
		}
		
		
		function chcheckShared(key,value,dis)
		{
			var tvalue=0;
			var sgen = key+'_cgen';
			sgen = $("#"+sgen).val();
			tvalue = parseInt(tvalue);
			if(sgen!="" || sgen>0) 
			{
				sgen =  parseInt(sgen);
				tvalue = tvalue+sgen;
			}
			var sa = key+'_ca';
			sa = $("#"+sa).val();
			if(sa!="" || sa>0)
			{
				sa = parseInt(sa);
				tvalue = tvalue+sa;
			}
			var sb = key+'_cb';
			sb = $("#"+sb).val();
			if(sb!="" || sb>0) 
			{
				sb = parseInt(sb);
				tvalue = tvalue+sb;
			}
			var sc = key+'_cc';
			sc = $("#"+sc).val();
			if(sc!="" || sc>0) 
			{
				sc = parseInt(sc);
				tvalue = tvalue+sc;
			}
			var tv = key+'_ctvalue';
			console.log(tvalue);
			if(tvalue>value)
			{
				console.log(dis);
				$("#"+dis).val("");
			}
			else
			{
				$("#"+tv).val(tvalue);
			}
		}
</script>