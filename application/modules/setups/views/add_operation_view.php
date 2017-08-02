<div class="col-md-6">
	<div class="box box-info">
		<div class="box-header with-border">
        	<h3 class="box-title"><?php echo $module_title1; ?> <span style="font-size: 16px">(* are mandatory fields)</span></h3>
        </div>

        <?php $this->load->view('template/flash_msg'); ?>

		<form class="form-horizontal" method="POST" action="<?php echo base_url('operation/add_department'); ?>">
	      	<div class="box-body">

	        	<div class="row">
			       	<div class="col-md-12">
			       		<div class="form-group">
			          		<label for="department" class="col-sm-5 control-label">Department Name*</label>
			          		
				          	<div class="col-sm-7 department_input_fields_wrap">
				          		<div style="margin-bottom: 5px;">
					          		<input type="text" class="form-control" name="department[]" id="department" placeholder="Department">
					          	</div>
					        </div>


					        <div class="col-md-5">&nbsp;</div>

					        <div class="col-md-7">
					        	<div class="btn btn-info add_department_field pointer full-width-button">
				                    Add more field
				                </div>
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

<div class="col-md-12">
	<div class="box box-info">
		<div class="box-header with-border">
        	<h3 class="box-title"><?php echo $module_title2; ?> <span style="font-size: 16px">(* are mandatory fields)</span></h3>
        </div>

        <?php if(!empty($this->session->userdata('job_title_added'))) { ?>
            <div class="row" style="padding: 10px;">
                <div class="col-md-12">
                    <div class="bg-green disabled color-palette alert"><?php echo $this->session->userdata('job_title_added'); ?></div>
                    <?php
                        $this->session->unset_userdata('job_title_added');
                    ?>
                </div>
            </div>
        <?php } ?>

		<form class="form-horizontal" method="POST" action="<?php echo base_url('operation/add_job_title'); ?>">
	      	<div class="box-body">

	        	<div class="row">
		        	<div class="col-md-6">
		        		<div class="col-md-12">
			        		<div class="form-group">
			                  <label class="control-label col-sm-3">Department*</label>
			                    <div class="col-sm-9">
				                    <select class="form-control" name="department_id" required>
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

			       	<div class="col-md-6">
			       		<div class="form-group">
			          		<label for="job_title" class="col-sm-4 control-label">Job Title*</label>
			          		
				          	<div class="col-sm-8 job_title_input_fields_wrap">
				          		<div style="margin-bottom: 5px;">
					          		<input type="text" class="form-control" name="job_title[]" id="job_title" placeholder="Job Title" required>
					          	</div>
					        </div>

					        <div class="col-md-4">&nbsp;</div>

					        <div class="col-md-8">
					        	<div class="btn btn-info add_job_title_field pointer full-width-button">
				                    Add more field
				                </div>
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

<!-- jQuery 2.2.0 -->
<script src="<?php echo base_url(); ?>/assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>

<script>
    /************************** Script to add new textboxes for job title start *************************/
    $(document).ready(function() {
	    var max_fields = 30; //maximum input boxes allowed
	    var wrapper = $(".job_title_input_fields_wrap"); //Fields wrapper
	    var add_button = $(".add_job_title_field"); //Add button ID
	    
	    var x = 1; //initlal text box count
	    $(add_button).click(function(e){ //on add input button click
	        e.preventDefault();
	        if(x < max_fields){ //max input box allowed
	            x++; //text box increment
	            $(wrapper).append('<div class="input-group" style="margin-bottom: 5px;"> <input type="text" class="form-control" name="job_title[]" id="job_title" placeholder="Job Title"> <div class="input-group-addon pointer remove_field" style="color:red;"> <i class="glyphicon glyphicon-remove"></i> </div> </div>'); //add input box
	        }
	    });
	    
	    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
	        e.preventDefault();
	        $(this).parent('div').remove();
	        x--;
	    })
	});/* Script to add new textboxes for job title end*/	

	/*************************** Script to add new textboxes for department start ************************/
    $(document).ready(function() {
	    var max_fields = 30; //maximum input boxes allowed
	    var wrapper = $(".department_input_fields_wrap"); //Fields wrapper
	    var add_button = $(".add_department_field"); //Add button ID
	    
	    var x = 1; //initlal text box count
	    $(add_button).click(function(e){ //on add input button click
	        e.preventDefault();
	        if(x < max_fields){ //max input box allowed
	            x++; //text box increment
	            $(wrapper).append('<div class="input-group" style="margin-bottom: 5px;"> <input type="text" class="form-control" name="department[]" id="job_title" placeholder="Job Title"> <div class="input-group-addon pointer remove_field" style="color:red;"> <i class="glyphicon glyphicon-remove"></i> </div> </div>'); //add input box
	        }
	    });
	    
	    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
	        e.preventDefault();
	        $(this).parent('div').remove();
	        x--;
	    })
	});/* Script to add new textboxes for department end*/

</script>