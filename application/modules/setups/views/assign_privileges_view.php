<!-- <div class="col-md-12"> -->
	<div class="box box-info">
		<div class="box-header with-border">
        	<h3 class="box-title"><?php echo $sub_title; ?> <span style="font-size: 16px">(* are mandatory fields)</span></h3>
        </div>

        <?php $this->load->view('template/flash_msg'); ?>

      	<div class="box-body">
        	<div class="row">
		       	<div class="col-md-8">
			       	<form class="form-horizontal" action="#">
			       		<div class="form-group">
			          		<label for="department" class="col-sm-3 control-label">Select job title</label>
			          		
				          	<div class="col-sm-9">
				                <select class="form-control select_job_title_to_assign_privilege" style="width: 100%;">
				                  	<?php
				                  		foreach($job_titles as $data) {
				                  			echo '<option value="'.$data->id.'">'.$data->job_title.'</option>';
				                  		}
				                  	?>
				                </select>
					        </div>
			        	</div>
			        </form>
		       	</div>

		       	<div class="col-md-4">
		       		&nbsp;
		       	</div>
		    </div>
      	<!-- /.box-footer -->
	</div>


	<div class="box box-info">
        <form class="form-horizontal" method="POST" action="<?php echo base_url('setups/save_assigned_privileges'); ?>">
	      	<div class="box-body">
	        	<div class="row">
			    	<div class="col-md-12">
			    	<table class="table table-bordered privileges_table">
					    <thead>
					      	<tr>
					        	<th>Module</th>
					        	<th>Add</th>
					        	<th>View</th>
					        	<th>Edit</th>
					        	<th>Delete</th>
					      	</tr>
					    </thead>
					    <tbody>
					      	
					    </tbody>
					  </table>
			    	</div>
			    </div>
	      	</div>
	      <!-- /.box-body -->
	      	<div class="box-footer">
	        	<button type="submit" class="btn btn-info pull-right submit-button">Assign</button>
	        	<button type="reset" class="btn btn-default pull-right" onclick="window.location.reload();">Cancel</button>
	      	</div>
	      	<!-- /.box-footer -->
	    </form>
	</div>
<!-- </div> -->