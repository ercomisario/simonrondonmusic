<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cvideos extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();	

        $this->load->model('mcontacto');  
        $this->load->model('mvideo');  
	    
	}
	public function index()
	{
		$this->load->view('vcabecera');
		$arreglo['registros'] = $this->mvideo->listar();			
		$this->load->view('vvideos',$arreglo);
		$arreglo2['contactos'] = $this->mcontacto->listar();
        $this->load->view('vpie',$arreglo2);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */