<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Hotelesdb');
	}

	public function index()
	{
		$this->load->view('app');
	}

	public function menu(){
		$this->load->view('menu');
	}

	public function search(){
		$query=$this->security->xss_clean(strip_tags($this->input->post('search')));
		$data['hoteles']=$this->Hotelesdb->search($query);
		$this->load->view('search', $data);
	}

	public function hotel($id=''){
		if(!empty($id) && is_numeric($id)){
			$data=array();
			$data['hotel']=$this->Hotelesdb->getInfoHotel($id);
			$this->load->view('hotel', $data);
		}
	}
}

/* End of file app.php */
/* Location: ./application/controllers/app.php */