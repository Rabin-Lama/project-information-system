<!-- daterange picker -->
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/daterangepicker/daterangepicker-bs3.css">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/datepicker/datepicker3.css">

<div class="col-md-12">
	<div class="box box-info">
		<div class="box-header with-border">
        	<h3 class="box-title"><?php echo $project['project_name']; ?></h3>
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
			          		<label for="project_name" class="col-sm-4 control-label">Project Name</label>
				          	<div class="col-sm-8">
			            		<input type="text" class="form-control" name="project_name" id="project_name" placeholder="Project Name">
				          	</div>
			        	</div>
			       	</div>

			       	<div class="col-md-6">
			       		<div class="form-group">
			          		<label for="project_budget" class="col-sm-5 control-label">Project Budget (Optional)</label>
				          	<div class="col-sm-7">
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
				            <label class="col-sm-4 control-label">Start Date (optional)</label>

				            <div class="col-sm-8">
				                <div class="input-group date">
				                  	<div class="input-group-addon">
				                    	<i class="fa fa-calendar"></i>
				                  	</div>
				                  	<input type="text" class="form-control pull-right" name="start_date" id="startDatePicker">
				                </div>
				            </div>
				        </div>
				    </div>

				    <div class="col-md-6">
				        <div class="form-group">
				        	<label class="col-sm-4 control-label">End Date (Optional)</label>

				            <div class="col-sm-8">
				                <div class="input-group date">
				                  	<div class="input-group-addon">
				                    	<i class="fa fa-calendar"></i>
				                  	</div>
				                  	<input type="text" class="form-control pull-right" name="end_date" id="endDatePicker">
				                </div>
				            </div>
				        </div>
				    </div>
			    </div>
	      	</div>
	      <!-- /.box-body -->
	      	<div class="box-footer">
	        	<button type="submit" class="btn btn-info pull-right submit-button">Create</button>
	        	<button type="submit" class="btn btn-default pull-right">Cancel</button>
	      	</div>
	      	<!-- /.box-footer -->
	    </form>
	</div>
</div>

<!-- jQuery 2.2.0 -->
<script src="<?php echo base_url(); ?>/assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url(); ?>/assets/js/moment.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>/assets/plugins/datepicker/bootstrap-datepicker.js"></script>

<script>

    $('#startDatePicker').datepicker({
    	format: "mm-yyyy",
    	startView: "months", 
    	minViewMode: "months",
      	autoclose: true
    });

    $('#endDatePicker').datepicker({
    	format: "mm-yyyy",
    	startView: "months", 
    	minViewMode: "months",
      	autoclose: true
    });
</script>