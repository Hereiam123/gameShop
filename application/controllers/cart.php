<?php

	class Cart extends CI_Controller{

		public $paypal_data = '';
		public $tax;
		public $shipping;
		public $total = 0;
		public $grand_total;

		/*
		*	Cart index
		*/
		public function index(){
			//Get cart view
			$data['main_content']='cart';
			$this->load->view('layouts/main',$data);
		}

		/*
		*	Add to cart
		*/
		public function add(){
			//item data
			$data = array(
				'id' => $this->input->post('item_number'),
				'qty' => $this->input->post('qty'),
				'price' => $this->input->post('price'),
				'name' => $this->input->post('title')
			);

			//Insert into cart
			$this->cart->insert($data);

			redirect('products');
		}

		/*
		*	Update Cart
		*/
		public function update($in_cart=null){
			$data = $_POST;
			$this->cart->update($data);

			//Show cart page
			redirect('products','refresh');
		}

		/*
		*	Process Cart Order
		*/
		public function process(){
			if($_POST){
				foreach($this->input->post('item_name') as $key=>$value){
					$item_id=$this->input->post('item_code')[$key];
					$product=$this->Product_model->get_product_details($item_id);

					//Assign data to Paypal
					$this->paypal_data .= '&L_PAYMENTREQUEST_0_NAME'.$key.'='.urlencode($product->title);
					$this->paypal_data .= '&L_PAYMENTREQUEST_0_NUMBER'.$key.'='.urlencode($item_id);
					$this->paypal_data .= '&L_PAYMENTREQUEST_0_AMT'.$key.'='.urlencode($product->price);
					$this->paypal_data .= '&L_PAYMENTREQUEST_0_QTY'.$key.'='. urlencode($this->input->post('item_qty')[$key]);

					//Price x Quantity
					$subtotal = ($product->price * $this->input->post('item_qty')[$key]);
					$this->total = $this->total + $subtotal;

					$paypal_product['items'][]=array(
						'itm_name'=>$product->title,
						'itm_price'=>$product->price,
						'itm_code'=>$item_id,
						'itm_qty'=>$this->input->post('item_qty')[$key]
					);

					//Array for order to be inserted
					$order_data = array(
						'product_id'=>$item_id,
						'user_id'=>$this->session->userdata('user_id'),
						'transaction_id'=>0,
						'qty'=>$this->input->post('item_qty')[key],
						'price'=>$subtotal,
						'address1'=>$this->input->post('address'),
						'address2'=>$this->input->post('address2'),
						'city'=>$this->input->post('city'),
						'state'=>$this->input->post('state'),
						'zipcode'=>$this->input->post('zipcode')
					);

					//Add to database, order table
					$this->Product_model->add_order($order);
				}

				//Get grand total
				$this->grand_total = $this->total + $this->tax + $this->shipping;

				//Cost array
				$paypal_product['assets']=array(
					'tax_total'=>$this->tax,
					'shipping_cost'=>$this->shipping,
					'grand_total'=>$this->total
				);

				//Session array for when returned
				$_SESSION['paypal_products']=$paypal_products;
			}
		}
	}

?>
