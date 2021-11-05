<?php 

class Data_inovasi extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('hak_akses') != 'Admin_Bappeda'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show"  role="alert">
														  Anda belum Login, silahkan login!
														 </div>');
			redirect('login');
		}
	}

	public function index()
	{
		$data['subevent'] = $this->model_subevent->tampil_subevent()->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/inovasi', $data);
		$this->load->view('templates_admin/footer');
	}

	public function detail_inovasi($id_subevent)
	{
		// $data['list_nominator'] = $this->model_nominator->list_nama_nominator();
		$data['subevent'] = $this->model_inovasi->ambil_id_subevent($id_subevent);
		$data['indikator_penilaian'] = $this->model_inovasi->ambil_id_inovasi($id_subevent);
		
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_inovasi', $data);
		$this->load->view('templates_admin/footer');
	}

	public function detail_indikator($id_indikator_penilaian)
	{
		// $data['list_nominator'] = $this->model_nominator->list_nama_nominator();
		$data['indikator_penilaian'] = $this->model_inovasi->ambil_id_indikator($id_indikator_penilaian);
		$data['keterangan_indikator'] = $this->model_inovasi->ambil_id_keterangan($id_indikator_penilaian);
		
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_indikator', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_keterangan()
	{
		$id_indikator_penilaian			= $this->input->post('id_indikator_penilaian');
		$keterangan						= $this->input->post('keterangan');
		$nilai_minimal_keterangan		= $this->input->post('nilai_minimal_keterangan');
		$nilai_maksimal_keterangan		= $this->input->post('nilai_maksimal_keterangan');


		$data = array(
			'id_indikator_penilaian' 		=> $id_indikator_penilaian, 
			'keterangan' 					=> $keterangan,
			'nilai_minimal_keterangan' 		=> $nilai_minimal_keterangan,
			'nilai_maksimal_keterangan' 	=> $nilai_maksimal_keterangan,
		);

		$this->model_inovasi->tambah_nominator($data, 'keterangan_indikator');
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" style="width: 55%;" role="alert"><i class="fas fa-check-circle"></i>
  				Data berhasil ditambahkan!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		$data['indikator_penilaian'] = $this->model_inovasi->ambil_id_indikator($id_indikator_penilaian);
		$data['keterangan_indikator'] = $this->model_inovasi->ambil_id_keterangan($id_indikator_penilaian);
		
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_indikator', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_inovasi()
	{
		$id_subevent			= $this->input->post('id_subevent');
		$indikator				= $this->input->post('indikator');
		

		$data = array(
			'id_subevent' 	=> $id_subevent, 
			'indikator' 	=> $indikator,
		);

		$this->model_inovasi->tambah_inovasi($data, 'indikator_penilaian');
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" style="width: 80%;" role="alert"><i class="fas fa-check-circle"></i>
  				Data berhasil ditambahkan!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	public function hapus($id_indikator_penilaian)
	{
		$where = array('id_indikator_penilaian' => $id_indikator_penilaian);
		$this->model_inovasi->hapus_indikator_inovasi($where, 'indikator_penilaian');
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fas fa-trash-alt"></i>
  				Data berhasil dihapus!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	public function hapus_keterangan($id_keterangan_indikator)
	{
		$where = array('id_keterangan_indikator' => $id_keterangan_indikator);
		$this->model_inovasi->hapus_keterangan($where, 'keterangan_indikator');
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fas fa-trash-alt"></i>
  				Data berhasil dihapus!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('admin/data_inovasi');
	}
}
?>