<?php

	class Products extends CI_Controller{

		public function index(){
            echo "I'm dead"; die();
			//Get all products
            $data['products']=$this->Product_model->get_products();
			$data['main_content']='products';
			$this->load->view('layouts/main',$data);
		}

		public function details($id){
			//Get specific product details
			$data['product']=$this->Product_model->get_product_details($id);
			$data['main_content']='details';
			$this->load->view('layouts/main',$data);
		}

		public function category($category_id){
			//Get products by category
			$data['products']=$this->Product_model->get_by_category($category_id);
			$data['main_content']='products';
			$this->load->view('layouts/main',$data);
		}
	}

?>
