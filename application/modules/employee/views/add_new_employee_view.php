<!-- daterange picker -->
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/daterangepicker/daterangepicker-bs3.css">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/datepicker/datepicker3.css">

<div class="row">
<div class="col-md-12">
	<div class="col-md-6">
		<div class="box box-info">
			<div class="box-header with-border">
	        	<h3 class="box-title">Personal Information</h3>
	        </div>

	        <?php if(!empty($this->session->userdata('employee_add_success_msg'))) { ?>
	            <div class="row" style="padding: 10px;">
	                <div class="col-md-12">
	                    <div class="bg-green disabled color-palette alert"><?php echo $this->session->userdata('employee_add_success_msg'); ?></div>
	                    <?php
	                        $this->session->unset_userdata('employee_add_success_msg');
	                    ?>
	                </div>
	            </div>
	        <?php } ?>

			<form class="form-horizontal" method="POST" action="<?php echo base_url('employee/add_employee_info'); ?>">
		      	<div class="box-body">
			      	<div class="row">
			      		<div class="col-md-12">
				        	<div class="form-group">
				          		<label for="full_name" class="col-sm-3 control-label">Full Name</label>

					          	<div class="col-sm-9">
				            		<input type="text" class="form-control" name="full_name" id="full_name" placeholder="Full Name">
					          	</div>
				        	</div>

				        	<div class="form-group">
					            <label for="dob" class="col-sm-3 control-label">DOB</label>

					            <div class="col-sm-9">
					                <div class="input-group date">
					                  	<div class="input-group-addon">
					                    	<i class="fa fa-calendar"></i>
					                  	</div>
					                  	<input type="text" class="form-control pull-right" name="dob" id="dob">
					                </div>
					            </div>
					        </div>

					        <div class="form-group">
			                  	<label for="gender" class="col-sm-3 control-label">Gender</label>

			                  	<div class="col-sm-9">
				                  	<select class="form-control" name="gender" id="gender">
				                    	<option value="male">Male</option>
				                    	<option value="female">Female</option>
				                    	<option value="other">Other</option>
				                  	</select>
				                 </div>
			                </div>

					        <div class="form-group">
			                  	<label for="marital_status" class="col-sm-3 control-label">Marital Status</label>

			                  	<div class="col-sm-9">
				                  	<select class="form-control" name="marital_status" id="marital_status">
				                    	<option value="married">Married</option>
				                    	<option value="widowed">Widowed</option>
				                    	<option value="separated">Separated</option>
				                    	<option value="divorced">Divorced</option>
				                    	<option value="single">Single</option>
				                  	</select>
				                </div>
			                </div>
				       	</div>
			       	</div>
			    </div>
		      <!-- /.box-body -->
		    </form>
		</div>
	</div>

	<div class="col-md-6">
		<div class="box box-warning">
			<div class="box-header with-border">
	        	<h3 class="box-title">Contact Information</h3>
	        </div>

			<form class="form-horizontal" method="POST" action="<?php echo base_url('employee/add_employee_info'); ?>">
		      	<div class="box-body">
			      	<div class="row">
			      		<div class="col-md-12">
				        	<div class="form-group">
				          		<label for="current_city" class="col-sm-4 control-label">Current City</label>

					          	<div class="col-sm-8">
				            		<input type="text" class="form-control" name="current_city" id="current_city" placeholder="Current City">
					          	</div>
				        	</div>

				        	<div class="form-group">
				          		<label for="phone" class="col-sm-4 control-label">Phone</label>

					          	<div class="col-sm-8">
				            		<input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
					          	</div>
				        	</div>

				        	<div class="form-group">
				          		<label for="email" class="col-sm-4 control-label">Email</label>

					          	<div class="col-sm-8">
				            		<input type="text" class="form-control" name="email" id="email" placeholder="email">
					          	</div>
				        	</div>
				       	</div>
			       	</div>
			    </div>
		      <!-- /.box-body -->
		    </form>
		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="col-md-6">
		<div class="box box-success">
			<div class="box-header with-border">
	        	<h3 class="box-title">Work Information</h3>
	        </div>

			<form class="form-horizontal" method="POST" action="<?php echo base_url('employee/add_employee_info'); ?>">
		      	<div class="box-body">
			      	<div class="row">
			      		<div class="col-md-12">
				        	<div class="form-group">
				          		<label for="job_title" class="col-sm-4 control-label">Job Title</label>

					          	<div class="col-sm-8">
				            		<input type="text" class="form-control" name="job_title" id="job_title" placeholder="Job Title">
					          	</div>
				        	</div>

				        	<div class="form-group">
				          		<label for="department" class="col-sm-4 control-label">Department</label>

					          	<div class="col-sm-8">
				            		<input type="text" class="form-control" name="department" id="department" placeholder="Department">
					          	</div>
				        	</div>

				        	<div class="form-group">
					            <label for="joined_date" class="col-sm-4 control-label">Joined Date</label>

					            <div class="col-sm-8">
					                <div class="input-group date">
					                  	<div class="input-group-addon">
					                    	<i class="fa fa-calendar"></i>
					                  	</div>
					                  	<input type="text" class="form-control pull-right" name="joined_date" id="joined_date">
					                </div>
					            </div>
					        </div>

				        	<div class="form-group">
				          		<label for="employment_status" class="col-sm-4 control-label">Employment Status</label>

					          	<div class="col-sm-8">
					          		<select class="form-control" name="employment_status" id="employment_status">
					          			<option value="full time permanent">Full Time Permanent</option>
					          			<option value="part time permanent">Part Time Permanent</option>
					          			<option value="full time contract">Full Time Contract</option>
					          			<option value="part time contract">Part Time Contract</option>
					          			<option value="internship">Internship</option>
					          		</select>
					          	</div>
				        	</div>

				        	<div class="form-group">
				          		<label for="salary" class="col-sm-4 control-label">Salary</label>

					          	<div class="col-sm-8">
					          		<div class="input-group">
						          		<input type="number" class="form-control" name="salary" id="salary" placeholder="Salary">
						            	<div class="input-group-addon">
					                    	NRS
					                  	</div>
						          	</div>
						        </div>
				        	</div>
				       	</div>

				       	<!-- <div class="col-md-6">
				       		&nbsp;
				       	</div> -->
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
</div>


<!-- jQuery 2.2.0 -->
<script src="<?php echo base_url(); ?>/assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url(); ?>/assets/js/moment.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>/assets/plugins/datepicker/bootstrap-datepicker.js"></script>

<script>

    $('#joinedDate').datepicker({
      	autoclose: true
    });

    $('#dob').datepicker({
      	autoclose: true
    });
</script>