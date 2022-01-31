<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserModel extends CI_Model{

	public function saveUser($data){
		return $this->db->insert('mst_supplier_master',$data);
	}

	function checkUser($data)
	{
		$sq="select * from mst_supplier_master where user_id='".$data['user_id']."' and  mstsmtac='".$data['mstsmtac']."'";
		$query = $this->db->query($sq);
		if($query->num_rows()>0)
		{
			return $query->result_array();
		}
		else
		{
			return false;	
		}
    }




}


?>
