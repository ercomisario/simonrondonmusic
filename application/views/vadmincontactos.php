<script>

function ejecutarIngresar(){
       
    tx_contacto = $("#tx_contacto_add").val();
    
    if(tx_contacto.length==0){     
     
      Materialize.toast('Agregar Nombre de la Informacion Contacto!', 4000, 'rounded');
      $("#tx_contacto_add").focus();
      return;
    }

    $("#formAdd").submit();      
}

function mostrarEditar(indice){   

    $('#co_contacto_upd').val($("#cod"+indice).val());
    $('#tx_contacto_upd').val($("#text"+indice).val());
    valor = $("#hab"+indice).val();
    texto ='Deshabilitado';
    if(valor==1)
      texto='Habilitado';
   
    $('.parent option').each(function() {
  
      if($(this).val() == valor) {

          $('.parent .select-wrapper input.select-dropdown').val(texto)
          $(this).attr('selected','selected');
    }
    });

    $('#updRegistro').openModal();

}

function ejecutarEditar(){
   
    co_contacto= $("#co_contacto_upd").val();
    tx_contacto= $("#tx_contacto_upd").val();    
    in_habilitado= $("#in_habilitado_upd").val();

    if(tx_contacto.length==0){
     
      Materialize.toast('Agregar Informacion de Contacto!', 4000, 'rounded');
      $("#tx_contacto_upd").focus();
      return;
    }

   $("#formUpd").submit();
   
}

function mostrarEliminar(indice){
 
    $('#delRegistro').openModal();
    $('#co_contacto_del').val($("#cod"+indice).val());
    
}
function ejecutarEliminar(){
   
    
    co_contacto= $('#co_contacto_del').val();
   
    var parametros = {
                     "co_contacto" : co_contacto
          };
       $.ajax({
          type: "POST",
          url: '<?php echo CARPETA;?>index.php/cadmincontactos/eliminar/',
          data: parametros,
          beforeSend: function(objeto){
            $("#datostabla").html("Mensaje: Cargando...");
          },
          success: function(datos){
              $("#datostabla").html(datos);  
              $('#delRegistro').closeModal();
              Materialize.toast('Registro Eliminado Satisfactoriamente!', 4000, 'rounded');
          }
      });
   
}

</script>

<div class="container">
    <div class="section">
      <!--   Icon Section   -->
      <div class="row">
          <div class="col s12 m4">
            <h5 class="letf white-text">Administración Contactos</h5>
          </div>
          <div id="botonAgregar" >
              <div class="col s12 m3" >
                <!--<a  class="modal-trigger" ><i class="small material-icons left cyan-text">add_box</i></a>-->
                <button class="btn waves-effect waves-light deep-orange" type="button" id="btnAdd" name="btnAdd" onclick="$('#addRegistro').openModal();">Agregar
                  <i class="material-icons right">add_box</i>
                </button>
              </div>
          </div>
      </div>
      <div class="row">     
      <div class="col s12 m12">
      <div class="responsive-table">               
              <table id="mytable" class="bordered striped">                   
                  <thead class="letf white-text">                   
                    <th>Codigo</th>
                    <th>Descripción</th>
                    <th>Estatus</th> 
                    <th>Editar</th>                      
                    <th>Eliminar</th>
                  </thead>
                  <tbody id="datostabla" class="white">
                    <?php
                     if(isset($registros) && $registros!== FALSE) {
               
                     $i=-1;
                     foreach ($registros as $row) 
                     {
                        $i++;
                        $tx_habilitado='Habilitado';
                        if($row->in_habilitado==2)$tx_habilitado='Inhabilitado';
                        ?>                       
                        <tr>
                          	<td><?php echo $row->co_contacto;?><input type="hidden" name="cod<?php echo $i;?>" id="cod<?php echo $i;?>" value="<?php echo $row->co_contacto;?>" /></td>
                          	<td><?php echo $row->tx_contacto;?><input type="hidden" name="text<?php echo $i;?>" id="text<?php echo $i;?>" value="<?php echo $row->tx_contacto;?>" /></td>
                          	<td><?php echo $tx_habilitado;?><input type="hidden" name="hab<?php echo $i;?>" id="hab<?php echo $i;?>" value="<?php echo $row->in_habilitado;?>" /></td>
                            <td><a href="javascript:mostrarEditar(<?php echo $i;?>);"><i class="small material-icons center blue-text darken-4">border_color</i></a></td>
                          	<td><a href="javascript:mostrarEliminar(<?php echo $i;?>);"><i class="small material-icons center red-text">delete_forever</i></a></td>
                      	</tr>
                      <?php 
                     }
                    } ?>                        
                    </tbody>                        
                </table>

            </div>
            
        </div>
  </div>    
    </div>
 </div>

 <?php 
 $atri= array(
  'class' => 'form-signin', 
  'method' => 'post', 
  'id' => 'formAdd',  
  'name' => 'formAdd', 
  //'onsubmit' => 'startUpload();', 
  'enctype' => 'multipart/form-data');

echo form_open('/cadmincontactos/ingresar/',$atri); ?>

<div id="addRegistro" class="modal modal-fixed-footer">

    <div class="modal-content">
      <h4>Ingresar</h4>

      <div class="row">
        <div class="input-field col m12">
            <input id="tx_contacto_add" name="tx_contacto_add" type="text" class="validate">
            <label for="tx_contacto_add">Información de Contacto</label>
        </div>
      </div>
    </div>
    <div class="modal-footer center">      
      <button class="modal-action modal-close btn waves-effect waves-light blue-grey" type="button" id="btnAddNo" name="btnAddNo">NO
          <i class="material-icons right">close</i>
      </button>
      <button class="btn waves-effect waves-light cyan" type="button" id="btnAddOk" name="btnAddOk" onclick="javascript:ejecutarIngresar();">OK
          <i class="material-icons right">send</i>
      </button>      
    </div>    
</div>
</form>
<?php 
 $atri= array(
  'class' => 'form-signin', 
  'method' => 'post', 
  'id' => 'formUpd', 
  'name' => 'formUpd', 
  //'onsubmit' => 'startUpload();', 
  'enctype' => 'multipart/form-data');

echo form_open('/cadmincontactos/actualizar/',$atri); ?> 
<div id="updRegistro" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Modificar</h4>

      <div class="row">
        <div class="input-field col m9">
            <input type="hidden" name="co_contacto_upd" id='co_contacto_upd'>   
            <input placeholder="Placeholder" id="tx_contacto_upd" name="tx_contacto_upd" type="text" class="validate">
            <label for="tx_contacto_upd">Información de Contacto</label>
        </div>
        <div class="input-field col m3">
          <div class="parent">
             <select name="in_habilitado_upd" id="in_habilitado_upd">      
                <option value="1" > Habilitado</option> 
                <option value="2" > Deshabilitado</option>       
             </select>                           
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer center">
      
      <button class="modal-action modal-close btn waves-effect waves-light blue-grey" type="button" id="btnUpdNo" name="btnUpdNo">NO
          <i class="material-icons right">close</i>
      </button>
      <button class="btn waves-effect waves-light cyan" type="button" id="btnUpdOk" name="btnUpdOk" onclick="javascript:ejecutarEditar();">OK
          <i class="material-icons right">send</i>
      </button>   
    </div>
    
</div>
</form>

<div id="delRegistro" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Eliminar</h4>
      <div class="row">               
          <div id="oculto3" class="card-panel red lighten-2">
             <input type="hidden" name="co_contacto_del" id='co_contacto_del'>   
             Esta seguro de eliminar este Registro?
          </div>
      </div>
    </div>  
    <div class="modal-footer center">
      <button class="modal-action modal-close btn waves-effect waves-light blue-grey" type="button" id="btnDelNo" name="btnDelNo">NO
          <i class="material-icons right">close</i>
      </button>
      <button class="btn waves-effect waves-light cyan" type="button" id="btnDelOk" name="btnDelOk" onclick="javascript:ejecutarEliminar();">OK
          <i class="material-icons right">send</i>
      </button>
    </div>
   
</div>   


     
 