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

	public function pilih_kursi()
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$this->session->id_film = $this->input->post('film_id');
			$this->session->tanggal_nonton = $this->input->post('tanggal_nonton');
			$this->session->id_jadwal = $this->input->post('sesi');
		}

		$data['film'] = $this->bioskop_model->get_film_by_id($this->session->id_film);
		$data['sesi'] = $this->bioskop_model->get_jadwal_by_id($this->session->id_jadwal);
		$data['booked'] = $this->bioskop_model->booked_seat($this->session->id_film, $this->session->tanggal_nonton, $this->session->id_jadwal);

		$this->load->view('pilihan_kursi', $data);
	}

	public function konfirmasi_book()
	{

		if ($this->input->server('REQUEST_METHOD') === 'POST') {

			$this->session->data_kursi = $this->input->post('kursi');
		}

		$data['total'] = count($this->session->data_kursi) * 60000;
		$data['sesi'] = $this->bioskop_model->get_jadwal_by_id($this->session->id_jadwal);
		$data['film'] = $this->bioskop_model->get_film_by_id($this->session->id_film);

		$this->load->view('konfirmasi', $data);
	}



	public function cetak()
	{
		$id_identitas =$this->session->last_order['id_identitas'];


		$data['identitas'] =  $this->bioskop_model->getIdentitas($id_identitas);

		$this->load->view('print', $data);
	}
}
