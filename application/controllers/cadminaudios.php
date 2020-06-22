<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cadminaudios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	

    	$this->load->model('maudio');	
        $this->load->model('mcontacto');  
	    
	}
	public function index()
	{
		$this->load->view('vcabecera');
		$arreglo['registros'] = $this->maudio->listar();		
		$this->load->view('vadminaudios',$arreglo);
        $arreglo2['contactos'] = $this->mcontacto->listar();
        $this->load->view('vpie',$arreglo2);
        
	}
	public function listar($data)     
  {                             
		$arreglo = $this->maudio->listar($data);
		if($arreglo!== FALSE) {
               
		$i=-1;
		foreach ($arreglo as $row) 
		{
		$i++;
		?>                       
			<tr>
                          	<td><?php echo $row->co_audio;?><input type="hidden" name="cod<?php echo $i;?>" id="cod<?php echo $i;?>" value="<?php echo $row->co_audio;?>" /></td>
                            <td><?php echo $row->tx_nombre;?><input type="hidden" name="text<?php echo $i;?>" id="text<?php echo $i;?>" value="<?php echo $row->tx_nombre;?>" /></td>
                            <td>
                              <input type="hidden" name="aud<?php echo $i;?>" id="aud<?php echo $i;?>" value="<?php echo $row->tx_audio;?>" />
                                <audio class='responsive-audio' controls width="100" height="50" >
                                  <source src="<?php echo base_url();?>uploads/audios/<?php echo $row->tx_audio;?>" type="audio/mp3" />

                                </audio>                               
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
        //die ($_FILES['tx_audio_add']['name']);
        if(!empty($_FILES['tx_audio_add']['name']))
        {
            //die($data['tx_nombre']);
            $upload = $this->_do_upload();
            $data['tx_audio'] = $upload['file_name'];
        }
        else
        {
            $data['tx_audio'] = 'no_imagen.jpg';
        }


        $data['in_habilitado'] = 1;
                
        $resp = $this->maudio->ingresar($data);
        //$this->listar($data); 
        $this->index();       
        
  }

  function actualizar()     
  {                        
        $data['co_audio'] = $this->input->post('co_audio_upd'); 
        $data['tx_nombre'] = $this->input->post('tx_nombre_upd'); 
        //die ($_FILES['tx_audio_upd']['name']);
        if(!empty($_FILES['tx_audio_upd']['name']))
        {
            $upload = $this->_do_update();
            $data['tx_audio'] = $upload['file_name'];
        }
        else
        {
            $data['tx_audio'] = $this->input->post('tx_audio_upd_ant');
        }
        
        $data['in_habilitado'] = $this->input->post('in_habilitado_upd');
        $resp = $this->maudio->actualizar($data);
        $this->index();    
        
    }

    private function _do_upload()
    {
        //
        $config['overwrite'] = FALSE;
        $config['remove_spaces'] = TRUE;
        $config['upload_path']          = $_SERVER['DOCUMENT_ROOT'].CARPETA.'uploads/audios/';
        
        $config['allowed_types']        = 'mp3|wav|aif|aiff';
        $config['max_size']             = 60000; //set max size allowed in Kilobyte
        //$config['max_width']            = 1000; // set max width image allowed
        //$config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
 
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
 
        if(!$this->upload->do_upload('tx_audio_add')) //upload and validate
        {
            $data['inputerror'][] = 'tx_audio_add';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }
    private function _do_update()
    {
        $config['upload_path']          = $_SERVER['DOCUMENT_ROOT'].CARPETA.'uploads/audios/';
        //$config['upload_path']          = base_url().'uploads/';
        $config['allowed_types']        = 'mp3|wav|aif|aiff';
        $config['max_size']             = 60000; //set max size allowed in Kilobyte
        //$config['max_width']            = 1000; // set max width image allowed
        //$config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
 
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
 
        if(!$this->upload->do_upload('tx_audio_upd')) //upload and validate
        {
            $data['inputerror'][] = 'tx_audio_upd';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }
    function eliminar()     
    {         
            $data['co_audio'] = $this->input->post('co_audio');
            $resp = $this->maudio->eliminar($data);
            $this->listar($data);    
           
    }
	
       
}

