<?php 
require_once('../class/Item.php');
if(isset($_POST['choice'])){
	$choice = $_POST['choice'];

	$reports = $item->item_report($choice);
	// echo '<pre>';
	// 	print_r($reports);
	// echo '</pre>';

?>

<br />
<br />
<table id="myTable-report" class="table table-bordered table-hover" cellspacing="0" width="100%">
	<thead>
	    <tr>
		<th><center>Particulars</center></th>
			<th colspan="4"><center>Quantity</center></th>
			<th><center>Total</center></th>
	    </tr>
	</thead>
    <tbody>
	    <tr>
			<td></td>
			<td><strong>OM</strong></td>
			<td><strong>ISMD</strong></td>
			<td><strong>ITRMD</strong></td>
			<td><strong>IPPSD</strong></td>
			<td></td>
		</tr>
    	<?php foreach($reports as $r): 
    		$fN = $r['emp_fname'];
    		$mN = $r['emp_mname'];
    		$lN = $r['emp_lname'];
    		//$mN = $mN[0];
    		$fullName = "$fN $mN. $lN";
    		$fullName = ucwords($fullName);
    	?>
    		<tr>
    			<td><?= $r['item_name']; ?></td>
    			<td><?= $r['om_amount']; ?></td>
				<td><?= $r['ismd_amount']; ?></td>
				<td><?= $r['itrmd_amount']; ?></td>
				<td><?= $r['ippsd_amount']; ?></td>
				<?php
				$total_amount = $r['om_amount']+$r['ismd_amount']+$r['itrmd_amount']+$r['ippsd_amount'];
				?>
    			<td><?php echo ucwords($total_amount); ?></td>
    		</tr>
    	<?php endforeach; ?>
    </tbody>
</table>


<?php 
// $db->Disconnect();
 ?>

<!-- for the datatable of employee -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#myTable-report').DataTable();
	});
</script>



<?php

	// echo $choice;
}//end isset

