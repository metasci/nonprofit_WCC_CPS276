<?php

class User_model extends CI_Model {
    public function __construct(){
        $this->load->database();
    }

    public function addUser(){
        $data = array(
			'first_name' => $this->input->post('fname'),
			'middle_initial' => $this->input->post('mid_init'),
			'last_name' => $this->input->post('lname'),
			'password' => $this->input->post('passwd'),
			'street' => $this->input->post('str_addr'),
			'city' => $this->input->post('city'),
			'state' => $this->input->post('which_state'),
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

}