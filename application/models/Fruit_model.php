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

    function fruit_list(){
        $res=$this->db->get('fruits');
        return $res->result();
    }

    function update_fruit(){
        $fruit_id = $this->input->post('fruit_id_edit');
        $fruit_name = $this->input->post('fruit_name_edit');
        $fruit_price = $this->input->post('price_edit');

        $this->db->set('name',$fruit_name);
        $this->db->set('price',$fruit_price);
        $this->db->where('id',$fruit_id);

        $result = $this->db->update('fruits');

        return $result;
            
    }
    
    function delete_fruit(){
        $fruit_id=$this->input->post('fruit_id');

        $this->db->where('id',$fruit_id);

        $result = $this->db->delete('fruits');

        return $result;
    }
}
?>