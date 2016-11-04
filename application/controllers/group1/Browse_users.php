<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Browse_users extends CI_Controller
{
    public $clearance = '1111'; // maybe place this in the constructor -> set to permission number in sessions

    public function __construct()
    {
        parent::__construct();
        $this->load->model('group1_models/user_model'); // I can now access the User_model class ($this->User_model)
    }


    public function index()
    {
        // add if statement 
        // if admin continue
        if ($this->session->logged_in) { // if logged in show browse users

            $data['user_array'] = (array)$this->user_model->filterUsers($this->input->post());


            $this->load->view('group1/templates/header');
            $this->load->view('group1/templates/navbar/navbar');
            $this->load->view('group1/browse/user_table', $data);
            $this->load->view('group1/templates/navbar/navbottom');
            $this->load->view('group1/templates/footer');

        } else { // else redirect to Login_controller

            header('Location: login');

        }

    }


    public function userProfile($userID = NULL)
    {
        // 'Details' button on user_dash

        if ($this->session->logged_in) { // if logged in show user profile

            $user_id = $userID != NULL ? $userID : $this->input->post('user_id');

            $data['user_array'] = (array)$this->user_model->getAllUserInfo($user_id);// get all user info based on posted user_id
            $data['current_user_clearance'] = str_split($this->user_model->getPermission($this->session->userID));

            $this->load->view('group1/templates/header');
            $this->load->view('group1/templates/navbar/navbar');
            $this->load->view('group1/browse/user_profile', $data); // load user_profile page
            $this->load->view('group1/templates/navbar/navbottom');
            $this->load->view('group1/templates/footer');

        } else { // else redirect to Login_controller

            header('Location: login');

        }
    }


    // displays the Edit User page for admin users
    public function editAccount()
    {
        // new page with pre-populated user registration form
        $this->load->helper('form');

        $userID = $this->input->post('user_id');

        if ($this->session->logged_in) { // if logged in show user profile

            $data = (array)$this->user_model->getAllUserInfo($userID);// get all user info based on posted user_id
            $data['registration_edit'] = TRUE;


            $this->load->view('group1/templates/header');
            $this->load->view('group1/templates/navbar/navbar');
            $this->load->view('group1/registration/registration_main', $data); // load registration page
            $this->load->view('group1/templates/navbar/navbottom');
            $this->load->view('group1/templates/footer');

        } else { // else redirect to Login_controller

            header('Location: login');

        }

    }

    // update user after admin edit
    public function updateUser()
    {

        $this->user_model->updateUserInfo($this->input->post());
        $this->userProfile($this->input->post('user_id'));
    }

    // displays the change password page for non-admin users
    public function changePassword()
    {
        // old password
        // maybe but then the admin couldnt force change user passwords
        // new password
        // confirm new password 
        // use javascript checkPassword function to confirm sameness

        //submit
    }

    public function confirmUserPassword($error = FALSE)
    {
        $data['user_id'] = $this->input->post('user_id');

        if ($this->session->logged_in) { // if logged in show user profile

            if ($this->input->post('doit') == 1) {


                //if password entered == admin password
                if (md5($this->input->post('password')) == $this->user_model->getPassword($this->session->userID)) {
                    // delete user

                    $this->user_model->deleteUser($this->input->post('user_id'));

                    header('Location: ' . base_url());

                } else { // else redirect back to same page with red alert
                    $_POST['doit'] = 0;
                    $this->confirmUserPassword(TRUE);
                }


            } else {
                $data['error'] = $error;
                $this->load->view('group1/templates/header');
                $this->load->view('group1/templates/navbar/navbar');
                $this->load->view('group1/admin/get_password', $data);// get admin password
                $this->load->view('group1/templates/navbar/navbottom');
                $this->load->view('group1/templates/footer');
            }

        } else { // else redirect to Login_controller

            header('Location: login');

        }


    }
}