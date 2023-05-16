<?php
class Type_ep_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    //Выбрать вид ОП
    public function sel_type_ep()
    {
        $query = $this->db->get('type_ep');
        return $query->result_array();
    }

    //Добавить вид ОП
    public function add_type_ep($data)
    {
        $this->db->insert('type_ep', $data);
    }

    //Удалить вид ОП
    public function del_type_ep($data)
    {
        $this->db->delete('type_ep', $data);
    }

    //Изменить вид ОП
    public function upd_type_ep($id, $data)
    {
        $this->db->where('ID_type_ep', $id)
                 ->update('type_ep', $data);
    }
}