<?php 

class Model_login extends CI_Model{

	public function cek_login(){
		$email = set_value('email');
		$password = set_value('password');
		$data = mysqli_fetch_assoc($result);

		$this->input->post('email',$email);
		$this->input->post('password',$password);
		$where = array(
			'email' => $email,
			'password' => md5($password));
		
		$result = $this->db->get_where('user',$where);
		if($result->num_rows() > 0)
		{
			return $result->row();
		}else {
			return array();
		}
	}
}