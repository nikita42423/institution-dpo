<?php
class Bufgalter_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    


   public function sel_edu_program()
   {

    $sql= "SELECT * FROM edu_program WHERE price = 0";
    $query = $this->db->query($sql);
        return $query->result_array();
   }


}
