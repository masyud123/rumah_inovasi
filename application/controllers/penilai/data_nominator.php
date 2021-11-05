<?php

class Data_nominator extends CI_Controller
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
		$data['usulan'] = $this->model_verifikasi->ambil_usulan_nominator($sbevent->id_subevent);
		$data['jumlah_usulan'] = $this->model_verifikasi->jumlah_usulan($sbevent->id_subevent);
		$data['jumlah_usulan2'] = $this->model_verifikasi->jumlah_usulan2();
		$data['ganti_warna2'] 	= $this->model_verifikasi->ganti_warna2();
		// $data['ganti_warna'] 	= $this->model_verifikasi->ganti_warna();
		//$jumlah = $this->model_verifikasi->jumlah_usulan();
		$this->load->view('templates_penilai/header');
		$this->load->view('templates_penilai/sidebar', $data);
		$this->load->view('penilai/nominator', $data);
		$this->load->view('templates_penilai/footer');
		// echo "<pre>";
	 //    print_r($data);exit;
	}

	public function view($id)
	{
		$where = array('id' => $id);
		$data['usulan'] = $this->model_usulan->edit_riwayat($where, 'usulan')->result();
		$this->load->view('templates_penilai/header');
		$this->load->view('templates_penilai/sidebar2');
		$this->load->view('penilai/view_usulan_nominator', $data);
		$this->load->view('templates_penilai/footer');
	}

	public function nilai_nominator($id)
	{
		$data['usulan']    = $this->model_penilaian->ambil_id_usulan($id);
		$subevent 	       = $this->model_penilaian->ambil_id_subevent2($id);
		$data['komponen']         = $this->model_penilaian->ambil_komponen($subevent->id_subevent);
		$data['lihat']     = $this->model_verifikasi->ambil_usulan_nominator($subevent->id_subevent);
		$this->load->view('templates_penilai/header');
		$this->load->view('templates_penilai/sidebar2');
		$this->load->view('penilai/nilai_nominator', $data);
		$this->load->view('templates_penilai/footer');

		// echo "<pre>";
		// print_r($data);exit;
	}

	public function simpan()
	{

		//Total Nilai Nominator
		$nilai_nominator 	= $this->input->post('nilai_nominator');
		$id_usulan        	= $this->input->post('id_usulan');
		$created_byy		= $this->session->userdata('nama');
		$penilai		= $this->session->userdata('id_usr');
		$data = array(
			'nilai_nominator'   => $nilai_nominator,
			'id_usulan'         => $id_usulan,
			'id_penilai' 		=> $penilai,
			'created_date'      => date('Y-m-d H:i:s'),
			'created_by'        => $created_byy,
		);
		$this->model_penilaian->simpan_total_nilai2($data, 'total_nilai_pemenang');


		$created_by	    = $this->session->userdata('nama');
		$userid			= $this->session->userdata('id_usr');
		$id_usulan 			= $this->input->post('id_usulan');
		$data = array();
		foreach ($_POST['nilai'] as $key => $val) {
			$data[] = array( 				
				'nilai' => $_POST['nilai'][$key],
				'id_indikator' => $_POST['indikator'][$key],
				'id_usulan'		=> $id_usulan,
				'id_penilai' => $userid,
				'created_date' => date('Y-m-d H:i:s'),
				'created_by'  => $created_by
			);		
		}		
		$this->db->insert_batch('penilaian_pemenang',$data);

		$this->session->set_flashdata('messagee','<div class="alert alert-success alert-dismissible fade show" style="width: 79%;" role="alert"><i class="fas fa-check-circle"></i>
  				Data berhasil Disimpan!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('penilai/data_nominator');
	}


}