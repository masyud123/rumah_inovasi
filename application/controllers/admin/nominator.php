<?php 

class Nominator extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('hak_akses') != 'Admin_Bappeda'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  Anda belum Login, silahkan login!
														 </div>');
			redirect('login');
		}
	}

	public function tes()
	{
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/penilaian_nominator');
		$this->load->view('templates_admin/footer');
	}

	public function index()
	{
		$ket_nilai 				= $this->model_verifikasi->tot_nilai_nominator(2);
		$usulan 				= $this->model_verifikasi->usulan_nominator();
		//$data['list_subevent'] 	= $this->model_verifikasi->list_subevent();
		$var = [];
		foreach ($usulan as $usl){
			$var[] = [
				'id_usulan' => $usl->id_usulan,
				'id_subevent' => $usl->id_subevent,
				'user' => $usl->user,
				'judul' => $usl->judul,
				'tahun' => $usl->tahun,
				'kategori_peserta' => $usl->kategori_peserta,
				'nilai_nominator' => $this->model_verifikasi->tot_nilai_nominator($usl->id_usulan),	
				// 'gabung' => $this->model_verifikasi->gabung($usl->id),
				// 'nilai_verifikasi' => $this->model_verifikasi->hitung_total_verif($usl->id),
				// 'nilai_proposal'   => $this->model_verifikasi->nilai_proposal($usl->id),	
				'total' => $this->model_verifikasi->total2($usl->id_usulan)->tot,
			];
		}
		$data['total_nilai'] = $var;

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/penilaian_nominator', $data);
		$this->load->view('templates_admin/footer');
			// echo "<pre>";
			// echo print_r($data);exit;
	}

	public function cetak_umum(){
		$this->load->library('dompdf_gen');

		$ket_nilai 				= $this->model_verifikasi->tot_nilai_nominator(2);
		$usulan 				= $this->model_verifikasi->usulan_nominator2();
		//$data['list_subevent'] 	= $this->model_verifikasi->list_subevent();
		$var = [];
		foreach ($usulan as $usl){
			$var[] = [
				'id_usulan' => $usl->id_usulan,
				'id_subevent' => $usl->id_subevent,
				'user' => $usl->user,
				'judul' => $usl->judul,
				'tahun' => $usl->tahun,
				'subevent' => $usl->subevent,
				'alamat_ketua' => $usl->alamat_ketua,
				'kategori_peserta' => $usl->kategori_peserta,
				'nilai_nominator' => $this->model_verifikasi->tot_nilai_nominator($usl->id_usulan),	
				// 'gabung' => $this->model_verifikasi->gabung($usl->id),
				// 'nilai_verifikasi' => $this->model_verifikasi->hitung_total_verif($usl->id),
				// 'nilai_proposal'   => $this->model_verifikasi->nilai_proposal($usl->id),	
				'total' => $this->model_verifikasi->total2($usl->id_usulan)->tot,
			];
		}
		$data['total_nilai'] = $var;

		$this->load->view('laporan/laporan_nominator_umum', $data);

		$paper_size 	= 'F4';
		$orientation 	= 'portrait';
		$html 			= $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("cetak_nominator_umum.pdf", array('Attachment' =>0)); 

	}

	public function cetak_pelajar(){
		$this->load->library('dompdf_gen');

		$ket_nilai 				= $this->model_verifikasi->tot_nilai_nominator(2);
		$usulan 				= $this->model_verifikasi->usulan_nominator2();
		$data['tim_penilai']	= $this->model_verifikasi->tim_penilai();
		//$data['list_subevent'] 	= $this->model_verifikasi->list_subevent();
		$var = [];
		foreach ($usulan as $usl){
			$var[] = [
				'id_usulan' => $usl->id_usulan,
				'id_subevent' => $usl->id_subevent,
				'user' => $usl->user,
				'judul' => $usl->judul,
				'tahun' => $usl->tahun,
				'subevent'         => $usl->subevent,
				'asal_sekolah'     => $usl->asal_sekolah,
				'kategori_peserta' => $usl->kategori_peserta,
				'nilai_nominator' => $this->model_verifikasi->tot_nilai_nominator($usl->id_usulan),	
				// 'gabung' => $this->model_verifikasi->gabung($usl->id),
				// 'nilai_verifikasi' => $this->model_verifikasi->hitung_total_verif($usl->id),
				// 'nilai_proposal'   => $this->model_verifikasi->nilai_proposal($usl->id),	
				'total' => $this->model_verifikasi->total2($usl->id_usulan)->tot,
			];
		}
		$data['total_nilai'] = $var;

		$this->load->view('laporan/laporan_nominator_pelajar', $data);

		$paper_size 	= 'F4';
		$orientation 	= 'portrait';
		$html 			= $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("cetak_nominator_pelajar.pdf", array('Attachment' =>0)); 

	}

	public function simpan_umum(){
		$created_by  = $this->session->userdata('nama');	
		$data = array();
		foreach ($_POST['id_usulan'] as $key => $val) {
				$data[] = array( 				
					'id_usulan' 	=> $_POST['id_usulan'][$key],
					'id_subevent'	=> $_POST['id_subevent'][$key],
					'pemenang'	    => $_POST['pemenang'][$key],
					'created_date'  => date('Y-m-d H:i:s'),
					'created_by'    => $created_by
					);
			}
		$this->db->insert_batch('berita_acara_pemenang', $data);

		$data = array();
		foreach ($_POST['id_usulan'] as $key => $val) {
				$data[] = array( 				
					'id_usulan'	=> $_POST['id_usulan'][$key],
					'status'	=> $_POST['status'],
					);
			}	
		$this->db->update_batch('nominator',$data, 'id_usulan');

	}

	public function simpan_pelajar(){	
		$created_by  = $this->session->userdata('nama');	
		$data = array();
		foreach ($_POST['id_usulan2'] as $key => $val) {
				$data[] = array( 				
					'id_usulan' 	=> $_POST['id_usulan2'][$key],
					'id_subevent'	=> $_POST['id_subevent2'][$key],
					'pemenang'	    => $_POST['pemenang2'][$key],
					'created_date'  => date('Y-m-d H:i:s'),
					'created_by'    => $created_by
					);
			}
		$this->db->insert_batch('berita_acara_pemenang', $data);

		$data2 = array();
		foreach ($_POST['id_usulan2'] as $key => $val) {
				$data2[] = array( 				
					'id_usulan'	=> $_POST['id_usulan2'][$key],
					'status'	=> $_POST['status2'],
					);
			}	
		$this->db->update_batch('nominator',$data2, 'id_usulan');

	}
}

?>