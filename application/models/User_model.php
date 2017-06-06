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

		public function login($username, $password){
			//Validate
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('username',$username);
			$result = $this->db->get();

			if($result->num_rows()>0)
			{
				foreach($result->result() as $user)
				{
					if(password_verify($password,$user->password))
					{
						return $user;
					}
				}
			}
			else{
				return false;
			}
		}
	}

?>
