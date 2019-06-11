<?php
defined('BASEPATH') or exit ('NO Direct Script Access Allowed');

class Mobil extends CI_Controller{
	function __construct(){
		parent::__construct();
		// cek login
		if($this->session->userdata('status') != "login"){
			$alert=$this->session->set_flashdata('alert', 'Anda belum Login');
			redirect(base_url());
		}
	}
	function index()
	{
		$this->load->view('desain');
		$this->load->view('toplayout');
		$this->load->view('detail_mobil', $data);
	}
	public function katalog_detail(){
		$id = $this->uri->segment(3);
		$mobil = $this->db->query("select*from mobil b, kategori k where b.id_mobil='$id' ")->result();

		foreach ($mobil as $fields) {
			$data['nama_mobil'] = $fields->nama_mobil;
			$data['merek'] = $fields->merek;
			$data['lokasi'] = $fields->lokasi;
			$data['harga_sewa'] = $fields->harga_sewa;
			$data['gambar'] = $fields->gambar;
			$data['id'] = $id;
			
		}
		$this->load->view('desain');
		$this->load->view('toplayout');
		$this->load->view('detail_mobil', $data);
	}
  }
