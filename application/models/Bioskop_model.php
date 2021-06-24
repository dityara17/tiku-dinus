<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Bioskop_model extends CI_Model
{

	public function get_latest_movie()
	{
		$result = $this->db->order_by('tanggal_rilis', 'desc')->get('film');
		return $result->result();
	}

	public function get_film_by_id($film_id = null)
	{
		if (!$film_id) {
			return false;
		}
		$q = [
			'id_film' => $film_id,
		];
		$result = $this->db->get_where('film', $q);
		return $result->row();
	}

	public function get_seat()
	{
		$result = $this->db->order_by('nokur', 'asc')->get('kursi');
		return $result->result();
	}

	public function booked_seat($id_film, $date, $jadwal)
	{

		$q = [
			'id_film' => $id_film,
			'tanggal_nonton' => $date,
			'id_jadwal' => $jadwal,
		];
		$result = $this->db->get_where('pesanan', $q);
		$bookings = $result->result();
		$seat = $this->get_seat();
		$freeSeat = [];
		foreach ($seat as $itemSeat) {
			foreach ($bookings as $itemBook) {
				if ($itemSeat->nokur == $itemBook->nokur) {
					array_push($freeSeat, $itemBook->nokur);
				}
			}
		}
		return $freeSeat;
	}

	public function save_identity($nik,$nama,$usia){
		
		$identitasD = [
			'nik' => $nik,
			'nama' => $nama,
			'usia' => $usia,
		];

		$this->db->insert('identitas', $identitasD);
		$lastID = $this->db->insert_id();
		return $lastID;
	}

	public function updateIdentitas($nik,$nama,$usia,$id){
		$identitasD = [
			'nik' => $nik,
			'nama' => $nama,
			'usia' => $usia,
		];
		$this->db->where('id_identitas', $id);
		$this->db->update('identitas', $identitasD);
	}

	public function getIdentitas($id){
		if (!$id) {
			return false;
		}
		$q = [
			'id_identitas' => $id,
		];
		$result = $this->db->get_where('identitas', $q);
		return $result->row();
	}

	public function add_pesanan($id_film, $tanggal_nonton, $sesi, $kursi, $id_identitas)
	{
		
		$data = [
			'id_film' => $id_film,
			'tanggal_nonton' => $tanggal_nonton,
			'id_jadwal' => $sesi,
			'nokur' => $kursi,
			'id_identitas' => $id_identitas
		];
		$this->db->insert('pesanan', $data);
		// save identitas

		return true;
	}

	public function get_jadwal()
	{
		$result = $this->db->order_by('jadwal', 'asc')->get('jadwal');
		return $result->result();
	}


	public function get_jadwal_by_id($id)
	{
		$q = [
			'id_jadwal' => $id,
		];
		$result = $this->db->get_where('jadwal', $q);
		return $result->row();
	}
}
