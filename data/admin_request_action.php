<?php 
require_once('../class/Request.php');
if(isset($_POST['req_id'])){
	//$status_id = $_POST['action'];
	$req_id = $_POST['req_id'];

	$result = $request->request_remove($req_id);
	// echo $result;

}

$request->Disconnect();