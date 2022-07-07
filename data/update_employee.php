<?php 
require_once('../class/Employee.php');

if(isset($_POST['data'])){
	$data = json_decode($_POST['data'], true);
	$fN = $data[0];
	$mN = $data[1];
	$lN = $data[2];
	$pos = $data[3];
	$off = $data[4];
	$eid = $data[5];

	$result['valid'] = $employee->update_employee($fN, $mN, $lN, $pos, $off, $eid);
	if($result['valid']){
		$result['msg'] = "Employee Updated Successfully!";
		echo json_encode($result);	
	}

}


$employee->Disconnect();