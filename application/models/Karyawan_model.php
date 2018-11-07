<?php

class Karyawan_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		
		//$this->load->model('log_model');
	}	
	
	function showData($where = null,$like = null,$order_by = null,$limit = null, $fromLimit=null){
		
		$this->db->select("*");		
		if($where){
			$this->db->where($where);
		}		
		if($like){
			$this->db->like($like);
		}		
		if($order_by){
			$this->db->order_by($order_by);
		}			
		return $this->db->get("m_karyawan",$limit,$fromLimit)->result();
	}
	
	function getCount($where = null,$like = null,$order_by = null,$limit = null, $fromLimit=null){
		$this->db->select("*");		
		if($where){
			$this->db->where($where);
		}		
		if($like){
			$this->db->like($like);
		}
		return $this->db->get("m_karyawan",$limit,$fromLimit)->num_rows();
	}
	
	function getData($where){
		$this->db->select("*");		
		$this->db->where($where);		
		return $this->db->get("m_karyawan")->row();
	}
	
	
	function getPrimaryKeyMax(){
		$query = $this->db->query('select max(id_karyawan) as MAX from m_karyawan') ;
		return $query->row();		
	}
	
	function insert($data){
		$this->db->insert('m_karyawan', $data);	
	}
	function update($where,$data){		
		$this->db->where($where);		
		$this->db->update('m_karyawan', $data);
	}
	function delete($where){
		$this->db->where($where);
		$this->db->delete('m_karyawan');		
	}
}

?>
