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

		<form class="form-horizontal" method="POST" action="<?php echo base_url('project/add_item_info'); ?>">
	      	<div class="box-body">
		      	<div class="row">
		      		<div class="col-md-6">
			        	<div class="form-group">
				            <label class="col-sm-3 control-label">For the month</label>

				            <div class="col-sm-9">
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
			       		&nbsp;
			       	</div>
		       	</div>

		       	<hr>

		       	<div class="row item_input_wrap">
			       	<div class="row">
			       		<div class="col-md-9">
			       			<div class="col-md-3">
				       			<div class="form-group">
						          	<!-- <div class="col-sm-12"> -->
					            		<input type="text" class="form-control" name="item[]" id="item" placeholder="Item Name">
						          	<!-- </div> -->
					        	</div>
				       		</div>

				       		<div class="col-md-3">				          	
					          	<!-- <div class="col-sm-12"> -->
					          		<div class="input-group">
						          		<input type="number" class="form-control amount" name="inflow[]" id="inflow" placeholder="Income" onfocusout="show_difference1.call(this)">
						            	<div class="input-group-addon">
					                    	NRS
					                  	</div>
						          	</div>
						        <!-- </div> -->
				       		</div>

				       		<div class="col-md-3">
					          	<!-- <div class="col-sm-12"> -->
					          		<div class="input-group">
						          		<input type="number" class="form-control amount" name="outflow[]" id="outflow" placeholder="Expense" onfocusout="show_difference2.call(this)">
						            	<div class="input-group-addon">
					                    	NRS
					                  	</div>
						          	</div>
						        <!-- </div> -->
				       		</div>

				       		<div class="col-md-3">
					          	<!-- <div class="col-sm-12"> -->
					          		<div class="input-group">
						          		<input type="number" class="form-control" name="overhead[]" id="overhead" placeholder="Overhead">
						            	<div class="input-group-addon">
					                    	%
					                  	</div>
						          	</div>
						        <!-- </div> -->
				       		</div>
			       		</div>

			       		<div class="col-md-2">
			       			<div class="col-sm-12">
				          		<div class="input-group">
					          		<input type="number" class="form-control" value="" name="difference" id="difference" readonly>
					            	<div class="input-group-addon display_difference"> </div>
					          	</div>
					        </div>
			       		</div>

			       		<div class="col-md-1">
			       			<button class="btn btn-info add_item_field"><i class="glyphicon glyphicon-plus"></i></button>
			       		</div>
		       		</div>
		       	</div>
	      	</div>
	      <!-- /.box-body -->
	      	<div class="box-footer">
	        	<button type="submit" class="btn btn-info pull-right submit-button">Save</button>
	        	<button type="reset" class="btn btn-default pull-right">Cancel</button>
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

	/* Show gain or loss */
    function show_difference1() {
    	var inflow = $(this).val();
    	var overhead = $(this).parents('.col-md-4').siblings().find('input[type="number"]').val();
    	var display_difference = $(this).parents('.col-md-8').siblings('.col-md-3').find('.display_difference');
    	var difference = inflow - outflow;

    	if(inflow.length > 0 && outflow.length > 0 && inflow != 0 && outflow != 0) {
    		if(difference > 0) {
    			display_difference.removeClass('alert-danger').addClass('alert-success');
    			display_difference.html("Gain");
    			$(this).parents('.col-md-8').siblings('.col-md-3').find('#difference').val(difference);
    		} else if(difference == 0) {
    			display_difference.removeClass('alert-success');
    			display_difference.removeClass('alert-danger');
    			display_difference.addClass('alert-info');
    			display_difference.html("N/A");
    		} else {
    			display_difference.removeClass('alert-success').addClass('alert-danger');
    			display_difference.html("Loss");
    			$(this).parents('.col-md-8').siblings('.col-md-3').find('#difference').val(difference * -1);
    		}
    	}

    }

    function show_difference2() {
    	var inflow = $(this).parents('.col-md-4').siblings().find('input[type="number"]').val();
    	var outflow = $(this).val();
    	var display_difference = $(this).parents('.col-md-8').siblings('.col-md-3').find('.display_difference');
    	var difference = inflow - outflow;

    	if(inflow.length > 0 && outflow.length > 0 && inflow != 0 && outflow != 0) {
    		if(difference > 0) {
    			display_difference.removeClass('alert-danger').addClass('alert-success');
    			display_difference.html("Gain");
    			$(this).parents('.col-md-8').siblings('.col-md-3').find('#difference').val(difference);
    		} else if(difference == 0) {
    			display_difference.removeClass('alert-success');
    			display_difference.removeClass('alert-danger');
    			display_difference.addClass('alert-info');
    			display_difference.html("N/A");
    		} else {
    			display_difference.removeClass('alert-success').addClass('alert-danger');
    			display_difference.html("Loss");
    			$(this).parents('.col-md-8').siblings('.col-md-3').find('#difference').val(difference * -1);
    		}
    	}
    }

    $(document).ready(function() {
    	/* Adding new item field on click event start */
	    var max_fields = 500; //maximum input boxes allowed
	    var wrapper = $(".item_input_wrap"); //Fields wrapper
	    var add_button = $(".add_item_field"); //Add button ID
	    
	    var x = 1; //initlal text box count
	    $(add_button).click(function(e){ //on add input button click
	        e.preventDefault();
	        if(x < max_fields){ //max input box allowed
	            x++; //text box increment
	            $(wrapper).append('<div class="row additional-field"> <div class="col-md-8"> <div class="col-md-4"> <div class="form-group">  <div class="col-sm-12"> <input type="text" class="form-control" name="item[]" id="item" placeholder="Item Name"> </div> </div> </div> <div class="col-md-4"> <div class="col-sm-12"> <div class="input-group"> <input type="number" class="form-control" name="inflow[]" id="inflow" placeholder="Income" onfocusout="show_difference1.call(this)"> <div class="input-group-addon"> NRS </div> </div> </div> </div> <div class="col-md-4"> <div class="col-sm-12"> <div class="input-group"> <input type="number" class="form-control" name="outflow[]" id="outflow" placeholder="Expense" onfocusout="show_difference2.call(this)"> <div class="input-group-addon"> NRS </div> </div> </div> </div> </div> <div class="col-md-3"> <div class="col-sm-12"> <div class="input-group"> <input type="number" class="form-control" value="" name="difference" id="difference" readonly> <div class="input-group-addon display_difference"> </div> </div> </div> </div> <div class="col-md-1"> <button class="btn btn-default remove_field" style="color:red;"><i class="glyphicon glyphicon-remove"></i></button> </div> </div>'); //add input box
	        }
	    });
	    
	    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
	        e.preventDefault();
	        $(this).closest('.additional-field').remove();
	        x--;
	    });/* Adding new item field on click event start */
	});
</script>