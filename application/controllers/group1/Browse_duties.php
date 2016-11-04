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
                $this->showBrowseDuties();
				$this->load->view('group1/templates/navbar/navbottom'); 
				$this->load->view('group1/templates/footer'); 
    }

    public function filteredIndex($data)
    {
        $this->load->view('group1/templates/header');
        $this->load->view('group1/templates/navbar/navbar');
        // call showBrowseDuties here to set the correct view
        $this->load->view('group1/browse/duty_table', $data);
        $this->load->view('group1/templates/navbar/navbottom');
        $this->load->view('group1/templates/footer');
    }


    public function showBrowseDuties() {

        $query = $this->db->get('misc_duties_table');
        $data['duties_array'] = $query->result_array();
        return $this->load->view('group1/browse/duty_table', $data);
    }

    public function addDuty()
    {
        $data['duty_name'] = $this->input->post('duty_name');
        $data['duty_description'] = $this->input->post('duty_description');
        $this->duties_model->addDuty($data);

        return redirect('welcome');
    }
    
    public function getDutyById($id)
    {
        $this->duties_model->getDutyById($id);
    }

    public function getDutyByName($name)
    {
        $this->duties_model->getDutyByName($name);
    }

    public function filterDuties()
    {
        if($this->input->post('duty_id') != null)
        {
            $this->findDutyById($this->input->post('duty_id'));
        }
        else if($this->input->post('duty_name') != null)
        {
            $this->findDutyByName($this->input->post('duty_name'));
        }
    }

    public function findDutyByName($name)
    {
        $data['duties_array'] = $this->duties_model->getDutyByName($name);
        $this->filteredIndex($data);
    }

    public function findDutyById($id)
    {
        $data['duties_array'] = $this->duties_model->getDutyById($id);
        $this->filteredIndex($data);
    }
    
    public function updateDuty()
    {
        $data['duty_id'] = $this->input->post('duty_id');
        $data['duty_name'] = $this->input->post('duty_name');
        $data['duty_description'] = $this->input->post('duty_description');
        $this->duties_model->updateDuty($data);

        return redirect('browse_duties');
    }

    public function editDuty()
    {
        $this->load->helper('form');

        $id = $this->input->post('duty_id');
        $data['duty'] = $this->duties_model->getDutyById($id);
        
        $this->load->view('group1/templates/header');
        $this->load->view('group1/templates/navbar/navbar');
        $this->load->view('group1/duties/edit_duty', $data);
        $this->load->view('group1/templates/navbar/navbottom');
        $this->load->view('group1/templates/footer');
    }

}