   
<div class="container">
    <div class="section">
      <!--   Icon Section   -->
      <div class="row">
          <div class="col s12 m12">
            <h4 class="letf white-text">Audios</h4>
          </div>
      </div>      
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
                <h5 class="letf deep-orange-text"><?php echo $row->tx_nombre;?></h5>
              </div>
              <div class="col s12 m8">
                  <audio controls >
                     <source src="<?php echo base_url();?>uploads/audios/<?php echo $row->tx_audio;?>" type="audio/mp3" />
                  </audio>    
              </div>
            </div>
            <?php 
             }
            }
          } ?>  
    </div>
 </div>



     
 