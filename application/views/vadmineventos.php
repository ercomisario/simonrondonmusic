<script>

function ejecutarIngresar(){
       
    tx_evento = $("#tx_evento_add").val();
    tx_descripcion = $("#tx_descripcion_add").val();
    fe_evento = $("#fe_evento_add").val();
    h_evento = $("#h_evento_add").val();
    photo = $("#photo_add").val();

    if(tx_evento.length==0){
     
      Materialize.toast('Agregar Nombre del Evento!', 4000, 'rounded');
      $("#tx_evento_add").focus();
      return;
    }
    if(tx_descripcion.length==0){
     
      Materialize.toast('Agregar Descripcion del Evento!', 4000, 'rounded');      
      $("#tx_descripcion_add").focus();
      return;
    }
    if(fe_evento.length==0){
     
      Materialize.toast('Agregar Fecha del Evento!', 4000, 'rounded');      
      $("#fe_evento_add").focus();
      return;
    }
    if(h_evento.length==0){
     
      Materialize.toast('Agregar Hora del Evento!', 4000, 'rounded');      
      $("#h_evento_add").focus();
      return;
    }
    $("#formAdd").submit();
  

      
}

function mostrarEditar(indice){   
  
    $('#co_evento_upd').val($("#cod"+indice).val());
    $('#tx_evento_upd').val($("#text"+indice).val());
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

    $('#tx_descripcion_upd').val($("#desc"+indice).val());
    $('#fe_evento_upd').val($("#fecha"+indice).val());
    $('#h_evento_upd').val($("#hora"+indice).val());
    tx_imagen_upd=$("#img"+indice).val();
    $('#div_imagen_upd').html("<img src='<?php echo CARPETA;?>uploads/eventos/"+tx_imagen_upd+"' width='100px' class='img-responsive' >");
    $('#tx_imagen_upd_ant').val(tx_imagen_upd);
 
    $('#updRegistro').openModal();

}

function ejecutarEditar(){
   
    co_evento= $("#co_evento_upd").val();
    tx_evento= $("#tx_evento_upd").val();
    tx_descripcion= $("#tx_descripcion_upd").val();
    fe_evento= $("#fe_evento_upd").val();
    h_evento= $("#h_evento_upd").val();
    
    if(tx_evento.length==0){
     
      Materialize.toast('Agregar Nombre del Evento!', 4000, 'rounded');
      $("#tx_evento_upd").focus();
      return;
    }
    if(tx_descripcion.length==0){
     
      Materialize.toast('Agregar Descripcion del Evento!', 4000, 'rounded');      
      $("#tx_descripcion_upd").focus();
      return;
    }
   
    $("#formUpd").submit();
    
   
}

function mostrarEliminar(indice){
    $('#delRegistro').openModal();
    $('#co_evento_del').val($("#cod"+indice).val());
    
}
function ejecutarEliminar(){
    
    co_evento= $('#co_evento_del').val();   
    var parametros = {
                     "co_evento" : co_evento
          };
       $.ajax({
          type: "POST",
          url: '<?php echo CARPETA;?>index.php/cadmineventos/eliminar/',
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
            <h5 class="letf white-text">Administración Eventos</h5>
          </div>
          <div id="botonAgregar" >
              <div class="col s12 m3" >
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
                    <th>Evento</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Hora</th> 
                    <th>Imagen</th> 
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
                        ?>                       
                        <tr>
                          	<td><?php echo $row->co_evento;?><input type="hidden" name="cod<?php echo $i;?>" id="cod<?php echo $i;?>" value="<?php echo $row->co_evento;?>" /></td>
                          	<td><?php echo $row->tx_evento;?><input type="hidden" name="text<?php echo $i;?>" id="text<?php echo $i;?>" value="<?php echo $row->tx_evento;?>" /></td>
                          	<td><?php echo $row->tx_descripcion;?><input type="hidden" name="desc<?php echo $i;?>" id="desc<?php echo $i;?>" value="<?php echo $row->tx_descripcion;?>" /></td>
                          	<td><?php echo $row->fe_evento;?><input type="hidden" name="fecha<?php echo $i;?>" id="fecha<?php echo $i;?>" value="<?php echo $row->fe_evento;?>" /></td>
                          	<td><?php echo $row->h_evento;?><input type="hidden" name="hora<?php echo $i;?>" id="hora<?php echo $i;?>" value="<?php echo $row->h_evento;?>" /></td>
                          	<td><img src="<?php echo base_url();?>uploads/eventos/<?php echo $row->tx_imagen;?>" width="50px" class="img-responsive" ><input type="hidden" name="img<?php echo $i;?>" id="img<?php echo $i;?>" value="<?php echo $row->tx_imagen;?>" /></td>
                          	<td><?php echo $row->tx_habilitado;?><input type="hidden" name="hab<?php echo $i;?>" id="hab<?php echo $i;?>" value="<?php echo $row->in_habilitado;?>" /></td>
                            <td><a href="javascript:mostrarEditar(<?php echo $i;?>);"><i class="small material-icons center blue-text darken-4">border_color</i></a></td>
                          	<td><a href="javascript:mostrarEliminar(<?php echo $i;?>);"><i class="small material-icons center red-text">delete_forever</i></a></td>
                      	</tr>
                      <?php 
                     }
                    } ?>                        
                    </tbody>
                        
                </table>

<!--<div class="clearfix"></div>
<ul class="pagination pull-right">
  <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
  <li class="active"><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
</ul>
-->                
            </div>
            
        </div>
  </div>    
    </div>
 </div>

 <?php 
 $atri= array(
  'class' => 'form-signin', 
  'method' => 'post', 
  'name' => 'formAdd', 
  'id' => 'formAdd', 
  //'onsubmit' => 'startUpload();', 
  'enctype' => 'multipart/form-data');

echo form_open('/cadmineventos/ingresar/',$atri); ?>

<div id="addRegistro" class="modal modal-fixed-footer">

    <div class="modal-content">
      <h4>Ingresar</h4>

      <div class="row">
        <div class="input-field col m12">
            <input id="tx_evento_add" name="tx_evento_add" type="text" class="validate">
            <label for="tx_evento_add">Nombre del Evento</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col m12">
            <textarea id="tx_descripcion_add" name="tx_descripcion_add" class="materialize-textarea validate"></textarea>
            <label for="tx_descripcion_add">Descripción del Evento</label>
        </div>
      </div>
      <div class="row">        
        <div class="input-field col m6">             
            <input type="text" class="datepicker validate" name="fe_evento_add" id="fe_evento_add">           
            <label for="fe_evento_add">Fecha Evento</label>                      
        </div>
        <div class="input-field col m6">             
            <input type="text" class="timepicker validate" name="h_evento_add" id="h_evento_add" >      
            <label for="h_evento_add">Hora Evento (24 Horas)</label>
       </div>
      </div>
      <div class="row">
        <div class="input-field col m12" >
            <div class="file-field input-field" id="filephoto">
              <div class="btn deep-orange">
                <span>Foto del Evento</span>
                <input type="file" id="tx_imagen_add" name="tx_imagen_add">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
            </div>
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

echo form_open('/cadmineventos/actualizar/',$atri); ?> 
<div id="updRegistro" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Modificar</h4>

      <div class="row">
        <div class="input-field col m9">
            <input type="hidden" name="co_evento_upd" id='co_evento_upd'>   
            <input type="hidden" name="tx_imagen_upd_ant" id='tx_imagen_upd_ant'>   
            <input placeholder="Placeholder" id="tx_evento_upd" name="tx_evento_upd" type="text" class="validate">
            <label for="tx_evento_upd">Nombre del Evento</label>
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
        <div class="input-field col m12">
            <textarea placeholder="Placeholder" id="tx_descripcion_upd" name="tx_descripcion_upd" class="materialize-textarea validate"></textarea>
            <label for="tx_descripcion_upd">Descripción del Evento</label>
        </div>
      </div>
      <div class="row">        
        <div class="input-field col m6">             
            <input placeholder="Placeholder" type="text" class="datepicker" name="fe_evento_upd" id="fe_evento_upd">           
            <label for="fe_evento_upd">Fecha Evento</label>                      
        </div>
        <div class="input-field col m6">             
            <input placeholder="Placeholder"  type="text" class="timepicker" name="h_evento_upd" id="h_evento_upd" >      
            <label for="h_evento_upd">Hora Evento (24 Horas)</label>                  
       </div>       
      </div>
      <div class="row">
        <div class="input-field col m3" >
            <div id="div_imagen_upd">             
            </div>
        </div>
        <div class="input-field col m9" >
            <div class="file-field input-field" id="filephoto_upd">
              <div class="btn deep-orange">
                <span>Foto del Evento</span>
                <input type="file" id="tx_imagen_upd" name="tx_imagen_upd">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
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
             <input type="hidden" name="co_evento_del" id='co_evento_del'>   
             Esta seguro de eliminar este Registro?
          </div>
      </div>
    </div>  
    <div class="modal-footer center">
      <!--<a href="#!" class="modal-action modal-close waves-effect waves-cyan btn-flat" >Cerrar</a>-->
      <button class="modal-action modal-close btn waves-effect waves-light blue-grey" type="button" id="btnPhotoDelNo" name="btnPhotoDelNo">NO
          <i class="material-icons right">close</i>
      </button>
      <button class="btn waves-effect waves-light cyan" type="button" id="btnPhotoDel" name="btnPhotoDel" onclick="javascript:ejecutarEliminar();">OK
          <i class="material-icons right">send</i>
      </button>
      <!--<a href="#!" class="modal-action waves-effect cyan btn" onclick="javascript:ejecutarEliminar();">Aceptar</a>-->
    </div>
   
</div>   


     
 