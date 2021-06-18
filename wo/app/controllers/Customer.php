<?php

#menghubungkan model dengan view 
class Customer extends Controller {
	
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
		
		$data['title'] = 'Daftar Customer';
		$data['customer'] = $this->model('CustomerModel')->getAllCustomer();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('customer/index', $data);
		$this->view('templates/footer');
	}


	public function cari()
	{
		$data['title'] = 'Data Customer';
		$data['customer'] = $this->model('CustomerModel')->cariCustomer();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('customer/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id_customer){

		$data['title'] = 'Detail Customer';
		$data['customer'] = $this->model('CustomerModel')->getCustomerById($id_customer);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('customer/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah Customer';		
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('customer/create', $data);
		$this->view('templates/footer');
	}

	public function simpanCustomer(){		

		if( $this->model('CustomerModel')->tambahCustomer($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/customer');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/customer');
			exit;	
		}
	}

	public function updateCustomer(){	
		if( $this->model('CustomerModel')->updateDataCustomer($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/customer');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/customer');
			exit;	
		}
	}

	public function hapus($id_customer){
		if( $this->model('CustomerModel')->deleteCustomer($id_customer) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/customer');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/customer');
			exit;	
		}
	}
}