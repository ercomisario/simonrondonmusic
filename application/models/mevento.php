<?php 

class Mevento extends CI_Model {

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

        $sql="SELECT co_evento, tx_evento, tx_descripcion,  
              DATE_FORMAT(fe_evento,'%d/%m/%Y') AS fe_evento,   
              DATE_FORMAT(h_evento,'%H:%i') AS h_evento, 
              tx_imagen, in_habilitado,
            (CASE WHEN in_habilitado = 1 
                THEN  'Habilitado'
                ELSE 'Deshabilitado' 
            END) AS tx_habilitado
                FROM evento ORDER BY 1 DESC ";


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
       
      $sql="SELECT co_evento, tx_evento, tx_descripcion,  
              DATE_FORMAT(fe_evento,'%d/%m/%Y') AS fe_evento,   
              DATE_FORMAT(h_evento,'%H:%i') AS h_evento, 
              tx_imagen, in_habilitado,
            (CASE WHEN in_habilitado = 1 
                THEN  'Habilitado'
                ELSE 'Deshabilitado' 
            END) AS tx_habilitado
                FROM evento 
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
    
        $fe_evento=$data['fe_evento'];

        $arreglo = array(
            'tx_evento' => $data['tx_evento'],
            'tx_descripcion' => $data['tx_descripcion'],
            'fe_evento' => date('Y-m-d', strtotime($fe_evento)),
            'h_evento' => $data['h_evento'],   
            'tx_imagen' => $data['tx_imagen'],            
            'in_habilitado' => $data['in_habilitado']
        );
        return $this->db->insert('evento', $arreglo);        
      
    }
    function actualizar($data){
    
        $co_evento=$data['co_evento'];    
        $fe_evento=$data['fe_evento'];
       
        $arreglo = array(
            'tx_evento' => $data['tx_evento'],
            'tx_descripcion' => $data['tx_descripcion'],
            'fe_evento' => date('Y-m-d', strtotime($fe_evento)),
            'h_evento' => $data['h_evento'],   
            'tx_imagen' => $data['tx_imagen'],            
            'in_habilitado' => $data['in_habilitado']
        );

        $this->db->where('co_evento', $co_evento);
        return $this->db->update('evento', $arreglo);        
        //echo $this->db->last_query();
      
    }
    function eliminar($data){
    
        $co_evento=$data['co_evento']; 
        $this->db->where('co_evento', $co_evento);
        return $this->db->delete('evento');         
      
    } 
   
}

?>