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
        echo 'browse_users controller';
                $this->load->view('group1/templates/header');
				$this->load->view('group1/templates/navbar/navbar');
                // call showBrowseUsers here to set the correct view
				$this->load->view('group1/templates/navbar/navbottom'); 
				$this->load->view('group1/templates/footer');
    }


    public function showBrowseUsers() {
        
    }
}