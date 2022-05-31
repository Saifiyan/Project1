<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MLogin extends CI_Model {

    public $Modal;

    public function __construct() {
        parent::__construct();
    }

    /* function to use fetch the data from users table */

    function validate($user, $pass) {
        $this->db->select('*');
        $this->db->from('users');
        // $this->db->where('password', $pass);
        $this->db->where('username', $user);
        $query = $this->db->get();
        $data = $query->row();
        $res = $query->result_array();
        $res1 = $query->result();
        if ($res[0]['password'] == md5($pass)) {
            return $res1;
            // echo "succes";
        }
        
    }

    function exist($user) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $user);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

    function create_account($username,$fullname, $password){
        $insert = array(
            'fullname'=>$fullname,
            'username'=>$username,
            'password'=>$password, 
        );
        $result = $this->db->insert('users',$insert);
        return $result;
    }

   

}

?>