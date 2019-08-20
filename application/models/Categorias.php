<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Model {
	
	function add($categoria){
		$sql="INSERT INTO categorias(categoria) VALUES(?);";
		$this->db->query($sql,array($categoria));
		return true;
	}
	function delete($id_categoria){
		$sql="DELETE FROM categorias WHERE id=?";
		$this->db->query($sql,array($id_categoria));
		return true;
	}
	function update($id_categoria,$nombre){
		$sql="UPDATE categorias SET categoria=? WHERE id=?";
		$this->db->query($sql,array($nombre,$id_categoria));
		return true;
	}
	function getAll(){
		$sql="SELECT * FROM categorias ORDER BY id";
		$query=$this->db->query($sql);
		if($query->num_rows()>0){
			return $query->result_array();
		}
	}
}

/* End of file Categorias.php */
/* Location: ./application/models/Categorias.php */