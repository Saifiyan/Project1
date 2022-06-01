<?php 
    class Fruit extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->model('Fruit_model');
        }
        function index(){
            /* Load the login screen, if the user is not log in */
        if (isset($_SESSION['id'])) { 
            $this->load->view('fruit_view');
        } else {
            /* if not, display the login window */
            $this->load->view('login');
        }
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

        function fruit_data(){
            $data=$this->Fruit_model->fruit_list();
            echo json_encode($data);
        }

        function update(){
            

            $data=$this->Fruit_model->update_fruit();
            echo json_encode($data);
        }

        function delete(){
            $data=$this->Fruit_model->delete_fruit();
            echo json_encode($data);
        }
    }

?>