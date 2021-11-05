<?php 

class Data_nominator extends CI_Controller{

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
		$this->load->view('admin/nominator', $data);
		$this->load->view('templates_admin/footer');
	}

	public function detail_nominator($id_subevent)
	{
		// $data['list_nominator'] = $this->model_nominator->list_nama_nominator();
		$data['subevent'] = $this->model_nominator->ambil_id_subevent($id_subevent);
		$data['indikator_penilaian_pemenang'] = $this->model_nominator->ambil_id_nominator($id_subevent);
		
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_nominator', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_nominator()
	{
		$id_subevent			= $this->input->post('id_subevent');
		$komponen				= $this->input->post('komponen');
		$note					= $this->input->post('note');
		$nilai_komponen_min		= $this->input->post('nilai_komponen_min');
		$nilai_komponen_max		= $this->input->post('nilai_komponen_max');


		$data = array(
			'id_subevent' 			=> $id_subevent, 
			'komponen' 				=> $komponen,
			'note' 					=> $note,
			'nilai_komponen_min' 	=> $nilai_komponen_min,
			'nilai_komponen_max' 	=> $nilai_komponen_max,
		);

		$this->model_nominator->tambah_nominator($data, 'indikator_penilaian_pemenang');
		$this->session->set_flashdata('message3','<div class="alert alert-success alert-dismissible fade show" style="width: 80%;" role="alert"><i class="fas fa-check-circle"></i>
  				Data berhasil ditambahkan!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		$data['subevent'] = $this->model_nominator->ambil_id_subevent($id_subevent);
		$data['indikator_penilaian_pemenang'] = $this->model_nominator->ambil_id_nominator($id_subevent);
		
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_nominator', $data);
		$this->load->view('templates_admin/footer');
	}

	public function hapus ($id)
	{
		$where = array('id' => $id);
		$this->model_nominator->hapus_nominator($where, 'indikator_penilaian_pemenang');
		redirect('admin/data_nominator');
	}

	
}

?>