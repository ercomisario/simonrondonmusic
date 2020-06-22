<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clogin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	

    	$this->load->model('musuario');	
      $this->load->model('mevento');  
      $this->load->model('mvideo');   
      $this->load->model('maudio');   
      $this->load->model('mfoto');   
      $this->load->model('mcontacto');  
	    
	}
	public function index($resultado=FALSE)
  {
    
      $dataSession=$this->session->userdata('usuario');
      $arreglo1['resultado'] = $resultado;
      $this->load->view('vcabecera',$arreglo1);
      $arreglo['registro_evento'] = $this->mevento->buscar_principal();     
      $arreglo['registro_video'] = $this->mvideo->buscar_principal();      
      $arreglo['registro_audio'] = $this->maudio->buscar_principal();   
      $arreglo['registro_foto'] = $this->mfoto->buscar_principal();   
      $this->load->view('vprincipal',$arreglo);
      $arreglo2['contactos'] = $this->mcontacto->listar();
      $this->load->view('vpie',$arreglo2);
    
    
  }
	
	function validar()     
  {                        
        $data['tx_usuario'] = $this->input->post('tx_usuario'); 
        $data['tx_clave'] = $this->input->post('tx_clave'); 
                
        $resp = $this->musuario->validar($data);
        //$this->listar($data); 
        if($resp==1)
          $this->index(1);
        else
          $this->index(2);

        
  }
  public function logout()
  {
      $this->session->sess_destroy();
      redirect('cprincipal');
  }

 
       
}

