var base_url = $(document.body).data('base');

(function ($) {
    "use strict";
    var mainApp = {

        main_fun: function () {
           
            /*====================================
              LOAD APPROPRIATE MENU BAR
           ======================================*/
            $(window).bind("load resize", function () {
                if ($(this).width() < 768) {
                    $('div.sidebar-collapse').addClass('collapse')
                } else {
                    $('div.sidebar-collapse').removeClass('collapse')
                }
            });          
     
        },

        initialization: function () {
            mainApp.main_fun();
        }

    }
    // Initializing ///

    $(document).ready(function () {
        mainApp.main_fun();
    });

}(jQuery));

$(".job_title").select2();
$(".select_job_title_to_assign_privilege").select2();

/************************* Date picker with month and year only ************************************/
$('#startDatePicker').datepicker({
    format: "mm-yyyy",
    startView: "months", 
    minViewMode: "months",
    autoclose: true
});

/************************* Date picker with month and year only ************************************/
$('#endDatePicker').datepicker({
    format: "mm-yyyy",
    startView: "months", 
    minViewMode: "months",
    autoclose: true
});

$('.select_job_title_to_assign_privilege').change(function() {
    var job_title_id = $(this).val();

    $.ajax({
        url: base_url + 'setups/fetch_privileges',
        type: 'POST',
        dataType: 'json',
        data: {'job_title_id': job_title_id},
        success: function(data) {
            //
        },
        error: function() {
            //
        }
    });
});

/* Script for iCheck checkbox */
$(document).ready(function(){
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });
});

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
            $(wrapper).append('<div class="input-group" style="margin-bottom: 5px;"> <input type="text" class="form-control" name="job_titles[]" id="job_title" placeholder="Enter job title" required> <div class="input-group-addon pointer remove_field" style="color:red;"> <i class="glyphicon glyphicon-remove"></i> </div> </div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })
});/* Script to add new textboxes for job title end */

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
            $(wrapper).append('<div class="input-group" style="margin-bottom: 5px;"> <input type="text" class="form-control" name="departments[]" id="department" placeholder="Enter department" required> <div class="input-group-addon pointer remove_field" style="color:red;"> <i class="glyphicon glyphicon-remove"></i> </div> </div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })
});/* Script to add new textboxes for department end*/

$(document).ready(function() {
    $(".department_id").change(function() {
        //$(".add_job_title").show();

        var id = $(this).val();
        var selector = $(this).parents('.col-md-6').siblings('.col-sm-6').find('.job_title');

        $.ajax({
            url: base_url + 'project/load_job_title_where/' + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('.job_title').html("");
                // Use jQuery's each() to iterate over the opts value
                $.each(data, function(index, value) {                       
                    selector.prepend('<option value="' + value.dep_id + '">' + value.job_title + '</option>');
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert(textStatus);
            }
        });
    });
});