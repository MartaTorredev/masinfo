<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Model {
	function getUsuario($usuario,$pass){
		$sql="SELECT * FROM usuarios WHERE (usuario=? or email=?) AND pass=?";
		$query=$this->db->query($sql,array($usuario,$usuario,$pass));
		if($query->num_rows()>0){
			foreach ($query->result() as $row) {
				$array = array(
					'usuario' => $row->usuario,
					'id_usuario' => $row->id,
					'privilegio' => $row->privilegio,
				);
				$this->session->set_userdata($array);
				$this->session->set_flashdata('msg', 'Bienvenido al sistema '.$row->usuario);
				// echo "Existe";
			}
		}else{
			$this->session->set_flashdata('error', 'Usuario o contraseña invalidos');
			// echo "No Existe";
		}
	}

}

/* End of file Usuarios.php */
/* Location: ./application/models/Usuarios.php */