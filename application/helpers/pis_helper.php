<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	if(!function_exists('only_printr')) {
		function only_printr($data) {
			echo '<pre>';
			print_r($data);
			echo '</pre>';
		}
	}