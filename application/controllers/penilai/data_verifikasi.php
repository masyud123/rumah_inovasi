<?php

class Data_verifikasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('hak_akses') != 'Penilai') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  Anda belum Login, silahkan login!
														 </div>');
			redirect('login');
		}
	}

	public function index()
	{
		$sbevent 	= $this->model_verifikasi->ambil_id_subevent();
		$data['usulan'] = $this->model_verifikasi->ambil_usulan($sbevent->id_subevent);
		$data['jumlah_usulan'] = $this->model_verifikasi->jumlah_usulan($sbevent->id_subevent);
		$data['jumlah_usulan2'] = $this->model_verifikasi->jumlah_usulan2();
		$data['ganti_warna'] 	= $this->model_verifikasi->ganti_warna();
		//$jumlah = $this->model_verifikasi->jumlah_usulan();
		$this->load->view('templates_penilai/header');
		$this->load->view('templates_penilai/sidebar', $data);
		$this->load->view('penilai/verifikasi', $data);
		$this->load->view('templates_penilai/footer');
		// echo "<pre>";
	 //    print_r($data);exit;
	}

	// public function cari_verifikasi()
	// {
	// 	$cari_verifikasi = $this->input->post('cari_verifikasi');
	// 	$data['usulan'] = $this->model_verifikasi->cari_tahun($cari_verifikasi);
	// 	$sbevent 	= $this->model_verifikasi->ambil_id_subevent();
	// 	$data['jumlah_usulan'] = $this->model_verifikasi->jumlah_usulan($sbevent->id_subevent);
	// 	$data['jumlah_usulan2'] = $this->model_verifikasi->jumlah_usulan2();
	// 	$this->load->view('templates_penilai/header');
	// 	$this->load->view('templates_penilai/sidebar', $data);
	// 	$this->load->view('penilai/verifikasi', $data);
	// 	$this->load->view('templates_penilai/footer');
		// echo "<pre>";
	 //    print_r($data);exit;
	//}

	public function view($id)
	{
		$where = array('id' => $id);
		$data['usulan'] = $this->model_usulan->edit_riwayat($where, 'usulan')->result();
		$this->load->view('templates_penilai/header');
		$this->load->view('templates_penilai/sidebar2');
		$this->load->view('penilai/view_usulan_verifikasi', $data);
		$this->load->view('templates_penilai/footer');
	}

	public function nilai_verifikasi($id)
	{
	
		$data['usulan']    = $this->model_penilaian->ambil_id_usulan($id);
		$subevent 	       = $this->model_penilaian->ambil_id_subevent2($id);
		
		$ket               = $this->model_penilaian->ambil_keterangan(1);
		$indikator         = $this->model_penilaian->ambil_id_indikator($subevent->id_subevent); //error
		

		//NILAI MAKSIMAL
		$data['id_ind'] 				= $this->model_penilaian->id_ind($subevent->id_subevent);
		for ($i=0; $i < count($data['id_ind']) ; $i++) {
			$data['keterangan'][$i] 				= $this->model_penilaian->ambil_keterangan($data['id_ind'][$i]->id_indikator_penilaian);
		}
			$nilai=[];
		for ($i=0; $i < count($data['keterangan']); $i++) { 
			 foreach ($data['keterangan'][$i] as $key3 => $vale): 
		      $nilai[$i][]= $vale->nilai_maksimal_keterangan;
		      endforeach;
		}

		foreach ($data['keterangan'] as $key => $value) {
			for ($i=0; $i < count($data['keterangan']); $i++) { 
				$data['keterangan'][$key]['nilai'] = end($nilai[$key]);
			}
		}
		// echo "<pre>";
		// print_r($data['keterangan']);exit;

		
		//INDIKATOR & KETERANGAN
		$var = [];
		foreach ($indikator as $idk){
			$var[] = [
				'id' => $idk->id_indikator_penilaian,
				'label_indikator' => $idk->indikator,
				'ket' => $this->model_penilaian->ambil_keterangan($idk->id_indikator_penilaian),
			];
		}
		$data['indikator_keterangan'] = $var;
			// echo "<pre>";
			// print_r($var);exit;

		$this->load->view('templates_penilai/header');
		$this->load->view('templates_penilai/sidebar2');
		$this->load->view('penilai/nilai_verifikasi', $data);
		$this->load->view('templates_penilai/footer');
	}

	
	public function simpan()
	{
		// $nilai=implode(',',$this->input->post('nilai'));
		// $data = array(
	 //    'nilai' => $nilai

		//NILAI PROPOSAL
		$nilai_proposal 	= $this->input->post('nilai_proposal');
		$id_usulan		    = $this->input->post('id_usulan');
		$user_ids		    = $this->session->userdata('id_usr');
		$data1 = array(
			'nilai_proposal'      => $nilai_proposal,
			'id_usulan'  => $id_usulan, 
			'id_penilai' => $user_ids,
		);
		$this->model_penilaian->simpan_nilai_proposal($data1, 'penilaian_proposal');


		//TOTAL NILAI
		$nilai_verifikasi = $this->input->post('nilai_verifikasi');
		$id_usulan        = $this->input->post('id_usulan');
		$created_byy			= $this->session->userdata('nama');
		$data2 = array(
			'nilai_verifikasi'  => $nilai_verifikasi,
			'id_usulan'         => $id_usulan, 
			'created_date'      => date('Y-m-d H:i:s'),
			'created_by'        => $created_byy,
		);
		$this->model_penilaian->simpan_total_nilai($data2, 'total_nilai');

		//PENILAIAN USULAN
		$created_by			= $this->session->userdata('nama');
		$user_id			= $this->session->userdata('id_usr');
		$usulan_id		= $this->input->post('usulan_id');
		$data = array();
		foreach ($_POST['nilai'] as $key => $val) {
			$data[] = array( 				
				'nilai' => $_POST['nilai'][$key],
				'id_indikator' => $_POST['indikator'][$key],
				'id_penilai' => $user_id,
				'usulan_id' => $usulan_id,
				'created_date' => date('Y-m-d H:i:s'),
				'created_by'  => $created_by
			);		
		}		
		$this->db->insert_batch('penilaian_usulan',$data);

		//$this->model_penilaian->simpan_nominator($data, 'penilaian_pemenang');
		// $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
  // 				Data berhasil ditambahkan!
		//   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		//     <span aria-hidden="true">&times;</span>
		//   </button>
		// </div>');
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" style="width: 70%;" role="alert"><i class="fas fa-check-circle"></i>
  				Data berhasil Disimpan!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('penilai/data_verifikasi');
	}
}
