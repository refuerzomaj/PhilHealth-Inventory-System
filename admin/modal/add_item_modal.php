<?php 
require_once('../class/Item.php'); 
require_once('../class/Employee.php'); 

$employees = $employee->get_employees();
$categories = $item->item_categories();
//$conditions = $item->item_conditions();

?>
<div class="modal fade" id="modal-add-item">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Add Item</h4>
			</div>
			<div class="modal-body">
				<!-- main form -->
					<form class="form-horizontal" role="form" id="add-item-form">
					<div class="form-group">
					    <label class="control-label col-sm-3" for="catID">Category:</label>
					    <div class="col-sm-3">
					    	<select name="" class="btn btn-default" id="catID">
								<option value="">Choose</option>
					    		<?php 
					    			foreach ($categories as $category) {
					    				# code...
					    			$catID = $category['cat_id'];
					    			$catDesc = ucwords($category['cat_desc']);
					    		?>
					    			<option value="<?php echo $catID; ?>"><?php echo $catDesc; ?></option>}
					    		<?php
					    			}//end foreach of category
					    		 ?>
					    	</select>
					    </div>
					  </div>

					  <div class="form-group">
					    <label class="control-label col-sm-3" for="itemname">Particular:</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" id="itemname" placeholder="Enter Item Name" autofocus>
					    </div>
					  </div>

					  <!--<div class="form-group" id="sr">
					    <label class="control-label col-sm-3" for="serialNumber">Serial No.:</label>
					    <div class="col-sm-9"> 
					      <input type="text" class="form-control" id="serialNumber" placeholder="Enter Serial No">
					    </div>
					  </div>

					   <div class="form-group" id="mn">
					    <label class="control-label col-sm-3" for="modelNumber">Model No.:</label>
					    <div class="col-sm-9"> 
					      <input type="text" class="form-control" id="modelNumber" placeholder="Enter Model No">
					    </div>
					  </div>
					
					  <div class="form-group" id="b">
					    <label class="control-label col-sm-3" for="brand">Brand:</label>
					    <div class="col-sm-9"> 
					      <input type="text" class="form-control" id="brand" placeholder="Enter Brand">
					    </div>
					  </div>-->

					  <div class="form-group">
					    <label class="control-label col-sm-3" for="om_amount">OM Quantity:</label>
					    <div class="col-sm-9"> 
					      <input type="number" step="any"  class="form-control" id="om_amount" placeholder="Enter OM Quantity">
					    </div>
					  </div>
					  
					  <div class="form-group">
					    <label class="control-label col-sm-3" for="ismd_amount">ISMD Quantity:</label>
					    <div class="col-sm-9"> 
					      <input type="number" step="any"  class="form-control" id="ismd_amount" placeholder="Enter OM Quantity">
					    </div>
					  </div>

					  <div class="form-group">
					    <label class="control-label col-sm-3" for="itrmdm_amount">ITRMD Quantity:</label>
					    <div class="col-sm-9"> 
					      <input type="number" step="any"  class="form-control" id="itrmd_amount" placeholder="Enter OM Quantity">
					    </div>
					  </div>

					  <div class="form-group">
					    <label class="control-label col-sm-3" for="ippsd_amount">IPPSD Quantity:</label>
					    <div class="col-sm-9"> 
					      <input type="number" step="any"  class="form-control" id="ippsd_amount" placeholder="Enter OM Quantity">
					    </div>
					  </div>

					   <div class="form-group">
					    <label class="control-label col-sm-3" for="purDate">Purchase Date:</label>
					    <div class="col-sm-9"> 
					      <input type="date" class="form-control" id="purDate" >
					    </div>
					  </div>	

					
				    <div class="form-group">
					    <label class="control-label col-sm-3" for="empID">Employee:</label>
					    <div class="col-sm-9"> 
					    	<select class="btn btn-default" id="empID">
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
								?>	
									<option value="<?php echo $emp_id; ?>"><?php echo $fullName; ?></option>}
								<?php
									}//end foreach
								 ?>					    		
					    	</select>
					    </div>
					  </div>	

					 <!-- old cat pos -->

					  <!--<div class="form-group">
					    <label class="control-label col-sm-3" for="conID">Condition:</label>
					    <div class="col-sm-3"> 
					    	<select name="" class="btn btn-default" id="conID" disabled>
					    		<option value="4">Working</option>}
					    	</select>
					    </div>
					  </div>-->

					  <div class="form-group"> 
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" id="btn-submit" value="add" class="btn btn-primary">Save
					      <span class="glyphicon glyphicon-saved" aria-hidden="true"></span>
					      </button>
					    </div>
					  </div>
					</form>
				<!-- /main form -->
			</div>
		</div>
	</div>
</div>
