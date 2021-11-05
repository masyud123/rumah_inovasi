<?php 

class Riwayat extends CI_Controller{
	
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('hak_akses') != 'Peserta'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  Anda belum Login, silahkan login!
														 </div>');
			redirect('login');
		}
	}

	public function index()
	{
		$data['riwayat'] = $this->model_riwayat->tampil_riwayat();
		$this->load->view('templates_peserta/header');
		$this->load->view('templates_peserta/sidebar');
		$this->load->view('peserta/tampil_riwayat', $data);
		$this->load->view('templates_peserta/footer');
	}

	public	function update_status_usulan()
	{
		$id 	 		= $this->input->post('id');
		$status 		= $this->input->post('status');

		$data = array('status'		=>	$status);

		$where = array('id'	=>	$id);

		$this->model_riwayat->update_status_riwayat($where,$data, 'usulan');
		$this->session->set_flashdata('pesan1','<div class="alert alert-success alert-dismissible fade show" role="alert">
	                      Data berhasil dikirim
	                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                        <span aria-hidden="true">&times;</span>
	                      </button>
	                    </div><br>');
		redirect('peserta/riwayat/'); 
	}

	// public function detail_riwayat($id_peserta)
	// {
	// 	$data['detail_riwayat'] = $this->model_riwayat->tampil_detail_riwayat($id_peserta)->result_array();
	// 	$data['bidang_inovasi'] = $this->model_riwayat->tampil_bidang($id_peserta)->result_array();
	// 	$data['nama_anggota'] = $this->model_riwayat->tampil_anggota($id_peserta)->result_array();
	// 	$this->load->view('templates_peserta/header');
	// 	$this->load->view('templates_peserta/sidebar');
	// 	$this->load->view('peserta/edit_riwayat1', $data);
	// 	$this->load->view('templates_peserta/footer');
	// }

	// public function detail_riwayat2($id)
	// {
	// 	$data['detail_riwayat2'] = $this->model_riwayat->tampil_detail_riwayat2($id)->result_array();
	// 	$this->load->view('templates_peserta/header');
	// 	$this->load->view('templates_peserta/sidebar');
	// 	$this->load->view('peserta/edit_riwayat2', $data);
	// 	$this->load->view('templates_peserta/footer');
		
	// }

	// public function detail_riwayat3($id)
	// {
	// 	$data['detail_riwayat3'] = $this->model_riwayat->tampil_detail_riwayat2($id)->result_array();
	// 	$this->load->view('templates_peserta/header');
	// 	$this->load->view('templates_peserta/sidebar');
	// 	$this->load->view('peserta/edit_riwayat3', $data);
	// 	$this->load->view('templates_peserta/footer');
	// }

	public function edit_riwayat1($id_peserta)
	{
		$data['pilih_bidang'] = $this->model_riwayat->pilih_bidang()->result_array();
		$data['detail_riwayat'] = $this->model_riwayat->tampil_detail_riwayat($id_peserta)->result_array();
		$data['tampil_bidang'] = $this->model_riwayat->tampil_bidang($id_peserta)->result_array();
		$data['nama_anggota'] = $this->model_riwayat->tampil_anggota($id_peserta)->result_array();
		$this->load->view('templates_peserta/header');
		$this->load->view('templates_peserta/sidebar');
		$this->load->view('peserta/edit_riwayat1', $data);
		$this->load->view('templates_peserta/footer');
		//echo "<pre>"; print_r($data5);exit;
	}

	public function edit_riwayat2($id)
	{
		$data['detail_riwayat2'] = $this->model_riwayat->tampil_detail_riwayat2($id)->result_array();
		$this->load->view('templates_peserta/header');
		$this->load->view('templates_peserta/sidebar');
		$this->load->view('peserta/edit_riwayat2', $data);
		$this->load->view('templates_peserta/footer');
	}

	public function edit_riwayat3($id)
	{
		$data['detail_riwayat3'] = $this->model_riwayat->tampil_detail_riwayat2($id)->result_array();
		$this->load->view('templates_peserta/header');
		$this->load->view('templates_peserta/sidebar');
		$this->load->view('peserta/edit_riwayat3', $data);
		$this->load->view('templates_peserta/footer');
		// echo "<pre>";
		// print_r($data); exit;
	}
}	