<?php
require_once('../database/Database.php');
require_once('../interface/iItem.php');
class Item extends Database implements iItem{
	public function __construct()
	{
		parent:: __construct();
	}

	public function insert_item($iN, /*$sN, $mN, $b,*/ $om_a, $ismd_a, $itrmd_a, $ippsd_a, $pD, $eID, $cID)
	{
		$sql = "INSERT INTO tbl_item
		        (item_name,/*item_serno, item_modno, item_brand,*/ om_amount, ismd_amount, itrmd_amount, ippsd_amount, item_purdate, emp_id, cat_id)
				VALUES(?/*?,?,?*/,?,?,?,?,?,?,?);
		";
		$result = $this->insertRow($sql, [$iN, /*$sN, $mN, $b,*/ $om_a, $ismd_a, $itrmd_a, $ippsd_a, $pD, $eID, $cID]);
		return $result;
	}

	public function update_item($iN, /*$sN, $mN, $b,*/ $om_a, $ismd_a, $itrmd_a, $ippsd_a, $pD, $eID, $cID, $iID)
	{	
		$sql="UPDATE tbl_item
			  SET 
			  item_name = ?, 
			  /*item_serno = ?, 
			  item_modno = ?, 
			  item_brand = ?,*/ 
			  om_amount = ?,
			  ismd_amount = ?,
			  itrmd_amount = ?,
			  ippsd_amount = ?, 
			  item_purdate = ?, 	
			  emp_id = ?, 
			  cat_id = ?
			  WHERE item_id = ?
		";
		$result = $this->updateRow($sql, [$iN, /*$sN, $mN, $b,*/ $om_a, $ismd_a, $itrmd_a, $ippsd_a, $pD, $eID, $cID, $iID]);
		return $result;
	}

	public function get_item($id)
	{
		$sql="SELECT *
			  FROM tbl_item i
			  INNER JOIN tbl_employee e
			  ON i.emp_id = e.emp_id
			  INNER JOIN tbl_off o
			  ON e.off_id = o.off_id
			  /*INNER JOIN tbl_con c 
			  ON c.con_id = i.con_id*/
			  INNER JOIN tbl_cat ca
			  ON ca.cat_id = i.cat_id
			  WHERE i.item_id = ?
		";
		$result = $this->getRow($sql, [$id]);
		return $result;
	}
	public function get_all_items()
	{
		/*get all items with the office nga naa sa emp*/
		$sql = "SELECT *
				FROM tbl_item i
				INNER JOIN tbl_employee e
				ON i.emp_id = e.emp_id
				INNER JOIN tbl_off o
				ON e.off_id = o.off_id
				/*INNER JOIN tbl_con c 
				ON c.con_id = i.con_id*/
				INNER JOIN tbl_cat ca
				ON ca.cat_id = i.cat_id
				ORDER by i.item_name
		";
		$result = $this->getRows($sql);
		return $result;
	}

	public function item_categories()
	{
		$sql = "SELECT * FROM tbl_cat";
		return $this->getRows($sql);
	}

	/*public function item_conditions()
	{
		$sql = "SELECT * FROM tbl_con";
		return $this->getRows($sql);
	}*/


	public function item_report($choice)
	{
		$sql = "";
		if($choice == 'all'){
			$sql = "SELECT *
					FROM tbl_item i 
					INNER JOIN tbl_employee e 
					ON i.emp_id = e.emp_id
					INNER JOIN tbl_cat c 
					ON i.cat_id = c.cat_id
					/*INNER JOIN tbl_con co 
					ON i.con_id = co.con_id*/
					INNER JOIN tbl_off o 
					ON o.off_id = e.off_id";
			return $this->getRows($sql);
		}
	}//end item_report

}

$item = new Item();

/* End of file Item.php */
/* Location: .//D/xampp/htdocs/deped/class/Item.php */

