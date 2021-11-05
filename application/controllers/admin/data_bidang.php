<?php 

class Data_bidang extends CI_Controller{
	
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
		$data['bidang'] = $this->model_bidang->tampil_data()->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/bidang', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_bidang()
	{
		$bidang		= $this->input->post('bidang');
	
		$data = array(
			'bidang' 		=> $bidang, 
		);

		$this->model_bidang->tambah_bidang($data, 'bidang');
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" style="width: 60%;" role="alert"><i class="fas fa-check-circle"></i>
  				Data berhasil ditambahkan!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('admin/data_bidang');
	}

	public function edit($id)
	{
		$where = array('id' =>$id);
		$data['bidang'] = $this->model_bidang->edit_bidang($where, 'bidang')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_bidang', $data);
		$this->load->view('templates_admin/footer');

	}

	public function update(){ 
		$id 	 		= $this->input->post('id');
		$bidang 		= $this->input->post('bidang');

		$data = array(
			'bidang' 		=> $bidang 
		);

		$where = array(
			'id' => $id 
		);

		$this->model_bidang->update_bidang($where,$data, 'bidang');
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" style="width: 60%;" role="alert"><i class="fas fa-check-circle"></i>
  				Data berhasil diupdate!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('admin/data_bidang'); 
	}

	public function hapus($id)
	{
		$where = array('id' => $id);
		$this->model_bidang->hapus_bidang($where, 'bidang');
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" style="width: 60%;" role="alert"><i class="fas fa-trash-alt"></i>
  				Data berhasil dihapus!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('admin/data_bidang');
	}
}
?>