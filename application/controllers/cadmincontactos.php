<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cadmincontactos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	

    	$this->load->model('mcontacto');	
	    
	}
	public function index()
	{
		$this->load->view('vcabecera');
		$arreglo['registros'] = $this->mcontacto->listar();
		$this->load->view('vadmincontactos',$arreglo);
    $arreglo2['contactos'] = $arreglo['registros'];
    $this->load->view('vpie',$arreglo2);
        
	}
	public function listar($data)     
  {                             
		$arreglo = $this->mcontacto->listar($data);
		if($arreglo!== FALSE) {
               
		$i=-1;
		foreach ($arreglo as $row) 
		{
      $tx_habilitado='Habilitado';
      if($row->in_habilitado==2)$tx_habilitado='Inhabilitado';
		  $i++;
		  ?>                       
			            <tr>
                          	<td><?php echo $row->co_contacto;?><input type="hidden" name="cod<?php echo $i;?>" id="cod<?php echo $i;?>" value="<?php echo $row->co_contacto;?>" /></td>
                            <td><?php echo $row->tx_contacto;?><input type="hidden" name="text<?php echo $i;?>" id="text<?php echo $i;?>" value="<?php echo $row->tx_contacto;?>" /></td>
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
        $data['tx_contacto'] = $this->input->post('tx_contacto_add'); 
        $data['in_habilitado'] = 1;                
        $resp = $this->mcontacto->ingresar($data);
        $this->index();       
        
  }

  function actualizar()     
  {                        
        $data['co_contacto'] = $this->input->post('co_contacto_upd'); 
        $data['tx_contacto'] = $this->input->post('tx_contacto_upd'); 
        $data['in_habilitado'] = $this->input->post('in_habilitado_upd');
        $resp = $this->mcontacto->actualizar($data);
        $this->index();    
        
  }
  function eliminar()     
  {         
        $data['co_contacto'] = $this->input->post('co_contacto');
        $resp = $this->mcontacto->eliminar($data);
        $this->listar($data);    
           
  }
	
       
}

