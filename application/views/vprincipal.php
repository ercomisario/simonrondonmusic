
<script>
      var usuario = 'erlicenciado';
      $.getJSON("http://api.twitter.com/1/statuses/user_timeline/"+usuario+".json?count=1&include_rts=1&callback=?", function(data) {
      $("#ultimo_tweet").html(data[0].text);
  });
</script>

<div class="container">
  <div class="row">

 <div class="col s12 m7">
  <div class="carousel carousel-slider">
    <a class="carousel-item" href="#one!"><img src="<?php echo base_url();?>img/simon/simon_5.jpg" class="img-responsive"></a>
    <a class="carousel-item" href="#two!"><img src="<?php echo base_url();?>img/simon/simon_6.jpg" class="img-responsive"></a>
    <a class="carousel-item" href="#three!"><img src="<?php echo base_url();?>img/simon/simon_10.jpg" class="img-responsive"></a>
    <a class="carousel-item" href="#four!"><img src="<?php echo base_url();?>img/simon/logo_simon_portada.jpg" class="img-responsive"></a>
  </div>  
</div>  
 
              <?php
        if(isset($registro_evento) && $registro_evento!== FALSE) {
          foreach ($registro_evento as $row) 
          {      
            ?> 
              <div class="col s12 m5">
                  <div class="card grey darken-2">
                    <div class="card-content white-text">
                      <span class="card-title">Lo Ultimo</span>
                      <h5 class="letf deep-orange-text"><?php echo $row->tx_evento;?></h5>
                      <p align="justify"><img style="float:left; margin:4px;" src="<?php echo base_url();?>uploads/eventos/<?php echo $row->tx_imagen;?>" width="150px" class="img-responsive" >
                      <?php echo substr($row->tx_descripcion, 0, 230);?>...</p>
                    </div>
                    <div class="card-action">
                      <a href="<?php echo base_url();?>index.php/ceventos">Ver más</a>
                    </div>
                  </div>
              </div>
            <?php 
            }
          } ?>
            
</div><!-- row-->
<div class="row">
 <div class="col s12 m4">
                  <div class="card grey darken-2">
                    <div class="card-content white-text">
                      <span class="card-title">Mis últimos Twitter</span>
                      <a class="twitter-timeline" data-theme="dark" data-width="250" data-height="460" href="https://twitter.com/SimonRondon?ref_src=twsrc%5Etfw">Tweets by TwitterDev</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
                    </div>                    
                  </div>
</div>
<div class="col s12 m4">
                  <div class="card grey darken-2">
                    <div class="card-content white-text">
                      <span class="card-title">Mis Instagrams</span>
                      <!--<a class="twitter-timeline" data-width="250" data-height="500" href="https://twitter.com/SimonRondon?ref_src=twsrc%5Etfw">Tweets by TwitterDev</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> -->
                    </div>                    
                  </div>
</div>
<div class="col s12 m4">
                  <div class="card grey darken-2">
                    <div class="card-content white-text">
                      <span class="card-title">Mis YouTube</span>
                      
                      <iframe width="250" height="150" src="https://www.youtube.com/embed/mVo-jQtJLoc" frameborder="0"></iframe>
                      <iframe width="250" height="150" src="https://www.youtube.com/embed/5iey6Oxkxdk" frameborder="0"></iframe>
                      <iframe width="250" height="150" src="https://www.youtube.com/embed?listType=search&list=simonrondonmusic" frameBorder="0"></iframe >
                     
                      <!--<script src="http://www.gmodules.com/ig/ifr?url=http://www.google.com/ig/modules/youtube.xml&up_channel=simonrondonmusic&synd=open&w=250&h=300&title=Simon+Rondon+Music&border=&output=js"> </script>-->
                    </div>                    
                  </div>
</div>
</div><!-- row-->
