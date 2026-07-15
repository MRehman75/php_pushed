<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // Load database
        $this->load->database();

        // Load session
        $this->load->library('session');

        // Load model
        $this->load->model('User_model');
    }


    public function index()
    {
        $this->load->view('login');
    }



    public function register()
    {
        echo "<pre>";

print_r($_POST);

exit;

        $name     = trim((string)$this->input->post('name'));
        $email    = trim((string)$this->input->post('email'));
        $password = trim((string)$this->input->post('password'));


        // Check empty fields
        if(empty($name) || empty($email) || empty($password))
        {

            $response = array(

                "status" => false,

                "message" => "All fields are required"

            );


            return $this->json_response($response);

        }



        // Check email format

        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {

            $response = array(

                "status" => false,

                "message" => "Invalid email format"

            );


            return $this->json_response($response);

        }




        // Check existing email

        $existing_user = $this->User_model->check_email($email);


        if($existing_user)
        {

            $response = array(

                "status" => false,

                "message" => "Email already exists"

            );


            return $this->json_response($response);

        }




        // Insert user data

        $data = array(

            "name" => $name,

            "email" => $email,

            "password" => password_hash(
                $password,
                PASSWORD_DEFAULT
            )

        );



        $insert = $this->User_model->register($data);



        if($insert)
        {

            $response = array(

                "status" => true,

                "message" => "Registration successful"

            );

        }
        else
        {

            $response = array(

                "status" => false,

                "message" => "Registration failed"

            );

        }



        return $this->json_response($response);

    }





    public function login()
    {


        $email = trim($this->input->post('email'));

        $password = trim($this->input->post('password'));



        if(empty($email) || empty($password))
        {

            return $this->json_response([

                "status"=>false,

                "message"=>"Email and password required"

            ]);

        }



        $user = $this->User_model->login($email);



        if($user && password_verify($password,$user->password))
        {


            $session_data = array(

                "user_id"=>$user->id,

                "name"=>$user->name,

                "email"=>$user->email,

                "logged_in"=>true

            );


            $this->session->set_userdata($session_data);



            return $this->json_response([

                "status"=>true,

                "message"=>"Login successful",

                "redirect"=>base_url('dashboard')

            ]);

        }
        else
        {

            return $this->json_response([

                "status"=>false,

                "message"=>"Invalid email or password"

            ]);

        }


    }




    public function logout()
    {

        $this->session->sess_destroy();

        redirect('auth');

    }





    private function json_response($data)
    {

        $this->output

        ->set_content_type('application/json')

        ->set_output(json_encode($data));

    }


}