<?php 

class Model_event extends CI_Model{
	public function tampil_data(){
		return $this->db->get('event');
	} 
	public function tambah_event($data,$table){
		$this->db->insert($table,$data);
	}
	public function edit_event($where,$table){
		return $this->db->get_where($table,$where);
	}
	public function update_event($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	public function hapus_event($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}
?>