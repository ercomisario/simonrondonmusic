<footer class="page-footer grey darken-4">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Simón Rondón Music</h5>
          <h6 class="white-text">Sígueme</h6>
          <div id="redessociales">
            <a href="https://www.facebook.com/simonrondonmusic" target="_blink" ><img height="50px" width="50px" aling="middle" src="<?php echo base_url();?>img/red_facebook.gif"></a>
            <a href="https://www.twitter.com/@simon.rondon" target="_blink" ><img height="50px" width="50px" aling="middle" src="<?php echo base_url();?>img/red_twitter.gif"></a>
            <a href="https://www.youtube.com/simonrondonmusic" target="_blink" ><img height="50px" width="50px" aling="middle" src="<?php echo base_url();?>img/red_youtube.gif"></a>
            <a href="https://www.instagram.com/simon.rondon" target="_blink" ><img height="50px" width="50px" aling="middle" src="<?php echo base_url();?>img/red_instagram.gif"></a>
                    
          </div>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Portafolio</h5>
          <ul>
            <li><a class="white-text" href="#!">Colaboradores</a></li>
            <li><a class="white-text" href="#!">Eventos</a></li>
            <li><a class="white-text" href="#!">Fotos</a></li>
            <li><a class="white-text" href="#!">Videos</a></li>
            <li><a class="white-text" href="#!">Audios</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Contacto</h5>
          <ul>
        <?php
        if(isset($contactos) && $contactos!== FALSE) {
          foreach ($contactos as $row) 
          {  
            if($row->in_habilitado==1)   
            { 
              ?> 
              <li class="white-text"><?php echo $row->tx_contacto;?></li>
              
              <?php
            } 
          }
        } ?>
          
            <li><a class="white-text" href="<?php echo base_url();?>webmail" target="_blink" >Webmail</a></li>


          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Derechos Reservados <a class="brown-text text-lighten-3" href="#!">Simón Rondón</a>
      </div>
    </div>
  </footer>
   <!--  Scripts-->
  <!--<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>-->
  <script src="<?php echo base_url();?>js/jquery-2.1.3.min.js"></script>
  <script src="<?php echo base_url();?>js/materialize.js"></script>
  <script src="<?php echo base_url();?>js/materialize.clockpicker.js"></script>
  <script src="<?php echo base_url();?>js/init.js"></script>
  <script>
      $(document).ready(function(){
      $('.carousel.carousel-slider').carousel({full_width: true});
      $('.carousel-slider').slider({full_width:true});//slider init
      $('.slider').slider();              
      $('.carousel').carousel({
              padding: 200    
          });
          autoplay()   
          function autoplay() {
              $('.carousel').carousel('next');
              setTimeout(autoplay, 4500);
          }     
    }); 
</script>

 </body>
</html>
