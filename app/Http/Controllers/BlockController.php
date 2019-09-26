<?php 
namespace App\Http\Controllers;
use App\Block;
use App\Site;
use DB;

class BlockController extends Controller
{

    public function index()
    { 
		 
		 $matchfields = ['flat_type' => 'flats'];		  
		 $sites = \App\Site::where($matchfields)->get();
		 
		 $blockarr = array("1"=>"A","2"=>"B","3"=>"C","4"=>"D","5"=>"E","6"=>"F","7"=>"G","8"=>"H","9"=>"I","10"=>"J","11"=>"K","12"=>"L","13"=>"M","14"=>"N","15"=>"O","16"=>"P","17"=>"Q","18"=>"R");
		 $blockarr1 = array("central"=>"Central Lawn","buffer"=>"Buffer Zone","club"=>"Club House","maingate"=>"Maingate","children"=>"Children Play Area","east"=>"East Side","west"=>"West Side","south"=>"South Side","noth"=>"North Side","boundary"=>"Boundary Wall","podium"=>"Central Podium");
		 if(count($sites)>0)
		 {
		 	foreach($sites as $key=>$val)
			{
				$sname = mb_substr($val->name, 0, 3);
				if($val->num_of_blocks_text>0)
				{
					$cn = $val->num_of_blocks_text;
					for($i = 1; $i <= $cn; $i++) 
					{
						$block_name = "Block - ".$blockarr[$i];
						$block_uid = $val->id."_".$sname."_".$blockarr[$i]."_".$i;
						$diconsumptn = array("coomunity_id"=>$val->id,"block_id"=>$i,"block_uid"=>$block_uid,"block_name"=>$block_name);   
					  	$insertcon = Block::create($diconsumptn); 
					 	$last_insert_id = $insertcon->id;
					}
				}
				if(!empty($blockarr1))
				{
					$i = $cn;
					foreach($blockarr1 as $key=>$value) 
					{
						$i++;
						$block_name = $value;
						$block_uid = $val->id."_".$sname."_".$key."_".$i;
						$diconsumptn = array("coomunity_id"=>$val->id,"block_id"=>$i,"block_uid"=>$block_uid,"block_name"=>$block_name);   
					  	$insertcon = Block::create($diconsumptn); 
					 	$last_insert_id = $insertcon->id;
					}
				}
			}
		 }
    }
}

