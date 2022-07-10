<?php 
require_once('../class/Request.php');
$choice = ($_POST['choice']);
$results = $request->all_request_list($choice);

// echo '<pre>';
// 	print_r($results);
// echo '</pre>';

?>

<table id="myTable-request-report" class="table table-bordered table-hover" cellspacing="0" width="100%">
	<thead>
	    <tr>
	        <td>Employee</td>
	        <td>Item Name</td>
	        <td>Date</td>
			<td>Quantity</td>
			<td>Department</td>
	        <!--<td>Request for</td>-->
	    </tr>
	</thead>
 	<tbody>
 	<?php foreach($results as $r):
 		$id = $r['req_id'];
 		$iid = $r['item_id'];
		$req_done = $r['req_is_done'];
		$off_desc = $r['off_desc'];
		$am =$r['amount'];

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
 			<td><?= $r['emp_fname'].' '.$r['emp_mname'].' '.$r['emp_lname'] ; ?></td>
 			<td><?= $r['item_name']; ?></td>
 			<td><?= $r['req_date']; ?></td>
			<td><?= $r['amount'] ?></td>
			<td><?= $off_desc?></td>
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
		$('#myTable-request-report').DataTable();
	});
</script>




