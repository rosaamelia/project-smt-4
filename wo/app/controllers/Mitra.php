<?php

#menghubungkan model dengan view 
class Mitra extends Controller {
	
	public function __construct()
	{	
		if($_SESSION['session_login'] != 'sudah_login') {
			Flasher::setMessage('Login','Tidak ditemukan.','danger');
			header('location: '. base_url . '/login');
			exit;
		}
	}
	
	public function index()
	{
		
		$data['title'] = 'Daftar mitra';
		$data['mitra'] = $this->model('MitraModel')->getAllMitra();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('mitra/index', $data);
		$this->view('templates/footer');
	}


	public function cari()
	{
		$data['title'] = 'Data mitra';
		$data['mitra'] = $this->model('MitraModel')->cariMitra();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('mitra/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id_mitra){

		$data['title'] = 'Detail mitra';
		$data['mitra'] = $this->model('MitraModel')->getMitraById($id_mitra);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('mitra/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah mitra';		
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('mitra/create', $data);
		$this->view('templates/footer');
	}

	public function simpanMitra(){		

		if( $this->model('MitraModel')->tambahMitra($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/mitra');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/mitra');
			exit;	
		}
	}

	public function updateMitra(){	
		if( $this->model('MitraModel')->updateDataMitra($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/mitra');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/mitra');
			exit;	
		}
	}

	public function hapus($id_mitra){
		if( $this->model('MitraModel')->deleteMitra($id_mitra) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/mitra');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/mitra');
			exit;	
		}
	}
}