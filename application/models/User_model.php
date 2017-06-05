<?php


	class User_model extends CI_Model{

		/*
		*	register user to database
		*/
		public function register($data){
			$data['password']=password_hash($data['password'], PASSWORD_DEFAULT);
			$insert = $this->db->insert('users',$data);
			return $insert;
		}

		public function login($data){
			
		}
	}

?>
