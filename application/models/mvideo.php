<?php 

class Mvideo extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	function listar(){
       
        /*$this->db->select("a.co_jornada, a.nu_jornada, a.co_hipodromo, b.tx_hipodromo, a.fe_jornada, a.nu_carreras");
        $this->db->from("jornada a");
      
        $this->db->join('hipodromo b', 'a.co_hipodromo= b.co_hipodromo AND a.co_sucursal= b.co_sucursal');
      
        $this->db->where("a.co_sucursal", $co_sucursal);
        $Boards = $this->db->get();*/

        $sql="SELECT co_video, tx_nombre, 
              tx_video, in_habilitado,
            (CASE WHEN in_habilitado = 1 
                THEN  'Habilitado'
                ELSE 'Deshabilitado' 
            END) AS tx_habilitado
                FROM video ORDER BY 1 DESC ";


        $Boards=$this->db->query($sql);     

        if($Boards->num_rows()>0)
        {
     
            $resultado = $Boards->result();
           
            return $resultado;
        }
        else
            return false;    
    } 
    function buscar_principal(){
       
      $sql="SELECT co_video, tx_nombre, 
              tx_video, in_habilitado,
            (CASE WHEN in_habilitado = 1 
                THEN  'Habilitado'
                ELSE 'Deshabilitado' 
            END) AS tx_habilitado
                FROM video 
                WHERE in_habilitado=1
                ORDER BY 1 DESC LIMIT 1";


        $Boards=$this->db->query($sql);     

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
            'tx_nombre' => $data['tx_nombre'],
            'tx_video' => $data['tx_video'],            
            'in_habilitado' => $data['in_habilitado']
        );
        return $this->db->insert('video', $arreglo);        
      
    }
    function actualizar($data){
    
        $co_video=$data['co_video'];    
           
        $arreglo = array(
            'tx_nombre' => $data['tx_nombre'],
            'tx_video' => $data['tx_video'],            
            'in_habilitado' => $data['in_habilitado']
        );

        $this->db->where('co_video', $co_video);
        return $this->db->update('video', $arreglo);        
        //echo $this->db->last_query();
      
    }
    function eliminar($data){
    
        $co_video=$data['co_video']; 
        $this->db->where('co_video', $co_video);
        return $this->db->delete('video');         
      
    } 
   
}

?>