<script>

function ejecutarIngresar(){
       
    tx_nombre = $("#tx_nombre_add").val();
  

    if(tx_nombre.length==0){
     
      Materialize.toast('Agregar Nombre del Video!', 4000, 'rounded');
      $("#tx_nombre_add").focus();
      return;
    }
    $("#formAdd").submit();
  

      
}

function mostrarEditar(indice){   
  
    $('#co_video_upd').val($("#cod"+indice).val());
    $('#tx_nombre_upd').val($("#text"+indice).val());
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

   
    tx_video_upd=$("#vid"+indice).val();
    $('#div_video_upd').html("<video class='responsive-video' controls width='200' height='200' ><source src='<?php echo CARPETA;?>uploads/videos/"+tx_video_upd+"' type='video/mp4' /></video>" );

    $('#tx_video_upd_ant').val(tx_video_upd);
 
    $('#updRegistro').openModal();

}

function ejecutarEditar(){
   
    co_video= $("#co_video_upd").val();
    tx_nombre= $("#tx_nombre_upd").val();
    
    
    if(tx_nombre.length==0){
     
      Materialize.toast('Agregar Nombre del Video!', 4000, 'rounded');
      $("#tx_nombre_upd").focus();
      return;
    }
   
   
    $("#formUpd").submit();
    
   
}

function mostrarEliminar(indice){
    $('#delRegistro').openModal();
    $('#co_video_del').val($("#cod"+indice).val());
    
}
function ejecutarEliminar(){
    
    co_video= $('#co_video_del').val();   
    var parametros = {
                     "co_video" : co_video
          };
       $.ajax({
          type: "POST",
          url: '<?php echo CARPETA;?>index.php/cadminvideos/eliminar/',
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
          <div class="col s12 m5">
            <h5 class="letf white-text">Administración Videos</h5>
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
                    <th>Descripción</th>
                    <th>Video</th> 
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
                          	<td><?php echo $row->co_video;?><input type="hidden" name="cod<?php echo $i;?>" id="cod<?php echo $i;?>" value="<?php echo $row->co_video;?>" /></td>
                          	<td><?php echo $row->tx_nombre;?><input type="hidden" name="text<?php echo $i;?>" id="text<?php echo $i;?>" value="<?php echo $row->tx_nombre;?>" /></td>
                          	<td>
                              <input type="hidden" name="vid<?php echo $i;?>" id="vid<?php echo $i;?>" value="<?php echo $row->tx_video;?>" />
                                <video class="responsive-video" controls width="200" height="200" >
                                  <source src="<?php echo base_url();?>uploads/videos/<?php echo $row->tx_video;?>" type="video/mp4" />

                                </video>                               
                            </td>
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

echo form_open('/cadminvideos/ingresar/',$atri); ?>

<div id="addRegistro" class="modal modal-fixed-footer">

    <div class="modal-content">
      <h4>Ingresar</h4>

      <div class="row">
        <div class="input-field col m12">
            <input id="tx_nombre_add" name="tx_nombre_add" type="text" class="validate">
            <label for="tx_nombre_add">Nombre del Video</label>
        </div>
      </div>
     
      <div class="row">
        <div class="input-field col m12" >
            <div class="file-field input-field" id="filephoto">
              <div class="btn deep-orange">
                <span>Video</span>
                <input type="file" id="tx_video_add" name="tx_video_add">
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

echo form_open('/cadminvideos/actualizar/',$atri); ?> 
<div id="updRegistro" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Modificar</h4>

      <div class="row">
        <div class="input-field col m9">
            <input type="hidden" name="co_video_upd" id='co_video_upd'>   
            <input type="hidden" name="tx_video_upd_ant" id='tx_video_upd_ant'>   
            <input placeholder="Placeholder" id="tx_nombre_upd" name="tx_nombre_upd" type="text" class="validate">
            <label for="tx_nombre_upd">Nombre del Video</label>
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
        <div class="input-field col m4" >
            <div id="div_video_upd">  
                          
            </div>
        </div>
        <div class="input-field col m8" >
            <div class="file-field input-field" id="filevideo_upd">
              <div class="btn deep-orange">
                <span>Video</span>
                <input type="file" id="tx_video_upd" name="tx_video_upd">
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
             <input type="hidden" name="co_video_del" id='co_video_del'>   
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


     
 