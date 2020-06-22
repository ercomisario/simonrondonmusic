<?php 

class Mfoto extends CI_Model {

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

        $sql="SELECT co_foto, co_albun, tx_nombre, tx_foto, 
            in_habilitado,
            (CASE WHEN in_habilitado = 1 
                THEN  'Habilitado'
                ELSE 'Deshabilitado' 
            END) AS tx_habilitado
                FROM foto ORDER BY 1 DESC ";


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
       
      $sql="SELECT a.co_foto, a.tx_nombre, b.tx_albun, 
              a.tx_foto, a.in_habilitado,
            (CASE WHEN a.in_habilitado = 1 
                THEN  'Habilitado'
                ELSE 'Deshabilitado' 
            END) AS tx_habilitado
                FROM foto a, albun b
                WHERE a.in_habilitado=1 AND a.co_albun=b.co_albun
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
            'co_albun' => $data['co_albun'],
            'tx_nombre' => $data['tx_nombre'],     
            'tx_foto' => $data['tx_foto'],         
            'in_habilitado' => $data['in_habilitado']
        );
        return $this->db->insert('foto', $arreglo);        
      
    }
    function actualizar($data){
    
        $co_foto=$data['co_foto'];               
        $co_albun=$data['co_albun']; 
        
        $arreglo = array(
            'tx_nombre' => $data['tx_nombre'],
            'tx_foto' => $data['tx_foto'],
            'in_habilitado' => $data['in_habilitado']
        );

        $this->db->where('co_foto', $co_foto);
        $this->db->where('co_albun', $co_albun);
        return $this->db->update('foto', $arreglo);        
        //echo $this->db->last_query();
      
    }
    function eliminar($data){
    
        $co_foto=$data['co_foto'];
        $co_albun=$data['co_albun']; 
        
        $this->db->where('co_foto', $co_foto);
        $this->db->where('co_albun', $co_albun);
        return $this->db->delete('foto');         
        
      
    } 
   
}

?>