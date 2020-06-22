<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cadmineventos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	

    	$this->load->model('mevento');	
        $this->load->model('mcontacto');  
	    
	}
	public function index()
	{
		$this->load->view('vcabecera');
		$arreglo['registros'] = $this->mevento->listar();		
		$this->load->view('vadmineventos',$arreglo);
        $arreglo2['contactos'] = $this->mcontacto->listar();
        $this->load->view('vpie',$arreglo2);
        
	}
	public function listar($data)     
  {                             
		$arreglo = $this->mevento->listar($data);
		if($arreglo!== FALSE) {
               
		$i=-1;
		foreach ($arreglo as $row) 
		{
		$i++;
		?>                       
			<tr>
                          	<td><?php echo $row->co_evento;?><input type="hidden" name="cod<?php echo $i;?>" id="cod<?php echo $i;?>" value="<?php echo $row->co_evento;?>" /></td>
                          	<td><?php echo $row->tx_evento;?><input type="hidden" name="text<?php echo $i;?>" id="text<?php echo $i;?>" value="<?php echo $row->tx_evento;?>" /></td>
                          	<td><?php echo $row->tx_descripcion;?><input type="hidden" name="desc<?php echo $i;?>" id="desc<?php echo $i;?>" value="<?php echo $row->tx_descripcion;?>" /></td>
                          	<td><?php echo $row->fe_evento;?><input type="hidden" name="fecha<?php echo $i;?>" id="fecha<?php echo $i;?>" value="<?php echo $row->fe_evento;?>" /></td>
                          	<td><?php echo $row->h_evento;?><input type="hidden" name="hora<?php echo $i;?>" id="hora<?php echo $i;?>" value="<?php echo $row->h_evento;?>" /></td>
                          	<td><img src="<?php echo base_url();?>uploads/eventos/<?php echo $row->tx_imagen;?>" width="50px" class="img-responsive" ><input type="hidden" name="img<?php echo $i;?>" id="img<?php echo $i;?>" value="<?php echo $row->tx_imagen;?>" /></td>
                            <td><?php echo $row->tx_habilitado;?><input type="hidden" name="hab<?php echo $i;?>" id="hab<?php echo $i;?>" value="<?php echo $row->in_habilitado;?>" /></td>
                            <td><a href="javascript:mostrarEditar(<?php echo $i;?>);"><i class="small material-icons center blue-text darken-4">border_color</i></a></td>
                          	<td><a href="javascript:mostrarEliminar(<?php echo $i;?>);"><i class="small material-icons center red-text">delete_forever</i></a></td>
                      	</tr>
                <?php 
        }
        }          
                          
  }
  private function formatearFecha($fecha)
  {
	         $partesFecha = explode("/", $fecha);
	         $nuevaFecha = $partesFecha[2]."-".$partesFecha[1]."-".$partesFecha[0];
	         return $nuevaFecha;
  }
  function ingresar()     
  {                        
        $data['tx_evento'] = $this->input->post('tx_evento_add'); 
        $data['tx_descripcion'] = $this->input->post('tx_descripcion_add'); 
        $fechaFormateada = $this->formatearFecha($this->input->post("fe_evento_add"));
        $data['fe_evento'] = $fechaFormateada; 
        $data['h_evento'] = $this->input->post('h_evento_add'); 
        if(!empty($_FILES['tx_imagen_add']['name']))
        {
            $upload = $this->_do_upload();
            $data['tx_imagen'] = $upload['file_name'];
        }
        else
        {
            $data['tx_imagen'] = 'no_imagen.jpg';
        }


        $data['in_habilitado'] = 1;
                
        $resp = $this->mevento->ingresar($data);
        //$this->listar($data); 
        $this->index();       
        
  }

  function actualizar()     
  {                        
        $data['co_evento'] = $this->input->post('co_evento_upd'); 
        $data['tx_evento'] = $this->input->post('tx_evento_upd'); 
        $data['tx_descripcion'] = $this->input->post('tx_descripcion_upd'); 
        $fechaFormateada = $this->formatearFecha($this->input->post("fe_evento_upd"));
        $data['fe_evento'] = $fechaFormateada; 
        $data['h_evento'] = $this->input->post('h_evento_upd'); 
        if(!empty($_FILES['tx_imagen_upd']['name']))
        {
            $upload = $this->_do_update();
            $data['tx_imagen'] = $upload['file_name'];
        }
        else
        {
            $data['tx_imagen'] = $this->input->post('tx_imagen_upd_ant');
        }
        
        $data['in_habilitado'] = $this->input->post('in_habilitado_upd');
        $resp = $this->mevento->actualizar($data);
        $this->index();    
        
    }

    private function _do_upload()
    {
        $config['upload_path']          = $_SERVER['DOCUMENT_ROOT'].CARPETA.'uploads/eventos/';
        //$config['upload_path']          = base_url().'uploads/';
        
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 700; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
 
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
 
        if(!$this->upload->do_upload('tx_imagen_add')) //upload and validate
        {
            $data['inputerror'][] = 'tx_imagen_add';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }
    private function _do_update()
    {
        $config['upload_path']          = $_SERVER['DOCUMENT_ROOT'].CARPETA.'uploads/eventos/';
        //$config['upload_path']          = base_url().'uploads/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 700; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
 
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
 
        if(!$this->upload->do_upload('tx_imagen_upd')) //upload and validate
        {
            $data['inputerror'][] = 'tx_imagen_upd';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }
    function eliminar()     
    {         
            $data['co_evento'] = $this->input->post('co_evento');
            $resp = $this->mevento->eliminar($data);
            $this->listar($data);    
           
    }
	
       
}

