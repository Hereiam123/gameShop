<?php

	class Users extends CI_Controller{

		public function register(){

			//Validation rules
			$this->form_validation->set_rules('first_name','First name','trim|required');
			$this->form_validation->set_rules('last_name','Last name','trim|required');
			$this->form_validation->set_rules('email','Email','trim|required|valid_email');
			$this->form_validation->set_rules('username','Username','trim|required|min_length[5]|max_length[20]');
			$this->form_validation->set_rules('password','Password','trim|required|min_length[5]|max_length[10]');
			$this->form_validation->set_rules('password2','Password Confirmation','trim|required|matches[password]');

			//If form validation isn't true
			if ($this->form_validation->run() == FALSE){
				//show register view
				$data['main_content'] = 'register';
				$this->load->view('layouts/main',$data);
			}
			//If form is valid, user model test to see if it registers
			else{
				$data=array(
					'first_name'=>$this->input->post('first_name'),
					'last_name'=>$this->input->post('last_name'),
					'email'=>$this->input->post('email'),
					'username'=>$this->input->post('username'),
					'password'=>$this->input->post('password')
				);

				if($this->User_model->register($data)){
					$this->session->set_flashdata('registered', 'You are now registered');
					redirect('products');
				}
			}
		}
	}

?>
