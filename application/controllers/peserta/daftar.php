<?php 

class Daftar extends CI_Controller{
	
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
		$data['event']	= $this->model_bidang->tampil_event()->result();
		$this->load->view('templates_peserta/header');
		$this->load->view('templates_peserta/sidebar');
		$this->load->view('peserta/daftar', $data);
		$this->load->view('templates_peserta/footer');
	}

	public function subevent($id)
	{
	
		$data['subevent']	= $this->model_bidang->tampil_sub($id)->result();
		$this->load->view('templates_peserta/header');
		$this->load->view('templates_peserta/sidebar');
		$this->load->view('peserta/subevent', $data);
		$this->load->view('templates_peserta/footer');
		// echo "<pre>";
		// print_r($data);exit;
	}

	public function daftar($id_subevent)
	{
		$data['list_bidang'] = $this->model_bidang->tampil_bidang()->result();
		$data['subevent']	= $this->model_bidang->tampil_subevent($id_subevent);
		$this->load->view('templates_peserta/header');
		$this->load->view('templates_peserta/sidebar');
		$this->load->view('peserta/form_wizard', $data);
		$this->load->view('templates_peserta/footer');
	}

}
