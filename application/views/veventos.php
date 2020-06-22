   
<div class="container">
    <div class="section">
      <!--   Icon Section   -->
      <div class="row">
          <div class="col s12 m12">
            <h4 class="letf white-text">Eventos</h4>
          </div>
      </div>
      
        
    <!--    <?php
        if(isset($registro) && $registro!== FALSE) {
               
          $i=-1;
          foreach ($registro as $row) 
          {
            $i++;
            ?>    
            <div class="row">
              <div class="col s12 m4">
                <img src="<?php echo base_url();?>img/simon/sietePecados_2.jpg" alt="..."  class="img-responsive" >      
              </div>
              <div class="col s12 m8">
                  <h5 class="letf deep-orange-text"><?php echo $row->tx_evento;?></h5>
                  <p class="blue-grey-text lighten-5"><?php echo $row->tx_descripcion;?></p>
                  <p class="red-text"><?php echo $row->fe_evento;?> a las <?php echo $row->fe_evento;?></p>
              </div>
            <?php 
            }
          } ?>
       -->
        <?php
        if(isset($registros) && $registros!== FALSE) {
               
          $i=-1;
          foreach ($registros as $row) 
          {
            if($row->in_habilitado==1){
            $i++;
            ?>  
            <div class="row"> 
                <div class="divider"></div> 
            </div>
            <div class="row">  
              <div class="col s12 m4">
                <img src="<?php echo base_url();?>uploads/eventos/<?php echo $row->tx_imagen;?>" width="250px" class="img-responsive" >      
              </div>
              <div class="col s12 m8">
                  <h5 class="letf deep-orange-text"><?php echo $row->tx_evento;?></h5>
                  <p class="blue-grey-text text-lighten-4" align="justify"><?php echo $row->tx_descripcion;?></p>
                  <p class="red-text"><?php echo $row->fe_evento;?> a las <?php echo $row->h_evento;?></p>
              </div>
            </div>
            <?php 
             }
            }
          } ?>


        
    </div>
 </div>



     
 
