<!--  daterange picker
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/daterangepicker/daterangepicker-bs3.css">
bootstrap datepicker
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/datepicker/datepicker3.css">
Select2
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/select2.min.css">
Theme style
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css"> -->

<div class="col-md-12">
	<div class="box box-info">
		<div class="box-header with-border">
        	<h3 class="box-title"><?php echo $module_title; ?> <span style="font-size: 16px">(* are mandatory fields)</span></h3>
        </div>

        <?php if(!empty($this->session->userdata('project_add_success_msg'))) { ?>
            <div class="row" style="padding: 10px;">
                <div class="col-md-12">
                    <div class="bg-green disabled color-palette alert"><?php echo $this->session->userdata('project_add_success_msg'); ?></div>
                    <?php
                        $this->session->unset_userdata('project_add_success_msg');
                    ?>
                </div>
            </div>
        <?php } ?>

		<form class="form-horizontal" method="POST" action="<?php echo base_url('project/add_project_info'); ?>">
	      	<div class="box-body">
		      	<div class="row">
		      		<div class="col-md-6">
			        	<div class="form-group">
			          		<label for="project_name" class="col-sm-4 control-label">Project Name*</label>

				          	<div class="col-sm-8">
			            		<input type="text" class="form-control" name="project_name" id="project_name" placeholder="Project Name" required>
				          	</div>
			        	</div>
			       	</div>

			       	<div class="col-md-6">
			       		<div class="form-group">
			          		<label for="project_budget" class="col-sm-4 control-label">Project Budget</label>
			          		
				          	<div class="col-sm-8">
				          		<div class="input-group">
					          		<input type="number" class="form-control" name="project_budget" id="project_budget" placeholder="Project Budget">
					            	<div class="input-group-addon">
				                    	NRS
				                  	</div>
					          	</div>
					        </div>
			        	</div>
			       	</div>
		       	</div>

	        	<div class="row">
	        		<div class="col-md-6">
				        <div class="form-group">	
				            <label class="col-sm-4 control-label">Start Date*</label>

				            <div class="col-sm-8">
				                <div class="input-group date">
				                  	<div class="input-group-addon">
				                    	<i class="fa fa-calendar"></i>
				                  	</div>
				                  	<input type="text" class="form-control pull-right" name="start_date" id="startDatePicker" required>
				                </div>
				            </div>
				        </div>
				    </div>

				    <div class="col-md-6">
				        <div class="form-group">
				        	<label class="col-sm-4 control-label">End Date*</label>

				            <div class="col-sm-8">
				                <div class="input-group date">
				                  	<div class="input-group-addon">
				                    	<i class="fa fa-calendar"></i>
				                  	</div>
				                  	<input type="text" class="form-control pull-right" name="end_date" id="endDatePicker" required>
				                </div>
				            </div>
				        </div>
				    </div>
				</div>

				<div class="row add_row">
				    <div class="col-md-12">
					    <div class="col-md-6">
			        		<div class="form-group">
			                    <label class="control-label col-sm-4">Add Department*</label>

			                    <div class="col-sm-8 department_input_fields_wrap">
			                    	<div style="margin-bottom: 5px;">
					                    <select class="form-control department_id" name="department_id[]" required>
						                    <option value="">--Select department--</option>
						                    <?php
						                    	foreach($departments as $dep) {
							                    	echo '<option value="'.$dep->id.'">'.$dep->department.'</option>';
						                    	}
						                    ?>
					                    </select>
					                </div>
				                </div>
			                </div>
			            </div>

				       	<div class="col-sm-6 add_job_title">
				            <div class="form-group">
				                <label class="control-label col-sm-4">Add Job Title</label>

				                <div class="col-sm-8">
			                    	<div style="margin-bottom: 5px;">
						                <select class="form-control job_title" multiple="multiple" data-placeholder="Add job titles" name="job_title[]">

						                </select>
						            </div>
						        </div>
				            </div>
				       	</div>
			       	</div>
		       	</div>

		       	<div class="row">
			       	<div class="col-md-6">
			       		<div class="form-group">
			       			<div class="col-md-4">&nbsp;</div>

					        <div class="col-md-8">
					        	<div class="btn btn-info add_department_field pointer full-width-button">
				                    Add more field
				                </div>
				            </div>
			       		</div>
			       	</div>
		       	</div>

			    <div class="row">
		      		<div class="col-md-12">
			        	<div class="form-group">
			          		<label for="project_description" class="col-sm-2 control-label">Project Description</label>

				          	<div class="col-sm-10">
			            		<textarea rows="5" class="form-control" name="project_description" id="project_description" placeholder="Project Description"></textarea>
				          	</div>
			        	</div>
			       	</div>
		       	</div>
	      	</div>
	      <!-- /.box-body -->
	      	<div class="box-footer">
	        	<button type="submit" class="btn btn-info pull-right submit-button">Create</button>
	        	<button type="reset" class="btn btn-default pull-right">Clear</button>
	      	</div>
	      	<!-- /.box-footer -->
	    </form>
	</div>
</div>



<script>

	// $(".job_title").select2();

 //    /************************* Date picker with month and year only ************************************/
 //    $('#startDatePicker').datepicker({
 //    	format: "mm-yyyy",
 //    	startView: "months", 
 //    	minViewMode: "months",
 //      	autoclose: true
 //    });

 //    /************************* Date picker with month and year only ************************************/
 //    $('#endDatePicker').datepicker({
 //    	format: "mm-yyyy",
 //    	startView: "months", 
 //    	minViewMode: "months",
 //      	autoclose: true
 //    });

 //    /************************** Script to add new textboxes for job title, start *************************/
 //    $(document).ready(function() {
	//     var max_fields = 30; //maximum input boxes allowed
	//     var wrapper = $(".job_title_input_fields_wrap"); //Fields wrapper
	//     var add_button = $(".add_job_title_field"); //Add button ID
	    
	//     var x = 1; //initlal text box count
	//     $(add_button).click(function(e){ //on add input button click
	//         e.preventDefault();
	//         if(x < max_fields){ //max input box allowed
	//             x++; //text box increment
	//             $(wrapper).append('<div class="input-group" style="margin-bottom: 5px;"> <input type="text" class="form-control" name="job_title[]" id="job_title" placeholder="Job Title"> <div class="input-group-addon pointer remove_field" style="color:red;"> <i class="glyphicon glyphicon-remove"></i> </div> </div>'); //add input box
	//         }
	//     });
	    
	//     $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
	//         e.preventDefault();
	//         $(this).parent('div').remove();
	//         x--;
	//     })
	// });/* Script to add new textboxes for job title end */

	// $(document).ready(function() {
	// 	$(".department_id").change(function() {
	// 		//$(".add_job_title").show();

	// 		var id = $(this).val();
	// 		var selector = $(this).parents('.col-md-6').siblings('.col-sm-6').find('.job_title');

	// 		$.ajax({
	// 			url: "<?php echo base_url('project/load_job_title_where'); ?>/" + id,
	// 			type: "GET",
	// 			dataType: "JSON",
	// 			success: function(data) {
	// 				$('.job_title').html("");
	//                 // Use jQuery's each() to iterate over the opts value
	//                 $.each(data, function(index, value) {	                	
	//                     selector.prepend('<option value="' + value.dep_id + '">' + value.job_title + '</option>');
	//                 });
	// 			},
	// 			error: function(jqXHR, textStatus, errorThrown) {
	// 				alert(textStatus);
	// 			}
	// 		});
	// 	});
	// });

	// /*************************** Script to add new textboxes for department, start ************************/
 //    $(document).ready(function() {
	//     var max_fields = 30; //maximum input boxes allowed
	//     var wrapper = $(".add_row"); //Fields wrapper
	//     var add_button = $(".add_department_field"); //Add button ID
	    
	//     var x = 1; //initlal text box count
	//     $(add_button).click(function(e){ //on add input button click
	//         e.preventDefault();
	//         if(x < max_fields){ //max input box allowed
	//             x++; //text box increment
	//             $(wrapper).append('<div class="col-md-12"> <div class="col-md-6"> <div class="form-group"> <label class="control-label col-sm-4">Add Department*</label> <div class="col-sm-8 department_input_fields_wrap"> <div style="margin-bottom: 5px;"> <select class="form-control department_id" name="department_id[]" required> <option value="">--Select department--</option> <?php
	// 					                    	foreach($departments as $dep) {
	// 						                    	echo '<option value="'.$dep->id.'">'.$dep->department.'</option>';
	// 					                    	}
	// 					                    ?> </select> </div> </div> </div> </div> <div class="col-sm-6 add_job_title"> <div class="form-group"> <label class="control-label col-sm-4">Add Job Title</label> <div class="col-sm-8"> <div style="margin-bottom: 5px;"> <select class="form-control job_title" multiple="multiple" data-placeholder="Add job titles" name="job_title[]"> </select> </div> </div> </div> </div> </div>'); //add input box
	//         }
	//         $(".job_title").select2();
	//     });
	    
	//     $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
	//         e.preventDefault();
	//         $(this).parent('div').remove();
	//         x--;
	//     })
	// });/* Script to add new textboxes for department end*/



</script>