<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kota extends CI_Model {

	public function getkota($id = null){
		$sql = "select * from kota";
		if($id){
			$sql .= " where id_kota={$id}";
		}
		$query = $this->db->query($sql);
	// $query = $this->db->get('kota');
		if ($id) {
			return $query->row();
		}else{

			return $query->result();
		}
	}
	public function deletekota($id = null){
		$sql = "delete from kota";
		if($id){
			$sql .= " where id_kota='{$id}'";
		}
		$query = $this->db->query($sql);
		return $query;
	// $query = $this->db->get('kota');
	}
	public function tambahkota($id=""){
		// $id['id_kota'] = $this->
		$object = [
			'id_kota' 		=> $this->totalRows() +1,
			'nama_kota' 	=> $id['nama_kota']
		];

		$this->db->insert('kota', $object);
		// $query = $this->db->query($sql);
		return $this->db->affected_rows();
	// $query = $this->db->get('kota');
	}
	public function updatekota($id=""){
		$object = [
			'nama_kota' => $id['nama_kota']
		];
		$this->db->where('id_kota', $id['id_kota']);
		$this->db->update('kota', $object);
		return $this->db->affected_rows();
	}
	public function getList($limit, $offset)
	{
		$this->db->order_by('id_kota', 'ASC');
		$data = $this->db->get('kota', $limit, $offset ); 
		
		return $data->result();
	}
	public function details($id){
		$this->db->where('id_kota', $id);
		$data = $this->db->get('kota');
		return $data->row();
	}	
	public function totalRows()
	{
		$data = $this->db->get('kota'); 
		
		return $data->num_rows();
	}

}

/* End of file m_kota.php */
/* Location: ./application/models/m_kota.php */