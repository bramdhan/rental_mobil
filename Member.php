<?php
defined('BASEPATH') or exit ('NO Direct Script Acces Allowed');

class Member extends CI_Controller{
	function __construct(){
		parent::__construct();
		// cek login
		if($this->session->userdata('status') != "login"){
			$alert=$this->session->set_flashdata('alert', 'Anda belum Login');
			redirect(base_url());
		}
	}

	function index(){
		$data['customer'] = $this->m_rental->get_data('customer')->result();
		$data['mobil'] = $this->m_rental->get_data('mobil')->result();
        $data['header'] = 'Katalog Mobil';
		$this->load->view('daftarmobil', $data);
    }
}
