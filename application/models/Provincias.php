<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provincias extends CI_Model {
	
	function add($provincia){
		$sql="INSERT INTO provincias(provincia) VALUES(?);";
		$this->db->query($sql,array($provincia));
		return true;
	}
	function delete($id_provincia){
		$sql="DELETE FROM provincias WHERE id=?";
		$this->db->query($sql,array($id_provincia));
		return true;
	}
	function update($id_provincia,$nombre){
		$sql="UPDATE provincias SET provincia=? WHERE id=?";
		$this->db->query($sql,array($nombre,$id_categoria));
		return true;
	}
	function getAll(){
		$sql="SELECT * FROM provincias ORDER BY id";
		$query=$this->db->query($sql);
		if($query->num_rows()>0){
			return $query->result_array();
		}
	}
}

/* End of file Provincias.php */
/* Location: ./application/models/Provincias.php */