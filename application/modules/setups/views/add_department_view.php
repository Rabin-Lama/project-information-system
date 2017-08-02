<!-- <div class="col-md-12"> -->
	<div class="box box-info">
		<div class="box-header with-border">
        	<h3 class="box-title"><?php echo $sub_title; ?> <span style="font-size: 16px">(* are mandatory fields)</span></h3>
        </div>

        <?php $this->load->view('template/flash_msg'); ?>

		<form class="form-horizontal" method="POST" action="<?php echo base_url('setups/insert_department'); ?>">
	      	<div class="box-body">

	        	<div class="row">
			       	<div class="col-md-8">
			       		<div class="form-group">
			          		<label for="department" class="col-sm-3 control-label">Department Name*</label>
			          		
				          	<div class="col-sm-9 department_input_fields_wrap">
				          		<div style="margin-bottom: 5px;">
					          		<input type="text" class="form-control" name="departments[]" id="department" placeholder="Enter department" required>
					          	</div>
					        </div>


					        <div class="col-md-3">&nbsp;</div>

					        <div class="col-md-9">
					        	<div class="btn btn-info add_department_field pointer full-width-button">
				                    Add more field
				                </div>
				            </div>
			        	</div>
			       	</div>

			       	<div class="col-md-4">
			       		&nbsp;
			       	</div>
			    </div>
	      	</div>
	      <!-- /.box-body -->
	      	<div class="box-footer">
		      	<div class="col-md-8">
		        	<button type="submit" class="btn btn-info pull-right submit-button">Create</button>
		        	<button type="reset" class="btn btn-default pull-right">Clear All</button>
		        </div>

		        <div class="col-md-4">
		        	&nbsp;
		        </div>
	      	</div>
	      	<!-- /.box-footer -->
	    </form>
	</div>
<!-- </div> -->

<script>

	// /*************************** Script to add new textboxes for department start ************************/
 //    $(document).ready(function() {
	//     var max_fields = 30; //maximum input boxes allowed
	//     var wrapper = $(".department_input_fields_wrap"); //Fields wrapper
	//     var add_button = $(".add_department_field"); //Add button ID
	    
	//     var x = 1; //initlal text box count
	//     $(add_button).click(function(e){ //on add input button click
	//         e.preventDefault();
	//         if(x < max_fields){ //max input box allowed
	//             x++; //text box increment
	//             $(wrapper).append('<div class="input-group" style="margin-bottom: 5px;"> <input type="text" class="form-control" name="departments[]" id="department" placeholder="Enter department" required> <div class="input-group-addon pointer remove_field" style="color:red;"> <i class="glyphicon glyphicon-remove"></i> </div> </div>'); //add input box
	//         }
	//     });
	    
	//     $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
	//         e.preventDefault();
	//         $(this).parent('div').remove();
	//         x--;
	//     })
	// });/* Script to add new textboxes for department end*/

</script>