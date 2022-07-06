<?php 
require_once('../class/Item.php'); 
$allItem = $item->get_all_items();
// echo '<pre>';
// 	print_r($allItem);
// echo '</pre>';
?>

<br />
<table id="myTable" class="table table-bordered table-hover" cellspacing="0" width="100%">
	<thead>
	    <tr>
	        <th><center>Particulars</center></th>
	        <!--<th>Owner</th>
	        <th>Office</th>
	        <th>Category</th>-->
			<th colspan="4"><center>Quantity</center></th>
			<th><center>Total</center></th>
	        <th><center>Action</center></th>
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
			<td></td>
		</tr>
		<?php 
			foreach ($allItem as $i) {
				# code...
				$fN = $i['emp_fname'];
				$mN = $i['emp_mname'];
				//$mN = $mN[0].'.';
				$lN = $i['emp_lname'];
				$fullName = "$fN $mN $lN";
				$fullName = ucwords($fullName);
		?>
			<tr>
				<td onclick="item_profile('<?php echo $i['item_id']; ?>');"><?php echo $i['item_name']; ?></td>
				<!--<td onclick="item_profile('<?php //echo $i['item_id']; ?>');"><?php //echo $fullName; ?></td>
				<td onclick="item_profile('<?php //echo $i['item_id']; ?>');"><?php //echo ucwords($i['off_desc']); ?></td>
				<td onclick="item_profile('<?php //echo $i['item_id']; ?>');"><?php //echo ucwords($i['cat_desc']); ?></td>-->
				<td onclick="item_profile('<?php echo $i['item_id']; ?>');"><?php echo ucwords($i['om_amount']); ?></td>
				<td onclick="item_profile('<?php echo $i['item_id']; ?>');"><?php echo ucwords($i['ismd_amount']); ?></td>
				<td onclick="item_profile('<?php echo $i['item_id']; ?>');"><?php echo ucwords($i['itrmd_amount']); ?></td>
				<td onclick="item_profile('<?php echo $i['item_id']; ?>');"><?php echo ucwords($i['ippsd_amount']); ?></td>
				<?php
				$total_amount = $i['om_amount']+$i['ismd_amount']+$i['itrmd_amount']+$i['ippsd_amount'];
				?>
				<td onclick="item_profile('<?php echo $i['item_id']; ?>');"><?php echo ucwords($total_amount); ?></td>
				
				<td align="center">
					<button onclick="fill_update_modal('<?php echo $i['item_id']; ?>');" class="btn btn-warning btn-sm"
					id="btn-edit">
					<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
					Edit
					</button>
					<!--<button class="btn btn-success btn-sm" onclick="item_profile('<?php //echo $i['item_id']; ?>');">
					<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
					View
					</button>-->
				</td>
			</tr>
		<?php		
			}//end foreach
		 ?>
    </tbody>
</table>


<?php 
$item->Disconnect();
 ?>

<!-- for the datatable of item -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#myTable').DataTable();
	});




</script>
