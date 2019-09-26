<select class="form-control" id="dgset_block" name="dgsets">
    @if (count($dgsets) > 0)
        @foreach ($dgsets as $dgset) 
           <option value="<?php echo $dgset; ?>"><?php echo $dgset; ?></option>
       @endforeach
    @endif
</select>