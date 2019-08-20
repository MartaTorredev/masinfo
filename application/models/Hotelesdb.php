<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Initialize the database
 *
 * @category	Models
 * @author	Enmanuel Molina(Mague)
 */
class Hotelesdb extends CI_Model {

	/**
 	 * @author	Enmanuel Molina(Mague)	 
	 * Busca hoteles que coincidan con el parametro ingresado,
	 * bien sea por nombre, provincia o categoria
	 * @param  String $q query
	 * @return Array  Resultados de la busqueda
	 */
	function search($q){
		$sql="SELECT hoteles.nombre,hoteles.portada,hoteles.id FROM hoteles,provincias,categorias WHERE nombre LIKE '".$this->db->escape_like_str($q)."%' OR provincias.provincia LIKE '".$this->db->escape_like_str($q)."%' OR categorias.categoria LIKE '".$this->db->escape_like_str($q)."%' GROUP BY hoteles.id";
		$query=$this->db->query($sql);
		if($query->num_rows()>0){
			return $query->result_array();
		}
	}

	function add($nombre, $provincia, $categoria, $portada, $created, $usuario){
		$sql="INSERT INTO hoteles(nombre, provincia, categoria, portada, created, usuario) VALUES (?,?,?,?,?,?)";
		$exist=$this->exist($nombre,$provincia,$categoria);
		if(!$exist){
			$this->db->query($sql,array($nombre, $provincia, $categoria, $portada, $created, $usuario));
			$id=$this->getIdHotel($nombre,$provincia,$categoria,$created,$usuario);
			return $id;			
		}
		return false;
	}
	function getIdHotel($nombre,$provincia,$categoria,$created,$usuario){
		$sql="SELECT id FROM hoteles WHERE nombre=? AND provincia=? AND categoria=? AND created=? AND usuario=?";
		$query=$this->db->query($sql,array($nombre,$provincia,$categoria,$created,$usuario));
		if($query->num_rows()>0){
			foreach ($query->result() as $row) {
				return $row->id;
			}
		}
	}
	function update($nombre,$provincia,$categoria,$portada,$usuario,$id){
		$sql="UPDATE hoteles SET nombre=?,provincia=?,categoria=?,portada=?,usuario=? WHERE id=?";
		$this->db->query($sql,array($nombre,$provincia,$categoria,$portada,$usuario,$id));
		return true;
	}
	function delete($id){
		$sql="DELETE FROM hoteles WHERE id=?";
		$this->db->query($sql,array($id));
		return true;
	}

	function exist($nombre,$provincia,$categoria){
		$sql="SELECT id FROM hoteles WHERE nombre=? AND provincia=? AND categoria=?";
		$query=$this->db->query($sql,array($nombre,$provincia,$categoria));
		if($query->num_rows()>0){
			return true;
		}
	}

	function addInfoHotel($id_hotel,$qems,$bienvenido,$habitaciones,$instalaciones,$servicios,$accesos,$videinterpretacion,$faq){
		$sql="INSERT INTO info_hoteles(hotel, qems, bienvenido, nuestras_habitaciones, instalaciones, servicios, accesos_y_entornos, videInterpretacion, faq) VALUES (?,?,?,?,?,?,?,?,?)";
		$haveInfo=$this->haveInfoHotel($id_hotel);
		if(!$haveInfo){
			$this->db->query($sql,array($id_hotel,$qems,$bienvenido,$habitaciones,$instalaciones,$servicios,$accesos,$videinterpretacion,$faq));
			return true;
		}
		return false;

	}

	function haveInfoHotel($id_hotel){
		$sql="SELECT id FROM info_hoteles WHERE hotel=?";
		$query=$this->db->query($sql,array($id_hotel));
		if($query->num_rows()>0){
			return true;
		}
	}
	function getInfoHotel($id){
		$sql="SELECT * FROM info_hoteles WHERE hotel=?";
		$query=$this->db->query($sql,array($id));
		// print_r($query);
		if($query->num_rows()>0){
			return $query->result_array();
		}
	}
}

/* End of file Hoteles.php */
/* Location: ./application/models/Hoteles.php */