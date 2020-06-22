<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cadminusuarios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	

    	$this->load->model('mcontacto');	
      $this->load->model('musuario');  
	    
	}
	public function index()
	{
		$this->load->view('vcabecera');
		$arreglo['registros'] = $this->musuario->listar();
		$this->load->view('vadminusuarios',$arreglo);
    $arreglo2['contactos'] = $this->mcontacto->listar();
    $this->load->view('vpie',$arreglo2);
        
	}
	public function listar($data)     
  {                             
		$arreglo = $this->musuario->listar($data);
		if($arreglo!== FALSE) {
               
		$i=-1;
		foreach ($arreglo as $row) 
		{
      $tx_habilitado='Habilitado';
      if($row->in_habilitado==2)$tx_habilitado='Inhabilitado';
		  $i++;
		  ?>                       
			            <tr>
                          	<td><?php echo $row->co_usuario;?><input type="hidden" name="cod<?php echo $i;?>" id="cod<?php echo $i;?>" value="<?php echo $row->co_usuario;?>" /></td>
                            <td><?php echo $row->tx_nombre;?><input type="hidden" name="text<?php echo $i;?>" id="text<?php echo $i;?>" value="<?php echo $row->tx_nombre;?>" /></td>
                            <td><?php echo $row->tx_usuario;?><input type="hidden" name="usu<?php echo $i;?>" id="usu<?php echo $i;?>" value="<?php echo $row->tx_usuario;?>" /></td>
                            <td><?php echo $row->tx_clave;?><input type="hidden" name="cla<?php echo $i;?>" id="cla<?php echo $i;?>" value="<?php echo $row->tx_clave;?>" /></td>
                            <td><?php echo $tx_habilitado;?><input type="hidden" name="hab<?php echo $i;?>" id="hab<?php echo $i;?>" value="<?php echo $row->in_habilitado;?>" /></td>
                            <td><a href="javascript:mostrarEditar(<?php echo $i;?>);"><i class="small material-icons center blue-text darken-4">border_color</i></a></td>
                            <td><a href="javascript:mostrarEliminar(<?php echo $i;?>);"><i class="small material-icons center red-text">delete_forever</i></a></td>
                        </tr>
         <?php 
        }
        }          
                          
  }
  
  function ingresar()     
  {                        
        $data['tx_nombre'] = strtoupper($this->input->post('tx_nombre_add')); 
        $data['tx_usuario'] = $this->input->post('tx_usuario_add'); 
        $data['tx_clave'] = $this->input->post('tx_clave_add'); 
        $data['in_habilitado'] = 1;                
        $data['co_permisologia'] = 1;                
        $resp = $this->musuario->ingresar($data);
        $this->index();       
        
  }

  function actualizar()     
  {                        
        $data['co_usuario'] = $this->input->post('co_usuario_upd'); 
        $data['tx_nombre'] = strtoupper($this->input->post('tx_nombre_upd')); 
        $data['tx_usuario'] = $this->input->post('tx_usuario_upd'); 
        $data['tx_clave'] = $this->input->post('tx_clave_upd'); 
        $data['in_habilitado'] = $this->input->post('in_habilitado_upd');
        $resp = $this->musuario->actualizar($data);
        $this->index();    
        
  }
  function eliminar()     
  {         
        $data['co_usuario'] = $this->input->post('co_usuario'); 
        $resp = $this->musuario->eliminar($data);
        $this->listar($data);    
           
  }
	
       
}

