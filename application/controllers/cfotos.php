<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cfotos extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();	

        $this->load->model('mcontacto');  
        $this->load->model('malbun');  
        $this->load->model('mfoto'); 
	    
	}
	public function index()
	{
		$this->load->view('vcabecera');
		$arreglo['registros'] = $this->malbun->listar();    
	    $arreglo['registros_fotos'] = $this->mfoto->listar();    
	    $this->load->view('vfotos',$arreglo);
		$arreglo2['contactos'] = $this->mcontacto->listar();
        $this->load->view('vpie',$arreglo2);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */