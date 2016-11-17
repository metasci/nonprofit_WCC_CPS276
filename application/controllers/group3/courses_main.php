<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses_main extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('group3/course_model'); 
        $this->load->model('group1_models/user_model');
    }

    public function course_dash(){
    
        // print_r($data['course_info']);

        if($this->session->logged_in){ // if logged in do

            $data['course_info'] = (array)$this->course_model->all_course_info();
            $data['user_permission'] = str_split($this->user_model->getPermission($this->session->userID));
            // print_r();
            $this->load->view('group1/templates/header');
            $this->load->view('group1/templates/navbar/navbar');
            $this->load->view('group3/course_dash', $data);
            $this->load->view('group1/templates/navbar/navbottom'); 
            $this->load->view('group1/templates/footer');

		
		} else { // else redirect to Login_controller

			header('Location: login');
	
		}
    }


    public function add_class_page(){

        
        if($this->session->logged_in){ // if logged in do

            // check permission
            if(str_split($this->user_model->getPermission($this->session->userID))[0]){

                $filter['user_type']['teacher'] = 1;

                $data['teachers'] = $this->user_model->filterUsers($filter);

                // print_r($data['teachers']);
                $this->load->view('group1/templates/header');
                $this->load->view('group1/templates/navbar/navbar');
                $this->load->view('group3/add-class', $data);
                $this->load->view('group1/templates/navbar/navbottom'); 
                $this->load->view('group1/templates/footer');    

            } else {
                redirect('courses');
            }
		
		} else { // else redirect to Login_controller

			header('Location: login');
	
		}
    }

    public function save_new_class(){
        $this->course_model->insert_new_class($_REQUEST);

        redirect('courses');

    }


    public function course_details(){

        $course_id = $this->input->post('course_id');

        echo $course_id;

    }

}


