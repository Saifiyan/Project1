<?php 

class Fruit_model extends CI_Model{
    function save_fruit($insert){
        // $name = $this->input->post('fruit_name');
        // $price = $this->input->post('price');
        // $data = array(
        //     'name'=>$name,
        //     'price'=>$price,

        // );
        $result = $this->db->insert('fruits',$insert);
        return $result;
    }
}
?>