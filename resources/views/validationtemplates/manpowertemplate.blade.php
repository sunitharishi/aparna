<div class="btn btn-primary"><a style="color:#FFFFFF;" href="http://testing.rreg.in/reportdetailsfrom/<?php echo $site; ?>/5/<?php echo $year; ?>/<?php echo $month; ?>">Summary Report</a></div>
<div class="manpower-template">



<div class="row">



    <div class="col-sm-12 regular-manpower">



         <div class="col-sm-2 form-group">



            <label class="title1">A.G.M - HR</label> 



            



             <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_agm_hr_shared', $res['mmr_agm_hr_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_agm_hr_full', $res['mmr_agm_hr_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_agm_hr_ch', $res['mmr_agm_hr_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



        </div>



        <div class="col-sm-2 form-group">



            {!! Form::label('ful_assistant', 'Assistant', ['class' => '']) !!} 



              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_assistant_shared', $res['mmr_assistant_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_assistant_full', $res['mmr_assistant_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_assistant_ch', $res['mmr_assistant_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_assistant'))



                <p class="help-block">



                    {{ $errors->first('ful_assistant') }}



                </p>



            @endif



        </div>



        

         <div class="col-sm-2 form-group">



            {!! Form::label('ful_asst_help_desk', 'Assistant - Help Desk', ['class' => '']) !!} 



          



            <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_asst_help_desk_shared', $res['mmr_asst_help_desk_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_asst_help_desk_full', $res['mmr_asst_help_desk_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_asst_help_desk_ch', $res['mmr_asst_help_desk_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_asst_help_desk'))



                <p class="help-block">



                    {{ $errors->first('ful_asst_help_desk') }}



                </p>



            @endif



        </div>





         <div class="col-sm-2 form-group">



            {!! Form::label('ful_asst_sec_officer', 'Asst Security Officer', ['class' => '']) !!}



         



             <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_asst_sec_officer_shared', $res['mmr_asst_sec_officer_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_asst_sec_officer_full', $res['mmr_asst_sec_officer_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_asst_sec_officer_ch', $res['mmr_asst_sec_officer_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



            @if($errors->has('ful_asst_sec_officer'))



                <p class="help-block">



                    {{ $errors->first('ful_asst_sec_officer') }}



                </p>



            @endif



        </div>





         <div class="col-sm-2 form-group">



            {!! Form::label('ful_asst_stores', 'Asst. - Stores', ['class' => '']) !!}



          



            <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_asst_stores_shared', $res['mmr_asst_stores_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_asst_stores_full', $res['mmr_asst_stores_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_asst_stores_ch', $res['mmr_asst_stores_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



            @if($errors->has('ful_asst_stores'))



                <p class="help-block">



                    {{ $errors->first('ful_asst_stores') }}



                </p>



            @endif



        </div>





         <div class="col-sm-2 form-group">



            {!! Form::label('ful_asst_eng_facility', 'Asst. Engr - Facilities', ['class' => '']) !!}



        


            <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_asst_eng_facility_shared', $res['mmr_asst_eng_facility_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_asst_eng_facility_full', $res['mmr_asst_eng_facility_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_asst_eng_facility_ch', $res['mmr_asst_eng_facility_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



            @if($errors->has('ful_asst_eng_facility'))



                <p class="help-block">



                    {{ $errors->first('ful_asst_eng_facility') }}



                </p>



            @endif



        </div>





         <div class="col-sm-2 form-group">



            {!! Form::label('ful_asst_mngr_pms', 'Asst.Mngr. - PMS', ['class' => '']) !!}



         



             <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_asst_mngr_pms_shared', $res['mmr_asst_mngr_pms_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_asst_mngr_pms_full', $res['mmr_asst_mngr_pms_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_asst_mngr_pms_ch', $res['mmr_asst_mngr_pms_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_asst_mngr_pms'))



                <p class="help-block">



                    {{ $errors->first('ful_asst_mngr_pms') }}



                </p>



            @endif



        </div>





        <div class="col-sm-2 form-group">



            <label>Asst.Mngr. - Security</label>





            <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_asst_mngr_security_shared', $res['mmr_asst_mngr_security_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_asst_mngr_security_full', $res['mmr_asst_mngr_security_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_asst_mngr_security_ch', $res['mmr_asst_mngr_security_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


        </div>


     </div>



         <div class="col-sm-12 regular-manpower">
         <div class="col-sm-2 form-group">



            <label>BMS Operator</label>



          


             <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_bms_operator_shared', $res['mmr_bms_operator_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_bms_operator_full', $res['mmr_bms_operator_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_bms_operator_ch', $res['mmr_bms_operator_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



        </div>

  </div>



         <div class="col-sm-12 regular-manpower">
         <div class="col-sm-2 form-group">



            {!! Form::label('ful_care_taker_ch', 'Care Taker - Club House', ['class' => '']) !!}



          



             <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_care_taker_ch_shared', $res['mmr_care_taker_ch_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_care_taker_ch_full', $res['mmr_care_taker_ch_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_care_taker_ch_ch', $res['mmr_care_taker_ch_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_care_taker_ch'))



                <p class="help-block">



                    {{ $errors->first('ful_care_taker_ch') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            {!! Form::label('ful_carpenter', 'Carpenter', ['class' => '']) !!}



         



             <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_carpenter_shared', $res['mmr_carpenter_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_carpenter_full', $res['mmr_carpenter_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_carpenter_ch', $res['mmr_carpenter_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



            @if($errors->has('ful_carpenter'))



                <p class="help-block">



                    {{ $errors->first('ful_carpenter') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            {!! Form::label('ful_attendant', 'Club house - Attendant', ['class' => '']) !!}



         



             <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_attendant_shared', $res['mmr_attendant_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_attendant_full', $res['mmr_attendant_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_attendant_ch', $res['mmr_attendant_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_attendant'))



                <p class="help-block">



                    {{ $errors->first('ful_attendant') }}



                </p>



            @endif



        </div>
      </div>



         <div class="col-sm-12 regular-manpower">
         <div class="col-sm-2 form-group">



            {!! Form::label('sh_dgm_facility', 'DGM -  Facilities', ['class' => '']) !!}



          



              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_dgm_facility_shared', $res['mmr_dgm_facility_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_dgm_facility_full', $res['mmr_dgm_facility_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_dgm_facility_ch', $res['mmr_dgm_facility_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>

            



            {{ Form::hidden('record', $res['id']) }}



            <p class="help-block"></p>



            @if($errors->has('sh_dgm_facility'))



                <p class="help-block">



                    {{ $errors->first('sh_dgm_facility') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            <label>DGM-BD & Operations</label>



         



               <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_dgm_bd_operations_shared', $res['mmr_dgm_bd_operations_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_dgm_bd_operations_full', $res['mmr_dgm_bd_operations_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_dgm_bd_operations_ch', $res['mmr_dgm_bd_operations_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>

           



            <p class="help-block"></p>

        </div>



         <div class="col-sm-2 form-group">



            {!! Form::label('full_drivers', 'Drivers ', ['class' => '']) !!}



         



              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_drivers_shared', $res['mmr_drivers_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_drivers_full', $res['mmr_drivers_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_drivers_ch', $res['mmr_drivers_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('full_drivers'))



                <p class="help-block">



                    {{ $errors->first('full_drivers') }}



                </p>



            @endif



        </div>





         <div class="col-sm-2 form-group">



            {!! Form::label('ful_dy_manger_pms', 'Dy. Manager - PMS', ['class' => '']) !!}



           



              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_dy_manger_pms_shared', $res['mmr_dy_manger_pms_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_dy_manger_pms_full', $res['mmr_dy_manger_pms_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_dy_manger_pms_ch', $res['mmr_dy_manger_pms_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



            @if($errors->has('ful_dy_manger_pms'))



                <p class="help-block">



                    {{ $errors->first('ful_dy_manger_pms') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            {!! Form::label('sh_dy_mang_facility', 'Dy.Manager - Facilities', ['class' => '']) !!}



         



            <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_dy_mang_facility_shared', $res['mmr_dy_mang_facility_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_dy_mang_facility_full', $res['mmr_dy_mang_facility_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_dy_mang_facility_ch', $res['mmr_dy_mang_facility_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>
            

           



            <p class="help-block"></p>



            @if($errors->has('sh_dy_mang_facility'))



                <p class="help-block">



                    {{ $errors->first('sh_dy_mang_facility') }}



                </p>



            @endif



        </div>
      </div>

 
        <div class="col-sm-12 regular-manpower">
        <div class="col-sm-2 form-group">



            {!! Form::label('ful_electrician', 'Electricians', ['class' => '']) !!}



         



              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_electrician_shared', $res['mmr_electrician_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_electrician_full', $res['mmr_electrician_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_electrician_ch', $res['mmr_electrician_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_electrician'))



                <p class="help-block">



                    {{ $errors->first('ful_electrician') }}



                </p>



            @endif



        </div>



        <div class="col-sm-2 form-group">



            {!! Form::label('ful_jr_eng_facility', 'Engineer - Facilities ', ['class' => '']) !!}





              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_eng_facility_shared', $res['mmr_eng_facility_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_eng_facility_full', $res['mmr_eng_facility_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_eng_facility_ch', $res['mmr_eng_facility_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



            @if($errors->has('ful_jr_eng_facility'))



                <p class="help-block">



                    {{ $errors->first('ful_jr_eng_facility') }}



                </p>



            @endif



        </div>



        <div class="col-sm-2 form-group">



            {!! Form::label('ful_executive_ch', 'Executive - CH', ['class' => '']) !!}



   



             <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_executive_ch_shared', $res['mmr_executive_ch_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_executive_ch_full', $res['mmr_executive_ch_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_executive_ch_ch', $res['mmr_executive_ch_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_executive_ch'))



                <p class="help-block">



                    {{ $errors->first('ful_executive_ch') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            {!! Form::label('sh_exec_hr', 'Executive - HR', ['class' => '']) !!}



     



              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_exec_hr_shared', $res['mmr_exec_hr_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_exec_hr_full', $res['mmr_exec_hr_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_exec_hr_ch', $res['mmr_exec_hr_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



            @if($errors->has('sh_exec_hr'))



                <p class="help-block">



                    {{ $errors->first('sh_exec_hr') }}



                </p>



            @endif



        </div>



          <div class="col-sm-2 form-group">



            {!! Form::label('ful_exec_pms', 'Executive - PMS', ['class' => '']) !!}



      



              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_exec_pms_shared', $res['mmr_exec_pms_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_exec_pms_full', $res['mmr_exec_pms_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_exec_pms_ch', $res['mmr_exec_pms_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



            @if($errors->has('ful_exec_pms'))



                <p class="help-block">



                    {{ $errors->first('ful_exec_pms') }}



                </p>



            @endif



        </div>


       </div>


       
<div class="col-sm-12 regular-manpower">
        <div class="col-sm-2 form-group">



            {!! Form::label('ful_front_office_exec', 'Front Office Executive', ['class' => '']) !!}



         



              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_front_office_exec_shared', $res['mmr_front_office_exec_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_front_office_exec_full', $res['mmr_front_office_exec_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_front_office_exec_ch', $res['mmr_front_office_exec_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_front_office_exec'))



                <p class="help-block">



                    {{ $errors->first('ful_front_office_exec') }}



                </p>



            @endif



        </div>

   </div>


<div class="col-sm-12 regular-manpower">
        <div class="col-sm-2 form-group">



            {!! Form::label('ful_garden_help', 'Garden Helper', ['class' => '']) !!}



        



              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_garden_help_shared', $res['mmr_garden_help_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_garden_help_full', $res['mmr_garden_help_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_garden_help_ch', $res['mmr_garden_help_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



            @if($errors->has('ful_garden_help'))



                <p class="help-block">



                    {{ $errors->first('ful_garden_help') }}



                </p>



            @endif



        </div>



          <div class="col-sm-2 form-group">



            <label>Gardener</label>






              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_gardener_shared', $res['mmr_gardener_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_gardener_full', $res['mmr_gardener_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_gardener_ch', $res['mmr_gardener_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



        </div>

       

         <div class="col-sm-2 form-group">



            {!! Form::label('ful_gas_technician', 'Gas - Technician', ['class' => '']) !!}



         


             <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_gas_technician_shared', $res['mmr_gas_technician_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_gas_technician_full', $res['mmr_gas_technician_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_gas_technician_ch', $res['mmr_gas_technician_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



            @if($errors->has('ful_gas_technician'))



                <p class="help-block">



                    {{ $errors->first('ful_gas_technician') }}



                </p>



            @endif



        </div>





        <div class="col-sm-2 form-group">



            {!! Form::label('sh_dy_mang_hr', 'General Manager - HR', ['class' => '']) !!}



          



             <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_general_manager_hr_shared', $res['mmr_general_manager_hr_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_general_manager_hr_full', $res['mmr_general_manager_hr_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_general_manager_hr_ch', $res['mmr_general_manager_hr_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>
        



            <p class="help-block"></p>



            @if($errors->has('sh_dy_mang_hr'))



                <p class="help-block">



                    {{ $errors->first('sh_dy_mang_hr') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            {!! Form::label('ful_get', 'GET', ['class' => '']) !!}



          





              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_get_shared', $res['mmr_get_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_get_full', $res['mmr_get_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_get_ch', $res['mmr_get_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



            @if($errors->has('ful_get'))



                <p class="help-block">



                    {{ $errors->first('ful_get') }}



                </p>



            @endif



        </div>



          <div class="col-sm-2 form-group">



            <label>Gym Boy</label>






             <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_gymboy_shared', $res['mmr_gymboy_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_gymboy_full', $res['mmr_gymboy_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_gymboy_ch', $res['mmr_gymboy_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


        </div>



         <div class="col-sm-2 form-group">



            {!! Form::label('ful_gym_trainer', 'Gym Trainer', ['class' => '']) !!}



         



             <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_gym_trainer_shared', $res['mmr_gym_trainer_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_gym_trainer_full', $res['mmr_gym_trainer_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_gym_trainer_ch', $res['mmr_gym_trainer_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



            @if($errors->has('ful_gym_trainer'))



                <p class="help-block">



                    {{ $errors->first('ful_gym_trainer') }}



                </p>



            @endif



        </div>

      </div>

      <div class="col-sm-12 regular-manpower">
        <div class="col-sm-2 form-group">



            {!! Form::label('ful_secu_head_guards', 'Head Guards - Security', ['class' => '']) !!}



     



              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_head_guard_security_shared', $res['mmr_head_guard_security_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_head_guard_security_full', $res['mmr_head_guard_security_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_head_guard_security_ch', $res['mmr_head_guard_security_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



            @if($errors->has('ful_secu_head_guards'))



                <p class="help-block">



                    {{ $errors->first('ful_secu_head_guards') }}



                </p>



            @endif



        </div>



        <div class="col-sm-2 form-group">



            {!! Form::label('', 'Helper', ['class' => '']) !!}



        



              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_helper_shared', $res['mmr_helper_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_helper_full', $res['mmr_helper_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_helper_ch', $res['mmr_helper_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



            @if($errors->has('ful_helper'))



                <p class="help-block">



                    {{ $errors->first('ful_helper') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            {!! Form::label('ful_hs_keeper', 'House Keeper', ['class' => '']) !!}



       



           
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_house_keeper_shared', $res['mmr_house_keeper_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_house_keeper_full', $res['mmr_house_keeper_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_house_keeper_ch', $res['mmr_house_keeper_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



            @if($errors->has('ful_hs_keeper'))



                <p class="help-block">



                    {{ $errors->first('ful_hs_keeper') }}



                </p>



            @endif



        </div>

       

         <div class="col-sm-2 form-group">



            <label>HVAC  Technician </label>



     



            
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_hvac_technician_shared', $res['mmr_hvac_technician_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_hvac_technician_full', $res['mmr_hvac_technician_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_hvac_technician_ch', $res['mmr_hvac_technician_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



        </div>

      </div>

        
        <div class="col-sm-12 regular-manpower">
         <div class="col-sm-2 form-group">



            {!! Form::label('ful_jr_officer_horti', 'Jr Officer-Horticulture', ['class' => '']) !!}



         



           
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_jr_officer_horticulture_shared', $res['mmr_jr_officer_horticulture_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_jr_officer_horticulture_full', $res['mmr_jr_officer_horticulture_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_jr_officer_horticulture_ch', $res['mmr_jr_officer_horticulture_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_jr_officer_horti'))



                <p class="help-block">



                    {{ $errors->first('ful_jr_officer_horti') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            <label>Jr. Executive</label>

            



           
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_jr_executive_shared', $res['mmr_jr_executive_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_jr_executive_full', $res['mmr_jr_executive_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_jr_executive_ch', $res['mmr_jr_executive_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



        </div>





        <div class="col-sm-2 form-group">



            {!! Form::label('sh_jr_exec_acc', 'Jr. Executive - Accounts', ['class' => '']) !!}





           
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_jr_executive_accounts_shared', $res['mmr_jr_executive_accounts_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_jr_executive_accounts_full', $res['mmr_jr_executive_accounts_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_jr_executive_accounts_ch', $res['mmr_jr_executive_accounts_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



            @if($errors->has('sh_jr_exec_acc'))



                <p class="help-block">



                    {{ $errors->first('sh_jr_exec_acc') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            <label>Jr. Executive - CH</label>



        


            
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_jr_executive_ch_shared', $res['mmr_jr_executive_ch_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_jr_executive_ch_full', $res['mmr_jr_executive_ch_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_jr_executive_ch_ch', $res['mmr_jr_executive_ch_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>

            <p class="help-block"></p>



        </div>





          <div class="col-sm-2 form-group">



            <label>Jr. Officer - F & S</label>



          



           
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_jr_officer_fs_shared', $res['mmr_jr_officer_fs_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_jr_officer_fs_full', $res['mmr_jr_officer_fs_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_jr_officer_fs_ch', $res['mmr_jr_officer_fs_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



        </div>







         <div class="col-sm-2 form-group">



            {!! Form::label('ful_jr_off_facility', 'Jr. Officer - Facilities', ['class' => '']) !!}



           



            
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_jr_officer_facilities_shared', $res['mmr_jr_officer_facilities_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_jr_officer_facilities_full', $res['mmr_jr_officer_facilities_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_jr_officer_facilities_ch', $res['mmr_jr_officer_facilities_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_jr_off_facility'))



                <p class="help-block">



                    {{ $errors->first('ful_jr_off_facility') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            {!! Form::label('ful_jr_super_secu', 'Jr. Supervisor-Security', ['class' => '']) !!}



           



            
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_jr_supervisor_security_shared', $res['mmr_jr_supervisor_security_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_jr_supervisor_security_full', $res['mmr_jr_supervisor_security_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_jr_supervisor_security_ch', $res['mmr_jr_supervisor_security_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



            @if($errors->has('ful_jr_super_secu'))



                <p class="help-block">



                    {{ $errors->first('ful_jr_super_secu') }}



                </p>



            @endif



        </div>



       



         <div class="col-sm-2 form-group">



            <label>Jr.Executive - Admin</label>



         



           
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_jr_executive_admin_shared', $res['mmr_jr_executive_admin_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_jr_executive_admin_full', $res['mmr_jr_executive_admin_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_jr_executive_admin_ch', $res['mmr_jr_executive_admin_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



        </div>



         <div class="col-sm-2 form-group">



            <label>Jr.Executive - PMS</label>





            
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_jr_executive_pms_shared', $res['mmr_jr_executive_pms_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_jr_executive_pms_full', $res['mmr_jr_executive_pms_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_jr_executive_pms_ch', $res['mmr_jr_executive_pms_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



        </div>

    

         <div class="col-sm-2 form-group">



            {!! Form::label('ful_jr_officer_pms', 'Jr.Officer - PMS', ['class' => '']) !!}



        



            
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_jr_officer_pms_shared', $res['mmr_jr_officer_pms_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_jr_officer_pms_full', $res['mmr_jr_officer_pms_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_jr_officer_pms_ch', $res['mmr_jr_officer_pms_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



            @if($errors->has('ful_jr_officer_pms'))



                <p class="help-block">



                    {{ $errors->first('ful_jr_officer_pms') }}



                </p>



            @endif



        </div>

      </div>

       

       <div class="col-sm-12 regular-manpower">


         <div class="col-sm-2 form-group">



            {!! Form::label('ful_lady_secu_guards', 'Lady Security Guards', ['class' => '']) !!}



        



            
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_lady_security_gaurd_shared', $res['mmr_lady_security_gaurd_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_lady_security_gaurd_full', $res['mmr_lady_security_gaurd_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_lady_security_gaurd_ch', $res['mmr_lady_security_gaurd_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_lady_secu_guards'))



                <p class="help-block">



                    {{ $errors->first('ful_lady_secu_guards') }}



                </p>



            @endif



        </div>

      

          <div class="col-sm-2 form-group">



            {!! Form::label('ful_lift_care_taker', 'Lift Care Taker', ['class' => '']) !!}



        



             
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_lift_care_taker_shared', $res['mmr_lift_care_taker_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_lift_care_taker_full', $res['mmr_lift_care_taker_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_lift_care_taker_ch', $res['mmr_lift_care_taker_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



            @if($errors->has('ful_lift_care_taker'))



                <p class="help-block">



                    {{ $errors->first('ful_lift_care_taker') }}



                </p>



            @endif



        </div>

     </div>

      <div class="col-sm-12 regular-manpower">

        <div class="col-sm-2 form-group">



            {!! Form::label('sh_mang_facility', 'Manager - Facilities', ['class' => '']) !!}



         



            
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_manager_facilities_shared', $res['mmr_manager_facilities_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_manager_facilities_full', $res['mmr_manager_facilities_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_manager_facilities_ch', $res['mmr_manager_facilities_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>
            

          



            <p class="help-block"></p>



            @if($errors->has('sh_mang_facility'))



                <p class="help-block">



                    {{ $errors->first('sh_mang_facility') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            {!! Form::label('sh_mang_fire_safety', 'Manager - Fire & Safety', ['class' => '']) !!}



          



             
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_manager_firesafety_shared', $res['mmr_manager_firesafety_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_manager_firesafety_full', $res['mmr_manager_firesafety_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_manager_firesafety_ch', $res['mmr_manager_firesafety_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>

           



            <p class="help-block"></p>



            @if($errors->has('sh_mang_fire_safety'))



                <p class="help-block">



                    {{ $errors->first('sh_mang_fire_safety') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            {!! Form::label('sh_mang_horti', 'Manager - Horticulture', ['class' => '']) !!}



          



            
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_manager_horticulture_shared', $res['mmr_manager_horticulture_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_manager_horticulture_full', $res['mmr_manager_horticulture_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_manager_horticulture_ch', $res['mmr_manager_horticulture_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>

            

          



            <p class="help-block"></p>



            @if($errors->has('sh_mang_horti'))



                <p class="help-block">



                    {{ $errors->first('sh_mang_horti') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            <label>Manager - HR</label>



         



            
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_manager_hr_shared', $res['mmr_manager_hr_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_manager_hr_full', $res['mmr_manager_hr_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_manager_hr_ch', $res['mmr_manager_hr_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>

            

           



            <p class="help-block"></p>



           



        </div>



         <div class="col-sm-2 form-group">



            <label>Manager - Operations</label>



         



            
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_manager_operations_shared', $res['mmr_manager_operations_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_manager_operations_full', $res['mmr_manager_operations_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_manager_operations_ch', $res['mmr_manager_operations_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>

            

           



            <p class="help-block"></p>



           



        </div>



         <div class="col-sm-2 form-group">



            {!! Form::label('sh_mang_tnd', 'Manager - T & D', ['class' => '']) !!}



        



            
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_manager_td_shared', $res['mmr_manager_td_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_manager_td_full', $res['mmr_manager_td_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_manager_td_ch', $res['mmr_manager_td_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>

            

            



            <p class="help-block"></p>



            @if($errors->has('sh_mang_tnd'))



                <p class="help-block">



                    {{ $errors->first('sh_mang_tnd') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            <label>Mason</label>






              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_mason_shared', $res['mmr_mason_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_mason_full', $res['mmr_mason_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_mason_ch', $res['mmr_mason_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



        </div>



         <div class="col-sm-2 form-group">



            {!! Form::label('ful_mechanic', 'Mechanic', ['class' => '']) !!}



       



           
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_mechanic_shared', $res['mmr_mechanic_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_mechanic_full', $res['mmr_mechanic_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_mechanic_ch', $res['mmr_mechanic_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_mechanic'))



                <p class="help-block">



                    {{ $errors->first('ful_mechanic') }}



                </p>



            @endif



        </div>



       <div class="col-sm-2 form-group">



            <label>Multi Suill Technician </label>






            
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_multi_suill_technician_shared', $res['mmr_multi_suill_technician_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_multi_suill_technician_full', $res['mmr_multi_suill_technician_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_multi_suill_technician_ch', $res['mmr_multi_suill_technician_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



        </div>



         <div class="col-sm-2 form-group">



            {!! Form::label('ful_multi_technician', 'Multi Technician', ['class' => '']) !!}



          



             
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_multi_technician_shared', $res['mmr_multi_technician_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_multi_technician_full', $res['mmr_multi_technician_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_multi_technician_ch', $res['mmr_multi_technician_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_multi_technician'))



                <p class="help-block">



                    {{ $errors->first('ful_multi_technician') }}



                </p>



            @endif



        </div>
      </div>

      <div class="col-sm-12 regular-manpower">
     
         <div class="col-sm-2 form-group">



            {!! Form::label('ful_office_assistant', 'Office Assistant', ['class' => '']) !!}



      



            
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_office_assistant_shared', $res['mmr_office_assistant_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_office_assistant_full', $res['mmr_office_assistant_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_office_assistant_ch', $res['mmr_office_assistant_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



            @if($errors->has('ful_office_assistant'))



                <p class="help-block">



                    {{ $errors->first('ful_office_assistant') }}



                </p>



            @endif



        </div>



        <div class="col-sm-2 form-group">



            {!! Form::label('ful_office_attendant', 'Office Attendant', ['class' => '']) !!}



          



           
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_office_attendant_shared', $res['mmr_office_attendant_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_office_attendant_full', $res['mmr_office_attendant_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_office_attendant_ch', $res['mmr_office_attendant_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_office_attendant'))



                <p class="help-block">



                    {{ $errors->first('ful_office_attendant') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            {!! Form::label('ful_office_boy', 'Office Boy', ['class' => '']) !!}






            
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_office_boy_shared', $res['mmr_office_boy_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_office_boy_full', $res['mmr_office_boy_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_office_boy_ch', $res['mmr_office_boy_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



            @if($errors->has('ful_office_boy'))



                <p class="help-block">



                    {{ $errors->first('ful_office_boy') }}



                </p>



            @endif



        </div>



        <div class="col-sm-2 form-group">



            {!! Form::label('ful_officer', 'Officer', ['class' => '']) !!}



         



            
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_officer_shared', $res['mmr_officer_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_officer_full', $res['mmr_officer_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_officer_ch', $res['mmr_officer_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



            @if($errors->has('ful_officer'))



                <p class="help-block">



                    {{ $errors->first('ful_officer') }}



                </p>



            @endif



        </div>



          <div class="col-sm-2 form-group">



            {!! Form::label('ful_security_officer', 'Officer - Security', ['class' => '']) !!}



         



              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_officer_security_shared', $res['mmr_officer_security_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_officer_security_full', $res['mmr_officer_security_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_officer_security_ch', $res['mmr_officer_security_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_security_officer'))



                <p class="help-block">



                    {{ $errors->first('ful_security_officer') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            <label>Officer - Training</label>



          



           
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_officer_training_shared', $res['mmr_officer_training_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_officer_training_full', $res['mmr_officer_training_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_officer_training_ch', $res['mmr_officer_training_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



        </div>



        <div class="col-sm-2 form-group">



            {!! Form::label('ful_operator_ros_mach', 'Operators - ROS Machine', ['class' => '']) !!}



           



            
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_operator_ros_machine_shared', $res['mmr_operator_ros_machine_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_operator_ros_machine_full', $res['mmr_operator_ros_machine_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_operator_ros_machine_ch', $res['mmr_operator_ros_machine_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



            @if($errors->has('ful_operator_ros_mach'))



                <p class="help-block">



                    {{ $errors->first('ful_operator_ros_mach') }}



                </p>



            @endif



        </div>



        <div class="col-sm-2 form-group">



            {!! Form::label('ful_stp_operator', 'operators - STP', ['class' => '']) !!}


 


            
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_operator_stp_shared', $res['mmr_operator_stp_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_operator_stp_full', $res['mmr_operator_stp_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_operator_stp_ch', $res['mmr_operator_stp_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_stp_operator'))



                <p class="help-block">



                    {{ $errors->first('ful_stp_operator') }}



                </p>



            @endif



        </div>

      </div>


     <div class="col-sm-12 regular-manpower">
        <div class="col-sm-2 form-group">



            {!! Form::label('ful_painter', 'Painter', ['class' => '']) !!}



        



            
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_painter_shared', $res['mmr_painter_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_painter_full', $res['mmr_painter_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_painter_ch', $res['mmr_painter_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_painter'))



                <p class="help-block">



                    {{ $errors->first('ful_painter') }}



                </p>



            @endif



        </div>



        <div class="col-sm-2 form-group">



            {!! Form::label('ful_plumber', 'Plumbers', ['class' => '']) !!}



       



            
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_plumber_shared', $res['mmr_plumber_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_plumber_full', $res['mmr_plumber_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_plumber_ch', $res['mmr_plumber_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_plumber'))



                <p class="help-block">



                    {{ $errors->first('ful_plumber') }}



                </p>



            @endif



        </div>
      </div>
 
        
       <div class="col-sm-12 regular-manpower"> 
         <div class="col-sm-2 form-group">



            {!! Form::label('ful_steward_fire_safe', 'Safety - Steward', ['class' => '']) !!}


  

       


              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_safety_steward_shared', $res['mmr_safety_steward_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_safety_steward_full', $res['mmr_safety_steward_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_safety_steward_ch', $res['mmr_safety_steward_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_steward_fire_safe'))



                <p class="help-block">



                    {{ $errors->first('ful_steward_fire_safe') }}



                </p>



            @endif



        </div>

        

        <div class="col-sm-2 form-group">



            {!! Form::label('ful_secu_guard', 'Security Guards', ['class' => '']) !!}



          



            
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_security_guard_shared', $res['mmr_security_guard_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_security_guard_full', $res['mmr_security_guard_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_security_guard_ch', $res['mmr_security_guard_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_secu_guard'))



                <p class="help-block">



                    {{ $errors->first('ful_secu_guard') }}



                </p>



            @endif



        </div>

        

        <div class="col-sm-2 form-group">



            {!! Form::label('ful_sec_super', 'Security Supervisors', ['class' => '']) !!}



      



            
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_security_supervisor_shared', $res['mmr_security_supervisor_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_security_supervisor_full', $res['mmr_security_supervisor_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_security_supervisor_ch', $res['mmr_security_supervisor_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_sec_super'))



                <p class="help-block">



                    {{ $errors->first('ful_sec_super') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            <label>Sr Carpenter</label>



          



           
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_sr_carpenter_shared', $res['mmr_sr_carpenter_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_sr_carpenter_full', $res['mmr_sr_carpenter_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_sr_carpenter_ch', $res['mmr_sr_carpenter_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



        </div>





        <div class="col-sm-2 form-group">



            {!! Form::label('ful_sr_eng_facility', 'Sr. Engineer - Facilities', ['class' => '']) !!}



         



          
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_sr_engineer_facilities_shared', $res['mmr_sr_engineer_facilities_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_sr_engineer_facilities_full', $res['mmr_sr_engineer_facilities_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_sr_engineer_facilities_ch', $res['mmr_sr_engineer_facilities_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_sr_eng_facility'))



                <p class="help-block">



                    {{ $errors->first('ful_sr_eng_facility') }}



                </p>



            @endif



        </div>

        

         <div class="col-sm-2 form-group">



            {!! Form::label('sh_exec_horti', 'Sr. Exe - Horticulture', ['class' => '']) !!}

   



            
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_sr_exe_horticulture_shared', $res['mmr_sr_exe_horticulture_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_sr_exe_horticulture_full', $res['mmr_sr_exe_horticulture_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_sr_exe_horticulture_ch', $res['mmr_sr_exe_horticulture_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('sh_exec_horti'))



                <p class="help-block">



                    {{ $errors->first('sh_exec_horti') }}



                </p> 



            @endif



        </div>



         <div class="col-sm-2 form-group">



            <label>Sr. Executive - Accounts</label>



          



             
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_sr_executive_accounts_shared', $res['mmr_sr_executive_accounts_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_sr_executive_accounts_full', $res['mmr_sr_executive_accounts_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_sr_executive_accounts_ch', $res['mmr_sr_executive_accounts_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



        </div>



        <div class="col-sm-2 form-group">



            {!! Form::label('ful_sr_exec_pms', 'Sr. Executive - PMS', ['class' => '']) !!}



        



            
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_sr_executive_pms_shared', $res['mmr_sr_executive_pms_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_sr_executive_pms_full', $res['mmr_sr_executive_pms_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_sr_executive_pms_ch', $res['mmr_sr_executive_pms_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



            @if($errors->has('ful_sr_exec_pms'))



                <p class="help-block">



                    {{ $errors->first('ful_sr_exec_pms') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            {!! Form::label('ful_sr_lady_sup_sec', 'Sr. Lady Sup - Security', ['class' => '']) !!}



          

            

            
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_sr_lady_sup_security_shared', $res['mmr_sr_lady_sup_security_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_sr_lady_sup_security_full', $res['mmr_sr_lady_sup_security_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_sr_lady_sup_security_ch', $res['mmr_sr_lady_sup_security_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_sr_lady_sup_sec'))



                <p class="help-block">



                    {{ $errors->first('ful_sr_lady_sup_sec') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            {!! Form::label('sh_sr_mang_facility', 'Sr. Manager - Facilities', ['class' => '']) !!}



      



           
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_sr_manager_facilities_shared', $res['mmr_sr_manager_facilities_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_sr_manager_facilities_full', $res['mmr_sr_manager_facilities_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_sr_manager_facilities_ch', $res['mmr_sr_manager_facilities_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>

            

         



            <p class="help-block"></p>



            @if($errors->has('sh_sr_mang_facility'))



                <p class="help-block">



                    {{ $errors->first('sh_sr_mang_facility') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            {!! Form::label('ful_sr_officer_fire_safe', 'Sr.Officer - Safety', ['class' => '']) !!}



          



            
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_sr_officer_safety_shared', $res['mmr_sr_officer_safety_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_sr_officer_safety_full', $res['mmr_sr_officer_safety_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_sr_officer_safety_ch', $res['mmr_sr_officer_safety_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_sr_officer_fire_safe'))



                <p class="help-block">



                    {{ $errors->first('ful_sr_officer_fire_safe') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            {!! Form::label('sh_sr_officer_stores', 'Sr. Officer - Stores', ['class' => '']) !!}



          



            
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_sr_officer_stores_shared', $res['mmr_sr_officer_stores_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_sr_officer_stores_full', $res['mmr_sr_officer_stores_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_sr_officer_stores_ch', $res['mmr_sr_officer_stores_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('sh_sr_officer_stores'))



                <p class="help-block">



                    {{ $errors->first('sh_sr_officer_stores') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            {!! Form::label('ful_sr_supervisor', 'Sr. Supervisor', ['class' => '']) !!}



        



            
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_sr_supervisor_shared', $res['mmr_sr_supervisor_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_sr_supervisor_full', $res['mmr_sr_supervisor_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_sr_supervisor_ch', $res['mmr_sr_supervisor_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_sr_supervisor'))



                <p class="help-block">



                    {{ $errors->first('ful_sr_supervisor') }}



                </p>



            @endif



        </div>



        <div class="col-sm-2 form-group">



            {!! Form::label('ful_sr_sup_house_keeping', 'Sr. Supervisors - Hk', ['class' => '']) !!}



          



             
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_sr_supervisor_hk_shared', $res['mmr_sr_supervisor_hk_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_sr_supervisor_hk_full', $res['mmr_sr_supervisor_hk_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_sr_supervisor_hk_ch', $res['mmr_sr_supervisor_hk_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_sr_sup_house_keeping'))



                <p class="help-block">



                    {{ $errors->first('ful_sr_sup_house_keeping') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            {!! Form::label('ful_sr_supervisor_plumbing', 'Sr. Supervisor - Plumbing', ['class' => '']) !!}



          



            
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_sr_supervisor_plumbing_shared', $res['mmr_sr_supervisor_plumbing_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_sr_supervisor_plumbing_full', $res['mmr_sr_supervisor_plumbing_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_sr_supervisor_plumbing_ch', $res['mmr_sr_supervisor_plumbing_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_sr_supervisor_plumbing'))



                <p class="help-block">



                    {{ $errors->first('ful_sr_supervisor_plumbing') }}



                </p>



            @endif



        </div>



        <div class="col-sm-2 form-group">



            <label>Sr. Supervisor - Security</label>



          



             
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_sr_supervisor_security_shared', $res['mmr_sr_supervisor_security_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_sr_supervisor_security_full', $res['mmr_sr_supervisor_security_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_sr_supervisor_security_ch', $res['mmr_sr_supervisor_security_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



        </div>



        <div class="col-sm-2 form-group">



            {!! Form::label('ful_sr_technician', 'Sr. Technician', ['class' => '']) !!}



        



           
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_sr_technician_shared', $res['mmr_sr_technician_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_sr_technician_full', $res['mmr_sr_technician_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_sr_technician_ch', $res['mmr_sr_technician_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_sr_technician'))



                <p class="help-block">



                    {{ $errors->first('ful_sr_technician') }}



                </p>



            @endif



        </div>





         <div class="col-sm-2 form-group">



            {!! Form::label('ful_sr_asst_help_desk', 'Sr. Asst Help Desk', ['class' => '']) !!}






              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_srasst_help_desk_shared', $res['mmr_srasst_help_desk_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_srasst_help_desk_full', $res['mmr_srasst_help_desk_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_srasst_help_desk_ch', $res['mmr_srasst_help_desk_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_sr_asst_help_desk'))



                <p class="help-block">



                    {{ $errors->first('ful_sr_asst_help_desk') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            <label>Sr.Executive-Reso & Train</label>



           



              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_sr_executive_reso_train_shared', $res['mmr_sr_executive_reso_train_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_sr_executive_reso_train_full', $res['mmr_sr_executive_reso_train_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_sr_executive_reso_train_ch', $res['mmr_sr_executive_reso_train_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



        </div>



         <div class="col-sm-2 form-group">



            {!! Form::label('sh_sr_mang', 'Sr.Manager', ['class' => '']) !!}



          



           
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_sr_manager_shared', $res['mmr_sr_manager_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_sr_manager_full', $res['mmr_sr_manager_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_sr_manager_ch', $res['mmr_sr_manager_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>
            

           



            <p class="help-block"></p>



            @if($errors->has('sh_sr_mang'))



                <p class="help-block">



                    {{ $errors->first('sh_sr_mang') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            <label>Sr.Office Assistant </label>



          





         
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_sr_office_assistant_shared', $res['mmr_sr_office_assistant_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_sr_office_assistant_full', $res['mmr_sr_office_assistant_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_sr_office_assistant_ch', $res['mmr_sr_office_assistant_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>




            <p class="help-block"></p>



        </div>



         <div class="col-sm-2 form-group">



            <label>Sr.Officer - Irrigation</label>


  

            

            

             
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_sr_officer_irrigation_shared', $res['mmr_sr_officer_irrigation_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_sr_officer_irrigation_full', $res['mmr_sr_officer_irrigation_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_sr_officer_irrigation_ch', $res['mmr_sr_officer_irrigation_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



        </div>



         <div class="col-sm-2 form-group">



            <label>Sr.Officer - Sec & Train</label>



         



          
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_sr_officer_sec_train_shared', $res['mmr_sr_officer_sec_train_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_sr_officer_sec_train_full', $res['mmr_sr_officer_sec_train_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_sr_officer_sec_train_ch', $res['mmr_sr_officer_sec_train_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



        </div>



         <div class="col-sm-2 form-group">



            <label>Sr.Officer-Horitculture</label>



           


           

          
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_sr_officer_horticulture_shared', $res['mmr_sr_officer_horticulture_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_sr_officer_horticulture_full', $res['mmr_sr_officer_horticulture_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_sr_officer_horticulture_ch', $res['mmr_sr_officer_horticulture_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>




            <p class="help-block"></p>



        </div>



        <div class="col-sm-2 form-group">



            {!! Form::label('ful_sr_officer_security', 'Sr.Officer-Security', ['class' => '']) !!}



          



            

            
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_sr_officer_security_shared', $res['mmr_sr_officer_security_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_sr_officer_security_full', $res['mmr_sr_officer_security_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_sr_officer_security_ch', $res['mmr_sr_officer_security_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



            @if($errors->has('ful_sr_officer_security'))



                <p class="help-block">



                    {{ $errors->first('ful_sr_officer_security') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            <label>Sr.Plumber  </label>



     





           
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_sr_plumber_shared', $res['mmr_sr_plumber_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_sr_plumber_full', $res['mmr_sr_plumber_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_sr_plumber_ch', $res['mmr_sr_plumber_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



        </div>





         <div class="col-sm-2 form-group">



            {!! Form::label('ful_sr_supervisor_pms', 'Sr.Supervisor - PMS ', ['class' => '']) !!}








            
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_sr_supervisor_pms_shared', $res['mmr_sr_supervisor_pms_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_sr_supervisor_pms_full', $res['mmr_sr_supervisor_pms_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_sr_supervisor_pms_ch', $res['mmr_sr_supervisor_pms_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



            @if($errors->has('ful_sr_supervisor_pms'))



                <p class="help-block">



                    {{ $errors->first('ful_sr_supervisor_pms') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            <label>Sr.Supervisor - Tech</label>







              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_sr_supervisor_tech_shared', $res['mmr_sr_supervisor_tech_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_sr_supervisor_tech_full', $res['mmr_sr_supervisor_tech_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_sr_supervisor_tech_ch', $res['mmr_sr_supervisor_tech_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



        </div>



         <div class="col-sm-2 form-group">



            <label>Steward - Fire & Safety </label>



      





          
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_steward_fire_safety_shared', $res['mmr_steward_fire_safety_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_steward_fire_safety_full', $res['mmr_steward_fire_safety_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_steward_fire_safety_ch', $res['mmr_steward_fire_safety_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



        </div>



        <div class="col-sm-2 form-group">



            {!! Form::label('ful_supervisor', 'Supervisor', ['class' => '']) !!}



        





          
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_supervisor_shared', $res['mmr_supervisor_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_supervisor_full', $res['mmr_supervisor_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_supervisor_ch', $res['mmr_supervisor_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_supervisor'))



                <p class="help-block">



                    {{ $errors->first('ful_supervisor') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            {!! Form::label('ful_super_facility', 'Supervisor - Facilities', ['class' => '']) !!}



        





              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_supervisor_facilities_shared', $res['mmr_supervisor_facilities_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_supervisor_facilities_full', $res['mmr_supervisor_facilities_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_supervisor_facilities_ch', $res['mmr_supervisor_facilities_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_super_facility'))



                <p class="help-block">



                    {{ $errors->first('ful_super_facility') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            {!! Form::label('ful_sup_super_firesafe', 'Supervisor - Fire & Safety', ['class' => '']) !!}








           
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_supervisor_firesafety_shared', $res['mmr_supervisor_firesafety_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_supervisor_firesafety_full', $res['mmr_supervisor_firesafety_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_supervisor_firesafety_ch', $res['mmr_supervisor_firesafety_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_sup_super_firesafe'))



                <p class="help-block">



                    {{ $errors->first('ful_sup_super_firesafe') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            <label>Supervisor - Gardening</label>



         





            
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_supervisor_gardening_shared', $res['mmr_supervisor_gardening_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_supervisor_gardening_full', $res['mmr_supervisor_gardening_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_supervisor_gardening_ch', $res['mmr_supervisor_gardening_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



        </div>



         <div class="col-sm-2 form-group">



            {!! Form::label('ful_sup_house_keeping', 'Supervisors - Hk', ['class' => '']) !!}








              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_supervisor_hk_shared', $res['mmr_supervisor_hk_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_supervisor_hk_full', $res['mmr_supervisor_hk_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_supervisor_hk_ch', $res['mmr_agm_hr_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



            @if($errors->has('ful_sup_house_keeping'))



                <p class="help-block">



                    {{ $errors->first('ful_sup_house_keeping') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            {!! Form::label('ful_super_maintainance', 'Supervisor - Maintenance', ['class' => '']) !!}



           




              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_supervisor_maintenance_shared', $res['mmr_supervisor_maintenance_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_supervisor_maintenance_full', $res['mmr_supervisor_maintenance_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_supervisor_maintenance_ch', $res['mmr_supervisor_maintenance_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_super_maintainance'))



                <p class="help-block">



                    {{ $errors->first('ful_super_maintainance') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            {!! Form::label('ful_super_plumbing', 'Supervisor - Plumbing', ['class' => '']) !!}



          





              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_supervisor_plumbing_shared', $res['mmr_supervisor_plumbing_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_supervisor_plumbing_full', $res['mmr_supervisor_plumbing_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_supervisor_plumbing_ch', $res['mmr_supervisor_plumbing_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_super_plumbing'))



                <p class="help-block">



                    {{ $errors->first('ful_super_plumbing') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            <label>Supervisor - Security</label>



        





          
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_supervisor_security_shared', $res['mmr_supervisor_security_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_supervisor_security_full', $res['mmr_supervisor_security_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_supervisor_security_ch', $res['mmr_supervisor_security_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



        </div>



         <div class="col-sm-2 form-group">



            <label>Supervisor - Technical</label>



          





              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_supervisor_technical_shared', $res['mmr_supervisor_technical_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_supervisor_technical_full', $res['mmr_supervisor_technical_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_supervisor_technical_ch', $res['mmr_supervisor_technical_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



        </div>



       <div class="col-sm-2 form-group">



            {!! Form::label('ch_super_club_house', 'Supervisor- Clubhouse', ['class' => '']) !!}



     




           
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_supervisor_clubhouse_shared', $res['mmr_supervisor_clubhouse_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_supervisor_clubhouse_full', $res['mmr_supervisor_clubhouse_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_supervisor_clubhouse_ch', $res['mmr_supervisor_clubhouse_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



            @if($errors->has('ch_super_club_house'))



                <p class="help-block">



                    {{ $errors->first('ch_super_club_house') }}



                </p>



            @endif



        </div>





         <div class="col-sm-2 form-group">



            <label>Supervisor - Horticulture</label>



          





              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_supervisor_horticulture_shared', $res['mmr_supervisor_horticulture_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_supervisor_horticulture_full', $res['mmr_supervisor_horticulture_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_supervisor_horticulture_ch', $res['mmr_supervisor_horticulture_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



        </div>



        <div class="col-sm-2 form-group">



            {!! Form::label('ful_super_stp', 'Supervisor-STP ', ['class' => '']) !!}



        





              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_supervisor_stp_shared', $res['mmr_supervisor_stp_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_supervisor_stp_full', $res['mmr_supervisor_stp_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_supervisor_stp_ch', $res['mmr_supervisor_stp_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_super_stp'))



                <p class="help-block">



                    {{ $errors->first('ful_super_stp') }}



                </p>



            @endif



        </div>



        <div class="col-sm-2 form-group">



            {!! Form::label('ch_swim_pool_coach', 'Swimming pool Coach', ['class' => '']) !!}



      





           
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_swimming_coach_shared', $res['mmr_swimming_coach_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_swimming_coach_full', $res['mmr_swimming_coach_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_swimming_coach_ch', $res['mmr_swimming_coach_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



            @if($errors->has('ch_swim_pool_coach'))



                <p class="help-block">



                    {{ $errors->first('ch_swim_pool_coach') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            {!! Form::label('ful_swimpool_operator', 'Swimming pool operator', ['class' => '']) !!}



        





              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_swimming_pool_operator_shared', $res['mmr_swimming_pool_operator_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_swimming_pool_operator_full', $res['mmr_swimming_pool_operator_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_swimming_pool_operator_ch', $res['mmr_swimming_pool_operator_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



            @if($errors->has('ful_swimpool_operator'))



                <p class="help-block">



                    {{ $errors->first('ful_swimpool_operator') }}



                </p>



            @endif



        </div>

      
         <div class="col-sm-2 form-group">



            <label>Swimming pool Tech</label>

    





           
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_swimming_pool_tech_shared', $res['mmr_swimming_pool_tech_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_swimming_pool_tech_full', $res['mmr_swimming_pool_tech_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_swimming_pool_tech_ch', $res['mmr_swimming_pool_tech_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



        </div>
        </div>

        
       <div class="col-sm-12 regular-manpower">



         <div class="col-sm-2 form-group">



            {!! Form::label('ful_gas_technician', 'Technician ', ['class' => '']) !!}



          







              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_technician_shared', $res['mmr_technician_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_technician_full', $res['mmr_technician_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_technician_ch', $res['mmr_technician_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_gas_technician'))



                <p class="help-block">



                    {{ $errors->first('ful_gas_technician') }}



                </p>



            @endif



        </div>



        <div class="col-sm-2 form-group">



            {!! Form::label('ch_tennis_coach', 'Tennis Coach:', ['class' => '']) !!}



          




              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_tennis_coach_shared', $res['mmr_tennis_coach_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_tennis_coach_full', $res['mmr_tennis_coach_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_tennis_coach_ch', $res['mmr_tennis_coach_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ch_tennis_coach'))



                <p class="help-block">



                    {{ $errors->first('ch_tennis_coach') }}



                </p>



            @endif



        </div>



        <div class="col-sm-2 form-group">



            <label>Tr. MST</label>



          





              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_tr_mst_shared', $res['mmr_tr_mst_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_tr_mst_full', $res['mmr_tr_mst_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_tr_mst_ch', $res['mmr_tr_mst_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



        </div>



        <div class="col-sm-2 form-group">



            {!! Form::label('ful_tr_sup_fire_safe', 'Tr.SUP - Fire & Safety', ['class' => '']) !!}



          





              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_tr_sup_fire_safety_shared', $res['mmr_tr_sup_fire_safety_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_tr_sup_fire_safety_full', $res['mmr_tr_sup_fire_safety_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_tr_sup_fire_safety_ch', $res['mmr_tr_sup_fire_safety_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



            @if($errors->has('ful_tr_sup_fire_safe'))



                <p class="help-block">



                    {{ $errors->first('ful_tr_sup_fire_safe') }}



                </p>



            @endif



        </div>

       

         <div class="col-sm-2 form-group">



            {!! Form::label('ful_tr_asst_stores', 'Tr.Assistant - Stores', ['class' => '']) !!}



   





              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_tr_assistant_stores_shared', $res['mmr_tr_assistant_stores_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_tr_assistant_stores_full', $res['mmr_tr_assistant_stores_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_tr_assistant_stores_ch', $res['mmr_tr_assistant_stores_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>


            <p class="help-block"></p>



            @if($errors->has('ful_tr_asst_stores'))



                <p class="help-block">



                    {{ $errors->first('ful_tr_asst_stores') }}



                </p>



            @endif



        </div>



         <div class="col-sm-2 form-group">



            {!! Form::label('ful_tractor_driver', 'Tractor Drivers', ['class' => '']) !!}








              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_tractor_driver_shared', $res['mmr_tractor_driver_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_tractor_driver_full', $res['mmr_tractor_driver_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_tractor_driver_ch', $res['mmr_tractor_driver_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>



            <p class="help-block"></p>



            @if($errors->has('ful_tractor_driver'))



                <p class="help-block">



                    {{ $errors->first('ful_tractor_driver') }}



                </p>



            @endif



        </div>

     </div>

        
       <div class="col-sm-12 regular-manpower">

        <div class="col-sm-2 form-group">



            <label>V. P. - Operations</label>



      





              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_vp_operations_shared', $res['mmr_vp_operations_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_vp_operations_full', $res['mmr_vp_operations_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_vp_operations_ch', $res['mmr_vp_operations_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>

            



            <p class="help-block"></p>



           



        </div>
    </div>

        
       <div class="col-sm-12 regular-manpower">



         <div class="col-sm-2 form-group">



            {!! Form::label('ful_welder', 'Welder', ['class' => '']) !!}





          
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_welder_shared', $res['mmr_welder_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_welder_full', $res['mmr_welder_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_welder_ch', $res['mmr_welder_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>

             



            <p class="help-block"></p>



            @if($errors->has('ful_welder'))



                <p class="help-block">



                    {{ $errors->first('ful_welder') }}



                </p>



            @endif



        </div>

        </div>

        
       <div class="col-sm-12 regular-manpower">


        <div class="col-sm-2 form-group">



            <label>Incharge - Facilities</label>



          



              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_incharge_facilities_shared', $res['mmr_incharge_facilities_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_incharge_facilities_full', $res['mmr_incharge_facilities_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_incharge_facilities_ch', $res['mmr_incharge_facilities_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>
             



            <p class="help-block"></p>



        </div>





         <div class="col-sm-2 form-group">



            <label>Incharge - FMS</label>



         



              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_incharge_fms_shared', $res['mmr_incharge_fms_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_incharge_fms_full', $res['mmr_incharge_fms_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_incharge_fms_ch', $res['mmr_incharge_fms_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>

             



            <p class="help-block"></p>



        </div>







         <div class="col-sm-2 form-group">



            <label>Incharge - PMS</label>


  



          
              <div class="radios-buttons">

                <div class="choice-radio">

                    <span>Shared</span>
                    {!! Form::text('mmr_incharge_pms_shared', $res['mmr_incharge_pms_shared'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                <div class="choice-radio">

                  <span>Full</span>
                  {!! Form::text('mmr_incharge_pms_full', $res['mmr_incharge_pms_full'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

                 <div class="choice-radio">

                   <span>CH</span>
                    {!! Form::text('mmr_incharge_pms_ch', $res['mmr_incharge_pms_ch'], ['class' => 'form-control resetval', 'placeholder' => '']) !!}
                </div>

            </div>

             



            <p class="help-block"></p>



        </div>











        </div>









   </div>





  





</div>      



         





   

                     



             <div class="updatebtn">



                {!! Form::submit('Update', ['class' => 'btn btn-danger']) !!} 



        {!! Form::button('Reset', ['class' => 'btn btn-reser', 'id' => 'resetall']) !!}



            </div> 



        



   



