<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ccontacto extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	

        $this->load->model('mcontacto');  
        $this->load->library('email');
	    
	}
	public function index()
	{
		$this->load->view('vcabecera');
		$this->load->view('vcontacto');
		$arreglo2['contactos'] = $this->mcontacto->listar();
        $this->load->view('vpie',$arreglo2);
	}
	public function enviarCorreo()
	{
		$tx_nombre = $this->input->post('tx_nombre'); 
		$tx_telefono = $this->input->post('tx_telefono'); 
		$tx_titulo = $this->input->post('tx_titulo'); 
		$tx_mensaje = $this->input->post('tx_mensaje'); 
		$tx_email = $this->input->post('tx_email'); 

		$htmlContent = '<h1>Ha recibido un mensaje de: '.$tx_nombre .'</h1>';
		$htmlContent .= '<p>Titulo: '.$tx_titulo.'<br>';
		$htmlContent .= 'Telefono: '.$tx_telefono.'<br>';
		$htmlContent .= 'Correo: '.$tx_email.'<br>';
		$htmlContent .= 'Mensaje: '.$tx_mensaje.'</p>';
		//die($htmlContent);
		$config = array(
		 'protocol'  => 'smtp',
		 'smtp_host' => "167.175.55.149",
		 //'smtp_host' => "host.caracashosting55.com",
		 'mailtype'  => 'html',
		 'charset'   => 'utf-8',
		 'newline'   => "\r\n"
		);    
		
		$this->email->initialize($config);
		//$recipientArr = array('info@simonrondonmusic.com','norelysrondon@gmail.com','belizarioja@gmail.com');
		//$recipientArr = array('belizarioja@gmail.com','belizarioj@pdvsa.com');
		$recipientArr = array('belizarioj@pdvsa.com','belizarioja@gmail.com');
		$this->email->to($recipientArr);
		//$this->email->to('info@simonrondonmusic.com','norelysrondon@gmail.com','belizarioja@gmail.com');
		$this->email->from($tx_email,$tx_nombre);
		$this->email->subject($tx_titulo.'- Enviado desde SimonRondonMusic.com');
		$this->email->message($htmlContent);
		$this->email->send();
		//var_dump($this->email->print_debugger());
		$this->index();       
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */