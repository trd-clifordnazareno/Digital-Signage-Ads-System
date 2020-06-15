<?php
Class Locations extends CI_Model{
    function get_loc(){
        $data = $this->db->query("select * from locations order by location_name asc");
        return $data->result();
    }
    function get_per_loc($loc){
        $data = $this->db->query("select * from table_location_report where location_code = '$loc'");
        return $data->result();
    }
}

