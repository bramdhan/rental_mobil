<?php
defined('BASEPATH') or exit ('NO Direct Script Access Allowed');

class Admin extends CI_Controller{
	function __construct(){
		parent::__construct();
		// cek login
		if($this->session->userdata('status') != "login"){
			$alert=$this->session->set_flashdata('alert', 'Anda belum Login');
			redirect(base_url());
		}
	}

	function index(){
		$data['peminjaman'] = $this->db->query("select * from transaksi order by id_pinjam desc limit 10")->result();
		$data['customer'] = $this->db->query("select * from customer order by id_customer desc limit 10")->result();
		$data['mobil'] = $this->db->query("select * from mobil order by id_mobil desc limit 10")->result();

		$this->load->view('admin/header');
		$this->load->view('admin/index',$data);
		$this->load->view('admin/footer');
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'welcome?pesan=logout');
	}
	
	function ganti_password(){
		$this->load->view('admin/header');
		$this->load->view('admin/ganti_password');
		$this->load->view('admin/footer');
	}

	function ganti_password_act(){
		$pass_baru = $this->input->post('pass_baru');
		$ulang_pass = $this->input->post('ulang_pass');

		$this->form_validation->set_rules('pass_baru','Password Baru','required|matches[ulang_pass]');
		$this->form_validation->set_rules('ulang_pass','Ulangi Password Baru','required');
		if($this->form_validation->run() != false){
			$data = array('password' => md5($pass_baru));
			$w = array('id_admin' => $this->session->userdata('id'));
			$this->m_rental->update_data($w,$data,'admin');
			redirect(base_url().'admin/ganti_password?pesan=berhasil');
		}else{
			$this->load->view('admin/header');
			$this->load->view('admin/ganti_password');
			$this->load->view('admin/footer');
		}
	}

	function mobil(){
		$data['mobil'] = $this->m_rental->get_data('mobil')->result();
		$this->load->view('admin/header');
		$this->load->view('admin/mobil',$data);
		$this->load->view('admin/footer');
	}
	
	function tambah_mobil(){
		//memuat data kategori untuk ditampilkan di select form
		$data['kategori'] =$this->m_rental->get_data('kategori')->result();

		$this->load->view('admin/header');
		$this->load->view('admin/tambahmobil',$data);
		$this->load->view('admin/footer');
	}

	function tambah_mobil_act(){
		$tgl_input = date('Y-m-d');
		$id_kategori = $this->input->post('id_kategori');
		$nama = $this->input->post('nama_mobil');
		$merek = $this->input->post('merek');
		$jumlah_mobil = $this->input->post('jumlah_mobil');
		$lokasi = $this->input->post('lokasi');
		$harga_sewa = $this->input->post('harga_sewa');
		$status = $this->input->post('status');
		$this->form_validation->set_rules('id_kategori','Kategori','required');
		$this->form_validation->set_rules('nama_mobil','Nama Mobil','required');
		$this->form_validation->set_rules('harga_sewa','Harga Sewa','required');
		$this->form_validation->set_rules('status','Status Mobil','required');
		if($this->form_validation->run() != false){
			//configurasi upload gambar
			$config['upload_path'] = './assets/upload/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '2048';
			$config['file_name'] = 'gambar'.time();

			$this->load->library('upload', $config);

			if($this->upload->do_upload('foto')){
				$image=$this->upload->data();

				$data = array(
					'id_kategori' =>$id_kategori,
					'nama_mobil' => $nama,
					'merek' => $merek,
					'jumlah_mobil' => $jumlah_mobil,
					'lokasi' => $lokasi,
					'gambar' => $image['file_name'],
					'tgl_input' => $tgl_input,
					'status_mobil' => $status
				);
		
				$this->m_rental->insert_data($data,'mobil');
				redirect(base_url().'admin/mobil');
			}else{
				$this->session->set_flashdata('alert', 'Anda Belum Memilih Foto');
			}
		}else{
			$this->load->view('admin/header');
			$this->load->view('admin/tambahmobil');
			$this->load->view('admin/footer');
		}
	}

	function hapus_mobil($id){
        $where = array('id_mobil' => $id);
        $this->m_rental->delete_data($where,'mobil');
        redirect(base_url().'admin/mobil');
      }

	function edit_mobil($id){
		$where = array('id_mobil' => $id);
		$data['mobil'] = $this->db->query("select * from mobil B, kategori K where B.id_kategori=K.id_kategori and B.id_mobil='$id'")->result();
		$data['kategori'] =$this->m_rental->get_data('kategori')->result();
		
		$this->load->view('admin/header');
		$this->load->view('admin/editmobil',$data);
		$this->load->view('admin/footer');
	}

	function update_mobil(){
		$id = $this->input->post('id');
		$id_kategori = $this->input->post('id_kategori');
		$nama = $this->input->post('nama_mobil');
		$merek = $this->input->post('merek');
		$jumlah_mobil = $this->input->post('jumlah_mobil');
		$lokasi = $this->input->post('lokasi');
		$status = $this->input->post('status');
		$this->form_validation->set_rules('id_kategori', 'ID Kategori', 'required');
		$this->form_validation->set_rules('nama_mobil', 'Nama Mobil', 'required|min_length[4]');
		$this->form_validation->set_rules('merek', 'Merek', 'required|min_length[4]');
		$this->form_validation->set_rules('jumlah_mobil', 'Jumlah Mobil', 'required|numeric');
		$this->form_validation->set_rules('lokasi', 'Lokasi Mobil', 'required|min_length[4]');
		$this->form_validation->set_rules('status', 'Status Mobil', 'required');

		if($this->form_validation->run() != false){
			$config['upload_path'] = './assets/upload/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '2048';
			$config['file_name'] = 'gambar'.time();

			$this->load->library('upload', $config);

			$where = array('id_mobil' => $id);
			$data = array(
				'id_kategori' =>$id_kategori,
				'nama_mobil' => $nama,
				'merek' => $merek,
				'jumlah_mobil' => $jumlah_mobil,
				'lokasi' => $lokasi,
				'gambar' => $image['file_name'],
				'status_mobil' => $status
			);

			if($this->upload->do_upload('foto')){
			    //proses upload gambar
			  $image = $this->upload->data();
			  unlink('assets/upload/'.$this->input->post('old_pict', TRUE));
		      $data['gambar'] = $image['file_name'];

			  $this->m_rental->update_data($where, $data,'mobil');
			}else {
			  $this->m_rental->update_data($where, $data,'mobil');
			}

			$this->m_rental->update_data($where,$data,'mobil');
			redirect(base_url().'admin/mobil');
		}else{
			$where = array('id_mobil' => $id);
			$data['mobil'] = $this->db->query("select * from mobil B, kategori K where B.id_kategori=K.id_kategori and B.id_mobil='$id'")->result();
			$data['kategori'] =$this->m_rental->get_data('kategori')->result();
			
			$this->load->view('admin/header');
			$this->load->view('admin/editmobil',$data);
			$this->load->view('admin/footer');
		}
	}

	function customer(){
		$data['customer'] = $this->m_rental->get_data('customer')->result();
		$this->load->view('admin/header');
		$this->load->view('admin/data_customer',$data);
		$this->load->view('admin/footer');
	}

	function tambah_customer(){
		$this->load->view('admin/header');
		$this->load->view('admin/tambahcustomer');
		$this->load->view('admin/footer');
	}

	function tambah_customer_act(){
		$nama = $this->input->post('nama_customer');
		$password = $this->input->post('password');
		$repassword = $this->input->post('repassword');
		$gender = $this->input->post('gender');
		$notelp = $this->input->post('notelp');
		$alamat = $this->input->post('alamat');
		$email = $this->input->post('email');
		
		$this->form_validation->set_rules('nama_customer','Nama Customer','required');
		$this->form_validation->set_rules('email','Email','required');
		if($this->form_validation->run() != false){
			$data = array(
				'nama_customer' => $nama,
				'password' => $password,
				'gender' => $gender,
				'no_telp' => $notelp,
				'alamat' => $alamat,
				'email' => $email
			);
		
			$this->m_rental->insert_data($data,'customer');
			redirect(base_url().'admin/customer');
		}else{
			$this->load->view('admin/header');
			$this->load->view('admin/tambahcustomer');
			$this->load->view('admin/footer');
		}
	}

	function edit_customer($id){
		$where = array('id_customer' => $id);
		$data['customer'] = $this->m_rental->edit_data($where,'customer')->result();

		$this->load->view('admin/header');
		$this->load->view('admin/editcustomer',$data);
		$this->load->view('admin/footer');
	}

	function update_customer(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama_customer');
		$gender = $this->input->post('gender');
		$notelp = $this->input->post('notelp');
		$alamat = $this->input->post('alamat');
		$email = $this->input->post('email');
		$this->form_validation->set_rules('nama_customer','Nama Customer','required');
		$this->form_validation->set_rules('gender','Jenis Kelamin','required');
		$this->form_validation->set_rules('notelp','No Telp','numeric|required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('email','Email','required');
		if($this->form_validation->run() != false){
			$where = array('id_customer' => $id);
			$data = array(
				'nama_customer' => $nama,
				'gender' => $gender,
				'no_telp' => $notelp,
				'alamat' => $alamat,
				'email' => $email
			);
			$this->m_rental->update_data($where,$data,'customer');
			redirect(base_url().'admin/customer');
		}else{
			$where = array('id_customer' => $id);
			$data['mobil'] = $this->m_rental->edit_data($where,'customer')->result();
			$this->load->view('admin/header');
			$this->load->view('admin/editcustomer',$data);
			$this->load->view('admin/footer');
		}
	}

	function hapus_customer($id){
		$where = array('id_customer' => $id);
		$this->m_rental->delete_data($where,'customer');
		redirect(base_url().'admin/customer');
	}

	function peminjaman(){

		$data['peminjaman'] = $this->db->query("SELECT * FROM transaksi T, mobil B, customer A WHERE T.id_mobil=B.id_mobil and T.id_customer=A.id_customer")->result();
		
		$this->load->view('admin/header');
		$this->load->view('admin/peminjaman',$data);
		$this->load->view('admin/footer');
	}

	function tambah_peminjaman(){
		$w = array('status_mobil'=>'1');
		$data['mobil'] = $this->m_rental->edit_data($w,'mobil')->result();
		$data['customer'] = $this->m_rental->get_data('customer')->result();
		$data['peminjaman'] = $this->m_rental->get_data('transaksi')->result();

		$this->load->view('admin/header');
		$this->load->view('admin/tambah_peminjaman',$data);
		$this->load->view('admin/footer');
	}

	function tambah_peminjaman_act(){
		
		$tanggal_pencatatan = date('Y-m-d H:i:s');
		$customer = $this->input->post('customer');
		$mobil = $this->input->post('mobil');
		$tgl_pinjam = $this->input->post('tgl_pinjam');
		$tgl_kembali = $this->input->post('tgl_kembali');
		$denda = $this->input->post('denda');
		$this->form_validation->set_rules('customer','Customer','required');
		$this->form_validation->set_rules('mobil','Mobil','required');
		$this->form_validation->set_rules('tgl_pinjam','Tanggal Pinjam','required');
		$this->form_validation->set_rules('tgl_kembali','Tanggal Kembali','required');
		$this->form_validation->set_rules('denda','Denda','required');

		if($this->form_validation->run() != false){
			$data = array(
			'tgl_pencatatan' => $tanggal_pencatatan,
			'id_customer' => $customer,
			'id_mobil' => $mobil,
			'tgl_pinjam' => $tgl_pinjam,
			'tgl_kembali' => $tgl_kembali,
			'denda' => $denda,
			'tgl_pengembalian' => '0000-00-00',
			'total_denda' => '0',
			'status_pengembalian' => '0',
			'status_peminjaman' => '0'
			);

			$this->m_rental->insert_data($data,'transaksi');
			
			// update status buku yg di pinjam
			$d = array('status_mobil' => '0', 'tgl_input' => substr($tanggal_pencatatan, 0, 10));
			$w = array('id_mobil' => $mobil);
			$this->m_rental->update_data($w,$d,'mobil');
			
			redirect(base_url().'admin/peminjaman');
		}else{
			$w = array('status_mobil'=>'1');
			$data['mobil'] = $this->m_rental->edit_data($w,'mobil')->result();
			$data['customer'] = $this->m_rental->get_data('customer')->result();

			$this->load->view('admin/header');
			$this->load->view('admin/tambah_peminjaman',$data);
			$this->load->view('admin/footer');
		}
	}

	function checkout($id){
		$w=$this->input->post('id_customer');
		$data['mobil'] = $this->m_rental->get_data('mobil')->result();
		$data['customer'] = $this->m_rental->edit_data($w,'customer')->result();
		$data['peminjaman'] = $this->db->query("select * from transaksi t, customer a, mobil b  where t.id_mobil = b.id_mobil and t.id_customer=a.id_customer and t.id_pinjam='$id'")->result();

		$this->load->view('admin/header');
		$this->load->view('admin/checkout',$data);
		$this->load->view('admin/footer');
	}

	function hapus_peminjaman($id){
		$w = array('id_pinjam' => $id);
		$data = $this->m_rental->edit_data($w,'transaksi')->row();
		
		$ww = array('id_mobil' => $data->id_mobil);
		$data2 = array('status_mobil' => '1');
		$this->m_rental->update_data($ww,$data2,'mobil');
		$this->m_rental->delete_data($w,'transaksi');
		redirect(base_url().'admin/peminjaman');
	}

	function transaksi_selesai($id){
		$data['mobil'] = $this->m_rental->get_data('mobil')->result();
		$data['customer'] = $this->m_rental->get_data('customer')->result();
		$data['peminjaman'] = $this->db->query("select * from transaksi t, customer a, mobil b  where t.id_mobil = b.id_mobil and t.id_customer=a.id_customer and t.id_pinjam='$id'")->result();

		$this->load->view('admin/header');
		$this->load->view('admin/transaksi_selesai',$data);
		$this->load->view('admin/footer');
	}

	function transaksi_selesai_act(){
		$id = $this->input->post('id');
		$tgl_dikembalikan = $this->input->post('tgl_dikembalikan');
		$tgl_kembali = $this->input->post('tgl_kembali');
		$mobil = $this->input->post('mobil');
		$denda = $this->input->post('denda');
		$this->form_validation->set_rules('tgl_dikembalikan','Tanggal Di Kembalikan','required');
		if($this->form_validation->run() != false){
		// menghitung selisih hari 
			$batas_kembali = strtotime($tgl_kembali);
			$dikembalikan = strtotime($tgl_dikembalikan);
			$selisih = abs(($batas_kembali - $dikembalikan)/(60*60*24));
			$total_denda = $denda*$selisih;
			// update status peminjaman
			$data = array('status_peminjaman' => 'selesai', 'total_denda' => $total_denda,'tgl_pengembalian' => $tgl_dikembalikan,'status_pengembalian' => 'kembali');
			//$data3 = array();
			$w = array('id_pinjam' => $id);
			$this->m_rental->update_data($w,$data,'transaksi');
			
			$data2 = array('status_mobil' => '1');
			$w2 = array('id_mobil' => $mobil);
			$this->m_rental->update_data($w2,$data2,'mobil');

			redirect(base_url().'admin/peminjaman');
		}else{
			$data['mobil'] = $this->m_rental->get_data('mobil')->result();
			$data['customer'] = $this->m_rental->get_data('customer')->result();
			$data['peminjaman'] = $this->db->query("select * from peminjaman p, customer a, detail_pinjam d, mobil b  where p.id_customer = a.id_customer and p.id_pinjam = d.id_pinjam and d.id_mobil = b.id_mobil and p.id_pinjam='$id'")->result();
			
			$this->load->view('admin/header');
			$this->load->view('admin/transaksi_selesai',$data);
			$this->load->view('admin/footer');
		}
	}
		function cetak_laporan_mobil(){
          $data['mobil'] = $this->m_rental->get_data('mobil')->result();
          $this->load->view('admin/header');
          $this->load->view('admin/laporan_mobil', $data);
          $this->load->view('admin/footer');
        }

        function laporan_print_mobil(){
          $data['mobil'] = $this->m_rental->get_data('mobil')->result();
          $this->load->view('admin/laporan_print_mobil',$data);
        }

        function laporan_pdf_mobil(){
          $this->load->library('dompdf_gen');

          $data['mobil'] = $this->m_rental->get_data('mobil')->result();

          $this->load->view('admin/laporan_pdf_mobil', $data);

         $paper_size  = 'A4'; // ukuran kertas
         $orientation = 'landscape'; //tipe format kertas potrait atau landscape
         $html = $this->output->get_output();

         $this->dompdf->set_paper($paper_size, $orientation);
         //Convert to PDF
         $this->dompdf->load_html($html);
         $this->dompdf->render();
         $this->dompdf->stream("laporan_data_mobil.pdf", array('Attachment'=>0));
         // nama file pdf yang di hasilkan
        }

        Function cetak_laporan_customer(){
          $data['customer'] = $this->m_rental->get_data('customer')->result();
          $this->load->view('admin/header');
          $this->load->view('admin/laporan_customer', $data);
          $this->load->view('admin/footer');
        }

        function laporan_print_customer(){
          $data['customer'] = $this->m_rental->get_data('customer')->result();
          $this->load->view('admin/laporan_print_customer',$data);
        }

        function laporan_pdf_customer(){
          $this->load->library('dompdf_gen');

          $data['customer'] = $this->m_rental->get_data('customer')->result();

          $this->load->view('admin/laporan_pdf_customer', $data);

         $paper_size  = 'A4'; // ukuran kertas
         $orientation = 'landscape'; //tipe format kertas potrait atau landscape
         $html = $this->output->get_output();

         $this->dompdf->set_paper($paper_size, $orientation);
         //Convert to PDF
         $this->dompdf->load_html($html);
         $this->dompdf->render();
         $this->dompdf->stream("laporan_data_anggota.pdf", array('Attachment'=>0));
         // nama file pdf yang di hasilkan
        }

        function laporan_transaksi(){
          $dari = $this->input->post('dari');
          $sampai = $this->input->post('sampai');
          $this->form_validation->set_rules('dari','Dari Tanggal','required');
          $this->form_validation->set_rules('sampai','Sampai Tanggal','required');

          if($this->form_validation->run() != false){

          $data['laporan'] = $this->db->query("select * from peminjaman p,detail_pinjam d,
          mobil b,customer a where d.id_mobil=b.id_mobil and p.id_customer=a.id_customer
          and p.id_pinjam=d.id_pinjam and date(tanggal_input) >= '$dari'")->result();

          $this->load->view('admin/header');
          $this->load->view('admin/laporan_filter_transaksi',$data);
          $this->load->view('admin/footer');
        }else{
          $this->load->view('admin/header');
          $this->load->view('admin/laporan_transaksi');
          $this->load->view('admin/footer');
        }
        }

        function laporan_print_transaksi(){
          $dari = $this->input->get('dari');
          $sampai = $this->input->get('sampai');

          if($dari != "" && $sampai != ""){
            $data['laporan'] = $this->db->query("select * from peminjaman p,detail_pinjam d,mobil b,customer a where d.id_mobil=b.id_mobil and p.id_customer=a.id_customer and p.id_pinjam=d.id_pinjam and date(tanggal_input) >= '$dari'")->result();
            $this->load->view('admin/laporan_print_transaksi',$data);
          }else{
            redirect("admin/laporan_transaksi");
          }
        }

        function laporan_pdf_transaksi(){
          $this->load->library('dompdf_gen');
          $dari = $this->input->get('dari');
          $sampai = $this->input->get('sampai');

          $data['laporan'] = $this->db->query("select * from peminjaman p,detail_pinjam d,mobil b,customer a
          where d.id_mobil=b.id_mobil and p.id_customer=a.id_customer and p.id_pinjam=d.id_pinjam and date(tanggal_input)
          >= '$dari'")->result();

         $this->load->view('admin/laporan_pdf_transaksi', $data);

         $paper_size  = 'A4'; // ukuran kertas
         $orientation = 'landscape'; //tipe format kertas potrait atau landscape
         $html = $this->output->get_output();

         $this->dompdf->set_paper($paper_size, $orientation);
         //Convert to PDF
         $this->dompdf->load_html($html);
         $this->dompdf->render();
         $this->dompdf->stream("laporan_data_transaksi.pdf", array('Attachment'=>0));
        }

}
