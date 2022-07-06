<?php 
interface iItem{
	public function insert_item($iN, /*$sN, $mN, $b,*/ $om_a, $ismd_a, $itrmd_a, $ippsd_a, $pD, $eID, $cID);
	public function update_item($iN, /*$sN, $mN, $b,*/ $om_a, $ismd_a, $itrmd_a, $ippsd_a, $pD, $eID, $cID, $iID);
	public function get_item($id);
	public function get_all_items();
	public function item_categories();
	//public function item_conditions();
	public function item_report($choice);
}


