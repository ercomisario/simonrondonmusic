<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cadminvideos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	

    	$this->load->model('mvideo');	
        $this->load->model('mcontacto');  
	    
	}
	public function index()
	{
		$this->load->view('vcabecera');
		$arreglo['registros'] = $this->mvideo->listar();		
		$this->load->view('vadminvideos',$arreglo);
        $arreglo2['contactos'] = $this->mcontacto->listar();
        $this->load->view('vpie',$arreglo2);
        
	}
	public function listar($data)     
  {                             
		$arreglo = $this->mvideo->listar($data);
		if($arreglo!== FALSE) {
               
		$i=-1;
		foreach ($arreglo as $row) 
		{
		$i++;
		?>                       
			<tr>
                          	<td><?php echo $row->co_video;?><input type="hidden" name="cod<?php echo $i;?>" id="cod<?php echo $i;?>" value="<?php echo $row->co_video;?>" /></td>
                            <td><?php echo $row->tx_nombre;?><input type="hidden" name="text<?php echo $i;?>" id="text<?php echo $i;?>" value="<?php echo $row->tx_nombre;?>" /></td>
                            <td>
                              <input type="hidden" name="vid<?php echo $i;?>" id="vid<?php echo $i;?>" value="<?php echo $row->tx_video;?>" />
                                <video class="responsive-video" controls width="200" height="200" >
                                  <source src="<?php echo base_url();?>uploads/videos/<?php echo $row->tx_video;?>" type="video/mp4" />
                                </video>                               
                            </td>
                            <td><?php echo $row->tx_habilitado;?><input type="hidden" name="hab<?php echo $i;?>" id="hab<?php echo $i;?>" value="<?php echo $row->in_habilitado;?>" /></td>
                            <td><a href="javascript:mostrarEditar(<?php echo $i;?>);"><i class="small material-icons center blue-text darken-4">border_color</i></a></td>
                            <td><a href="javascript:mostrarEliminar(<?php echo $i;?>);"><i class="small material-icons center red-text">delete_forever</i></a></td>
                        </tr>
                <?php 
        }
        }          
                          
  }
  function ingresar()     
  {                        
        $data['tx_nombre'] = $this->input->post('tx_nombre_add'); 
        if(!empty($_FILES['tx_video_add']['name']))
        {
            $upload = $this->_do_upload();
            $data['tx_video'] = $upload['file_name'];
        }
        else
        {
            $data['tx_video'] = 'no_imagen.jpg';
        }


        $data['in_habilitado'] = 1;
                
        $resp = $this->mvideo->ingresar($data);
        //$this->listar($data); 
        $this->index();       
        
  }

  function actualizar()     
  {                        
        $data['co_video'] = $this->input->post('co_video_upd'); 
        $data['tx_nombre'] = $this->input->post('tx_nombre_upd'); 
        $data['tx_descripcion'] = $this->input->post('tx_descripcion_upd'); 
        
        if(!empty($_FILES['tx_video_upd']['name']))
        {
            $upload = $this->_do_update();
            $data['tx_video'] = $upload['file_name'];
        }
        else
        {
            $data['tx_video'] = $this->input->post('tx_video_upd_ant');
        }
        
        $data['in_habilitado'] = $this->input->post('in_habilitado_upd');
        $resp = $this->mvideo->actualizar($data);
        $this->index();    
        
    }

    private function _do_upload()
    {
        //
        $config['overwrite'] = FALSE;
        $config['remove_spaces'] = TRUE;
        $config['upload_path']          = $_SERVER['DOCUMENT_ROOT'].CARPETA.'uploads/videos/';
        //$config['upload_path']          = base_url().'uploads/';
        
        $config['allowed_types']        = 'avi|3gp|flv|wmv|mp3|mp4';
        $config['max_size']             = 60000; //set max size allowed in Kilobyte
        //$config['max_width']            = 1000; // set max width image allowed
        //$config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
 
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
 
        if(!$this->upload->do_upload('tx_video_add')) //upload and validate
        {
            $data['inputerror'][] = 'tx_video_add';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }
    private function _do_update()
    {
        $config['upload_path']          = $_SERVER['DOCUMENT_ROOT'].CARPETA.'uploads/videos/';
        //$config['upload_path']          = base_url().'uploads/';
        $config['allowed_types']        = 'avi|flv|wmv|mp3|mp4';
        $config['max_size']             = 60000; //set max size allowed in Kilobyte
        //$config['max_width']            = 1000; // set max width image allowed
        //$config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
 
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
 
        if(!$this->upload->do_upload('tx_video_upd')) //upload and validate
        {
            $data['inputerror'][] = 'tx_video_upd';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }
    function eliminar()     
    {         
            $data['co_video'] = $this->input->post('co_video');
            $resp = $this->mvideo->eliminar($data);
            $this->listar($data);    
           
    }
	
       
}

