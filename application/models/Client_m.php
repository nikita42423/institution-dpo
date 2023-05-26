<?php
class Client_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    //Выбрать образовательную программу
    public function sel_cours()
    {
        $query = $this->db->get('edu_program');
        return $query->result_array();
    }


    // пользователь для клиента (персональные данные)
    public function sel_user($ID_user)
    {
        $query = $this->db->where('users.ID_role = role.ID_role')
                            ->where('ID_user', $ID_user)
                          ->get('users, role');
       return $query->result_array();
    }


     //изменить данные клиента (персональные данные)
     public function upd_user($ID_user, $full_name, $phone, $address)
     {
         $data = array(
             'full_name' => $full_name,
             'phone' => $phone,
             'address' => $address
         );
         $this->db->where('ID_user', $ID_user);
 
         $query = $this->db->update('users', $data);
         return $query;
     }


     
    }