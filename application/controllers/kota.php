<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kota extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_kota','mp');
	}

	public function index(){
		redirect('kota/view');
		
	}
	public function view($halaman="")
	{
		$limit = 0;
		if ($halaman != '') {
			$offset = $halaman;
		}else{
			$offset = 0;
		}
		$data['kota'] = $this->mp->getList($limit, $offset);
		$this->load->library('pagination');
		
		$config['base_url'] = base_url('kota/view');
		$config['total_rows'] = $this->mp->totalRows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<div>';
		$config['first_tag_close'] = '</div>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<div>';
		$config['last_tag_close'] = '</div>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<div>';
		$config['next_tag_close'] = '</div>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<div>';
		$config['prev_tag_close'] = '</div>';
		$config['cur_tag_open'] = '<b >';
		$config['cur_tag_close'] = '</b>';
		
		$this->pagination->initialize($config);
		
		
		$data['paging'] = $this->pagination->create_links();
		$this->load->view('kota/view', $data);
		// $data['datkot'] = $this->mp->getkota();
		// $this->load->view('kota/view', $data);

	}

	public function tambah(){
		$this->load->view('kota/tambah');
	}

	public function detail($id = null){
		$data['datkot'] = $this->mp->getkota($id);
		$this->load->view('kota/detail', $data);

	}

	public function hapus($id = null){
		$data['datkot'] = $this->mp->deletekota($id);
		$this->load->view('kota/hapus', $data);

	}
	public function simpan(){
		$param = $this->input->post();
		$proses_simpan = $this->mp->tambahkota($param);
		if ($proses_simpan >= 0) {
			redirect('kota');
		} else {
			redirect('kota/tambah');
		}

	}
	public function update($id = null){
		$data['datkot'] = $this->mp->details($id);
		$this->load->view('kota/update', $data);

	}
	public function simpanupt(){
		$param = $this->input->post();
		$proses_simpan = $this->mp->updatekota($param);
		if ($proses_simpan >= 0) {
			redirect('kota');
		} else {
			redirect('kota/update');
		}

	}

}

/* End of file kota.php */
/* Location: ./application/controllers/kota.php */