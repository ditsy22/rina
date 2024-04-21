<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->model = $this->Admin_model;

		if ($this->session->userdata('status_login_') != 'login') {
			redirect('auth');
		}
	}

	function bulan($bln)
	{
		switch ($bln) {
			case 1:
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	}


	public function index()
	{
		redirect('admin/dashboard');
	}

	public function dashboard()
	{

		$title = $this->session->userdata('level');
		$data['title'] = 'Dashboard ' . $title;
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('tema/admin/footer');
	}



	public function edit_profil()
	{

		$data['title'] = 'Perbaharui Profil Saya';
		$data['profilsaya'] = $this->Admin_model->profilku();
		$this->form_validation->set_rules('nama', 'nama', 'required|regex_match[/^([a-z ])+$/i]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'regex_match' =>	'Nama harus berupa huruf'
		]);
		$this->form_validation->set_rules('email', 'email', 'required|valid_email', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'valid_email' =>	'Email tidak valid'
		]);
		$this->form_validation->set_rules('username', 'username', 'required|min_length[5]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'min_length' =>	'Minimal 5 karakter'
		]);
		$this->form_validation->set_rules('sandi', 'sandi', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/edit_profil', $data);
			$this->load->view('tema/admin/footer');
		} else {
			$update = $this->Admin_model->cek_ganti_profil();
		}
	}

	public function edit_sandi()
	{

		$data['title'] = 'Perbaharui Kata Sandi Saya';
		$this->form_validation->set_rules('sandi2', 'sandi2', 'required|min_length[5]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'min_length' =>	'Minimal 5 karakter'
		]);
		$this->form_validation->set_rules('sandi1', 'sandi1', 'required|matches[sandi2]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'matches'	=>	'Konfirmasi sandi baru harus sama'
		]);
		$this->form_validation->set_rules('sandi', 'sandi', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/edit_sandi', $data);
			$this->load->view('tema/admin/footer');
		} else {
			$update = $this->Admin_model->cek_ganti_password();
		}
	}

	public function barangdaftar()
	{
		if ($this->session->userdata('level') == 'Personal Trainer') {
			$this->session->set_flashdata('error', 'Maaf, anda tidak punya hak untuk mengakses halaman ini');
			redirect('admin');
		}

		$data['title'] = 'Data Barang';
		$data['barang'] = $this->db->order_by('barang_id', 'desc')->get('tb_barang')->result_array();



		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/barangdaftar', $data);
		$this->load->view('tema/admin/footer');
	}

	public function barangtambah()
	{
		if ($this->session->userdata('level') != 'Admin') {
			$this->session->set_flashdata('error', 'Maaf, anda tidak punya hak untuk mengakses halaman ini');
			redirect('admin');
		}

		$data['title'] = 'Tambah Barang Baru';
		$this->form_validation->set_rules('barang_nama', 'barang_nama', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/barangtambah', $data);
			$this->load->view('tema/admin/footer');
		} else {
			$barang_nama = ucwords($this->input->post('barang_nama'));
			$barang_stok = $this->input->post('barang_stok');
			$barang_harga = $this->input->post('barang_harga');
			$barang_deskripsi = $this->input->post('barang_deskripsi');
			$data = array(
				'barang_nama'				=>	$barang_nama,
				'barang_stok'					=>	$barang_stok,
				'barang_harga'					=>	$barang_harga,
				'barang_deskripsi'					=>	$barang_deskripsi,
			);
			$config['upload_path'] = './upload/barang/';
			$config['allowed_types'] = '*';
			$config['encrypt_name'] = TRUE;

			$this->upload->initialize($config);
			if (!empty($_FILES['gambar']['name'])) {
				if ($this->upload->do_upload('gambar')) {
					$gambar = $this->upload->data();
					$config['image_library'] = 'gd2';
					$config['width'] = 800;
					$config['height'] = 500;
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					$data['barang_foto'] = $gambar['file_name'];
				}
			}
			$insert = $this->db->insert('tb_barang', $data);
			$this->session->set_flashdata('flash', 'Barang baru berhasil ditambahkan');
			redirect('admin/barangdaftar');
		}
	}

	public function barangedit($id)
	{
		if ($this->session->userdata('level') != 'Admin') {
			$this->session->set_flashdata('error', 'Maaf, anda tidak punya hak untuk mengakses halaman ini');
			redirect('admin');
		}

		$data['title'] = 'Edit Barang';
		$data['barangid'] = $this->db->where('barang_id ', $id)->get('tb_barang')->row_array();
		$this->form_validation->set_rules('barang_nama', 'barang_nama', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/barangedit', $data);
			$this->load->view('tema/admin/footer');
		} else {
			$barang_nama = ucwords($this->input->post('barang_nama'));
			$barang_stok = $this->input->post('barang_stok');
			$barang_harga = $this->input->post('barang_harga');
			$barang_deskripsi = $this->input->post('barang_deskripsi');
			$data = array(
				'barang_nama'				=>	$barang_nama,
				'barang_stok'					=>	$barang_stok,
				'barang_harga'					=>	$barang_harga,
				'barang_deskripsi'					=>	$barang_deskripsi,
			);
			$config['upload_path'] = './upload/barang/';
			$config['allowed_types'] = '*';
			$config['encrypt_name'] = TRUE;

			$this->upload->initialize($config);
			if (!empty($_FILES['gambar']['name'])) {
				if ($this->upload->do_upload('gambar')) {
					$gambar = $this->upload->data();
					$config['image_library'] = 'gd2';
					$config['width'] = 800;
					$config['height'] = 500;
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					$data['barang_foto'] = $gambar['file_name'];
				}
			}
			$this->db->where('barang_id ', $this->input->post('barang_id'));
			$update = $this->db->update('tb_barang', $data);



			$this->session->set_flashdata('flash', 'Barang berhasil diperbaharui');
			redirect('admin/barangdaftar');
		}
	}

	public function baranghapus($id)
	{
		$delete = $this->db->where('barang_id ', $id)->delete('tb_barang');



		$this->session->set_flashdata('flash', 'Barang berhasil dihapus');
		redirect('admin/barangdaftar');
	}



	public function keluartambah()
	{
		if ($this->session->userdata('level') != 'Admin') {
			$this->session->set_flashdata('error', 'Maaf, anda tidak punya hak untuk mengakses halaman ini');
			redirect('admin');
		}

		$data['title'] = 'Tambah Keluar Baru';
		$data['databarang'] = $this->db->order_by('barang_id', 'desc')->get('tb_barang')->result_array();
		$this->form_validation->set_rules('nama', 'nama', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/keluartambah', $data);
			$this->load->view('tema/admin/footer');
		} else {
			$kodekeluar = date('dmyHis');
			$namabarang = $this->input->post('namabarang');
			foreach ($namabarang as $key => $val) {
				$simpan[] = array(
					'kodekeluar' => $kodekeluar,
					'namabarang' => $this->input->post('namabarang')[$key],
					'harga' => $this->input->post('harga')[$key],
					'jumlah' => $this->input->post('jumlah')[$key],
					'total' => $this->input->post('total')[$key],
					'grandtotal' => $this->input->post('grandtotalnon'),
					'nama' => ucwords($this->input->post('nama')),
					'tanggalkeluar' => $this->input->post('tanggalkeluar'),
				);
				$this->db->set('barang_stok', 'barang_stok-' . $this->input->post('jumlah')[$key], FALSE);
				$this->db->where('barang_nama', $this->input->post('namabarang')[$key]);
				$update = $this->db->update('tb_barang');
			}
			$this->db->insert_batch('tb_keluar', $simpan);

			$this->session->set_flashdata('flash', 'Keluar berhasil ditambahkan');
			redirect('admin/keluardaftar');
		}
	}

	public function keluarhapus($id)
	{
		if ($this->session->userdata('level') != 'Admin') {
			$this->session->set_flashdata('error', 'Maaf, anda tidak punya hak untuk mengakses halaman ini');
			redirect('admin');
		}
		$this->db->where('kodekeluar', $id);
		$daftarkeluar = $this->db->get('tb_keluar')->result_array();
		foreach ($daftarkeluar as $daftar) {
			$this->db->set('barang_stok', 'barang_stok+' . $daftar['jumlah'], FALSE);
			$this->db->where('barang_nama', $daftar['namabarang']);
			$update = $this->db->update('tb_barang');
		}
		$this->db->where('kodekeluar', $id);
		$this->db->delete('tb_keluar');

		$this->session->set_flashdata('flash', 'Data keluar berhasil dihapus');
		redirect('admin/keluardaftar');
	}

	public function keluardaftar()
	{

		$data['title'] = 'Data Keluar';
		$data['start'] = $this->input->post('start');
		$data['end'] = $this->input->post('end');
		$start = $this->input->post('start');
		$end = $this->input->post('end');
		$data['keluar'] = $this->Admin_model->keluardaftar($start, $end);



		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/keluardaftar', $data);
		$this->load->view('tema/admin/footer');
	}

	public function keluarcetak($kodekeluar)
	{

		$data['title'] = 'Data Keluar';
		$data['keluar'] = $this->db->where('kodekeluar', $kodekeluar)->get('tb_keluar')->row();



		$this->load->view('admin/keluarcetak', $data);
	}



	public function masuktambah()
	{
		if ($this->session->userdata('level') != 'Admin') {
			$this->session->set_flashdata('error', 'Maaf, anda tidak punya hak untuk mengakses halaman ini');
			redirect('admin');
		}

		$data['title'] = 'Tambah Masuk Baru';
		$data['databarang'] = $this->db->order_by('barang_id', 'desc')->get('tb_barang')->result_array();
		$this->form_validation->set_rules('nama', 'nama', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/masuktambah', $data);
			$this->load->view('tema/admin/footer');
		} else {
			$kodemasuk = date('dmyHis');
			$namabarang = $this->input->post('namabarang');
			foreach ($namabarang as $key => $val) {
				$simpan[] = array(
					'kodemasuk' => $kodemasuk,
					'namabarang' => $this->input->post('namabarang')[$key],
					'harga' => $this->input->post('harga')[$key],
					'jumlah' => $this->input->post('jumlah')[$key],
					'total' => $this->input->post('total')[$key],
					'grandtotal' => $this->input->post('grandtotalnon'),
					'nama' => ucwords($this->input->post('nama')),
					'tanggalmasuk' => $this->input->post('tanggalmasuk'),
				);
				$this->db->set('barang_stok', 'barang_stok+' . $this->input->post('jumlah')[$key], FALSE);
				$this->db->where('barang_nama', $this->input->post('namabarang')[$key]);
				$update = $this->db->update('tb_barang');
			}
			$this->db->insert_batch('tb_masuk', $simpan);

			$this->session->set_flashdata('flash', 'Masuk berhasil ditambahkan');
			redirect('admin/masukdaftar');
		}
	}

	public function masukhapus($id)
	{
		if ($this->session->userdata('level') != 'Admin') {
			$this->session->set_flashdata('error', 'Maaf, anda tidak punya hak untuk mengakses halaman ini');
			redirect('admin');
		}
		$this->db->where('kodemasuk', $id);
		$daftarmasuk = $this->db->get('tb_masuk')->result_array();
		foreach ($daftarmasuk as $daftar) {
			$this->db->set('barang_stok', 'barang_stok-' . $daftar['jumlah'], FALSE);
			$this->db->where('barang_nama', $daftar['namabarang']);
			$update = $this->db->update('tb_barang');
		}
		$this->db->where('kodemasuk', $id);
		$this->db->delete('tb_masuk');

		$this->session->set_flashdata('flash', 'Data masuk berhasil dihapus');
		redirect('admin/masukdaftar');
	}

	public function masukdaftar()
	{

		$data['title'] = 'Data Masuk';
		$data['start'] = $this->input->post('start');
		$data['end'] = $this->input->post('end');
		$start = $this->input->post('start');
		$end = $this->input->post('end');
		$data['masuk'] = $this->Admin_model->masukdaftar($start, $end);



		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/masukdaftar', $data);
		$this->load->view('tema/admin/footer');
	}
}
