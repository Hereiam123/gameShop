<?php

	class Products extends CI_Controller{

		public function index(){
			//Get all products
            $data['products'] = $this->Product_model->get_products();
			$data['main_content']='products';
			$this->load->view('layouts/main',$data);
		}
	}

	

?>
