<?php 

class Malbun extends CI_Model {

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

        $sql="SELECT co_albun, tx_albun, 
            DATE_FORMAT(fe_albun,'%d/%m/%Y') AS fe_albun, 
            in_habilitado,
            (CASE WHEN in_habilitado = 1 
                THEN  'Habilitado'
                ELSE 'Deshabilitado' 
            END) AS tx_habilitado
                FROM albun ORDER BY 1 DESC ";


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
            'tx_albun' => $data['tx_albun'],
            'fe_albun' => date('Y-m-d'),         
            'in_habilitado' => $data['in_habilitado']
        );
        return $this->db->insert('albun', $arreglo);        
      
    }
    function actualizar($data){
    
        $co_albun=$data['co_albun'];               
  
        $arreglo = array(
            'tx_albun' => $data['tx_albun'],
            'in_habilitado' => $data['in_habilitado']
        );

        $this->db->where('co_albun', $co_albun);
        return $this->db->update('albun', $arreglo);        
        //echo $this->db->last_query();
      
    }
    function eliminar($data){
    
        $co_albun=$data['co_albun']; 
        $this->db->where('co_albun', $co_albun);
        return $this->db->delete('albun');         
        echo $this->db->last_query();
      
    } 
   
}

?>