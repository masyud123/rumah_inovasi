<?php 

class Model_nominator extends CI_Model{

	public function tampil_subevent(){
		return $this->db->get('subevent');
	}

	public function ambil_id_subevent($id_subevent)
	{
		$result = $this->db->where('id', $id_subevent)->limit(1)->get('subevent');
		if($result->num_rows() >= 0){
			return $result->row();
		}else{
			return false; 
		}
	}

	public function ambil_id_nominator($id_subevent)
	{
		$result = $this->db->where('id_subevent', $id_subevent)->get('indikator_penilaian_pemenang');
		if($result->num_rows() >= 0){
			return $result->result();
		}else{
			return false; 
		}
	}

	public function tambah_nominator($data,$table){
		$this->db->insert($table,$data);
	}

	public function hapus_nominator($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}
?>