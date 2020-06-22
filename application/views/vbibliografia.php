   
<div class="container">
    <div class="section">
      <!--   Icon Section   -->
      <div class="row">
          <div class="col s12 m12">
            <h4 class="letf white-text">Bibliografía</h4>
          </div>
      </div> 
      <div class="row"> 
                <div class="divider"></div> 
            </div>
     <?php
        if(isset($registros) && $registros!== FALSE) {
               
          $i=-1;
          foreach ($registros as $row) 
          {
            if($row->in_habilitado==1){
            $i++;
            $tx_imagen=$row->tx_imagen;
            if($row->tx_imagen=='no_imagen.jpg')
                $tx_imagen='transparente.gif';
            ?>  
            
            <div class="row">  
              <div class="col s12 m3">
                <img src="<?php echo base_url();?>uploads/bibliografia/<?php echo $tx_imagen;?>" width="200px" class="img-responsive" >                   
              </div>
              <div class="col s12 m9">
                 
                  <p class="blue-grey-text text-lighten-4" align="justify">
                  <?php echo $row->tx_bibliografia;?></p>
                
              </div>
            </div>
            <?php 
             }
            }
          } ?>
     
    </div>
 </div>



     
 