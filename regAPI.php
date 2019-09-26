<?php
include('DbConfig.php');

$data=$_POST;
$msg=array();

//if(!strlen($data['firstname'])) $msg="Required Firstname";
//if(!strlen($data['lastname'])) $msg="Required Lastname";
if(!strlen($data['username'])) $msg['user']="Required Username";
if(!strlen($data['password'])) $msg['password']="Required Password";
if(!strlen($data['email']))  $msg['email']="Required Email";
	elseif(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$data['email'])) $msg=" *Enter Valid Email";
//if(!strlen($data['phone'])) $msg="Required phone";
	$select ="SELECT * from users where username='".$data['username']."' or email='".$data['eemail']."'";
	$select_exe=$obj_db->fetchNum($select);
	if($select_exe>0){
	$inv=array();
	$inv['error']="Data exists";
	//echo json_encode(array("status"=>500,"response"=>$inv,"message"=>"Username already exists"));	
	echo json_encode(array("error"=>500,"message"=>"Username already exists"));	
	exit;
	}
if(count($msg)==0){

	$insert="INSERT into API_login set
				
				username='".$data['username']."',
				password='".$data['password']."',
				email='".$data['email']."';
				$insert_exe=$obj_db->get_qresult($insert);
				$last_insert_id=$obj_db->insert_id();
			$response=array();
			//$response['firstname'] = $data['firstname'];
			//$response['lastname'] = $data['lastname'];
			$response['username'] = $data['username'];
			$response['password'] = $data['password'];
			$response['email'] = $data['email'];
		    //$response['phone'] = $data['phone'];
			
			echo json_encode(array("error"=>200,"message"=>"Registration Success"));
			exit;
			}
			else{
			echo json_encode(array("error"=>500,"message"=>"All fields Required"));
			}
	
?>