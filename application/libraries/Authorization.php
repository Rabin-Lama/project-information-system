<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authorization {
    
    function login($email, $password) {
        $CI =& get_instance(); //load model explicitly
        
        $CI->load->model('home_model');
        $password = $this->encrypt($password);
        $data = $CI->home_model->login($email, $password);
        return $data;
    }

    function encrypt($string) {
        $encryptedString = md5($string);
        return $encryptedString;
    }
    
}

?>