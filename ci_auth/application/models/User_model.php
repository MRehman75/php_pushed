<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function check_email($email)
    {
        return $this->db
                    ->where('email',$email)
                    ->get('users')
                    ->row();
    }


    public function register($data)
    {
        return $this->db->insert('users',$data);
    }


    public function login($email)
    {
        return $this->db
                    ->where('email',$email)
                    ->get('users')
                    ->row();
    }

}