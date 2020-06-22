<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Caudios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	

        $this->load->model('mcontacto');  
        $this->load->model('maudio');  
	    
	}
	public function index()
	{
		$this->load->view('vcabecera');
		$arreglo['registros'] = $this->maudio->listar();			
		$this->load->view('vaudios',$arreglo);
		$arreglo2['contactos'] = $this->mcontacto->listar();
        $this->load->view('vpie',$arreglo2);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */