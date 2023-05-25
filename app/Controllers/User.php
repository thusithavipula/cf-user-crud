<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        return view('user/index');
    }

    public function add()
    {
        $data = [];
        // If the request method is post, add the user to DB
        if($this->request->getMethod() == "post" ){

            $rules = [
				'first_name' => 'required|min_length[3]|max_length[20]',
				'last_name' => 'required|min_length[3]|max_length[20]',
				'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[user.email]',
                'mobile' => 'required|min_length[9]|max_length[20]',
                'user_name' => 'required|min_length[3]|max_length[20]|is_unique[user.user_name]',
				'password' => 'required|min_length[8]|max_length[255]',
				'password_confirm' => 'matches[password]',
			];

			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{
                $user = new UserModel();
                $user_data = [
					'first_name' => $this->request->getVar('first_name'),
					'last_name' => $this->request->getVar('last_name'),
					'email' => $this->request->getVar('email'),
                    'mobile' => $this->request->getVar('mobile'),
                    'user_name' => $this->request->getVar('user_name'),
					'password' => $this->request->getVar('password'),
				];
				$user->save($user_data);
				$session = session();
				$session->setFlashdata('success', 'Successful Registration');
				return redirect()->route('user');
            }
        }
        return view('user/add', $data);
    }

    public function getAll()
    {
        // Get all the users if the request method is post
        if ($this->request->getMethod() == "post") {
            $users = new UserModel();
			echo json_encode($users->findAll());
		} else {
			echo "No direct script access allowed";
		}
    }
}
