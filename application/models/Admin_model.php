<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	public function getresult($where, $tabel)
	{
		$this->db->from($tabel);
		$this->db->where($where);
		return $this->db->get()->result_array();
	}

	public function getrow($where, $tabel)
	{
		$this->db->from($tabel);
		$this->db->where($where);
		return $this->db->get()->row();
	}

	public function get_where($table = null, $where = null)
	{
		$this->db->from($table);
		$this->db->where($where);
		return $this->db->get();
	}

	public function insert_last($table = '', $data = '')
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	public function insert($table = '', $data = '')
	{
		$this->db->insert($table, $data);
	}

	public function cek_ganti_password()
	{
		$sandi = $this->input->post('sandi');
		$sandi1 = password_hash($this->input->post('sandi1'), PASSWORD_DEFAULT);
		$cek = $this->db->get_where('tb_admin', ['admin_id' => $this->session->userdata('adminid')])->row_array();

		if (password_verify($sandi, $cek['admin_sandi'])) {
			$this->db->set('admin_sandi', $sandi1);
			$this->db->where('admin_id', $this->session->userdata('adminid'));
			$this->db->update('tb_admin');
			$this->session->set_flashdata('flash', 'Sandi anda berhasil diperbaharui');
			redirect('admin/edit_sandi');
		} else {
			$this->session->set_flashdata('error', 'Konfirmasi kata sandi salah');
			redirect('admin/edit_sandi');
		}
	}

	public function cek_ganti_profil()
	{
		$nama = ucwords($this->input->post('nama'));
		$username = strtolower($this->input->post('username'));
		$email = strtolower($this->input->post('email'));
		$nohp = strtolower($this->input->post('nohp'));
		$sandi = $this->input->post('sandi');
		$cek = $this->db->get_where('tb_admin', ['admin_id' => $this->session->userdata('adminid')])->row_array();

		if (password_verify($sandi, $cek['admin_sandi'])) {

			// get foto
			$config['upload_path'] = './assets_admin/images/resources/';
			$config['allowed_types'] = 'jpg|png|jpeg|gif';
			$config['encrypt_name'] = TRUE;

			$this->upload->initialize($config);
			if (!empty($_FILES['gambar']['name'])) {
				if ($this->upload->do_upload('gambar')) {
					$gambar = $this->upload->data();

					$data = array(
						'admin_nama'				=>	$nama,
						'admin_email'				=>	$email,
						'nohp'						=>	$nohp,
						'admin_username'			=>	$username,
						'admin_foto'				=>	$gambar['file_name']
					);
				}
			} else {
				$data = array(
					'admin_nama'				=>	$nama,
					'admin_email'				=>	$email,
					'nohp'						=>	$nohp,
					'admin_username'			=>	$username,
					'admin_foto'				=>	$this->input->post('gambar_old')
				);
			}

			$this->db->where('admin_id', $this->session->userdata('adminid'));
			$this->db->update('tb_admin', $data);
			$this->session->set_flashdata('flash', 'Profil anda berhasil diperbaharui');
			redirect('admin/edit_profil');
		} else {
			$this->session->set_flashdata('error', 'Konfirmasi kata sandi salah');
			redirect('admin/edit_profil');
		}
	}

	public function profilku()
	{
		return $this->db->get_where('tb_admin', ['admin_id' => $this->session->userdata('adminid')])->row_array();
	}
	public function keluardaftar($start, $end)
	{
		if ($start != "" and $end != "") {
			$this->db->where('tanggalkeluar >=', $start);
			$this->db->where('tanggalkeluar <=', $end);
		}
		$this->db->group_by('kodekeluar');
		$this->db->order_by('tanggalkeluar', 'desc');
		return $this->db->get('tb_keluar')->result_array();
	}

	public function masukdaftar($start, $end)
	{
		if ($start != "" and $end != "") {
			$this->db->where('tanggalmasuk >=', $start);
			$this->db->where('tanggalmasuk <=', $end);
		}
		$this->db->group_by('kodemasuk');
		$this->db->order_by('tanggalmasuk', 'desc');
		return $this->db->get('tb_masuk')->result_array();
	}
}
