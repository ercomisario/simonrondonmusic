

<?php 
$dataSession=$this->session->userdata('usuario');

$co_usuario_session=$dataSession['co_usuario_session'];
$tx_usuario_session=$dataSession['tx_usuario_session'];
$co_permisologia_session=$dataSession['co_permisologia_session'];
$tx_nombre_session=$dataSession['tx_nombre_session'];



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>.:: Simón Rondón ::.</title> 
  <!-- CSS  -->
  <!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
  <link href="<?php echo base_url();?>css/icons_material.css" rel="stylesheet">
  <link href="<?php echo base_url();?>css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo base_url();?>css/materialize.clockpicker.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo base_url();?>css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
 
  <!--<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <script>
    (adsbygoogle = window.adsbygoogle || []).push({
      google_ad_client: "ca-pub-9560031861873649",
      enable_page_level_ads: true
    });
  </script>
-->
<script>
function validar(){
   
    tx_clave= $("#tx_clave").val();
    tx_usuario= $("#tx_usuario").val();

} 
</script>
</head>
<body>
  <nav class="grey darken-4" role="navigation">
      <div class="nav-wrapper">
          <a href="#!" class="brand-logo">
              &nbsp;&nbsp;&nbsp;<img class="responsive-img" aling="middle" src="<?php echo base_url();?>img/simon/simon_logo_new.png">
          </a>
          
          <a href="#!" data-activates="mobile-demo" class="button-collapse blue-grey-text lighten-5"><i class="material-icons">menu</i></a>
           
          <ul id="dropdown1" class="dropdown-content">
            <li><a class="deep-orange-text" href="<?php echo base_url();?>index.php/cadmineventos">Eventos</a></li>
            <li><a class="deep-orange-text" href="<?php echo base_url();?>index.php/cadminbibliografia">Biografía</a></li>
            <li class="divider"></li>
            <li><a class="deep-orange-text" href="<?php echo base_url();?>index.php/cadminfotos">Fotos</a></li>
            <li><a class="deep-orange-text" href="<?php echo base_url();?>index.php/cadminvideos">Videos</a></li>
            <li><a class="deep-orange-text" href="<?php echo base_url();?>index.php/cadminaudios">Audios</a></li>
            <li class="divider"></li>        
            <li><a class="deep-orange-text" href="<?php echo base_url();?>index.php/cadminusuarios">Usuarios</a></li>
            <li><a class="deep-orange-text" href="<?php echo base_url();?>index.php/cadmincontactos">Contactos</a></li>
          </ul> 
          <ul id="dropdown2" class="dropdown-content">
            <li><a class="deep-orange-text" href="<?php echo base_url();?>index.php/cfotos">Fotos</a></li>
            <li><a class="deep-orange-text" href="<?php echo base_url();?>index.php/cvideos">Videos</a></li>
            <li><a class="deep-orange-text" href="<?php echo base_url();?>index.php/caudios">Audios</a></li>
          </ul> 
          
          <ul class="right hide-on-med-and-down">
            <li><a class="grey-text lighten-4" href="<?php echo base_url();?>">Inicio</a></li>
            <li><a class="grey-text lighten-4" href="<?php echo base_url();?>index.php/ceventos">Eventos</a></li>
            <li><a class="grey-text lighten-4" href="<?php echo base_url();?>index.php/cbibliografia">Biografía</a></li>
            <li><a class="dropdown-button grey-text lighten-4" href="#!" data-activates="dropdown2">Multimedia<i class="material-icons right">arrow_drop_down</i></a></li>            
            <!--<li><a class="grey-text lighten-4" href="">Colaboradores</a></li>-->
            <?php if($co_permisologia_session==1){?>
            <li><a class="dropdown-button grey-text lighten-4" href="#!" data-activates="dropdown1">Administración<i class="material-icons right">arrow_drop_down</i></a></li>
            <?php }?>
            <li><a class="grey-text lighten-4" href="<?php echo base_url();?>index.php/ccontacto">Cont&aacute;ctenos</a></li>
            <?php if($co_permisologia_session){?>
            <li><a class="modal-trigger grey-text lighten-4" href="#delLogin"><i class="material-icons left">account_circle</i> <?php echo $tx_nombre_session;?></a></li>
            <?php }else{?>
            <li><a class="modal-trigger grey-text lighten-4" href="#addLogin"><i class="material-icons left">account_circle</i> Administrador</a></li>
            <?php }?>
          </ul>

          <ul class="side-nav " id="mobile-demo">
            <li><a class="waves-effect waves-brown darken-3 deep-orange-text" href="<?php echo base_url();?>">Inicio</a></li>
            <li><a class="waves-effect waves-brown darken-3 deep-orange-text" href="<?php echo base_url();?>index.php/ceventos">Eventos</a></li>
            <li><a class="waves-effect waves-brown darken-3 deep-orange-text" href="<?php echo base_url();?>index.php/cbibliografia">Biografía</a></li>
            <!--<li><a class="waves-effect waves-brown darken-3 deep-orange-text" href="#!">Colaboradores</a></li>-->
            <li class="no-padding">
              <ul class="collapsible collapsible-accordion">
              <li class="bold">
                <a class="collapsible-header waves-effect  waves-brown darken-3 deep-orange-text">Multimedia</a>
                  <div class="collapsible-body">
                    <ul>
                        <li><a class="waves-effect waves-teal" href="<?php echo base_url();?>index.php/cfotos">Fotos</a></li>
                        <li><a class="waves-effect waves-teal" href="<?php echo base_url();?>index.php/cvideos">Videos</a></li>
                        <li><a class="waves-effect waves-teal" href="<?php echo base_url();?>index.php/caudios">Audios</a></li>
                    </ul>
                  </div>
              </li>
              </ul>
            </li>
            <?php if($co_permisologia_session==1){?>
            <li class="no-padding">
              <ul class="collapsible collapsible-accordion">
              <li class="bold">
                <a class="collapsible-header waves-effect waves-brown darken-3 deep-orange-text">Administración</a>
                  <div class="collapsible-body">
                    <ul>
                        <li><a class="waves-effect waves-teal" href="<?php echo base_url();?>index.php/cadmineventos">Eventos</a></li>
                        <li><a class="waves-effect waves-teal" href="<?php echo base_url();?>index.php/cadminbibliografia">Biografía</a></li>
                        <li class="divider"></li>
                        <li><a class="waves-effect waves-teal" href="<?php echo base_url();?>index.php/cadminfotos">Fotos</a></li>
                        <li><a class="waves-effect waves-teal" href="<?php echo base_url();?>index.php/cadminvideos">Videos</a></li>
                        <li><a class="waves-effect waves-teal" href="<?php echo base_url();?>index.php/cadminaudios">Audios</a></li>
                        <li class="divider"></li>
                        <li><a class="waves-effect waves-teal" href="<?php echo base_url();?>index.php/cadminusuarios">Usuarios</a></li>
                        <li><a class="waves-effect waves-teal" href="<?php echo base_url();?>index.php/cadmincontactos">Contactos</a></li>
                    </ul>
                  </div>
              </li>
              </ul>
            </li>
            <?php }?>
            <li><a class="waves-effect waves-brown darken-3 deep-orange-text" href="<?php echo base_url();?>index.php/ccontacto">Cont&aacute;ctenos</a></li>
            <?php if($co_permisologia_session){?>
            <li><a class="modal-trigger waves-effect waves-brown darken-3 deep-orange-text" href="#delLogin"><i class="material-icons left">account_circle</i> <?php echo $tx_nombre_session;?></a></li>
            <?php }else{?>
            <li><a class="modal-trigger waves-effect waves-brown darken-3 deep-orange-text" href="#addLogin"><i class="material-icons left">account_circle</i> Administrador</a></li>
            <?php }?>
          </ul>
    </div>    
  </nav>
<?php 
 $atri= array(
  'class' => 'form-signin', 
  'method' => 'post', 
  'name' => 'formLogin', 
  //'onsubmit' => 'startUpload();', 
  'enctype' => 'multipart/form-data');

echo form_open('/clogin/validar/',$atri); ?>
  <div id="addLogin" class="modal modal-fixed-footer">

    <div class="modal-content">
      <h4>Autenticarse</h4>

      <div class="row">
        <div class="input-field col m9">
             <i class="material-icons prefix">account_circle</i>
             <input id="tx_usuario" name="tx_usuario" type="text" class="validate">
             <label for="tx_usuario">Usuario</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col m9">
            <i class="material-icons prefix">lock</i>
             <input id="tx_clave" name="tx_clave" type="password" class="validate">
             <label for="tx_clave">Clave</label>
        </div>
      </div>     
     <!-- <div id="ocultoLoggin" class="card-panel red lighten-2">Falta Campo por Ingresar
      </div>-->
      
    </div>
    <div class="modal-footer center">      
      <button class="modal-action modal-close btn waves-effect waves-light blue-grey" type="button" id="btnLoginNo" name="btnLoginNo">NO
          <i class="material-icons right">close</i>
      </button>
      <button class="btn waves-effect waves-light cyan" type="submit" id="btnLogin" name="btnLogin">OK
          <i class="material-icons right">send</i>
      </button>   
    </div>    
</div>
</form>
<?php 
 $atri= array(
  'class' => 'form-signin', 
  'method' => 'post', 
  'name' => 'formLogout', 
  //'onsubmit' => 'startUpload();', 
  'enctype' => 'multipart/form-data');

echo form_open('/clogin/logout/',$atri); ?>
  <div id="delLogin" class="modal modal-fixed-footer">

    <div class="modal-content">
      <h4>Cerrar Sesión</h4>
        <div id="ocultoLogout" class="card-panel red lighten-2">
          Está Seguro de Cerrar la Sesión de <?php echo $tx_nombre_session;?>?
      </div>     
    </div>
    <div class="modal-footer center">      
      <button class="modal-action modal-close btn waves-effect waves-light blue-grey" type="button" id="btnLoginOutNo" name="btnLoginOutNo">NO
          <i class="material-icons right">close</i>
      </button>
      <button class="btn waves-effect waves-light cyan" type="submit" id="btnLoginOut" name="btnLoginOut">OK
          <i class="material-icons right">send</i>
      </button>      
    </div>    
</div>

<?php  
if(isset($resultado)) { 
   if($resultado == 2) {  ?> 
             ?>
<script type="text/javascript">
    // <![CDATA[
    window.onload = function() {
        $('#errorLogin').openModal();
        // Puedes agregar mas eventos que se ejecutaran al cargar la pagina
    }
    // ]]>
    </script>
<?php  }
}  
?>  
<div id="errorLogin" class="modal modal-fixed-footer">

    <div class="modal-content">
      <h4>Error Autenticando</h4>
        <div id="ocultoLogout" class="card-panel red lighten-2">
          Usuario o Clave Incorrectos!!!
      </div>     
    </div>
    <div class="modal-footer center">      
     <button class="btn waves-effect waves-light cyan" type="submit" id="btnLoginError" name="btnLoginError">OK
          <i class="material-icons right">send</i>
      </button>      
      
    </div>    
</div>
</form>