<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Browse_duties extends CI_Controller {
    public $clearance = '1111'; // maybe place this in the constructor -> set to permission number in sessions
	
	public function __construct(){
        parent::__construct(); 
        $this->load->model('group1_models/duties_model'); // I can now access the Duties_model class ($this->Duties_model)
    }


    public function index() {
        // add if statement 
        // if admin continue
        // else redirect to dash
        echo 'browse_duties controller';
                $this->load->view('group1/templates/header');
				$this->load->view('group1/templates/navbar/navbar');
                // call showBrowseDuties here to set the correct view
				$this->load->view('group1/templates/navbar/navbottom'); 
				$this->load->view('group1/templates/footer'); 
    }


    public function showBrowseDuties() {

    }
}