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
			//If form is valid, test user model to see if it registers
			else{
				$data=array(
					'first_name'=>$this->input->post('first_name'),
					'last_name'=>$this->input->post('last_name'),
					'email'=>$this->input->post('email'),
					'username'=>$this->input->post('username'),
					'password'=>$this->input->post('password')
				);

				if($this->User_model->register($data)){
					//message to be returned upon successful register
					$this->session->set_flashdata('registered', 'You are now registered');
					redirect('products');
				}
			}
		}

		public function login(){

			$this->form_validation->set_rules('username','Username','trim|required');
			$this->form_validation->set_rules('password','Password','trim|required');

			$username=$this->input->post('username');
			$password=$this->input->post('password');

			$user_id = $this->User_model->login($username , $password);

			//See if user exists and has correct password
			if($user_id){
				$data = array(
					'user_id'=>$user_id,
					'username'=>$username,
					'logged_in'=>true
				);

				//set session data for logged in user
				$this->session->set_userdata($data);

				$this->session->set_flashdata('login success','You have logged in');
				redirect('products');
			}
			else{
				//Set error message
				$this->session->set_flashdata('failed login','Login failed');
				redirect('products');
			}
		}

		public function logout(){
			//Unset user data
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');
			$this->session->sess_destroy();

			redirect('products');
		}
	}

?>
