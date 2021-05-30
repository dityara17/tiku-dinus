<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bioskop extends CI_Controller
{

	private $data;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('bioskop_model');
	}

	public function index()
	{
		$data['films'] = $this->bioskop_model->get_latest_movie();
		$this->load->view('beranda', $data);
	}

	public function pesan_tiket()
	{
		$id = $this->input->get('id');
		$data['film'] = $this->bioskop_model->get_film_by_id($id);
		$data['jadwal'] = $this->bioskop_model->get_jadwal();
		$this->load->view('pesan_tiket', $data);
	}

	// need to filter seat
	public function pilih_kursi()
	{
		$date = $this->input->get('tanggal_tiket');
		$film_id = $this->input->get('film_id');
		$jadwal = $this->input->get('sesi');

		$data['film'] = $this->bioskop_model->get_film_by_id($film_id);
		$data['sesi'] = $this->bioskop_model->get_jadwal_by_id($jadwal);
		$data['booked'] = $this->bioskop_model->booked_seat($film_id, $date, $jadwal);;

		$this->load->view('pilihan_kursi', $data);
	}

	public function add_book()
	{

		if ($this->input->server('REQUEST_METHOD') === 'POST') {

			$film_id = $this->input->post('film_id');
			$film = $this->bioskop_model->get_film_by_id($film_id);

			$data_save = [
				'id_film' => $film->id_film,
				'film_judul' => $film->judul,
				'tanggal' => $this->input->post('tanggal'),
				'kursi' => $this->input->post('kursi'),
			];
		}

	}


	public function konfirmasi_bayar()
	{
		$this->load->view('konfirmasi');
	}

	public function cetak()
	{
		$this->load->view('print');
	}
}
