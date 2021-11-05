<?php 

class Data_riwayat extends CI_Controller{

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
		$data['usulan'] = $this->model_usulan->tampil_data()->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/riwayat',$data);
		$this->load->view('templates_admin/footer');
	}	
	public function edit($id)
	{
		$where = array('id' =>$id);
		$data['usulan'] = $this->model_usulan->edit_riwayat($where, 'usulan')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_riwayat', $data);
		$this->load->view('templates_admin/footer');

	}

	public function view($id)
	{
		$where = array('id' =>$id);
		$data['usulan'] = $this->model_usulan->edit_riwayat($where, 'usulan')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/view_riwayat', $data);
		$this->load->view('templates_admin/footer');

	}

	public function update(){ 
		$id 	 		= $this->input->post('id');
		$status 			= $this->input->post('status');

		$data = array(
			'status' 		=> $status 
		);

		$where = array(
			'id' => $id 
		);

		$this->model_usulan->update_riwayat($where,$data, 'usulan');
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
  				Data berhasil diupdate!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('admin/data_riwayat'); 
	}

}
?>