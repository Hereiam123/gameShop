<?php

	/*
	*	Get categories
	*/
	function get_categories_helper(){
		$CI = get_instance();
		$categories = $CI->Product_model->get_categories();
		return $categories;
	}

	/*
	*	Get most popular
	*/
	function get_popular_helper(){
		$CI = get_instance();
		$popular_products = $CI->Product_model->get_popular();
		return $popular_products;
	}

?>
