<!-- daterange picker -->
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/daterangepicker/daterangepicker-bs3.css">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/datepicker/datepicker3.css">

<div class="col-md-12">
	<div class="box box-info">
		<div class="box-header with-border">
        	<h3 class="box-title"><?php echo $project['project_name']; ?></h3>
        </div>

		<div class="row">
	        <div class="col-md-12">
	          	<!-- Custom Tabs -->
	          	<div class="nav-tabs-custom">
	            	<ul class="nav nav-tabs">
	              		<li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
	              		<li><a href="#activities" data-toggle="tab">Activities</a></li>
	              		<li><a href="#issues" data-toggle="tab">Issues</a></li>
	              		<li><a href="#new_issue" data-toggle="tab">New Issue</a></li>
	            	</ul>
	            	<?php if(!empty($this->session->userdata('issue_create_success_msg'))) { ?>
			            <div class="row" style="padding: 10px;">
			                <div class="col-md-12">
			                    <div class="bg-green disabled color-palette alert"><?php echo $this->session->userdata('issue_create_success_msg'); ?></div>
			                    <?php
			                        $this->session->unset_userdata('issue_create_success_msg');
			                    ?>
			                </div>
			            </div>
			        <?php } ?>
	            	<div class="tab-content">
	              		<div class="tab-pane active" id="overview">
		                	<div class="row">
	        					<div class="col-md-6">
				          			<div class="box box-default">
				            			<div class="box-header with-border">
					              			<i class="fa fa-thumb-tack"></i>

					              			<h3 class="box-title">Track Issues</h3>
				            			</div>
							            <!-- /.box-header -->
							            <div class="box-body">
							              	<div class="callout bg-light-blue">
							                	<h4><a href="">Open Issues</a> : 24/60</h4>

							                	<h4><a href="">Closed Issues</a> : 36/60</h4>

							                	<h4><a href="">View all issues</a></h4>
							              	</div>
				            			</div>
				            			<!-- /.box-body -->
				          			</div>
				          			<!-- /.box -->
				        		</div>
				        		<!-- /.col -->

						        <div class="col-md-6">
							        <div class="box box-default">
							            <div class="box-header with-border">
							              	<i class="fa fa-users"></i>

							              	<h3 class="box-title">Members</h3>
							            </div>
							            <!-- /.box-header -->
							            <div class="box-body">
							              	<div class="callout bg-light-blue">
							                	<p>Manager : <a href="">Rabin Lama</a></p>
							                	<p>Back end : <a href="">Rabin Lama</a>, <a href="">Rabin Lama</a></p>
							                	<p>Front end : <a href="">Rabin Lama</a>, <a href="">Rabin Lama</a></p>
							              	</div>
							            </div>
						            	<!-- /.box-body -->
						          	</div>
						          	<!-- /.box -->
						        </div>
				        		<!-- /.col -->
				      		</div>
	              		</div>
	              		<!-- /.tab-pane -->
		              	<div class="tab-pane" id="activities">
			                The European languages are members of the same family. Their separate existence is a myth.
			                For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
			                in their grammar, their pronunciation and their most common words. Everyone realizes why a
			                new common language would be desirable: one could refuse to pay expensive translators. To
			                achieve this, it would be necessary to have uniform grammar, pronunciation and more common
			                words. If several languages coalesce, the grammar of the resulting language is more simple
			                and regular than that of the individual languages.
		              	</div>
		              	<!-- /.tab-pane -->
		              	<div class="tab-pane" id="issues">
			                The European languages are members of the same family. Their separate existence is a myth.
			                For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
			                in their grammar, their pronunciation and their most common words. Everyone realizes why a
			                new common language would be desirable: one could refuse to pay expensive translators. To
			                achieve this, it would be necessary to have uniform grammar, pronunciation and more common
			                words. If several languages coalesce, the grammar of the resulting language is more simple
			                and regular than that of the individual languages.
		              	</div>
		              	<!-- /.tab-pane -->
		              	<div class="tab-pane" id="new_issue">
			                <form class="form-horizontal" method="POST" action="<?php echo base_url('project/add_new_issue'); ?>">
			                	<div class="box-body">
			                		<div class="row">
			                			<div class="col-md-12">
								        	<div class="form-group">
								          		<label for="subject" class="col-md-2 control-label">Subject*</label>

									          	<div class="col-md-10">
								            		<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
									          	</div>
								        	</div>
								        </div>

								        <div class="col-md-12">
								        	<div class="form-group">
								        		<label for="description" class="col-md-2 control-label">Description*</label>

								        		<div class="col-md-10">
								          			<textarea id="description" class="ckeditor" name="description" rows="10" cols="80" required> </textarea>
									          	</div>
								        	</div>
								        </div>

								        <div class="col-md-12">
									        <div class="col-md-6">
									        	<div class="form-group">
									                <label class="control-label col-md-4">Status*</label>

									                <div class="col-md-8">
										                <select class="form-control" name="status" required>
										                	<option value="">--Select status--</option>
										                	<option value="new">New</option>
										                	<option value="waiting">Waiting</option>
										                	<option value="in progress">In Progress</option>
										                	<option value="ready for qa">Ready For QA</option>
										                	<option value="closed">Closed</option>
										                </select>
											        </div>
									            </div>
									        </div>

									        <div class="col-md-6">
									            <div class="form-group">
									                <label class="control-label col-md-4">Priority*</label>

									                <div class="col-md-8">
										                <select class="form-control" name="priority" required>
										                	<option value="">--Select priority--</option>
										                	<option value="low">Low</option>
										                	<option value="normal">Normal</option>
										                	<option value="high">High</option>
										                	<option value="immediate">Immediate</option>
										                </select>
											        </div>
									            </div>
									        </div>
								        </div>

								        <div class="col-md-12">
							        		<div class="col-md-6">
										        <div class="form-group">	
										            <label class="col-sm-4 control-label">Start Date*</label>

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
										        	<label class="col-sm-4 control-label">Due Date*</label>

										            <div class="col-sm-8">
										                <div class="input-group date">
										                  	<div class="input-group-addon">
										                    	<i class="fa fa-calendar"></i>
										                  	</div>
										                  	<input type="text" class="form-control pull-right" name="due_date" id="endDatePicker">
										                </div>
										            </div>
										        </div>
										    </div>
										</div>

								        <div class="col-md-12">
									        <div class="col-md-6">
									            <div class="form-group">
									                <label class="control-label col-md-4">Assignee*</label>

									                <div class="col-md-8">
										                <select class="form-control" name="assignee" required>
										                	<option value="">--Select assignee--</option>
										                	<option value="new">New</option>
										                </select>
											        </div>
									            </div>
									        </div>

									        <div class="col-md-6">
									            <div class="form-group">
									          		<label class="col-md-4 control-label">Estimated Time</label>
									          		
										          	<div class="col-md-8">
										          		<div class="input-group">
											          		<input type="number" class="form-control" name="estimated_time" placeholder="Estimated Time">
											            	<div class="input-group-addon">
										                    	hours
										                  	</div>
											          	</div>
											        </div>
									        	</div>
									        </div>
								        </div>

								        <div class="col-md-12">
								        	<input type="hidden" name="created_by" value="<?php echo $this->session->userdata('username'); ?>">
								        	<input type="hidden" name="project_id" value="<?php echo $this->uri->segment(3); ?>">
								        	<button type="submit" class="btn btn-info pull-right submit-button">Create</button>
	        								<button type="reset" class="btn btn-default pull-right">Clear</button>
	        							</div>
								       	</div>
			                		</div>
			                	</div>
			                </form>
		              	</div>
	              		<!-- /.tab-pane -->
	              	</div>
	            </div>
	            <!-- /.tab-content -->
	        </div>
	        <!-- /.col -->
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
<!-- CK Editor -->
<script src="<?php echo base_url(); ?>/assets/plugins/ckeditor/ckeditor.js"></script>

<script>
	/************************* Date picker with month and year only ************************************/
    $('#startDatePicker').datepicker({
    	format: "yyyy-mm-dd",
      	autoclose: true
    });

    /************************* Date picker with month and year only ************************************/
    $('#endDatePicker').datepicker({
    	format: "yyyy-mm-dd",
      	autoclose: true
    });
</script>