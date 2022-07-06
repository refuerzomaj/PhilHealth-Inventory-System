<?php 
require_once('../class/Item.php');
if(isset($_POST['data'])){
	$data = json_decode($_POST['data'], true);

	$iN = ucwords($data[0]);
	$om_a = $data[1];
	$ismd_a = $data[2];
	$itrmd_a = $data[3];
	$ippsd_a = $data[4];
	$pD = $data[5];
	$eID = $data[6];
	$cID = $data[7];

	// $result = $item->insert_item($iN, $sN, $mN, $b, $a, $pD, $eID, $cID, $coID);
	$result['valid'] = $item->insert_item($iN, /*$sN, $mN, $b,*/ $om_a, $ismd_a, $itrmd_a, $ippsd_a, $pD, $eID, $cID);
	if($result['valid']){
		$result['msg'] = "Item Added Successfully!";
		$result['action'] = "Add Data";
		echo json_encode($result);
	}
	// echo $result;
}

$item->Disconnect();
 ?>

