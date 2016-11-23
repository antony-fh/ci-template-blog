<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model {

	public function getpegawai($id = null){
		$sql = "select * from pegawai";
		if($id){
			$sql .= " where id_pegawai={$id}";
		}
		$query = $this->db->query($sql);
	// $query = $this->db->get('pegawai');
		if ($id) {
			return $query->row();
		}else{

			return $query->result();
		}
	}
	public function deletepegawai($id = null){
		$sql = "delete from pegawai";
		if($id){
			$sql .= " where id_pegawai='{$id}'";
		}
		$query = $this->db->query($sql);
		return $query;
	// $query = $this->db->get('pegawai');
	}
	public function tambahpegawai($id=""){
		$object = [
			'nama' 		=> $id['nama'],
			'telepon' 	=> $id['telepon']
		];

		$this->db->insert('pegawai', $object);
		// $query = $this->db->query($sql);
		return $this->db->affected_rows();
	// $query = $this->db->get('pegawai');
	}
	public function updatepegawai($id=""){
		// $object = [
		// 	'nama' 		=> $id['nama'],
		// 	'telepon' 	=> $id['telepon']
		// ];
		$this->db->where('id_pegawai', $id['id_pegawai']);
		$this->db->update('pegawai', $id);
		// $query = $this->db->query($sql);
		return $this->db->affected_rows();
	// $query = $this->db->get('pegawai');
	}
	public function getList($limit, $offset)
	{
		$data = $this->db->get('pegawai', $limit, $offset ); 
		
		return $data->result();
	}
	public function details($id){
		$this->db->where('id_pegawai', $id);
		$data = $this->db->get('pegawai');
		return $data->row();
	}	
	public function totalRows()
	{
		$data = $this->db->get('pegawai'); 
		
		return $data->num_rows();
	}

}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */