<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ProductModel extends CI_Model{

	public function get_category(){

		$query=$this->db->get('mst_product_category');
		
		return $query->result();
	}
	public function get_category_pagenation($limit,$start){
		// $this->db->limit($limit, $start);
		// $query=$this->db->get('mst_product_category');
		
		// return $query->result();
		$sql = "SELECT *  FROM mst_product_category LIMIT ".$limit." OFFSET ".$start; 
		// $sql ="SELECT * FROM doctor_master";
		 $query = $this->db->query($sql);
		// return $query->row_array();

		//$query=$this->db->get('doctor_master');
		return $query->result();
	}

	public function get_product_pagenation($limit,$start,$category){
		$sql = "SELECT mst_product_master.mstpctac,mst_product_category.mstpctan, mst_product_master.mstpmtan, mst_product_master.mstpmtasp, mst_product_master.mstpmtapp FROM mst_product_category INNER JOIN mst_product_master ON mst_product_master.mstpctac=mst_product_category.mstpctac where mst_product_master.mstpctac='".$category."'  LIMIT ".$limit." OFFSET ".$start; 
		$query = $this->db->query($sql);
		return $query->result();
	}




	// public function insertEmployee($data){
	// 	return $this->db->insert('employee',$data);
	// }

	// public function editEmployee($id){
	// 	$this->db->where('id',$id);
	// 	$query=$this->db->get('employee');
	// 	return $query->row(); 
	// }

	// public function update_employee($data, $id)
    // {
    //     $this->db->where('id', $id);
    //     return $this->db->update('employee', $data);
    // }

    // public function delete_employee($id)
    // {
    //     return $this->db->delete('employee', ['id' => $id]);
    // }

}


?>
