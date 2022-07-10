<!DOCTYPE html>
<html lang="en">
<?php 
require_once('../class/Request.php');
if(isset($_GET['choice'])){
    $choice = $_GET['choice'];

    $reports = $request->all_request_list($choice);
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

    <title>PhilHealth Inventory System</title>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-theme.min.css">
    <link href="../assets/css/dataTables.bootstrap.min.css" rel="stylesheet">


</head>
<body>


<center>
    <h2>PhilHealth Request List</h2>
    <h3>as of</h3>
    <h3><?= date('m-d-Y'); ?></h3>
</center>

<br />
<div class="table-responsive">
       <table id="myTable-report" class="table table-bordered table-hover" cellspacing="0" width="100%">
       <thead>
	    <tr>
	        <td>Employee</td>
	        <td>Item Name</td>
	        <td>Date</td>
			<td>Quantity</td>
			<td>Department</td>
	        <!--<td>Request for</td>-->
	        <!-- <th><center>Action</center></th> -->
	    </tr>
	</thead>
 	<tbody>
    	<?php foreach($reports as $r): 
    		$id = $r['req_id'];
            $iid = $r['item_id'];
           $req_done = $r['req_is_done'];
           $off_desc = $r['off_desc'];
           $am =$r['amount'];
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
</div>


    <script type="text/javascript">
        print();
    </script>
</body>
</html>

<?php

    // echo $choice;
}//end isset


