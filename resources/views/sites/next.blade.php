@extends('layouts.app')

@section('content')

  <!--  <h3 class="page-title">Sites</h3>-->
   <div class="panel panel-default panelmar tsas-crseations communities-sited">
    {!! Form::open(['files' => 'true','method' => 'POST', 'route' => ['sites.store']]) !!}

   
        <div class="panel-heading">
            Communities
        </div>
        
        <div class="panel-body site-seeing">
         
			<div class="row">
			
		<input type="hidden" name="site_iD" value=<?php echo $site_id;?> />
             
             <div class="row communitybackground1 slub-house">
                 <label class="col-sm-12 col-xs-12 control-label label-house">Club House</label>
                 <div class="col-sm-2 form-group badimonth-court">
                     <label class="control-label">Badminton Court</label>
                     <select class="form-control" name="badminton_court">
                         <option value="Available" <?php if(isset($sitenxdata['badminton_court'])){ if($sitenxdata['badminton_court'] == 'Available') echo 'selected="Selected"';} ?>>Available</option>
                         <option value="Not Available" <?php if(isset($sitenxdata['badminton_court'])){ if($sitenxdata['badminton_court'] == 'Not Available') echo 'selected="Selected"';} ?>>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group ">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" name="badminton_text"  value="<?php if(isset($sitenxdata['badminton_text'])) echo $sitenxdata['badminton_text']; ?>"/>
                 </div>
                  <div class="col-sm-2 form-group badimonth-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                 <input type="file" class="form-control"  name="badminton_file"/> <span><?php if(isset($sitenxdata['badminton_file'])) echo $sitenxdata['badminton_file']; ?></span>
                 </div>
                 
                 <div class="col-sm-2 form-group squash-court">
                     <label class="control-label">Squash Court</label>
                      <select class="form-control" name="squash">
                         <option value="Available" <?php if(isset($sitenxdata['squash'])){ if($sitenxdata['squash'] == 'Available') echo 'selected="Selected"';} ?>>Available</option>
                         <option value="Not Available" <?php if(isset($sitenxdata['squash'])){ if($sitenxdata['squash'] == 'Not Available') echo 'selected="Selected"';} ?>>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" name="squash_text" value="<?php if(isset($sitenxdata['squash_text'])) echo $sitenxdata['squash_text']; ?>"/>
                 </div>
                  <div class="col-sm-2 form-group squash-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control"  name="squash_file"/> <span><?php if(isset($sitenxdata['squash_file'])) echo $sitenxdata['squash_file']; ?></span>
                 </div>
                 
                 <div class="col-sm-2 form-group kitchen">
                     <label class="control-label">Kitchen</label>
                     <select class="form-control" name="kitchen_court">
                        <option value="Available" <?php if(isset($sitenxdata['kitchen_court'])){ if($sitenxdata['kitchen_court'] == 'Available') echo 'selected="Selected"';} ?>>Available</option>
                         <option value="Not Available" <?php if(isset($sitenxdata['kitchen_court'])){ if($sitenxdata['kitchen_court'] == 'Not Available') echo 'selected="Selected"';} ?>>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" name="kitchen_text" value="<?php if(isset($sitenxdata['kitchen_text'])) echo $sitenxdata['kitchen_text']; ?>"/>
                 </div>
                  <div class="col-sm-2 form-group kitchen-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control"  name="kitchen_file"/> <span> <?php if(isset($sitenxdata['kitchen_file'])) echo $sitenxdata['kitchen_file']; ?></span>
                 </div>
                 
                 <div class="col-sm-2 form-group multi-purpose">
                     <label class="control-label">Multi Purpose Hall</label>
                    <select class="form-control" name="multi_purpose_hall">
                         <option value="Available" <?php if(isset($sitenxdata['multi_purpose_hall'])){ if($sitenxdata['multi_purpose_hall'] == 'Available') echo 'selected="Selected"';} ?>>Available</option>
                         <option value="Not Available" <?php if(isset($sitenxdata['multi_purpose_hall'])){ if($sitenxdata['multi_purpose_hall'] == 'Not Available') echo 'selected="Selected"';} ?>>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" name="multi_purpose_text" value="<?php if(isset($sitenxdata['multi_purpose_text'])) echo $sitenxdata['multi_purpose_text']; ?>"/>
                 </div>
                  <div class="col-sm-2 form-group multi-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control"  name="multi_purpose_file"/> <span><?php if(isset($sitenxdata['multi_purpose_file'])) echo $sitenxdata['multi_purpose_file']; ?></span>
                 </div>
                 
                 <div class="col-sm-2 form-group clinic">
                     <label class="control-label">Clinic</label>
                   <select class="form-control" name="clicnic_court">
                         <option value="Available" <?php if(isset($sitenxdata['clicnic_court'])){ if($sitenxdata['clicnic_court'] == 'Available') echo 'selected="Selected"';} ?>>Available</option>
                         <option value="Not Available" <?php if(isset($sitenxdata['clicnic_court'])){ if($sitenxdata['clicnic_court'] == 'Not Available') echo 'selected="Selected"';} ?>>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label> 
                     <input type="text" class="form-control" name="clicnic_text" value="<?php if(isset($sitenxdata['clicnic_text'])) echo $sitenxdata['clicnic_text']; ?>"/>
                 </div>
                  <div class="col-sm-2 form-group clinic-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control"  name="clicnic_file"/> <span><?php if(isset($sitenxdata['clicnic_file'])) echo $sitenxdata['clicnic_file']; ?></span>
                 </div>
                 
                 <div class="col-sm-2 form-group gym">
                     <label class="control-label">GYM</label>
                      <select class="form-control" name="gym">
                        <option value="Available" <?php if(isset($sitenxdata['gym'])){ if($sitenxdata['gym'] == 'Available') echo 'selected="Selected"';} ?>>Available</option>
                         <option value="Not Available" <?php if(isset($sitenxdata['gym'])){ if($sitenxdata['gym'] == 'Not Available') echo 'selected="Selected"';} ?>>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" name="gym_text" value="<?php if(isset($sitenxdata['gym_text'])) echo $sitenxdata['gym_text']; ?>"/>
                 </div>
                  <div class="col-sm-2 form-group gym-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control"  name="gym_file"/> <span><?php if(isset($sitenxdata['gym_file'])) echo $sitenxdata['gym_file']; ?></span>
                 </div>
                 
                   <div class="col-sm-2 form-group aerobices">
                     <label class="control-label">Aerobics</label>
                    <select class="form-control" name="aerobics_court">
                        <option value="Available" <?php if(isset($sitenxdata['aerobics_court'])){ if($sitenxdata['aerobics_court'] == 'Available') echo 'selected="Selected"';} ?>>Available</option>
                         <option value="Not Available" <?php if(isset($sitenxdata['aerobics_court'])){ if($sitenxdata['aerobics_court'] == 'Not Available') echo 'selected="Selected"';} ?>>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" name="aerobics_text" value="<?php if(isset($sitenxdata['aerobics_text'])) echo $sitenxdata['aerobics_text']; ?>"/>
                 </div>
                  <div class="col-sm-2 form-group aerobics-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control"  name="aerobics_file"/> <span><?php if(isset($sitenxdata['aerobics_file'])) echo $sitenxdata['aerobics_file']; ?></span>
                 </div>
                 
                   <div class="col-sm-2 form-group cafeteria">
                     <label class="control-label">Cafeteria</label>
                     <select class="form-control" name="cafeteria">
                          <option value="Available" <?php if(isset($sitenxdata['cafeteria'])){ if($sitenxdata['cafeteria'] == 'Available') echo 'selected="Selected"';} ?>>Available</option>
                         <option value="Not Available" <?php if(isset($sitenxdata['cafeteria'])){ if($sitenxdata['cafeteria'] == 'Not Available') echo 'selected="Selected"';} ?>>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                   <input type="text" class="form-control" name="cafeteria_text" value="<?php if(isset($sitenxdata['cafeteria_text'])) echo $sitenxdata['cafeteria_text']; ?>"/>
                 </div>
                  <div class="col-sm-2 form-group cafeteria-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control"  name="cafeteria_file"/> <span><?php if(isset($sitenxdata['cafeteria_file'])) echo $sitenxdata['cafeteria_file']; ?></span>
                 </div>
                 
                   <div class="col-sm-2 form-group lounge">
                     <label class="control-label">Lounge</label>
                     <select class="form-control" name="lounge_court">
                         <option value="Available" <?php if(isset($sitenxdata['lounge_court'])){ if($sitenxdata['lounge_court'] == 'Available') echo 'selected="Selected"';} ?>>Available</option>
                         <option value="Not Available" <?php if(isset($sitenxdata['lounge_court'])){ if($sitenxdata['lounge_court'] == 'Not Available') echo 'selected="Selected"';} ?>>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                   <input type="text" class="form-control" name="lounge_text" value="<?php if(isset($sitenxdata['lounge_text'])) echo $sitenxdata['lounge_text']; ?>"/>
                 </div>
                  <div class="col-sm-2 form-group lounge-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control"  name="lounge_file"/> <span><?php if(isset($sitenxdata['lounge_file'])) echo $sitenxdata['lounge_file']; ?></span>
                 </div>
                 
                   <div class="col-sm-2 form-group library">
                     <label class="control-label">Library</label>
                     <select class="form-control" name="library">
                        <option value="Available" <?php if(isset($sitenxdata['library'])){ if($sitenxdata['library'] == 'Available') echo 'selected="Selected"';} ?>>Available</option>
                         <option value="Not Available" <?php if(isset($sitenxdata['library'])){ if($sitenxdata['library'] == 'Not Available') echo 'selected="Selected"';} ?>>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                     <input type="text" class="form-control" name="library_text" value="<?php if(isset($sitenxdata['library_text'])) echo $sitenxdata['library_text']; ?>"/>
                 </div>
                  <div class="col-sm-2 form-group library-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control"  name="library_file"/> <span><?php if(isset($sitenxdata['library_file'])) echo $sitenxdata['library_file']; ?></span>
                 </div>
                 
                   <div class="col-sm-2 form-group spa">
                     <label class="control-label">SPA</label>
                      <select class="form-control" name="spa_court">
                        <option value="Available" <?php if(isset($sitenxdata['spa_court'])){ if($sitenxdata['spa_court'] == 'Available') echo 'selected="Selected"';} ?>>Available</option>
                         <option value="Not Available" <?php if(isset($sitenxdata['spa_court'])){ if($sitenxdata['spa_court'] == 'Not Available') echo 'selected="Selected"';} ?>>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                     <input type="text" class="form-control" name="spa_text" value="<?php if(isset($sitenxdata['spa_text'])) echo $sitenxdata['spa_text']; ?>"/>
                 </div>
                  <div class="col-sm-2 form-group spa-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control"  name="spa_file"/>  <span><?php if(isset($sitenxdata['spa_file'])) echo $sitenxdata['spa_file']; ?></span>
                 </div>
                 
                   <div class="col-sm-2 form-group yoga">
                     <label class="control-label">Yoga/Meditation Room</label>
                     <select class="form-control" name="yoga">
                          <option value="Available" <?php if(isset($sitenxdata['yoga'])){ if($sitenxdata['yoga'] == 'Available') echo 'selected="Selected"';} ?>>Available</option>
                         <option value="Not Available" <?php if(isset($sitenxdata['yoga'])){ if($sitenxdata['yoga'] == 'Not Available') echo 'selected="Selected"';} ?>>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group yoga-input">
                    <label class="control-label emnptyu">&nbsp;</label>
                     <input type="text" class="form-control" name="yoga_text" value="<?php if(isset($sitenxdata['yoga_text'])) echo $sitenxdata['yoga_text']; ?>"/>
                 </div>
                  <div class="col-sm-2 form-group yoga-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control"  name="yoga_file"/> <span><?php if(isset($sitenxdata['yoga_file'])) echo $sitenxdata['yoga_file']; ?></span>
                 </div>
                 
                   <div class="col-sm-2 form-group home-theatre">
                     <label class="control-label">Home Theatre</label>
                      <select class="form-control" name="homethatre_court">
                         <option value="Available" <?php if(isset($sitenxdata['homethatre_court'])){ if($sitenxdata['homethatre_court'] == 'Available') echo 'selected="Selected"';} ?>>Available</option>
                         <option value="Not Available" <?php if(isset($sitenxdata['homethatre_court'])){ if($sitenxdata['homethatre_court'] == 'Not Available') echo 'selected="Selected"';} ?>>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                     <input type="text" class="form-control" name="homethatre_text" value="<?php if(isset($sitenxdata['homethatre_text'])) echo $sitenxdata['homethatre_text']; ?>"/>
                 </div>
                  <div class="col-sm-2 form-group home-theatre-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control"  name="homethatre_file"/> <span><?php if(isset($sitenxdata['homethatre_file'])) echo $sitenxdata['homethatre_file']; ?></span>
                 </div>
                 
                 <div class="col-sm-2 form-group guest-rooms">
                     <label class="control-label">Guest Rooms</label>
                     <select class="form-control" name="guest">
                         <option value="Available" <?php if(isset($sitenxdata['guest'])){ if($sitenxdata['guest'] == 'Available') echo 'selected="Selected"';} ?>>Available</option>
                         <option value="Not Available" <?php if(isset($sitenxdata['guest'])){ if($sitenxdata['guest'] == 'Not Available') echo 'selected="Selected"';} ?>>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                     <input type="text" class="form-control" name="guest_text" value="<?php if(isset($sitenxdata['guest_text'])) echo $sitenxdata['guest_text']; ?>"/>
                 </div>
                  <div class="col-sm-2 form-group guest-rooms-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control"  name="guest_file"/> <span><?php if(isset($sitenxdata['guest_file'])) echo $sitenxdata['guest_file']; ?></span>
                 </div>
                 
                 <div class="col-sm-2 form-group indoor-games">
                     <label class="control-label">Indoor Games</label>
                     <select class="form-control" name="indoorgam_court">
                      <option value="Available" <?php if(isset($sitenxdata['indoorgam_court'])){ if($sitenxdata['indoorgam_court'] == 'Available') echo 'selected="Selected"';} ?>>Available</option>
                         <option value="Not Available" <?php if(isset($sitenxdata['indoorgam_court'])){ if($sitenxdata['indoorgam_court'] == 'Not Available') echo 'selected="Selected"';} ?>>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                     <input type="text" class="form-control" name="indoorgam_text" value="<?php if(isset($sitenxdata['indoorgam_text'])) echo $sitenxdata['indoorgam_text']; ?>"/>
                 </div>
                  <div class="col-sm-2 form-group indoor-games-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control"  name="indoorgam_file"/> <span><?php if(isset($sitenxdata['indoorgam_file'])) echo $sitenxdata['indoorgam_file']; ?></span>
                 </div>
                 
                 <div class="col-sm-2 form-group waiting-lounge">
                     <label class="control-label">Waiting Lounge</label>
                      <select class="form-control" name="waiting">
                         <option value="Available" <?php if(isset($sitenxdata['waiting'])){ if($sitenxdata['waiting'] == 'Available') echo 'selected="Selected"';} ?>>Available</option>
                         <option value="Not Available" <?php if(isset($sitenxdata['waiting'])){ if($sitenxdata['waiting'] == 'Not Available') echo 'selected="Selected"';} ?>>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                     <input type="text" class="form-control" name="waiting_text" value="<?php if(isset($sitenxdata['waiting_text'])) echo $sitenxdata['waiting_text']; ?>"/>
                 </div>
                  <div class="col-sm-2 form-group waiting-lounge-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control"  name="waiting_file"/> <span><?php if(isset($sitenxdata['waiting_file'])) echo $sitenxdata['waiting_file']; ?></span>
                 </div> 
                 
                 <div class="col-sm-2 form-group changing-rooms">
                     <label class="control-label">Changing Rooms</label>
                     <select class="form-control" name="changingrm_court">
                         <option value="Available" <?php if(isset($sitenxdata['changingrm_court'])){ if($sitenxdata['changingrm_court'] == 'Available') echo 'selected="Selected"';} ?>>Available</option>
                         <option value="Not Available" <?php if(isset($sitenxdata['changingrm_court'])){ if($sitenxdata['changingrm_court'] == 'Not Available') echo 'selected="Selected"';} ?>>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                     <input type="text" class="form-control" name="changingrm_text" value="<?php if(isset($sitenxdata['changingrm_text'])) echo $sitenxdata['changingrm_text']; ?>"/>
                 </div>
                  <div class="col-sm-2 form-group changing-rooms-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control"  name="changingrm_file"/> <span><?php if(isset($sitenxdata['changingrm_file'])) echo $sitenxdata['changingrm_file']; ?></span>
                 </div>
                 
                 <div class="col-sm-2 form-group banquet-halls">
                     <label class="control-label">Banquet Hall</label>
                     <select class="form-control" name="banquet">
                         <option value="Available" <?php if(isset($sitenxdata['banquet'])){ if($sitenxdata['banquet'] == 'Available') echo 'selected="Selected"';} ?>>Available</option>
                         <option value="Not Available" <?php if(isset($sitenxdata['banquet'])){ if($sitenxdata['banquet'] == 'Not Available') echo 'selected="Selected"';} ?>>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                     <input type="text" class="form-control" name="banquet_text" value="<?php if(isset($sitenxdata['banquet_text'])) echo $sitenxdata['banquet_text']; ?>"/>
                 </div>
                  <div class="col-sm-2 form-group banquet-halls-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control"  name="banquet_file"/> <span><?php if(isset($sitenxdata['banquet_file'])) echo $sitenxdata['banquet_file']; ?></span>
                 </div> 
                 
                 <div class="col-sm-2 form-group pantry">
                     <label class="control-label">Pantry</label>
                    <select class="form-control" name="pantry_court">
                        <option value="Available" <?php if(isset($sitenxdata['pantry_court'])){ if($sitenxdata['pantry_court'] == 'Available') echo 'selected="Selected"';} ?>>Available</option>
                         <option value="Not Available" <?php if(isset($sitenxdata['pantry_court'])){ if($sitenxdata['pantry_court'] == 'Not Available') echo 'selected="Selected"';} ?>>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                     <input type="text" class="form-control" name="pantry_text" value="<?php if(isset($sitenxdata['pantry_text'])) echo $sitenxdata['pantry_text']; ?>"/>
                 </div>
                  <div class="col-sm-2 form-group pantry-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control"  name="pantry_file"/> <span><?php if(isset($sitenxdata['pantry_file'])) echo $sitenxdata['pantry_file']; ?></span>
                 </div>
                 
                 <div class="col-sm-2 form-group service-rooms">
                     <label class="control-label">Service Room</label>
                    <select class="form-control" name="service">
                         <option value="Available" <?php if(isset($sitenxdata['service'])){ if($sitenxdata['service'] == 'Available') echo 'selected="Selected"';} ?>>Available</option>
                         <option value="Not Available" <?php if(isset($sitenxdata['service'])){ if($sitenxdata['service'] == 'Not Available') echo 'selected="Selected"';} ?>>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                     <input type="text" class="form-control" name="service_text" value="<?php if(isset($sitenxdata['service_text'])) echo $sitenxdata['service_text']; ?>"/>
                 </div>
                  <div class="col-sm-2 form-group service-rooms-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control"  name="service_file"/> <span><?php if(isset($sitenxdata['service_file'])) echo $sitenxdata['service_file']; ?></span>
                 </div>
                 
                 <div class="col-sm-12 swimming-poolouter">
                 <div class="col-sm-2 form-group swimming-pool">
                     <label class="control-label">Swimming Pool</label>
                      <select class="form-control" name="swimmingpool">
                          <option value="Available" <?php if(isset($sitenxdata['swimmingpool'])){ if($sitenxdata['swimmingpool'] == 'Available') echo 'selected="Selected"';} ?>>Available</option>
                         <option value="Not Available" <?php if(isset($sitenxdata['swimmingpool'])){ if($sitenxdata['swimmingpool'] == 'Not Available') echo 'selected="Selected"';} ?>>Not Available</option>
                     </select>
                 </div>
                
                 
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                     <input type="text" class="form-control" name="swimmingtext" value="<?php if(isset($sitenxdata['swimmingtext'])) echo $sitenxdata['swimmingtext']; ?>"/>
                 </div>
                  <div class="col-sm-2 form-group swimming-pool-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control"  name="swimming_file"/> <span><?php if(isset($sitenxdata['swimming_file'])) echo $sitenxdata['swimming_file']; ?></span>
                 </div>
                 </div>
                 
                 <div class="col-sm-12 form-group swimming-poolsubindoor">
                     <div class="col-sm-2 indoor-pool">
                    <label class="control-label">Indoor Pool</label>
                    <input type="text" class="form-control"  name="indoorpool" value="<?php if(isset($sitenxdata['indoorpool'])) echo $sitenxdata['indoorpool']; ?>" />
                 </div>
                  <div class="col-sm-2">
                    <label class="control-label">Outdoor Pool</label>
                    <input type="text" class="form-control" name="outdoorpool"   value="<?php if(isset($sitenxdata['outdoorpool'])) echo $sitenxdata['outdoorpool']; ?>" />
                 </div>
                 <div class="col-sm-2">
                    <label class="control-label">Baby Pool</label>
                    <input type="text" class="form-control"  name="babypool"   value="<?php if(isset($sitenxdata['babypool'])) echo $sitenxdata['babypool']; ?>"/>
                 </div>
                 <div class="col-sm-2">
                    <label class="control-label">Club House Area( sft)</label>
                    <input type="text" class="form-control"  name="cbharea"   value="<?php if(isset($sitenxdata['cbharea'])) echo $sitenxdata['cbharea']; ?>"/>
                 </div>
                 </div>
                 
                  <div class="col-sm-2 form-group open-restaurant">
                     <label class="control-label">Open Restaurant</label>
                      <select class="form-control" name="openrestu_court">
                         <option value="Available" <?php if(isset($sitenxdata['openrestu_court'])){ if($sitenxdata['openrestu_court'] == 'Available') echo 'selected="Selected"';} ?>>Available</option>
                         <option value="Not Available" <?php if(isset($sitenxdata['openrestu_court'])){ if($sitenxdata['openrestu_court'] == 'Not Available') echo 'selected="Selected"';} ?>>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                     <input type="text" class="form-control" name="openrestu_text" value="<?php if(isset($sitenxdata['openrestu_text'])) echo $sitenxdata['openrestu_text']; ?>"/>
                 </div>
                  <div class="col-sm-2 form-group open-restaurant-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control"  name="openrestu_file"/> <span><?php if(isset($sitenxdata['openrestu_file'])) echo $sitenxdata['openrestu_file']; ?></span>
                 </div>
                  <div class="col-sm-2 form-group sitting-area">
                     <label class="control-label">Sitting area</label>
                     <select class="form-control" name="sitting">
                         <option value="Available" <?php if(isset($sitenxdata['sitting'])){ if($sitenxdata['sitting'] == 'Available') echo 'selected="Selected"';} ?>>Available</option>
                         <option value="Not Available" <?php if(isset($sitenxdata['sitting'])){ if($sitenxdata['sitting'] == 'Not Available') echo 'selected="Selected"';} ?>>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                     <input type="text" class="form-control" name="sitting_text" value="<?php if(isset($sitenxdata['sitting_text'])) echo $sitenxdata['sitting_text']; ?>"/>
                 </div>
                  <div class="col-sm-2 form-group sitting-area-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control"  name="sitting_file"/> <span><?php if(isset($sitenxdata['sitting_file'])) echo $sitenxdata['sitting_file']; ?></span>
                 </div>
                  <div class="col-sm-2 form-group super-market">
                     <label class="control-label">Super Market</label>
                      <select class="form-control" name="supermark_court">
                       <option value="Available" <?php if(isset($sitenxdata['supermark_court'])){ if($sitenxdata['supermark_court'] == 'Available') echo 'selected="Selected"';} ?>>Available</option>
                         <option value="Not Available" <?php if(isset($sitenxdata['supermark_court'])){ if($sitenxdata['supermark_court'] == 'Not Available') echo 'selected="Selected"';} ?>>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                     <input type="text" class="form-control" name="supermark_text" value="<?php if(isset($sitenxdata['supermark_text'])) echo $sitenxdata['supermark_text']; ?>"/>
                 </div>
                  <div class="col-sm-2 form-group super-market-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control"  name="supermark_file"/> <span><?php if(isset($sitenxdata['supermark_file'])) echo $sitenxdata['supermark_file']; ?></span>
                 </div>
                  <div class="col-sm-2 form-group creche">
                     <label class="control-label">Creche</label>
                     <select class="form-control" name="creche">
                       <option value="Available" <?php if(isset($sitenxdata['creche'])){ if($sitenxdata['creche'] == 'Available') echo 'selected="Selected"';} ?>>Available</option>
                         <option value="Not Available" <?php if(isset($sitenxdata['creche'])){ if($sitenxdata['creche'] == 'Not Available') echo 'selected="Selected"';} ?>>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                     <input type="text" class="form-control" name="creche_text" value="<?php if(isset($sitenxdata['creche_text'])) echo $sitenxdata['creche_text']; ?>"/>
                 </div>
                  <div class="col-sm-2 form-group creche-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control"  name="creche_file"/> <span><?php if(isset($sitenxdata['creche_file'])) echo $sitenxdata['creche_file']; ?></span>
                 </div>
                  <div class="col-sm-2 form-group tennis-court">
                     <label class="control-label">Tennis Court</label>
                      <select class="form-control" name="tenniescourt_court">
                        <option value="Available" <?php if(isset($sitenxdata['tenniescourt_court'])){ if($sitenxdata['tenniescourt_court'] == 'Available') echo 'selected="Selected"';} ?>>Available</option>
                         <option value="Not Available" <?php if(isset($sitenxdata['tenniescourt_court'])){ if($sitenxdata['tenniescourt_court'] == 'Not Available') echo 'selected="Selected"';} ?>>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                     <input type="text" class="form-control" name="tenniescourt_text" value="<?php if(isset($sitenxdata['tenniescourt_text'])) echo $sitenxdata['tenniescourt_text']; ?>"/>
                 </div>
                  <div class="col-sm-2 form-group tennis-court-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control"  name="tenniescourt_file"/> <span><?php if(isset($sitenxdata['tenniescourt_file'])) echo $sitenxdata['tenniescourt_file']; ?></span>
                 </div>
                  <div class="col-sm-2 form-group basketball-court">
                     <label class="control-label">Basketball Court</label>
                     <select class="form-control" name="basket">
                         <option value="Available" <?php if(isset($sitenxdata['basket'])){ if($sitenxdata['basket'] == 'Available') echo 'selected="Selected"';} ?>>Available</option>
                         <option value="Not Available" <?php if(isset($sitenxdata['basket'])){ if($sitenxdata['basket'] == 'Not Available') echo 'selected="Selected"';} ?>>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                     <input type="text" class="form-control" name="basket_text" value="<?php if(isset($sitenxdata['basket_text'])) echo $sitenxdata['basket_text']; ?>"/>
                 </div>
                  <div class="col-sm-2 form-group basketball-court-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control"  name="basket_file"/> <span><?php if(isset($sitenxdata['basket_file'])) echo $sitenxdata['basket_file']; ?></span>
                 </div>
                  <div class="col-sm-2 form-group cricket-net">
                     <label class="control-label">Cricket Net</label>
                     <select class="form-control" name="cricketnet">
                         <option value="Available" <?php if(isset($sitenxdata['cricketnet'])){ if($sitenxdata['cricketnet'] == 'Available') echo 'selected="Selected"';} ?>>Available</option>
                         <option value="Not Available"  <?php if(isset($sitenxdata['cricketnet'])){ if($sitenxdata['cricketnet'] == 'Not Available') echo 'selected="Selected"';} ?>>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                     <input type="text" class="form-control" name="cricketnet_text" value="<?php if(isset($sitenxdata['cricketnet_text'])) echo $sitenxdata['cricketnet_text']; ?>"/>
                 </div>
                  <div class="col-sm-2 form-group cricket-net-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control"  name="cricketnet_file"/>  <span><?php if(isset($sitenxdata['cricketnet_file'])) echo $sitenxdata['cricketnet_file']; ?></span>
                 </div> 
                  <div class="col-sm-2 form-group volley-ball">
                     <label class="control-label">Volley Ball</label>
                     <select class="form-control" name="volley">
                         <option value="Available" <?php if(isset($sitenxdata['volley'])){ if($sitenxdata['volley'] == 'Available') echo 'selected="Selected"';} ?>>Available</option>
                         <option value="Not Available" <?php if(isset($sitenxdata['volley'])){ if($sitenxdata['volley'] == 'Not Available') echo 'selected="Selected"';} ?>>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                     <input type="text" class="form-control" name="volley_text" value="<?php if(isset($sitenxdata['volley_text'])) echo $sitenxdata['volley_text']; ?>"/>
                 </div>
                  <div class="col-sm-2 form-group volley-ball-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control"  name="volley_file"/>  <span><?php if(isset($sitenxdata['volley_file'])) echo $sitenxdata['volley_file']; ?></span>
                 </div>
                  <div class="col-sm-2 form-group skating">
                     <label class="control-label">Skating</label>
                    <select class="form-control" name="staking">
                         <option value="Available" <?php if(isset($sitenxdata['staking'])){ if($sitenxdata['staking'] == 'Available') echo 'selected="Selected"';} ?>>Available</option>
                         <option value="Not Available" <?php if(isset($sitenxdata['staking'])){ if($sitenxdata['staking'] == 'Not Available') echo 'selected="Selected"';} ?>>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                     <input type="text" class="form-control" name="staking_text" value="<?php if(isset($sitenxdata['staking_text'])) echo $sitenxdata['staking_text']; ?>"/>
                 </div>
                  <div class="col-sm-2 form-group skating-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control"  name="staking_file"/> <span> <?php if(isset($sitenxdata['staking_file'])) echo $sitenxdata['staking_file']; ?></span>
                 </div>
                 
             </div>
             
             
           <div class="row communitybackground guide-single-line">
             <div class="col-xs-3 form-group guide">
                   <label>Guide</label>
                   <input type="file" class="form-control" name="guide" /> <?php if(isset($sitenxdata['guide'])) echo $sitenxdata['guide']; ?>
                </div>
            </div>
             		 
        </div>
    </div>  


 

   <?php /*?><a href="/sites/create?site_id=<?php echo $site_id; ?>" class="btn btn-previous">Previous</a><?php */?>
{!! Form::submit('Submit', ['class' => 'btn btn-danger btn-register sites-next-button']) !!}
{!! Form::close() !!} 

</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 <script>
 
 $( document ).ready(function() {


  $(".datetpick").datepicker({

        dateFormat: "dd-mm-yy",
  });
  
   $(".datetpickpop").datepicker({

        dateFormat: "dd-mm-yy",
  });
 });
	
	


  
 </script>
  @include('partials.footer')
@stop

