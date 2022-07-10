<?php 
interface iRequest{
	public function my_session_start();
	public function set_item_id($item_id);
	public function get_item_id();
	public function new_request($pDate, $a, $iID, $eID);
	public function all_owners_request();
	public function request_done($req_id, $item_id, $dep, $amount);
	public function all_request_from_admin();
	public function all_request_list($choice);
	public function request_remove($req_id);

}