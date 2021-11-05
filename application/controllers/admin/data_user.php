<?php 

class Data_user extends CI_Controller{

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
		$data['user'] = $this->model_user->tampil_user()->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/user',$data);
		$this->load->view('templates_admin/footer');
	}

	public function edit($id)
	{ 
		$where = array('id_usr' =>$id);
		$data['user'] = $this->model_user->edit_user($where, 'user')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_user', $data);
		$this->load->view('templates_admin/footer');

	}

	public function update(){ 
		$id 	 		= $this->input->post('id_usr');
		$nama 			= $this->input->post('nama');
		$email 			= $this->input->post('email');
		$password		= $this->input->post('password_baru');
		$satuan_kerja 	= $this->input->post('satuan_kerja');
		$kecamatan 		= $this->input->post('kecamatan');
		$hak_akses		= $this->input->post('hak_akses');
		$status			= $this->input->post('status');
		$pwd_baru 		= md5($password);

		if ($password == null){
			$data = array(
				'nama' 			=> $nama, 
				'email' 		=> $email,
				'satuan_kerja' 	=> $satuan_kerja,
				'kecamatan' 	=> $kecamatan, 
				'hak_akses' 	=> $hak_akses,
				'status' 		=> $status,
			);
		}else{
			$pasword_lama = $this->db->query("SELECT password FROM user where id_usr='$id'")->result_array();
			foreach($pasword_lama as $pwd_lama);
			if ($pwd_baru == $pwd_lama['password']) {
				$this->session->set_flashdata('pesan', 
		            '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
		            <script type ="text/JavaScript">  
		            swal("Peringatan","Coba gunakan password lain","warning")  
		            </script>'  
		        );
		        redirect(base_url('admin/data_user/edit/'.$id));
			}else{
				$data = array(
					'nama' 			=> $nama, 
					'email' 		=> $email,
					'password'		=> $pwd_baru,
					'satuan_kerja' 	=> $satuan_kerja,
					'kecamatan' 	=> $kecamatan, 
					'hak_akses' 	=> $hak_akses,
					'status' 		=> $status,
				);
			}
		}

		$where = array(
			'id_usr' => $id 
		);

		$this->db->update('user', $data, $where);
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" style="width: 90%;" role="alert"><i class="fas fa-check-circle"></i>
  				Data berhasil diupdate!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('admin/data_user/index'); 
	}

	public function hapus ()
	{
		$id_usr = $this->input->post('id_usr');

		$sql1 = $this->db->query("SELECT id_penilai FROM penilaian_proposal where id_penilai='$id_usr'");
		$sql2 = $this->db->query("SELECT id_usr FROM peserta where id_usr='$id_usr'");
			$cek_data1 = $sql1->num_rows();
			$cek_data2 = $sql2->num_rows();
	        if ($cek_data1 > 0 || $cek_data2 > 0) {
		        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" style="width:80%;" role="alert"><i class="fas fa-info-circle"></i>
		                      User tidak bisa dihapus karena sudah melakukan penilaian atau sudah mengajukan usulan!
		                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                        <span aria-hidden="true">&times;</span>
		                      </button>
		                    </div>');
		        header('Location: ' . $_SERVER['HTTP_REFERER']);
		    }else{
		        $where = array('id_usr' => $id_usr);
		        $this->db->delete('user', $where);
						$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" style="width: 80%;" role="alert"><i class="fas fa-trash-alt"></i>
									User berhasil dihapus!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
				header('Location: ' . $_SERVER['HTTP_REFERER']);
		    }
	}

	public function tambah_user()
	{
		$nama			= $this->input->post('nama');
		$email			= $this->input->post('email');
		$password		= md5($this->input->post('password'));
		$satuan_kerja	= $this->input->post('satuan_kerja');
		$kecamatan		= $this->input->post('kecamatan');
		$hak_akses		= $this->input->post('hak_akses');
		$role 			= $this->input->post('role');

		$data = array(
			'nama' 			=> $nama, 
			'email' 		=> $email,
			'password' 		=> $password, 
			'satuan_kerja' 	=> $satuan_kerja,
			'kecamatan' 	=> $kecamatan, 
			'hak_akses' 	=> $hak_akses,
			'status'		=> Aktif,
			
		);

		$this->model_user->tambah_user($data, 'user');
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" style="width: 90%;" role="alert"><i class="fas fa-check-circle"></i>
  				Data berhasil ditambahkan!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('admin/data_user/');
	}
} 