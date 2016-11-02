<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Browse_users extends CI_Controller {
    public $clearance = '1111'; // maybe place this in the constructor -> set to permission number in sessions
	
	public function __construct(){
        parent::__construct(); 
        $this->load->model('group1_models/user_model'); // I can now access the User_model class ($this->User_model)
    }


    public function index() {
        // add if statement 
        // if admin continue
        // else redirect to dash
        // print_r($this->input->post());
        $data['user_array'] = (array)$this->user_model->filterUsers($this->input->post());


        $this->load->view('group1/templates/header');
        $this->load->view('group1/templates/navbar/navbar');
        $this->load->view('group1/browse/user_table', $data);
        $this->load->view('group1/templates/navbar/navbottom'); 
        $this->load->view('group1/templates/footer');
    }




    public function userProfile($userID = NULL){
        // 'Account Settings' button on user_dash
        // echo 'userProfile controller';

        $user_id = $userID != NULL? $userID:$this->input->post('user_id');

        $data['user_array'] = (array)$this->user_model->getAllUserInfo($user_id);// get all user info based on posted user_id
        $data['current_user_clearance'] = str_split($this->user_model->getPermission($this->session->userID));
        // print_r($data['current_user_clearance']);
        $this->load->view('group1/templates/header');
        $this->load->view('group1/templates/navbar/navbar');
        $this->load->view('group1/browse/user_profile', $data); // load user_profile page
        $this->load->view('group1/templates/navbar/navbottom'); 
        $this->load->view('group1/templates/footer');
    }
}