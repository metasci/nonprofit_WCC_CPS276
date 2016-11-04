<?php

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function addUser()
    {
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

    public function buildPermission($admin, $teacher, $parent, $student)
    {
        $temp = array($admin == 1 ? '1' : '0', $teacher == 1 ? '1' : '0', $parent == 1 ? '1' : '0', $student == 1 ? '1' : '0');
        return implode($temp);
    }


// validate username and password used to l
    public function validate($userID, $password)
    {
        $array = array('user_id' => $userID, 'password' => $password);
        $this->db->where($array);
        $query = $this->db->get('users');

        // print_r();

        if ($query->result_id->num_rows == 1) {
            // echo 'logged in';
            return true;
        } else {
            return false;
        }
    }

    // gets permission associated with $userID
    public function getPermission($userID)
    {

        $this->db->select('permission');
        $this->db->from('users');
        $this->db->where('user_id', $userID);
        $query = $this->db->get()->result();

        return $query[0]->permission;
    }

    // gets info for userID
    public function getUserInfo($userID)
    {

        $this->db->select('user_id, first_name, middle_initial, last_name, gender, email, birth_date, street, city, state, zip, phone_number_1, phone_number_2, misc_duties, notes');
        $this->db->from('users');
        $this->db->where('user_id', $userID);
        $query = $this->db->get()->result();

        return $query[0];

    }


    // get all user info (user profile and settings pages)
    public function getAllUserInfo($userID)
    {

        // going to need to do a join to get family_id & misc_duties
        $this->db->where('user_id', $userID);
        $query = $this->db->get('users')->result();

        // print_r($query);
        return $query[0];
    }


    // gets info for all users based on filter options
    // for use on browse_users page
    public function filterUsers($filterInfo = NULL)
    {
        //return array of all users to be stored in $data and sent to view

        $this->db->select('user_id, first_name, last_name, permission, gender, city');
        $this->db->from('users');

        if ($filterInfo) {
            // use $this->db->where to search based on filter
            // echo 'Filter Info';
            // print_r($filterInfo);

            if ($filterInfo['first_name']) {
                $filter['first_name'] = $filterInfo['first_name'];
            }

            if ($filterInfo['last_name']) {
                $filter['last_name'] = $filterInfo['last_name'];
            }


            // requires a table join
            // if($filterInfo->family_id){
            // 	$filter['family_id'] = $filterInfo->family_id;
            // }

            if ($filterInfo['user_id']) {
                $filter['user_id'] = $filterInfo['user_id'];
            }

            if ($filterInfo['city']) {
                $filter['city'] = $filterInfo['city'];
            }

            if ($filterInfo['birth_date']) {
                $filter['birth_date'] = $filterInfo['birth_date'];
            }

            // this will need some manipulation
            // if($filterInfo['birth_month']){
            // 	$filter['birth_month'] = $filterInfo['birth_month'];
            // }


            $this->db->where($filter);

        }

        $query = $this->db->get()->result();

        // convert array of objects to array of arrays
        foreach ($query as &$user) {
            $user = (array)$user;
        }

        return $query;
    }


    public function updateUserInfo($post)
    {
        $data = array(
            'first_name' => $post['fname'],
            'middle_initial' => $post['mid_init'],
            'last_name' => $post['lname'],
            'street' => $post['str_addr'],
            'city' => $post['city'],
            'state' => $post['which_state'],
            'permission' => $this->buildPermission(isset($post['add_admin']) ? $post['add_admin'] : 0, isset($post['add_teacher']) ? $post['add_teacher'] : 0, isset($post['add_parent']) ? $post['add_parent'] : 0, isset($post['add_student']) ? $post['add_student'] : 0),
            'zip' => $post['zip_code'],
            'birth_date' => $post['birth_date'],
            'gender' => $post['gender'],
            'notes' => $post['notes'],
            'phone_number_1' => $post['phone1'],
            'phone_number_2' => $post['phone2'],
            'email' => $post['email1']
        );
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('users', $data);
    }

    public function getPassword($user_id)
    {
        $this->db->select('password');
        $this->db->where('user_id', $user_id);

        $query = $this->db->get('users')->result();

        // print_r();
        return $query[0]->password;
    }


    public function deleteUser($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->delete('users');
    }

	public function deleteUser($user_id){
		$this->db->where('user_id', $user_id);
		$this->db->delete('users');
	}


	public function updatePassword($user_id, $password){
		$data = array('password' => md5($password));

		$this->db->where('user_id', $user_id);
		$this->db->update('users', $data);


	}
}