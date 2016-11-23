<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pegawai','mp');
	}

	public function index(){
		redirect('pegawai/view');
		
	}
	public function view($halaman="")
	{
		$limit = 4;
		if ($halaman != '') {
			$offset = $halaman;
		}else{
			$offset = 0;
		}
		$data['pegawai'] = $this->mp->getList($limit, $offset);
		$this->load->library('pagination');
		
		$config['base_url'] = base_url('pegawai/view');
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
		$this->load->view('pegawai/view', $data);
		// $data['datpeg'] = $this->mp->getpegawai();
		// $this->load->view('pegawai/view', $data);

	}

	public function tambah(){
		$this->load->view('Pegawai/tambah');
	}

	public function detail($id = null){
		$data['datpeg'] = $this->mp->getpegawai($id);
		$this->load->view('pegawai/detail', $data);

	}

	public function hapus($id = null){
		$data['datpeg'] = $this->mp->deletepegawai($id);
		$this->load->view('pegawai/hapus', $data);

	}
	public function simpan(){
		$param = $this->input->post();
		$proses_simpan = $this->mp->tambahpegawai($param);
		if ($proses_simpan >= 0) {
			redirect('pegawai');
		} else {
			redirect('pegawai/tambah');
		}

	}
	public function update($id = null){
		$data['datpeg'] = $this->mp->details($id);
		$this->load->view('pegawai/update', $data);

	}
	public function simpanupt(){
		$param = $this->input->post();
		$proses_simpan = $this->mp->updatepegawai($param);
		if ($proses_simpan >= 0) {
			redirect('pegawai');
		} else {
			redirect('pegawai/update');
		}

	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */