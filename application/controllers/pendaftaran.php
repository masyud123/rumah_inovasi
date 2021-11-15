<?php 
class Pendaftaran extends CI_Controller {

    public function index()
    {
        $this->form_validation->set_rules('nama','Nama','required', 
            ['required' => 'Nama wajib diisi!']);
        $this->form_validation->set_rules('email','Email','required', 
            ['required' => 'Email wajib diisi!']);
        $this->form_validation->set_rules('password_1','Password',
            'required|matches[password_2]',
            ['required' => 'Password wajib diisi!',
             'matches' => 'Password tidak cocok!']);
        $this->form_validation->set_rules('password_2','Password','required|matches[password_1]');

        $email = $this->input->post('email');
        $password = $this->input->post('password_1');
        $sql = $this->db->query("SELECT email,password FROM user where email='$email'");
        $cek_email = $sql->num_rows();
        if ($cek_email > 0) {
        $this->session->set_flashdata('pesan', 
            '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
            <script type ="text/JavaScript">  
            swal("Peringatan","Email sudah digunakan","warning")  
            </script>'  
        );
            redirect(site_url('pendaftaran'));
        }else{
        
                if($this->form_validation->run() == FALSE)
                {
                    $this->load->view('templates_admin/header');
                    $this->load->view('pendaftaran');
                    $this->load->view('templates_admin/footer');
                } else {    
                    $data = array (
                        'id_usr'    => '',
                        'nama'      => $this->input->post('nama'),
                        'email'     => $this->input->post('email'),
                        'password'  => md5($this->input->post('password_1')),
                        'hak_akses' => ('Peserta'),
                        'status'    => ('Aktif'),
                        
                    );

                    $this->db->insert('user',$data);
                    $this->session->set_flashdata('pesan',
                            '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Akun berhasil dibuat","success")  
                            </script>'  
                    );
                    redirect('pendaftaran');
                }
            }

         
    } 
}