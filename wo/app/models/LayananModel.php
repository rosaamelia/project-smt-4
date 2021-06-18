<?php

class LayananModel {
	
	#hanya dijlankan di class layananmodel
	private $table = 'layanan';
	private $db;

	#konstruktor method yang dijalankan pertama kali 
	public function __construct()
	{
		$this->db = new Database;
	}

	#public bisa dipanggil dilain kelas dg syarat kelas dipanggil dulu
	public function getAllLayanan()
	{
		$this->db->query("SELECT layanan.id_layanan as id_layanan, mitra.nama as nama_mitra, kategori.nama_kategori as kategori , layanan.nama as nama_layanan, layanan.stok as stok, layanan.harga as harga
        FROM `layanan` join mitra ON layanan.id_mitra = mitra.id_mitra join kategori ON layanan.id_kategori = kategori.id");
		#mengambil semua row
		return $this->db->resultSet();
	}

	#:id membuat var baru 
	public function getLayananById($id_layanan)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_layanan=:id_layanan');
		#:id_layanan menimpa id_layanan yang diambil
		$this->db->bind('id_layanan',$id_layanan);
		#hanya mengambil 1 row
		return $this->db->single();
	}

	public function tambahLayanan($data)
	{
		$query = "INSERT INTO layanan (id_mitra, id_kategori, nama, stok, harga) VALUES(:id_mitra, :id_kategori, :nama, :stok, :harga)";
		$this->db->query($query);
        $this->db->bind('id_mitra', $data['id_mitra']);
        $this->db->bind('id_kategori', $data['id_kategori']);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('stok', $data['stok']);
		$this->db->bind('harga', $data['harga']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataLayanan($data)
	{
		$query = "UPDATE layanan SET id_mitra=:id_mitra, id_kategori=:id_kategori, nama=:nama, stok=:stok, harga=:harga WHERE id_layanan=:id_layanan";
		$this->db->query($query);
		$this->db->bind('id_layanan',$data['id_layanan']);
        $this->db->bind('id_mitra', $data['id_mitra']);
        $this->db->bind('id_kategori', $data['id_kategori']);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('stok', $data['stok']);
		$this->db->bind('harga', $data['harga']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteLayanan($id_layanan)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id_layanan=:id_layanan');
		$this->db->bind('id_layanan',$id_layanan);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariLayanan()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE nama LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}
}