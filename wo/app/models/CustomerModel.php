<?php

class CustomerModel {
	
	#hanya dijlankan di class customermodel
	private $table = 'customer';
	private $db;

	#konstruktor method yang dijalankan pertama kali 
	public function __construct()
	{
		$this->db = new Database;
	}

	#public bisa dipanggil dilain kelas dg syarat kelas dipanggil dulu
	public function getAllCustomer()
	{
		$this->db->query("SELECT * FROM " . $this->table );
		#mengambil semua row
		return $this->db->resultSet();
	}

	#:id membuat var baru 
	public function getCustomerById($id_customer)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_customer=:id_customer');
		#:id_customer menimpa id_customer yang diambil
		$this->db->bind('id_customer',$id_customer);
		#hanya mengambil 1 row
		return $this->db->single();
	}

	public function tambahCustomer($data)
	{
		$query = "INSERT INTO customer (nama, alamat, email, telepon) VALUES(:nama, :alamat, :email, :telepon)";
		$this->db->query($query);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('alamat', $data['alamat']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('telepon', $data['telepon']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataCustomer($data)
	{
		$query = "UPDATE customer SET nama=:nama, alamat=:alamat, email=:email, telepon=:telepon WHERE id_customer=:id_customer";
		$this->db->query($query);
		$this->db->bind('id_customer',$data['id_customer']);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('alamat', $data['alamat']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('telepon', $data['telepon']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteCustomer($id_customer)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id_customer=:id_customer');
		$this->db->bind('id_customer',$id_customer);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariCustomer()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE nama LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}
}