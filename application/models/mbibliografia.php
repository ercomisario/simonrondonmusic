<?php 

class Mbibliografia extends CI_Model {

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

        $sql="SELECT co_bibliografia, tx_bibliografia, tx_imagen, in_habilitado,
            (CASE WHEN in_habilitado = 1 
                THEN  'Habilitado'
                ELSE 'Deshabilitado' 
            END) AS tx_habilitado
                FROM bibliografia ORDER BY 1 ASC ";


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
            'tx_bibliografia' => $data['tx_bibliografia'],
            'tx_imagen' => $data['tx_imagen'],            
            'in_habilitado' => $data['in_habilitado']
        );
        return $this->db->insert('bibliografia', $arreglo);        
      
    }
    function actualizar($data){
    
        $co_bibliografia=$data['co_bibliografia'];        
        $arreglo = array(
            'tx_bibliografia' => $data['tx_bibliografia'],
            'tx_imagen' => $data['tx_imagen'],            
            'in_habilitado' => $data['in_habilitado']
        );

        $this->db->where('co_bibliografia', $co_bibliografia);
        return $this->db->update('bibliografia', $arreglo);        
        //echo $this->db->last_query();
      
    }
    function eliminar($data){
    
        $co_bibliografia=$data['co_bibliografia']; 
        $this->db->where('co_bibliografia', $co_bibliografia);
        return $this->db->delete('bibliografia');         
      
    } 
   
}

?>