   
<div class="container">
    <div class="section">
      <!--   Icon Section   -->
      <div class="row">
          <div class="col s12 m12">
            <h4 class="letf white-text">Fotos</h4>
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
                        <div class="col s12 m12">                
                        	<h5 class="left deep-orange-text"><?php echo $row->tx_albun;?></h5>
                        </div>
                         <div class="row">   
                         <?php  if(isset($registros_fotos) && $registros_fotos!== FALSE) {
                         foreach ($registros_fotos as $row_fotos) 
                         {
                          if($row->co_albun==$row_fotos->co_albun && $row_fotos->in_habilitado==1){
                         ?>
                        
                            <div class="col s6 m5 l4">
                              <div class="card-panel grey darken-3">
                                <div class = "card-image">
                                  <img class="materialboxed" class="img-responsive" data-caption="<?php echo $row_fotos->tx_nombre;?>" src="<?php echo base_url();?>uploads/fotos/<?php echo $row_fotos->tx_foto;?>" width="100px">               
                               </div>
                                <div class="card-content">                                
                                    <h6 class="center white-text"><?php echo $row_fotos->tx_nombre;?></h6>                                
                                </div>
                              </div>
                            </div>

                            <?php 
                             }
                             }
                            } ?>                 
                          </div>
                         </div>
                        
                      <?php 
                  		}
                     }
                    } ?>          
    </div>
 </div>




     
 