<?php
class Ajaxpagmodel extends CI_Model
{
 function count_all()
 {
  $query = $this->db->get("locations");
  return $query->num_rows();
 }

 function fetch_details($limit, $start)
 {
  $output = '';
  $this->db->select("*");
  $this->db->from("locations");
  $this->db->order_by("location_id", "ASC");
  $this->db->limit($limit, $start);
  $query = $this->db->get();
  $output .= '
  <table class="table table-bordered">
   <tr>
    <th>Country ID</th>
    <th>Country Name</th>
   </tr>
  ';
  foreach($query->result() as $row)
  {
   $output .= '
   <tr>
    <td>'.$row->location_code.'</td>
    <td>'.$row->location_name.'</td>
   </tr>
   ';
  }
  $output .= '</table>';
  return $output;
 }
}