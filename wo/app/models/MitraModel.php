<?php

class MitraModel {
	
	#hanya dijlankan di class mitramodel
	private $table = 'mitra';
	private $db;

	#konstruktor method yang dijalankan pertama kali 
	public function __construct()
	{
		$this->db = new Database;
	}

	#public bisa dipanggil dilain kelas dg syarat kelas dipanggil dulu
	public function getAllMitra()
	{
		$this->db->query("SELECT * FROM " . $this->table );
		#mengambil semua row
		return $this->db->resultSet();
	}

	#:id membuat var baru 
	public function getMitraById($id_mitra)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_mitra=:id_mitra');
		#:id_mitra menimpa id_mitra yang diambil
		$this->db->bind('id_mitra',$id_mitra);
		#hanya mengambil 1 row
		return $this->db->single();
	}

	public function tambahMitra($data)
	{
		$query = "INSERT INTO mitra (nama, alamat, email, telepon) VALUES(:nama, :alamat, :email, :telepon)";
		$this->db->query($query);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('alamat', $data['alamat']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('telepon', $data['telepon']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataMitra($data)
	{
		$query = "UPDATE mitra SET nama=:nama, alamat=:alamat, email=:email, telepon=:telepon WHERE id_mitra=:id_mitra";
		$this->db->query($query);
		$this->db->bind('id_mitra',$data['id_mitra']);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('alamat', $data['alamat']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('telepon', $data['telepon']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteMitra($id_mitra)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id_mitra=:id_mitra');
		$this->db->bind('id_mitra',$id_mitra);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariMitra()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE nama LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}
}