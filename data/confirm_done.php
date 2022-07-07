<?php 
require_once('../class/Request.php');
if(isset($_POST['req_id'])){
	$req_id = $_POST['req_id'];

	//status sa item table update to 4 and request done is 1 or done.
	//para ma view na sad siya og balik did2 sa owners item list, og mawala siya 
	// sa request list
	$result = $request->request_done($req_id);
}

$request->Disconnect();