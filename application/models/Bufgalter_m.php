<?php
class Bufgalter_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    


   public function sel_edu_program()
   {
    $query = $this->db //->where('price = 0')
                     ->where('edu_program.ID_form = form_teach.ID_form')
                     ->get('edu_program, form_teach');
    return $query->result_array();
   }

   public function sel_rast($ID_ep)
   {
    $query = $this->db->where('ID_ep', $ID_ep)
                      ->where('edu_program.ID_form = form_teach.ID_form')
                      ->get('edu_program, form_teach');
    return $query->row_array();
   }

    //отображение всех направлений
    public function sel_focus()
    {
     $query = $this->db->get('focus');
     return $query->result_array();
    }
 
    //отображение всех ДПО при выборе направления
    public function sel_focus_edu($ID_focus)
    {
     $query = $this->db->where('ID_focus', $ID_focus)
                       ->get('edu_program');
     return $query->result_array();
    }


      //изменить данные прайса
   public function upd_price($ID_ep, $cost_hour, $price)
   {
       $data = array(
           'cost_hour' => $cost_hour,
           'price' => $price
       );
       $this->db->where('ID_ep', $ID_ep);

       $query = $this->db->update('edu_program', $data);
       return $query;
   }

   
    

}
