<?php

	/*
	*	Get categories
	*/
	function get_categories_helper(){
		$CI = get_instance();
		$categories = $CI->Product_model->get_categories();
		return $categories;
	}

?>
