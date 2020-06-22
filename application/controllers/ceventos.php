<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ceventos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		$this->load->model('mevento');		
		$this->load->model('mcontacto');  
	    
	}
	public function index()
	{
		$this->load->view('vcabecera');

		$arreglo['registro'] = $this->mevento->buscar_principal();		
		$arreglo['registros'] = $this->mevento->listar();		
		
		$this->load->view('veventos',$arreglo);
		$arreglo2['contactos'] = $this->mcontacto->listar();
        $this->load->view('vpie',$arreglo2);
        
	}
	
       
}

