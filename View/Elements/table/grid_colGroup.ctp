
<?php 
 $span = 0;
foreach($headers as $header){
     $width = (isset( $header['options']['width'] ))?  'width="'.$header['options']['width'].'"' : null ;
     if ( $width): ?>
       
    	<col span="<?= $span ?>" class="<?php echo $options['class_colGroup'] ?>" <?php echo $width ?> />
     <?php else: ?>
    	<col span="<?= $span ?>" class="<?php echo $options['class_colGroup'] ?>"  />
     <?php endif; ?>
     
<?php
  $span++;
 } ?>
