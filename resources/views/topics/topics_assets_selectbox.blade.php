{!! Form::label('asset_id', 'Asset', ['class' => 'control-label']) !!}<br>
<select name="asset_id" id="asset_id" class="form-control select2mes" onchange="getAssetEmployees(this)">
   <option>Please select asset</option>
   <option value="other">Other</option>
   @if($comm_assets)
   @foreach($comm_assets as $casset)
   <option value="{{ $casset->id }}">{{ $casset->code }}-{{ $casset->name }}</option>
   @endforeach
   @endif 
</select> <?php if(count($other_assets)>0) { ?>
<select name="oasset_dropdown" id="oasset_dropdown" class="form-control select2mes" onchange="getAssetEmployees(this)" style="display:none;">
   <option>Please select asset</option>
  
   @foreach($other_assets as $oasset)
   <option value="{{ $oasset->id }}">{{ $oasset->code }}-{{ $oasset->name }}</option>
   @endforeach
</select>
<?php } ?>
<input type="text" id="other_text" class="form-control" name="other_text" value="" style="display:none;margin-top:10px;"/>
<p class="help-block"></p>