<?php 
require_once('../class/Item.php'); 
require_once('../class/Employee.php'); 

$employees = $employee->get_employees();
$categories = $item->item_categories();
$allItem = $item->get_all_items();
//$conditions = $item->item_conditions();

?>
<div class="modal fade" id="modal-add-request">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">New Request</h4>
			</div>
			<div class="modal-body">
				<!-- main form -->
					<form class="form-horizontal" role="form" id="add-req-form">
					<div class="form-group">
					    <label class="control-label col-sm-3" for="empID-req">Employee:</label>
					    <div class="col-sm-9"> 
					    	<select class="btn btn-default" id="empID-req">
							<option value="">Choose</option>
								<?php 
									foreach ($employees as $empployee) {
										# code..
									$fN = $empployee['emp_fname'];
									$mN = $empployee['emp_mname'];
									$lN = $empployee['emp_lname'];
									$fullName = "$fN $mN $lN";
									$fullName = ucwords($fullName);
									$emp_id = $empployee['emp_id'];

									if($emp_id == 49){
										continue;
									}
								?>	
									<option value="<?php echo $emp_id; ?>"><?php echo $fullName; ?></option>}
								<?php
									}//end foreach
								 ?>					    		
					    	</select>
					    </div>
					  </div>

					  <div class="form-group">
					    <label class="control-label col-sm-3" for="iID-req">Item Name:</label>
					    <div class="col-sm-3"> 
					    	<select name="" class="btn btn-default" id="iID-req">
							<option value="">Choose</option>
					    		<?php 
					    			foreach ($allItem as $i) {
					    				# code...
									$itemID = $i['item_id'];
					    			$itemName = $i['item_name'];
					    		?>
					    			<option value="<?php echo $itemID; ?>"><?php echo $itemName; ?></option>}
					    		<?php
					    			}//end foreach of category
					    		 ?>
					    	</select>
					    </div>
					  </div>

					  <div class="form-group">
					    <label class="control-label col-sm-3" for="a-req">Quantity:</label>
					    <div class="col-sm-9"> 
					      <input type="number" step="any"  class="form-control" id="a-req" placeholder="Enter Quantity">
					    </div>
					  </div>

					  <div class="form-group">
					    <label class="control-label col-sm-3" for="reqDate">Request Date:</label>
					    <div class="col-sm-9"> 
					      <input type="date" class="form-control" id="reqDate" >
					    </div>
					  </div>

					  <div class="form-group"> 
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" id="btn-req-submit" class="btn btn-primary">Add
					      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
					      </button>
					    </div>
					  </div>

					</form>
				<!-- /main form -->
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>