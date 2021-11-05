<?php 

class Data_verifikasi extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('hak_akses') != 'Admin_Bappeda'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  Anda belum Login, silahkan login!
														 </div>');
			redirect('login');
		}
	}

	public function slolo()
	{
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/verifikasi');
		$this->load->view('templates_admin/footer');
	}

	public function umum()
	{

		$ket_nilai = $this->model_verifikasi->tot_nilai_verifikasi(2);
		$usulan = $this->model_verifikasi->usulan_umum();

		$var = [];
		foreach ($usulan as $usl){
			$var[] = [
				'id' => $usl->id,
				'user' => $usl->user,

				'judul' => $usl->judul,
				'tahun' => $usl->tahun,
				'nilai_verifikasi' => $this->model_verifikasi->tot_nilai_verifikasi($usl->id),
				'total' => $this->model_verifikasi->total($usl->id),
			];
		}
		$data['total_nilai'] = $var;

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/verifikasi_umum', $data);
		$this->load->view('templates_admin/footer');
			// echo "<pre>";
			// echo print_r($data);exit;
	}

	public function pelajar()
	{
		
		$ket_nilai = $this->model_verifikasi->tot_nilai_verifikasi(2);
		$usulan = $this->model_verifikasi->usulan_pelajar();
		
		$var = [];
		foreach ($usulan as $usl){
			$var[] = [
				'id' => $usl->id,
				'user' => $usl->user,
				'judul' => $usl->judul,
				//'tot' => $usl->tot,
				'nilai_verifikasi' => $this->model_verifikasi->tot_nilai_verifikasi($usl->id),
				'total' => $this->model_verifikasi->total($usl->id),
			];
		}
		$data['total_nilai'] = $var;

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/verifikasi_pelajar', $data);
		$this->load->view('templates_admin/footer');
		// echo "<pre>";
		// echo print_r($data);exit;
	}

	public function cari_umum(){

		$cari = $this->input->post('cari_umum');
		$ket_nilai = $this->model_verifikasi->tot_nilai_verifikasi(2);
		$usulan = $this->model_verifikasi->cari_umum($cari);

		$var = [];
		foreach ($usulan as $usl){
			$var[] = [
				'id' => $usl->id,
				'user' => $usl->user,
				'judul' => $usl->judul,
				'tahun' => $usl->tahun,
				'nilai_verifikasi' => $this->model_verifikasi->tot_nilai_verifikasi($usl->id),
				'total' => $this->model_verifikasi->total($usl->id),
			];
		}
		$data['total_nilai'] = $var;

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/verifikasi_umum', $data);
		$this->load->view('templates_admin/footer');
	}
      
	public function cari_pelajar(){

		$cari2 = $this->input->post('cari_pelajar');
		$ket_nilai = $this->model_verifikasi->tot_nilai_verifikasi(2);
		$usulan = $this->model_verifikasi->cari_pelajar($cari2);

		$var = [];
		foreach ($usulan as $usl){
			$var[] = [
				'id' => $usl->id,
				'user' => $usl->user,
				'judul' => $usl->judul,
				'tahun' => $usl->tahun,
				'nilai_verifikasi' => $this->model_verifikasi->tot_nilai_verifikasi($usl->id),
				'total' => $this->model_verifikasi->total($usl->id),
			];
		}
		$data['total_nilai'] = $var;
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/verifikasi_pelajar', $data);
		$this->load->view('templates_admin/footer');
	}

//TAB VIEW
	public function index()
	{
		$ket_nilai 				= $this->model_verifikasi->tot_nilai_verifikasi(2);
		$usulan 				= $this->model_verifikasi->usulan_verifikasi();
		$data['list_subevent'] 	= $this->model_verifikasi->list_subevent();
		$var = [];
		foreach ($usulan as $usl){
			$var[] = [
				'id' => $usl->id,
				'id_subevent' => $usl->id_subevent,
				'user' => $usl->user,
				'judul' => $usl->judul,
				'tahun' => $usl->tahun,
				'subevent' => $usl->subevent,
				'alamat_ketua' => $usl->alamat_ketua,
				'kategori_peserta' => $usl->kategori_peserta,
				'nilai_verifikasi' => $this->model_verifikasi->tot_nilai_verifikasi($usl->id),	
				// 'gabung' => $this->model_verifikasi->gabung($usl->id),
				// 'nilai_verifikasi' => $this->model_verifikasi->hitung_total_verif($usl->id),
				// 'nilai_proposal'   => $this->model_verifikasi->nilai_proposal($usl->id),	
				'total' => $this->model_verifikasi->total($usl->id)->tot,
			];
		}
		$data['total_nilai'] = $var;

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/verifikasi', $data);
		$this->load->view('templates_admin/footer');
			// echo "<pre>";
			// echo print_r($data);exit;
	}

	public function cetak_umum(){
		$this->load->library('dompdf_gen');

		$ket_nilai 				= $this->model_verifikasi->tot_nilai_verifikasi(2);
		$usulan 				= $this->model_verifikasi->usulan_verifikasi2();
		$data['list_subevent'] 	= $this->model_verifikasi->list_subevent();
		$var = [];
		foreach ($usulan as $usl){
			$var[] = [
				'id' => $usl->id,
				'user' => $usl->user,
				'judul' => $usl->judul,
				'tahun' => $usl->tahun,
				'subevent' => $usl->subevent,
				'alamat_ketua' => $usl->alamat_ketua,
				'kategori_peserta' => $usl->kategori_peserta,
				'nilai_verifikasi' => $this->model_verifikasi->tot_nilai_verifikasi($usl->id),	
				'total' => $this->model_verifikasi->total($usl->id)->tot,
			];
		}
		$data['total_nilai'] = $var;

		$this->load->view('laporan/laporan_verifikasi_umum', $data);

		$paper_size 	= 'F4';
		$orientation 	= 'portrait';
		$html 			= $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("cetak_verifikasi_umum.pdf", array('Attachment' =>0)); 

	}

	public function cetak_pelajar(){
		$this->load->library('dompdf_gen');

		$ket_nilai 				= $this->model_verifikasi->tot_nilai_verifikasi(2);
		$usulan 				= $this->model_verifikasi->usulan_verifikasi2();
		$data['list_subevent'] 	= $this->model_verifikasi->list_subevent();
		$data['tim_penilai']	= $this->model_verifikasi->tim_penilai();
		$var = [];
		foreach ($usulan as $usl){
			$var[] = [
				'id'               => $usl->id,
				'user'             => $usl->user, 
				'judul'            => $usl->judul,
				'tahun'            => $usl->tahun,
				'subevent'         => $usl->subevent,
				'alamat_ketua'     => $usl->alamat_ketua,
				'asal_sekolah'     => $usl->asal_sekolah,
				'kategori_peserta' => $usl->kategori_peserta,
				'nilai_verifikasi' => $this->model_verifikasi->tot_nilai_verifikasi($usl->id),	
				'total'            => $this->model_verifikasi->total($usl->id)->tot,
			];
		}
		$data['total_nilai'] = $var;

		$this->load->view('laporan/laporan_verifikasi_pelajar', $data);

		$paper_size 	= 'F4';
		$orientation 	= 'portrait';
		$html 			= $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("cetak_verifikasi_pelajar.pdf", array('Attachment' =>0)); 

	}	

	public function simpan_umum(){

		$created_by  = $this->session->userdata('nama');
		$data = array();
		foreach ($_POST['id_usulan'] as $key => $val) {
				$data[] = array( 				
					'id_usulan'	    => $_POST['id_usulan'][$key],
					'id_subevent'	=> $_POST['id_subevent'][$key],
					'status'	    => $_POST['sts1'],
					'tahun'	        => date('Y'),
					'created_date'  => date('Y-m-d H:i:s'),
					'created_by'    => $created_by
					);
			}
		$this->db->insert_batch('nominator', $data);

	
		$data2 = array();
		foreach ($_POST['id_usulan'] as $key => $val) {
				$data2[] = array( 				
					'id'	=> $_POST['id_usulan'][$key],
					'status'	=> $_POST['status1'],
					);
			}	
		$this->db->update_batch('usulan',$data2, 'id');

	}

	public function simpan_pelajar(){

		$created_by  = $this->session->userdata('nama');
		$data = array();
		foreach ($_POST['id_usulan2'] as $key => $val) {
				$data[] = array( 				
					'id_usulan'	=> $_POST['id_usulan2'][$key],
					'id_subevent'	=> $_POST['id_subevent2'][$key],
					'status'	=> $_POST['sts2'],
					'tahun'	=> date('Y'),
					'created_date'  => date('Y-m-d H:i:s'),
					'created_by'    => $created_by
					);
			}
		$this->db->insert_batch('nominator', $data);


		$data2 = array();
		foreach ($_POST['id_usulan2'] as $key => $val) {
				$data2[] = array( 				
					'id'	=> $_POST['id_usulan2'][$key],
					'status'	=> $_POST['status2'],
					);
			}	

		$this->db->update_batch('usulan',$data2, 'id');
	}
}

?>