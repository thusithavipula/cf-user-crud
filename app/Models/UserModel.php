<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

    protected $table_credential = 'user_credential';
    protected $table_informaion = 'user_info';

    /**
     *  Insert User data into respective tables and return the status
     */
    public function insertUser($user_data)
    {
        $this->db->transStart();

        $user_credential = array(
            'user_name' => $user_data['user_name'],
            'password' => $this->passwordHash($user_data['password']),
        );

        $this->db->table($this->table_credential)->insert($user_credential);

        // Get the AutoIncriment ID as the user_id
        $user_id = $this->db->insertID();

        $user_informaion = array(
            'user_id' => $user_id,
            'first_name' => $user_data['first_name'],
            'last_name' => $user_data['last_name'],
            'email' => $user_data['email'],
            'mobile' => $user_data['mobile']
        );

        $this->db->table($this->table_informaion)->insert($user_informaion);
        $this->db->transComplete();
        return $this->db->transStatus();
    }

    /**
     * Hash user password before inserting
     */
    protected function passwordHash($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * Get Users data excluding the 'password' column
     */
    public function getUsersData()
    {
        $builder = $this->db->table($this->table_credential);
        $builder->select('user_id, first_name, last_name, email, mobile, user_name');
        $builder->join($this->table_informaion, $this->table_credential . '.id = ' . $this->table_informaion . '.user_id');
        return $builder->get()->getResult();
    }
}
