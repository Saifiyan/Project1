<?php 
    class Fruit extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->model('Fruit_model');
        }
        function index(){
            $this->load->view('Fruit_view');
        }

        function save(){
            $name = $this->input->post('fruit_name');
            $price = $this->input->post('price');
            $insert = array(
                'name'=>$name,
                'price'=>$price,

            );
            $data=$this->Fruit_model->save_fruit($insert);
            echo json_encode($data);
        }
    }

?>