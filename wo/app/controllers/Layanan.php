<?php

#menghubungkan model dengan view 
class Layanan extends Controller {
	
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
		
		$data['title'] = 'Daftar Layanan';
		$data['layanan'] = $this->model('LayananModel')->getAllLayanan();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('layanan/index', $data);
		$this->view('templates/footer');
	}
	
	public function cari()
	{
		$data['title'] = 'Data layanan';
		$data['layanan'] = $this->model('LayananModel')->cariLayanan();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('layanan/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id_layanan){

		$data['title'] = 'Detail layanan';
		$data['kategori'] = $this->model('KategoriModel')->getAllKategori();
		$data['layanan'] = $this->model('LayananModel')->getlayananById($id_layanan);
        $data['mitra'] = $this->model('MitraModel')->getAllMitra();	
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('layanan/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah layanan';		
		$data['kategori'] = $this->model('KategoriModel')->getAllKategori();
        $data['mitra'] = $this->model('MitraModel')->getAllMitra();		
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('layanan/create', $data);
		$this->view('templates/footer');
	}

	public function simpanlayanan(){		

		if( $this->model('LayananModel')->tambahlayanan($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/layanan');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/layanan');
			exit;	
		}
	}

	public function updateLayanan(){	
		if( $this->model('LayananModel')->updateDataLayanan($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/layanan');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/layanan');
			exit;	
		}
	}

	public function hapus($id_layanan){
		if( $this->model('LayananModel')->deleteLayanan($id_layanan) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/layanan');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/layanan');
			exit;	
		}
	}
}