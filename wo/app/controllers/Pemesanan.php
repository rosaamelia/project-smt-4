<?php

#menghubungkan model dengan view 
class pemesanan extends Controller {
	
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
		
		$data['title'] = 'Daftar Pemesanan';
		$data['pemesanan'] = $this->model('PemesananModel')->getAllPemesanan();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('pemesanan/index', $data);
		$this->view('templates/footer');
	}
	
	public function cari()
	{
		$data['title'] = 'Data pemesanan';
		$data['pemesanan'] = $this->model('PemesananModel')->cariPemesanan();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('pemesanan/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id_pemesanan){

		$data['title'] = 'Detail pemesanan';
		$data['pemesanan'] = $this->model('PemesananModel')->getPemesananById($id_pemesanan);
        $data['layanan'] = $this->model('LayananModel')->getAllLayanan();	
        $data['customer'] = $this->model('CustomerModel')->getAllCustomer();	
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('pemesanan/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah pemesanan';		
        $data['layanan'] = $this->model('LayananModel')->getAllLayanan();	
        $data['customer'] = $this->model('CustomerModel')->getAllCustomer();	
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('pemesanan/create', $data);
		$this->view('templates/footer');
	}

	public function simpanpemesanan(){		

		if( $this->model('PemesananModel')->tambahpemesanan($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/pemesanan');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/pemesanan');
			exit;	
		}
	}

	public function updatePemesanan(){	
		if( $this->model('PemesananModel')->updateDataPemesanan($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/pemesanan');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/pemesanan');
			exit;	
		}
	}

	public function hapus($id_pemesanan){
		if( $this->model('PemesananModel')->deletePemesanan($id_pemesanan) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/pemesanan');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/pemesanan');
			exit;	
		}
	}
}