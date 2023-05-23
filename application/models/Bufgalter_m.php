<?php
class Bufgalter_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    


   public function sel_edu_program()
   {
    $query = $this->db->where('price = 0')
                      ->get('edu_program');
    return $query->result_array();
   }


}
