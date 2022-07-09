<?php 
require_once('../class/Request.php');
if(isset($_POST['req_id']) && 
   isset($_POST['item_id']) && 
   isset($_POST['off_id']) &&
   isset($_POST['dep_amount'])){

	$req_id = $_POST['req_id'];
	$iid = $_POST['item_id'];
	$offid = $_POST['off_id'];
	$dep = $_POST['dep_amount'];
	echo"<h1>alert</h1>";
	//status sa item table update to 4 and request done is 1 or done.
	//para ma view na sad siya og balik did2 sa owners item list, og mawala siya 
	// sa request list
	$result = $request->request_done($req_id,$iid,$offid,$dep);
}

$request->Disconnect();