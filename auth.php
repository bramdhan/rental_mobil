<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{ 
	public function __construct()
	{
		parent::__construct();
			$this->load->library('form_validation');			
	}

	public function index()
	{
		$data['title'] = 'Login';
		$this->load->view('templates/login_header',$data);
		$this->load->view('login/v_login');
		$this->load->view('templates/login_footer');
	}

	public function registration()
	{
		$this->form_validation->set_rules('name', 'Nama','required|trim');
		$this->form_validation->set_rules('email', 'Email','required|trim|valid_email|is_unique[user.email]',['is_unique' => 'Email ini telah terdaftar!']);
		$this->form_validation->set_rules('password1', 'Password','required|trim|min_length[3]|matches[password2]',[
			'matches' => 'Password Dont Match!',
			'min_length' => 'Password is too short!']);
		$this->form_validation->set_rules('password2', 'Password','required|trim|matches[password1]');

		if($this->form_validation->run() == false) {

		$data['title'] = 'Registration';

		$this->load->view('templates/login_header', $data);
		$this->load->view('login/registration');
		$this->load->view('templates/login_footer');

	} else {
		$data =[
			'nama' => $this->input->post('name'),
			htmlspecialchars($this->input->post('name',true)),
			'email' => $this->input->post('email'),
			htmlspecialchars($this->input->post('email',true)),
			'image' => 'default.jpg',
			'pasword' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'role_id' => 2,
			'cek_aktif' => 1,
			'tgl_buat' => time()
		];
		
		
			$this->db->insert('user',$data);
			redirect('auth');

		}
	}
}