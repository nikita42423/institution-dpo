<?php
class User_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

//Выбрать пользователя
public function sel_user($login, $passwords)
{
    $sql = "SELECT * FROM users, role WHERE login='$login'  AND passwords=md5('$passwords') AND users.ID_role = role.ID_role";
    
    $query = $this->db->query($sql);
    
    if($query->num_rows()==1)
    {
        return $query->row();
    }
    else 
    {
        return false;
    }
}

 

}