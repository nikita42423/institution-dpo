<?php
class Bufgalter_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    


   public function sel_edu_program()
   {
    $query = $this->db->where('price = 0')
                     ->where('edu_program.ID_form = form_teach.ID_form')
                     ->get('edu_program, form_teach');
    return $query->result_array();
   }

   public function sel_rast($ID_ep)
   {
    $query = $this->db->where('ID_ep', $ID_ep)
                      ->where('edu_program.ID_form = form_teach.ID_form')
                      ->get('edu_program, form_teach');
    return $query->result_array();
   }

}
