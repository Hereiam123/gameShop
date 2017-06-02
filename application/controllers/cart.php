<?php

	class Cart extends CI_Controller{

		public $paypal_data = '';
		public tax;
		public shipping;
		public total = 0;
		public grand_total;

		/*
		*	Cart index
		*/
		public function index(){
			//Get cart view
			$data['main_content']='cart';
			$this->load->view('layouts/main',$data);
		}
		
	}

?>
