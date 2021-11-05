<?php 

class Model_usulan extends CI_Model{
	public function tampil_data(){
		return $this->db->get('usulan');
	} 

	public function tampil_data2(){
		$user =  $this->session->userdata('email');
		$result = $this->db->get_where('usulan', array('penilai' => $user));
		if($result->num_rows() >= 0){
			return $result->result();
		} else {
			return false;
		}
	} 

	/*public function tampil_data2(){
		$this->db->select('*')
		     ->from('usulan')
		     ->join('list_items', 'list_items.list_id = lists.id') 
		     ->where('list_id', $id);

		$query = $this->db->get();
	} */
	public function tambah_riwayat($data,$table){
		$this->db->insert($table,$data);
	}
	public function edit_riwayat($where,$table){
		return $this->db->get_where($table,$where);
	}
	public function update_riwayat($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	public function hapus_riwayat($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}
