<?php 
require_once('../class/Request.php');

$results = $request->all_request_from_admin();

// echo '<pre>';
// 	print_r($results);
// echo '</pre>';

?>

<table id="myTable-request-admin" class="table table-bordered table-hover" cellspacing="0" width="100%">
	<thead>
	    <tr>
	        <td>Employee</td>
	        <td>Item Name</td>
	        <td>Date</td>
			<td>Quantity</td>
			<td>Department</td>
	        <!--<td>Request for</td>-->
	        <th><center>Action</center></th>
	    </tr>
	</thead>
 	<tbody>
 	<?php foreach($results as $r):
 		$id = $r['req_id'];
 		$iid = $r['item_id'];
		$req_done = $r['req_is_done'];

 		/*$text_color = '';
 		switch ($req_done) {
 			case 1:
 				# repair
 				$text_color = 'class="text-primary"';
 				break;
 			case 2:
 				# transfer
 				$text_color = 'class="text-warning"';
 				break;
 			case 3:
 				# for condemed
 				$text_color = 'class="text-danger"';
 				break;
 			default:
 				# code...
 				break;
 		}*/
 	 ?>
 		<tr>
 			<td><?= $r['emp_fname'].' '.$r['emp_mname'].' '.$r['emp_lname']; ?></td>
 			<td><?= $r['item_name']; ?></td>
 			<td><?= $r['req_date']; ?></td>
			<td><?= $r['amount'] ?></td>
			<td><?= $r['off_desc']?></td>
 			<td>
 				<center>
 					<button onclick="request_update('2', '<?= $id; ?>', '<?= $iid; ?>', '<?= $req_type; ?>')" type="button" class="btn btn-success btn-sm">Accept <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
 					<button type="button" class="btn btn-danger btn-sm" onclick="request_remove('<?php echo $id; ?>')">
						Reject <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
 				</center>
 			</td>
 		</tr>
	<?php endforeach; ?>
 	</tbody>
</table>


<?php 
$request->Disconnect();
 ?>

<!-- for the datatable of employee -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#myTable-request-admin').DataTable();
	});
</script>




