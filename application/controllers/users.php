<?php

	class Users extends CI_Controller{

		public function register(){

			//Validation rules
			$this->form_validation->set_rules('first_name','First name','trim|required|min_lenght[5]|max_length[20]');
			$this->form_validation->set_rules('last_name','Last name','required');
			$this->form_validation->set_rules('','First name','required');
			$this->form_validation->set_rules('first_name','First name','required');

			if ($this->form_validation->run() == FALSE){
					//show register view
					$data['main_content'] = 'register';
					$this->load->view('layouts/main',$data);
			}
				else{
					$this->load->view('formsuccess');
			}

		}

	}

?>
