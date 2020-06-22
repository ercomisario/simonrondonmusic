<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cadminfotos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	

    	$this->load->model('malbun');  
      $this->load->model('mfoto'); 
      $this->load->model('mcontacto');  
	    
	}
	public function index()
	{
		$this->load->view('vcabecera');
		$arreglo['registros'] = $this->malbun->listar();    
    $arreglo['registros_fotos'] = $this->mfoto->listar();    
    $this->load->view('vadminfotos',$arreglo);
    $arreglo2['contactos'] = $this->mcontacto->listar();
    $this->load->view('vpie',$arreglo2);
        
	}
	public function listar($data)     
  {                             
		$arreglo = $this->malbun->listar($data);
    $arreglo2 = $this->mfoto->listar($data);
    if($arreglo!== FALSE) {
               
		$i=-1;
    $j=-1;
		foreach ($arreglo as $row) 
		{
		$i++;
		?>                       
			                 <tr>
                          	<td><?php echo $row->co_albun;?><input type="hidden" name="cod<?php echo $i;?>" id="cod<?php echo $i;?>" value="<?php echo $row->co_albun;?>" /></td>
                            <td><?php echo $row->tx_albun;?><input type="hidden" name="text<?php echo $i;?>" id="text<?php echo $i;?>" value="<?php echo $row->tx_albun;?>" /></td>
                            <td><?php echo $row->fe_albun;?><input type="hidden" name="fecha<?php echo $i;?>" id="fecha<?php echo $i;?>" value="<?php echo $row->fe_albun;?>" /></td>
                            <td><?php echo $row->tx_habilitado;?><input type="hidden" name="hab<?php echo $i;?>" id="hab<?php echo $i;?>" value="<?php echo $row->in_habilitado;?>" /></td>
                            <td><a href="javascript:mostrarEditar(<?php echo $i;?>);"><i class="small material-icons center blue-text darken-4">border_color</i></a></td>
                            <td><a href="javascript:mostrarEliminar(<?php echo $i;?>);"><i class="small material-icons center red-text">delete_forever</i></a></td>
                        </tr>
                      
                        <tr>
                          <td>
                          </td>
                          <td colspan="3">
                         <?php  if($arreglo2!== FALSE) {
                         foreach ($arreglo2 as $row_fotos) 
                         {
                          if($row->co_albun==$row_fotos->co_albun){
                           $j++;
                         ?>
                            <div class="col s12 m5 l4">
                            <div class="card blue-grey lighten-4  z-depth-2">
                              <div class="card-content">
                                <input type="hidden" name="cod_foto<?php echo $j;?>" id="cod_foto<?php echo $j;?>" value="<?php echo $row_fotos->co_foto;?>" />
                                <input type="hidden" name="text_foto<?php echo $j;?>" id="text_foto<?php echo $j;?>" value="<?php echo $row_fotos->tx_nombre;?>" />
                                <input type="hidden" name="img_foto<?php echo $j;?>" id="img_foto<?php echo $j;?>" value="<?php echo $row_fotos->tx_foto;?>" />
                                <input type="hidden" name="hab_foto<?php echo $j;?>" id="hab_foto<?php echo $j;?>" value="<?php echo $row_fotos->in_habilitado;?>" />
                                <h5 class="center deep-orange-text"><?php echo $row_fotos->tx_nombre;?></h5>
                                <p class="center"><img src="<?php echo base_url();?>uploads/fotos/<?php echo $row_fotos->tx_foto;?>" width="100px" class="img-responsive">
                                </p>
                              </div>
                              <div class="card-action center">
                                <a href="javascript:mostrarEditarFoto(<?php echo $i;?>,<?php echo $j;?>);"><i class="small material-icons blue-text darken-4">border_color</i></a>
                                <a href="javascript:mostrarEliminarFoto(<?php echo $i;?>,<?php echo $j;?>);"><i class="small material-icons red-text">delete_forever</i></a>
                              </div>
                              </div>
                            
                            </div>
                            <?php 
                             }
                             }
                            } ?>                            
                                                  
                        </td>
                        <td colspan="2">
                        </td>
                        </tr>
                <?php 
        }
        }          
                          
  }
  
  function ingresar()     
  {                        
        $data['tx_albun'] = $this->input->post('tx_albun_add'); 
        $data['in_habilitado'] = 1;
        $resp = $this->malbun->ingresar($data);
        $this->index();       
        
  }

  function actualizar()     
  {                        
        $data['co_albun'] = $this->input->post('co_albun_upd'); 
        $data['tx_albun'] = $this->input->post('tx_albun_upd'); 
        
        $data['in_habilitado'] = $this->input->post('in_habilitado_upd');
        $resp = $this->malbun->actualizar($data);
        $this->index();    
        
    }

    
    function eliminar()     
    {         
            $data['co_albun'] = $this->input->post('co_albun');
            $resp = $this->malbun->eliminar($data);
            $this->listar($data);    
           
    }

    function ingresar_foto()     
    {                        
          $data['tx_nombre'] = $this->input->post('tx_nombre_add'); 
          $data['co_albun'] = $this->input->post('co_albun_foto_add'); 
          //die($_FILES['tx_imagen_add']['name']);
          if(!empty($_FILES['tx_foto_add']['name']))
          {
              $upload = $this->_do_upload();
              $data['tx_foto'] = $upload['file_name'];
          }
          else
          {
              $data['tx_foto'] = 'no_imagen.jpg';
          }
          $data['in_habilitado'] = 1;
          $resp = $this->mfoto->ingresar($data);
          $this->index();       
          
    }
 
    private function _do_upload()
    {
        $config['upload_path']          = $_SERVER['DOCUMENT_ROOT'].CARPETA.'uploads/fotos/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 2000; //set max size allowed in Kilobyte
        $config['max_width']            = 2000; // set max width image allowed
        $config['max_height']           = 2000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
 
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
 
        if(!$this->upload->do_upload('tx_foto_add')) //upload and validate
        {
            $data['inputerror'][] = 'tx_foto_add';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

    function actualizar_foto()     
    {                        
        $data['co_albun'] = $this->input->post('co_albun_foto_upd'); 
        $data['co_foto'] = $this->input->post('co_foto_upd'); 
        $data['tx_nombre'] = $this->input->post('tx_nombre_upd'); 
        if(!empty($_FILES['tx_foto_upd']['name']))
        {
            $upload = $this->_do_update();
            $data['tx_foto'] = $upload['file_name'];
        }
        else
        {
            $data['tx_foto'] = $this->input->post('tx_foto_upd_ant');
        }
        
        $data['in_habilitado'] = $this->input->post('in_habilitado_foto_upd');
        $resp = $this->mfoto->actualizar($data);
        $this->index();    
        
    }

    private function _do_update()
    {
        $config['upload_path']          = $_SERVER['DOCUMENT_ROOT'].CARPETA.'uploads/fotos/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 700; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
 
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
 
        if(!$this->upload->do_upload('tx_foto_upd')) //upload and validate
        {
            $data['inputerror'][] = 'tx_foto_upd';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }
	function eliminar_foto()     
    {         
            $data['co_albun'] = $this->input->post('co_albun');
            $data['co_foto'] = $this->input->post('co_foto');
            $resp = $this->mfoto->eliminar($data);
            $this->listar($data);    
           
    }
       
}

