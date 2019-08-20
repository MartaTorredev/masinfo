<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('Usuarios','Categorias','Provincias'));
		$logeado=$this->session->userdata('usuario');
		$current_site=current_url();
		$base_url=base_url();
		$current_site=explode($base_url, $current_site);
		$current_site=$current_site[1];
		// echo $current_site!="admin/login";
		// echo $current_site;
		// return;
		if(strlen($logeado)==0 && $current_site!="index.php/admin/login"){
			redirect('admin/login','refresh');
		}
	}

	public function index()
	{
		$this->load->view('admin');
	}

	private function sendJson($data){
		header("Content-Type:application/json");
		echo json_encode($data);
	}

	public function categorias(){
		$this->load->view('categorias');
	}

	public function categoria_add(){
		$categoria=$this->input->post('nombre_categoria');
		$estatus=$this->Categorias->add($categoria);
		if($estatus){
			$data['status']="ok";
			$this->sendJson($data);
		}
	}

	public function categoria_delete(){
		$id_categoria=$this->input->post('id_categoria');
		$status=$this->Categorias->delete($id_categoria);
		if($status){
			$this->sendJson(array("status"=>"ok"));
		}
	}
	public function categoria_update(){
		$id_categoria=$this->input->post('id_categoria');
		$nombre=$this->input->post('nombre');
		$status=$this->Categorias->update($id_categoria,$nombre);
		if($status){
			$this->sendJson(array("estatus"=>"ok"));
		}
	}
	public function categoria_getAll(){
		$data['categorias']=$this->Categorias->getAll();
		$this->sendJson($data);
	}
	/*********************Provincias**************************/
	public function provincias(){
		$this->load->view('provincias');
	}

	public function provincia_add(){
		$provincia=$this->input->post('nombre_provincia');
		$estatus=$this->Provincias->add($provincia);
		if($estatus){
			$data['status']="ok";
			$this->sendJson($data);
		}
	}

	public function provincia_delete(){
		$id_provincia=$this->input->post('id_provincia');
		$status=$this->Provincias->delete($id_provincia);
		if($status){
			$this->sendJson(array("status"=>"ok"));
		}
	}
	public function provincia_update(){
		$id_provincia=$this->input->post('id_provincia');
		$nombre=$this->input->post('nombre');
		$status=$this->Provincias->update($id_provincia,$nombre);
		if($status){
			$this->sendJson(array("estatus"=>"ok"));
		}
	}
	public function provincia_getAll(){
		$data['provincias']=$this->Provincias->getAll();
		$this->sendJson($data);
	}


	/****************************Login******************************/
	public function login(){
		//Si la peticion HTTP es de tipo POST prodedo a logear al usuario
		if(strcasecmp($this->input->method(TRUE),"POST")==0){
			$usuario=$this->security->xss_clean(strip_tags($this->input->post('user')));
			$contrasena=$this->security->xss_clean(strip_tags($this->input->post('pass')));
			// echo $usuario."--".$contrasena;
			// return;
			$this->Usuarios->getUsuario($usuario,$contrasena);
			$loginEstatus=$this->session->userdata('usuario');
			// echo $loginEstatus;
			// return;
			if(strlen($loginEstatus)==0){
				redirect('admin/login','refresh');
			}else{
				redirect("admin/",'refresh');
			}

		}elseif(strcasecmp($this->input->method(TRUE), "GET")==0){
			$this->load->view('login');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('admin/login','refresh');
	}
}

/* End of file menu.php */
/* Location: ./application/controllers/menu.php */