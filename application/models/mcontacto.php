<?php 

class Mcontacto extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	function listar(){
       
        $this->db->select("co_contacto, tx_contacto, in_habilitado");
        $this->db->from("contacto");
        $Boards = $this->db->get(); 
        if($Boards->num_rows()>0)
        {     
            $resultado = $Boards->result();
            return $resultado;
        }
        else
            return false;    
    } 
   
    function ingresar($data){

        $arreglo = array(
            'tx_contacto' => $data['tx_contacto'],      
            'in_habilitado' => $data['in_habilitado']
        );
        return $this->db->insert('contacto', $arreglo);        
      
    }
    function actualizar($data){
    
        $co_contacto=$data['co_contacto'];    
        $arreglo = array(
            'tx_contacto' => $data['tx_contacto'],        
            'in_habilitado' => $data['in_habilitado']
        );

        $this->db->where('co_contacto', $co_contacto);
        return $this->db->update('contacto', $arreglo);        
        //echo $this->db->last_query();
      
    }
    function eliminar($data){
    
        $co_contacto=$data['co_contacto']; 
        $this->db->where('co_contacto', $co_contacto);
        return $this->db->delete('contacto');         
      
    } 
   
}

?>