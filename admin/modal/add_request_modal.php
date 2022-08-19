<?php 
require_once('../class/Item.php'); 
require_once('../class/Employee.php'); 

$employees = $employee->get_employees();
$e = $employee->get_employees();
$categories = $item->item_categories();
$allItem = $item->get_all_items();
//$conditions = $item->item_conditions();
$offID = array();
$empID = array();
$itemID = array();
$omCur = array();
$ismdCur = array();
$itrmdCur = array();
$ippsdCur = array();
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
									$fN = $empployee['emp_fname'];
									$mN = $empployee['emp_mname'];
									$lN = $empployee['emp_lname'];
									$fullName = "$fN $mN $lN";
									$fullName = ucwords($fullName);
									$emp_id = $empployee['emp_id'];
									

									if($emp_id == 49){
										continue;
									}
									$offID[] = $empployee['off_id'];
									$empID[] = $emp_id;
								?>	
									<option value="<?php echo $emp_id; ?>"><?php echo $fullName;?></option>
								<?php
									}//end foreach
								 ?>					    		
					    	</select>
					    </div>
					  </div>

					  <div class="form-group">
					    <label class="control-label col-sm-3" for="iID-req">Particular:</label>
					    <div class="col-sm-9"> 
						    <input type="text"  class="form-control" id="iiID-req" onkeyup="myFunction(); stoppedTyping();" placeholder="Enter Item Name" onkeyup="myFunction(); stoppedTyping();" autocomplete="off">
					    	<input type="hidden" class="form-control" id="iID-req">
							<ul id="myUL" style="list-style-type: none;display: list-item;position: fixed;">
                                <?php 
					    			foreach ($allItem as $i) {
									$item_ID = $i['item_id'];
					    			$itemName = $i['item_name'];
									$itemID[] = $item_ID;
									$omCur[] = $i['om_amount'];
									$ismdCur[] = $i['ismd_amount'];
									$itrmdCur[] = $i['itrmd_amount'];
									$ippsdCur[] = $i['ippsd_amount'];
									?>
										<li><button class="req_Btn" id="<?php echo $item_ID;?>" value="<?php echo $itemName;?>"><?php echo $itemName;?></button></li>
										
									<?php
									}
					    		?>
							</ul>
					    </div>
					  </div>
					  <?php 
					  $getEmp = "<script>document.writeln(document.getElementById('empID-req').value);</script>";
					  $getItem = "<script>document.writeln(document.getElementByClassName('req_Btn').value);</script>";
					  
					  ?>
					  <input type="hidden" class="form-control" id="off_id" value="<?php echo $off_id; ?>">
					  <div class="form-group">
					    <label class="control-label col-sm-3" for="a-req">Quantity:</label>
					    <div class="col-sm-9"> 
						    
					        <input type="number" step="any"  class="form-control" id="a-req" oninput="validateNumber(); getCurrentAmount();" placeholder="Enter Quantity">
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
<script>
	                    var curAmount = 0;
						var office = 0;
						document.getElementById("myUL").style.display = "none";
						function myFunction() {
                            var input, filter, ul, li, button, i, txtValue;
    						input = document.getElementById("iiID-req");
    						filter = input.value.toUpperCase();
    						ul = document.getElementById("myUL");
    						li = ul.getElementsByTagName("li");
    						for (i = 0; i < li.length; i++) {
     						    button = li[i].getElementsByTagName("button")[0];
    						    txtValue = button.textContent || button.innerText;
    						    if (txtValue.toUpperCase().indexOf(filter) > -1) {
            						li[i].style.display = "";
        						}else {
            						li[i].style.display = "none";
        						}
    						}
						}
					
						function getOffID(){
							var eID = <?= json_encode($empID) ?>;
							var oID = <?= json_encode($offID) ?>;
							var num = 0;
							for(var i = 0; i < eID.length;i++){
								if(document.getElementById('empID-req').value == eID[i]){
									// alert(eID[i]);
									break;
								}
								num++;
							}
							// alert(oID[num]);
							office = oID[num];
							//alert(office);
						}
						function getCurrentAmount(){
							var iID = <?= json_encode($itemID) ?>;
							var om = <?= json_encode($omCur) ?>;
							var ismd = <?= json_encode($ismdCur) ?>;
							var itrmd = <?= json_encode($itrmdCur) ?>;
							var ippsd = <?= json_encode($ippsdCur) ?>;
							var num = 0;
							//alert(document.getElementById('iID-req').value);
							for(var i = 0; i < iID.length;i++){
								if(document.getElementById('iID-req').value == iID[i]){
									//alert(iID[i]);
									break;
								}
								num++;
							}
							switch(office){
								/* OM Current Quantity */
								case 10:
									curAmount = om[num];
									break;
									/* ISMD Current Quantity */
									case 11:
										curAmount = ismd[num];
										break;
										/* ITRMD Current Quantity */
										case 12:
											curAmount = itrmd[num];
											break;
											/* ITRMD Current Quantity */
											case 13:
												curAmount = ippsd[num];
												break;
												/* No office */
												default:
													curAmount = 0;
													break;
							}
							//alert(curAmount);
							// alert(om[num]);
							// alert(ismd[num]);
							// alert(itrmd[num]);
							// alert(ippsd[num]);
						}
						function stoppedTyping(){
                        var input = document.getElementById("iiID-req").value;
                            if(input.length > 0) { 
                                document.getElementById("myUL").style.display = "block"; 
						    } else { 
                                document.getElementById("myUL").style.display = "none";
                            }
                        }
						// function getOffID(){
						// 	document.cookie = "offId="+document.getElementById('empID-req').value;
						// }
						function validateNumber(){
							var i_amount = document.getElementById('a-req').value;
							
							// alert(document.getElementById('empID-req').value);
							//  alert(document.getElementById('iID-req').value);
							if(i_amount!=0){
								
								if(i_amount>curAmount){
							    	document.getElementById("a-req").value = "";
									if(curAmount == 0){
										alert("Current item is not available");
										document.getElementById("a-req").value = "";
										document.getElementById("iiID-req").value = "";
										document.getElementById("iID-req").value = "";

								    }else{
										alert("Current amount of item is "+curAmount);
									}
							    }
							}
							if(i_amount<=0){
								alert("Zero is not valid quantity");
								document.getElementById("a-req").value = "";
							}
						}
						$("#myUL .req_Btn").click(function(event) {
                            var fired_button = $(this).val();
							$("#iID-req").val(event.target.id);
							$("#iiID-req").val(fired_button);
							getOffID();
							document.getElementById("myUL").style.display = "none";
                        });
					  </script>