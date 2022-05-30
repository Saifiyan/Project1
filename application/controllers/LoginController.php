<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        /* Load MLogin model*/
        $this->load->model('mlogin');
    }

    // public function index() {
    //     /* Load the login screen, if the user is not log in */
    //     if (isset($_SESSION['login']['id'])) { 
    //         $this->load->view('fruit_view');
    //     } else {
    //         /* if not, display the login window */
    //         $this->load->view('login');
    //     }
    // }

    // public function dashboard() {
    //     /* Load the dashboard screen, if the user is already log in */
    //     if (isset($_SESSION['login']['id'])) {
    //         $this->load->view('fruit_view');
    //     } else {
    //         $this->load->view('login');
    //     }
    // }

    function getLogin() {
        /* Data that we receive from ajax */
        $username = $this->input->post('UserName');
        $Password = $this->input->post('Password');
        if (!isset($username) || $username == '' || $username == 'undefined') {
            /* If Username that we recieved is invalid, go here, and return 2 as output */
            echo 2;
            exit();
        }
        if (!isset($Password) || $Password == '' || $Password == 'undefined') {
            /* If Password that we recieved is invalid, go here, and return 3 as output */
            echo 3;
            exit();
        }
        $this->form_validation->set_rules('UserName', 'UserName', 'required');
        $this->form_validation->set_rules('Password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            /* If Both Username &  Password that we recieved is invalid, go here, and return 4 as output */
            echo 4;
            exit();
        } else {
            /* Create object of model MLogin.php file under models folder */
            $Login = new MLogin();
            /* validate($username, $Password) is the function in Mlogin.php */
            $result = $Login->validate($username, $Password);
            if (count($result) == 1) {
                /* If everything is fine, then go here, and return 1 as output and set session */
                $data = array(
                    'id' => $result[0]->id,
                    'username' => $result[0]->username
                );
                $this->session->set_userdata($data);
                echo 1;
            } else {
                /* If Both Username &  Password that we recieved is invalid, go here, and return 5 as output */
                echo 5;
            }
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url(''));
       } 

}