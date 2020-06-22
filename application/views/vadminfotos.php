<script>

function ejecutarIngresar(){
       
    tx_albun = $("#tx_albun_add").val();
 
    if(tx_albun.length==0){
     
      Materialize.toast('Agregar Nombre del Album!', 4000, 'rounded');
      $("#tx_albun_add").focus();
      return;
    }
    $("#formAdd").submit();
  

      
}
function ejecutarIngresarFoto(){
       
    tx_nombre = $("#tx_nombre_add").val();
    co_albun = $("#co_albun_foto_add").val();
 
    if(tx_nombre.length==0){
     
      Materialize.toast('Agregar Nombre de la Foto!', 4000, 'rounded');
      $("#tx_nombre_add").focus();
      return;
    }
    if(co_albun.length==0){
     
      Materialize.toast('Seleccionar Album de la Foto!', 4000, 'rounded');
      $("#co_albun_foto_add").focus();
      return;
    }
    $("#formAddFoto").submit();
  

      
}

function mostrarEditar(indice){   
  
    $('#co_albun_upd').val($("#cod"+indice).val());
    $('#tx_albun_upd').val($("#text"+indice).val());
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
function mostrarEditarFoto(indice, indice2){   
  
    $('#co_albun_foto_upd').val($("#cod"+indice).val());
    $('#co_foto_upd').val($("#cod_foto"+indice2).val());
    $('#tx_nombre_upd').val($("#text_foto"+indice2).val());
    valor = $("#hab_foto"+indice2).val();
    texto ='Deshabilitado';
    if(valor==1)
      texto='Habilitado';
   
    $('.parent_upd option').each(function() {
    
      if($(this).val() == valor) {

          $('.parent_upd .select-wrapper input.select-dropdown').val(texto)
          $(this).attr('selected','selected');
    }
    });
    valor2 = $("#cod"+indice).val();
    texto2 = $("#text"+indice).val();
    $('.parent_foto option').each(function() {
  
      if($(this).val() == valor2) {

          $('.parent_foto .select-wrapper input.select-dropdown').val(texto2)
          $(this).attr('selected','selected');
    }
    });
    tx_foto_upd=$("#img_foto"+indice2).val();
   // alert(tx_foto_upd);
    $('#div_foto_upd').html("<img src='<?php echo CARPETA;?>uploads/fotos/"+tx_foto_upd+"' width='100px' class='img-responsive' >");
    $('#tx_foto_upd_ant').val(tx_foto_upd);
 
   
    $('#updRegistroFoto').openModal();

}

function ejecutarEditar(){
   
    tx_nombre= $("#tx_albun_upd").val();
    
    
    if(tx_nombre.length==0){
     
      Materialize.toast('Agregar Nombre del Album!', 4000, 'rounded');
      $("#tx_albun_upd").focus();
      return;
    }
   
   
    $("#formUpd").submit();
    
   
}
function ejecutarEditarFoto(){
   
    tx_nombre= $("#tx_nombre_upd").val();
    
    
    if(tx_nombre.length==0){
     
      Materialize.toast('Agregar Nombre de la Foto!', 4000, 'rounded');
      $("#tx_nombre_upd").focus();
      return;
    }
   
   
    $("#formUpdFoto").submit();
    
   
}

function mostrarEliminar(indice){
    $('#delRegistro').openModal();
    $('#co_albun_del').val($("#cod"+indice).val());
    
}
function mostrarEliminarFoto(indice,indice2){
    $('#delRegistroFoto').openModal();
    $('#co_nombre_del').val($("#cod_foto"+indice2).val());
    $('#co_albun_foto_del').val($("#cod"+indice).val());
    
}
function ejecutarEliminar(){
    
    co_albun= $('#co_albun_del').val();   
    var parametros = {
                     "co_albun" : co_albun
          };
       $.ajax({
          type: "POST",
          url: '<?php echo CARPETA;?>index.php/cadminfotos/eliminar/',
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

function ejecutarEliminarFoto(){
    
    co_albun= $('#co_albun_foto_del').val();   
    co_foto= $('#co_nombre_del').val();   
    var parametros = {
                     "co_albun" : co_albun,
                     "co_foto" : co_foto
          };
       $.ajax({
          type: "POST",
          url: '<?php echo CARPETA;?>index.php/cadminfotos/eliminar_foto/',
          data: parametros,
          beforeSend: function(objeto){
            $("#datostabla").html("Mensaje: Cargando...");
          },
          success: function(datos){
              $("#datostabla").html(datos);  
              $('#delRegistroFoto').closeModal();
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
            <h5 class="letf white-text">Administración Fotos</h5>
          </div>
          <div id="botonAgregar" >
              <div class="col s12 m3" >
                <button class="btn waves-effect waves-light deep-orange" type="button" id="btnAdd" name="btnAdd" onclick="$('#addRegistro').openModal();">ALBUM
                  <i class="material-icons right">add_box</i>
                </button>
              </div>
              <div class="col s12 m3" >
                <button class="btn waves-effect waves-light deep-orange" type="button" id="btnAddFoto" name="btnAddFoto" onclick="$('#addRegistroFoto').openModal();">FOTOS
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
                    <th>Fecha</th> 
                    <th>Estatus</th> 
                    <th>Editar</th>                      
                    <th>Eliminar</th>
                  </thead>
                  <tbody id="datostabla" class="white">
                    <?php
                     if(isset($registros) && $registros!== FALSE) {
               
                     $i=-1;
                     $j=-1;
                     foreach ($registros as $row) 
                     {
                        $i++;
                        ?>                       
                        <tr>
                          	<td><?php echo $row->co_albun;?><input type="hidden" name="cod<?php echo $i;?>" id="cod<?php echo $i;?>" value="<?php echo $row->co_albun;?>" /></td>
                          	<td><?php echo $row->tx_albun;?><input type="hidden" name="text<?php echo $i;?>" id="text<?php echo $i;?>" value="<?php echo $row->tx_albun;?>" /></td>
                          	<td><?php echo $row->fe_albun;?><input type="hidden" name="fecha<?php echo $i;?>" id="fecha<?php echo $i;?>" value="<?php echo $row->fe_albun;?>" /></td>
                            <td><?php echo $row->tx_habilitado;?><input type="hidden" name="hab<?php echo $i;?>" id="hab<?php echo $i;?>" value="<?php echo $row->in_habilitado;?>" /></td>
                            <td><a href="javascript:mostrarEditar(<?php echo $i;?>);"><i class="small material-icons center blue-text darken-4">border_color</i></a></td>
                          	<td><a href="javascript:mostrarEliminar(<?php echo $i;?>);"><i class="small material-icons center red-text">delete_forever</i></a></td>
                      	</tr>
                      
                        <tr>
                          <td>
                          </td>
                          <td colspan="3">
                         <?php  if(isset($registros_fotos) && $registros_fotos!== FALSE) {
                         foreach ($registros_fotos as $row_fotos) 
                         {
                          if($row->co_albun==$row_fotos->co_albun){
                           $j++;
                           $icono='visibility_off';
                           if($row_fotos->in_habilitado==1)
                            $icono='visibility';
                         ?>
                            <div class="col s12 m5 l4">
                            <div class="card blue-grey lighten-4  z-depth-2">
                              <div class="card-content">
                                <input type="hidden" name="cod_foto<?php echo $j;?>" id="cod_foto<?php echo $j;?>" value="<?php echo $row_fotos->co_foto;?>" />
                                <input type="hidden" name="text_foto<?php echo $j;?>" id="text_foto<?php echo $j;?>" value="<?php echo $row_fotos->tx_nombre;?>" />
                                <input type="hidden" name="img_foto<?php echo $j;?>" id="img_foto<?php echo $j;?>" value="<?php echo $row_fotos->tx_foto;?>" />
                                <input type="hidden" name="hab_foto<?php echo $j;?>" id="hab_foto<?php echo $j;?>" value="<?php echo $row_fotos->in_habilitado;?>" />
                                <h5 class="center deep-orange-text"><?php echo $row_fotos->tx_nombre;?></h5>
                                <p class="center"><img src="<?php echo base_url();?>uploads/fotos/<?php echo $row_fotos->tx_foto;?>" width="100px" class="img-responsive">
                                </p>
                              </div>
                              <div class="card-action center">
                                <a href="javascript:mostrarEditarFoto(<?php echo $i;?>,<?php echo $j;?>);"><i class="small material-icons blue-text darken-4">border_color</i></a>
                                <a href="javascript:mostrarEliminarFoto(<?php echo $i;?>,<?php echo $j;?>);"><i class="small material-icons red-text">delete_forever</i></a>
                                <i class="small material-icons green-text"><?php echo $icono;?></i>
                              </div>
                              </div>
                            
                            </div>
                            <?php 
                             }
                             }
                            } ?>                            
                                                  
                        </td>
                        <td colspan="2">
                        </td>
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
  <li><a href="#">3</a></li>formAddFoto
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

echo form_open('/cadminfotos/ingresar/',$atri); ?>

<div id="addRegistro" class="modal modal-fixed-footer">

    <div class="modal-content">
      <h4>Ingresar</h4>

      <div class="row">
        <div class="input-field col m12">
            <input id="tx_albun_add" name="tx_albun_add" type="text" class="validate">
            <label for="tx_albun_add">Nombre del Album</label>
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

echo form_open('/cadminfotos/actualizar/',$atri); ?> 
<div id="updRegistro" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Modificar</h4>

      <div class="row">
        <div class="input-field col m9">
            <input type="hidden" name="co_albun_upd" id='co_albun_upd'>   
             <input placeholder="Placeholder" id="tx_albun_upd" name="tx_albun_upd" type="text" class="validate">
            <label for="tx_albun_upd">Nombre del Album</label>
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
             <input type="hidden" name="co_albun_del" id='co_albun_del'>   
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
<!--fotos-->
 <?php 
 $atri= array(
  'class' => 'form-signin', 
  'method' => 'post', 
  'name' => 'formAddFoto', 
  'id' => 'formAddFoto', 
  //'onsubmit' => 'startUpload();', 
  'enctype' => 'multipart/form-data');

echo form_open('/cadminfotos/ingresar_foto/',$atri); ?>

<div id="addRegistroFoto" class="modal modal-fixed-footer">

    <div class="modal-content">
      <h4>Ingresar Foto</h4>

      <div class="row">
        <div class="input-field col m12">
            <input id="tx_nombre_add" name="tx_nombre_add" type="text" class="validate">
            <label for="tx_nombre_add">Nombre de la Foto</label>
        </div>
      </div>
      <div class="row">
      <div class="input-field col m12">
             <select name="co_albun_foto_add" id="co_albun_foto_add">      
              <option value="" > Seleccione</option>   
              <?php
                     if(isset($registros) && $registros!== FALSE) {               
                     $i=-1;
                     foreach ($registros as $row) 
                     {
                        $i++;
                        ?>    
                        <option value="<?php echo $row->co_albun;?>" > <?php echo $row->tx_albun;?></option>   
                       <?php 
                     }
                    } ?>   
             </select>     
             <label for="co_albun_foto_add">Nombre del Album</label>                      

        </div>
        </div>
      <div class="row">
        <div class="input-field col m12" >
            <div class="file-field input-field" id="filephoto">
              <div class="btn deep-orange">
                <span>Foto</span>
                <input type="file" id="tx_foto_add" name="tx_foto_add">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
            </div>
        </div>

      </div>
         
    </div>
    <div class="modal-footer center">      
      <button class="modal-action modal-close btn waves-effect waves-light blue-grey" type="button" id="btnAddFotoNo" name="btnAddFotoNo">NO
          <i class="material-icons right">close</i>
      </button>
      <button class="btn waves-effect waves-light cyan" type="button" id="btnAddFotoOk" name="btnAddFotoOk" onclick="javascript:ejecutarIngresarFoto();">OK
          <i class="material-icons right">send</i>
      </button>      
    </div>    
</div>
</form>
<?php 
 $atri= array(
  'class' => 'form-signin', 
  'method' => 'post', 
  'id' => 'formUpdFoto', 
  'name' => 'formUpdFoto', 
  //'onsubmit' => 'startUpload();', 
  'enctype' => 'multipart/form-data');

echo form_open('/cadminfotos/actualizar_foto/',$atri); ?> 
<div id="updRegistroFoto" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Modificar</h4>

      <div class="row">
        <div class="input-field col m9">
           
            <input type="hidden" name="co_foto_upd" id='co_foto_upd'>   
            <input type="hidden" name="tx_foto_upd_ant" id='tx_foto_upd_ant'>   
            <input placeholder="Placeholder" id="tx_nombre_upd" name="tx_nombre_upd" type="text" class="validate">
            <label for="tx_nombre_upd">Nombre de la Foto</label>
        </div>
        <div class="input-field col m3">
          <div class="parent_upd">
             <select name="in_habilitado_foto_upd" id="in_habilitado_foto_upd">      
                <option value="1" > Habilitado</option> 
                <option value="2" > Deshabilitado</option>       
             </select>                           
          </div>
        </div>
      </div>     
      <div class="row">
      <div class="input-field col m12">
          <div class="parent_foto">
             <select name="co_albun_foto_upd" id="co_albun_foto_upd">      
              <?php
                     if(isset($registros) && $registros!== FALSE) {               
                     $i=-1;
                     foreach ($registros as $row) 
                     {
                        $i++;
                        ?>    
                        <option value="<?php echo $row->co_albun;?>" > <?php echo $row->tx_albun;?></option>   
                       <?php 
                     }
                    } ?>   
             </select>     
             <label for="co_albun_foto_add">Nombre del Album</label>                      
          </div>
        </div>
        </div> 

      <div class="row">
        <div class="input-field col m3" >
            <div id="div_foto_upd">             
            </div>
        </div>
        <div class="input-field col m9" >
            <div class="file-field input-field" id="filephoto_upd">
              <div class="btn deep-orange">
                <span>Foto del Album</span>
                <input type="file" id="tx_foto_upd" name="tx_foto_upd">
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
      <button class="btn waves-effect waves-light cyan" type="button" id="btnUpdOk" name="btnUpdOk" onclick="javascript:ejecutarEditarFoto();">OK
          <i class="material-icons right">send</i>
      </button>   
    </div>
    
</div>
</form>
<div id="delRegistroFoto" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Eliminar</h4>
      <div class="row">               
          <div id="oculto3" class="card-panel red lighten-2">
             <input type="hidden" name="co_albun_foto_del" id='co_albun_foto_del'>   
             <input type="hidden" name="co_nombre_del" id='co_nombre_del'>   
             Esta seguro de eliminar este Registro?
          </div>
      </div>
    </div>  
    <div class="modal-footer center">
      <!--<a href="#!" class="modal-action modal-close waves-effect waves-cyan btn-flat" >Cerrar</a>-->
      <button class="modal-action modal-close btn waves-effect waves-light blue-grey" type="button" id="btnPhotoDelNo" name="btnPhotoDelNo">NO
          <i class="material-icons right">close</i>
      </button>
      <button class="btn waves-effect waves-light cyan" type="button" id="btnPhotoDel" name="btnPhotoDel" onclick="javascript:ejecutarEliminarFoto();">OK
          <i class="material-icons right">send</i>
      </button>
      <!--<a href="#!" class="modal-action waves-effect cyan btn" onclick="javascript:ejecutarEliminar();">Aceptar</a>-->
    </div>
   
</div>      
 