<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hoteles extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Hotelesdb');
	}

	public function index()
	{
		// echo time();
		echo APPPATH . "uploads/";
		$this->load->view('hoteles');
	}

	public function add(){
		$nombre=$this->security->xss_clean(strip_tags($this->input->post('nombre')));
		$provincia=$this->security->xss_clean(strip_tags($this->input->post('provincia')));
		$categoria=$this->security->xss_clean(strip_tags($this->input->post('categoria')));
		$portada=$this->security->xss_clean(strip_tags($this->input->post('portada')));
		$qems=$this->security->xss_clean(strip_tags($this->input->post('qems')));
		$bienvenido=$this->security->xss_clean(strip_tags($this->input->post('bienvenido')));
		$habitaciones=$this->security->xss_clean(strip_tags($this->input->post('habitaciones')));
		$instalaciones=$this->security->xss_clean(strip_tags($this->input->post('instalaciones')));
		$servicios=$this->security->xss_clean(strip_tags($this->input->post('servicios')));
		$accesos=$this->security->xss_clean(strip_tags($this->input->post('accesos')));
		$videinterpretacion=$this->security->xss_clean(strip_tags($this->input->post('videinterpretacion')));
		$faq=$this->security->xss_clean(strip_tags($this->input->post('faq')));
		$created=time();
		$usuario=$this->session->userdata('id_usuario');
		$id_hotel=$this->Hotelesdb->add($nombre, $provincia, $categoria, $portada, $created, $usuario);
		$data=array();
		if(is_bool($id_hotel) && !$id_hotel){
			$data['status']="error";
			$this->sendJson($data);
		}else if(is_numeric($id_hotel)){
			if(!empty($id_hotel)){
				$this->Hotelesdb->addInfoHotel($id_hotel,$qems,$bienvenido,$habitaciones,$instalaciones,$servicios,$accesos,$videinterpretacion,$faq);
			}
			$data['status']="ok";
			$data['id_hotel']=$id_hotel;
			$this->sendJson($data);
		}
	}
	private function sendJson($data){
		header("Content-Type:application/json");
		echo json_encode($data);
	}
	public function update(){
		
	}

	public function delete(){

	}


	public function upload()
	{
		$id=$this->input->post('name');
		$name_dir="uploads/".$id."/";
		if(!is_dir($name_dir)) 
        	mkdir($name_dir, 0777);
	    $config = array();
	    $config["upload_path"] = $name_dir;
	    $config["allowed_types"] = "gif|jpg|jpeg|png";
	    $config["max_size"] = "2000";
	    $config["remove_spaces"] = TRUE;

	    $this->load->library('upload',$config);
	    // $name_file=$file = $_FILES['portada']['name'];
	    if(!$this->upload->do_upload("portada"))
	    {
	        $errors = array('error' => $this->upload->display_errors());
	        die(json_encode($errors));
	        // return $errors;
	    }
	    else
	    {
	        $data = array('upload_data' => $this->upload->data());
	        die(json_encode(array('file' => $data['upload_data']['file_name'])));
	        // return array('file' => $data['upload_data']['file_name']);
	    }
	}
}

/* End of file Hoteles.php */
/* Location: ./application/controllers/Hoteles.php */