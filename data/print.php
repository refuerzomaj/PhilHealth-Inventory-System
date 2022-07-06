<!DOCTYPE html>
<html lang="en">
<?php 
require_once('../class/Item.php');
if(isset($_GET['choice'])){
    $choice = $_GET['choice'];

    $reports = $item->item_report($choice);
    // echo '<pre>';
    //  print_r($reports);
    // echo '</pre>';

?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DepEd Inventory System</title>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-theme.min.css">
    <link href="../assets/css/dataTables.bootstrap.min.css" rel="stylesheet">


</head>
<body>


<center>
    <h2>DepEd Item Inventory</h2>
    <h3>as of</h3>
    <h3><?= date('m-d-Y'); ?></h3>
</center>

<br />
<div class="table-responsive">
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
</div>


    <script type="text/javascript">
        print();
    </script>
</body>
</html>

<?php

    // echo $choice;
}//end isset


