<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model');
	}

	public function index()
	{
		redirect('dashboard');
	}
	public function dashboard()
	{
		$this->db->select('nama, tanggal, status');
		$this->db->where('MONTH(tanggal)', date('m'));
		$this->db->where('YEAR(tanggal)', date('Y'));
		$this->db->order_by('nama', 'ASC');
		$this->db->order_by('tanggal', 'ASC');
		$data['jimpitan'] = $this->db->get('jimpitan')->result_array();

		$this->db->select('*');
		$this->db->where('MONTH(tanggal)', date('m'));
		$this->db->where('YEAR(tanggal)', date('Y'));
		$data['pengambil'] = $this->db->get('pengambil')->result_array();

		// wajib
		$data['today'] = $this->db->get_where('jimpitan', ['tanggal' => date('Y-m-d')])->row();

		$this->template->load('template', 'dashboard', $data);
	}
	public function add()
	{
		$this->db->select('*');
		$this->db->order_by('nama', 'ASC');
		$data['anggota'] = $this->db->get('anggota')->result();

		// wajib
		$data['today'] = $this->db->get_where('jimpitan', ['tanggal' => date('Y-m-d')])->row();

		$this->template->load('template', 'add', $data);
	}
	public function save()
	{
		$this->db->insert('pengambil', ['nama' => $this->input->post('nama'), 'tanggal' => date('Y-m-d')]);

		$statuses = $this->input->post('status');
		foreach ($statuses as $id => $status) {
			$this->model->tambah($id, $status);
		}
		redirect('home');
	}
	public function month()
	{
		if ($this->input->post('bulan') != NULL) {
			$bulan = $this->input->post('bulan');
			$year = date('Y', strtotime($bulan));
			$month = date('m', strtotime($bulan));
			$this->db->select('nama, tanggal, status');
			$this->db->where('MONTH(tanggal)', $month);
			$this->db->where('YEAR(tanggal)', $year);
			$this->db->order_by('nama', 'ASC');
			$this->db->order_by('tanggal', 'ASC');
			$data['jimpitan'] = $this->db->get('jimpitan')->result_array();

			$this->db->select('*');
			$this->db->where('MONTH(tanggal)', $month);
			$this->db->where('YEAR(tanggal)', $year);
			$data['pengambil'] = $this->db->get('pengambil')->result_array();

			// bulan bahasa indo
			$nama_bulan = [
				1 => 'Januari',
				2 => 'Februari',
				3 => 'Maret',
				4 => 'April',
				5 => 'Mei',
				6 => 'Juni',
				7 => 'Juli',
				8 => 'Agustus',
				9 => 'September',
				10 => 'Oktober',
				11 => 'November',
				12 => 'Desember'
			];
			$data['month'] = $nama_bulan[intval($month)];
			$data['selected_month'] = "$year-$month";
		}
		// wajib
		$data['today'] = $this->	db->get_where('jimpitan', ['tanggal' => date('Y-m-d')])->row();

		$this->template->load('template', 'bulan', $data);
	}
}
