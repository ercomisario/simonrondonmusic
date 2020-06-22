<script>

function ejecutarEnviar(){
       
    tx_nombre = $("#tx_nombre").val();
    tx_email = $("#tx_email").val();
  

    if(tx_nombre.length==0){
     
      Materialize.toast('Agregar Nombre del Remitente!', 4000, 'rounded');
      $("#tx_nombre").focus();
      return;
    }
    if(tx_email.length==0){
     
      Materialize.toast('Agregar Correo Válido!', 4000, 'rounded');      
      $("#tx_email").focus();
      return;
    }
    

    $("#formAdd").submit();
  

      
}

</script>

<div class="container">
    <div class="section">
      <!--   Icon Section   -->
      <div class="row">
          <div class="col s12 m12">
            <h4 class="letf white-text">Contáctenos</h4>
          </div>
      </div>

     
      <div class="row">
         <?php 
 $atri= array(
  'class' => 'form-signin col s12 white', 
  'method' => 'post', 
  'name' => 'formAdd', 
  'id' => 'formAdd', 
  //'onsubmit' => 'startUpload();', 
  'enctype' => 'multipart/form-data');

echo form_open('/ccontacto/enviarCorreo/',$atri); ?>
          <div class="row">
            <div class="input-field col s12 m6">
              <i class="material-icons prefix">account_circle</i>
              <input id="tx_nombre" name="tx_nombre" type="text" class="validate">
              <label for="tx_nombre">Nombre</label>
            </div>
            <div class="input-field col s12 m6">
              <i class="material-icons prefix">phone</i>
              <input id="tx_telefono" name="tx_telefono" type="tel" class="validate">
              <label for="icon_telephone">Tel&eacute;fono</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6">
              <i class="material-icons prefix">email</i>
              <input id="tx_email" name="tx_email" type="email" class="validate">
              <label for="tx_email">Email</label>
            </div>
             <div class="input-field col s12 m6">
              <i class="material-icons prefix">credit_card</i>
              <input id="tx_titulo" name="tx_titulo" type="text" class="validate">
              <label for="tx_titulo">Titulo</label>
            </div>
          </div>
        <div class="row">
          <div class="input-field col s12 m12 ">
            <i class="material-icons prefix">mode_edit</i>
            <textarea id="tx_mensaje" name="tx_mensaje" class="materialize-textarea"></textarea>
            <label for="tx_mensaje">Comentario</label>
          </div>
        </div>        
      <button class="btn waves-effect waves-light cyan" type="button" id="btnAddOk" name="btnAddOk" onclick="javascript:ejecutarEnviar();">Ok
          <i class="material-icons right">send</i>
      </button>
      <button class="modal-action modal-close btn waves-effect waves-light blue-grey" type="reset" id="btnAddNo" name="btnAddNo">No
          <i class="material-icons right">close</i>
      </button>  
           <br><br><br>   
        </form>   
      </div>
  
    </div>
  </div>
