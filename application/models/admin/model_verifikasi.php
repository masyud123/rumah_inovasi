<?php

class Model_verifikasi extends CI_Model{

	public function ambil_id_subevent()
	{
		$iduser =  $this->session->userdata('id_usr');
		$this->db->select('id_subevent');
	    $this->db->from('setting_penilai');
	    $this->db->where('id_usr', $iduser);
	    $query = $this->db->get();
	    return $query->row();

	}

	public function ambil_usulan($id_subevent)
	{
		$this->db->select('*');
	    $this->db->from('usulan');
	    $this->db->where('status', '2');
	    $this->db->where('id_subevent', $id_subevent);
	    //$this->db->where('tahun', $cari);
	    $query = $this->db->get();
	    return $query->result();
	}

	public function ambil_usulan_nominator($id_subevent)
	{
		$this->db->select('nominator.*,usulan.*');
		$this->db->from('nominator');
		$this->db->join('usulan','usulan.id = nominator.id_usulan');
		$this->db->where('nominator.id_subevent', $id_subevent);
		$this->db->where('nominator.status', 1);
		//$result = $this->db->where('id_subevent', $id_subevent);
		$query = $this->db->get();
        return $query->result();
	}

	public function jumlah_usulan($id_subevent)
	{
		$var = $this->db->select('count(id) as jumlah1');
	    $this->db->from('usulan');
	    $this->db->where('id_subevent', $id_subevent);
	    $this->db->where('status', 2);
	    $query = $this->db->get();
	    return $query->result();
	}

	public function jumlah_usulan2()
	{
		$idpenilai =  $this->session->userdata('id_usr');
		$var = $this->db->select('count(id_penilai) as jumlah2');
	    $this->db->from('penilaian_proposal');
	    $this->db->where('id_penilai', $idpenilai);
	    $query = $this->db->get();
	    return $query->result();
	}

	public function ganti_warna(){
		$id_penilai = $this->session->userdata('id_usr');
		$this->db->select('id_usulan, judul, id_usr');
		$this->db->from('penilaian_proposal');
		$this->db->join('usulan', 'usulan.id = penilaian_proposal.id_usulan');
		$this->db->where('penilaian_proposal.id_penilai', $id_penilai);
		$query = $this->db->get();
	    return $query->result();
	}
	public function ganti_warna2(){
		$id_penilai = $this->session->userdata('id_usr');
		$this->db->select('id_usulan, judul, id_usr');
		$this->db->from('total_nilai_pemenang');
		$this->db->join('usulan', 'usulan.id = total_nilai_pemenang.id_usulan');
		$this->db->where('total_nilai_pemenang.id_penilai', $id_penilai);
		$query = $this->db->get();
	    return $query->result();
	}

	// public function jumlah_usulan2($id_subevent){

	// 	$iduserrr =  $this->session->userdata('id_usr');
	// 	$this->db->select('penilaian_usulan.usulan_id,count(judul) as jum');
	// 	$this->db->from('penilaian_usulan');
	// 	$this->db->join('usulan','usulan.id = penilaian_usulan.usulan_id');
	// 	$this->db->where('id_penilai !=', $iduserrr);
	// 	$this->db->where('usulan.subevent', $id_subevent);
	// 	//$result = $this->db->where('id_subevent', $id_subevent);
	// 	$query = $this->db->get();
 //        return $query->result();
	// }

	public function cari_tahun($cari_verifikasi){

		$iduser =  $this->session->userdata('id_usr');
		$this->db->select('usulan.*,setting_penilai.id_subevent, setting_penilai.id_usr');
		$this->db->from('usulan');
		$this->db->join('setting_penilai','setting_penilai.id_subevent = usulan.id_subevent');
		$this->db->where('id_usr', $iduser);
		$this->db->where('tahun', $cari_verifikasi);
		//$result = $this->db->where('id_subevent', $id_subevent);
		$query = $this->db->get();
        return $query->result();
	}

//Verifikasi ADMIN
	public function list_subevent() {
	    $this->db->select('*');
	    $this->db->from('subevent');
	    $query = $this->db->get();
	    return $query->result();
    }
	//tab view
	public function usulan_verifikasi(){

		$this->db->select('peserta.*,usulan.*');
		$this->db->from('peserta');
		$this->db->join('usulan','usulan.id = peserta.id_usulan');
		$this->db->where('status', '2');
		//$result = $this->db->where('id_subevent', $id_subevent);
		$query = $this->db->get();
        return $query->result();
	}

	public function usulan_verifikasi2(){

		$this->db->select('peserta.*,usulan.*');
		$this->db->from('peserta');
		$this->db->join('usulan','usulan.id = peserta.id_usulan');
		$this->db->where('status', '3');
		//$result = $this->db->where('id_subevent', $id_subevent);
		$query = $this->db->get();
        return $query->result();
	}

	public function usulan_nominator(){

		$this->db->select('peserta.*,nominator.*,usulan.*');
		$this->db->from('peserta');
		$this->db->join('nominator','nominator.id_usulan = peserta.id_usulan');
		$this->db->join('usulan','usulan.id = peserta.id_usulan');
		$this->db->where('nominator.status', 1);
		//$result = $this->db->where('id_subevent', $id_subevent);
		$query = $this->db->get();
        return $query->result();
	}
	public function usulan_nominator2(){

		$this->db->select('peserta.*,nominator.*,usulan.*');
		$this->db->from('peserta');
		$this->db->join('nominator','nominator.id_usulan = peserta.id_usulan');
		$this->db->join('usulan','usulan.id = peserta.id_usulan');
		//$result = $this->db->where('id_subevent', $id_subevent);
		$query = $this->db->get();
        return $query->result();
	}

	public function cari_umum($cari){

		$this->db->select('peserta.*,usulan.*');
		$this->db->from('peserta');
		$this->db->join('usulan','usulan.id = peserta.id_usulan');
		$this->db->where('kategori_peserta', 'umum');
		$this->db->where('status', '2');
		$this->db->where('tahun', $cari);
		//$result = $this->db->where('id_subevent', $id_subevent);
		$query = $this->db->get();
        return $query->result();
	}

	public function usulan_pelajar(){

		$this->db->select('peserta.*,usulan.*');
		$this->db->from('peserta');
		$this->db->join('usulan','usulan.id = peserta.id_usulan');
		$this->db->where('kategori_peserta', 'pelajar');
		$this->db->where('status', '2');
	//$this->db->order_by('usulan.id', 'DESC');
		//$result = $this->db->where('id_subevent', $id_subevent);
		$query = $this->db->get();
        return $query->result();
	}

	public function usulan_umum(){

		$this->db->select('peserta.*,usulan.*');
		$this->db->from('peserta');
		$this->db->join('usulan','usulan.id = peserta.id_usulan');
		$this->db->where('kategori_peserta', 'umum');
		$this->db->where('status', '2');
		//$result = $this->db->where('id_subevent', $id_subevent);
		$query = $this->db->get();
        return $query->result();
	}

	

	public function usulan_pelajar2(){

		$this->db->select('peserta.*,usulan.*');
		$this->db->select('SUM(total_nilai.nilai_verifikasi) as tot');
		$this->db->from('usulan');
		$this->db->join('peserta',' peserta.id_usulan = usulan.id');
		$this->db->join('total_nilai',' total_nilai.id_usulan = usulan.id');
		$this->db->where('kategori_peserta', 'pelajar');
		$this->db->where('status', '2');
	//$this->db->order_by('usulan.id', 'DESC');
		//$result = $this->db->where('id_subevent', $id_subevent);
		$query = $this->db->get();
        return $query->result();
	}

	// public function cari_pelajar($cari2){

	// 	$this->db->select('peserta.*,usulan.*,SUM(total_nilai.nilai_verifikasi) as tot');
	// 	$this->db->from('peserta');
	// 	$this->db->join('usulan','usulan.id = peserta.id_usulan');
	// 	$this->db->where('kategori_peserta', 'pelajar');
	// 	$this->db->where('status', '2');
	// 	$this->db->where('tahun', $cari2);
	// 	//$result = $this->db->where('id_subevent', $id_subevent);
	// 	$query = $this->db->get();
 //        return $query->result();
	// }

	//-------------------------
	public function k_umum()
	{	$um = 'umum';
		$this->db->select('id, kategori_peserta, id_usulan');			
	    $this->db->from('peserta');
	    $this->db->where('kategori_peserta', 'umum');
	    $query = $this->db->get();
	    return $query->result();
	}

	public function usulan()
	{
		$this->db->select('id, user, judul');
	    $this->db->from('usulan');
	   // $this->db->where('id', $id_usulan);
	    $query = $this->db->get();
	    return $query->result();
	}

	public function tot_nilai_verifikasi($id_usulan)
	{
		$this->db->select('id, id_usulan, nilai_verifikasi');
	    $this->db->from('total_nilai');
	    $this->db->where('id_usulan', $id_usulan);
	    $query = $this->db->get();
	    return $query->result();
	}

	public function tot_nilai_nominator($id_usulan)
	{
		$this->db->select('id_total_nilai_pemenang, id_usulan, nilai_nominator');
	    $this->db->from('total_nilai_pemenang');
	    $this->db->where('id_usulan', $id_usulan);
	    $query = $this->db->get();
	    return $query->result();
	}
	public function total($id_usulan)
	{
		$ss = $this->db->select('SUM(nilai_verifikasi) as tot');
	    $this->db->from('total_nilai');
	   // $this->db->order_by('tot', 'DESC');				
	    $this->db->where('id_usulan', $id_usulan);
	   // $this->db->order_by('tot', 'DESC');
	    $query = $this->db->get();
	    return $query->row();
	}
	public function total2($id_usulan)
	{
		$ss = $this->db->select('SUM(nilai_nominator) as tot');
	    $this->db->from('total_nilai_pemenang');
	   // $this->db->order_by('tot', 'DESC');				
	    $this->db->where('id_usulan', $id_usulan);
	   // $this->db->order_by('tot', 'DESC');
	    $query = $this->db->get();
	    return $query->row();
	}
	 public function hitung_total_verif($id_usulan)
	 {
	 	$this->db->select('usulan_id, id_penilai, SUM(nilai) as nilai_verifikasi ');
	 	$this->db->from('penilaian_usulan');
	 	$this->db->where('usulan_id', $id_usulan);
	 	$this->db->group_by('id_penilai');
	 	$query = $this->db->get();
	    return $query->result();
	 }

	 public function nilai_proposal($id_usulan){
	 	$this->db->select('id_usulan, id_penilai, nilai_proposal ');
	 	$this->db->from('penilaian_proposal');
	 	$this->db->where('id_usulan', $id_usulan);
	 	$this->db->order_by('id_penilai', 'ASC');
	 	$query = $this->db->get();
	    return $query->result();
	 }

	 public function gabung($id_usulan){
	 	$this->db->select('penilaian_usulan.usulan_id, penilaian_usulan.id_penilai, nilai');
	 	$this->db->select('penilaian_proposal.nilai_proposal, penilaian_proposal.id_usulan, penilaian_proposal.id_penilai as penilai');
	 	$this->db->from('penilaian_proposal');
	 	$this->db->join('penilaian_usulan','penilaian_proposal.id_usulan = penilaian_usulan.usulan_id');
	 	$this->db->where("penilaian_usulan.usulan_id", $id_usulan);
	 	$this->db->group_by('id_penilai');
	 	 //$this->db->group_by('penilaian_proposal.id_penilai');
	 	$query = $this->db->get();
	    return $query->result();
	 }
	// public function penilaian_usulan()
	// {
	// 	$this->db->select('usulan_id, id_penilai');
	// 	$this->db->select_sum('nilai');
	//     $this->db->from('penilaian_usulan');
	//     //$this->db->where('id_penilai', $id);
	//     $query = $this->db->get();
	//     return $query->result();
	// }

	// public function penilaian_proposal()
	// {
	// 	$this->db->select('id_usulan, id_penilai, nilai_proposal');
	//     $this->db->from('penilaian_proposal');
	//    // $this->db->where('id_subevent', $id_subevent);
	//     $query = $this->db->get();
	//     return $query->result();
	// }

	// public function nilaii()
	// {

 //        $this->db->select('usulan_id, penilaian_proposal.id_penilai, nilai_proposal');
 //        $this->db->select_sum('nilai');
	// 	$this->db->from('penilaian_usulan');
	// 	$this->db->join('penilaian_proposal', 'penilaian_proposal.id_penilai = penilaian_usulan.id_penilai');
	// 	//$this->db->where('keterangan_indikator.id_indikator_penilaian', $id_indikator);
	// 	$query = $this->db->get();
 //        return $query->result();
 //    }
	
	public function tambah_verifikasi($data,$table){
		$this->db->insert_batch($table,$data);
	}


	public function update_usulan($where,$data2,$table){
		$this->db->where($where);
		$this->db->update($table,$data2);
	}
	public function tim_penilai(){
		$this->db->select('user.*,setting_penilai.*');
		$this->db->from('user');
		$this->db->join('setting_penilai','setting_penilai.id_usr = user.id_usr');
		$this->db->where('setting_penilai.id_subevent', 40);
		//$result = $this->db->where('id_subevent', $id_subevent);
		$query = $this->db->get();
        return $query->result();
	}
}

?> 