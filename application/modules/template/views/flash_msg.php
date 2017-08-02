<?php
    if ($this->session->flashdata('success')) {
        echo '<div class="row" style="padding: 10px;"> <div class="col-md-12"> <div class="bg-green disabled color-palette alert">'.$this->session->flashdata('success').'</div> </div> </div>';
    } 
    if($this->session->flashdata('error')){
    	echo '<div class="row" style="padding: 10px;"> <div class="col-md-12"> <div class="alert alert-danger">'.$this->session->userdata('error').'</div> </div> </div>';
    }
?>