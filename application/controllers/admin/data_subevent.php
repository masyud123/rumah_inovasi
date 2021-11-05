<?php 

class Data_subevent extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('hak_akses') != 'Admin_Bappeda'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  Anda belum Login, silahkan login!
														 </div>');
			redirect('login');
		}
	}

	public function index()
	{
		//$data['event'] = $this->model_event->tampil_data()->result();
		// $data['subevent'] = $this->model_subevent->tampil_subevent()->result();
		$data['subevent']      = $this->model_subevent->view_subevent();
		$data['list_event']    = $this->model_subevent->list_nama_event();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/subevent',$data);
		$this->load->view('templates_admin/footer');
		// echo "<pre>";
		// print_r($data);exit;
	}	
 		

	public function edit($id)
	{ 
		$where = array('id' =>$id);
		$data['subevent'] = $this->model_subevent->edit_subevent($where, 'subevent')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_subevent', $data);
		$this->load->view('templates_admin/footer');

	}

	public function update(){ 
		$id 	 		= $this->input->post('id');
		$tahun 	 		= $this->input->post('tahun');
		// $event 			= $this->input->post('event');
		$subevent 		= $this->input->post('subevent');
		$bidang 		= $this->input->post('bidang');
		$mulai			= $this->input->post('mulai');
		$akhir 			= $this->input->post('akhir');
		

		$data = array(
			'tahun' 		=> $tahun,
			// 'event' 		=> $event, 
			'subevent' 		=> $subevent,
			'bidang' 		=> $bidang,
			'mulai' 		=> $mulai, 
			'akhir' 		=> $akhir,
			
		);

		$where = array(
			'id' => $id 
		);

		$this->model_subevent->update_subevent($where,$data, 'subevent');
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" style="width: 90%;" role="alert"><i class="fas fa-check-circle"></i>
  				Data berhasil diupdate!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('admin/data_subevent'); 
	}

	public function hapus($id)
	{
		$where = array('id' => $id);
		$this->model_subevent->hapus_subevent($where, 'subevent');
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" style="width: 90%;" role="alert"><i class="fas fa-trash-alt"></i>
  				Data berhasil dihapus!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('admin/data_subevent');
	}

	public function tambah_subevent()
	{
		$tahun 			= $this->input->post('tahun');
		$id_event		= $this->input->post('id_event');
		$subevent		= $this->input->post('subevent');
		$bidang			= $this->input->post('bidang');
		$mulai			= $this->input->post('mulai');
		$akhir			= $this->input->post('akhir');
		


		$data = array(
			'tahun'     => $tahun,
			'id_event' 	=> $id_event, 
			'subevent' 	=> $subevent,
			'bidang' 	=> $bidang,
			'mulai' 	=> $mulai, 
			'akhir' 	=> $akhir,
			
		);

		$this->model_subevent->tambah_subevent($data, 'subevent');
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" style="width: 90%;" role="alert"><i class="fas fa-check-circle"></i>
  				Data berhasil ditambahkan!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('admin/data_subevent');
	}
	
} 