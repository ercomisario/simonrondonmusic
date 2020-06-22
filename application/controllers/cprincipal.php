<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cprincipal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		$this->load->model('mevento');		
	    $this->load->model('mvideo');		
	    $this->load->model('maudio');		
	    $this->load->model('mfoto');		
	    $this->load->model('mcontacto');  
	}
	public function index()
	{
		$this->load->view('vcabecera');
		$arreglo['registro_evento'] = $this->mevento->buscar_principal();			
		$arreglo['registro_video'] = $this->mvideo->buscar_principal();			
		$arreglo['registro_audio'] = $this->maudio->buscar_principal();			
		$arreglo['registro_foto'] = $this->mfoto->buscar_principal();			
		$this->load->view('vprincipal',$arreglo);		
		$arreglo2['contactos'] = $this->mcontacto->listar();
        $this->load->view('vpie',$arreglo2);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */