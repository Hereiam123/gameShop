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

			if ($this->form_validation->run() == FALSE){
					//show register view
					$data['main_content'] = 'register';
					$this->load->view('layouts/main',$data);
			}
				else{
					
			}

		}

	}

?>
