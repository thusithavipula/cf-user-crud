<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    /**
     * View all user data and act as the default route
     */
    public function index()
    {
        return view('user/index');
    }

    /**
     * Handle user insert view and the "POST" request
     */
    public function add()
    {
        $data = [];
        // If the request method is post, add the user to DB
        if ($this->request->is('post')) {

            // Validate the User inputs
            $validation = \Config\Services::validation();
            $validation->setRule('first_name', 'First Name', 'required|min_length[3]|max_length[20]');
            $validation->setRule('last_name', 'Last Name', 'required|min_length[3]|max_length[20]');
            $validation->setRule('email', 'Email', 'required|min_length[6]|max_length[50]|valid_email|is_unique[user_info.email]');
            $validation->setRule('mobile', 'Mobile', 'required|min_length[9]|max_length[20]');
            $validation->setRule('user_name', 'Username', 'required|min_length[3]|max_length[20]|is_unique[user_credential.user_name]');
            $validation->setRule('password', 'Password', 'required|min_length[8]|max_length[255]');
            $validation->setRule('password_confirm', 'Re-Type Password', 'matches[password]');

            if (!$validation->run($_POST)) {
                $data['validation'] = $validation;
            } else {
                $user = new UserModel();
                $user_data = [
                    'first_name' => $this->request->getVar('first_name'),
                    'last_name' => $this->request->getVar('last_name'),
                    'email' => $this->request->getVar('email'),
                    'mobile' => $this->request->getVar('mobile'),
                    'user_name' => $this->request->getVar('user_name'),
                    'password' => $this->request->getVar('password'),
                ];
                $status = $user->insertUser($user_data);

                // Set Session based on the status(For alerts)
                $session = session();
                $session->setFlashdata('alert_status', $status);
                if($status){
                    $session->setFlashdata('alert_message', 'New User Added Successfully');
                } else {
                    $session->setFlashdata('alert_message', 'Failed To add the User');
                }

                return redirect()->route('user');
            }
        }
        return view('user/add', $data);
    }

    /**
     * Handle 'Get All' Users request
     */
    public function getAll()
    {
        // Get all the users if the request method is post
        if ($this->request->is('post')) {
            $custom_user = new UserModel();
            $data = [
                'success' => true,
                'data'      => $custom_user->getUsersData(),
            ];
            return $this->response->setJSON($data);
        } else {
            return $this->response->setStatusCode(400, 'No direct script access allowed');
        }
    }
}
