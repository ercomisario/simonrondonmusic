<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cbibliografia extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	

        $this->load->model('mcontacto');  
        $this->load->model('mbibliografia');  
	    
	}
	public function index()
	{
		$this->load->view('vcabecera');
		$arreglo['registros'] = $this->mbibliografia->listar();
		$this->load->view('vbibliografia',$arreglo);
		$arreglo2['contactos'] = $this->mcontacto->listar();
        $this->load->view('vpie',$arreglo2);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */