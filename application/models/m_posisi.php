<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_posisi extends CI_Model {

	public function getposisi($id = null){
		$sql = "select * from posisi";
		if($id){
			$sql .= " where id={$id}";
		}
		$query = $this->db->query($sql);
	// $query = $this->db->get('posisi');
		if ($id) {
			return $query->row();
		}else{

			return $query->result();
		}
	}
	public function deleteposisi($id = null){
		$sql = "delete from posisi";
		if($id){
			$sql .= " where id='{$id}'";
		}
		$query = $this->db->query($sql);
		return $query;
	// $query = $this->db->get('posisi');
	}
	public function tambahposisi($id=""){
		// $id['id_posisi'] = $this->
		$object = [
			'id' 		=> $this->totalRows() +1,
			'nama' 	=> $id['nama']
		];

		$this->db->insert('posisi', $object);
		// $query = $this->db->query($sql);
		return $this->db->affected_rows();
	// $query = $this->db->get('posisi');
	}
	public function updateposisi($id=""){
		$object = [
			'nama' => $id['nama']
		];
		$this->db->where('id', $id['id']);
		$this->db->update('posisi', $object);
		return $this->db->affected_rows();
	}
	public function getList($limit, $offset)
	{
		$this->db->order_by('id', 'ASC');
		$data = $this->db->get('posisi', $limit, $offset ); 
		
		return $data->result();
	}
	public function details($id){
		$this->db->where('id', $id);
		$data = $this->db->get('posisi');
		return $data->row();
	}	
	public function totalRows()
	{
		$data = $this->db->get('posisi'); 
		
		return $data->num_rows();
	}

}

/* End of file m_posisi.php */
/* Location: ./application/models/m_posisi.php */