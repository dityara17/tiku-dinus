<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Action extends CI_Controller
{
	private $data;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('bioskop_model');
	}

	public function hapus_kursi()
	{
		$kursi = $this->input->get('kursi');
		$data_kursi = $this->session->data_kursi;
		unset($data_kursi[array_search($kursi, $data_kursi)]);
		$this->session->data_kursi = $data_kursi;
		redirect('/konfirmasi-bayar');
	}

	public function hapus_semua()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

	public function bayar()
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$nama = $this->input->post('nama');
			$nik = $this->input->post('nik');
			$usia = $this->input->post('usia');
		}
		$data_kursi = $this->session->data_kursi;
		$id_film = $this->session->id_film;
		$tanggal = $this->session->tanggal_nonton;
		$id_jadwal = $this->session->id_jadwal;


		// save identitas
		$id_identitas = $this->bioskop_model->save_identity($nik,$nama,$usia);


		foreach ($data_kursi as $kursi) {
			$this->bioskop_model->add_pesanan($id_film, $tanggal, $id_jadwal, $kursi, $id_identitas);
		}

		$film = $this->bioskop_model->get_film_by_id($id_film);

		$this->session->last_order = [
			'film' => $film->judul,
			'tanggal_nonton' => $tanggal,
			'jadwal' => $this->bioskop_model->get_jadwal_by_id($id_jadwal)->jadwal,
			'kursi' => $data_kursi,
			'nama' => $nama,
			'nik' => $nik,
			'usia' => $usia,
			'id_identitas' => $id_identitas,
		];
		$this->session->unset_userdata(['data_kursi', 'id_film', 'tanggal_nonton', 'id_jadwal']);
		redirect('/cetak_tiket');
	}

	public function update(){
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$nama = $this->input->post('nama');
			$nik = $this->input->post('nik');
			$usia = $this->input->post('usia');
			$id = $this->input->post('id_identitas');
		}
		$this->bioskop_model->updateIdentitas($nik,$nama,$usia,$id);
		redirect('/cetak_tiket');
	}

}
