<?php

class PemesananModel {
	
	#hanya dijlankan di class pemesananmodel
	private $table = 'pemesanan';
	private $db;

	#konstruktor method yang dijalankan pertama kali 
	public function __construct()
	{
		$this->db = new Database;
	}

	#public bisa dipanggil dilain kelas dg syarat kelas dipanggil dulu
	public function getAllPemesanan()
	{
		$this->db->query("SELECT pemesanan.id_pemesanan as id_pemesanan, layanan.nama as nama_layanan, customer.nama as nama_customer , pemesanan.tanggal_pemesanan as tanggal_pemesanan, pemesanan.alamat_acara as alamat_acara, pemesanan.jadwal_acara as jadwal_acara, pemesanan.metode_pembayaran as metode_pembayaran, pemesanan.status as status
        FROM `pemesanan` join layanan ON pemesanan.id_layanan = layanan.id_layanan join customer ON pemesanan.id_customer = customer.id_customer");
		#mengambil semua row
		return $this->db->resultSet();
	}

	#:id membuat var baru 
	public function getPemesananById($id_pemesanan)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_pemesanan=:id_pemesanan');
		#:id_layanan menimpa id_layanan yang diambil
		$this->db->bind('id_pemesanan',$id_pemesanan);
		#hanya mengambil 1 row
		return $this->db->single();
	}

	public function tambahPemesanan($data)
	{
		$query = "INSERT INTO pemesanan (id_layanan, id_customer, tanggal_pemesanan, alamat_acara, jadwal_acara, metode_pembayaran,status) VALUES(:id_layanan, :id_customer, :tanggal_pemesanan, :alamat_acara, :jadwal_acara, :metode_pembayaran,:status)";
		$this->db->query($query);
        $this->db->bind('id_layanan', $data['id_layanan']);
        $this->db->bind('id_customer', $data['id_customer']);
		$this->db->bind('tanggal_pemesanan', $data['tanggal_pemesanan']);
		$this->db->bind('alamat_acara', $data['alamat_acara']);
		$this->db->bind('jadwal_acara', $data['jadwal_acara']);
        $this->db->bind('metode_pembayaran', $data['metode_pembayaran']);
        $this->db->bind('status', $data['status']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataPemesanan($data)
	{
		$query = "UPDATE pemesanan SET id_layanan=:id_layanan, id_customer=:id_customer, tanggal_pemesanan=:tanggal_pemesanan, alamat_acara=:alamat_acara, jadwal_acara=:jadwal_acara, metode_pembayaran=:metode_pembayaran, status=:status WHERE id_pemesanan=:id_pemesanan";
		$this->db->query($query);
		$this->db->bind('id_pemesanan',$data['id_pemesanan']);
        $this->db->bind('id_layanan', $data['id_layanan']);
        $this->db->bind('id_customer', $data['id_customer']);
		$this->db->bind('tanggal_pemesanan', $data['tanggal_pemesanan']);
		$this->db->bind('alamat_acara', $data['alamat_acara']);
		$this->db->bind('jadwal_acara', $data['jadwal_acara']);
        $this->db->bind('metode_pembayaran', $data['metode_pembayaran']);
        $this->db->bind('status', $data['status']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deletePemesanan($id_pemesanan)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id_pemesanan=:id_pemesanan');
		$this->db->bind('id_pemesanan',$id_pemesanan);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariPemesanan()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE alamat_acara LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}
}