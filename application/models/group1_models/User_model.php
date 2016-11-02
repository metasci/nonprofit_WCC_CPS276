<?php

class User_model extends CI_Model {

    public function __construct(){
		parent::__construct(); 
        $this->load->database();
    }

    public function addUser(){
        $data = array(
			'first_name' => $this->input->post('fname'),
			'middle_initial' => $this->input->post('mid_init'),
			'last_name' => $this->input->post('lname'),
			'password' => md5($this->input->post('passwd')), // md5() hashes this password before storing in the database
			'street' => $this->input->post('str_addr'),
			'city' => $this->input->post('city'),
			'state' => $this->input->post('which_state'),
			'permission' => $this->buildPermission($this->input->post('add_admin'), $this->input->post('add_teacher'), $this->input->post('add_parent'), $this->input->post('add_student')),
			'zip' => $this->input->post('zip_code'),
			'birth_date' => $this->input->post('birth_date'),
			'gender' => $this->input->post('gender'),
			'notes' => $this->input->post('notes'),	
			'phone_number_1' => $this->input->post('phone1'),
			'phone_number_2' => $this->input->post('phone2'),
			'email' => $this->input->post('email1')
        );

        return $this->db->insert('users', $data);
    }

	public function buildPermission($admin, $teacher, $parent, $student){
		$temp = array($admin == 1? '1':'0', $teacher == 1? '1':'0', $parent == 1? '1':'0', $student == 1? '1':'0');
		return implode($temp);	
	}


// validate username and password used to l
	public function validate($userID, $password){ 
		$array = array('user_id' => $userID, 'password' => $password);
		$this->db->where($array);
		$query = $this->db->get('users');

		// print_r();

		if($query->result_id->num_rows == 1){
			// echo 'logged in';
			return true;
		} else {
			return false;
		}
	}

	public function getPermission(){

		$this->db->select('permission');
		$this->db->from('users');
		$this->db->where('user_id', $this->session->userID);
		$query = $this->db->get()->result();
		
		return $query[0]->permission;
	}

}