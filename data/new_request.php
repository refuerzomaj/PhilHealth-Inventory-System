<?php 
require_once('../class/Request.php');

if(isset($_POST['data'])){
	$data = json_decode($_POST['data'], true);

	$pDate = $data[0];
	$eID = $data[1];
	$iID = $data[2];
	$a = $data[3];

	$result['valid'] = $request->new_request($pDate, $a, $iID, $eID);
	echo json_encode($result);
	if($result['valid']){
		$result['msg'] = "Request Added Successfully!";
		$result['action'] = "Add Data";
		echo json_encode($result['msg']);
	}
}

$request->Disconnect();