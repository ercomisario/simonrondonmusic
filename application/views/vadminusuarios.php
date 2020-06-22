<script>

function ejecutarIngresar(){
       
    tx_nombre = $("#tx_nombre_add").val();
    tx_usuario = $("#tx_usuario_add").val();
    tx_clave = $("#tx_clave_add").val();
    
    if(tx_nombre.length==0){     
     
      Materialize.toast('Agregar Nombre del Usuario!', 4000, 'rounded');
      $("#tx_nombre_add").focus();
      return;
    }
    if(tx_usuario.length==0){     
     
      Materialize.toast('Agregar Descripcion del Usuario!', 4000, 'rounded');
      $("#tx_usuario_add").focus();
      return;
    }
    if(tx_clave.length==0){     
     
      Materialize.toast('Agregar Clave del Usuario!', 4000, 'rounded');
      $("#tx_clave_add").focus();
      return;
    }

    $("#formAdd").submit();      
}

function mostrarEditar(indice){   

    $('#co_usuario_upd').val($("#cod"+indice).val());
    $('#tx_nombre_upd').val($("#text"+indice).val());
    $('#tx_usuario_upd').val($("#usu"+indice).val());
    $('#tx_clave_upd').val($("#cla"+indice).val());
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
   
    co_usuario= $("#co_usuario_upd").val();
    tx_nombre= $("#tx_nombre_upd").val();    
    tx_usuario= $("#tx_usuario_upd").val();    
    tx_clave= $("#tx_clave_upd").val();    
    in_habilitado= $("#in_habilitado_upd").val();

    if(tx_nombre.length==0){     
     
      Materialize.toast('Agregar Nombre del Usuario!', 4000, 'rounded');
      $("#tx_nombre_upd").focus();
      return;
    }
    if(tx_usuario.length==0){     
     
      Materialize.toast('Agregar Descripcion del Usuario!', 4000, 'rounded');
      $("#tx_usuario_upd").focus();
      return;
    }
    if(tx_clave.length==0){     
     
      Materialize.toast('Agregar Clave del Usuario!', 4000, 'rounded');
      $("#tx_clave_upd").focus();
      return;
    }

   $("#formUpd").submit();
   
}

function mostrarEliminar(indice){
 
    $('#delRegistro').openModal();
    $('#co_usuario_del').val($("#cod"+indice).val());
    
}
function ejecutarEliminar(){
   
    
    co_usuario= $('#co_usuario_del').val();
   
    var parametros = {
                     "co_usuario" : co_usuario
          };
       $.ajax({
          type: "POST",
          url: '<?php echo CARPETA;?>index.php/cadminusuarios/eliminar/',
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
            <h5 class="letf white-text">Administración Usuarios</h5>
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
                    <th>Nombre y Apellido</th>
                    <th>Usuario</th>
                    <th>Clave</th>
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
                          	<td><?php echo $row->co_usuario;?><input type="hidden" name="cod<?php echo $i;?>" id="cod<?php echo $i;?>" value="<?php echo $row->co_usuario;?>" /></td>
                          	<td><?php echo $row->tx_nombre;?><input type="hidden" name="text<?php echo $i;?>" id="text<?php echo $i;?>" value="<?php echo $row->tx_nombre;?>" /></td>
                            <td><?php echo $row->tx_usuario;?><input type="hidden" name="usu<?php echo $i;?>" id="usu<?php echo $i;?>" value="<?php echo $row->tx_usuario;?>" /></td>
                            <td><?php echo $row->tx_clave;?><input type="hidden" name="cla<?php echo $i;?>" id="cla<?php echo $i;?>" value="<?php echo $row->tx_clave;?>" /></td>
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

echo form_open('/cadminusuarios/ingresar/',$atri); ?>

<div id="addRegistro" class="modal modal-fixed-footer">

    <div class="modal-content">
      <h4>Ingresar</h4>

      <div class="row">
        <div class="input-field col m12">
            <input id="tx_nombre_add" name="tx_nombre_add" type="text" class="validate">
            <label for="tx_nombre_add">Nombre y Apellido</label>
        </div>
      </div>
       <div class="row">
        <div class="input-field col m6">
            <input id="tx_usuario_add" name="tx_usuario_add" type="text" class="validate">
            <label for="tx_usuario_add">Usuario</label>
        </div>
        <div class="input-field col m12">
            <input id="tx_clave_add" name="tx_clave_add" type="text" class="validate">
            <label for="tx_clave_add">Clave</label>
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

echo form_open('/cadminusuarios/actualizar/',$atri); ?> 
<div id="updRegistro" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Modificar</h4>

      <div class="row">
        <div class="input-field col m9">
            <input type="hidden" name="co_usuario_upd" id='co_usuario_upd'>   
            <input placeholder="Placeholder" id="tx_nombre_upd" name="tx_nombre_upd" type="text" class="validate">
            <label for="tx_nombre_upd">Nombre y Apellido</label>
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
      <div class="row">
        <div class="input-field col m6">
            <input placeholder="Placeholder" id="tx_usuario_upd" name="tx_usuario_upd" type="text" class="validate">
            <label for="tx_usuario_upd">Usuario</label>
        </div>
        <div class="input-field col m6">
            <input placeholder="Placeholder" id="tx_clave_upd" name="tx_clave_upd" type="text" class="validate">
            <label for="tx_clave_upd">Clave</label>
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
             <input type="hidden" name="co_usuario_del" id='co_usuario_del'>   
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


     
 