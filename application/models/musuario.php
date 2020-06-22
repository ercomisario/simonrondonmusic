<?php 

class Musuario extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	function validar($data)
    {
        $tx_usuario=$data['tx_usuario'];
        $tx_clave=$data['tx_clave'];
       
        $this->db->select("co_usuario, tx_nombre, co_permisologia");
        $this->db->from("usuario");      
       
        $this->db->where("tx_usuario", $tx_usuario);
        $this->db->where("tx_clave", $tx_clave);
        $this->db->where("in_habilitado", 1);

        $Boards = $this->db->get();
        //die ($this->db->last_query());
        if($Boards->num_rows()>0)
        {
            $row=$Boards->row();
            $co_usuario_session=$row->co_usuario;
            $co_permisologia_session=$row->co_permisologia;
            $tx_usuario_session=$tx_usuario;           
            $tx_nombre_session=$row->tx_nombre;                       

            $arregloSession = array(
                 'co_usuario_session' => $co_usuario_session,
                 'co_permisologia_session' => $co_permisologia_session,                 
                 'tx_nombre_session' => $tx_nombre_session,
                 'tx_usuario_session' => $tx_usuario_session

            );
              // Create a session with a name verified, with the content from the array above.
            $this->session->set_userdata('usuario', $arregloSession);
            return 1;
        }
        else
            return 2;
    } 
    function listar(){
       
        $this->db->select("co_usuario, tx_nombre, tx_usuario, tx_clave, in_habilitado");
        $this->db->from("usuario");  
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
            'tx_usuario' => $data['tx_usuario'],      
            'tx_nombre' => $data['tx_nombre'],      
            'tx_clave' => $data['tx_clave'],      
            'in_habilitado' => $data['in_habilitado'],      
            'co_permisologia' => $data['co_permisologia']
        );
        return $this->db->insert('usuario', $arreglo);        
      
    }
    function actualizar($data){
    
        $co_usuario=$data['co_usuario'];    
        $arreglo = array(
            'tx_usuario' => $data['tx_usuario'],      
            'tx_nombre' => $data['tx_nombre'],      
            'tx_clave' => $data['tx_clave'],        
            'in_habilitado' => $data['in_habilitado']
        );

        $this->db->where('co_usuario', $co_usuario);
        return $this->db->update('usuario', $arreglo);        
        //echo $this->db->last_query();
      
    }
    function eliminar($data){
    
        $co_usuario=$data['co_usuario']; 
        $this->db->where('co_usuario', $co_usuario);
        return $this->db->delete('usuario');         
      
    } 
   
   
}

?>